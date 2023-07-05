<?php

namespace App\Repositories\User;

interface UserRepository
{
    public function all(array $attributes);

    public function find($id);

    public function store(array $attributes);

    public function update($attributes, $id);

    public function destroy($id);
}
