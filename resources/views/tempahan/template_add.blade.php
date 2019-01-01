@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Rekod Tempahan</div>

                <div class="card-body">

                  @include('layouts.alerts')

<form method="post" action="{{ route('tempahan.store') }}">
@csrf

<div class="form-group">
  <label>PENGGUNA</label>
  <select name="user_id" class="form-control">

    @foreach ( $senarai_users as $user )
    <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach

  </select>
</div>

<div class="form-group">
  <label>MAKMAL</label>
  <select name="lab_id" class="form-control">

    @foreach ( $senarai_labs as $lab )
    <option value="{{ $lab->id }}">{{ $lab->nama }}</option>
    @endforeach

  </select>
</div>

<div class="form-group">
  <label>TARIKH MULA</label>
  <input type="date" name="tarikh_mula" class="form-control">
</div>

<div class="form-group">
  <label>TARIKH AKHIR</label>
  <input type="date" name="tarikh_akhir" class="form-control">
</div>

<div class="form-group">
  <label>MASA MULA</label>
  <input type="time" name="masa_mula" class="form-control">
</div>

<div class="form-group">
  <label>MASA AKHIR</label>
  <input type="time" name="masa_akhir" class="form-control">
</div>

<div class="form-group">
  <label>STATUS</label>
  <select name="status" class="form-control">

    <option value="LULUS">LULUS</option>
    <option value="TIDAK LULUS">TIDAK LULUS</option>

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
