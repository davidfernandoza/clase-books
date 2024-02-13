<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Traits\UploadFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\User\UserRegisterRequest;

class RegisterController extends Controller
{
    use RegistersUsers;
    use UploadFile;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $defaultRole = 'user';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = new User($request->all());
            $user->save();
            $user->assignRole($this->defaultRole);
            $this->uploadFile($user, $request);
            Auth::login($user);
            DB::commit();
            return redirect($this->redirectPath());
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
