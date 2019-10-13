<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Mail\Contact;
use App\Models\ContactMail;
use Mail;

class ContactMailsController extends Controller
{
      public function index(){
    	return view('pages.front.contact');
    }
    public function create(){
    	return view('pages.front.contact.create');
    }
    public function sendMessage(Contact $contact){
    	$contact = request()->validate([
    		'name'=>'required|string',
    		'email' => 'required|string',
    		'phone' => 'required|string',
    		'messages' => 'required|string',
    	]);
    	$creatMessage = ContactMail::create($contact);
    	Mail::send('pages.front.contact.message', array(
    		'name' => request()->get('name'),
    		'email' => request()->get('email'),
    		'phone' => request()->get('phone'),
    		'messages' => request()->get('messages'),
    	), function($contactMessage){
    		$contactMessage->from('surevisco@gmail.com');
    		$contactMessage->to('surevisco@gmail.com')->subject('Contact Us');
    	});
			Session::flash('message', 'Thank you for getting in touch with us, we\'ll revert back to you soon');
			Session::flash('alert-class', 'alert-success');
			return back();
    }
}
