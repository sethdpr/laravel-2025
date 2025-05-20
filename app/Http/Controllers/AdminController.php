<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('isAdmin');

        $users = User::all();
        return view('admin', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        $this->authorize('isAdmin');

        if (!$user->is_admin) {
            $user->is_admin = true;
            $user->save();
        }

        return redirect()->route('admin.index')->with('status', 'User is now an admin!');
    }
}
