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
    $registerEmail = new RegisterEmail($user);

    // return $registerEmail;
    Mail::to('ti.dev.lavive@gmail.com')->send($registerEmail);
  }
}
