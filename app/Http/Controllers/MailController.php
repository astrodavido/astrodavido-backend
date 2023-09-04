<?php

namespace App\Http\Controllers;

class MailController extends Controller
{
    public function sendAdminEmail()
    {
        $details = [
            'title' => 'astrodavido.com Admin Email',
            'body' => 'Test Email'
        ];
       
        \Mail::to('astro.davido84@gmail.com')->send(new \App\Mail\MyMail($details));
       
        dd("Email is Sent.");
    }
}
