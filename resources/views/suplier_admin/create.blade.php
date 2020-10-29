@extends('layouts.partials.app')

@section('title')
    Tambah Pemasok Buku
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Tambah Pemasok Buku</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Pemasok Buku</h4>
                        </div>
                                <div class="card-body">
                                    <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                                    <br><br>
                                    <form action="{{ route('Pemasok.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>Nama Pemasok*</p>
                                                    <input type="text" class="form-control" required name="nama" value="{{ old('nama') }}" >
                                                    <p>No HP*</p>
                                                    <input type="number" class="form-control" required name="no_hp" value="{{ old('no_hp') }}" >
                                                    <p>E-Mail*</p>
                                                    <input type="email" class="form-control" required name="email" value="{{ old('email') }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>Alamat Pemasok*</p>
                                                    <textarea type="text" class="form-control" required name="alamat" value="{{ old('alamat') }}" style="height:215px"></textarea>
                                                </div>
                                            </div>
                                          </div>
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                    </form>
                                </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
