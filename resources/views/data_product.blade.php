@extends('layouts.template')

@section("title",$title)
@section("page_title",$page_title)

@section('content')
<div class="card-body">
    <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $rsProduct)
                <tr>
                    <td>{{ $rsProduct["id_product"] }}</td>
                    <td>{{ $rsProduct["nm_product"] }}</td>
                    <td>{{ $rsProduct["harga"] }}</td>
                    <td>{{ $rsProduct["cat"] }}</td>
                    <td>{{ $rsProduct["desc"] }}</td>
                    <td>{{ $rsProduct["status"] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>       
@endsection
    
