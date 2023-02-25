@extends('admin.main')
@section('content')

<table class="table">
  <thead>
      <tr>
        
          <th>ID</th>
          <th>Name</th>
         
      </tr>
  </thead>
  <tbody>
  <tbody>
  @foreach($hiendanhmuc as $danhmuc)
  <tr>

  
 
        <td>{{ $danhmuc->id}}</td>
        <td>  <a href="danhmuccon/{{$danhmuc->id}}"> {{$danhmuc->name}}</a> </td>
       
       <td> <a href="xoadanhmuc/{{$danhmuc->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>|<a href="suadanhmuc/{{$danhmuc->id}}"> Edit </a></td>
        </tr>
  @endforeach
 
</table>
@endsection
