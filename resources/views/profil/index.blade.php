@extends('layouts.partials.app')
@section('title')
Profil
@endsection

@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content" style="min-height: 116px;">
        <section class="section">
          <div class="section-header">
                <h1>Profil Saya</h1>
          </div>
          <div class="section-body">
            <div class="content-body table">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        @if ( $alert = Session::get('alert') )
                            <div class="alert alert-{{ $alert['type'] }} alert-dismissible fade show">
                                {{ $alert['message'] }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Profil</h4>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
  </div>
@endsection