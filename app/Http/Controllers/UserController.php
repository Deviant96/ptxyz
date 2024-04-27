<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $user = auth()->user();

        if ($user->isAdmin()) {
            $users = User::all();
        } elseif ($user->isManager()) {
            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'supervisor');
            })->whereHas('companies', function ($query) use ($user) {
                $query->where('id', $user->company_id);
            })->get();
        } elseif ($user->isSupervisor()) {
            if ($user->companies->isNotEmpty()) {
                $users = $user->companies->first()->users;
            } else {
                $users = collect();
            }
        }
    

        return view('user.list', compact('users'));
    }
}
