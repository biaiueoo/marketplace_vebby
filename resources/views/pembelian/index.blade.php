@extends('layouts.app')

@section('content')
    <h1>Pembelian</h1>
    <a href="{{ route('pembelian.create') }}" class="btn btn-primary">Tambah merchant Baru</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kantor ID</th>
                <th>Menu ID</th>
                <th>Jumlah Porsi</th>
                <th>Tanggal Pengiriman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
                <tr>
                    <td>{{ $pembelian->kantor_id }}</td>
                    <td>{{ $pembelian->menu_id }}</td>
                    <td>{{ $pembelian->jumlah_porsi }}</td>
                    <td>{{ $pembelian->tanggal_pengiriman }}</td>
                    <td>
                        <a href="{{ route('pembelian.edit', $pembelian->id) }}" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection