<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Database\Seeders\AdminSeeder;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){

        return view('back.page.dashboard');
    }
}
