<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleRepository
{
    public function list(Request $request)
    {
        if ( $request->filled('search') ) {
            return Role::where('name', 'like', "%{$request->search}%")->paginate(10);
        }
        return Role::paginate(10);
    }
}
