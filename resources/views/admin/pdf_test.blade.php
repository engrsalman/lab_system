<html>
<head>
    <style>
        @page {
            margin: 0.5cm 0cm;
            height: 11in;
            width: 8.5in;
        }
        @font-face {
            font-family: 'verdana';
            src: url({{storage_path('fonts/verdana.ttf')}}) format("truetype");
            /*font-weight: 400;*/
            font-style: normal;
        }
        @font-face {
            font-family: 'Arial';
            src: url({{storage_path('fonts/arial/ARIAL.ttf')}}) format("truetype");
        }
        @font-face {
            font-family: 'verdana_bold';
            src: url({{storage_path('fonts/verdanab.ttf')}}) format("truetype");
            font-weight: 800 !important;
            font-style: normal;
        }
        @font-face {
            font-family: 'tahoma';
            src: url({{storage_path('fonts/tahoma/TAHOMAB0.ttf')}}) format("truetype");
            font-weight: 800 !important;
            font-style: normal;
        }
        .tahoma_font{
            font-family: tahoma !important;
        }
        .text_bold{
            font-family: verdana_bold !important;
        }
        /** Define now the real margins of every page in the PDF **/
        body {
            /*height: 13in;*/
            font-family: verdana !important;
            font-size: 11px;
            margin-top: 3.5cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }
        p {
            margin: 0pt;
        }
        h1, h2, h3, h4, h5, h6, p, span {
            font-family: 'verdana' !important;
        }
        td {
            vertical-align: top;
        }
        table thead td {
            text-align: center;
            border: 1px solid #ccc;
            font-variant: small-caps;
        }
        h2 {
            font-size: 12pt;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
    
        }
        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 50px;
            margin-left: 7px;
            right: 0px;
            height: 90px;
        }
        .table_top{
            width: 7.3in;
            padding-top: 9px;
            padding-left: 9px;
            line-height:15px;
            margin-left: 10px;
            margin-top: 33px;
        }
        .table_top2{
             width: 7.3in;
            padding-left: 9px;
            line-height:14px;
            margin-left: 7px;
            margin-top: 6px;
        }
        .table_three{
            border: 1 px solid;
            padding-left:-20px;
        }

        .header-hr{
            width:758px;
            margin-bottom: 7px;
            margin-top: 17px;
            margin-left: -6px !important;
            border: 0.001px solid #423c3c;
        }
        hr{
            width:69.2%;
            margin-left:-5px;
            border: 0.1px solid black;
        }
        .comments_content{
            margin-left:10px;
            border: 0.5 px solid grey;
            padding-top: 10px;

        }
        .covid_heading{
            padding-top:-1% !important;

        }
        .heading{
            margin-left: -105px;
            margin-bottom: 10px;

        }
        .main_content{
            margin-right:0px;
        }
        .multi_tables{
            float:left;
        }
        .icon-image{
            height: 10px;
            margin-right: 8px;
            width: 11px;
        }.small_tables{
            text-decoration: none !important;
            border: 1px solid black;
            margin-top: 8px;
            width: 90%;
            height: 50px;
        }
        .small_tables th {
            color: white;
            background-color: black;
            border :1px;
        }
        ..small_tables td{
            margin-top: 5px;
        }
    </style>
</head>
<body>

<header>
    <table width="100%"  class="heading" >
        <thead>
        <tr>
            <td style="margin-top:21px;border:none; width:970px; height:30px">
                <img src="images/header_new1.png">

               {{--  <img style="width: 1.172in;height: 1.019in;" src="data:image/png;base64, {!! $qrcode !!}"> --}}
            </td>
        </tr>
        </thead>
    </table>
</header>

<footer>
    <img src="images/footer_new.png" alt="" style="width: 100%; border:none;">
</footer>

<main class="main_content">
    <table class="table_top" cellpadding="-12px" cellspacing="-4px" style="font-family: verdana; font-size:11px;padding-bottom: 15px; border:1px solid black">
        <tr>
            <td width="18.5%"><span style="font-family: verdana_bold !important">Patient's Name: </span></td>
            <td><span style="font-family: verdana_bold !important;">SARBILAND KHAN</span></td>
            <td><span width="11%"></span></td>
            <td width="22%"><span style="font-family: verdana_bold !important;">Age / Sex: </span></td>
            <td><span style="font-family: verdana_bold !important">Test Zone Peshawar</span></td>
        </tr>
        <tr>
            <td><span style="font-family: verdana_bold !important">Lab no: </span></td>
            <td><span style="font-family: verdana_bold !important">{{$showrecord->Name}}</span></td>
            <td><span width="11%"></span></td>
            <td width="24%"><span style="font-family: verdana_bold !important;">Sample Collection Date: </span></td>
            <td><span style="font-family: verdana_bold !important" >Test Zone Peshawar</span></td>
        </tr>
        <tr>
            <td width="18.5%"><span style="font-family: verdana_bold !important">Pannel: </span></td>
            <td><span style="font-family: verdana_bold !important">{{$showrecord->Guardian_name}}</span></td>
            <td><span width="11%"></span></td>
            <td><span style="font-family: verdana_bold !important;">Report Date: </span></td>
            <td><span style="font-family: verdana_bold !important">STANDARD</span></td>
        </tr>

        @php
            $age = date('Y-m-d H:i:s', strtotime($showrecord->Age));
            $date = new DateTime($age);
            $now = new DateTime();
            $newage = $now->diff($date);
        @endphp

        <tr>
            <td><span style="font-family: verdana_bold !important">NIC #: </span></td>
            <td><span style="font-family: verdana_bold !important">{{$showrecord->email}}</span></td>
            <td><span width="11%"></span></td>
            <td><span style="font-family: verdana_bold !important;">Ref By: </span></td>
            <td><span style="font-family: verdana_bold !important">{{\Carbon\Carbon::parse($showrecord->Reg_date)->format('d-M-Y').'  '.\Carbon\Carbon::parse($showrecord->Reg_time)->format('g:i a')}}</span></td>
        </tr>
       
        <tr >
            <td><span style="font-family: verdana_bold !important;">Flight No: </span></td>
            <td><span style="font-family: verdana_bold !important">{{$showrecord->address}}</span></td>
            <td><span width="11%"></span></td>
            <td><span style="font-family: verdana_bold !important;">Flight Date: </span></td>
            <td><span style="font-family: verdana_bold !important">sa23545</span></td>
        </tr>
      
        <tr >
            <td><span style="font-family: verdana_bold !important">Phone: </span></td>
            <td><span style="font-family: verdana_bold !important">{{\Carbon\Carbon::parse($showrecord->report_date)->format('M j Y').'  '.\Carbon\Carbon::parse($showrecord->report_time)->format('g:iA')}}</span></td>
            <td><span width="11%"></span></td>
            <td><span style="font-family: verdana_bold !important;">Report Date: </span></td>
            <td><span style="font-family: verdana_bold !important">STANDARD</span></td>
        </tr>
        <tr >
            <td><span style="font-family: verdana_bold !important">Destination: </span></td>
            <td><span style="font-family: verdana_bold !important">{{$showrecord->flight_no}}</span></td>
            <td><span width="11%"></span></td>
            <td><span style="font-family: verdana_bold !important;">Ticket No: </span></td>
            <td><span style="font-family: verdana_bold !important">STANDARD</span></td>
        </tr>
    </table>
    

    <table class="table_top2" style="font-family: verdana; font-size:11px;padding-bottom: 20px; border:1px solid black;height:130px">
        <tr> 
            <td style="font-weight: bold;font-size: 16px;padding-left: 50px; padding-top: 25px;"><span style="text-decoration: underline;">ONLINE CREDENTIALS</span>
            
                 <table class="small_tables">
                     <tr>
                         <th>Login Id:</th>
                         <th>Password:</th>
                     </tr>
                     <tr style="padding-top: 12px">
                         <td>201021279</td>
                         <td>28608:</td>
                     </tr>
                 </table>
             </td>
            <td width="23%" style="border: 0px;padding-top: 9px;padding-right: 15px">
                <p style="font-weight: bold;">TRACK ONLINE</p><br>
                <img style="width: 1.0in;height: 1.0in;" src="data:image/png;base64, {!! $qrcode !!}">
            </td>
            <br>
            <td width="23%" style="border: 0px;padding-top: 9px;padding-right: 15px">
                <p style="font-weight: bold;">VERIFY PATIENT</p><br>
                <img style="width: 1.0in;height: 1.0in;" src="data:image/png;base64, {!! $qrcode !!}">
            </td>

         </tr>
    </table>
           
         


    <table class="multi_tables" style="width: 52%;margin-left: 25px">
        <tr>
            <td><p style="font-size: 14.5px;margin-top: 15px;margin-left: 1px;text-decoration: underline;" class="tahoma_font">2019-nCoV (Corona) Virus PCR</p></td>
        </tr>  
    </table>
    <br>


     <table  class="table_three" style="margin-top: 40px; padding-top: 3px;padding-right: -200px; margin-left: 20px;">
          <tr>
            <td ><span style="font-family: verdana_bold !important">Patient's Name: </span></td>
            <td><span style="font-family: verdana_bold !important;">SARBILAND</span></td>
            </tr>
                <tr>
      
            <td ><span style="font-family: verdana_bold !important;">Age / Sex: </span></td>
            <td><span style="font-family: verdana_bold !important">Zone Peshawar</span></td>
          </tr>
    </table>
         
    <br>
    <table width="100%" role="presentation" font-family="verdana" class="comments_content">
      
          <tr>
            <td style="padding-left:20px;font-weight: bold; font-size: 12px;"><p>Methodolgy:</p> <p><span style="margin-left: 13px;"> RNA Extraction:</span></p></td>
          </tr>

          <tr>
            <td style="padding-left:20px; font-size: 9px;padding-left: 32px;">
                RNA is isolated & purified using an automated nucleic acid extraction system based on magnetic particle technology.
            </td>
          </tr>

          <tr>
            <td style="padding-left:20px;font-weight: bold; font-size: 12px;">
                <p><span style="margin-left: 13px;">Amplification:</span></p>
            </td>
          </tr>

          <tr>
            <td style="padding-left:20px; font-size: 9px;padding-left: 32px;line-height: 7px;">
                Test is performed on a state of the art Real Time PCR system using the MutaPLEX* Coronavirus RT PCR kit from immunediagnostik, Germany. This kit contains specific primers & dual labelled prob for the amplification of RNA of SARS-Cov2 (RdRP gene & 5 gene) & the RNA of subgenus sarbecoviruses (E gene) extracted from biological samples of upper respiratory tract. Both E gene & RdRP gene are target sequence of the viral genome reommended by WHO. The simultenous detection of 3 target sequences (RdRP gene, S gene & E gene) increases the diagnostic reliability. even in case of target sequence mutations. Additionally Mutaplex kit contains control RNA (international process control, IPL) and a housekeeping gene (Beta-actin,multi species) to validate the quality of nucleic acid extraction & quality of sample collection and transport respectively.
            </td>
          </tr>

          <tr>
            <td style="padding-left:20px;font-weight: bold; font-size: 12px;"><p>Comments/Recommendations:</p></td>
          </tr>

          <tr>
            <td style="padding-left:20px; font-size: 9px;line-height:15px;padding-top: -12px;">
               <ul style="padding-left:10px;">
                   <li>A neagative result is must be interpreted along with clinical observation, paitents history and epidemilogical information.</li>
                   <li>A  single negative result might not exclude the possibilty of corona virus infection. A repeat test may be required if symptoms persist.</li>
                   <li>In case of positve result, it is strongly advised that patient should stay at home under self-quarantine and maintain social distancing along with additional testing as demmed neccessary by treating physician.</li>
                   <li>In case the patient develops shortness of breath he/she should immediately seekmediacl advise.</li>
                   <li>Results of PCR studies performed in one laboratory should not be compared with those performed in other labotratory as the kits/methodologies used in different laboratories may not have the same sensitivity and specify.</li>
               </ul>
            </td>
          </tr>
    </table>

    <table>
        <tr>
            <td>
                <span style="color:red;background-color: yellow;">NOTE: For External Quality Assurance We are participating in college of American Pathologist (CAP's) EQA Program for SARS-Cov-2.</span>
            </td>
        </tr>
       
    </table>
   
</main>

</body>
</html>
