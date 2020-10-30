@extends('layouts.partials.app')
@section('title')
Buku
@endsection

@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
          <div class="section-header">
                <h1>Buku</h1>
          </div>
          <div class="section-body">
            <div class="content-body table">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Buku</h4>
                                <div class="card-header-action">
                                <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                <a class="btn btn-sm btn-primary" href="{{route('buku.create')}}" title="Tambah Data"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="table-index" class="display table-striped table-bordered" style="width:100%; text-align:center;">
                                    <thead style="">
                                        <tr>
                                            <th>No</th>
                                            <th>ISBN</th>
                                            <th>Judul Buku</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($buku as $b)
                                      <tr>
                                      <td>{{$loop->index+1}}</td>
                                      <td>{{$b->isbn}}</td>
                                      <td>{{$b->judul}}</td>
                                      <td>{{$b->Kategori->nama}}</td>
                                      <td>{{$b->jumlah}}</td>
                                      <td>Rp. {{$b->harga}},00</td>
                                  <td>
                                      <div class="btn-group">
                                        <a type="submit" class="btn btn-sm btn-info text-white" href="{{ route('buku.edit',  ['id' => $b["id"]]) }}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form method="post" class="delete_form " action="{{route('buku.destroy',$b['id'])}}">
                                            @method('DELETE')
                                            @csrf
                                            <button  class="btn btn-sm btn-danger" id="btn-delete"  ><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                      <div class="btn-group">
                                        <a href="{{ route( 'buku.detail' ,['id' => $b->id]) }}" class="btn btn-sm btn-primary text-white"><i class="fa fa-eye"></i></i></a>
                                    </div>
                                  </td>
                              </tr>
                                  @endforeach
                                    </tbody>
                                </table> <br>
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