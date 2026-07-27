<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BlogTag;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $metaDescription;
    public $body;
    public $author;
    public $image;
    public $category_id;
    public $subcategory_id;
    public $blogId;
    public $slug;
    public $tags;
    public $blogTags;
    public $categories;
    public $subcategories;
    public $link;
    public $tempImage;
    public $showSubcategory = false;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
        'categoryChanged' => 'categoryChanged',

    ];

    public function mount()
    {
        $blogId = request('id');        
        $this->categories = Category::all();
        $this->subcategories = SubCategory::all();
        $this->blogTags = BlogTag::all();
        // get the first item from catoregies
        $firstCategory = $this->categories->first();
        $this->decideToShowSubcategory($firstCategory->name);
        if ($blogId) {
            $blog = Blog::find($blogId);
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
            $this->generateSlug();
            if ($this->subcategory_id) {
                $category = Category::find($this->category_id);
                $this->decideToShowSubcategory($category->name);
            }
        }
        
    }
    public function render()
    {

        return view('livewire.blog-create-component')->layout('layouts.base');
    }

    public function saveBlog($bodyContent = null)
    {
        if ($bodyContent !== null) {
            $this->body = $bodyContent;
        }

        $this->validate([
            'title' => 'required|min:3|max:255',
            'metaDescription' => 'required|min:3|max:158',
            'category_id' => 'required'
        ], [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 3 characters',
            'title.max' => 'Title must be less than 255 characters',
            'metaDescription.max' => 'Meta description must be at least 3 characters',
            'metaDescription.max' => 'Meta description maximum length is 158 characters',
            'category_id.required' => 'Category is required'
        ]);
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
        redirect()->to('/admin/latest/news');
    }

    public function resetInput()
    {
        $this->title = null;
        $this->metaDescription = null;
        $this->body = null;
        $this->author = null;
        $this->category_id = null;
        $this->subcategory_id = null;
        $this->image = null;
        $this->blogId = null;
        $this->slug = null;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function fileUpload($fileData)
    {
        // Prefer metadata bundled with the upload to avoid a race with set_file_data.
        if (is_array($fileData)) {
            if (!empty($fileData['file_name'])) {
                $this->setFileData($fileData);
            }
            $fileData = $fileData['data'] ?? null;
        }

        if (empty($fileData) || !is_string($fileData)) {
            return;
        }

        $baseName = Str::slug((string) $this->fileNameWithoutExtension);
        if ($baseName === '') {
            $baseName = 'blog-image';
        }
        $extension = strtolower((string) $this->fileExtension) ?: 'jpg';
        $pdfName = $baseName . '_' . time() . '.' . $extension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/blogs/' . $pdfName, base64_decode($image));
        $this->image = 'storage/blogs/' . $pdfName;
        $this->tempImage = $this->image;
    }

    public function setFileData($fileData)
    {
        $this->fileName = $fileData['file_name'] ?? null;
        $this->fileExtension = $fileData['file_extension'] ?? null;
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'] ?? null;
    }

    public function changeCategory(){
        $category = $this->categories->where('id', $this->category_id)->first();
        $this->decideToShowSubcategory($category->name);
    }

    private function decideToShowSubcategory($subcategoryName){
        $this->showSubcategory = false;
        $this->subcategory_id = null;
    }
}
