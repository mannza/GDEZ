@if(session('ayat-success'))
<div class="alert alert-success" role="alert">
{{ session('ayat-success')}}
</div>
@endif

@if(session('ayat-bahaya'))
<div class="alert alert-danger" role="alert">
{{ session('ayat-bahaya')}}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
