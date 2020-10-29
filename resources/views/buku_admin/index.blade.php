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
                                            <th>Foto</th>
                                            <th>ISBN</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>Harga Jual</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($buku as $b)
                                      <tr>
                                      <td>{{$loop->index+1}}</td>
                                      <td><img src="{{ asset('buku/'.$b->file) }}" alt="" style="width:80px; height:100px; margin-top:9px"></td>
                                      <td>{{$b->isbn}}</td>
                                      <td>{{$b->judul}}</td>
                                      <td>{{$b->penulis ? $b->penulis->nama : ''}}</td>
                                      <td>Rp. {{$b->harga_jual}},00</td>
                                  <td>
                                      {{-- {!! Form::open(['method'=>'delete', 'route'=>['kelas.destroy',$item->id]]) !!}
                                          <a href="{{route('kelas.edit',['id'=>$item->id])}}" class="btn btn-info"> <i class="fa fa-edit"></i></a>
                                          <button class="btn btn-danger" onclick="swaldelete({{$item->id}},'kelas',event)"> <i class="fa fa-trash"></i></button>
                                          <a href="{{ route( 'kelas.detail' ,['id' => $item->id]) }}" class="btn btn-success"> <i class="fa fa-file"></i></a>
                                      {!! Form::close() !!} --}}
                                      {{-- <a href="#" class="btn btn-info" title="edit"><i class="fa fa-edit"></i></a>
                                      <a href="#" class="btn btn-danger" title="hapus"><i class="fa fa-trash"></i></a> --}}
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
                                        <a href="{{ route( 'buku.detail' ,['id' => $b->id]) }}" class="btn btn-sm btn-success text-white"><i class="fas fa fa-file"></i></a>
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