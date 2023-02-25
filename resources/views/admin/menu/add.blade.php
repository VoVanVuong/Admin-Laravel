@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
<base href="{{asset('')}}">
@endsection
@section('content')
<div class="card card-primary">

              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">

                    <label >Tên Tin Tức</label>
                    <input class="form-control" id="menu" name="name" placeholder="Thêm Tên Tin Tức">
                  </div>

                   <div class="form-group">
                    <label >Danh Mục</label>
                    <!-- <select name="parent_id" id="">
                       <option value="0">Danh Mục Cha</option>
                       @foreach($menu_arr as $td)


                       <option value="{{$td->id}}">{{$td->name}}</option>

                       @endforeach
                    </select> -->

                    <!-- <label >Danh Mục Cha</label> -->
                    <select name="danhmuc_id" id="">
                       <option value="0">Danh Mục Cha</option>
                       @foreach($themdanhmuc as $td)


                       <option value="{{$td->id}}">{{$td->name}}</option>


                       @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                      <label >Mô Tả</label>
                      <textarea name="description" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                      <label >Mô Tả Chi Tiết</label>
                      <textarea name="content" id="content" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                      <label >Ảnh sản phẩm</label>
                      <input type="file" name="file_upload" class="form-control" id="upload" enctype="multipart/form-data">
                      @csrf
                  </div>



                     <div class="form-group">
                     <label >Kích Hoạt</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                          <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" value="0"  type="radio" id="no_active" name="active" >
                          <label for="no_active" class="custom-control-label">Không</label>
                        </div>

                      </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tạo danh mục </button>
                </div>
                @csrf
              </form>
@section('footer')
            <script>

                CKEDITOR.replace( 'content' );
            </script>
@endsection
@endsection
