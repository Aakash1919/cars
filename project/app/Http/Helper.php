<?php

  if (! function_exists('code_image')) {

      // Capcha Code Image
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
?>
