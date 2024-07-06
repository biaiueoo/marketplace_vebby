@extends('layouts.app')

@section('content')
    <h1>Daftar Invoice</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Invoice</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->total_harga }}</td>
                    <td>
                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary">Detail</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display: inline;">
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
