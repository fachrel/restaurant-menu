@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary">
                <h4 class="text-white">Users</h4>        
                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary float-end">Tambah</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="pe-auto" onclick="window.location.href = '{{ url('users/' . $user->id. '/edit') }}'" style="cursor: pointer">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->status == "1" ? 'bg-success' : 'bg-danger' }}">{{ $user->status == "1" ? 'Active' : 'Inactive' }}</span>
                                </td>
                            </tr>
                        @endforeach
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