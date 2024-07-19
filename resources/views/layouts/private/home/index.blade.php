@extends('layouts.private.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Home</div>
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-8">
                            <h4 class="card-title">Add Data</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('home.create') }}" class="btn" style="background-color: #0DCA37; color:white;"><i class="fa fa-fw fa-plus"></i> Add</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hero</th>
                                    <th>Deskripsi</th>
                                    <th>Foto 1</th>
                                    <th>Foto 2</th>
                                    <th>Foto 3</th>
                                    <th>Action</th> <!-- Tambah kolom untuk aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($homes as $home)
                                <tr>
                                    <td><img src="{{ Storage::url($home->hero) }}" alt="Hero" style="width: 100px;"></td>
                                    <td>{{ $home->deskripsi }}</td>
                                    <td><img src="{{ Storage::url($home->foto1) }}" alt="Foto 1" style="width: 100px;"></td>
                                    <td><img src="{{ Storage::url($home->foto2) }}" alt="Foto 2" style="width: 100px;"></td>
                                    <td><img src="{{ Storage::url($home->foto3) }}" alt="Foto 3" style="width: 100px;"></td>
                                    <td>
                                        <form action="{{ route('home.destroy', $home->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button> <!-- Tombol Hapus -->
                                        </form>
                                        <a href="{{ route('home.edit', $home->id) }}" class="btn btn-primary">Edit</a> <!-- Tombol Edit -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection