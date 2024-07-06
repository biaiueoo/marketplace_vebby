@extends('layouts.app')

@section('content')
    <h1>Tambah Merchant Baru</h1>
    <form action="{{ route('merchant.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_merchant">Nama Merchant</label>
            <input type="text" class="form-control" id="nama_merchant" name="nama_merchant" required>
        </div>
        <div class="form-group">
            <label for="alamat_merchant">Alamat Merchant</label>
            <input type="text" class="form-control" id="alamat_merchant" name="alamat_merchant" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak Merchant</label>
            <input type="text" class="form-control" id="kontak" name="kontak" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Merchant</button>
    </form>
@endsection