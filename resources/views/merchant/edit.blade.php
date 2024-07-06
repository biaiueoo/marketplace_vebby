@extends('layouts.app')

@section('content')
    <h1>Edit Merchant</h1>
    <form action="{{ route('merchant.update', $merchant->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_merchant">Nama Merchant</label>
            <input type="text" class="form-control" id="nama_merchant" name="nama_merchant" value="{{ $merchant->nama_merchant }}" required>
        </div>
        <div class="form-group">
            <label for="alamat_merchant">Alamat Merchant</label>
            <input type="text" class="form-control" id="alamat_merchant" name="alamat_merchant" value="{{ $merchant->alamat_merchant }}" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak Merchant</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $merchant->kontak }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $merchant->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Merchant</button>
    </form>
@endsection