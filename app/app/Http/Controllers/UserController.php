<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\Alies;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json('error',404);
        }
      
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'alias' => Alies::transforme($user->name) 
        ]);
    }
}
