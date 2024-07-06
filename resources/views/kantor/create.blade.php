@extends('layouts.app')

@section('content')
    <h1>Create New Kantor</h1>

    <form action="{{ route('kantor.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_kantor">Nama Kantor</label>
            <input type="text" class="form-control" id="nama_kantor" name="nama_kantor" required>
        </div>
        <div class="form-group">
            <label for="alamat_kantor">Alamat Kantor</label>
            <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" required>
        </div>
        <div class="form-group">
            <label for="telp_kantor">Telp Kantor</label>
            <input type="text" class="form-control" id="telp_kantor" name="telp_kantor" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection