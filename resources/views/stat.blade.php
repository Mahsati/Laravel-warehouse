@extends('layouts.app')


@section('statselect')


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Statistika</h3>
          </div>
          <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="{{url('images/dashboard/people.svg')}}" alt="people">
          
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Brend</p>
                <p class="fs-30 mb-2">{{$bdata->count()}}</p>
                <p></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Müştəri</p>
                <p class="fs-30 mb-2">{{$cdata->count()}}</p>
                <p></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Məhsul</p>
                <p class="fs-30 mb-2">{{$pdata->count()}}</p>
                <p></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Gözlənilən ümumi qazanc</p>
                <p class="fs-30 mb-2">{{$tqazanc}}</p>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>






@endsection