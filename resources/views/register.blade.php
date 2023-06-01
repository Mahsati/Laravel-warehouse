<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('../../vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('../../vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('../../vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('../../css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('../../images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{url('../../images/logo.svg')}}" alt="logo">
              </div>
              <h4></h4>
              <h6 class="font-weight-light">Anbarda işləmək üçün qeydiyyatdan keçin</h6>

                            
              @if($errors->any())
              @foreach($errors->all() as $sehv)
              <div class="alert alert-danger"> {{$sehv}}<br></div>
              @endforeach
              @endif

              @if(session('mesaj1'))
              <div class="alert alert-primary">{{session('mesaj1')}}</div><br>
              @endif


              @if(session('mesaj2'))
              <div class="alert alert-warning">{{session('mesaj2')}}</div><br>
              @endif

              <form class="pt-3" method="post">
                @csrf

                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="name" value="{{old('name')}}" placeholder="Ad...">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="soyad" value="{{old('soyad')}}" placeholder="Soyad...">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="tel" value="{{old('tel')}}" placeholder="Telefon...">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" value="{{old('email')}}" placeholder="Email...">
                </div>
                
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Şifrə...">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="passagain" placeholder="Təkrar şifrə...">
                </div>
                
                <div class="mt-3">
                  <button type="submit"><a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="{{route('register')}}" style="Font-family:Tahoma;">Qeydiyyatdan keçin</a></button>
                  </div>
                <div class="text-center mt-4 font-weight-light">
                  Artıq bir hesabınız var? <a href="{{route('login')}}" class="text-primary">Daxil ol</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
 <!-- plugins:js -->
  <script src="{{url('../../vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('../../js/off-canvas.js')}}"></script>
  <script src="{{url('../../js/hoverable-collapse.js')}}"></script>
  <script src="{{url('../../js/template.js')}}"></script>
  <script src="{{url('../../js/settings.js')}}"></script>
  <script src="{{url('../../js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
