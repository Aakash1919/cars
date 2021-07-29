<?php
/**
 * Created by PhpStorm.
 * User: ShaOn
 * Date: 11/29/2018
 * Time: 12:49 AM
 */

namespace App\Classes;

use App\Models\EmailTemplate;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\Mail;

class GeniusMailer
{
    public function sendAutoMail(array $mailData)
    {
        $setup = Generalsetting::find(1);

        $temp = EmailTemplate::where('email_type','=',$mailData['type'])->first();

        if (condition) {
          // code...
        }
        $body = preg_replace("/{model_name}/", $mailData['mname'] ,$temp->email_body);
        $body = preg_replace("/{admin_name}/", $mailData['aname'] ,$body);
        $body = preg_replace("/{admin_email}/", $mailData['aemail'] ,$body);
        $body = preg_replace("/{website_title}/", $setup->title ,$body);

        $data = [
            'email_body' => $body
        ];

        $objDemo = new \stdClass();
        $objDemo->to = $mailData['to'];
        $objDemo->from = $setup->from_email;
        $objDemo->title = $setup->from_name;
        $objDemo->subject = $temp->email_subject;

        try{
            Mail::send('admin.email.mailbody',$data, function ($message) use ($objDemo) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);
            });
        }
        catch (\Exception $e){
            //die("Not Sent!");
        }
    }

    public function sendCustomMail(array $mailData)
    {
        $setup = Generalsetting::find(1);

        $data = [
            'email_body' => $mailData['body'],
            'tagLine' => isset($mailData['tagLine']) ? $mailData['tagLine'] : 'Thanks',
            'car' => isset($mailData['car']) ? $mailData['car'] : null
        ];

        $objDemo = new \stdClass();
        $objDemo->to = $mailData['to'];
        $objDemo->from = $setup->from_email;
        $objDemo->title = $setup->from_name;
        $objDemo->subject = $mailData['subject'];

        try{
            Mail::send('admin.email.mailbody',$data, function ($message) use ($objDemo) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);
            });
        }
        catch (\Exception $e){
            //die("Not sent");
        }
        return true;
    }
    public function sendDesignedMail(array $mailData)
    {
        $setup = Generalsetting::find(1);
        
        $header = EmailTemplate::where('email_type','=','email_comman_header')->first();
        $central = EmailTemplate::where('email_type','=',$mailData['type'])->first();
        $footer = EmailTemplate::where('email_type','=','html_email_footer')->first();
        
        $headerBody = preg_replace("/{base_url}/", env('APP_URL') ,$header->email_body);
        $footerBody = $footer->email_body;
       
        $centralContent = preg_replace("/{header}/",$headerBody ,$central->email_body);
        $centralContent = preg_replace("/{tagLine}/",$mailData['tagLine'] ,$centralContent);
        $centralContent = preg_replace("/{content}/",$mailData['body'] ,$centralContent);
        if(isset($mailData['car'])) {
            $centralContent = preg_replace("/{carImage}/",env('APP_URL') . '/assets/front/images/cars/featured/' . $mailData['car']->featured_image ,$centralContent);
            $centralContent = preg_replace("/{carTitle}/",$mailData['car']->title ,$centralContent);
            $centralContent = preg_replace("/{carMileage}/",$mailData['car']->mileage ?? 'N/A' ,$centralContent);
            $centralContent = preg_replace("/{carYear}/",$mailData['car']->year ?? 'N/A' ,$centralContent);
        }
       
        $centralContent = preg_replace("/{footer}/",$footerBody ,$centralContent);
        
        $data = [
            'email_body' => $centralContent
        ];
        $objDemo = new \stdClass();
        $objDemo->to = $mailData['to'];
        $objDemo->from = $setup->from_email;
        $objDemo->title = $setup->from_name;
        $objDemo->subject = $mailData['subject'];
        // try{
            Mail::send('admin.email.sendBid',$data, function ($message) use ($objDemo) {
                $message->from($objDemo->from,$objDemo->title);
                $message->to($objDemo->to);
                $message->subject($objDemo->subject);

                
            });
        // }
        // catch (\Exception $e){
        //     //die("Not sent");
        // }
        
        return true;
    }
}
