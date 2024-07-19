@extends('layouts.private.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Contact</div>
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-8">
                            <h4 class="card-title">Add Data</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('contact.create') }}" class="btn" style="background-color: #0DCA37; color:white;"><i class="fa fa-fw fa-plus"></i> Add</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th> <!-- Tambah kolom untuk aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->location }}</td> <!-- Menampilkan properti location -->
                                    <td>{{ $contact->email }}</td> <!-- Menampilkan properti email -->
                                    <td>{{ $contact->phone }}</td> <!-- Menampilkan properti phone -->
                                    <td>
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button> <!-- Tombol Hapus -->
                                        </form>
                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary">Edit</a> <!-- Tombol Edit -->
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
