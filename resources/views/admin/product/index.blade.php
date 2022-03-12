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
        @include('partials.header-content', ['name' => 'Sản phẩm', 'key' => ''])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2 mb-2" role="button" aria-pressed="true">Tạo sản phẩm</a>
          </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Giá</th>
              <th scope="col">Hình ảnh</th>
              <th scope="col">Danh mục</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @php
              $t = 0;
          @endphp

            @foreach($products as $product)
            <tr>
              @php
                $t += 1;
              @endphp

              <th scope="row">{{ $t }}</th>
              <td>{{ $product->name }}</td>
              <td>{{ number_format($product->price) }}</td>
              <td>
              <img class="width-height" src="{{ url($product->feature_image) }}" alt="">

              </td>
              <td>{{ optional($product->categories)->name }}</td>
              <td>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary">Sửa</a>
                <a href="" data-url="{{ route('product.delete', $product->id) }}" class="btn btn-danger action_delete">Xóa</a>
                
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