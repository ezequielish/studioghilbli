<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Traits\AuthTrait;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $request = "";
    protected $user_data = "";
    protected $userlogged = null;
    protected $user_model = null;

    public function __construct(UserRequest $request)
    {
        if ($request->isMethod('put') || $request->isMethod('delete')) {
            $user = AuthTrait::user_logged();
            $this->userlogged = $user;
        }
        $this->request = $request;
        $this->user_model = $request->isMethod('post') ? new User() : $this->userlogged;
        $this->store();
    }

    // private function dummy_data()
    // {
    //     $user_model = new \stdClass();
    //     $user_model->name = "Misael";
    //     $user_model->email = "misa@g.com";
    //     $user_model->password = "eze1993";
    //     $user_model->delete = new \stdClass();
    //     return $user_model;
    // }

    private function store(): void
    {
        $name = isset($this->request->name) ? $this->request->name : $this->userlogged->name;
        $email = isset($this->request->email) ? $this->request->email : $this->userlogged->email;
        $pwss = isset($this->request->pwss) ? Hash::make($this->request->pwss) : $this->userlogged->password;

        $user_data = [
            'name' => $name,
            'email' => $email,
            'pwss' => $pwss,
        ];

        $this->user_data = $user_data;

    }

    public function create_update(): JsonResponse
    {
        try {
            $this->user_model->name = $this->user_data['name'];
            $this->user_model->email = $this->user_data['email'];
            $this->user_model->password = $this->user_data['pwss'];
            $this->user_model->save();
            $code = $this->request->method() == "POST" ? 201 : 200;
            return response()->json([
                'error' => false,
                'message' => 'created user.',
            ], 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete_user(): JsonResponse
    {
        try {
            $this->user_model->delete();
            AuthTrait::clear_user_token("public");
            AuthTrait::clear_user_token("admin");
            return response()->json([
                'error' => false,
                'message' => 'deleted user',
            ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
