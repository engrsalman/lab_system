<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserReport;
use Session;
use Auth;
use PDF;

class ReportController extends Controller
{

    public function AdminCreateReport(){
        return view('admin.create-report');
    }

    public function StoreAdminReport(Request $request){
         $userreport = new UserReport();
         $userreport->user_id          = Auth::id();
         $userreport->pat_number       = $request->patientno;
         $userreport->case_no          = $request->case_no;
         $userreport->Reg_date         = $request->reg_date;
         $userreport->Reg_time         = $request->reg_number;
         $userreport->Med_Rec_No       = $request->med_rec_number;
         $userreport->Name             = $request->name;
         $userreport->Guardian_name    = $request->f_name;
         $userreport->Age              = $request->age;
         $userreport->Sex              = $request->gender;
         $userreport->email            = $request->email;
         $userreport->cnic             = $request->cnic;
         $userreport->phone            = $request->phone_no;
         $userreport->address          = $request->address;
         $userreport->report_date      = $request->report_date;
         $userreport->report_time      = $request->report_time;
         $userreport->passport_no      = $request->passport_no;
         $userreport->flight_no        = $request->flight_number;
         $userreport->result           = $request->result;
         $userreport = $userreport->save();
        if($userreport){
            Session::flash('success','Report Inserted Successfully');
            return redirect()->route('admin.show.report');
         }
         else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        }
    }

    public function ShowAdminReports(){
         $admin = Auth::id();
         $UserReports = UserReport::where('user_id','=',$admin)->get();
         return view('admin.index',compact('UserReports'));
    }

    public function EditReport($id){

            $userreport = UserReport::findorFail($id);
            $created_at = $userreport->created_at->addhours(10);
            $report_time = date('Y-m-d H:i:s', strtotime($created_at));
            $currentTime = date('Y-m-d H:i:s', strtotime(\Carbon\Carbon::now()));
           if($currentTime < $report_time){
              return view('admin.report_edit',compact('userreport'));
           }
           else{
              Session::flash('error','Something Went Wrong');
             return redirect()->route('admin.show.report');
           }          
    }


    public function UpdateReport(Request $request, $id){

        $updatereport = UserReport::findorFail($id);

            $created_at = $updatereport->created_at->addhours(10);
            $report_time = date('Y-m-d H:i:s', strtotime($created_at));
            $currentTime = date('Y-m-d H:i:s', strtotime(\Carbon\Carbon::now()));
           if($currentTime > $report_time){
              Session::flash('error','Something Went Wrong');
             return redirect()->route('admin.show.report');
           }
        $updatereport->user_id          = Auth::id();
        $updatereport->pat_number       = $request->patientno;
        $updatereport->case_no          = $request->case_no;
        $updatereport->Reg_date         = $request->reg_date;
        $updatereport->Reg_time         = $request->reg_number;
        $updatereport->Med_Rec_No       = $request->med_rec_number;
        $updatereport->Name             = $request->name;
        $updatereport->Guardian_name    = $request->f_name;
        $updatereport->Age              = $request->age;
        $updatereport->Sex              = $request->gender;
        $updatereport->email            = $request->email;
        $updatereport->cnic             = $request->cnic;
        $updatereport->phone            = $request->phone_no;
        $updatereport->address          = $request->address;
        $updatereport->report_date      = $request->report_date;
        $updatereport->report_time      = $request->report_time;
        $updatereport->passport_no      = $request->passport_no;
        $updatereport->flight_no        = $request->flight_number;
        $updatereport->result           = $request->result;
        $updatereport = $updatereport->save();
        
        if($updatereport){
            Session::flash('success','Report Updated Successfully');
            return redirect()->route('admin.show.report');
        }
        else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        }
    }

    public function TrashReport($id){

        $deletereport = UserReport::findorFail($id);
        $created_at = $deletereport->created_at->addhours(10);
        $report_time = date('Y-m-d H:i:s', strtotime($created_at));
        $currentTime = date('Y-m-d H:i:s', strtotime(\Carbon\Carbon::now()));
    
        if($currentTime > $report_time){
            Session::flash('error','Something Went Wrong');
            return redirect()->route('admin.show.report');
        }
        $deletereport = $deletereport->delete();
         if($deletereport){
            Session::flash('success','Report Deleted Successfully');
            return redirect()->route('admin.show.report');
        }
        else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        }
    }

    public function downloadPdf($id){

        $showrecord = UserReport::find($id);
        $string = "C#: ".$showrecord->case_no."\n";
        $string.="P#: ".$showrecord->passport_no."\n";
        $string.="R#: ".$showrecord->result."\n";
        $string.="R Date#: ".\Carbon\Carbon::parse($showrecord->Reg_date)->format('d/m/Y')." ".\Carbon\Carbon::parse($showrecord->Reg_time)->format('h:i:s A')."\n";
        $string.="https:youtube.com";
        $qrcode = base64_encode(\QrCode::format('svg')->size(140)->errorCorrection('H')->generate($string));

        $pdf = PDF::loadView('admin.super_admin.user_reports.pdf', compact('showrecord','qrcode'));
        $file_name = $showrecord->Name.'.pdf';
        return $pdf->stream($file_name);
    }



   
}
