@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Danh mục', 'key' => ''])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2 mb-2" role="button" aria-pressed="true">Tạo danh mục</a>
          </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên danh mục</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <th scope="row">{{ $category->id }}</th>
              <td>{{ $category->name }}</td>
              <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">Sửa</a>
                <a href="" data-cat="{{ route('categories.delete', $category->id) }}" class="btn btn-danger action_delete">Xóa</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="div-md-12">
          {{ $categories->links('') }}
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






  