<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "tb_product";
    protected $primaryKey = "id_product";
    protected $keyType = "string";
    public $incrementing = false;    
    protected $guarded = ['id_product'];
}
