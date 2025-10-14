<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by admin status
        if ($request->has('is_admin')) {
            $query->where('is_admin', $request->boolean('is_admin'));
        }

        // Filter by email verification
        if ($request->has('email_verified')) {
            if ($request->boolean('email_verified')) {
                $query->whereNotNull('email_verified_at');
            } else {
                $query->whereNull('email_verified_at');
            }
        }

        $perPage = $request->get('per_page', 15);
        $users = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return response()->json(['success' => true, 'data' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'is_admin' => 'boolean',
        ]);

        $userData = $request->validated();
        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);

        return response()->json(['success' => true, 'data' => $user]);
    }

    public function show(User $user)
    {
        return response()->json(['success' => true, 'data' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'is_admin' => 'sometimes|boolean',
        ]);

        $userData = $request->validated();

        // Hash password if provided
        if (isset($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        }

        $user->update($userData);

        return response()->json(['success' => true, 'data' => $user]);
    }

    public function destroy(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->id === auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot delete your own account'
            ], 403);
        }

        $user->delete();

        return response()->json(['success' => true, 'message' => 'User deleted successfully']);
    }

    public function toggleAdminStatus(User $user)
    {
        // Prevent admin from changing their own admin status
        if ($user->id === auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot change your own admin status'
            ], 403);
        }

        $user->update(['is_admin' => !$user->is_admin]);

        return response()->json([
            'success' => true,
            'message' => 'Admin status updated successfully',
            'data' => $user
        ]);
    }

    public function verifyEmail(User $user)
    {
        if ($user->email_verified_at) {
            return response()->json([
                'success' => false,
                'message' => 'Email is already verified'
            ], 400);
        }

        $user->update(['email_verified_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'Email verified successfully',
            'data' => $user
        ]);
    }

    public function getAdmins()
    {
        $admins = User::where('is_admin', true)->orderBy('name')->get();

        return response()->json(['success' => true, 'data' => $admins]);
    }

    public function getRegularUsers()
    {
        $users = User::where('is_admin', false)->orderBy('name')->get();

        return response()->json(['success' => true, 'data' => $users]);
    }
}
