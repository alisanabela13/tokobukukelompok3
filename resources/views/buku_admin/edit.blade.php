@extends('layouts.partials.app')

@section('title')
    Ubah Data Buku
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Ubah Data Buku</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Ubah Data Buku</h4>
                        </div>
                                <div class="card-body">
                                    <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                    <br><br>
                                    <form action="{{ route('buku.update', ['id' => $buku->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>ISBN*</p>
                                                    <input type="number" class="form-control" required name="isbn" value="{{ $buku->isbn }}" >
                                                    <br/>
                                                    <p>Judul Buku*</p>
                                                    <input type="text" class="form-control" required name="judul_buku" value="{{ $buku->judul_buku }}" >
                                                    <br/>
                                                    <p>Jenis Buku*</p>
                                                    <select required name="jenisbuku_id" class="form-control" value="{{ old('jenisbuku_id') }}">
                                                        <option value=''>- Pilih -</option>
                                                        @foreach($jenisbuku as $jen)
                                                            <option value="{{ $jen['id'] }}" {{$jen->id == $buku->jenisbuku_id ?  'selected' : ''}}> {{$jen->jenis_buku}} </option>
                                                        @endforeach
                                                    </select>
                                                    <br/>
                                                    <p>Nama Penulis*</p>
                                                    <select required name="penulis_id" class="form-control" value="{{ old('penulis_id') }}">
                                                        <option value=''>- Pilih -</option>
                                                        @foreach($penulis as $pel)
                                                            <option value="{{ $pel['id'] }}" {{$pel->id == $buku->penulis_id ?  'selected' : ''}}> {{$pel->nama_penulis}} </option>
                                                        @endforeach
                                                    </select>
                                                    <br/>
                                                    <p>Nama Penerbit*</p>
                                                    <select required name="penerbit_id" class="form-control" value="{{ old('penerbit_id') }}">
                                                        <option value=''>- Pilih -</option>
                                                        @foreach($penerbit as $per)     
                                                            <option value="{{ $per['id'] }}" {{$per->id == $buku->penerbit_id ?  'selected' : ''}}> {{$per->nama_penerbit}} </option>
                                                        @endforeach
                                                    </select>
                                                    <br/>
                                                    <p>Suplier*</p>
                                                    <select required name="suplier_id" class="form-control" value="{{ old('suplier_id') }}">
                                                        <option value=''>- Pilih -</option>
                                                        @foreach($suplier as $sup)     
                                                            <option value="{{ $sup['id'] }}" {{$sup->id == $buku->suplier_id ?  'selected' : ''}}> {{$sup->nama_suplier}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>Tahun Terbit Buku*</p>
                                                    <input type="number" class="form-control" required name="tahun_terbit" value="{{ $buku->tahun_terbit }}" >
                                                    <br/>
                                                    <p>Foto Cover Buku* (abaikan jika tidak ingin mengubah)</p>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" id= "file" name= "file" class="custom-file-input" id="inputGroupFile01" value="{{$buku->file}}">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <p>Harga Beli Buku (Per satuan)*</p>
                                                    <input type="number" class="form-control" required name="harga_beli" value="{{ $buku->harga_beli }}" >
                                                    <br/>
                                                    <p>Harga Jual Buku (Per satuan)*</p>
                                                    <input type="number" class="form-control" required name="harga_jual" value="{{ $buku->harga_jual }}" >
                                                    <br/>
                                                    <p>Rak Buku*</p>
                                                    <input type="text" class="form-control" required name="rak_buku" value="{{ $buku->rak_buku }}" >
                                                    <br/>
                                                    <p>Jumlah Stok Saat Ini*</p>
                                                    <input type="number" class="form-control" required name="jumlah_stok" value="{{ $buku->jumlah_stok }}" >
                                                    
                                                </div>
                                            </div>
                                          </div>
                                        <button class="btn btn-primary" type="submit">Ubah</button>
                                    </form>
                                </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection 
