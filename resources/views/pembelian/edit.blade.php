@extends('layouts.app')

@section('content')
    <h1>Edit Pembelian</h1>
    <form method="POST" action="{{ route('pembelian.update', $pembelian->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kantor_id">Kantor ID</label>
            <input type="text" class="form-control" id="kantor_id" name="kantor_id" value="{{ $pembelian->kantor_id }}" required>
        </div>
        <div class="form-group">
            <label for="menu_id">Menu ID</label>
            <select class="form-control" id="menu_id" name="menu_id" required>
                @foreach($pembelians as $p)
                    <option value="{{ $p->menu_id }}" {{ $p->menu_id == $pembelian->menu_id ? 'selected' : '' }}>{{ $p->menu_id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah_porsi">Jumlah Porsi</label>
            <input type="number" class="form-control" id="jumlah_porsi" name="jumlah_porsi" value="{{ $pembelian->jumlah_porsi }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
            <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" value="{{ $pembelian->tanggal_pengiriman }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection