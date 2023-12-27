<?php

namespace App\Http\Controllers;

use App\Http\Traits\AuthTrait;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $request = "";
    private $scope_public = ["user_delete", "user_edit", "movie_fav"];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    private function handle_generate_token(String $type, $user, $action = null): array
    {
        $remember_token = $action == "remember_token" ? $user : null;
        AuthTrait::clear_user_token($type, $remember_token);
        $data_token = AuthTrait::generate_public_token($user);
        AuthTrait::remmber_token($data_token['token'], $user);

        return $data_token;
    }

    public function user_token(): JsonResponse
    {
        try {
            $data_token = $this->handle_generate_token('public', $this->request->user());

            return response()->json([
                'error' => false,
                'message' => 'OK',
                'data' => $data_token,
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function refresh_token(String $token): JsonResponse
    {
        try {

            $token_exist = User::where('remember_token', $token)->get();

            if (count($token_exist) < 1) {
                throw new \Exception("Invalid token", 400);
            }

            $data_token = $this->handle_generate_token('public', $token_exist[0], "remember_token");

            return response()->json([
                'error' => false,
                'message' => 'OK',
                'data' => $data_token,
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
