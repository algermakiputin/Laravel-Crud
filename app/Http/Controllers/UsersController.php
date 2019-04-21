<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Persons;
use DB;

class UsersController extends Controller
{
    private $id = null;

    public function store(Request $request, User $user, Persons $person) {
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'gender' => 'required',
    		'status' => 'required',
    		'birthdate' => 'required',
    		'account_name' => 'required',
    		'email' => 'required',
    		'password' => 'required|same:password_confirmation', 
    		'password_confirmation' => 'required|same:password',
    	]);

        try {
            DB::transaction(function() use ($person, $user, $request) {
                $user_id = $user->store($request->all());
                $person->store($request->all(), $user_id);
                
            });
        } catch (Exception $e) {
            return abort(404);
        }
    	
    }

    public function get(Request $request) {
        $this->id = $request->post('id');
        $request->session()->put('euid', $this->id);
        return response()->json(User::where('id',$this->id)->with('person')->first());
    }

    public function update(Request $request, Persons $person) {
        $uid = $request->session()->get('euid');

        if ($person->updatePerson($request->all(), $uid))
            return redirect()->back();
       
        return "failed";
    }

    public function destroy(Request $request, User $user, Persons $person) {
        try {
            DB::transaction(function() use($request, $user,$person) {
                $user = $user->find($request->post('id'));
                $user->deletePerson();
                $user->delete();
            });
            return redirect()->back()->with('success', 'User has been deleted successfully.');
        } catch (Exception $e) {
            abort(404);
        }
    }


}
