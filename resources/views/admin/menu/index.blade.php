@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Menu', 'key' => ''])
    <!-- /.content-header -->

    <!-- Main content -->
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2 mb-2" role="button" aria-pressed="true">Tạo menu</a>
          </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên menu</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($menus as $menu)
            <tr>
              <th scope="row">{{ $menu->id }}</th>
              <td>{{ $menu->name }}</td>
              <td>
                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-secondary">Sửa</a>
                <a href="" class="btn btn-danger">Xóa</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="div-md-12">
          {{ $menus->links() }}
        </div>

        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>


@endsection