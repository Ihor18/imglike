@props(['status'])

@if ($status)
    <div class="text-green-600">
        {{ $status }}
    </div>
@endif
