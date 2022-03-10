@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Menu', 'key' => 'thay đổi'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
              @csrf
                <div class="form-group">
                    <label>Tên menu</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $menu->name }}" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chọn danh mục cha</label>
                    <select class="form-control" name="parent_id">
                    <option value="0">Chọn menu cha</option>
                    {!!$htmlOption!!}
                    </select>
                    @error('parent_id')
                      <div class="form-text text-danger">Không thể chọn menu đang chỉnh sửa</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  


@endsection