<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\emailNotification;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function add_doc_view(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){

                return view('admin.add_doctor_view');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
    	
    }

    public function upload_doc_data(Request $req){
    	$doctor=new doctor;
    	
    	$image=$req->file; 
    	$imagename=time().'.png';
        // $image->getClientoriginalExtension();
    	$req->file->move('doctorimage',$imagename);
    	$doctor->name=$req->name;
    	$doctor->phone=$req->number;
    	$doctor->speciality=$req->speciality;
    	$doctor->room=$req->room;
    	
    	$doctor->image=$imagename;

    	$doctor->save();

    	return redirect()->back()->with('message','Successfully Uploaded Doctor Details.');
    }
    public function statusApp(){
        $data=appointment::all();
        if(Auth::id()){
            if(Auth::user()->usertype==1){

                return view('admin.statusApp',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

       
    }

    public function deleteAppoint($id){
        $dltApp=appointment::find($id);

        $dltApp->delete();

        return redirect()->back();
    }

    public function cancelSt($id){
        $canSt=appointment::find($id);
        $canSt->status='Cancelled';

        $canSt->save();
        return redirect()->back();

    }
    public function approveSt($id){
        $apSt=appointment::find($id);
        $apSt->status='Approved';

        $apSt->save();
        return redirect()->back();

    }
    public function showDoc(){
        $data=doctor::all();
        if(Auth::id()){
            if(Auth::user()->usertype==1){

                return view('admin.showDoc',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
        
    }
    public function deleteDoc($id){
        $dltData=doctor::find($id);

        $dltData->delete();

        return redirect()->back();
    }

    public function updateDoc(Request $req, $id){
        $upData=doctor::find($id);
        if(Auth::id()){
            if(Auth::user()->usertype==1){

                return view('admin.updateDoc',compact('upData'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

        

    }

    public function editDoc(Request $req,$id){
        $upData=doctor::find($id);

        $upData->name=$req->name;
        $upData->phone=$req->number;
        $upData->room=$req->room;
        $upData->speciality=$req->speciality;
        $image=$req->file;

        if($image){
            $imagename=time().'.png';
            // $image->getClientOriginalExtension();
            $req->file->move('doctorimage',$imagename);
            $upData->image=$imagename;
        }  

        $upData->save();

        return redirect()->back()->with('message','Updated Successfully!');

    }

    public function sendemailview($id){
        $data=appointment::find($id);
        if(Auth::id()){
            if(Auth::user()->usertype==1){

                return view('admin.sendemailview',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

        

    }
    public function sendemail(Request $req, $id){
        $data=appointment::find($id);

        $details=[
            'greeting'=>$req->greeting,
            'body'=>$req->body,
            'actiontext'=>$req->actiontext,
            'actionurl'=>$req->actionurl,
            'endpart'=>$req->endpart
        ];

        Notification::send($data,new emailNotification($details));

        return redirect()->back()->with('message','Send email Successfully!');
    }
}
