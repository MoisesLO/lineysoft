<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Autenticacion extends Controller
{
  public function index()
  {

    return view('entrar');
  }

  public function store(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'email' => 'required',
      'password' => 'required'
    ]);

    /*$validator = $request->validate([
      'email' => 'required',
      'password' => 'required'
    ]);*/


      if ($validator->fails()) {
        return redirect('entrar?modal=true$seguir=vamos')
          ->withErrors($validator)
          ->withInput()
          ->withInput();
      }
    return 'Datos correctos';
  }

}
