@extends('layouts.header')
@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="m-5">
        <div class="card">
            <div class="crad-header m-4">
                <a href="{{ route('user.create') }}" class="btn btn-primary">add a user</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $users )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->address->address }}</td>
                                <td><a href="{{ route('user.edit', $users->id) }}" class="btn btn-primary">edit</a><a
                                        href="{{ route('user.delete', $users->id) }}"
                                        class="btn btn-danger ms-2">delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td></td>
                                <td>No data found</td>
                                <td></td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">
            {{-- {!! $data->links() !!} --}}
        </div>
    </div>
@endsection
