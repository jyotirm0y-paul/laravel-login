<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return View('auth.login');
    }

    public function register()
    {
        return View('auth.register');
    }

    public function save(Request $request)
    {
// Validate request
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12|'
        ]);

        // Insert data into database

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return back()->with('success','New User has been successfully added to database.');
        }else{
            return back()->with('fail','Something went wrong, please try again later.');
        }

        }

        public function check(Request $request)
        {
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:5|max:12|'
            ]);

            $userInfo = Admin::where('email','=', $request->email)->first();

            if (!$userInfo) {
                return back()->with('fail', 'We do not recognize your email address');
            }else{
                // check password
                if (Hash::check($request->password, $userInfo->password)) {
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('admin/dashboard');
                } else {
                    return back()->with('fail', 'Incorrect password');
                }

            }
        }

        public function logout()
        {
            if (session()->has('LoggedUser')) {
                session()->pull('LoggedUser');
                return redirect('/auth/login');
            }
        }

        public function dashboard()
        {
            $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
            return View('admin.dashboard', $data);
        }

}
