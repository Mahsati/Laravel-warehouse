<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
<br> 



@extends('layouts.app')


@section('eselect')
    
<div class="alert alert-primary" role="alert"><h1>Xərc</h1></div>



@if($errors->any())
    @foreach($errors->all() as $sehv)
    <div class="alert alert-danger"> {{$sehv}}<br></div>
    @endforeach
@endif

@if(session('mesaj1'))
<div class="alert alert-info">{{session('mesaj1')}}</div>
@endif


@if(session('mesaj2'))
<div class="alert alert-warning">{{session('mesaj2')}}</div>
@endif



@empty($editdata) 
<div class="alert alert-primary" role="alert">
<form method="post"  action="{{route('expenses')}}"> 
@csrf 
Təyinat:<br> 
<input type="text" class="form-control" name="teyinat" value="{{old('teyinat')}}">
Məbləğ:<br> 
<input type="text" class="form-control" name="mebleg" value="{{old('mebleg')}}"><br> 
<button type="submit" class="btn btn-primary">Daxil et</button> 
</form>
</div> 
 @endempty 
 
 
 
@isset($editdata) 
<div class="alert alert-primary" role="alert">
<form method="post"  action="{{route('eupdate')}}"> 
@csrf 
Təyinat:<br>
<input type="text" class="form-control" name="teyinat" value="{{$editdata->teyinat}}"> 
Məbləğ:<br> 
<input type="text" class="form-control" name="mebleg" value="{{$editdata->mebleg}}"><br>

<input type="hidden"  name="id" value="{{$editdata->id}}">
<button type="submit" class="btn btn-info">Yenilə</button> 
<a href="{{route('expenses')}}"><button type="button" class="btn btn-danger">Ləğv et</button></a> 
</form>
</div> 
@endisset 

@isset($sildata) 
<div class="alert alert-danger">Siz bu xərci silməyə əminsinizmi?
<a href="{{route('edelete',$sildata->id)}}"><button type="button" class="btn btn-info btn-sm" >Hə</button></a> 
<a href="{{route('eselect',$sildata->id)}}"><button type="button" class="btn btn-danger btn-sm">Yox</button></a>
</div>
@endisset


<div class="alert alert-primary"> Bazada  <b> {{$data->count()}} </b> xərc var </div> 
 
<table class="table table-bordered"> 
   <thead > 
     <tr> 
       <th>#</th> 
       <th>Təyinat</th> 
       <th>Məbləğ </th> 
       <th>Tarix </th> 
       <th>Sil & Redaktə</th> 
     </tr> 
   </thead>

   <tbody> 
    @foreach($data as $i=>$info) 
    <tr> 
      <td>{{$i+=1}}</td> 
      <td>{{$info->teyinat}}</td> 
      <td>{{$info->mebleg}}</td> 
      <td>{{$info->created_at}}</td> 
      <td>
      <a href="{{route('esil',$info->id)}}"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a> 
      <a href="{{route('eedit',$info->id)}}"><button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></button></a>
     </td> 
    </tr> 
   @endforeach 
   </tbody> 
</table> 


@endsection