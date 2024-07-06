@extends('layouts.app')

@section('content')
    
    <h1>List of Merchant</h1>
    <a href="{{ route('merchant.create') }}" class="btn btn-primary">Tambah merchant Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Merchant</th>
                <th>Alamat Merchant</th>
                <th>Kontak Merchant</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merchants as $merchant)
                <tr>
                    <td>{{ $merchant->nama_merchant }}</td>
                    <td>{{ $merchant->alamat_merchant }}</td>
                    <td>{{ $merchant->kontak }}</td>
                    <td>{{ $merchant->deskripsi }}</td>
                    <td>
                        <a href="{{ route('merchant.edit', $merchant->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('merchant.destroy', $merchant->id) }}" method="post" style="display: inline;">
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