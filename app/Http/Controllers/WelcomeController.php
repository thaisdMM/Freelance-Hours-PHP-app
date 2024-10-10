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

      $user->update(['email_verified_at'=> now()->subMonths(10)]);

      dd($user->email_verified_at->diffForHumans());

      return view('teste.thais');
      

    }
}