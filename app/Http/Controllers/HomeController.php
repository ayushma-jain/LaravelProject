<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMailRequest;
use App\Mail\SendMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
    public function loadDashboardView(){
        return view('components.dashboard');
    }

    public function loadGoogleMapView(){
        return view('components.map');
    }

    public function loadSendEmailView(){
        return view('components.mail');
    }

    public function loadPaymentGatewayView(){
        return view('components.payment_gateway');
    }

    public function sendMail(UserMailRequest $request){
       try{
            $validated = $request->validated();
        
            $tomail = isset($request->email) ? $request->email : "";
            $subject = isset($request->subject) ? $request->subject : "";
            $message = isset($request->message) ? $request->message : "";
            $status = Mail::to($tomail)->send(new SendMail(
                ['subject'=>$subject,'message'=>$message]
            ));
           
            if(!empty($status)){
                return redirect()->route('components.mail')->with(['success'=>'Mail Send Successfully']);
            }
            return redirect()->route('components.mail')->with($validated);
       }catch(Exception $e){
        echo $e->getMessage();
       }
        
        
    }
    
}
