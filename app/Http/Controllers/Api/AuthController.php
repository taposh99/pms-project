<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAuth;
use App\Http\Requests\RequestRegister;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function checkAuth(): JsonResponse
    {
        try {
            $user = '';
            if (auth()->check()) {
                $user = User::with('roles:user_id,name')->where('id', auth()->user()->id)->first();
                return sendSuccessResponse('User Authenticate', 200, $user);
            } else {
                return sendErrorResponse('User Unauthenticated', 404);
            }
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong : ' . $exception->getMessage(), 404);
        }
    }
    public function register(RequestRegister $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Corrected variable reference

            ]);
            $user->roles()->create([
                'name' => UserRole::ROLE_USER,
            ]);

            $success['token'] = $user->createToken('appToken')->plainTextToken;

            DB::commit();

            // Including token in the response

            return response()->json(['message' => 'User created successfully', 'user' => $user, $success], 200,);
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $exception->getMessage()], 400);
        }
    }



    public function login(RequestAuth $request): JsonResponse
    {
        try {
            $user = User::where('email', $request->email)->first();
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $data = [
                    'user' => $user->load('roles:user_id,name'),
                ];
            } else {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
            return sendSuccessResponse('Logged in Successfully!!', '200', [$success, $data]);
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }


    public function logout(Request $request)
    {
        try {
            $user = Auth::user();

            if ($token = $user->currentAccessToken()) {
                $token->delete();
                return sendSuccessResponse('Logout successfull');
            }
        } catch (Exception $exception) {
            return sendErrorResponse('Something went wrong: ' . $exception->getMessage());
        }
    }
}
