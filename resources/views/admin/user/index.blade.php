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
        @include('partials.header-content', ['name' => 'Nhân viên', 'key' => 'Danh sách'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @php
              $t = 0;
          @endphp

            @foreach($users as $user)
            <tr>
              @php
                $t += 1;
              @endphp
              
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-secondary">Sửa</a>
                <a href="" data-url="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger action_delete">Xóa</a>
                
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