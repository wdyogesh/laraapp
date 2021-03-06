<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\SecurityQuestions;
use App\Models\ManagerBusinessDetails;
use App\Models\Employee;
use App\Models\RegisteredOtherParties;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Hashids;
use Mail;
use DB;

class OtherPartForgotPassword extends Controller {

	public function mailcheck(){
	    return view('frontend/other-party/forgot-password');
    }

    public function postMailcheck($subdomain,Request $request){
    //return $request->all(); 
    	$rules = array(
		'email' => 'required|email',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			if($request->ajax()){
			return response()->json($validator->getMessageBag(), 301);
			} else {
			return redirect()->back()->withErrors($validator)
			->withInput();
			}
			$this->throwValidationException(
			$request, $validator
			);
		}else{
            //return 'hai';
			$data= $request->all();
            $manager_id=ManagerBusinessDetails::where('businesss_name',$subdomain)->select('user_id')->first();
	        $manager_level_other_party_ids =RegisteredOtherParties::where('manager_id',$manager_id['user_id'])->pluck('other_party_id')->all();
	        $users=User::whereIn('id',$manager_level_other_party_ids)->where('email',$data['email'])->select('email','id')->first();
	        if(count($users) == 0){
	                if ($request->ajax()) {
	                $validator->errors()->add("login_error", "Soryy! you are not an other party user in our business");
	                     return response()->json($validator->getMessageBag(), 301);
	                 }else{
	                    return redirect()->back()->with('fail', 'Soryy! you are not an other party user in our business')->withInput();
	                 }
	          }elseif(count($users) == 1){
                 $url = url('other-party/regitered-security-questions-choosing/'.Hashids::encode($users['id']));
			    if ($request->ajax()){
		            return response()->json(array(
		              'success' => ' Mail find succes fully',
		              'modal' => true,
		              'redirect_url' => $url,
		              'status' => 200,
		              ), 200);
		        }else{
		            return redirect()->intended($url);
		        }	
            }else{
            	if ($request->ajax()) {
                   $validator->errors()->add("login_error", "Sorry you are entering wrong mail");
                   return response()->json($validator->getMessageBag(), 301);
                 }else{
                 	return redirect()->back()->with('fail', 'Sorry you are entering wrong mail')->withInput();
                 } 

            }
		   
	    }    
	    
    }

    public function enterSecurityQuestion($subdomain,$hashmanagerid){
    	 $employee_id = Hashids::decode($hashmanagerid)[0];
    	 $security_questions= SecurityQuestions::all();
    	 return view('frontend/other-party/remember-security-questions',compact('employee_id','security_questions'));
    } 

    public function checkSecurityQuestionAnswer(Request $request){
    	//return $request->all();
    	$rules = array(
		'user_security_questions' => 'required',
		'security_question_answer' => 'required',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			if($request->ajax()){
			return response()->json($validator->getMessageBag(), 301);
			} else {
			return redirect()->back()->withErrors($validator)
			->withInput();
			}
			$this->throwValidationException(
			$request, $validator
			);
		}else{
           // return 'hai';
			$data= $request->all();		           
            $manager_record = User::whereId($data['employee_id'])
                                    ->where('security_question_id',$data['user_security_questions'])
                                     ->where('answer',$data['security_question_answer'])
                                    ->first();                             		
            if(count($manager_record) == 1){
            	$url = url('other-party/password-setup/'.Hashids::encode($data['employee_id']));
            	if ($request->ajax()){
	            return response()->json(array(
	              'success' => 'Other Party  Correct',
	              'modal' => true,
	              'redirect_url' => $url,
	              'status' => 200,
	              ), 200);
		        }else{
		            return redirect()->intended($url);
		        }
            }else{
            	if ($request->ajax()) {
                   $validator->errors()->add("login_error", "Sorry you are entering wrong security question or answer, please click <a href='".url('other-party-send-forgot-credentials-request/'.$data['employee_id'])."'>here</a> to send request to your business for reset your credentials");
                   return response()->json($validator->getMessageBag(), 301);
                 }else{
                 	return redirect()->back()->with('fail', 'Sorry you are entering wrong security question or answer, please contact service team')->withInput();
                 } 
            	
            }                        	        
		}
    }

    public function passwordSetup($subdomain,$hashmanagerid){
    	$employee_id = Hashids::decode($hashmanagerid)[0];
    	return view('frontend/other-party/set-password',compact('employee_id'));
    }
    public function postSetupPassword(Request $request){
    	$messages = [
       
        "password.required" => "Password field is required",
        "password.min" => "Password minimum 8 digits, one capital, small, number, special character",
        "password.regex" => "Password minimum 8 digits,one capittal, small, number,special character.",
	     ];
	   
    	$rules = array(
		'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@]).*$/',
		'confirm_password' => 'required|same:password',
		);
		$validator = Validator::make($request->all(), $rules,$messages);
		if ($validator->fails()){
			if($request->ajax()){
			return response()->json($validator->getMessageBag(), 301);
			} else {
			return redirect()->back()->withErrors($validator)
			->withInput();
			}
			$this->throwValidationException(
			$request, $validator
			);
		}else{
           // return 'hai';
			$data= $request->all();		           
            $user_record = User::whereId($data['employee_id'])->first();
		    $user_record->update([
	                               'password' => bcrypt($data['password']),	
		                        ]);
		    if($user_record->role_id == 5){
		    	$url = url('other-party-login');
		    }                                                 			
			
			if ($request->ajax()){
	            return response()->json(array(
	              'success' => 'Password SetSuccessfully',
	              'modal' => true,
	              'redirect_url' => $url,
	              'status' => 200,
	              ), 200);
	        }else{
	           return redirect()->intended($url);
	        }
			        
		}
    }
}







