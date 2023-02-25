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
  
  @foreach($lienket as $lienket)
  <tr>
  <th>{{$lienket->id}}</th>
  <th>{{$lienket->name}}</th>
          <th>Active</th>
          <th>Update</th>
          <th>&nbsp;</th>
 
 </tr>
  
 
  @endforeach
  <tbody>
  
</table>


@endsection
