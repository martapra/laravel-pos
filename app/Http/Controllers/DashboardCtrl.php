<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Member;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaksi;

class DashboardCtrl extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index(){

        $data = [
            "total_member" => Member::count(),
            "total_product" => Product::count(),
            "total_user" => User::count(),
            "total_transaksi" => Transaksi::count()
        ];

        return view("dashboard",$data);
    }
}
