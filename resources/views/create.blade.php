@extends('layouts.header')
@section('content')
    <div class="m5"></div>
    <div class="container">
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
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required="true" id="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" class="form-control" name="email" required="true" id="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="address">address:</label>
                        <textarea name="address" id="address" class="form-control"
                            >{{ old('address') }}</textarea>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('index') }}" class="btn btn-secondary ms-2">back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
