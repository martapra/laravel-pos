<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserCtrl extends Controller
{
    //
    function index(){
        // Data Page
        $data = [
        "title" => "Users",
        "page_title" => "Users",
        "users" => User::All()
        ];

        return view("user.data_user",$data);
    }

    function form(Request $req){
    $mode = $req->id!="" ? "Edit" : "Add New";        
    // Data Page
    $data = [
        "title" => $mode." User",
        "page_title" => $mode." User",
        "rsUser" => User::where("id",$req->id)->first()
    ];

    return view("user.frm_user",$data);
    }

    function save(Request $req){
    // Validation
    $req->validate(
        // Rule
        [
            "name" => "required",
            "email" =>"required|email|unique:users,email,".$req->input("id").",id",
            "role" => "required",
            "status" => "required",
        ],
        // Message Error
        [
            "name.required" => "Nama Member Wajib diisi !!",            
            "email.required" => "Email Wajib diisi !!",            
            "email.email" => "Email Invalid !!",
            "email.unique" => "Email Sudah Terdaftar !!",
            "role.required" => "Role Wajib diisi !!",
            "status.required" => "Status Wajib diisi !!",
        ]
    );

    try {
        // Proses Save
        User::UpdateorCreate(
            [
                "id" => $req->input("id")
            ],
            [
                "name"=>$req->input("name"),
                "email"=>$req->input("email"),
                "password"=> $req->input("password") == "" ? $req->input("old_password") : Hash::make($req->input("password")),
                "role"=>$req->input("role"),
                "status"=>$req->input("status"),
                "foto"=>$req->input("foto"),
            ]
        );

        // Data yang dibwa saat berhasil
        $mess = ["type"=>"success","text"=>"Data Berhasil disimpan !!"];
    } catch(Exception $err){
        $mess = ["type"=>"error","text"=>"Data Gagal disimpan !!"];
    }

    // Redirect
    return redirect('user')->with($mess);
    } 

    function delete(Request $req){
    try {
        User::where("id",$req->id)->delete();
        $mess = ["type"=>"success","text"=>"Data Berhasil dihapus !!"];
    } catch(Exception $err){
        $mess = ["type"=>"error","text"=>"Data Gagal dihapus !!"];
    }
    // Redirect
    return redirect('user')->with($mess);
    }
}
