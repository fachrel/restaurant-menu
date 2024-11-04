@extends('layouts.app')
@section('title', 'Kategori')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary">
                <h4 class="text-white">Kategori</h4>        
                <a href="{{ route('kategori.create') }}" type="button" class="btn btn-primary float-end">Tambah</a>
            </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                        <span class="badge {{ $category->status == "1" ? 'bg-success' : 'bg-danger' }}">{{ $user->status == "1" ? 'Active' : 'Inactive' }}</span>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No categories available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
