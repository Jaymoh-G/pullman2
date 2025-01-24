<div class="modal {{ $showDeleteMessage ? 'is-active' : '' }}">
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
            You are about to delete Job Post {{$this->jobId}}. Are you sure
            about this?

            <footer class="modal-card-foot">
                <button class="button is-danger" wire:click="deleteJob">
                    Yes
                </button>
                <button class="button" wire:click="closeModal">Cancel</button>
            </footer>
        </section>
    </div>
</div>
