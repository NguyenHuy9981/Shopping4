@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection

@section('css')
<!-- import CSS thư viện select2 -->
  <link href="{{ asset('public\vendors\select2\select2.min.css') }}" rel="stylesheet"/>
<!-- import CSS -->
  <link href="{{ asset('public\admin\product\update\edit.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Role', 'key' => 'Cập nhật'])
    <!-- /.content-header -->

    <!-- Main content -->
  <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
                <div class="form-group">
                    <label>Tên vai trò (Role)</label>
                    <input type="text" value=""class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập tên sản phẩm">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Mô tả vai trò</label>
                    <textarea class="form-control" id="exampleInputEmail1" name="display_name" placeholder="Nhập mô tả"></textarea>
                </div>
                @foreach($permissions as $permission)
                <div class="form-group">
                    <h5>{{ $permission->name }}</h5>
                    @foreach($permission->parent as $permissionchildrent )
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" value="{{ $permissionchildrent->id }}" name="permissionOfRole[]" class="custom-control-input" id="{{ $permissionchildrent->id }}">
                      <label class="custom-control-label" for="{{ $permissionchildrent->id }}">{{ $permissionchildrent->name }}</label>
                    </div>
                    @endforeach
                </div>
               @endforeach
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </div>
      </div>
    </div>
  </form>

    <!-- /.main-content -->
  </div>

  

@endsection

@section('js')
<!-- import thư viện JS Select2 -->
  <script src="{{ asset('public\vendors\select2\select2.min.js') }}"></script>
<!-- import thư viện JS TinyMCE5 -->
  <script src="https://cdn.tiny.cloud/1/w93p921wxoq1ktygg8fk1o472zbu1odwypxnwc08j3abitbp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- JS -->
  <script src="{{ asset('public\admin\product\create\create.js') }}"></script>

@endsection