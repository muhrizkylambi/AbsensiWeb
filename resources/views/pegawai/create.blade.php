@extends('layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Input Data Pegawai</h3>
                </div>
                <form type="submit" method="post" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control @error('nip') border-danger @enderror"
                                                id="nip" name="nip" autocomplete="off" placeholder="Masukkan NIP">
                                            @error('nip')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('nama_lengkap') border-danger @enderror"
                                                id="nama_lengkap" name="nama_lengkap" autocomplete="off"
                                                placeholder="Masukkan Nama Lengkap">
                                            @error('nama_lengkap')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="no_tlp">No. Handphone</label>
                                            <input type="text"
                                                class="form-control @error('no_tlp') border-danger @enderror" id="no_tlp"
                                                name="no_tlp" autocomplete="off" placeholder="Masukkan No. Handphone">
                                            @error('no_tlp')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bidang_id">Bidang Pegawai</label>
                                            <select class="form-control" name="bidang_id" id="bidang_id">
                                                <option value="">--Silahkan Pilih--</option>
                                                @forelse ($bidang as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nama_bidang }}</option>
                                                @empty
                                                    <option disabled>Tidak Ada Data!</option>
                                                @endforelse
                                            </select>
                                            @error('bidang_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jabatan_id">Jabatan Pegawai</label>
                                            <select class="form-control" name="jabatan_id" id="jabatan_id">
                                                <option value="">--Silahkan Pilih--</option>
                                                @forelse ($jabatan as $row)
                                                    <option value="{{ $row->id }}">{{ $row->nama_jabatan }}</option>
                                                @empty
                                                    <option disabled>Tidak Ada Data!</option>
                                                @endforelse
                                            </select>
                                            @error('jabatan_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') border-danger @enderror"
                                                id="username" name="username" autocomplete="off"
                                                placeholder="Masukkan Username">
                                            @error('username')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text"
                                                class="form-control @error('password') border-danger @enderror"
                                                id="password" name="password" autocomplete="off"
                                                placeholder="Masukkan Password">
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') border-danger @enderror" id="alamat" name="alamat" autocomplete="off"
                                        placeholder="Masukkan Alamat" cols="30" rows="5"></textarea>
                                    @error('alamat')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center mb-3">Unggah Foto Pegawai</h5>
                                <div class="drop-zone">
                                    <span style="font-size: 25px;" class="drop-zone__prompt">Drop file here <br>
                                        or <br> click to
                                        upload</span>
                                    <input type="file" name="image" class="drop-zone__input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info float-right">Tambah Data</button>
                    </div>
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
