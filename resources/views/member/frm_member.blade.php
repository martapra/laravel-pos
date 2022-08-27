@extends('layouts.template')

@section("title",$title)
@section("page_title",$page_title)

@section('content')
    <script>
        $(function(){
            @if($errors->any())
            showMessage("error", "Terjadi Kesalahan !");
            @endif
        });
    </script>
    <form action="{{ url('member/save') }}" method="post">
        @csrf {{-- Token Keamanan --}}
        <div class="row">
            <div class="dt_foto col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img id="avatar" src="{{ @$rsMember->foto != "" ? $rsMember->foto : asset('images/no-image.jpg') }}" alt="">
                        <input type="file" name="file" id="file" style="display: none">
                        <textarea name="foto" id="foto" cols="30" rows="10" style="display: none;">{{ @$rsMember->foto }}</textarea>
                    </div>
                </div>                
            </div>
            <div class="dt_member col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kd_member">Kode Member</label>
                            <input type="hidden" name="id_member" value="{{ @$rsMember->id_member }}">
                            <input type="text" class="form-control @error("kd_member") is-invalid  @enderror" id="kd_member" name="kd_member" placeholder="Kode Member" value="{{ old("kd_member") ? old("kd_member") : @$rsMember->kd_member }}">
                            @error("kd_member")
                            <span id="error-kd_member" class="error invalid-feedback">
                                {{ $errors->first("kd_member") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nm_member">Nama Member</label>
                            <input type="text" class="form-control @error("nm_member") is-invalid  @enderror" id="nm_member" name="nm_member" placeholder="Nama Member" value="{{ old("nm_member") ? old("nm_member") : @$rsMember->nm_member }}">
                            @error("nm_member")
                            <span id="error-nm_member" class="error invalid-feedback">
                                {{ $errors->first("nm_member") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error("alamat") is-invalid  @enderror" id="alamat" name="alamat" placeholder="Alamat">{{ old("alamat") ? old("alamat") : @$rsMember->alamat }}</textarea>
                            @error("alamat")
                            <span id="error-alamat" class="error invalid-feedback">
                                {{ $errors->first("alamat") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control @error("kota") is-invalid  @enderror" id="kota" name="kota" placeholder="Kota" value="{{ old("kota") ? old("kota") : @$rsMember->kota }}">
                            @error("kota")
                            <span id="error-kota" class="error invalid-feedback">
                                {{ $errors->first("kota") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telp">Telepon</label>
                            <input type="text" class="form-control @error("telp") is-invalid  @enderror" id="telp" name="telp" placeholder="telp" value="{{ old("telp") ? old("telp") : @$rsMember->telp }}">
                            @error("telp")
                            <span id="error-telp" class="error invalid-feedback">
                                {{ $errors->first("telp") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis kelamin</label>
                            <select class="custom-select rounded-0 @error("jk") is-invalid  @enderror" id="jk" name="jk">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option {{ @$rsMember->jk == 1 ? "selected" : "" }} value="1">Laki-laki</option>
                                <option {{ @$rsMember->jk == 2 ? "selected" : "" }} value="2">Perempuan</option>
                            </select>
                            @error("jk")
                            <span id="error-jk" class="error invalid-feedback">
                                {{ $errors->first("jk") }}
                            </span>
                            @enderror                            
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="custom-select rounded-0 @error("status") is-invalid  @enderror" id="status" name="status">
                                <option value="">- Pilih Status -</option>
                                <option {{ @$rsMember->status == 1 ? "selected" : "" }} value="1">Aktif</option>
                                <option {{ @$rsMember->status == 2 ? "selected" : "" }} value="2">Non Aktif</option>
                            </select>
                            @error("status")
                            <span id="error-status" class="error invalid-feedback">
                                {{ $errors->first("status") }}
                            </span>
                            @enderror 
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-flat btn-lg btn-primary w-50">SAVE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection