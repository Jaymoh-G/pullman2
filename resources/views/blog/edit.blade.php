<div class="card-body blog-create-card">
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger blog-create-error-summary" role="alert">
            <strong>Please fix the following:</strong>
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="blog-create-form" id="blog-create-form">
        <div class="blog-field">
            <label for="blog-title">Title</label>
            <small class="text-muted d-block mb-1">Max 255 characters (aim for ~60)</small>
            <input
                id="blog-title"
                type="text"
                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                placeholder="Title"
                wire:model.debounce.500ms="title"
            />
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="blog-field">
            <label for="blog-slug">Slug</label>
            <input
                id="blog-slug"
                type="text"
                class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                placeholder="Slug"
                wire:model.debounce.500ms="slug"
            />
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="blog-field">
            <label for="blog-category">Category</label>
            <select
                id="blog-category"
                wire:model="category_id"
                wire:change="changeCategory"
                class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
            >
                <option value="">Choose category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        @if ($showSubcategory)
            <div class="blog-field">
                <label for="blog-subcategory">Subcategory</label>
                <select
                    id="blog-subcategory"
                    wire:model="subcategory_id"
                    class="form-control"
                >
                    <option value="">Choose subcategory</option>
                    @foreach ($subcategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="blog-field">
            <label for="blog-tags">Tags</label>
            <small class="text-muted d-block mb-1">Hold Ctrl/Cmd to select multiple</small>
            <select
                id="blog-tags"
                wire:model="tags"
                class="form-control"
                multiple
                size="5"
            >
                @foreach ($blogTags as $tag)
                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="blog-field">
            <label for="blog-photo">Blog image</label>
            <div
                id="blog-image-preview-wrap"
                class="blog-image-preview mb-2"
                wire:ignore
                @if (! $this->image_preview_url) style="display: none;" @endif
            >
                <img
                    id="blog-image-preview-img"
                    src="{{ $this->image_preview_url ?: '' }}"
                    alt="{{ $title ?: 'Blog image preview' }}"
                />
            </div>
            <p
                id="blog-photo-selected-name"
                class="small text-muted mb-2"
                @if (! $photo || $this->image_preview_url) style="display: none;" @endif
            >
                @if ($photo)
                    Selected: {{ $photo->getClientOriginalName() }}
                @endif
            </p>
            <input
                id="blog-photo"
                type="file"
                class="form-control-file {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                accept="image/*"
            />
            <div wire:loading wire:target="photo" class="text-muted small mt-1">
                Uploading image…
            </div>
            @error('photo')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="blog-field">
            <label for="blog-meta">Meta description</label>
            <small class="text-muted d-block mb-1">Max 158 characters</small>
            <textarea
                id="blog-meta"
                wire:model.debounce.500ms="metaDescription"
                class="form-control {{ $errors->has('metaDescription') ? 'is-invalid' : '' }}"
                rows="4"
                placeholder="Enter meta description"
            ></textarea>
            @error('metaDescription')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="blog-field">
            <label>Body</label>
            <div wire:ignore class="blog-quill-wrap">
                <div id="blog-quill-editor">{!! $body !!}</div>
            </div>
            <input type="hidden" id="blog-body-sync" value="" />
        </div>

        <div class="blog-field">
            <label for="blog-link">Link</label>
            <input
                id="blog-link"
                type="text"
                class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}"
                placeholder="Optional URL"
                wire:model.debounce.500ms="link"
            />
            @error('link')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="blog-save-bar">
            <button
                type="button"
                class="btn btn-pullman"
                id="save-blog-btn"
                wire:loading.attr="disabled"
                wire:target="saveBlog"
            >
                <span wire:loading.remove wire:target="saveBlog">
                    {{ $blogId ? 'Update' : 'Save' }}
                </span>
                <span wire:loading wire:target="saveBlog">Saving…</span>
            </button>
            <p class="blog-save-hint text-muted small mb-0" wire:loading wire:target="saveBlog">
                Please wait — saving your post.
            </p>
        </div>
    </div>
</div>
