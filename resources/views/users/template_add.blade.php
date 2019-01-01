@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Rekod User</div>

                <div class="card-body">

                  @include('layouts.alerts')

<form method="post" action="{{ route('users.store') }}">
  @csrf

<div class="form-group">
  <label>NAMA</label>
  <input type="text" name="name" class="form-control">
  {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>EMAIL</label>
  <input type="email" name="email" class="form-control">
  {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>PASSWORD</label>
  <input type="password" name="password" class="form-control">
  {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>TELEFON</label>
  <input type="text" name="phone" class="form-control">
  {!! $errors->first('telefon', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>ROLE</label>
  <select name="role" class="form-control">
    <option value="student">STUDENT</option>
    <option value="staff">STAFF</option>
    <option value="admin">ADMIN</option>
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
