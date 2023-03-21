<?php 
use RedBeanPHP\R as R;

$dat = R::findOne("text_pages", "id = ?", [@$_GET['id']]);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kebzu Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('admin')}}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">KebzU Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  </header><!-- End Header -->

  @include('blocks.sidebar')

  <main id="main" class="main">
    @if($errors->any() || session('success'))
    <div class="err-claster shadow-all">
      @if(isset($errors))
        @if($errors->any())
          <div class="tst tst-err">
            @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        @endif
      @endif
      @if(session('warning'))
        <div class="tst tst-warr">{{session('warning')}}</div>
      @endif
      
      @if(session('success'))
        <div class="tst tst-succ">{{session('success')}}</div>
      @endif
    </div>
  @endif
    <div class="pagetitle">
      <h1>Text Page</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add</h5>

              <!-- General Form Elements -->
              <form action="{{route('updTextPageC')}}" enctype="multipart/form-data" method="post">
								@csrf

								<input type="hidden" name="id" value="{{$dat -> id}}">
                
                <div class="row mb-3">
                  <label for="title" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" id="title" value="{{$dat -> title}}" name="title" class="form-control">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="title_ru" class="col-sm-2 col-form-label">Title RU</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$dat -> title_ru}}" id="title_ru" name="title_ru" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="header" class="col-sm-2 col-form-label">Header</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$dat -> header}}" id="header" name="header" class="form-control">
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="header_ru" class="col-sm-2 col-form-label">Header RU</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$dat -> header_ru}}" id="header_ru" name="header_ru" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="text" class="col-sm-2 col-form-label">Text</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="text" name="text" style="height: 100px">{{$dat -> text}}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="text_ru" class="col-sm-2 col-form-label">Text RU</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="text_ru" name="text_ru" style="height: 100px">{{$dat -> text_ru}}</textarea>
                  </div>
                </div>
                
                <div class="row mb-5">
                  <label for="wallpaper" class="col-sm-2 col-form-label">Wallpaper</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="wallpaper_img" id="wallpaper">
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Add</label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Press" />
                  </div>
                </div> 

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>