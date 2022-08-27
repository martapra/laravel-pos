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
    <form action="{{ url('product/save') }}" method="post">
        @csrf {{-- Token Keamanan --}}
        <div class="row">
            <div class="dt_foto col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img id="avatar" src="{{ @$rsProduct->foto != "" ? $rsProduct->foto : asset('images/no-image.jpg') }}" alt="">
                        <input type="file" name="file" id="file" style="display: none">
                        <textarea name="foto" id="foto" cols="30" rows="10" style="display: none;">{{ @$rsProduct->foto }}</textarea>
                    </div>
                </div>                
            </div>
            <div class="dt_product col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kd_product">Kode Product</label>
                            <input type="hidden" name="id_product" value="{{ @$rsProduct->id_product }}">
                            <input type="text" class="form-control @error("kd_product") is-invalid  @enderror" id="kd_product" name="kd_product" placeholder="Kode Product" value="{{ old("kd_product") ? old("kd_product") : @$rsProduct->kd_product }}">
                            @error("kd_product")
                            <span id="error-kd_product" class="error invalid-feedback">
                                {{ $errors->first("kd_product") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nm_product">Nama Product</label>
                            <input type="text" class="form-control @error("nm_product") is-invalid  @enderror" id="nm_product" name="nm_product" placeholder="Nama Product" value="{{ old("nm_product") ? old("nm_product") : @$rsProduct->nm_product }}">
                            @error("nm_product")
                            <span id="error-nm_product" class="error invalid-feedback">
                                {{ $errors->first("nm_product") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" min="0" class="form-control @error("harga") is-invalid  @enderror" id="harga" name="harga" placeholder="Harga" value="{{ old("harga") ? old("harga") : @$rsProduct->harga }}">
                            @error("harga")
                            <span id="error-harga" class="error invalid-feedback">
                                {{ $errors->first("harga") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategory</label>
                            <select class="custom-select rounded-0 @error("kategori") is-invalid  @enderror" id="kategori" name="kategori">
                                <option value="">- Pilih Kategori -</option>
                                <option {{ @$rsProduct->kategori == "Desktop" ? "selected" : "" }} value="Desktop">Desktop</option>
                                <option {{ @$rsProduct->kategori == "Laptop" ? "selected" : "" }} value="Laptop">Laptop</option>
                                <option {{ @$rsProduct->kategori == "Game Hardware" ? "selected" : "" }} value="Game Hardware">Game Hardware</option>
                                <option {{ @$rsProduct->kategori == "Monitor" ? "selected" : "" }} value="Monitor">Monitor</option>
                                <option {{ @$rsProduct->kategori == "Computer Accessories" ? "selected" : "" }} value="Computer Accessories">Computer Accessories</option>
                            </select>
                            @error("kategori")
                            <span id="error-kategori" class="error invalid-feedback">
                                {{ $errors->first("kategori") }}
                            </span>
                            @enderror                            
                        </div>                        
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control @error("satuan") is-invalid  @enderror" id="satuan" name="satuan" placeholder="Satuan" value="{{ old("satuan") ? old("satuan") : @$rsProduct->satuan }}">
                            @error("satuan")
                            <span id="error-satuan" class="error invalid-feedback">
                                {{ $errors->first("satuan") }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control @error("ket") is-invalid  @enderror" id="ket" name="ket" placeholder="Keterangan">{{ old("ket") ? old("ket") : @$rsProduct->ket }}</textarea>
                            @error("ket")
                            <span id="error-ket" class="error invalid-feedback">
                                {{ $errors->first("ket") }}
                            </span>
                            @enderror
                        </div>                        
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <select class="custom-select rounded-0 @error("stok") is-invalid  @enderror" id="stok" name="stok">
                                <option value="">- Pilih Stok -</option>
                                <option {{ @$rsProduct->stok == "Available" ? "selected" : "" }} value="Available">Available</option>
                                <option {{ @$rsProduct->stok == "Not Available" ? "selected" : "" }} value="Not Available">Not Available</option>
                            </select>
                            @error("stok")
                            <span id="error-stok" class="error invalid-feedback">
                                {{ $errors->first("stok") }}
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