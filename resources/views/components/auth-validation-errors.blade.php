@props(['errors'])

@if ($errors->any())
    <ul class="text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
