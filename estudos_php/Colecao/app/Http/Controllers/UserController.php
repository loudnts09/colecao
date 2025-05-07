<?php

namespace App\Http\Controllers;
 
 use App\Services\UserService;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 
 class UserController extends Controller
 {
     private $userService;
 
     public function __construct(UserService $userService){
         $this->userService = $userService;
     }
 
     public function formLogin()
     {
         return view('formLogin');
     }
 
     public function login(Request $request)
     {
         if ($this->userService->login(['email' => $request->email, 'password' => $request->password])) {
             return redirect()->route('restrita');
         }
         return redirect()->back()->with(['mensagem' => 'E-mail ou senha inválidos!']);
     }
 
     public function logout()
     {
         $this->userService->logout();
         return redirect()->route('formLogin');
     }
 
     public function restrita()
     {
         return view('restrita');
     }
 }