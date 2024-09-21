<?php

namespace App\Http\Controllers;

use App\Services\TestService;

class TestController extends Controller
{
    public function __construct(protected TestService $testService)
    {
    }

    public function index() {
       return view('index');
    }

    public function model() {
        $users = $this->testService->getUsers();
        return view('model', ['users' => $users]);
    }
}
