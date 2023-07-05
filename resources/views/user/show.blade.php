@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                <p class="card-text"><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>

                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
            </div>
            
        </div>
    </div>
@endsection
