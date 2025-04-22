<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TesteController extends Controller
{
    public function users(){
        $output = [];
        $users = User::orderBy('name')->get();
        foreach($users as $user){
            if($user->id % 2 == 0){
                $output[] = $user->name;
            }
        }
        return $output;
    }
}
