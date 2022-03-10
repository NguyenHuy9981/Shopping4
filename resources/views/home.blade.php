
@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection



@section('content')

    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Home', 'key' => ''])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
        </div>
        
      </div>
    </div>
    <!-- /.content -->
  </div>


@endsection
