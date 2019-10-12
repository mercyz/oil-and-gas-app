<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Notifications\SendEmailToUser;
use App\Notifications\SendEmailToOutsider;
use App\User;
use App\Models\Inbox;

class AdminSendMessagesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }
    public function index(){
    	$inboxes = Inbox::orderBy('updated_at', 'ASC')->paginate(15);
    }
    public function createMessageForm(){ return view('pages.admin.mails.createMessages');}
    public function messageToUser(){return view('pages.admin.mails.messages');}

    //store Message and send to users
    public function storeMessage(Request $request){
    	$this->validate($request, [
    		'status' => 'required|min:1|max:2',
    		'subject' => 'required|min:10|max:255',
    		'body' => 'required|min:10|max:100000',
    	]);
    	if($request->status == 1){
    		$this->validate($request,[
    			'email' => 'required|email',
    		]);
    		$user = User::whereEmail($request->email)->firstOrFail();
    	}

    	session()->flash('message', "Message Sent to all Users Successful!");
        Session::flash('type', 'success');
        Session::flash('title', 'Message Send Success!');

    	return redirect()->route('adminMessage.create');
    }

    public function sendMessage(Request $request){
    	$this->validate($request, [
    		'status'=>'required|min:1|max:2',
    		'email' => 'required',
    		'subject' => 'required|min:10|max:255',
    		'body' => 'required|min:10|max:100000'
    	]);
    	if($request->status == 1){
    		$receipts = explode(',',$request->email);
    		// dd($receipts);
    		foreach($receipts as $receipt){
    			$user =  User::whereEmail($receipt)->first();
    			$data = (object) array(
    				'user_firstname' => $user->fristname,
    				'subject' => $request->subject,
    				'content' => $request->body,
    			) ;
    			$user->notify(new SendEmailToUser($data));
    		}
    		session()->flash('message', "Send Email to Users Successful!");
            Session::flash('type', 'success');
            Session::flash('title', 'Email Send Success!');

            return redirect()->route('adminEmail');

    	}else{
    		$receipts = explode(',', $request->email);
    		foreach($receipts as $receipt){
    			$data = (object) array(
    				'subject' =>$request->subject,
    				'content' =>$request->body,
    			);
    			(new User)->forceFill([
    				'email'=>$receipt,
    			])->notify(new SendEmailToOutsider($data));
    		}
    		session()->flash('message', 'Email Sent to Outsider Successfully!');
    		Session::flash('type', 'Success');
    		Session::flash('title', 'Email Sent Successfully');

    		return redirect()->route('adminEmail');
    	}
    }
}
