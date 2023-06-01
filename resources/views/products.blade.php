<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
<br> 


@extends('layouts.app')


@section('pselect')
    
<div class="alert alert-primary" role="alert"><h1>Məhsul</h1></div>



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
<form method="post" enctype="multipart/form-data" action="{{route('products')}}"> 
@csrf 
Brend:<br> 
<select name="brand_id" class="form-control">
    <option value="">Brendi seçin</option>
    @foreach($bdata as $binfo)
     <option value="{{$binfo->id}}">{{$binfo->brend}}</option>
    @endforeach
</select>
Məhsul:<br> 
<input type="text" class="form-control" name="mehsul" value="{{old('mehsul')}}">
Alış:<br> 
<input type="text" class="form-control" name="al" value="{{old('al')}}">
Satış:<br> 
<input type="text" class="form-control" name="sat" value="{{old('sat')}}">
Miqdar:<br> 
<input type="text" class="form-control" name="stok" value="{{old('stok')}}">
Şəkil:<br> 
<input type="file" class="form-control" name="foto" value="{{old('foto')}}"><br> 
<button type="submit" class="btn btn-primary">Daxil et</button> 
</form>
</div> 
 @endempty 


 
 @isset($editdata) 
 <div class="alert alert-primary" role="alert">
 <form method="post" enctype="multipart/form-data" action="{{route('pupdate')}}"> 
 @csrf 
 Brend:<br>
 <select name="brand_id" class="form-control">
  <option value="">Brendi seçin</option>
  @foreach($bdata as $binfo)
  @if($editdata->brand_id == $binfo->id)
   <option selected value="{{$binfo->id}}">{{$binfo->brend}}</option>
  @else
   <option value="{{$binfo->id}}">{{$binfo->brend}}</option>
  @endif
  @endforeach
</select>
 Məhsul:<br>
 <input type="text" class="form-control" name="mehsul" value="{{$editdata->mehsul}}">
 Alış:<br>
 <input type="text" class="form-control" name="al" value="{{$editdata->al}}">
 Satış:<br>
 <input type="text" class="form-control" name="sat" value="{{$editdata->sat}}">
 Miqdar:<br>
 <input type="text" class="form-control" name="stok" value="{{$editdata->stok}}"> 
 Şəkil:<br> 
 <input type="file" class="form-control" name="foto" value="{{url($editdata->foto)}}"><br> 
 <img src="{{url($editdata->foto)}}" style="width:120px; height:120px" alt=""><br><br>
 <input type="hidden"  name="id" value="{{$editdata->id}}">
 <button type="submit" class="btn btn-info">Yenilə</button> 
 <a href="{{route('products')}}"><button type="button" class="btn btn-danger">Ləğv et</button></a> 
 </form>
 </div> 
 @endisset 



@isset($sildata) 
<div class="alert alert-danger">Siz <b> {{$sildata->mehsul}}  </b>adlı məhsulu silməyə əminsinizmi?
<a href="{{route('pdelete',$sildata->id)}}"><button type="button" class="btn btn-info btn-sm" >Hə</button></a> 
<a href="{{route('pselect',$sildata->id)}}"><button type="button" class="btn btn-danger btn-sm">Yox</button></a>
</div>
@endisset
 
 
<div class="alert alert-primary"> Bazada  <b> {{$data->count()}} </b> məhsul var </div> 
  
 <table class="table table-bordered"> 
    <thead > 
      <tr> 
        <th>#</th> 
        <th>Şəkil</th> 
        <th>Brend </th> 
        <th>Məhsul </th> 
        <th>Alış </th> 
        <th>Satış </th> 
        <th>Stok </th>
        <th>Tarix </th>
        <th>Sil & Redaktə</th> 
      </tr> 
    </thead>
 
    <tbody> 
    @foreach($data as $i=>$info) 
      <tr> 
        <td>{{$i+=1}}</td> 
        <td><img src="{{url($info->foto)}}" style="width:70px; height:60px"></td>
        <td>{{$info->brend}}</td> 
        <td>{{$info->mehsul}}</td> 
        <td>{{$info->al}}</td> 
        <td>{{$info->sat}}</td> 
        <td>{{$info->stok}}</td>
        <td>{{$info->created_at}}</td>
        <td><a href="{{route('psil',$info->id)}}"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a> 
        <a href="{{route('pedit',$info->id)}}"><button type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></button></a></td> 
      </tr> 
      @endforeach 
    </tbody>  
 </table> 
 


@endsection