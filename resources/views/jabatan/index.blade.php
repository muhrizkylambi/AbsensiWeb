@extends('layouts.main')
@section('container')
<div class="row">
    <div class="col-12">
      @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ session('status') }}
                </div>
            @endif
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Tabel Data Jabatan Pegawai</h3>

          <a href="{{ route('jabatan.create') }}" class="btn btn-primary" ><i class="fas fa-plus mr-2"></i>Tambah Data
          </a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tableJabatan" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No.</th>
              <th>Jabatan Pegawai</th>
              <th>Keterangan Jabatan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($jabatans as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $row->nama_jabatan }}</td>
                  <td>{{ $row->ket_jabatan }}</td>
                  <td>
                      <a class="btn btn-success btn-sm" href="{{ route('jabatan.edit', $row->id) }}"> <i class="fas fa-edit"></i> Edit</a>
                      <form action="{{ route('jabatan.destroy', $row->id) }}" method="post"
                          class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm hapus-jabatan" name="{{ $row->nama_jabatan }}" type="submit"> <i class="fas fa-trash"></i> Hapus</button>
                      </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    </div>
    <!-- /.col -->
  </div>
@endsection