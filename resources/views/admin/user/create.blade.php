@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection

@section('css')
<!-- import CSS thư viện select2 -->
  <link href="{{ asset('public\vendors\select2\select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Nhân viên', 'key' => 'thêm mới'])
    <!-- /.content-header -->

    <!-- Main content -->
  <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" value="{{ old('name') }}"class="form-control" name="name" placeholder="Nhập tên">
                    
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Nhập email">
                    
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" value="" class="form-control" name="password" placeholder="Nhập password">
                    
                </div>
                
                <div class="form-group">
                    <label>Nhập vai trò</label>
                    <select class="form-control tag-select" multiple="multiple" name="roles_id[]">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
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
<!-- JS -->
  <script src="{{ asset('public\admin\product\create\create.js') }}"></script>

@endsection

