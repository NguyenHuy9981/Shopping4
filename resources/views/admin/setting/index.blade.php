@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection

@section('css')
  <link href="{{ asset('public/admin/product/index/index.css') }}" rel="stylesheet">
@endsection

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Settings', 'key' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <button type="button" class="btn btn-primary dropdown-toggle float-right m-2 mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('setting.create') . '?type=Text' }}">Text</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('setting.create') . '?type=Textarea' }}">Textarea</a>
            </div>
          </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">config_key</th>
              <th scope="col">config_value</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @php
              $t = 0;
          @endphp

          @foreach($settings as $setting)
            <tr>
              @php
                $t += 1;
              @endphp

              <th scope="row">{{ $t }}</th>
              <td>{{ $setting->config_key }}</td>
              <td>{{ $setting->config_value }}</td>
             
              <td>
                <a href="{{ route('setting.edit', $setting->id) }}" class="btn btn-secondary">Sửa</a>
                <a href="" data-url="{{ route('setting.delete', $setting->id) }}" class="btn btn-danger action_delete">Xóa</a>
                
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>

        <div class="div-md-12">
          
        </div>

        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>


@endsection


@section('js')
  <!-- import thư viện JS Sweetalert2 -->
  <script src="{{ asset('public\vendors\sweetalert2\sweetalert2@11.js') }}"></script>
  <!-- import thư viện JS -->
  <script src="{{ asset('public\admin\index.js') }}"></script>
@endsection