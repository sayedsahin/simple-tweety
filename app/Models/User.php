<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens;
	use HasFactory;
	use HasProfilePhoto;
	use Notifiable;
	use TwoFactorAuthenticatable;
	use Followable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'username',
		'email',
		'password',
		'profile_photo_path',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
		'two_factor_recovery_codes',
		'two_factor_secret',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * The accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $appends = [
		'profile_photo_url',
	];
	public function avatar()
	{
		return '/storage/'.$this->profile_photo_path;
	}
	public function timeline()
	{
		$friends = $this->follows->pluck('id');
		return Tweet::whereIn('user_id', $friends)
			->orWhere('user_id', $this->id)
			->WithLikes()
			->orderByDesc('id')
			->paginate(20);

	}
	public function tweets()
	{
		return $this->hasMany(Tweet::class)->latest();
	}
	public function likes() {
		return $this->hasMany(Like::class); 
	}
	public function path($append='')
	{
		$path = route('profile', $this); // or $this->name
		return $append ? "{$path}/{$append}" : $path;
	}
	
}
