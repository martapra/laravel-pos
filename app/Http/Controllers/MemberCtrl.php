<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberCtrl extends Controller
{
    //
    function index(){
        //data page
        $data = [
            "title" => "Members",
            "page_title" => "Members",
            "members" => Member::All()
        ];

        return view("member.data_member",$data);
    }

    function form(Request $req){
        $mode = $req->id!="" ? "Edit" : "Add New";
        //data page
        $data = [
            "title" => $mode." Member",
            "page_title" => $mode." Member", 
            "rsMember" => Member::where("id_member",$req->id)->first()     
        ];

        return view("member.frm_member",$data);
    }

    function save(Request $req){
        // Validation
        $req->validate(
            // Rule
            [
                "kd_member" => "required|size:6|unique:tb_member,kd_member,".$req->input("id_member").",id_member",
                "nm_member" => "required",
                "alamat" =>"required",
                "kota" => "required",
                "telp" => "required|numeric|digits_between:11,13|unique:tb_member,telp,".$req->input("id_member").",id_member",
                "jk" => "required",
                "status" => "required",
            ],
            // Message Error
            [
                "kd_member.required" => "Kode Member Wajib diisi !!",
                "kd_member.size" => "Kode Member Harus 6 Karakter !!",
                "kd_member.unique" => "Kode Member Sudah digunakan",
                "nm_member.required" => "Nama Member Wajib diisi !!",
                "kota.required" => "Kota Wajib diisi !!",
                "telp.required" => "Telepon Wajib diisi !!",
                "telp.numeric" => "Telepon Harus diisi dengan angka !!",
                "telp.digits_between" => "Telepon antara 11 - 13 digits !!",
                "telp.unique" => "Telepon sudah digunakan !!",
                "jk.required" => "Jenis Kelamin Wajib diisi !!",
                "status.required" => "Status Wajib diisi !!",
            ]
        );

        try {
        //proses save
        Member::UpdateorCreate(
            [
                "id_member" => $req->input("id_member")
            ],
            [
            "kd_member"=>$req->input("kd_member"),
            "nm_member"=>$req->input("nm_member"),
            "alamat"=>$req->input("alamat"),
            "kota"=>$req->input("kota"),
            "telp"=>$req->input("telp"),
            "jk"=>$req->input("jk"),
            "status"=>$req->input("status"),
            "foto"=>$req->input("foto"),
            ]           
        );

        //data yang dibawa saat berhasil
        $mess = ["type"=>"success","text"=>"Data berhasil disimpan !!"];
    } catch(Exception $err){
        $mess = ["type"=>"error","text"=>"Data Gagal disimpan !!"];
    }

        //redirect
        return redirect('member')->with($mess);
    }

    function delete(Request $req){
        try {
        Member::where("id_member",$req->id)->delete();
        $mess = ["type"=>"success","text"=>"Data Berhasil dihapus !!"];
        } catch(Exception $err){
            $mess = ["type"=>"error","text"=>"Data Gagal dihapus !!"];
        }
        // Redirect
        return redirect('member')->with($mess);
    }
}
