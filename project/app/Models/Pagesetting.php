<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagesetting extends Model
{
    protected $fillable = ['contact_success','contact_email','contact_title','contact_text','street','phone','fax','email','site','side_title','side_text','slider','service','featured','small_banner','best','top_rated','large_banner','big','hot_sale','review_blog','header_stxt','header_btxt','small_text','bold_text','is_contact', 'invitation_stxt', 'invitation_btxt', 'invitation_url', 'invitation_btn_txt', 'featured_stxt', 'featured_btxt', 'latest_stxt', 'latest_btxt', 'testimonial_title', 'testimonial_subtitle', 'blog_btxt', 'blog_stxt'];

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
