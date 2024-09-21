<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserIndexRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function index(UserIndexRequest $request): JsonResponse
    {
        $users = $this->userService->getAll();

        return response()->json([
            'users' => $users
        ]);
    }

    public function store(UserStoreRequest $request): JsonResponse
    {
        $user = $this->userService->create(
            $request->getName(),
            $request->getEmail(),
            $request->getPassword(),
        );

        return response()->json([
            'user' => $user
        ]);
    }

    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        $user = $this->userService->update(
            $id,
            $request->getName(),
            $request->getEmail(),
            $request->getPassword(),
        );

        return response()->json([
            'user' => $user
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $user = $this->userService->find($id);

        return response()->json([
            'user' => $user
        ]);
    }

    public function delete(int $id): Response
    {
        $this->userService->delete($id);

        return response()->noContent();
    }
}
