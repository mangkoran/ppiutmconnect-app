<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class CampaignController extends Controller
{
    public function campaignList(Request $r){
        $campaigns = Campaign::all();

        return view('layouts.blasting.list_blasting', compact('campaigns'));
    }

    public function campaignSession(Request $r){
        
        if($r->has('name')){
            $ctitle=$r->name;
            $r->session()->put('campaign_title', $ctitle);
        }
        if($r->has('total_receiver')){
            $creceiver=$r->total_receiver;
            $r->session()->put('total_receiver',$creceiver);
        }
        if($r->has('id_contact')){
            $ccontact=$r->id_contact;
            $r->session()->put('id_contact', $ccontact);
        }
        if($r->has('subject')){
            $csubject=$r->subject;
            $r->session()->put('subject', $csubject);
        }
        if($r->has('host')){
            $chost=$r->host;
            $r->session()->put('host', $chost);
        }
        if($r->has('email')){
            $cemail=$r->email;
            $r->session()->put('senderemail', $cemail);
        }
        if($r->has('password')){
            $cpassword=$r->password;
            $r->session()->put('senderpassword', $cpassword);
        }
        if($r->has('port')){
            $cport=$r->port;
            $r->session()->put('port', $cport);
        }
        
    }

    public function contactList(Request $r){
        $contacts = DB::table('member')
                    ->join('grant_access', 'member.access_grant', '=', 'grant_access.grant_id')
                    ->select('member.*', 'grant_access.grant_desc')->get();
        return view('layouts.blasting.choose_recipients', compact('contacts'));
    }

    public function addImg(Request $r){
        // $r->validate(['img'=>'required|mimes:jpg, jpeg, png, gif|max:300000']);
        $img=$r->file('img_file');
        // $imgID=$r->file('id_img');
        $imgID=$r->input('id_img');
        $imgname=$img->getClientOriginalName();
        $path=public_path().'/images/campaign/';
        $img->move($path,$imgname);
        
        session()->put('path_img_'.$imgID, '/images/campaign/'.$imgname);

        // session()->push('path_img_'.$imgID, $path);
        // echo json_encode(session()->get('path_img_'.$imgID));

    }

    public function sendCampaign(Request $r){
        if(session()->has('subject')&&session()->has('senderemail')&&session()->has('id_contact')){
            $mail=new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $senderemail=session()->get('senderemail');
            $senderpassword=session()->get('senderpassword');
            $host=session()->get('host');
            $port=session()->get('port');
            $email;
            $name;
            $subject = session()->get('subject');
            $contacts= session()->get('id_contact'); 
            $ctitle=session()->get('campaign_title');
            $total_receiver=session()->get('total_receiver');
            $imglogo=session()->get('path_img_0');
            $imgheader=session()->get('path_img_1');
            
            $mail->Host=$host;
            $mail->Port=$port;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username=$senderemail;
            $mail->Password=$senderpassword;
            $mail->setFrom($senderemail, 'UTM Connect');
            
            $content = session()->get('design_email');
            $mail->AddEmbeddedImage(public_path($imglogo), 'logo');
            $mail->AddEmbeddedImage(public_path($imgheader), 'header');
            
            $mail->isHTML(true);

            foreach($contacts as $contact){
                // $data=DB::table('member')->where('matrix_card','=',$contact)->select('member.*')->get();
                // $email=$data['email'];
                // $name=$data['name'];
                $mail->addAddress(''.$contact,''.$contact);
            }
            $campaign=new Campaign([
                'campaign_name'=> $ctitle,
                'subject'=>$subject,
                'total_participant'=>$total_receiver,
            ]);

            $mail->Subject="".$subject;
            $mail->Body=$content;

            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $campaign->save();
                session()->forget(['campaign_title', 'total_receiver', 'id_contact',
                'subject','host','design_email', 'senderemail', 'senderpassword', 'port'
            ]);
            }

        }
    }

    public function renderTemplate(Request $r){
        $title_template = $r->title_template;
        $imgLogo = session()->get('path_img_0');
        $imgHeader = session()->get('path_img_1');
        // $imgLogo = "";
        // $imgHeader = "";
        if($r->has('heading_template_1')){
            $heading_template_1 = $r->heading_template_1;
        }
        if($r->has('heading_template_2')){
            $heading_template_2 = $r->heading_template_2;
        }
        if($r->has('isi_template_1')){
            $isi_template_1 = $r->isi_template_1;
        }
        if($r->has('isi_template_2')){
            $isi_template_2 = $r->isi_template_2;
        }
        if($r->has('subtitle_template')){
            $subtitle_template = $r->subtitle_template;
        }
        $content = '<tr>
        <td align="center" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;"
                bgcolor="#FFFFFF">
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="500"
                            class="flexibleContainer">
                            <tr>
                                <td align="center" valign="top" width="500"
                                    class="flexibleContainerCell">
                                    <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" valign="top" class="textContent">
                                                <img id="logo-template"
                                                    style="height: 80px; width:auto; margin-left: auto; margin-right: auto; margin-bottom: 2em;"
                                                    src="cid:logo"
                                                    alt="">
                                                <h1
                                                    style="color:black;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:1em;text-align:center;">
                                                    '.$title_template.'</h1>
                                                <div
                                                    '.$subtitle_template.'</div>
                                                <img id="img-template-1"
                                                    style="width: 440px; height: auto;"
                                                    src="cid:header"
                                                    alt="">
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CONTENT TABLE -->
                                </td>
                            </tr>
                        </table>
                        <!-- // FLEXIBLE CONTAINER -->
                    </td>
                </tr>
            </table>
            <!-- // CENTERING TABLE -->
        </td>
    </tr>
    <!-- MODULE ROW // -->
    <tr>
        <td align="center" valign="top">
            <!-- CENTERING TABLE // -->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
                <tr>
                    <td align="center" valign="top">
                        <!-- FLEXIBLE CONTAINER // -->
                        <table border="0" cellpadding="0" cellspacing="0" width="500"
                            class="flexibleContainer">
                            <tr>
                                <td align="center" valign="top" width="500"
                                    class="flexibleContainerCell">
                                    <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" valign="top">
                                                <!-- CONTENT TABLE // -->
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    width="100%">
                                                    <tr>
                                                        <td align="left" valign="top"
                                                            class="flexibleContainerBox">
                                                            <table border="0" cellpadding="0"
                                                                cellspacing="0" width="210"
                                                                style="max-width: 100%;">
                                                                <tr>
                                                                    <td align="left"
                                                                        class="textContent">
                                                                        <h3
                                                                            style="color:#363636;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">
                                                                            '.$heading_template_1.'</h3>
                                                                        <div
                                                                            style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">
                                                                            '.$isi_template_1.'</div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="right" valign="middle"
                                                            class="flexibleContainerBox">
                                                            <table class="flexibleContainerBoxNext"
                                                                border="0" cellpadding="0"
                                                                cellspacing="0" width="210"
                                                                style="max-width: 100%;">
                                                                <tr>
                                                                    <td align="left"
                                                                        class="textContent">
                                                                        <h3
                                                                            style="color:#363636;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">
                                                                            '.$heading_template_2.'</h3>
                                                                        <div
                                                                            style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">
                                                                            '.$isi_template_2.'</div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // CONTENT TABLE -->
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!-- // FLEXIBLE CONTAINER -->
                    </td>
                </tr>
            </table>
            <!-- // CENTERING TABLE -->
        </td>
    </tr>
    <!-- // MODULE ROW -->';
    $template = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="format-detection" content="telephone=no" /> <!-- disable auto telephone linking in iOS -->
        <title>Ayrtonware</title>
        <link href="assets/img/logo_png.png" rel="icon">
        <style type="text/css">
            /* RESET STYLES */
            body,
            #bodyTable,
            #bodyCell,
            #bodyCell {
                height: 100% !important;
                margin: 0;
                padding: 0;
                width: 100% !important;
                font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
            }
    
            table {
                border-collapse: collapse;
            }
    
            table[id=bodyTable] {
                width: 100% !important;
                margin: auto;
                max-width: 500px !important;
                color: #7A7A7A;
                font-weight: normal;
            }
    
            img,
            a img {
                border: 0;
                outline: none;
                text-decoration: none;
                height: auto;
                line-height: 100%;
            }
    
            a {
                text-decoration: none !important;
                border-bottom: 1px solid;
            }
    
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                color: #5F5F5F;
                font-weight: normal;
                font-family: Helvetica;
                font-size: 20px;
                line-height: 125%;
                text-align: Left;
                letter-spacing: normal;
                margin-top: 0;
                margin-right: 0;
                margin-bottom: 10px;
                margin-left: 0;
                padding-top: 0;
                padding-bottom: 0;
                padding-left: 0;
                padding-right: 0;
            }
    
            /* CLIENT-SPECIFIC STYLES */
            .ReadMsgBody {
                width: 100%;
            }
    
            .ExternalClass {
                width: 100%;
            }
    
            /* Force Hotmail/Outlook.com to display emails at full width. */
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }
    
            /* Force Hotmail/Outlook.com to display line heights normally. */
            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }
    
            /* Remove spacing between tables in Outlook 2007 and up. */
            #outlook a {
                padding: 0;
            }
    
            /* Force Outlook 2007 and up to provide a "view in browser" message. */
            img {
                -ms-interpolation-mode: bicubic;
                display: block;
                outline: none;
                text-decoration: none;
            }
    
            /* Force IE to smoothly render resized images. */
            body,
            table,
            td,
            p,
            a,
            li,
            blockquote {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
                font-weight: normal !important;
            }
    
            /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */
            .ExternalClass td[class="ecxflexibleContainerBox"] h3 {
                padding-top: 10px !important;
            }
    
            /* Force hotmail to push 2-grid sub headers down */
            /* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */
            /* ========== Page Styles ========== */
            h1 {
                display: block;
                font-size: 26px;
                font-style: normal;
                font-weight: normal;
                line-height: 100%;
            }
    
            h2 {
                display: block;
                font-size: 20px;
                font-style: normal;
                font-weight: normal;
                line-height: 120%;
            }
    
            h3 {
                display: block;
                font-size: 17px;
                font-style: normal;
                font-weight: normal;
                line-height: 110%;
            }
    
            h4 {
                display: block;
                font-size: 18px;
                font-style: italic;
                font-weight: normal;
                line-height: 100%;
            }
    
            .flexibleImage {
                height: auto;
            }
    
            .linkRemoveBorder {
                border-bottom: 0 !important;
            }
    
            table[class=flexibleContainerCellDivider] {
                padding-bottom: 0 !important;
                padding-top: 0 !important;
            }
    
            body,
            #bodyTable {
                background-color: #E1E1E1;
            }
    
            #emailHeader {
                background-color: #FFFFFF;
            }
    
            #emailBody {
                background-color: #FFFFFF;
            }
    
            #emailFooter {
                background-color: #E1E1E1;
            }
    
            .textContent,
            .textContentLast {
                color: #8B8B8B;
                font-family: Helvetica;
                font-size: 16px;
                line-height: 125%;
                text-align: Left;
            }
    
            .textContent a,
            .textContentLast a {
                color: #205478;
                text-decoration: underline;
            }
    
            .nestedContainer {
                background-color: #F8F8F8;
                border: 1px solid #9b9b9b;
            }
    
            .emailButton {
                background-color: #205478;
                border-collapse: separate;
            }
    
            .buttonContent {
                color: #FFFFFF;
                font-family: Helvetica;
                font-size: 18px;
                font-weight: bold;
                line-height: 100%;
                padding: 15px;
                text-align: center;
            }
    
            .buttonContent a {
                color: #FFFFFF;
                display: block;
                text-decoration: none !important;
                border: 0 !important;
            }
    
            .emailCalendar {
                background-color: #FFFFFF;
                border: 1px solid #CCCCCC;
            }
    
            .emailCalendarMonth {
                background-color: #205478;
                color: #FFFFFF;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 16px;
                font-weight: bold;
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: center;
            }
    
            .emailCalendarDay {
                color: #205478;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 60px;
                font-weight: bold;
                line-height: 100%;
                padding-top: 20px;
                padding-bottom: 20px;
                text-align: center;
            }
    
            .imageContentText {
                margin-top: 10px;
                line-height: 0;
            }
    
            .imageContentText a {
                line-height: 0;
            }
    
            #invisibleIntroduction {
                display: none !important;
            }
    
            /* Removing the introduction text from the view */
            /*FRAMEWORK HACKS & OVERRIDES */
            span[class=ios-color-hack] a {
                color: #275100 !important;
                text-decoration: none !important;
            }
    
            /* Remove all link colors in IOS (below are duplicates based on the color preference) */
            span[class=ios-color-hack2] a {
                color: #205478 !important;
                text-decoration: none !important;
            }
    
            span[class=ios-color-hack3] a {
                color: #8B8B8B !important;
                text-decoration: none !important;
            }
    
            /* A nice and clean way to target phone numbers you want clickable and avoid a mobile phone from linking other numbers that look like, but are not phone numbers.  Use these two blocks of code to "unstyle" any numbers that may be linked.  The second block gives you a class to apply with a span tag to the numbers you would like linked and styled.
                Inspired by Campaign Monitor article on using phone numbers in email: http://www.campaignmonitor.com/blog/post/3571/using-phone-numbers-in-html-email/.
                */
            .a[href^="tel"],
            a[href^="sms"] {
                text-decoration: none !important;
                color: #606060 !important;
                pointer-events: none !important;
                cursor: default !important;
            }
    
            .mobile_link a[href^="tel"],
            .mobile_link a[href^="sms"] {
                text-decoration: none !important;
                color: #606060 !important;
                pointer-events: auto !important;
                cursor: default !important;
            }
    
            /* MOBILE STYLES */
            @media only screen and (max-width: 480px) {
                /*////// CLIENT-SPECIFIC STYLES //////*/
                body {
                    width: 100% !important;
                    min-width: 100% !important;
                }
    
                /* Force iOS Mail to render the email at full width. */
                /* FRAMEWORK STYLES */
                /*
                        CSS selectors are written in attribute
                        selector format to prevent Yahoo Mail
                        from rendering media query styles on
                        desktop.
                    */
                table[id="emailHeader"],
                table[id="emailBody"],
                table[id="emailFooter"],
                table[class="flexibleContainer"] {
                    width: 100% !important;
                }
    
                td[class="flexibleContainerBox"],
                td[class="flexibleContainerBox"] table {
                    display: block;
                    width: 100%;
                    text-align: left;
                }
                /*
                        The following style rule makes any
                        image classed with flexibleImage
                        fluid when the query activates.
                        Make sure you add an inline max-width
                        to those images to prevent them
                        from blowing out.
                    */
                td[class="imageContent"] img {
                    height: auto !important;
                    width: 100% !important;
                    max-width: 100% !important;
                }
    
                img[class="flexibleImage"] {
                    height: auto !important;
                    width: 100% !important;
                    max-width: 100% !important;
                }
    
                img[class="flexibleImageSmall"] {
                    height: auto !important;
                    width: auto !important;
                }
    
                /*
                        Create top space for every second element in a block
                     */
                table[class="flexibleContainerBoxNext"] {
                    padding-top: 10px !important;
                }
    
                /*
                        Make buttons in the email span the
                        full width of their container, allowing
                        for left- or right-handed ease of use.
                    */
                table[class="emailButton"] {
                    width: 100% !important;
                }
    
                td[class="buttonContent"] {
                    padding: 0 !important;
                }
    
                td[class="buttonContent"] a {
                    padding: 15px !important;
                }
            }
    
            /*  CONDITIONS FOR ANDROID DEVICES ONLY
                =====================================================*/
            @media only screen and (-webkit-device-pixel-ratio:.75) {
                /* Put CSS for low density (ldpi) Android layouts in here */
            }
    
            @media only screen and (-webkit-device-pixel-ratio:1) {
                /* Put CSS for medium density (mdpi) Android layouts in here */
            }
    
            @media only screen and (-webkit-device-pixel-ratio:1.5) {
                /* Put CSS for high density (hdpi) Android layouts in here */
            }
    
            /* end Android targeting */
            /* CONDITIONS FOR IOS DEVICES ONLY
                =====================================================*/
            @media only screen and (min-device-width : 320px) and (max-device-width:568px) {}
    
            /* end IOS targeting */
        </style>
        <!--
                Outlook Conditional CSS
                These two style blocks target Outlook 2007 & 2010 specifically, forcing
                columns into a single vertical stack as on mobile clients. This is
                primarily done to avoid the page break bug and is optional.
                More information here:
                http://templates.mailchimp.com/development/css/outlook-conditional-css
            -->
        <!--[if mso 12]>
                <style type="text/css">
                    .flexibleContainer{display:block !important; width:100% !important;}
                </style>
            <![endif]-->
        <!--[if mso 14]>
                <style type="text/css">
                    .flexibleContainer{display:block !important; width:100% !important;}
                </style>
            <![endif]-->
    </head>
    
    <body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
        <center style="background-color:#E1E1E1;">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="500" id="emailHeader">
                            <!-- HEADER ROW // -->
                            <tr>
                                <td align="center" valign="top">
                                    <!-- CENTERING TABLE // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" valign="top">
                                                <!-- FLEXIBLE CONTAINER // -->
                                                <table border="0" cellpadding="10" cellspacing="0" width="500" class="flexibleContainer">
                                                    <tr>
                                                        <td valign="top" width="500" class="flexibleContainerCell">
                                                            <!-- CONTENT TABLE // -->
                                                            <table align="left" border="0" cellpadding="0" cellspacing="0"
                                                                width="100%">
                                                                <tr>
                                                                    <td align="right" valign="middle" class="flexibleContainerBox">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
                                                                            <tr>
                                                                                <td align="left" class="textContent">
                                                                                    <!-- CONTENT // -->
                                                                                    <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:black;text-align:left;line-height:120%;">
                                                                                        '.session()->get('campaign_title').'
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // END -->
                        </table>
                        <!-- // END -->
                        <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
                            '.$content.'
                            <!-- MODULE ROW // -->
                            <tr>
                                <td align="center" valign="top">
                                    <!-- CENTERING TABLE // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" valign="top">
                                                <!-- FLEXIBLE CONTAINER // -->
                                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                    <tr>
                                                        <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                            <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="center" valign="top">
                                                                        <!-- CONTENT TABLE // -->
                                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                                            width="100%">
                                                                            <tr>
                                                                                <td valign="top" class="textContent">
                                                                                    <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;">
                                                                                        UTM Connect
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!-- // CONTENT TABLE -->
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
                        </table>
                        <!-- // END -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
    </html>';
    session()->put('design_email', $template);  

    }
}
