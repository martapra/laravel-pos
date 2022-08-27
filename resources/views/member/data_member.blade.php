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
<div class="card-body">
    <div class="card-header">
      <div class="card-title">
        <a href="{{ url('member/form') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i>ADD NEW </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover data">
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $rsMember)
                <tr>
                    <td>{{ $rsMember["id_member"] }}</td>
                    <td>{{ $rsMember["kd_member"] }}</td>
                    <td>{{ $rsMember["nm_member"] }}</td>
                    <td>
                        {{ $rsMember["alamat"]." ".$rsMember["kota"] }}
                        <br/>
                        Telp : {{ $rsMember["telp"] }}
                    </td>
                    <td>{{ $rsMember["jk"]==1 ? "Laki-laki" : "Perempuan" }}</td>
                    <td>{{ $rsMember["status"]==1 ? "Active" : "Non Active" }}</td>
                    <td>
                        <a href="{{ url('member/form/'.$rsMember["id_member"]) }}" class="btn btn-warning btn-flat btn-sm"><i class="far fa-edit"></i></a>
                        <a href="{{ url('member/delete/'.$rsMember["id_member"]) }}" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>       
@endsection
    
