<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Http\Request;
use Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $roles = Role::get();
        $users = User::filter($request->all())->orderByDesc('id')->paginate();
        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStore  $request
     *
     * @return mixed
     */
    public function store(UserStore $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        return redirect()->route('users.index')->with('success', __('Created user: :name', ['name' => $user->name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User          $user
     *
     * @return mixed
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdate  $request
     * @param  \App\Models\User               $user
     *
     * @return mixed
     */
    public function update(UserUpdate $request, User $user)
    {
        $validated = $request->validated();
        $data = $validated;
        unset($data['password']);
        if (!empty($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', __('Updated user: :name', ['name' => $user->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User          $user
     *
     * @return void
     * @throws \Exception
     */
    public function destroy(User $user): void
    {
        if (!$user->delete()) {
            throw new AccessDeniedHttpException;
        }
    }
}
