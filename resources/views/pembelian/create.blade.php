@extends('layouts.app')

@section('content')
    <h1>Create Pembelian</h1>
    <form method="POST" action="{{ route('pembelian.store') }}">
        @csrf
        <div class="form-group">
            <label for="kantor_id">Kantor</label>
            <select class="form-control" id="kantor_id" name="kantor_id" required>
                @foreach($kantors as $kantor)
                    <option value="{{ $kantor->id }}">{{ $kantor->nama_kantor }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="menu_id">Menu</label>
            <select class="form-control" id="menu_id" name="menu_id" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" data-harga="{{ $menu->harga_menu }}">{{ $menu->nama_menu }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="jumlah_porsi">Jumlah Porsi</label>
            <input type="number" class="form-control" id="jumlah_porsi" name="jumlah_porsi" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
            <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" required>
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

@section('scripts')
    <script>
        // Fungsi untuk menghitung total harga
        function calculateTotal() {
            var menuId = document.getElementById('menu_id').value;
            var jumlahPorsi = document.getElementById('jumlah_porsi').value;
            var hargaPerPorsi = document.getElementById('menu_id').options[document.getElementById('menu_id').selectedIndex].getAttribute('harga_menu');
            
            // Menghitung total harga
            var totalHarga = parseFloat(hargaPerPorsi) * parseInt(jumlahPorsi);

            // Memasukkan hasil perhitungan ke dalam input total_harga
            document.getElementById('total_harga').value = totalHarga;
        }

        // Event listener untuk menangkap perubahan pada input menu_id dan jumlah_porsi
        document.getElementById('menu_id').addEventListener('change', calculateTotal);
        document.getElementById('jumlah_porsi').addEventListener('input', calculateTotal);

        // Panggil fungsi pertama kali untuk inisialisasi nilai
        calculateTotal();
    </script>
@endsection
