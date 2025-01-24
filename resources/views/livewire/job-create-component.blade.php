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
                                <h4>{{$jobId?'Update Job Post':'Add Job Post'}}</h4>
                            </div>
                            @include('livewire.job.create')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src={{ asset('ckeditor/ckeditor.js')}}></script>
    <script>
        const editor = CKEDITOR.replace('description');
        editor.on('change', function(event){
            // @this.set('description', event.editor.getData());
            document.getElementById('description').value=event.editor.getData();
        })

    </script>
</div>

