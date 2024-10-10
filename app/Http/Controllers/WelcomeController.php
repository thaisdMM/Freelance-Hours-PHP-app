<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    
    {

      $user = User::find(1);

      /*
      User::query()->create([

         'name' => 'Thais',

         'email' => 'thais@email.com',

         'password' => 'jeremias',
     
     
      ]); */

      Auth::login($user);

      return view('teste.thais');
      

    }
}