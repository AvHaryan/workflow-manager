<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAll(): Collection
    {
        return User::query()->get();
    }

    public function create(string $name, string $email, string $password): User
    {
        /**
         * @var User
         */
        return User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    public function update(int $id, ?string $name, ?string $email, ?string $password): User
    {
        /**
         * @var User $user
         */
        $user = User::query()->findOrFail($id);

        if (!is_null($name)) {
            $user->name = $name;
        }

        if (!is_null($email)) {
            $user->email = $email;
        }

        if (!is_null($password)) {
            $user->password = Hash::make($password);
        }

        $user->save();

        return $user;
    }


    public function find(int $id): User
    {
        /**
         * @var User
         */
        return User::query()->findOrFail($id);
    }

    public function delete(int $id): void
    {
        User::query()->findOrFail($id)->delete();
    }
}
