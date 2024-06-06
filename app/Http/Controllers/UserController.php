<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function edit(User $user)
    {
        
        if (Auth::id() !== $user->id && !Gate::allows('is-admin')) {
            abort(403, 'Brak uprawnień.');
        }

        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
{

    if (Auth::id() !== $user->id && !Gate::allows('is-admin')) {
        abort(403, 'Brak uprawnień.');
    }
    $input = $request->all();

    if ($request->hasFile('img')) {
        $imageData = file_get_contents($request->file('img')->getRealPath());
        $input['img'] = $imageData;
    }

    if (empty($request->password)) {
        unset($input['password']);
    } else {
        $input['password'] = bcrypt($input['password']);
    }

    $user->update($input);
    if (Gate::allows('is-admin')) {
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    return redirect()->route('candies.index')->with('success', 'User updated successfully');
}
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->role_id === 1) { 
            return Redirect::back()->withErrors(['message' => 'Nie można usunąć konta administratora.']);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Użytkownik został pomyślnie usunięty.');
    }
    

}