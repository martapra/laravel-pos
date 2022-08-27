<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class TransaksiCtrl extends Controller
{
    //
    function index(){

    // Tanpa SQL Grantotal
    $transaksi = DB::select("SELECT t.*,u.name,mb.nm_member 
    FROM tb_transaksi AS t
    INNER JOIN users AS u ON t.id_kasir = u.id
    INNER JOIN tb_member AS mb ON t.id_member = mb.id_member");
    
    // Data Page
    $data = [
        "title" => "Transaksi",
        "page_title" => "Transaksi",
        "transaksi" => $transaksi
    ];

    return view("transaksi.data_transaksi",$data);
}

    function form(){
        //data page
        $data = [
            "title" => "Transaksi",
            "page_title" => "Transaksi",
            "products" => Product::where("stok","Available")->get(),
            "members" => Member::All()
        ];

        return view("transaksi.frm_transaksi",$data);
    }

    function save(Request $req){
        $nota = "N".date("Ymdhis").Str::upper(Str::random(4));

        // return $nota;

        // return $req->all();

        //get next id transaksi
        $transaksi=DB::select("SHOW TABLE STATUS LIKE 'tb_transaksi'");

        $id_transaksi=$transaksi[0]->Auto_increment;

        //save transaksi
        Transaksi::create([
            "nota"      => $nota,
            "tanggal"   => date("Y-m-d h:i:s"),
            "id_kasir"  => Auth::user()->id,
            "id_member" => $req->input("id_member"),
            "ppn"       => $req->input("ppn"),
            "diskon"    => $req->input("diskon"),
            "gtotal"    => $req->input("gtotal"),
            "status"    => 1,
        ]);

        //save detail
        $id_product = $req->input("id_product");
        $harga = $req->input("harga");
        $jumlah = $req->input("jumlah");

        for($i=0;$i<count($id_product);$i++){
            DetailTransaksi::create([
                "id_transaksi"  => $id_transaksi,
                "id_product"    => $id_product[i],  
                "harga"         => $harga[i],       
                "jumlah"        => $jumlah[i],      
            ]);
        }

        return json_encode(["error"=>0,"type"=>"success","message"=>"Data Berhasil Disimpan !!","id_transaksi"=>$id_transaksi]);
    }

    function generate_nota(Request $req){
        //generate data using query builder
        $transaksi = DB::table("tb_transaksi")
        ->join("users","tb_transaksi.id_kasir","=","users.id")
        ->join("tb_member","tb_transaksi.id_member","=","tb_member.id_member")
        ->select("tb_transaksi.*","users.name","tb_member.nm_member")
        ->where("tb_transaksi.id_transaksi",$req->id)
        ->first();

        $detail = DB::table("tb_detail_transaksi")
        ->join("tb_product","tb_detail_transaksi.id_product","=","tb_product.id_product")
        ->select("tb_detail_transaksi.*","tb_product.nm_product",DB::raw("(tb_detail_transaksi.harga * tb_detail_transaksi.jumlah) as subtotal"))
        ->where("tb_detail_transaksi.id_transaksi",$req->id)
        ->get();

        //data store to view
        $data = [
            "rsTransaksi" => $transaksi,
            "rsDetail" => $detail,
            "total" => 0,
        ];

        return view("transaksi.nota",$data);
    }

    //hapus
    // Hapus
    function delete(Request $req){
        try {
            Transaksi::where("id_transaksi",$req->id)->delete();
            DetailTransaksi::where("id_transaksi",$req->id)->delete();
            $mess = ["type"=>"success","text"=>"Data Berhasil dihapus !!"];
        } catch(Exception $err){
            $mess = ["type"=>"error","text"=>"Data Gagal dihapus !!"];
        }
        // Redirect
        return redirect('transaksi')->with($mess);
    }
}
