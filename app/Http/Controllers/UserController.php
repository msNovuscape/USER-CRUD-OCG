<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    public function index(Request $request)
    {
        $users =  $this->user->all($request->all());
        return view('user.index',compact('users')); 
    }


    public function create(){
        return view('user.create');
    }

    public function store(StoreUserRequest $request){
        $data = $request->validated();
        $this->user->store($data);
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit($id){
        $user =  $this->user->find($id);
        return view('user.edit',compact('user'));
    }

    public function update(UpdateUserRequest $request, $id){
        $data = $request->validated();
        $this->user->update($data,$id);
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function show($id){
        $user = $this->user->find($id);
        return view('user.show',compact('user'));
    }

    public function destroy($id){
        $userDeleted = $this->user->destroy($id);

        if ($userDeleted) {
            return response()->json(['message' => 'User deleted successfully.'],200);
        } else {
            return response()->json(['message' => 'Failed to delete user'], 500);
        }
     
    }


}
