<html>
<head>
    <style>
        @page {
            margin: 0.6cm 0cm;
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
            left: 0.1cm;
            right: 0cm;
            height: 3cm;
        }
        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 60px;
            left: 10px;
            right: 0px;
            height: 80px;
        }
        .table_top{
            width: 7.3in;
            padding-top: 7px;
            padding-left: 9px;
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
            margin-left:20px;
        }
        .covid_heading{
            padding-top:-1% !important;

        }
        .heading{
            padding-top: 17px;
            margin-left: 20px;
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
        }
    </style>
</head>
<body>

<header>
    <table width="100%" class="heading" cellpadding=0 cellspacing=0>
        <thead>
        <tr>
            <td width="40%" style="border: 0px;padding-top: 13px; padding-left:19px">
                <img src="images/logo_pdf.jpg" alt="" style="width: 335px;height:86px">
            </td>
            <td width="37%" style="border: 0px; padding-top:13px;padding-left: 7px;">
                <p style="margin-bottom: -4px;padding-right: 10px;"><span style="font-size: 13px;font-family: verdana_bold !important;text-align:right;margin-left:-37px">Patient No.: </span></p>
                <span style="font-size: 12px;font-family: verdana;margin-left: -47%;letter-spacing: 3px;text-align:left;">{{$showrecord->pat_number}}</span>
                <br>
                <span style="font-size: 12px;font-family: verdana_bold !important;text-align:right;margin-left: -9px;">Case #: </span><br>
                <span style="font-size: 12px;font-family: verdana;margin-left: -25%;letter-spacing: 3px;text-align:left">{{$showrecord->case_no}}</span>
                <br>
            </td>
            <td width="23%" style="border: 0px;padding-top: 12px;padding-right: 15px">
                <img style="width: 1.172in;height: 1.019in;" src="data:image/png;base64, {!! $qrcode !!}">
            </td>
        </tr>
        </thead>
    </table>
</header>

<footer>
    <img src="images/footer_image.png" alt="" style="width: 99%;">
</footer>

<main class="main_content">
    <table class="table_top" cellpadding="-12px" cellspacing="-4px" style="font-family: verdana; font-size:11px;margin-bottom: -4px;">
        <tr>
            <td width="21.5%"><span style="font-family: verdana_bold !important">Medical Record No: </span></td>
            <td><span style="">{{$showrecord->Med_Rec_No}}</span></td>
            <td width="22%"><span style="font-family: verdana_bold !important;margin-left: 5px;">Registration Location: </span></td>
            <td><span style="margin-left: 1px;">Test Zone Peshawar</span></td>
        </tr>
        <tr>
            <td><span style="font-family: verdana_bold !important">Name: </span></td>
            <td><span style="">{{$showrecord->Name}}</span></td>
            <td width="22%"><span style="font-family: verdana_bold !important;margin-left: 5px;">Destination Location: </span></td>
            <td><span style="margin-left: 3px;">Test Zone Peshawar</span></td>
        </tr>
        <tr>
            <td width="21.5%"><span style="font-family: verdana_bold !important">Father/Husband Name </span></td>
            <td><span style="">{{$showrecord->Guardian_name}}</span></td>
            <td><span style="font-family: verdana_bold !important;margin-left: 5px;">Reference: </span></td>
            <td><span style="margin-left: 3px;">STANDARD</span></td>
        </tr>

        @php
            $age = date('Y-m-d H:i:s', strtotime($showrecord->Age));
            $date = new DateTime($age);
            $now = new DateTime();
            $newage = $now->diff($date);
        @endphp

        <tr>
            <td><span style="font-family: verdana_bold !important">Age/Sex: </span></td>
            <td><span style="">{{$newage->y.' year(s) / '.$showrecord->Sex}}</span></td>
            <td><span style="font-family: verdana_bold !important;margin-left: 5px;">Consultant: </span></td>
            <td><span style="margin-left: 3px;">KSAEMB</span></td>
        </tr>
        <tr>
            <td><span style="font-family: verdana_bold !important">Email: </span></td>
            <td><span style="">{{$showrecord->email}}</span></td>
            <td><span style="font-family: verdana_bold !important;margin-left: 5px;">Registration Date: </span></td>
            <td><span style="margin-left: 3px;">{{\Carbon\Carbon::parse($showrecord->Reg_date)->format('d-M-Y').'  '.\Carbon\Carbon::parse($showrecord->Reg_time)->format('g:i a')}}</span></td>
        </tr>
        <tr style="line-height:14px;">
            <td><span style="font-family: verdana_bold !important">NIC: </span></td>
            <td><span style="">{{$showrecord->cnic}}</span></td>
        </tr>
        <tr style="line-height:14px;">
            <td><span style="font-family: verdana_bold !important">Phone: </span></td>
            <td><span style="">{{$showrecord->phone}}</span></td>
        </tr>
        <tr style="line-height:14px;">
            <td><span style="font-family: verdana_bold !important;">Address: </span></td>
            <td><span style="">{{$showrecord->address}}</span></td>
        </tr>
        <tr style="line-height:20px;">
            <td><span style="font-family: verdana_bold !important">Passport: </span></td>
            <td><span style="">{{$showrecord->passport_no}}</span></td>
        </tr>
        <tr style="line-height:10px;">
            <td><span style="font-family: verdana_bold !important">Report Date: </span></td>
            <td><span style="">{{\Carbon\Carbon::parse($showrecord->report_date)->format('M j Y').'  '.\Carbon\Carbon::parse($showrecord->report_time)->format('g:iA')}}</span></td>
        </tr>
        <tr style="line-height:12px;">
            <td><span style="font-family: verdana_bold !important">Flight No: </span></td>
            <td><span style="">{{$showrecord->flight_no}}</span></td>
        </tr>
    </table>

    <hr size="7" class="header-hr" />
    <table class="multi_tables" style="width: 52%;margin-left: -15px">
        <tr>
            <td><p style="font-size: 14.5px;margin-top: -5px;margin-bottom: 10px;margin-left: 1px;" class="tahoma_font">MOLECULAR DIAGNOSTIC SECTION (SARS-CoV-2)</p></td>
        </tr>
        <tr>
            <td style="background-color: #C0C0C0;border-left: 1.3px solid black;border-top: 1.3px solid black;border-bottom: 1.3px solid black;border-right: 0.3px solid black;padding-left: 5px;">
                <p style="letter-spacing: 3px;margin-bottom: 3px;padding-top: 3px;height:16px;" class="tahoma_font" >TEST</p>
            </td>
        </tr>
    </table>
    <table class="multi_tables" style="width: 8%; margin-left: -4px;margin-top: 0%">
        <tr>
            <td style="border:1.3px solid black;">
                <p style="margin-left: -1px;margin-right:-1px;margin-top:-1px;background: #C0C0C0;text-align: center;border-bottom: 2px solid black;margin-bottom: -4px;" class="tahoma_font">RESULT</p>
                @php
                    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                @endphp
                <p style="text-align: center;width: 87px">
                    <img style="padding-top: 8px;width: 50px;height: 7px;max-height: 7px;max-width: 50px;" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($showrecord->case_no, $generatorPNG::TYPE_CODE_128)) }}">
                </p>
                <p style="padding-left:15px; padding-top:6.2px;padding-bottom:7px;margin-right:1px;margin-left: 3px;font-size: 10.5px;font-family: Arial !important;height: 10px;">{{$showrecord->case_no}}</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table width="100%" class="covid_heading" cellpadding=0 cellspacing=0>
        <tr>
            <td>
                <p style="font-size: 13px;margin-left: -6px;margin-top:-5px" class="tahoma_font">Covid-19 PCR Qualitaitve for Saudia Arabia</p>
            </td>
        </tr>
    </table>
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-left: -6px">
        <tr>
            <td width="52%" style="margin-left: -25px;">
                <p style="margin-top: 5px;font-size: 12px">Result</p>
            </td>
            <td><p style="font-size: 13px;margin-top: 5px" class="tahoma_font">{{$showrecord->result}}</p></td>
        </tr>
    </table>
    <br>
    <hr>
    <table width="70%" cellpadding="0" cellspacing="0" role="presentation" style="margin-left: -5px">
        <tr>
            <td>
                <p style="font-size: 12px;margin-bottom: 7px; margin-top: -4px;line-height: 10px;"><span style="font-size: 12px;" class="text_bold">RNA Extraction:</span> QIAamp DSP Virus spin kit version 1 by Qlagen Germany,
                    <br>
                    &nbsp;CE & IVD approved</p>
            </td>
        </tr>
    </table>
    <hr>
    <table width="80%" cellpadding="0" cellspacing="0" role="presentation" style="margin-left: -5px">
        <tr>
            <td>
                <p style="font-size: 12px;margin-bottom: 7px; margin-top: -4px;line-height: 10px;"><span style="font-size: 12px;" class="text_bold">RNA Amplification:</span> NML,SARS Cov-2 REal time PCR by Nuclear Laser
                    <br>
                    &nbsp;Medicine, Italy, CE & IVD</p>
            </td>
        </tr>
    </table>
    <hr>
    <style>
        .underline {
            display: inline-block;
            line-height: 0.6;
            border-bottom: 1px solid black;
        }
    </style>
    <span style="font-size: 12px;margin-left: -5px;margin-top: -5px;" class="text_bold underline">Comments:</span>
    <hr>
    <table width="83%" cellpadding="0" cellspacing="0" role="presentation" font-family="verdana" class="comments_content">
        <tr>
            <td style="line-height: 12px;">
                <br>
                <p style="font-size: 12px;margin-left: -2px">1.&nbsp;&nbsp; One or more Negative Results do not rule out the possibility of COVID-19
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; virus infection. A number of factors could lead to a Negative Result in an
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; infected individual, includeing.</p>
                <ul style="list-style-type: none;margin-top: 0px;margin-bottom: -4px;margin-left: 3px;">
                    <li><img src="images/icon.jpg" class="icon-image"><span style="font-size: 12px"> &nbsp;Poor Quality of Specimen, containing little patient material.</span></li>
                    <li><img src="images/icon.jpg" class="icon-image"><span style="font-size: 12px"> &nbsp;The specimen was collect later or very early in the infection</span></li>
                    <li><img src="images/icon.jpg" class="icon-image"><span style="font-size: 12px"> &nbsp;Technical reasons inherent in the test, e.g Virus mutation or
                        <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PCR inhibition.</span></li>
                </ul>
                <p style="font-size: 12px;margin-left: -2px;margin-top: 4px;margin-bottom: -4px;">2.&nbsp;&nbsp; If a Negative result is obtained from a patient with a high index of
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; suspicion or COVID-19 virus infection, particularly when only upper
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; respiratory tract specimen were collected, additional specimens, including
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; from the lower respiratory tract if possible, should be collected and tested.
                </p>
                <br>
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <br>
    <br>
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-left: -5px;">
        <tr>
            <td>
                <p style="font-size: 12px;margin-bottom: -17%;">Test Zone Diagnostic Centre is an approved medical laboratory to conduct <span class="text_bold">SARS-CoV2 (Covid-19) RNA PCR</span> by</p>
                <br>
                <p style="font-size: 12px;">Government of the <span class="text_bold">Kingdom of Saudi Arabia</span></p>
            </td>
        </tr>
    </table>
</main>

</body>
</html>
