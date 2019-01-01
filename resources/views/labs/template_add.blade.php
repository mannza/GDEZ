@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Rekod Lab</div>

                <div class="card-body">

                  @include('layouts.alerts')

<form method="post" action="{{ route('lab.store') }}">
@csrf
<div class="form-group">
  <label>NAMA</label>
  <input type="text" name="nama" class="form-control">
  {!! $errors->first('nama', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>KAPASITI</label>
  <input type="text" name="kapasiti" class="form-control">
  {!! $errors->first('nama', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>STATUS</label>
  <select name="status" class="form-control">
    <option value="available">AVAILABLE</option>
    <option value="not_available">NOT AVAILABLE</option>
  </select>
</div>

<div>
  <button type="submit" class="btn btn-primary">SIMPAN</button>
</div>

</form>

</div>
</div>
</div>
</div>
</div>

@endsection
