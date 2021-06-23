<?php
    use App\Models\Plan;
    use App\Models\Notifications;
    use App\Models\Car;
    use App\Models\TransmissionType;
    use App\Models\Brand;
    use App\Models\BrandModel;

if (! function_exists('code_image')) {

    function code_image() 
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }
}


if(!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}


if(!function_exists('get_plan_name')) {
    function get_plan_name($planId = null) {
        $plan = Plan::findOrFail($planId);
        return $plan->title ?? '';
    }
}

if(!function_exists('get_notifications')) {
    function get_notifications($userId = null) {
        $notifications = Notifications::where('user_id', $userId)->where('status', 0)->get();
        return $notifications ?? [];
    }
}

if(!function_exists('get_car_count_by_make')) {
    function get_car_count_by_make($make = null, $comparingParameter = 'id') {
        $carCount = Car::where($comparingParameter, $make)->where('status', 1)->count();
        return $carCount ?? 0;
    }
}

if(!function_exists('get_car_by_make')) {
    function get_car_by_make($id = null) {
        return Brand::where('id', $id)->first()->name;
    }
}

if(!function_exists('get_transmission_by_id')) {
    function get_transmission_by_id($id = null) {
        return TransmissionType::where('id', $id)->first()->name;
    }
}
if(!function_exists('get_models_by_make')) {
    function get_models_by_make($id = null) {
        $models = BrandModel::where('brand_id', $id)->where('status', 1)->get();
        return $models;
    }
}

?>
