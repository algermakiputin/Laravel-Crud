<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Person;

class AppController extends Controller
{
    public function index()
    {
    	$faker = \Faker\Factory::create();
    	 
    	$users = User::all();
    	return view('dashboard.dashboard', compact('users'));
    }
}
