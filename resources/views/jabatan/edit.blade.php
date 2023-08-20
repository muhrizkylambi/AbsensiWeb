@extends('layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Data Jabatan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('jabatan.update', $jabatan->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan') border-danger @enderror"
                                id="nama_jabatan" name="nama_jabatan"
                                value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" autocomplete="off"
                                placeholder="Nama Jabatan">
                            @error('nama_jabatan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ket_jabatan">Keterangan Jabatan</label>
                            <textarea class="form-control @error('ket_jabatan') border-danger @enderror" id="ket_jabatan" name="ket_jabatan" autocomplete="off" placeholder="Keterangan Jabatan" cols="30" rows="8">{{ old('ket_jabatan', $jabatan->ket_jabatan) }}</textarea>
                            @error('ket_jabatan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button class="btn btn-info">Tambah Data</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const currentRoute = "{{ $currentRoute }}";
    </script>
@endpush