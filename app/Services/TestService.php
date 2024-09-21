<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TestService
{
    public function getUsers(): Collection {
        return User::query()->get();
    }
}
