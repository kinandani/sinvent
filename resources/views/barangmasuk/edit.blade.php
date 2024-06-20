@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangmasuk.update',$rsetBarangMasuk->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">TGL_MASUK</label>
                                <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" name="tgl_masuk" value="{{ old('tgl_masuk',$rsetBarangMasuk->tgl_masuk) }}" placeholder="Masukkan Nama Siswa">
                            
                                <!-- error message untuk nama -->
                                @error('tgl_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">QTY_KELUAR</label>
                                <input type="text" class="form-control @error('qty_masuk') is-invalid @enderror" name="qty_masuk" value="{{ old('qty_masuk',$rsetBarangMasuk->qty_masuk) }}" placeholder="Masukkan Nomor Induk Siswa">
                            
                                <!-- error message untuk qty_masuk -->
                                @error('qty_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">BARANG_ID</label>
                                <select class="form-control" name="barang_id" id="">
                                <option value="{{ old('id', $rsetBarangMasuk->id) }}">
                                    Merk barang: {{ old('merk', optional($rsetBarangMasuk->barang)->merk) }} -- 
                                    Stok sekarang: {{ old('stok', optional($rsetBarangMasuk->barang)->stok) }}
                                    </option>
                                    @foreach($barangID as $barangIdrow)
                                        <option value="{{$barangIdrow->id}}">Merk barang: {{$barangIdrow->merk}} -- Stok sekarang: {{$barangIdrow->stok}}</option>
                                    @endforeach
                                </select>
                            
                                <!-- error message untuk nis -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>

 

            </div>
        </div>
    </div>
@endsection