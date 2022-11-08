@if (session('success'))
    <div class="alert alert-success w-25 alert-display" role="alert">
        <h4 class="alert-heading">Success</h4>
        <p class="mb-0">{{ session('success') }}</p>
    </div>
@endif
