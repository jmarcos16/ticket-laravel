@if (session('error'))
    <div class="alert alert-danger w-25 alert-display" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p class="mb-0">{{ session('error') }}</p>
    </div>
@endif
