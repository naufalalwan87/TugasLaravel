<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class MailController extends Controller
{
    public function send()
    {
    	Mail::to("user@biodata-mahasiswa.com")->send(new WelcomeEmail());

    	return response()->json("Email send successfully");
    }
}
