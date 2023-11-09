<div>
    @if (session() -> has('message_success'))
        <div class="alert alert-success" role="alert">
            {{ session('message_success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session() -> has('message_destroy'))
        <div class="alert alert-success" role="alert">
            {{ session('message_destroy') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
