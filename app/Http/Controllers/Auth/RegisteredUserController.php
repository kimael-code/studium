<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     * @todo Añadir los regex para nacionalidad y cédula.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id'     => 'required|integer',
            'nationality' => 'nullable|alpha|size:1',
            'id_national' => 'nullable|string|size:10',
            'names'       => 'nullable|string|size:256',
            'surnames'    => 'nullable|string|size:256',
            'birth_date'  => 'nullable|date',
            'email'       => 'required|string|email|max:255|unique:users',
            'password'    => 'required|string|confirmed|min:8',
        ]);

        $personID = null;

        if ($request->filled(['id_national', 'birth_date']))
        {
            $person = new Person();
            $person->nationality = $request->nationality;
            $person->id_national = $request->id_national;
            $person->names = $request->names;
            $person->surnames = $request->surnames;
            $person->birth_date = $request->birth_date;
            $person->save();
            $personID = $person->id;
        }


        $user = User::create([
            'role_id'   => $request->role_id,
            'person_id' => $personID,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
