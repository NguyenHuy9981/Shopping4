@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Danh mục', 'key' => 'thay đổi'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
              @csrf
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $category->name }}" placeholder="Nhập tên danh mục">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chọn danh mục cha</label>
                    <select class="form-control" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!!$htmlOption!!}
                    </select>
                    @error('parent_id')
                      <div class="form-text text-danger">Không thể chọn danh mục đang chỉnh sửa</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  


@endsection