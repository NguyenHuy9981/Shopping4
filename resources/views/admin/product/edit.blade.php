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
        @include('partials.header-content', ['name' => 'Sản phẩm', 'key' => 'cập nhật'])
    <!-- /.content-header -->

    <!-- Main content -->
  <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" value="{{ $product->name }}" class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập tên sản phẩm">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" class="form-control" value="{{ $product->price }}" id="exampleInputEmail1" name="price" placeholder="Nhập giá sản phẩm">
                    @error('price')
                        <div div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" class="form-control-file" name="feature_image">
                    <img class="width-height m-2" src="{{ url($product->feature_image) }}" alt="">
                </div>
                <div class="form-group">
                    <label>Ảnh chi tiết</label>
                    <input type="file" multiple class="form-control-file" name="image_path[]">
                    @foreach($product->images as $image)
                        <img class="width-height m-2" src="{{ url($image->image_path) }}" alt="">
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Chọn danh mục</label>
                    <select class="form-control select-init" name="parent_id">
                    <option value="">Chọn danh mục</option>
                    {!! $htmlOption !!}
                    </select>
                    @error('parent_id')
                        <div div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label>Nhập tags cho sản phẩm</label>
                <select class="form-control tag-select" multiple="multiple" name="tags[]">
                    @foreach($product->tags as $tag)
                        <option selected>{{ $tag->name }}</option>
                    @endforeach
                </select>
                </div>
          </div>
              <div class="col-md-12">
                    <div class="form-group">
                      <label for="Textarea1">Nhập nội dung</label>
                      <textarea class="form-control Tiny-mce" id="Textarea1" rows="20" name="content">{{ $product->content }}</textarea>
                      @error('content')
                          <div div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
              </div>
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
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

