@extends('layouts.template')

@section("title",$title)
@section("page_title",$page_title)

@section('content')
<script>
    $(function(){
        @if(session("type"))
            showMessage('{{ session("type") }}','{{ session("text") }}');
        @endif
    });
</script>
<div class="card">
    <div class="card-header">
      <div class="card-title">
        <a href="{{ url('product/form') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> ADD NEW</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover data">
            <thead>
                <tr>
                    <th style="width: 10px">Foto</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>                
               @foreach($products as $rsProduct)
                    <tr>
                        <td>
                            @if($rsProduct["foto"]!="")
                                <img class="avatar" src="{{ $rsProduct["foto"] }}" alt="">
                            @else
                                <img class="avatar" src="{{ asset("images/no-image.jpg") }}" alt="">
                            @endif
                        </td>
                        <td>{{ $rsProduct["kd_product"] }}</td>
                        <td>
                            {{ $rsProduct["nm_product"] }}<br/>
                            <p><strong>Ket : </strong>{{ $rsProduct["ket"] }}</p>
                        </td>
                        <td>{{ $rsProduct["kategori"] }}</td>                        
                        <td>{{ number_format($rsProduct["harga"],"0",",",".") }} / {{ $rsProduct["satuan"] }}</td>
                        <td>{{ $rsProduct["stok"] }}</td>
                        <td>
                            <a href="{{ url('product/form/'.$rsProduct["id_product"]) }}" class="btn btn-warning btn-flat btn-sm"><i class="far fa-edit"></i></a>
                            <a href="{{ url('product/delete/'.$rsProduct["id_product"]) }}" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
               @endforeach  
            </tbody>
        </table>
    </div>
</div>
@endsection