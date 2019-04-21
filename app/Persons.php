<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $fillable = [
    	'first_name', 'last_name', 'gender', 'birthdate', 'marital_status','user_id'
    ];

    public function store($request, $user_id) {
    	return $this->create([
    			'first_name' => $request['first_name'],
    			'last_name' => $request['last_name'],
    			'gender' => $request['gender'],
    			'birthdate' => $request['birthdate'],
    			'marital_status' => $request['status'],
                'user_id' => $user_id
    		]);
    }

    public function updatePerson($request, $uid) {
        return $this->where('user_id', $uid)
                    ->update([
                        'first_name'    =>  $request['first_name'],
                        'last_name'     =>  $request['last_name'],
                        'gender'        =>  $request['gender'],
                        'marital_status'    =>  $request['status'],
                        'birthdate'     => $request['birthdate']
                    ]);
    }
}
