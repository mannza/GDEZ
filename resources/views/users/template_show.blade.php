@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Pengguna</div>

                <div class="card-body">

                  @include('layouts.alerts')
<!-- Paparkan data users dalam table -->
<table class="table table-bordered table-striped">

  <thead>
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>EMAIL</th>
      <th>TELEFON</th>
        </tr>
  </thead>

  <tbody>

    @foreach( $senarai_users as $user )

    <tr>
      <td>{{ $user->id }} </td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->phone }}</td>
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
