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
        editor.on('change', function(event){
            // @this.set('body', event.editor.getData());
            document.getElementById('body').value=event.editor.getData();
        });

        document.addEventListener('livewire:load', () => {
            window.livewire.on('handleblogImageUpload', () => {
                let inputField = document.getElementById('blogImage')
                try {
                    emitData(inputField);
                } catch (error) {
                    console.error(error);
                }
            });
        });

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

        // $(document).ready(function() {


        //     $('#category').change(function() {
        //         toggleShowSubcategory();
        //     });

        //     const toggleShowSubcategory = () => {
        //         let categorySlug = $('#category').attr('category-slug');

        //         if (categorySlug=="cop27"){
        //             $('.subcategory-wrapper').show();
        //         }else{
        //                console.log(categorySlug);
        //             $('.subcategory-wrapper').hide();
        //         }
        //     }
        //      toggleShowSubcategory();
        // });
    </script>
</div>

