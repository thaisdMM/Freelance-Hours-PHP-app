<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    
    {

      $user = User::query()->create([

         'name' => 'Thais',

         'email' => 'thais@email.com',

         'password' => 'jeremias',
      ]);

      dd($user);

      return view('teste.thais');
        
    }
}