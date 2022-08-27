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
        <a href="{{ url('transaksi/form') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> ADD NEW</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover data">
            <thead>
                <tr>
                    <th>Nota</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th>Member</th>
                    <th>Grand Total</th>
                    <th>Diskon</th>
                    <th>PPN</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>                
               @foreach($transaksi as $rsTransaksi)
                    <tr>
                        <td>{{ $rsTransaksi->nota }}</td>
                        <td>{{ $rsTransaksi->tanggal }}</td>                     
                        <td>{{ $rsTransaksi->name }}</td>                     
                        <td>{{ $rsTransaksi->nm_member }}</td>                     
                        <td>{{ $rsTransaksi->gtotal }}</td>                     
                        <td>{{ $rsTransaksi->diskon }}</td>                     
                        <td>{{ $rsTransaksi->ppn }}</td>                     
                        <td>{{ $rsTransaksi->status==1 ? "Selesai" : "Pending" }}</td>
                        <td>
                            <a href="{{ url('transaksi/nota/'.$rsTransaksi->id_transaksi) }}" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-file-invoice"></i></a>
                            <a href="{{ url('transaksi/delete/'.$rsTransaksi->id_transaksi) }}" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
               @endforeach  
            </tbody>
        </table>
    </div>
</div>
@endsection