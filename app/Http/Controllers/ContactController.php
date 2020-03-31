<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use Mail;

class ContactController extends Controller
{
    public function contactPost(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'message' => 'required'
            ]);

           ContactUs::create($request->all());

           $data = array(
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
           );

           Mail::send('templates.contact-mail',  $data, function($message)
            {
                $message->from('gabor.mailtest@gmail.com');
                $message->to('xd.gaga@yahoo.com', 'Admin')->subject('[Yes-Contact-System] Mesaj nou de pe pagina de contact');
            });

           return back()->with('success', 'Mesajul dvs a fost trimis cu succes. Multumim!');
    }
}
