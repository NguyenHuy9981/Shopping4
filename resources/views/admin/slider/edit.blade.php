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
        @include('partials.header-content', ['name' => 'Slider', 'key' => 'Cập nhật'])
    <!-- /.content-header -->

    <!-- Main content -->
  <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
                <div class="form-group">
                    <label>Tên Slider</label>
                    <input type="text" value="{{ $slider->name }}"class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập tên sản phẩm">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" id="exampleInputEmail1" name="description" placeholder="Nhập mô tả">{{ $slider->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" class="form-control-file" name="image_path">
                    <img class="width-height m-2" src="{{ url($slider->image_path) }}" alt="">
                    @error('image_path')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
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

