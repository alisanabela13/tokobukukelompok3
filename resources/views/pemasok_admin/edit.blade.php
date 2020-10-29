@extends('layouts.partials.app')

@section('title')
    Ubah Pemasok
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Ubah Pemasok</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Ubah Pemasok</h4>
                        </div>
                        <div class="card-body">
                            <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                            <br><br>
                            <form action="{{ route('pemasok.update', ['id' => $Pemasok->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Kategori*</p>
                                        <input type="text" class="form-control" required name="name" value="{{$kategori->name}}" >
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Nama Pemasok*</p>
                                        <input type="text" class="form-control" required name="nama" value="{{$Pemasok->nama}}" >
                                            <p>Telepon*</p>
                                            <input type="number" class="form-control" required name="telepon" value="{{$Pemasok->telepon}}" >
                                            <p>E-Mail*</p>
                                            <input type="email" class="form-control" required name="email" value="{{$Pemasok->email}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Alamat Pemasok*</p>
                                        <textarea type="text" class="form-control" required name="alamat"  style="height:215px">{{$Pemasok->alamat}}</textarea>
                                        </div>
                                    </div>
                                  </div>
                                <button class="btn btn-primary" type="submit">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
