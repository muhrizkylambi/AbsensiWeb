@extends('layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Data Bidang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('bidang.update', $bidang->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_bidang">Nama Bidang</label>
                            <input type="text" class="form-control @error('nama_bidang') border-danger @enderror"
                                id="nama_bidang" name="nama_bidang"
                                value="{{ old('nama_bidang', $bidang->nama_bidang) }}" autocomplete="off"
                                placeholder="Nama Bidang">
                            @error('nama_bidang')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ket_bidang">Keterangan Bidang</label>
                            <textarea class="form-control @error('ket_bidang') border-danger @enderror" id="ket_bidang" name="ket_bidang" autocomplete="off" placeholder="Keterangan Bidang" cols="30" rows="8">{{ old('ket_bidang', $bidang->ket_bidang) }}</textarea>
                            @error('ket_bidang')
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