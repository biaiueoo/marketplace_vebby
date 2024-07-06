@extends('layouts.app')

@section('content')
    
    <h1>Daftar Menu</h1>
    <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama menu</th>
                <th>Deskripsi menu</th>
                <th>Harga menu</th>
                <th>Foto</th>
                <th>Nama Merchant</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ $menu->deskripsi_menu }}</td>
                    <td>{{ $menu->harga_menu }}</td>
                    <td>{{ $menu->foto }}</td>
                    <td>{{ $menu->merchant->nama_merchant }}</td>
                    <td>
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="display: inline;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection