<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit articles']);
        // $role->givePermissionTo($permission);
        // auth()->user()->givePermissionTo('edit articles');
        // if (auth()->user()->can('edit articles')) {
        //     dd('dskldslkd');
        // }
        $user->assignRole('writer', 'admin');
        return view('home');
    }
}
