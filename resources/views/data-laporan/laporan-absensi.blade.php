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
                        <h3 class="card-title">Tabel Data Laporan Absensi</h3>
                        <select class="form-control col-2" name="ket_absensi" id="ket_absensi">
                            <option value="">Keterangan Absensi</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Perjalanan Dinas">Perjalanan Dinas</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tableBidang" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Lengkap</th>
                                <th>Absensi Masuk</th>
                                <th>Absensi Pulang</th>
                                <th>Keterangan Absensi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
