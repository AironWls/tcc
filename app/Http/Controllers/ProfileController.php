<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function __construct(private ProfileRepository $repository){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $list = $this->repository->list($request);
        return view('profiles.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->all());
        if ( !is_null( $profile->id) ) {
            return to_route('profiles.index')->with('message', 'Cadastrado com sucesso!');
        }
        return to_route('profiles.index')->with('message', 'Erro ao cadastrar!')->with('alert-class', 'alert-warning');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            return view('profiles.show', compact('profile'));
        }
        return to_route('profiles.index')->with('message', 'Registro não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            return view('profiles.edit', compact('profile'));
        }
        return to_route('profiles.index')->with('message', 'Registro não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->name = $request->name;
            $profile->save();
            return to_route('profiles.index')->with('message', 'Atualizado com sucesso!');
        }
        return to_route('profiles.index')->with('message', 'Registro não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->delete();
            return response()->json(['message' => 'Excluído com sucesso']);
        }
        return to_route('profiles.index')->with('message', 'Registro não encontrado!')->with('alert-class', 'alert-warning');
    }

    public function status(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->status = 1 - $profile->status;
            $profile->save();
            return response()->json(['message' => 'Atualizado com sucesso!', 'rstatus' => $profile->status]);
        }
        return to_route('profiles.index')->with('message', 'Registro não encontrado!')->with('alert-class', 'alert-warning');
    }

    public function destroySelected(Request $request)
    {
        Profile::destroy(array_values($request->id));
    }
}
