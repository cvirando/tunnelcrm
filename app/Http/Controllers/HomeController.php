<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nwidart\Modules\Commands;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Str;
use Auth;
use Schema;
use Module;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect the application main page to login.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        return redirect('login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = Auth::user()->roles;
        $role = Role::findOrFail($roles[0]['id']);
        $permissions = Permission::select('module')->distinct()->orderBy('module')->get()->toArray();
        $modules = Module::allEnabled();
        return view('home', compact('role', 'modules', 'permissions'));
    }

    /**
     * Show the application license page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function license()
    {
        return view('license');
    }

    /**
     * Application modules.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function modules()
    {
        if(Auth::user()->hasPermissionTo('manage modules')) {
            // Get Modules
            $response = Http::get('https://irando.co.id/modules-list/modules.json');
            $modules = $response->json();
            // Get disabled diffs
            $allDisabled = Module::allDisabled();
            $aDis = array_keys($allDisabled);
            // Get enabled diffs
            $allEnabled = Module::allEnabled();
            $aEnb = array_keys($allEnabled);
            return view('modules', compact('modules', 'aDis', 'aEnb'));
        } else {
            return back()->with('sorry you\'re not allowed');
        }
    }

    /**
     * Application disabling moduls.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function disableModule($name)
    {
        Artisan::call('module:disable '.$name.'');
        return back();
    }

    /**
     * Application enabaling moduls.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function enableModule($name)
    {
        $tableExist = Schema::hasTable(''.$name.'');
        if(!$tableExist) {
            Artisan::call('module:migrate '.$name.'');
            Artisan::call('module:seed '.$name.'');
            Artisan::call('module:publish '.$name.'');
            Artisan::call('module:enable '.$name.'');
            Artisan::call('module:update '.$name.'');
        } else {
            Artisan::call('module:enable '.$name.'');
            Artisan::call('module:update '.$name.'');
        }
        return back();
    }
}
