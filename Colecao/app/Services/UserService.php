<?php
 
 namespace App\Services;
 
 use Illuminate\Support\Facades\Auth;
 
 class UserService
 {
     public function login(array $login)
     {
         return Auth::attempt($login);
     }
 
     public function logout()
     {
         Auth::logout();
     }
 }