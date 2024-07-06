@extends('layouts.app')

@section('content')
    <h1>Daftar Kantor</h1>
    <a href="{{ route('kantor.create') }}" class="btn btn-primary">Tambahkan Kantor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kantor</th>
                <th>Alamat Kantor</th>
                <th>Telp Kantor</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kantors as $kantor)
                <tr>
                    <td>{{ $kantor->nama_kantor }}</td>
                    <td>{{ $kantor->alamat_kantor }}</td>
                    <td>{{ $kantor->telp_kantor }}</td>
                    <td>
                        <a href="{{ route('kantor.edit', $kantor->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('kantor.destroy', $kantor->id) }}" method="post" style="display: inline;">
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