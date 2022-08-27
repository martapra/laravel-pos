<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class ReportCtrl extends Controller
{
    function index(){
        $data = [
            "title" => "Report",
            "page_title" => "Report",
            "member" => Member::All(),
        ];

        return view("reports.frm_report",$data);
    }

    function rpt_transaksi(Request $req){

        $tgl_awal = date("Y-m-d",strtotime($req->input("tgl_awal")));
        $tgl_akhir = date("Y-m-d",strtotime($req->input("tgl_akhir")));

        $transaksi = DB::table("tb_transaksi")
        ->join("users","tb_transaksi.id_kasir","=","users.id")
        ->join("tb_member","tb_transaksi.id_member","=","tb_member.id_member")
        ->select("tb_transaksi.*","users.name","tb_member.nm_member")
        ->where(DB::raw("DATE_FORMAT(tb_transaksi.tanggal,'%Y-%m-%d')"),">=",$tgl_awal)
        ->where(DB::raw("DATE_FORMAT(tb_transaksi.tanggal,'%Y-%m-%d')"),"<=",$tgl_akhir)
        ->get();

        $data = [
            "rsTransaksi" => $transaksi,
            "pajak" => 0,
            "total" => 0
        ];

        return view("reports.rpt_transaksi",$data);
    }

    function rpt_transaksi_member(Request $req){
        $transaksi = DB::table("tb_transaksi")
        ->join("users","tb_transaksi.id_kasir","=","users.id")
        ->join("tb_member","tb_transaksi.id_member","=","tb_member.id_member")
        ->select("tb_transaksi.*","users.name","tb_member.nm_member")
        ->where("tb_member.id_member","=",$req->input("id_member"))
        ->get();

        $data = [
            "rsTransaksi" => $transaksi,
            "pajak" => 0,
            "total" => 0
        ];

        return view("reports.rpt_transaksi",$data);
    }

    function rpt_transaksi_kasir(){

    }

    function rpt_product(){
        
    }
    function rpt_member(){

    }
}
