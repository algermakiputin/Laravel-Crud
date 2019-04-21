<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store($request) {
        return $this->create([
                'name' => $request['account_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']), 
                'role_id' => 1
            ])->id;
    }

    public function updateUser($request) {
        return $this->where('id', $request['id'])
                    ->update([
                        'name' => $request['name'] 
                    ]);
    }

    public function person() {
        return $this->hasOne('App\Persons');
    }

    public function deletePerson() {
        return $this->person()->delete();
    }



    
}
