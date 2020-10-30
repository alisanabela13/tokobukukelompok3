@extends('layouts.partials.app')

@section('title')
    Ubah Data Pengguna
@endsection

@section('content')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content" style="min-height: 116px;">
            <section class="section">
                <div class="section-header">
                    <h1>Ubah Data Pengguna</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Ubah Data Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <h6>Bila ada tanda <span class="text-danger">*</span> Input tidak boleh dikosongkan.</h6>
                            <br><br>
                            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Nama*
                                            <input type="text" class="form-control" required name="name" value="{{$user->name}}" ><br/>
                                            Username*
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="{{$user->username}}" >
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <br/>
                                            Posisi*
                                            <select name="posisi" class="form-control" value="{{ old('posisi') }}">
                                                @if ($user->posisi == "Admin")
                                                    <option value="Admin" selected>Admin</option>
                                                    <option value="Operator">Operator</option>
                                                    <option value="Kasir">Kasir</option>
                                                @elseif($user->posisi == "Operator")
                                                    <option value="Admin">Admin</option>
                                                    <option value="Operator" selected>Operator</option>
                                                    <option value="Kasir">Kasir</option>
                                                @else
                                                    <option value="Admin">Admin</option>
                                                    <option value="Operator">Operator</option>
                                                    <option value="Kasir" selected>Kasir</option>
                                                @endif
                                            </select>
                                            <br/>
                                            E-Mail*
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{$user->email}}" >
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        Telepon*
                                        <input type="number" class="form-control" required name="telepon" value="{{$user->telepon}}" ><br/>
                                        Alamat*
                                        <textarea type="text" class="form-control" required name="alamat"  style="height:215px">{{$user->alamat}}</textarea>
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
