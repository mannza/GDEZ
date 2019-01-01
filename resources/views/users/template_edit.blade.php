@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kemaskini User</div>

                <div class="card-body">

                  @include('layouts.alerts')

<form method="post" action="{{ route('users.update', $user->id) }}">
  @csrf
  @method('patch')

<div class="form-group">
  <label>NAMA</label>
  <input type="text" name="name" class="form-control" value="{{$user->name}}">
  {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>EMAIL</label>
  <input type="email" name="email" class="form-control" value="{{$user->email}}">
  {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
  <label>PASSWORD</label>
  <input type="password" name="password" class="form-control">
</div>

<div class="form-group">
  <label>TELEFON</label>
  <input type="text" name="phone" class="form-control" value="{{$user->phone}}">

</div>

<div class="form-group">
  <label>ROLE</label>
  <select name="role" class="form-control">
    <option value="student"{{ $user->role == 'student' ? 'selected=selected' : '' }}>STUDENT</option>
    <option value="staff"{{ $user->role == 'staff' ? 'selected=selected' : '' }}>STAFF</option>
    <option value="admin"{{ $user->role == 'admin' ? 'selected=selected' : '' }}>ADMIN</option>
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
