<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\admins\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserDataController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::select('id', 'name as full_name', 'email', 'role', 'status')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                    'role' => $user->role ?? 'User',
                    'current_plan' => 'Basic',
                    'billing' => 'Auto-debit',
                    'status' => $user->status ?? 1,
                    'avatar' => null
                ];
            });

        return response()->json([
            'data' => $users
        ]);
    }
} 