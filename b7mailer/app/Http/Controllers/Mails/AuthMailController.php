<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class AuthMailController extends Controller
{
  public function sendRegisterMail()
  {
    $registerEmail = new RegisterEmail();

    return $registerEmail;
    // Mail::to('ti.dev.lavive@gmail.com')->send($registerEmail);
  }
}
