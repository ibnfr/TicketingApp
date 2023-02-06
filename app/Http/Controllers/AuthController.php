<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @var TymonJWTAuthJWTAuth
     */
    // protected $jwt;

    // public function __construct(JWTAuth $jwt)
    // {
    //     $this->jwt = $jwt;
    // }

    // public function register(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|unique:users|max:255',
    //         'name' => 'required',
    //         'password' => 'required|min:6'
    //     ]);

    //     $email = $request->input("email");
    //     $name = $request->input("name");
    //     $password = $request->input("password");

    //     $hashPwd = Hash::make($password);

    //     $data = [
    //         "email" => $email,
    //         "name" => $name,
    //         "password" => $hashPwd
    //     ];



    //     if (User::create($data)) {
    //         $out = [
    //             "message" => "register_success",
    //             "code"    => 201,
    //         ];
    //     } else {
    //         $out = [
    //             "message" => "vailed_regiser",
    //             "code"   => 404,
    //         ];
    //     }

    //     return response()->json($out, $out['code']);
    // }

    // public function loginPost(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'    => 'required|email|max:255',
    //         'password' => 'required',
    //     ]);

    //     try {
    //         if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
    //             return response()->json(['user_not_found'], 404);
    //         }
    //     } catch (TokenExpiredException $e) {
    //         return response()->json(['token_expired'], $e->getStatusCode());
    //     } catch (TokenInvalidException $e) {
    //         return response()->json(['token_invalid'], $e->getStatusCode());
    //     } catch (JWTException $e) {
    //         return response()->json(['token_absent' => $e->getMessage()], $e->getStatusCode());
    //     }

    //     return response()->json(compact('token'));
    // }
}