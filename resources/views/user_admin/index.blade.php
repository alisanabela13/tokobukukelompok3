@extends('layouts.partials.app')
@section('title')
Pengguna
@endsection

@section('content')
<div class="main-wrapper main-wrapper-1">
<div class="main-content" style="min-height: 116px;">
        <section class="section">
          <div class="section-header">
                <h1>Pengguna</h1>
          </div>
        </section>
          <div class="section-body">
            <div class="content-body table">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        @include('layouts.flash-messages')
                        <div class="card">
                            <div class="card-header">
                                <h4>Pengguna</h4>
                                <div class="card-header-action">
                                <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                <a class="btn btn-sm btn-primary" href="{{route('user.create')}}" title="Tambah Data"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="table-index" class="display table-striped table-bordered" style="width:100%; text-align:center;">
                                    <thead style="">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Posisi</th>
                                            <th>E-Mail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $u)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$u->username}}</td>
                                                <td>
                                                    @if ($u->posisi == "Admin")
                                                    <span class="badge badge-warning">{{$u->posisi}}</span>
                                                    @elseif($u->posisi == "Operator")
                                                    <span class="badge badge-primary">{{$u->posisi}}</span>
                                                    @else
                                                    <span class="badge badge-success">{{$u->posisi}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$u->email}}</td>
                                                <td>
                                                    @if (auth()->user()->id == $u->id)
                                                        
                                                    <div class="btn-group">
                                                        <a type="submit" class="btn btn-sm btn-info text-white" href="{{ route('user.edit',  ['id' => $u["id"]]) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a type="button" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target=".bs-example-modal-lg-{{$u->id}}"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                    @else 
                                                    <div class="btn-group">
                                                        <a type="submit" class="btn btn-sm btn-info text-white" href="{{ route('user.edit',  ['id' => $u["id"]]) }}"><i class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a type="button" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target=".bs-example-modal-lg-{{$u->id}}"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <form method="post" class="delete_form " action="{{route('user.destroy',$u['id'])}}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button  class="btn btn-sm btn-danger" id="btn-delete"  ><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            {{-- modal --}}
                                            <div class="modal fade bs-example-modal-lg-{{$u->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Detail Pengguna</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12" style="text-align: left;">
                                                                <h6>Nama</h6>
                                                                <label for="">{{$u->name}}</label>
                                                                <hr>
                                                                <h6>Username</h6>
                                                                <label for="">{{$u->username}}</label>
                                                                <hr>
                                                                <h6>E-Mail</h6>
                                                                <label for="">{{$u->email}}</label>
                                                                <hr>
                                                                <h6>Telepon</h6>
                                                                <label for="">{{$u->telepon}}</label>
                                                                <hr>
                                                                <h6>Posisi</h6>
                                                                <label for="">{{$u->posisi}}</label>
                                                                <hr>
                                                                <h6>Alamat</h6>
                                                                <label for="">{{$u->alamat}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        {{-- </section> --}}
    </div>
</div>
@endsection