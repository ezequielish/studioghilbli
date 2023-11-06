<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $request = "";
    protected $userData = "";
    protected $userlogged = null;
    protected $user_model = null;

    public function __construct(UserRequest $request)
    {
        if (true) {
            $this->userlogged = $this->dummy_data();
        }
        $this->request = $request;
        $this->user_model = $request->isMethod('post') ? new User() : $this->userlogged;
        $this->store();

    }

    private function dummy_data()
    {
        $user_model = new \stdClass();
        $user_model->name = "Misael";
        $user_model->email = "misa@g.com";
        $user_model->password = "eze1993";
        $user_model->delete = new \stdClass();
        return $user_model;
    }

    private function store()
    {
        $name = isset($this->request->name) ? $this->request->name : $this->userlogged->name;
        $email = isset($this->request->email) ? $this->request->email : $this->userlogged->email;
        $pwss = isset($this->request->pwss) ? $this->request->pwss : $this->userlogged->passord;

        $userData = [
            'name' => $name,
            'email' => $email,
            'pwss' => $pwss,
        ];

        $this->userData = $userData;

    }

    public function create_update()
    {
        try {
            $this->user_model->name = $this->userData['name'];
            $this->user_model->email = $this->userData['email'];
            $this->user_model->password = Hash::make($this->userData['pwss']);
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

    public function delete_user()
    {
        try {
            $this->user_model->delete;
            return response()->json([
                'error' => false,
                'message' => 'deleted user',
            ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
