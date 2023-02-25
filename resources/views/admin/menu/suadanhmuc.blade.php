@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
<base href="{{asset('')}}">
@endsection
@section('content')
<div class="card card-primary">

              <form action="" method="POST">
                <div class="card-body">

                  <div class="form-group">
                  
                    <label >Tên Danh Mục</label>
                    <input class="form-control" id="menu" name="name" value="{{$doidanhmuc->name}}">
                  </div>

                   
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa danh mục </button>
                </div>
                @csrf
              </form>
@section('footer')
            <script>

                CKEDITOR.replace( 'content' );
            </script>
@endsection
@endsection
