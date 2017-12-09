<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/8/17
 * Time: 2:10 PM
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }


    public function index()
    {
        return view('admin.pages.admin_index');
    }

    public function login() {
        return view('admin.pages.login');
    }

}