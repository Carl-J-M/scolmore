<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Sms;


class SmsController extends Controller
{
    public function create()
  {
      return view('create');
  }
    public function index()
  {
      $messages = Sms::all();
      return view('index', compact('messages'));
  }
    public function store(Request $request)
  {
      $storeData = $request->validate([
      'number' => 'required|numeric',
      'message' => 'required|max:140'
      ]);
      $sms = Sms::create($storeData);
      return $this->sendSms($request);
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
                     ]
                 );
             }
             return back()->with( 'success', $count . " messages sent!" );
             // return $request->all();
         } else {
             return back()->withErrors( $validator );
         }
     }


}
