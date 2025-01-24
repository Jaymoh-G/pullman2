<div class="card-body">
    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="horizontal-form">
        <form
            class="form-horizontal"
            wire:submit.prevent="saveBlog(document.querySelector('#body').value)"
        >
            <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <small>Max: 60 characters</small>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Title"
                        wire:model="title"
                        wire:keyup="generateSlug"
                        required
                    />
                </div>
                @error('title')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Slug"
                        wire:model="slug"
                        required
                    />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                    <select
                        wire:model="category_id"
                        wire:change="changeCategory"
                        class="form-control"
                        id="category"
                        required
                    >
                        <option value="" selected>Choose category</option>
                        @foreach($categories as $category)
                        <option
                            value="{{$category->id}}"
                            category-slug="{{$category->slug}}"
                            selected
                        >
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @if($showSubcategory)
                <div  iv class="form-group subcategory-wrapper">
                    <label class="col-sm-2 control-label">Subcategory</label>
                    <div class="col-sm-10">
                        <select
                            wire:model="subcategory_id"
                            class="form-control"
                            id="subcategory"
                            required
                        >
                            <option value="" selected>Choose Subcategory</option>
                            @foreach($subcategories as $category)
                            <option
                                value="{{$category->id}}"
                                subcategory-slug="{{$category->slug}}"
                                selected
                            >
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label class="col-sm-2 control-label">Tags</label>
                <small>You can select multiple</small>
                <div class="col-sm-10">
                    <select
                        wire:model="tags"
                        class="form-control"
                        multiple="multiple"
                        style="height: 75pt"
                    >
                        <option value="">--select--</option>
                        @foreach($blogTags as $tag)
                        <option value="{{$tag->name}}">
                            {{$tag->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
                <label class="col-sm-2 control-label">Blog image</label>
                @if($blogId)
                <a href="{{ '/'.$tempImage }}" download
                    ><img
                        src="{{ '/'.$tempImage }}"
                        alt="{{ $title }}"
                        width="100"
                        height="100"
                /></a>
                @endif
                <div class="control has-icons-left has-icons-right">
                    <input
                        type="file"
                        class="form-control"
                        id="blogImage"
                        wire:change="$emit('handleblogImageUpload')"
                    />

                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                    @error('image')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Meta description </label>
                <small>Max: 158 characters</small>
                <div class="col-sm-9">
                    <textarea
                        wire:model="metaDescription"
                        cols="63"
                        rows="10"
                        placeholder="Enter meta description"
                    ></textarea>
                </div>
                @error('metaDescription')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" wire:ignore>
                <label class="col-sm-2 control-label">Body </label>
                <div class="col-sm-10">
                    <textarea
                        wire:key="editor-{{ now() }}"
                        id="body"
                        cols="63"
                        rows="10"
                        placeholder="Blog content."
                    >
                        {!! $body !!}</textarea
                    >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Link</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter link"
                        wire:model="link"
                    />
                </div>
                @error('link')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        {{ $blogId ? "Update" : "Save" }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
