<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

     public function usuarios_data(Request $request,$email)
    {   
        $datos = User::where('email', $email)->first();
        return $datos;
        //Esta función nos devolvera todas las temperaturas que tenemos en nuestra BD
    }
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
}
