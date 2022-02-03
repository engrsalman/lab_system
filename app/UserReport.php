<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
     protected $table = 'reports';

     protected $primaryKey = 'id';

     protected $fillable = ['user_id','pat_number','case_no','Reg_date','Reg_time','Med_Rec_No','Name','Guardian_name','Age','Sex','email','cnic','phone','address','report_date','report_time','passport_no','flight_no','result'];
}
