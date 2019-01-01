@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Makmal</div>

                <div class="card-body">

                  @include('layouts.alerts')

<!-- Paparkan data users dalam table -->
<table class="table table-bordered table-striped">

  <thead>
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>STATUS</th>
          </tr>
  </thead>

  <tbody>

    @foreach( $senarai_lab as $item )

    <tr>
      <td>{{ $item->id}} </td>
      <td>{{ $item->nama}}</td>
      <td>{{ $item->status}}</td>
    </tr>

    @endforeach

  </tbody>

</table>
{{ $senarai_lab->links() }}

</div>
</div>
</div>
</div>
</div>
@endsection
