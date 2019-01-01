@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Lab</div>

                <div class="card-body">

                  @include('layouts.alerts')

<p>
<a href="{{ route('tempahan.create') }}" class="btn btn-primary">Tambah Tempahan</a>
</p>

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
      <th>TINDAKAN</th>
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
      <td>

        <a href="{{ route('tempahan.edit', $item['id']) }}" class="btn btn-sm btn-primary">
          EDIT
        </a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$item->id }}">
          DELETE
        </button>

        <form method="post" action="{{ route('tempahan.destroy', $item->id) }}">
          @csrf
          @method('delete')

        <!-- Modal -->
        <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                ID: {{ $item->id }}
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

{{ $senarai_tempahan->links() }}
</div>
</div>
</div>
</div>
</div>
@endsection
