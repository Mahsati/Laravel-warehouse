<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{url('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="{{url('text/css" href="js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{route('oselect')}}"><img src="{{url('images/logo.svg')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('oselect')}}"><img src="{{url('images/logo-mini.svg')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Axtar.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">Sol panel</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Parlaq</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Qaranlıq</div>
          <p class="settings-heading mt-2">Yuxarı panel</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">Tapşırıq siyahısı</a>
          </li>
         
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="tapşırıq...">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Əlavə et</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                
               
                
               
              </ul>
            </div>
           
           
          </div>
       
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('oselect')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Anbar</span>
            </a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-head menu-icon"></i>

              <span class="menu-title">Profil səhifəsi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">Daxil ol</a></li>
              </ul>
            </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Cədvəllər</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('bselect')}}">Brend</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('cselect')}}">Müştəri</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('pselect')}}">Məhsul</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('eselect')}}">Xərc</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('oselect')}}">Sifariş</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">İşçi heyəti</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('sselect')}}">Daxil ol</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('statselect')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Statistika</span>
            </a>
          </li>
          
          @if(Auth::user()->blok==5)
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin')}}">Daxil ol</a></li>
              </ul>
            </div>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Çıxış</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}">Çıxış</a></li>
              </ul>
            </div>
          </li>
        
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">İstifadəçi məlumatları</h4>
                  <p class="card-description">
                    
                  </p>

                                     
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

                  <form method="post" class="forms-sample" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group">
                      <img src="{{url(Auth::user()->foto)}}" style="weight:70px; height:60px"><br><br>
                      <label>Şəkil yüklə</label>
                      <div class="input-group col-xs-12">
                        <input type="file" class="form-control " name="foto">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Ad</label>
                      <input type="text" class="form-control" name="name"  value="{{Auth::user()->name}}" placeholder="Ad...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Soyad</label>
                      <input type="text" class="form-control" name="soyad" value="{{Auth::user()->soyad}}" placeholder="Soyad...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Telefon</label>
                      <input type="text" class="form-control" name="tel" value="{{Auth::user()->tel}}" placeholder="Tel...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email adresi</label>
                      <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Email..">
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleInputPassword4">Yeni şifrə</label>
                      <input type="password" class="form-control" name="newpass" placeholder="Şifrə..">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Təkrar daxil edin </label>
                      <input type="password" class="form-control" name="passagain" placeholder="Şifrə..">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Cari şifrə</label>
                      <input type="password" class="form-control" name="password" placeholder="Şifrə..">
                    </div>
                    <input type="hidden" name="cari_foto" value="{{Auth::user()->foto}}">
                    <input type="hidden"  name="id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary mr-2" href="{{route('profile')}}" >Yenilə</button>
                    <a href="{{route('profile')}}"><button type="button" class="btn btn-danger">Ləğv et</button></a> 
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
   <!-- plugins:js -->
  <script src="{{url('../../vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('../../vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
  <script src="{{url('../../vendors/select2/select2.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('../../js/off-canvas.js')}}"></script>
  <script src="{{url('../../js/hoverable-collapse.js')}}"></script>
  <script src="{{url('../../js/template.js')}}"></script>
  <script src="{{url('../../js/settings.js')}}"></script>
  <script src="{{url('../../js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('../../js/file-upload.js')}}"></script>
  <script src="{{url('../../js/typeahead.js')}}"></script>
  <script src="{{url('../../js/select2.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>
