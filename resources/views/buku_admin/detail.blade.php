@extends('layouts.partials.app')

@section('title')
    Detail Buku
@endsection
@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Detail Buku</h1>
                </div>
                <div class="section-body">
                    <div class="row justify-content-center">
                        <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="card border-dark mb-3" style="max-width: 50rem; height:450px">
                                                <div class="card-header"><h4>Foto Cover Depan</h4></div>
                                                <div class="card-body text-dark">
                                                    <td><img src="{{ asset('buku/'.$buku->file) }}" alt="" style="width:100%; height:100%;"></td>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card">
                                                <div class="card-header"><h4>Detail Buku</h4></div>
                                                <div class="card-body">
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">JUDUL BUKU</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{strtoupper($buku->judul)}}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">ISBN</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{strtoupper($buku->isbn)}}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">JENIS BUKU</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{strtoupper($buku->Kategori->name)}}</div>
                                                    </div>
                                                    
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">PENULIS</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{strtoupper($buku->penulis->nama)}}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">PENERBIT</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{strtoupper($buku->penerbit->nama)}}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">TAHUN TERBIT</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{$buku->tahun_terbit}}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">Pemasok BUKU</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{strtoupper($buku->Pemasok->nama)}}</div>
                                                    </div>
                                                    
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">HARGA BELI (Per buku)</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">Rp. {{$buku->harga_beli}},00</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">HARGA JUAL (Per buku)</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">Rp. {{$buku->harga_jual}},00</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">Jumlah Stok Buku Saat ini</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{$buku->jumlah}} BUKU</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-4 col-5">RAK BUKU</div>
                                                        <div class="col-1 text-right">:</div>
                                                        <div class="col-lg-6 col-5">{{$buku->lokasi}}</div>
                                                    </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>                                   
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection