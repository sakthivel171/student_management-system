@if ($errors->any())
<div class="alert-auto-hide bg-red-400/30 text-red-500 border border-red-500 px-4 py-3 rounded-md mb-4">
    <ul class="pl-5">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
