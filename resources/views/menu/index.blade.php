@extends('layouts.app')

@section('content')
    
    <h1>List of menu</h1>
    <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah menu Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama menu</th>
                <th>deskripsi menu</th>
                <th>harga menu</th>
                <th>foto</th>
                <th>merchant_id</th>
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
                    <td>{{ $menu->merchant_id }}</td>
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