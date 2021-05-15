<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    protected $fillable = ['title','header_email','header_phone', 'footer', 'copyright','footer_logo','colors','loader','talkto','map_key','disqus','stripe_key','stripe_secret','currency_format','smtp_host','smtp_port','smtp_user','smtp_pass','from_email','from_name', 'work_title', 'work_subtitle', 'ss', 'pb', 'facebook', 'twitter', 'gplus', 'linkedin', 'dribble', 'instagram', 'f_status', 't_status', 'g_status', 'l_status', 'd_status', 'i_status', 'footer_address', 'footer_phone', 'footer_email'];

    public $timestamps = false;


    public function upload($name,$file,$oldname)
    {
                $file->move('assets/images',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$oldname)) {
                        unlink(public_path().'/assets/images/'.$oldname);
                    }
                }
    }
}
