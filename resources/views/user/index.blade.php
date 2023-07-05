<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')

@section('title')
List Users
@endsection

@section('content')

    <div class="container">
        <h2>List Users</h2>

        <div class="mb-3">
            <strong>Filters:</strong>
            <a href="{{ route('users.index') }}">All</a> |
            <a href="{{ route('users.index', ['filter' => 'upcoming']) }}">Upcoming</a> |
            <a href="{{ route('users.index', ['filter' => 'upcoming_within_7_days']) }}">Upcoming within 7 Days</a> |
            <a href="{{ route('users.index', ['filter' => 'finished_last_7_days']) }}">Finished in Last 7 Days</a>
        </div>

        @if (session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>    
        @endif

        <div id="deletedMessage" class="alert alert-success" style="display: none;"></div>

        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Birthdate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr id = "user_{{$user->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->date_of_birth }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteUser({{$user->id}})" data-token="{{ csrf_token() }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script>
    function deleteUser(id){
        var isConfirmed = confirm('Are you sure you want to delete this user?');
        $('#successMessage').remove();

        if(isConfirmed){

            $.ajax({
                url: "/users/delete/"+id,
                type: "DELETE", 
                dataType: "JSON",
                success: function (response)
                {
                    $("#user_" + id).remove();
                    $('#deletedMessage').html(response.message).show().fadeOut(3000);
                }
            });
        }
    }
</script>

