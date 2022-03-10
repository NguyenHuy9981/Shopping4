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
        @include('partials.header-content', ['name' => 'Setting', 'key' => 'add'])
    <!-- /.content-header -->

    <!-- Main content -->
  <form action="{{ route('setting.store') . '?type=' . request()->type  }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
                <div class="form-group">
                    <label>Config key</label>
                    <input type="text" value="{{ old('config_key') }}"class="form-control" name="config_key" placeholder="Nhập config key">
                    @error('config_key')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if(request()->type === 'Text')
                    <div class="form-group">
                        <label>Config value</label>
                        <input type="text" value="{{ old('name') }}"class="form-control" name="config_value" placeholder="Nhập config value">
                        @error('config_value')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @elseif(request()->type === 'Textarea')
                    <div class="form-group">
                        <label>Config value</label>
                        <textarea class="form-control" name="config_value" placeholder="Nhập config value"></textarea>
                        @error('config_value')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
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

