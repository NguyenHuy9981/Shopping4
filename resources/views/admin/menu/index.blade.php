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
              <th scope="col">STT</th>
              <th scope="col">Tên menu</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @php
              $t = 0;
          @endphp

          @foreach($menus as $menu)
            <tr>
              @php
                $t += 1;
              @endphp
              <th scope="row">{{ $t }}</th>
              <td>{{ $menu->name }}</td>
              <td>
                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-secondary">Sửa</a>
                <a href="" data-url="{{ route('menus.delete', $menu->id) }}" class="btn btn-danger action_delete">Xóa</a>
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

@section('js')
  <!-- import thư viện JS Sweetalert2 -->
  <script src="{{ asset('public\vendors\sweetalert2\sweetalert2@11.js') }}"></script>
  <!-- import thư viện JS -->
  <script src="{{ asset('public\admin\index.js') }}"></script>
@endsection