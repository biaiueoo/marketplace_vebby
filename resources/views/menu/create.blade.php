@extends('layouts.app')

@section('content')
    <h1>Tambah menu Baru</h1>
    <form action="{{ route('menu.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_menu">Nama menu</label>
            <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_menu">Deskripsi menu</label>
            <input type="text" class="form-control" id="deskripsi_menu" name="deskripsi_menu" required>
        </div>
        <div class="form-group">
            <label for="harga_menu">Harga menu</label>
            <input type="text" class="form-control" id="harga_menu" name="harga_menu" required>
        </div>
        <div class="form-group">
            <label for="foto">foto</label>
            <textarea class="form-control" id="foto" name="foto" required></textarea>
        </div>
        <div class="form-group">
            <label for="merchant_id">Merchant</label>
            <select class="form-control" id="merchant_id" name="merchant_id" required>
                @foreach($merchants as $merchant)
                    <option value="{{ $merchant->id }}">{{ $merchant->nama_merchant }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah menu</button>
    </form>
@endsection
