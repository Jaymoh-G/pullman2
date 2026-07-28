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

    public function syncBody($bodyContent = null): void
    {
        if ($bodyContent !== null) {
            $this->body = $bodyContent;
        }
    }

    /**
     * Soft SEO checklist + score (warnings only; does not block save).
     *
     * @return array{score:int,status:string,label:string,tips:array<int,string>}
     */
    public function getSeoReportProperty(): array
    {
        $tips = [];
        $score = 0;

        $title = trim((string) $this->title);
        $titleLen = mb_strlen($title);
        if ($titleLen >= 30 && $titleLen <= 60) {
            $score += 15;
        } elseif ($titleLen >= 15) {
            $score += 8;
            if ($titleLen < 30) {
                $tips[] = 'Title is short — aim for 30–60 characters for better search display.';
            } else {
                $tips[] = 'Title is long — Google may truncate past ~60 characters.';
            }
        } else {
            $tips[] = 'Add a clear title (30–60 characters works best for SEO).';
        }

        $slug = trim((string) $this->slug);
        if ($slug !== '' && preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug)) {
            $score += 10;
        } elseif ($slug !== '') {
            $score += 4;
            $tips[] = 'Slug should be lowercase words separated by hyphens (e.g. excavator-hire-nairobi).';
        } else {
            $tips[] = 'Add a URL-safe slug (auto-filled from the title).';
        }

        $meta = trim((string) $this->metaDescription);
        $metaLen = mb_strlen($meta);
        if ($metaLen >= 120 && $metaLen <= 158) {
            $score += 20;
        } elseif ($metaLen >= 50) {
            $score += 10;
            if ($metaLen < 120) {
                $tips[] = 'Meta description is short — aim for 120–158 characters.';
            } else {
                $tips[] = 'Meta description is over 158 characters and may be truncated.';
            }
        } else {
            $tips[] = 'Write a meta description of 120–158 characters summarizing the post.';
        }

        $hasImage = (bool) $this->photo || !empty($this->image) || !empty($this->tempImage);
        if ($hasImage) {
            $score += 15;
        } else {
            $tips[] = 'Add a featured image — it improves social sharing and Article SEO.';
        }

        $bodyText = trim(html_entity_decode(strip_tags((string) $this->body), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        $bodyText = preg_replace('/\s+/u', ' ', $bodyText) ?: '';
        $bodyLen = mb_strlen($bodyText);
        if ($bodyLen >= 150) {
            $score += 20;
        } elseif ($bodyLen >= 50) {
            $score += 10;
            $tips[] = 'Body is thin — aim for at least 150 characters of real content.';
        } else {
            $tips[] = 'Write post body content (at least 150 characters) for better SEO.';
        }

        $tagCount = is_array($this->tags) ? count(array_filter($this->tags)) : 0;
        if ($tagCount >= 1) {
            $score += 10;
        } else {
            $tips[] = 'Select at least one tag to help topical grouping.';
        }

        if (!empty($this->category_id)) {
            $score += 10;
        } else {
            $tips[] = 'Choose a category so the post URL and breadcrumbs work correctly.';
        }

        if ($score >= 80) {
            $status = 'green';
            $label = 'Good';
        } elseif ($score >= 50) {
            $status = 'yellow';
            $label = 'Needs work';
        } else {
            $status = 'red';
            $label = 'Poor';
        }

        return [
            'score' => $score,
            'status' => $status,
            'label' => $label,
            'tips' => $tips,
        ];
    }
}
