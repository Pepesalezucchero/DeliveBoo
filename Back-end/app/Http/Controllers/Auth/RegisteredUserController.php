<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RestautantStoreRequest;

use App\Models\Typology;
use App\Models\Restaurant;
use App\Models\Dish;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $typologies = Typology::all();
        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RestautantStoreRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $img = $data['image'];
            $img_path = Storage::disk('public')->put('images', $img);
        } else {
            $img_path = null;
        }
    
        $newRestaurant = new Restaurant;
        $userId = $user->id;
       
        $newRestaurant->name = $request->restaurant_name;
        $newRestaurant->address = $request->address;
        $newRestaurant->vat_number = $request->vat_number;
        $newRestaurant->image = $img_path;
        $newRestaurant->user_id = $userId;
        $newRestaurant->save();

        $newRestaurant->typologies()->attach($request->typologies);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
