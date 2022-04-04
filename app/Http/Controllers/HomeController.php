<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){

    	if(Auth::id()){
    		if(Auth::user()->usertype=='0'){
                $doctor=doctor::all();
    			return view('user.userhome',compact('doctor'));
    		}
    		else{
    			return view('admin.home');
    		}

    	}
    	else{
    		return redirect()->back();
    	}
    }
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
        $doctor=doctor::all();
    	return view('user.userhome',compact('doctor'));
        }
    }
    public function docappointment(Request $req){
        $data =new appointment;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->date=$req->date;
        $data->docName=$req->docName;
        $data->number=$req->number;
        $data->message=$req->message;
        $data->status='In Progress';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','We Have Got You Details, We will come back to u soon.');
    }
    public function myAppoints(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
            $userId=Auth::user()->id;
            $appData=appointment::where('user_id',$userId)->get();
            return view('user.myDocAppoints',compact('appData'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function cancel_appoint($id){
         $candata=appointment::find($id);
            $candata->delete();

         return redirect()->back();
    }
}
