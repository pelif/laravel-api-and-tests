<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Repository\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = collect($this->repository->findAll());

        return UserResource::collection($users);
    }

    public function paginate()
    {
        $response = $this->repository->paginate();

        return UserResource::collection($response->items())
                    ->additional([
                        'meta' => [
                            'total' => $response->total(),
                            'current_page' => $response->currentPage(),
                            'last_page' => $response->lastPage(),
                            'first_page' => $response->firstPage(),
                            'per_page' => $response->perPage()
                        ]
                    ]);
    }

    public function store(UserStoreRequest $request)
    {
        $user = $this->repository->create($request->all());

        return new UserResource($user);
    }

    public function show(string $email)
    {
        $user = $this->repository->find($email);

        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, string $email)
    {
        $user = $this->repository->update($email, $request->validated());

        return new UserResource($user);
    }

    public function destroy(string $email)
    {
        $this->repository->delete($email);
        return response()->noContent();
    }

}
