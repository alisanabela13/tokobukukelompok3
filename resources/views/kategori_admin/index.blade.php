@extends('layouts.partials.app')
@section('title')
Kategori Buku
@endsection

@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
          <div class="section-header">
                <h1>Kategori Buku</h1>
          </div>
        </section>
          <div class="section-body">
            <div class="content-body table">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                      @include('layouts.flash-messages')
                        <div class="card">
                            <div class="card-header">
                                <h4>Kategori Buku</h4>
                                <div class="card-header-action">
                                <div class="col-md-3 col-sm-3 col-xs-4 text-right">
                                <a class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target=".bs-example-modal-lg-" title="Tambah Data"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        {{-- modal tambah --}}
                        <div class="modal fade bs-example-modal-lg-" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" id="exampleModalLabel">Tambah Kategori</h3>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                        {{ csrf_field() }}
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"><h6>Kategori*</h6></label>
                                        <input type="text" class="form-control" required name="nama" value="{{ old('nama') }}" >
                                      </div>
                                      <button class="btn btn-primary" type="submit">Tambah</button>
                                    </form>
                                  </div>
                              </div>
                            </div>
                        </div>

                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="table-index" class="display table-striped table-bordered" style="width:100%; text-align:center;">
                                    <thead style="">
                                        <tr>
                                          <th>No</th>
                                          <th>Kategori</th>
                                          <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($kategori as $j)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$j->nama}}</td>
                                        <td>
                                          <div class="btn-group">
                                            <a type="submit" class="btn btn-sm btn-info text-white" data-toggle="modal" data-target=".bs-example-modal-lg-{{$j->id}}"><i class="fas fa-pencil-alt"></i></a>
                                          </div>
                                          <div class="btn-group">
                                            <form method="post" class="delete_form " action="{{route('kategori.destroy',$j['id'])}}">
                                            @method('DELETE')
                                            @csrf
                                              <button  class="btn btn-sm btn-danger" id="btn-delete"  ><i class="fa fa-trash"></i></button>
                                            </form>
                                          </div>
                                        </td>
                                        {{-- modal edit --}}
                                        <div class="modal fade bs-example-modal-lg-{{$j->id}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Ubah Kategori</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                            <div class="modal-body">
                                              <form action="{{ route('kategori.update', ['id' => $j->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                              {{ csrf_field() }}
                                              {{ method_field('PUT') }}
                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label"><h6>Kategori*</h6></label>
                                                  <input type="text" class="form-control" required name="nama" value="{{$j->nama}}" >
                                                </div>
                                                <button class="btn btn-primary" type="submit">Ubah</button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
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
        {{-- </section> --}}
    </div>
  </div>
@endsection
