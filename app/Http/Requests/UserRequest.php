<?php

namespace App\Http\Requests;

use App\Http\Traits\AuthTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    protected $method_user_create = "POST";
    protected $method_user_update = "PUT";
    protected $method_user_delete = "DELETE";
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(FormRequest $request): bool
    {
        $autorized = [$this->method_user_update, $this->method_user_delete];
        if (in_array($request->method(), $autorized)) {
            AuthTrait::user_autorized($request);
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(FormRequest $request): array
    {
        $rules = [];
        $password_rules = Password::min(8)->letters()->mixedCase()->numbers()->symbols();
        if ($request->method() == $this->method_user_create) {
            $rules = [
                'name' => 'required|string|min:2|max:60',
                'email' => 'required|unique:users|email',
                'pwss' => ['required', $password_rules],
            ];
        }
        if ($request->method() == $this->method_user_update) {
            $rules = [
                'name' => 'max:255',
                'email' => ['email', Rule::unique('users')->ignore(Auth::guard('api')->user()->id)],
                'pwss' => ['nullable', $password_rules],
            ];
        }

        return $rules;
    }

    /**
     * Method that handles error messages when rules methods fails
     */
    protected function failedValidation(Validator $validator)
    {
        /**
         * validate  request body
         */
        $msg = [];
        if (method_exists($validator, "messages")) {
            foreach ((array) $validator->messages() as $k => $value) {
                if (\is_array($value)) {
                    foreach ($value as $key_v => $val) {
                        array_push($msg, $val[0]);
                    }
                }
            }
        }

        $msg = (count($msg) > 0) ? $msg[0] : "Internal Error";

        throw new \Exception($msg, 400);
    }

}
