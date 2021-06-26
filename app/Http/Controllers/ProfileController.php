<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
    	//return $user;
    	return view('profiles.show', [
    		'user' => $user,
    		'tweets' => $user->tweets()->withLikes()->paginate(5),
    	]);
    }
    public function edit(User $user)
    {
    	//abort_if($user->isNot(current_user()), 404);
    	//or
    	//$this->authorize('edit', $user);
    	//or Route file: middleware('can:edit,user')
    	return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
    	$attributes = request()->validate([
    		'name' => ['string', 'required', 'max:255'],

    		'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],

    		'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
    		'avatar' => ['file'],

    		'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
    	]);
    	if (request('avatar')) {
    		$attributes['profile_photo_path'] = request('avatar')->store('profile-photos');
    	}
    	
    	$attributes['password'] = bcrypt($attributes['password']);
    	$user->update($attributes);
    	return redirect($user->path());
    }
}
