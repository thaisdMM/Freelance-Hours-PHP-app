<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

      /* ou assim

      $user->email_verified_at = now();

      $user->save();

      dd($user->email_verified_at);

      */

      //OU


      $user->email_verified_at = now();

      $user->save();

      $user->update(['email_verified_at' => now()]);

      dd($user->email_verified_at);

      return view('teste.thais');
      

    }
}