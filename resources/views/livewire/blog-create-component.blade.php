<div class="content-wrap" >
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Latest</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>{{$blogId?'Update latest':'Create Latest'}}</h4>
                            </div>
                            @include('blog.edit')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src={{ asset('ckeditor/ckeditor.js')}}></script>
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script>
        const editor = CKEDITOR.replace('body');
        editor.on('change', function () {
            document.getElementById('body').value = editor.getData();
        });

        const getBlogBodyContent = () => {
            if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.body) {
                return CKEDITOR.instances.body.getData();
            }
            const bodyField = document.getElementById('body');
            return bodyField ? bodyField.value : '';
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
            window.livewire.on('handleblogImageUpload', () => {
                let inputField = document.getElementById('blogImage')
                try {
                    emitData(inputField);
                } catch (error) {
                    console.error(error);
                }
            });
            bindSaveBlogButton();
        });
        bindSaveBlogButton();

        const getFileNameData = (inputField, file) => {
            return {
                file_name: file.name,
                file_extension: file.name.split('.').pop(),
                file_name_without_extension: file.name.split('.').shift(),
                file_size: file.size,
            };
        }

        const emitData = (inputField) => {
            let file = inputField.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('set_file_data', getFileNameData(inputField, file));
                window.livewire.emit('file_upload', reader.result)
            }
            reader.readAsDataURL(file);
        }
    </script>
</div>

