@extends('layouts.app')

@section('content')
    <h1>Edit Pembelian</h1>
    <form method="POST" action="{{ route('pembelian.update', $pembelian->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kantor_id">Kantor</label>
            <select class="form-control" id="kantor_id" name="kantor_id" required>
                @foreach($kantors as $kantor)
                    <option value="{{ $kantor->id }}" {{ $pembelian->kantor_id == $kantor->id ? 'selected' : '' }}>{{ $kantor->nama_kantor }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="menu_id">Menu</label>
            <select class="form-control" id="menu_id" name="menu_id" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" data-harga="{{ $menu->harga_menu }}" {{ $pembelian->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->nama_menu }}</option>
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
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ $pembelian->total_harga }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update Pembelian</button>
    </form>
@endsection

@section('scripts')
    <script>
        function ftotal() {
            var menuId = document.getElementById('menu_id').value;
            var jumlahPorsi = document.getElementById('jumlah_porsi').value;
            var hargaPerPorsi = document.getElementById('menu_id').options[document.getElementById('menu_id').selectedIndex].getAttribute('harga_menu');
            
            var totalHarga = parseFloat(hargaPerPorsi) * parseInt(jumlahPorsi);

            document.getElementById('total_harga').value = totalHarga;
        }

        document.getElementById('menu_id').addEventListener('change', ftotal);
        document.getElementById('jumlah_porsi').addEventListener('input', ftotal);

        ftotal();
    </script>
@endsection