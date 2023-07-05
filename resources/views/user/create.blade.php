<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('title')
Create User
@endsection
@section('content')
    <div class="container">
        <h1>Create User</h1>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control {{$errors->has('name') ? ' is-invalid' : '' }}">
                @error('name')
                <div class="alert-danger">
                    <span class="error">{{ $message }}</span>
                </div>    
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control {{$errors->has('email') ? ' is-invalid' : '' }}">
                @error('email')
                <div class="alert-danger">
                    <span class="error">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}" required class="form-control {{$errors->has('address') ? ' is-invalid' : '' }}">

                @error('address')
                <div class="alert-danger">
                    <span class="error">{{ $message }}</span>
                </div>    
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" max="{{ now()->format('Y-m-d') }}" class="form-control {{$errors->has('date_of_birth') ? ' is-invalid' : '' }}" required>

                    @error('date_of_birth')
                        <div class="alert-danger">
                            <span class="error">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection






