<div class="content-wrap">
    <style>
        .blog-create-form {
            max-width: 820px;
        }
        .blog-field {
            margin-bottom: 1.25rem;
        }
        .blog-field > label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.35rem;
            color: #222;
        }
        .blog-field .form-control,
        .blog-field .form-control-file,
        .blog-field select {
            width: 100%;
            min-height: 44px;
            max-width: 100%;
        }
        .blog-field textarea.form-control {
            min-height: 110px;
        }
        .blog-image-preview img {
            display: block;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
        .blog-quill-wrap {
            background: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .blog-quill-wrap .ql-toolbar {
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 4px 4px 0 0;
        }
        .blog-quill-wrap .ql-container {
            border: none;
            min-height: 220px;
            font-size: 16px;
        }
        .blog-quill-wrap .ql-editor {
            min-height: 220px;
        }
        .btn-pullman {
            background: #ee1c25;
            border-color: #ee1c25;
            color: #fff;
            min-height: 48px;
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            float: none;
            width: 100%;
        }
        .btn-pullman:hover,
        .btn-pullman:focus {
            background: #c4161e;
            border-color: #c4161e;
            color: #fff;
        }
        .btn-pullman:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .blog-save-bar {
            position: sticky;
            bottom: 0;
            z-index: 20;
            background: rgba(255, 255, 255, 0.97);
            border-top: 1px solid #e5e5e5;
            padding: 0.85rem 0;
            margin-top: 1.5rem;
        }
        .blog-create-error-summary ul {
            margin-top: 0.5rem;
        }
        @media (min-width: 768px) {
            .btn-pullman {
                width: auto;
                min-width: 160px;
            }
            .blog-save-bar {
                position: static;
                border-top: none;
                padding: 0;
                background: transparent;
            }
            .blog-quill-wrap .ql-container,
            .blog-quill-wrap .ql-editor {
                min-height: 280px;
            }
        }
    </style>

    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.blogs') }}">Latest</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ $blogId ? 'Edit' : 'Create' }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section id="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>{{ $blogId ? 'Update latest' : 'Create Latest' }}</h4>
                            </div>
                            @include('blog.edit')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
    <script>
        (function () {
            let quill = null;

            const getBlogBodyContent = () => {
                if (quill) {
                    return quill.root.innerHTML;
                }
                const el = document.getElementById('blog-quill-editor');
                return el ? el.innerHTML : '';
            };

            const initQuill = () => {
                const editorEl = document.getElementById('blog-quill-editor');
                if (!editorEl || typeof Quill === 'undefined') {
                    return;
                }
                if (editorEl.classList.contains('ql-container') || editorEl.querySelector('.ql-editor')) {
                    return;
                }

                quill = new Quill(editorEl, {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ header: [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline'],
                            [{ list: 'ordered' }, { list: 'bullet' }],
                            ['link'],
                            ['clean'],
                        ],
                    },
                    placeholder: 'Write the post body…',
                });
            };

            const bindSaveBlogButton = () => {
                const saveBtn = document.getElementById('save-blog-btn');
                if (!saveBtn || saveBtn.dataset.bound === '1') {
                    return;
                }
                saveBtn.dataset.bound = '1';
                saveBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    @this.call('saveBlog', getBlogBodyContent());
                });
            };

            document.addEventListener('livewire:load', () => {
                initQuill();
                bindSaveBlogButton();
            });

            document.addEventListener('DOMContentLoaded', () => {
                initQuill();
                bindSaveBlogButton();
            });

            if (window.livewire) {
                window.livewire.hook('message.processed', () => {
                    initQuill();
                    bindSaveBlogButton();
                });
            }
        })();
    </script>
</div>
