<div class="content-wrap" wire:ignore>
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
                                <li class="breadcrumb-item active">Newsletter</li>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>Mass send newsletter</h4>
                            </div>
                        <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                                <div class="horizontal-form">
                                    <form
                                        class="form-horizontal"
                                        wire:submit.prevent="massSendNewsLetter(document.querySelector('#body').value)"
                                    >
                                    <div class="form-group">
                                        <label
                                            class="col-sm-2 control-label"
                                            >Category</label
                                        >
                                        <div class="col-sm-10">
                                            <select wire:model="category" class="form-control" id="category" required>
                                                <option value="" selected>Choose category</option>
                                                <option value="all">All</option>
                                                <option value="newsletter">Newsletter</option>
                                                <option value="event">Event</option>
                                                <option value="job">Job</option>
                                                <option value="publication">Publication</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            class="col-sm-2 control-label"
                                            >Subject</label
                                        >
                                        <div class="col-sm-10">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Subject"
                                                wire:model="subject"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            class="col-sm-2 control-label"
                                            >Body
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea 
                                                wire:key="editor-{{ now() }}"
                                                id="body" 
                                                cols="63" 
                                                rows="10" 
                                                placeholder="Enter newsletter message."
                                            >{!! $body !!}</textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label
                                            class="col-sm-3 control-label"
                                            >Attachment</label
                                        >
                                        <div class="col-sm-9">
                                            <input
                                                type="file"
                                                class="form-control"
                                                placeholder="Attachment"
                                                wire:model="attachment"
                                            />
                                        </div>
                                    </div> --}}
                                        
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button
                                                    type="submit"
                                                    class="btn btn-default"
                                                >
                                                    Send newsletter
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </section>
        </div>
    </div>
    <script src={{ asset('ckeditor/ckeditor.js')}}></script> 
    <script> 
        const editor = CKEDITOR.replace('body');
        editor.on('change', function(event){
            // @this.set('body', event.editor.getData());
            document.getElementById('body').value=event.editor.getData();
        })
            
    </script>
</div>