@extends('layouts.app')
@section('title', 'Menu')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary">
            <h4 class="text-white">Menu</h4>
            <a href="{{ route('menu.create') }}" type="button" class="btn btn-primary float-end">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                        <tr class="pe-auto"
                            onclick="window.location.href = '{{ url('menu/' . $menu->id . '/edit') }}'"
                            style="cursor: pointer">
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->description }}</td>
                            <td>{{ $menu->image }}</td>
                            <td>{{ $menu->price }}</td>
                            <td>
                                <span class="badge {{ $menu->status == "1" ? 'bg-success' : 'bg-danger' }}">
                                    {{ $menu->status == "1" ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a type="button" class="btn btn-outline-warning btn-sm mb-2"
                                href="{{ route('menu.edit', $menu->id) }}">Edit</a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this menu?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mb-2" onclick="event.stopPropagation();">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No menu available</td>
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
