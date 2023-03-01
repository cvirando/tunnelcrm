<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Config;
use Artisan;
use Session;

class PerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super-admin|staff']);
    }

    public function index(){
        $path = base_path('.env');
        $contents = file_get_contents($path);
        $contents = [
            'APP_KEY' => env('APP_KEY'),
            'APP_NAME' => env('APP_NAME'),
            'APP_ENV' => env('APP_ENV'),
            'APP_DEBUG' => env('APP_DEBUG'),
            'APP_URL' => env('APP_URL'),
            'MAIL_MAILER' => env('MAIL_MAILER'),
            'MAIL_HOST' => env('MAIL_HOST'),
            'MAIL_PORT' => env('MAIL_PORT'),
            'MAIL_USERNAME' => env('MAIL_USERNAME'),
            'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
            'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
            'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
            'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
            'DB_CONNECTION' => env('DB_CONNECTION'),
            'DB_HOST' => env('DB_HOST'),
            'DB_PORT' => env('DB_PORT'),
            'DB_DATABASE' => env('DB_DATABASE'),
            'DB_USERNAME' => env('DB_USERNAME'),
            'DB_PASSWORD' => env('DB_PASSWORD'),
            'SESSION_LIFETIME' => env('SESSION_LIFETIME'),
            'LOG_CHANNEL' => env('LOG_CHANNEL'),
            'LOG_DEPRECATIONS_CHANNEL' => env('LOG_DEPRECATIONS_CHANNEL'),
            'LOG_LEVEL' => env('LOG_LEVEL'),
            'BROADCAST_DRIVER' => env('BROADCAST_DRIVER'),
            'CACHE_DRIVER' => env('CACHE_DRIVER'),
            'FILESYSTEM_DISK' => env('FILESYSTEM_DISK'),
            'QUEUE_CONNECTION' => env('QUEUE_CONNECTION'),
            'SESSION_DRIVER' => env('SESSION_DRIVER'),
            'MEMCACHED_HOST' => env('MEMCACHED_HOST'),
            'REDIS_HOST' => env('REDIS_HOST'),
            'REDIS_PASSWORD' => env('REDIS_PASSWORD'),
            'REDIS_PORT' => env('REDIS_PORT'),
            'AWS_ACCESS_KEY_ID' => env('AWS_ACCESS_KEY_ID'),
            'AWS_SECRET_ACCESS_KEY' => env('AWS_SECRET_ACCESS_KEY'),
            'AWS_DEFAULT_REGION' => env('AWS_DEFAULT_REGION'),
            'AWS_BUCKET' => env('AWS_BUCKET'),
            'AWS_USE_PATH_STYLE_ENDPOINT' => env('AWS_USE_PATH_STYLE_ENDPOINT'),
            'PUSHER_APP_ID' => env('PUSHER_APP_ID'),
            'PUSHER_APP_KEY' => env('PUSHER_APP_KEY'),
            'PUSHER_APP_SECRET' => env('PUSHER_APP_SECRET'),
            'PUSHER_HOST' => env('PUSHER_HOST'),
            'PUSHER_PORT' => env('PUSHER_PORT'),
            'PUSHER_SCHEME' => env('PUSHER_SCHEME'),
            'PUSHER_APP_CLUSTER' => env('PUSHER_APP_CLUSTER'),
        ];

        return view('performances.index', compact('contents'));
    }

    public function clearCaches(Request $request){
        Artisan::call('cache:clear');
        Session::flash('message', 'Caches are clear.');
        return redirect()->route('performance');
    }

    public function debugMode(Request $request){
        $path = base_path('.env');
        $content = file_get_contents($path);
        $content = [
            'APP_KEY' => env('APP_KEY'),
            'APP_NAME' => env('APP_NAME'),
            'APP_ENV' => env('APP_ENV'),
            'APP_DEBUG' => env('APP_DEBUG'),
            'APP_URL' => env('APP_URL'),
            'MAIL_MAILER' => env('MAIL_MAILER'),
            'MAIL_HOST' => env('MAIL_HOST'),
            'MAIL_PORT' => env('MAIL_PORT'),
            'MAIL_USERNAME' => env('MAIL_USERNAME'),
            'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
            'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
            'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
            'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
            'DB_CONNECTION' => env('DB_CONNECTION'),
            'DB_HOST' => env('DB_HOST'),
            'DB_PORT' => env('DB_PORT'),
            'DB_DATABASE' => env('DB_DATABASE'),
            'DB_USERNAME' => env('DB_USERNAME'),
            'DB_PASSWORD' => env('DB_PASSWORD'),
            'SESSION_LIFETIME' => env('SESSION_LIFETIME'),
            'LOG_CHANNEL' => env('LOG_CHANNEL'),
            'LOG_DEPRECATIONS_CHANNEL' => env('LOG_DEPRECATIONS_CHANNEL'),
            'LOG_LEVEL' => env('LOG_LEVEL'),
            'BROADCAST_DRIVER' => env('BROADCAST_DRIVER'),
            'CACHE_DRIVER' => env('CACHE_DRIVER'),
            'FILESYSTEM_DISK' => env('FILESYSTEM_DISK'),
            'QUEUE_CONNECTION' => env('QUEUE_CONNECTION'),
            'SESSION_DRIVER' => env('SESSION_DRIVER'),
            'MEMCACHED_HOST' => env('MEMCACHED_HOST'),
            'REDIS_HOST' => env('REDIS_HOST'),
            'REDIS_PASSWORD' => env('REDIS_PASSWORD'),
            'REDIS_PORT' => env('REDIS_PORT'),
            'AWS_ACCESS_KEY_ID' => env('AWS_ACCESS_KEY_ID'),
            'AWS_SECRET_ACCESS_KEY' => env('AWS_SECRET_ACCESS_KEY'),
            'AWS_DEFAULT_REGION' => env('AWS_DEFAULT_REGION'),
            'AWS_BUCKET' => env('AWS_BUCKET'),
            'AWS_USE_PATH_STYLE_ENDPOINT' => env('AWS_USE_PATH_STYLE_ENDPOINT'),
            'PUSHER_APP_ID' => env('PUSHER_APP_ID'),
            'PUSHER_APP_KEY' => env('PUSHER_APP_KEY'),
            'PUSHER_APP_SECRET' => env('PUSHER_APP_SECRET'),
            'PUSHER_HOST' => env('PUSHER_HOST'),
            'PUSHER_PORT' => env('PUSHER_PORT'),
            'PUSHER_SCHEME' => env('PUSHER_SCHEME'),
            'PUSHER_APP_CLUSTER' => env('PUSHER_APP_CLUSTER'),
        ];

        // Read .env-file
        $env = file_get_contents(base_path() . '/.env');

        // Split string on every " " and write into array
        $env = preg_split('/\s+/', $env);;

        // Loop through given data
        foreach($request->all() as $key => $value){

            // Loop through .env-data
            foreach($env as $env_key => $env_value){

                // Turn the value into an array and stop after the first split
                // So it's not possible to split e.g. the App-Key by accident
                $entry = explode("=", $env_value, 2);

                // Check, if new key fits the actual .env-key
                if($entry[0] == $key){
                    // If yes, overwrite it with the new one
                    $env[$env_key] = $key . "=" . $value;
                } else {
                    // If not, keep the old one
                    $env[$env_key] = $env_value;
                }
            }
        }

        // Turn the array back to an String
        $env = implode("\n", $env);

        // And overwrite the .env with the new data
        file_put_contents($path, $env);
        Session::flash('message', 'Configs are updated.');
        return redirect()->route('performance');
    }

    public function SendTestMAil(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
        ));
        $data = array(
            'email' => $request->email,
        );
        Mail::to($data['email'])->send(new TestEmail());
        Session::flash('message', 'Your test email is on the fly.');
        return redirect()->route('performance');
    }

    public function MaintenanceMode(Request $request){
        if($request->input('maintenance') == 'active'){
            Artisan::call(
                'down --render="errors.maintenance" --secret="'.$request->input('maintenance_message').'"'
            );
            // Artisan::call('down', [
            //     '--render' => "errors.maintenance",
            //     '--secret' => $request->input('maintenance_message')
            // ]);
            Session::flash('message', 'Site is successfully in maintenance mode.');
            return redirect()->route('performance');
        }else{
            Artisan::call('up');
            Session::flash('message', 'Site is ONLINE.');
            return redirect()->route('performance');
        }
    }
}
