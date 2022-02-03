<?php

namespace App\Http\Controllers\SuperAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserReport;
use Session;
use Auth;
use PDF;
class ReportController extends Controller
{

   public function CreateReport(){

      return view('admin.super_admin.user_reports.create');
   }

   public function StoreReport(Request $request){

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
            return redirect()->route('all-reports.show');
         }
         else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        }
   }

   public function ShowReports(){
         $UserReports = UserReport::all();
         return view('admin.super_admin.user_reports.index',compact('UserReports'));
   }

   public function EditReport($id){
        $userreport = UserReport::findorFail($id);
         return view('admin.super_admin.user_reports.edit',compact('userreport'));
   }

      public function UpdateReport(Request $request, $id){

         $updatereport = UserReport::findorFail($id);

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
            return redirect()->route('all-reports.show');
         }
         else{
            Session::flash('error','Something Went Wrong');
            return redirect()->back();
        }
   }

   public function TrashReport($id){

      $deletereport = UserReport::findorFail($id);
      $deletereport = $deletereport->delete();
      if($deletereport){
          Session::flash('success','Report Deleted Successfully');
            return redirect()->route('all-reports.show');
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
      $qrcode = base64_encode(\QrCode::format('svg')->size(120)->errorCorrection('H')->generate($string));
      $pdf = PDF::loadView('admin.super_admin.user_reports.pdf', compact('showrecord','qrcode'));
      $file_name = $showrecord->Name.'.pdf';
      return $pdf->stream($file_name);
   }
  
   public function test(){
      $id = 281;
      $showrecord = UserReport::find($id);
      $string = "C#: ".$showrecord->case_no."\n";
      $string.="P#: ".$showrecord->passport_no."\n";
      $string.="R#: ".$showrecord->result."\n";
      $string.="R Date#: ".\Carbon\Carbon::parse($showrecord->Reg_date)->format('d/m/Y')." ".\Carbon\Carbon::parse($showrecord->Reg_time)->format('h:i:s A')."\n";
      $string.="https:youtube.com";
      $qrcode = base64_encode(\QrCode::format('svg')->size(120)->errorCorrection('H')->generate($string));
     return View('admin.pdf_test', compact('showrecord','qrcode'));
     
   }
}
