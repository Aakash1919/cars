<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $smtpdata = DB::table('generalsettings')->find(1);

        Config::set('mail.port', $smtpdata->smtp_port);
        Config::set('mail.host', $smtpdata->smtp_host);
        Config::set('mail.username', $smtpdata->smtp_user);
        Config::set('mail.password', $smtpdata->smtp_pass);

        view()->composer('*',function($settings){
            $settings->with('gs', DB::table('generalsettings')->find(1));
            $settings->with('ps', DB::table('pagesettings')->find(1));
            $settings->with('ss', DB::table('socialsettings')->find(1));
            $settings->with('seo', DB::table('seotools')->find(1));
            $settings->with('menus', DB::table('pages')->get());
            if (Session::has('language'))
            {
                $data = DB::table('languages')->find(Session::get('language'));
                $data_results = file_get_contents(public_path().'/assets/languages/'.$data->file);
                $lang = json_decode($data_results);
                $settings->with('langg', $lang);
            }
            else
            {
                $data = DB::table('languages')->where('is_default','=',1)->first();
                $data_results = file_get_contents(public_path().'/assets/languages/'.$data->file);
                $lang = json_decode($data_results);
                $settings->with('langg', $lang);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
