<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{
    private static function get_scope_public(): array
    {
        return ["user_delete", "user_edit", "movie_fav"];
    }

    /**
     * We verify that a Bearer token is sent in the request and that it is a valid token
     */
    public static function user_autorized(Request $request): void
    {
        try {
            $user_auth = Auth::guard('api')->user(); //We save if there is a user with a session
            $token_request = $request->bearerToken();

            if (!method_exists(Auth::guard('api'), "user") || (method_exists(Auth::guard('api'), "user")
                && $user_auth == null)) {
                throw new \Exception("Unauthorized", 403);
            }

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public static function generate_public_token($user): array
    {
        $token = $user->createToken('public', self::get_scope_public())->plainTextToken;
        $data = [
            'token' => $token,
            'scope' => self::get_scope_public(),
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
        ];

        return $data;
    }

    public static function clear_user_token(String $name, $tokens = null)
    {
        if ($tokens !== null) {
            $tokens->tokens()->delete();
            return true;
        }

        Auth::guard('api')->user()->tokens()->where('name', $name)->delete();
    }

    public static function remmber_token(String $token, User $user): void
    {
        $user->remember_token = $token;
        $user->save();
    }
    public static function user_logged()
    {
        try {

            $id = Auth::guard('api')->user()->id;
            $user = User::find($id);
            return $user;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function refresh_token(String $old_token)
    {
        $user = User::where("remember_token", $old_token)->first();
        if (isset($user->email)) {
            $data = self::generate_public_token($user);
            self::remmber_token($data['token'], $user);
            return $data;
        }
        throw new \Exception("Unauthorized", 403);
    }

}
