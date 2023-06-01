<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
<br> 


@extends('layouts.app')


@section('cselect')
    
<div class="alert alert-primary" role="alert"><h1>Müştəri</h1></div>


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
<form method="post" enctype="multipart/form-data" action="{{route('clients')}}"> 
@csrf 
Adınız:<br> 
<input type="text" class="form-control" name="ad" value="{{old('ad')}}">
Soyadınız:<br> 
<input type="text" class="form-control" name="soyad" value="{{old('soyad')}}">
Telefon:<br> 
<input type="text" class="form-control" name="tel" value="{{old('tel')}}">
Email:<br> 
<input type="text" class="form-control" name="email" value="{{old('email')}}">
Şirkət:<br> 
<input type="text" class="form-control" name="shirket" value="{{old('shirket')}}">
Şəkil:<br> 
<input type="file" class="form-control" name="foto" value="{{old('foto')}}"><br> 
<button type="submit" class="btn btn-primary">Daxil et</button> 
</form>
</div> 
 @endempty 

 
@isset($editdata) 
<div class="alert alert-primary" role="alert">
<form method="post" enctype="multipart/form-data" action="{{route('cupdate')}}"> 
@csrf 
Adınız:<br>
<input type="text" class="form-control" name="ad" value="{{$editdata->ad}}"> 
Soyadınız:<br> 
<input type="text" class="form-control" name="soyad" value="{{$editdata->soyad}}">
Telefon:<br> 
<input type="text" class="form-control" name="tel" value="{{$editdata->tel}}">
Email:<br> 
<input type="text" class="form-control" name="email" value="{{$editdata->email}}">
Şirkət:<br> 
<input type="text" class="form-control" name="shirket" value="{{$editdata->shirket}}">
Şəkil:<br> 
<input type="file" class="form-control" name="foto" value="{{$editdata->foto}}"><br>
<img src="{{url($editdata->foto)}}" style="width:120px; height:120px" alt=""><br><br>

<input type="hidden"  name="id" value="{{$editdata->id}}">
<button type="submit" class="btn btn-info">Yenilə</button> 
<a href="{{route('clients')}}"><button type="button" class="btn btn-danger">Ləğv et</button></a> 
</form>
</div> 
@endisset 


@isset($sildata) 
<div class="alert alert-danger">Siz <b> {{$sildata->ad}} {{$sildata->soyad}} </b>adlı müştərini silməyə əminsinizmi?
<a href="{{route('cdelete',$sildata->id)}}"><button type="button" class="btn btn-info btn-sm">Hə</button></a> 
<a href="{{route('cselect',$sildata->id)}}"><button type="button" class="btn btn-danger btn-sm">Yox</button></a>
</div>
@endisset


<div class="alert alert-primary"> Bazada  <b> {{$data->count()}} </b> müştəri var </div> 
 
<table class="table table-bordered"> 
   <thead > 
     <tr> 
       <th>#</th>
       <th>Şəkil</th> 
       <th>Ad</th>
       <th>Soyad</th> 
       <th>Telefon</th> 
       <th>Email</th> 
       <th>Şirkət</th> 
       <th>Tarix</th> 
       <th>Sil & Redaktə</th> 
     </tr> 
   </thead>

   <tbody> 
    @foreach($data as $i=>$info) 
      <tr> 
        <td>{{$i+=1}}</td>
        <td><img src="{{url($info->foto)}}" style="width:70px; height:60px"></td>
        <td>{{$info->ad}}</td> 
        <td>{{$info->soyad}}</td> 
        <td>{{$info->tel}}</td> 
        <td>{{$info->email}}</td> 
        <td>{{$info->shirket}}</td>
        <td>{{$info->created_at}}</td> 
        <td><a href="{{route('csil',$info->id)}}"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a> 
        <a href="{{route('cedit',$info->id)}}"><button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></button></a></td> 
      </tr> 
      @endforeach 
    </tbody> 
 </table> 



@endsection