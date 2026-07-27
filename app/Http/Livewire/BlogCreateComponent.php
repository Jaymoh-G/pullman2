<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BlogTag;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class BlogCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $metaDescription;
    public $body = '';
    public $author;
    public $image;
    public $photo;
    public $category_id;
    public $subcategory_id;
    public $blogId;
    public $slug;
    public $tags = [];
    public $blogTags;
    public $categories;
    public $subcategories;
    public $link;
    public $tempImage;
    public $showSubcategory = false;

    public function mount()
    {
        $blogId = request('id');
        $this->categories = Category::all();
        $this->subcategories = SubCategory::all();
        $this->blogTags = BlogTag::all();

        $firstCategory = $this->categories->first();
        if ($firstCategory) {
            $this->decideToShowSubcategory($firstCategory->name);
        }

        if ($blogId) {
            $blog = Blog::find($blogId);
            if (!$blog) {
                return;
            }
            $this->title = $blog->title;
            $this->slug = $blog->slug;
            $this->metaDescription = $blog->metaDescription;
            $this->body = $blog->body;
            $this->author = $blog->author;
            $this->category_id = $blog->category_id;
            $this->subcategory_id = $blog->subcategory_id;
            $this->image = $blog->image;
            $this->tempImage = $blog->image;
            $this->link = $blog->link;
            $this->tags = $blog->tags ? unserialize($blog->tags) : [];
            $this->blogId = $blog->id;
            if ($this->subcategory_id) {
                $category = Category::find($this->category_id);
                if ($category) {
                    $this->decideToShowSubcategory($category->name);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.blog-create-component')->layout('layouts.base');
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug((string) $value);
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|image|max:6656',
        ], [
            'photo.image' => 'The blog image must be a valid image file.',
            'photo.max' => 'The blog image may not be greater than 6.5MB.',
        ]);
    }

    public function saveBlog($bodyContent = null, $title = null, $slug = null, $metaDescription = null, $link = null)
    {
        if ($bodyContent !== null) {
            $this->body = $bodyContent;
        }
        if ($title !== null) {
            $this->title = $title;
        }
        if ($slug !== null) {
            $this->slug = $slug;
        }
        if ($metaDescription !== null) {
            $this->metaDescription = $metaDescription;
        }
        if ($link !== null) {
            $this->link = $link;
        }

        if (trim((string) $this->slug) === '' && trim((string) $this->title) !== '') {
            $this->slug = Str::slug((string) $this->title);
        }

        $this->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255',
            'metaDescription' => 'required|min:3|max:158',
            'category_id' => 'required',
            'photo' => 'nullable|image|max:6656',
        ], [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 3 characters',
            'title.max' => 'Title must be less than 255 characters',
            'slug.required' => 'Slug is required',
            'slug.min' => 'Slug must be at least 3 characters',
            'metaDescription.required' => 'Meta description is required',
            'metaDescription.min' => 'Meta description must be at least 3 characters',
            'metaDescription.max' => 'Meta description maximum length is 158 characters',
            'category_id.required' => 'Category is required',
            'photo.image' => 'The blog image must be a valid image file.',
            'photo.max' => 'The blog image may not be greater than 6.5MB.',
        ]);

        if ($this->photo) {
            $this->storeUploadedPhoto();
        }

        $data = [
            'title' => $this->title,
            'metaDescription' => $this->metaDescription,
            'slug' => $this->slug,
            'body' => $this->body,
            'author' => Auth::user()->name,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'image' => $this->image,
            'link' => $this->link ?: null,
            'tags' => is_array($this->tags) ? serialize($this->tags) : $this->tags,
        ];

        if ($this->blogId) {
            $blog = Blog::find($this->blogId);
            $blog->update($data);
            session()->flash('message', 'Post has been updated successfully');
        } else {
            Blog::create($data);
            session()->flash('message', 'Post has been created successfully');
        }

        $this->resetInput();
        $this->emit('blogSaved');

        return $this->redirect(route('admin.blogs'));
    }

    protected function storeUploadedPhoto(): void
    {
        $original = pathinfo($this->photo->getClientOriginalName(), PATHINFO_FILENAME);
        $baseName = Str::slug($original) ?: 'blog-image';
        $extension = strtolower($this->photo->getClientOriginalExtension() ?: 'jpg');
        $filename = $baseName . '_' . time() . '.' . $extension;

        $storedPath = $this->photo->storeAs('blogs', $filename, 'public');
        $this->image = 'storage/' . $storedPath;
        $this->tempImage = $this->image;
        $this->photo = null;
    }

    public function resetInput()
    {
        $this->title = null;
        $this->metaDescription = null;
        $this->body = '';
        $this->author = null;
        $this->category_id = null;
        $this->subcategory_id = null;
        $this->image = null;
        $this->photo = null;
        $this->tempImage = null;
        $this->blogId = null;
        $this->slug = null;
        $this->tags = [];
        $this->link = null;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug((string) $this->title);
    }

    public function changeCategory()
    {
        $category = $this->categories->where('id', $this->category_id)->first();
        if ($category) {
            $this->decideToShowSubcategory($category->name);
        }
    }

    private function decideToShowSubcategory($subcategoryName)
    {
        $this->showSubcategory = false;
        $this->subcategory_id = null;
    }

    public function getImagePreviewUrlProperty(): ?string
    {
        if ($this->photo) {
            try {
                return $this->photo->temporaryUrl();
            } catch (\Throwable $e) {
                return null;
            }
        }

        if (empty($this->tempImage)) {
            return null;
        }

        $path = ltrim($this->tempImage, '/');
        $encoded = implode('/', array_map('rawurlencode', explode('/', $path)));

        return asset($encoded);
    }
}
