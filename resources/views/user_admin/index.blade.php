@extends('layouts.partials.app')
@section('title')
User
@endsection

@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
          <div class="section-header">
                <h1>User</h1>
          </div>
          <div class="section-body">
            <div class="content-body table">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>User</h4>
                                <div class="card-header-action">
                                <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                    <a class="btn btn-sm btn-primary" href="#" title="Tambah Data"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="table-kelas" class="display table-striped table-bordered" style="width:100%; text-align:center;">
                                    <thead style="">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>E-Mail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($users as $u)
                                      <tr>
                                      <td>{{$loop->index+1}}</td>
                                      <td>{{$u->name}}</td>
                                      <td>{{$u->email}}</td>
                                  <td>
                                      {{-- {!! Form::open(['method'=>'delete', 'route'=>['kelas.destroy',$item->id]]) !!}
                                          <a href="{{route('kelas.edit',['id'=>$item->id])}}" class="btn btn-info"> <i class="fa fa-edit"></i></a>
                                          <button class="btn btn-danger" onclick="swaldelete({{$item->id}},'kelas',event)"> <i class="fa fa-trash"></i></button>
                                          <a href="{{ route( 'kelas.detail' ,['id' => $item->id]) }}" class="btn btn-success"> <i class="fa fa-file"></i></a>
                                      {!! Form::close() !!} --}}
                                      <a href="#" class="btn btn-info" title="edit"><i class="fa fa-edit"></i></a>
                                      <a href="#" class="btn btn-danger" title="hapus"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                                  @endforeach
                                    </tbody>
                                </table>
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