@extends('layouts.template')

@section("title",$title)
@section("page_title",$page_title)

@section('content')
<div class="row">
    <div class="col-lg-6">
        {{-- Report Filter Per Tanggal --}}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Per Tanggal</h3>
            </div>
            <div class="card-body">
                <form action="{{ url("report/cetak/transaksi") }}" method="post" target="_blank">
                    @csrf
                    <div class="form-group">
                        <label for="tgl_awal">Tanggal Awal : </label>
                        <input type="date" class="form-control" name="tgl_awal">
                    </div>
                    <div class="form-group">
                        <label for="tgl_akhir">Tanggal Akhir : </label>
                        <input type="date" class="form-control" name="tgl_akhir">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="CETAK">
                    </div>
                </form>
            </div>
        </div>
        {{-- End Report Filter Per Tanggal --}}
    </div>
    <div class="col-lg-6">
        {{-- Report Filter Per Member --}}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Per Member</h3>
            </div>
            <div class="card-body">
                <form action="{{ url("report/cetak/trmember") }}" method="post" target="_blank">
                    @csrf
                    <div class="form-group">
                        <label for="id_member">Nama Member</label>
                        <select name="id_member" id="member" class="form-control" required>
                            <option value="">- Pilih Member -</option>
                            @foreach ($member as $rsMember)
                                <option value="{{ $rsMember["id_member"] }}">{{ $rsMember["nm_member"] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="CETAK">
                    </div>
                </form>
            </div>
        </div> 
        {{-- End Report Filter Per Member --}}       
    </div>
</div>
@endsection