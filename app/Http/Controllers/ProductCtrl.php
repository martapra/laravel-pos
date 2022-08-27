<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductCtrl extends Controller
{
    //data product
    function index(){      
        //data page
        $data = [
            "title" => "Products",
            "page_title" => "Products",
            "products" => Product::All() 
        ];

        return view('product.data_product',$data);
    }

    function form(Request $req){
        $mode = $req->id!="" ? "Edit" : "Add New";        
        // Data Page
        $data = [
            "title" => $mode." Product",
            "page_title" => $mode." Product",
            "rsProduct" => Product::where("id_product",$req->id)->first()
        ];

        return view("product.frm_product",$data);
    }

    function save(Request $req){
        // Validation
        $req->validate(
            // Rule
            [
                "kd_product" => "required|size:6|unique:tb_product,kd_product,".$req->input("id_product").",id_product",
                "nm_product" => "required",
                "kategori" => "required",
                "harga" => "required|numeric",
                "satuan" => "required",
                "stok" => "required",
            ],
            // Message Error
            [
                "kd_product.required" => "Kode Product Wajib diisi !!",
                "kd_product.size" => "Kode Product Harus 6 Karakter !!",
                "kd_product.unique" => "Kode Product Sudah digunakan",
                "nm_product.required" => "Nama Product Wajib diisi !!",
                "kategori.required" => "Kategori Wajib diisi !!",
                "harga.required" => "Harga Wajib diisi !!",
                "harga.numeric" => "Harga Harus diisi dengan angka !!",
                "satuan.required" => "Satuan Wajib diisi !!",
                "stok.required" => "Stok Wajib diisi !!",
            ]
        );

        try {
            // Proses Save
            product::UpdateorCreate(
                [
                    "id_product" => $req->input("id_product")
                ],
                [
                    "kd_product"=>$req->input("kd_product"),
                    "nm_product"=>$req->input("nm_product"),
                    "harga"=>$req->input("harga"),
                    "kategori"=>$req->input("kategori"),
                    "satuan"=>$req->input("satuan"),
                    "ket"=>$req->input("ket"),
                    "stok"=>$req->input("stok"),
                    "foto"=>$req->input("foto"),
                ]
            );

            // Data yang dibawa saat berhasil
            $mess = ["type"=>"success","text"=>"Data Berhasil disimpan !!"];
        } catch(Exception $err){
            $mess = ["type"=>"error","text"=>"Data Gagal disimpan !!"];
        }

        // Redirect
        return redirect('product')->with($mess);
    } 

    function delete(Request $req){
        try {
            Product::where("id_product",$req->id)->delete();
            $mess = ["type"=>"success","text"=>"Data Berhasil dihapus !!"];
        } catch(Exception $err){
            $mess = ["type"=>"error","text"=>"Data Gagal dihapus !!"];
        }
        // Redirect
        return redirect('product')->with($mess);
    }
}
