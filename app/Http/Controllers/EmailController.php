<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail()
    {
        Mail::to('mail@appdividend.com')->send(new SendMailable());
        echo 'email sent';
    }
}
