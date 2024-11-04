@extends('layouts.app')
@section('title', 'Categories')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary">
            <h4 class="text-white">Kategori</h4>
            <a href="{{ route('categories.create') }}" type="button" class="btn btn-primary float-end">Tambah</a>
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
                        <tr class="pe-auto"
                            onclick="window.location.href = '{{ url('categories/' . $category->id . '/edit') }}'"
                            style="cursor: pointer">
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <span class="badge {{ $category->status == "1" ? 'bg-success' : 'bg-danger' }}">
                                    {{ $category->status == "1" ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                                href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mb-2" onclick="event.stopPropagation();">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No categories available</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="{{asset('mazer/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>

<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

</script>
@endsection
