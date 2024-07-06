@extends('layouts.app')

@section('content')
    <h1>Daftar Daftar Order</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Daftar Order</th>
                <th>Nama Kantor</th>
                <th>ID Invoice</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->kantor->nama_kantor }}</td>
                    <td>{{ $order->invoice->id }}</td>
                    <td>
                        <a href="{{ route('daftarorders.show', $order->id) }}" class="btn btn-primary">Detail</a>
                        <form action="{{ route('daftarorders.destroy', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
