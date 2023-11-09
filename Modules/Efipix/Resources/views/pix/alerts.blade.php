<div>
    @if (session() -> has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>