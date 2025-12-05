@if (session('success'))
<div class="alert-auto-hide bg-green-400/20 text-green-300 border border-green-600 px-4 py-2 mb-4 rounded-md text-center">
    {{ session('success') }}
</div>
@endif

