@extends('layouts.template')

@section("title","Dashboard")
@section("page_title","Dashboard")

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $total_member }}</h3>
                    <p>Members</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_product }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon"> 
                    <i class="fas fa-box-open"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_user }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $total_transaksi }}</h3>
                    <p>Total Transaksi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
    
