<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Mail\VerificationEmail;
use App\Models\VerifyEmailModel;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmailsController extends Controller
{
    public function show(Request $request)
    {
        $url = self::rules_verify_email($request);
        $msg = $url ? "Your account has been successfully activated" : "invalid url";
        $image = $url ? Storage::disk('public')->url('verify_email/email_success.png') : Storage::disk('public')->url('verify_email/email_error.png');
        return view("verify_email", ["url" => $url, "msg" => $msg, "image" => $image]);
    }

    public static function handle_verify_email(object $data): void
    {
        try {
            $_data = [];
            $sender = new Address($data->email, $data->name);
            $_data['name'] = \ucfirst($data['name']);
            $_data['verification_url'] = env("APP_URL") . "verificate-email/" . self::save_varification_email_url($data->id);

            Mail::to($sender)->send(new VerificationEmail($_data));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private static function save_varification_email_url(int $user_id): string
    {
        $id_url = Str::random(60);
        $v_e = new VerifyEmailModel();
        $v_e->user_id = $user_id;
        $v_e->id_url = $id_url;
        $v_e->save();

        return $id_url;
    }

    private static function rules_verify_email(Request $request): bool
    {
        $str = $request->query('token');
        $user_id = $request->query('id');
        $url_exists = new VerifyEmailModel();
        $url_exists = $url_exists::where([["id_url", "=", $str], ["user_id", "=", $user_id]])->get();

        if (count($url_exists) > 0) {
            $verify_email = UserController::set_active_email($user_id);
            if ($verify_email) {
                $url_exists->each->delete();
            }
            return true;
        }
        return false;
    }
}
