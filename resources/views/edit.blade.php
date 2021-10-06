@extends('layouts.header')
@section('content')
    <div class="m5"></div>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required="true" id="name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" class="form-control" name="email" required="true" id="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="address">address:</label>
                        <textarea name="address" id="address" class="form-control"
                            required="true">{{ $user->address->address }}</textarea>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('index') }}" class="btn btn-secondary ms-2">back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
