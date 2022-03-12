@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Menu', 'key' => 'tạo mới'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('menus.store') }}" method="POST">
              @csrf
                <div class="form-group">
                    <label>Tên menu</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập tên menu">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chọn menu cha</label>
                    <select class="form-control" name="parent_id">
                    <option value="0">Chọn menu cha</option>
                    {!! $htmlOption !!}
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.main-content -->
  </div>


@endsection