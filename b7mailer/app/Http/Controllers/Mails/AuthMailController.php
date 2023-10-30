<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AuthMailController extends Controller
{
  public function sendRegisterMail()
  {
    $user = new User();

    $user->name = 'Alessandro K4';
    $user->password = '123';
    $user->email = 'test"teste.com';
    $user->save();

    $registerEmail = new RegisterEmail($user);

    // return $registerEmail;
    Mail::to('ti.dev.lavive@gmail.com')
      ->cc('email@gmail.com')
      ->bcc('email2@gmail.com')
      ->queue($registerEmail);

  }
}
