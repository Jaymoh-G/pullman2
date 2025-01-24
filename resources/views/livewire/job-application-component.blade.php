<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right"></div>
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Job Applications
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            @include('job.applications')
                            <div
                                class="modal {{
                                    $showDeleteMessage ? 'is-active' : ''
                                }}"
                            >
                                <div class="modal-background"></div>
                                <div class="modal-card">
                                    <header class="modal-card-head">
                                        <p class="modal-card-title">Delete</p>
                                        <button
                                            wire:click="closeModal"
                                            class="delete"
                                            aria-label="close"
                                        ></button>
                                    </header>
                                    <section class="modal-card-body">
                                        You are about to delete this job
                                        application. Are you sure about this?

                                        <footer class="modal-card-foot">
                                            <button
                                                class="button is-danger"
                                                wire:click="delete({{
                                                    $jobId
                                                }})"
                                            >
                                                Yes
                                            </button>
                                            <button
                                                class="button"
                                                wire:click="closeModal"
                                            >
                                                Cancel
                                            </button>
                                        </footer>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
