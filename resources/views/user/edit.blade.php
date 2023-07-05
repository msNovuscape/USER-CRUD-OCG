<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('title')
Edit User
@endsection
@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control {{$errors->has('name') ? ' is-invalid' : '' }}" required>
                @error('name')
                <div class="alert-danger">
                    <span class="error">{{ $message }}</span>
                </div>    
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required class="form-control {{$errors->has('email') ? ' is-invalid' : '' }}">
                @error('email')
                <div class="alert-danger">
                    <span class="error">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ $user->address }}" required class="form-control {{$errors->has('address') ? ' is-invalid' : '' }}">
                @error('address')
                <div class="alert-danger">
                    <span class="error">{{ $message }}</span>
                </div>    
                @enderror
            </div>

            <div class="form-group birthday-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $user-> date_of_birth }}" max="{{ now()->format('Y-m-d') }}" class="form-control {{$errors->has('date_of_birth') ? ' is-invalid' : '' }}" required>
                    @error('date_of_birth')
                        <div class="alert-danger">
                            <span class="error">{{ $message }}</span>
                        </div>
                    @enderror
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection






