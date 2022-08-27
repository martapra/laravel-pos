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
    <form action="{{ url('user/save') }}" method="post">
        @csrf {{-- Token Keamanan --}}
        <div class="row">
            <div class="dt_foto col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img id="avatar" src="{{ @$rsUser->foto != "" ? $rsUser->foto : asset('images/no-image.jpg') }}" alt="">
                        <input type="file" name="file" id="file" style="display: none">
                        <textarea name="foto" id="foto" cols="30" rows="10" style="display: none;">{{ @$rsUser->foto }}</textarea>
                    </div>
                </div>                
            </div>
            <div class="dt_user col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama User</label>
                            <input type="hidden" name="id" value="{{ @$rsUser->id }}">
                            <input type="text" class="form-control @error("name") is-invalid  @enderror" id="name" name="name" placeholder="Nama User" value="{{ old("name") ? old("name") : @$rsUser->name }}">
                            @error("name")
                            <span id="error-name" class="error invalid-feedback">
                                {{ $errors->first("name") }}
                            </span>
                            @enderror
                        </div>                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error("email") is-invalid  @enderror" id="email" name="email" placeholder="Email" value="{{ old("email") ? old("email") : @$rsUser->email }}">
                            @error("email")
                            <span id="error-email" class="error invalid-feedback">
                                {{ $errors->first("email") }}
                            </span>
                            @enderror
                        </div>                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="hidden" name="old_password" value="{{ @$rsUser->password }}">
                            <input type="password" class="form-control @error("password") is-invalid  @enderror" id="password" name="password" placeholder="password" value="{{ old("password") }}">
                            @error("password")
                            <span id="error-password" class="error invalid-feedback">
                                {{ $errors->first("password") }}
                            </span>
                            @enderror
                        </div>                        
                        <div class="form-group">
                            <label for="role">Jenis Kelamin</label>
                            <select class="custom-select rounded-0 @error("role") is-invalid  @enderror" id="role" name="role">
                                <option value="">- Pilih Role -</option>
                                <option {{ @$rsUser->role == "Admin" ? "selected" : "" }} value="Admin">Admin</option>
                                <option {{ @$rsUser->role == "Operator" ? "selected" : "" }} value="Operator">Operator</option>
                                <option {{ @$rsUser->role == "Member" ? "selected" : "" }} value="Member">Member</option>
                            </select>
                            @error("role")
                            <span id="error-role" class="error invalid-feedback">
                                {{ $errors->first("role") }}
                            </span>
                            @enderror                            
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="custom-select rounded-0 @error("status") is-invalid  @enderror" id="status" name="status">
                                <option value="">- Pilih Status -</option>
                                <option {{ @$rsUser->status == 1 ? "selected" : "" }} value="1">Aktif</option>
                                <option {{ @$rsUser->status == 2 ? "selected" : "" }} value="2">Non Aktif</option>
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