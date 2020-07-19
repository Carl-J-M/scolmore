<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Message;


class MessageController extends Controller
{
    public function create()
  {
      return view('create');
  }
    public function index()
  {
      $messages = Message::all();
      return view('index', compact('messages'));
  }
    public function store(Request $request)
  {
      $storeData = $request->validate([
      'number' => 'required|numeric',
      'message' => 'required|max:140'
      ]);
      $sms = Message::create($storeData);
      $this->sendSms($request);
      return $this->index();
  }
   public function sendSms(Request $request)
      {
      $sid    = env( 'TWILIO_SID' );
      $token  = env( 'TWILIO_TOKEN' );
      $client = new Client( $sid, $token );

      $validator = Validator::make($request->all(), [
        'number' => 'required',
        'message' => 'required'
      ]);
      if ( $validator->passes() ) {
             $numbers_in_arrays = explode( ',' , $request->input( 'number' ) );
             $message = $request->input( 'message' );
             $count = 0;
             foreach( $numbers_in_arrays as $number )
             {
                 $count++;
                 $client->messages->create(
                     $number,
                     [
                         'from' => env( 'TWILIO_FROM' ),
                         'body' => $message,
                         'statusCallback' => 'https://127.0.0.1/messages'
                     ]
                 );
             }
             return back()->with( 'success', $count . " messages sent!" );
         } else {
             return back()->withErrors( $validator );
         }
     }


}
