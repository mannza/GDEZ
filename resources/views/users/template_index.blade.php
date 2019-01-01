@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Users</div>

                <div class="card-body">

                  @include('layouts.alerts')
<p>
<a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
</p>
<!-- Paparkan data users dalam table -->
<table class="table table-bordered table-striped">

  <thead>
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>EMAIL</th>
      <th>TELEFON</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

  <tbody>

    @foreach( $senarai_users as $user )

    <tr>
      <td>{{ $user->id }} </td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->phone }}</td>
      <td>
        <a href="{{ route('users.update', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$user->id }}">
          DELETE
        </button>

        <form method="post" action="{{ route('users.destroy', $user->id) }}">
          @csrf
          @method('delete')
        <!-- Modal -->
        <div class="modal fade" id="modal-delete-{{$user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Adakah anda bersetuju untuk menghapuskan data berikut?
                <br>
                Nama: {{$user->name }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Teruskan</button>
              </div>
            </div>
          </div>
        </div>
</form>
      </td>
    </tr>

    @endforeach

  </tbody>

</table>
{{ $senarai_users->links() }}
{{ $senarai_users->render() }}

</div>
</div>
</div>
</div>
</div>
@endsection
