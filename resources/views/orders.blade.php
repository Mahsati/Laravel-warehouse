<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
<br> 

@extends('layouts.app')


@section('oselect') 
       
          
    
<div class="alert alert-primary" role="alert"><h1>Sifariş</h1></div>



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
<form method="post"  action="{{route('orders')}}"> 
@csrf 
Məhsul:<br> 
<select name="product_id" class="form-control">
    <option value="">Məhsulu seçin</option>
    @foreach($pdata as $cinfo)
     <option value="{{$cinfo->id}}">{{$cinfo->mehsul}} ({{$cinfo->brend}}) - {{$cinfo->stok}}</option>
    @endforeach
</select>
Müştəri:<br> 
<select name="client_id" class="form-control">
  <option value="">Müştərini seçin</option>
  @foreach($cdata as $cinfo)
     <option value="{{$cinfo->id}}">{{$cinfo->ad}} {{$cinfo->soyad}}</option>
  @endforeach
</select>
Miqdar:<br>
<input type="text" class="form-control" name="miqdar" value="{{old('miqdar')}}"><br> 
<button type="submit" class="btn btn-primary">Daxil et</button> 
</form>
</div> 
 @endempty 


 
@isset($editdata) 
<div class="alert alert-primary" role="alert">
<form method="post"  action="{{route('oupdate')}}" > 
@csrf 
Müştəri:<br>
<select name="client_id" class="form-control">
  <option value="">Müştərini seçin</option>
  @foreach($cdata as $cinfo)
  @if($cinfo->id==$editdata->client_id)
  <option selected value="{{$cinfo->id}}">{{$cinfo->ad}} {{$cinfo->soyad}}</option>
  @endif
  @endforeach
</select>
Məhsul:<br>
<select name="product_id" class="form-control">
  <option value="">Məhsulu seçin</option>
  @foreach($pdata as $cinfo)
  @if($cinfo->id==$editdata->product_id)
  <option selected value="{{$cinfo->id}}">{{$cinfo->brend}} {{$cinfo->mehsul}} {{$cinfo->stok}}</option>
  @endif
  @endforeach
</select>
Miqdar:<br>
<input type="text" class="form-control" name="miqdar" value="{{$editdata->miqdar}}"><br> 
<input type="hidden"  name="id" value="{{$editdata->id}}">
<button type="submit" class="btn btn-info">Yenilə</button> 
<a href="{{route('orders')}}"><button type="button" class="btn btn-danger">Ləğv et</button></a> 
</form>
</div> 
@endisset 

@isset($sildata) 
<div class="alert alert-danger">Siz sifarişi silməyə əminsinizmi?
<a href="{{route('odelete',$sildata->id)}}"><button type="button" class="btn btn-info btn-sm" >Hə</button></a> 
<a href="{{route('oselect',$sildata->id)}}"><button type="button" class="btn btn-danger btn-sm">Yox</button></a>
</div>
@endisset


<div class="alert alert-primary" role="alert">
  <b>Brend: {{$bdata->count()}}</b>|
  <b>Müştəri:{{$cdata->count()}} </b>|
  <b>Məhsul: {{$pdata->count()}} </b>|
  <b>Alış: {{$talis}} </b>|
  <b>Satış:{{$tsatis}} </b>|
  <b>Sifariş: {{$data->count()}}</b>|
  <b>Qazanc: {{$tqazanc}} </b>|



</div>

<table class="table table-bordered ">
  <thead >
      <tr>

          <th scope="col">#</th>
          <th scope="col">Müştəri</th>
          <th scope="col">Məhsul</th>
          <th scope="col">Brend</th>
          <th scope="col">Alış</th>
          <th scope="col">Satış</th>
          <th scope="col">Stok</th>
          <th scope="col">Miqdar</th>
          <th scope="col">Tarix</th>
          <th>Sil & Redaktə & Təsdiq</th>

      </tr>
  </thead>
  <tbody>

      @foreach($data as $i=>$info)

      <tr>
          <td>{{$i+=1}}</td>
          <td>{{$info->ad}}  {{$info->soyad}}</td>
          <td>{{$info->mehsul}}</td>
          <td>{{$info->brend }}</td>
          <td>{{$info->al}}</td>
          <td>{{$info->sat}}</td>
          <td>{{$info->stok}}</td>
          <td>{{$info->miqdar}}</td>
          <td>{{$info->created_at}}</td>


          @if($info->tesdiq==0)

          <td>
              <a href="{{route('osil',$info->id)}}"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a> 
              <a href="{{route('oedit',$info->id)}}"><button type="button" class="btn btn-info  btn-sm"><i class="bi bi-pencil-square"></i></button></a> 
              <a href="{{route('tesdiq',$info->id)}}"><button type="button" class="btn btn-primary  btn-sm"><i class="bi bi-check2-square"></i></button></a> 
          </td>

          @else

          <td>
            <a href="{{route('legv',$info->id)}}"><button type="button" class="btn btn-warning btn-sm"><i class="bi bi-x-square"></i></button></a> 
          </td>

           @endif
  </tr>
          @endforeach

  </tbody>
</table>
</div>

@endsection