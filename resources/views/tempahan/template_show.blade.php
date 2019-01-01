@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Tempahan</div>

                <div class="card-body">

                  @include('layouts.alerts')


<!-- Paparkan data users dalam table -->
<table class="table table-bordered table-striped">

  <thead>
    <tr>
      <th>ID</th>
      <th>NAMA PENGGUNA</th>
      <th>NAMA LAB</th>
      <th>TARIKH</th>
      <th>MASA</th>
      <th>STATUS</th>
        </tr>
  </thead>

  <tbody>

    @foreach( $senarai_tempahan as $item )

    <tr>
      <td>{{ $item['id'] }} </td>
      <td>{{ $item->user->name }}</td>
      <td>{{ $item->lab->nama }}</td>
      <td>
        {{ $item['tarikh_mula'] }}
        sehingga
        {{ $item['tarikh_akhir'] }}
      </td>
      <td>
        {{ $item['masa_mula'] }}
        sehingga
        {{ $item['masa_akhir'] }}
      </td>
      <td>{{ $item['status'] }}</td>
    </tr>

    @endforeach

  </tbody>

</table>

{{ $senarai_tempahan->links() }}
</div>
</div>
</div>
</div>
</div>
@endsection
