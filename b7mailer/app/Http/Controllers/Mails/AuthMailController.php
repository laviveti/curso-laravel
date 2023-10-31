<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Jobs\SendAuthMail;
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
    $user->email = 'test19932@teste.com';
    $user->save();

    SendAuthMail::dispatch($user);
  }
}
