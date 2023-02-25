<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="teamplate/admin/js/main.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('admin.footer')
@extends('admin.main')
@section('content')

<form action="" method="get" class="form-inline" role="form">
 
<div class="form-group">
    <input class="form-control" type="" name="key" placeholder="Search By Name...">
</div>

<button type="submit" class="btn btn-primary">
  <i class="fas fa-search"></i>
</button>

</form>

<table class="table">
  <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Active</th>
          <th>Update</th>
          <th>&nbsp;</th>
      </tr>
  </thead>
  <tbody>
  <tbody>
  @foreach($menu_arr as $td)
  <tr>

  
 
        <td>{{ $td->id}}</td>
        <td>{{ $td->name}}</td>
        <td>{{$td->active ==0 ?" No":"  YES "}}</td>
       
        <td>{{ $td->updated_at}}</td>
       <td> <a href="delete/{{$td->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>|<a href="edit/{{$td->id}}"> Edit </a></td>
     
      <!-- <td>
      <a  onclick="removeRow({{ $td->id}},\'/admin/delete\')" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
      |
       
       <a href="edit/{{$td->id}}"> Edit </a></td> -->
      </tr>
  @endforeach

</table>

<ul class="pagination modal-3">
  <li>{{ $menu_arr->appends(request()->all())->links(); }}</li>

</ul>
<style>
  .modal-3 a {
  margin-left: 3px;
  padding: 0;
  width: 30px;
  height: 30px;
  line-height: 30px;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.modal-3 a:hover {
  background-color: #4DAD16;
}
.modal-3 a.active, .modal-3 a:active {
  background-color: #37B247;
}
</style>

@endsection
