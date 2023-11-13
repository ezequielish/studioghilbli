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

    public function user_token(): JsonResponse
    {
        try {
            $data_token = AuthTrait::generate_public_token($this->request->user());
            AuthTrait::remmber_token($data_token['token'], $this->request->user());
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
