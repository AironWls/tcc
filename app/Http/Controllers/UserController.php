<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(private UserRepository $repository){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $list = $this->repository->list($request);
        return view('users.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        if ( !is_null( $user->id ) ) {
            return to_route('users.index')->with('message', 'Cadastrado com sucesso!');
        }
        return to_route('users.index')->with('message', 'Cadastrado com sucesso!')->with('alert-class','alert-warning');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(User $user)
    {
        if ( !is_null( $user->id ) ) {
            $user->status = 1 - $user->status;
            $user->save();
            return response()->json(['message' => 'Atualizado com sucesso!', 'rstatus' => $user->status]);
        }
        return response()->json(['message' => 'Usuário não encontrado!']);
    }

    public function destroySelected(Request $request)
    {
        User::destroy(array_values($request->id));
    }

    public function add_profile_to_user(User $user)
    {
        if ( !is_null( $user->id ) ) {
            $profiles = Profile::whereDoesntHave('users', function (Builder $query) use (&$user){
                $query->where('users.id', $user->id);
            })->get();
            return view('users.profile', compact('user', 'profiles'));
        }
        return to_route('users.index')->with('message', 'Usuário não encontrado!')->with('alert-class', 'alert-warning');
    }

    public function store_profile_to_user(Request $request, User $user)
    {
        if ( !is_null( $user->id ) ) {
            $user->profiles()->attach(array_values($request->profile_id), ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            return to_route('users.index')->with('message', 'Cadastrado com sucesso!');
        }
        return to_route('users.index')->with('message', 'Usuário não encontrado!')->with('alert-class', 'alert-warning');
    }
}
