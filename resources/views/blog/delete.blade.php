<div
    class="modal fade {{ $showDeleteMessage ? 'show' : '' }}"
    id="blog-delete-modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="blog-delete-modal-title"
    aria-hidden="{{ $showDeleteMessage ? 'false' : 'true' }}"
    style="{{ $showDeleteMessage ? 'display: block;' : 'display: none;' }}"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blog-delete-modal-title">Delete</h5>
                <button
                    type="button"
                    class="close"
                    wire:click="closeModal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You are about to delete a post. Are you sure about this?
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    wire:click="closeModal"
                >
                    Cancel
                </button>
                <button
                    type="button"
                    class="btn btn-danger"
                    wire:click="deleteBlog"
                    wire:loading.attr="disabled"
                >
                    Yes, delete
                </button>
            </div>
        </div>
    </div>
</div>
@if ($showDeleteMessage)
    <div class="modal-backdrop fade show" wire:click="closeModal"></div>
@endif
