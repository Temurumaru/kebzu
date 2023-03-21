<?php
use RedBeanPHP\R as R;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KebzU Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('admin')}}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block"><img src="/project/image/LogoB.png" alt=""></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

  </header><!-

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
      <h1>Страница изменения контактов</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Обновить контакты</h5>

              <!-- General Form Elements -->
              <form action="{{route('updContactC')}}" enctype="multipart/form-data" method="post">
								@csrf
								
								<?php
									$data = R::findOne('data', "id = ?", [1]);
								?>

                <h3 class="mt-4">Соц сети</h3>

                <div class="row mb-3">
                  <label for="telegram" class="col-sm-2 col-form-label">Telegram</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> telegram}}" maxlength="100" id="telegram" name="telegram" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> instagram}}" maxlength="100" id="instagram" name="instagram" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> facebook}}" maxlength="150" id="facebook" name="facebook" class="form-control" required>
                  </div>
                </div>

                <h3 class="mt-4">Контакты TLS KEBZU</h3>

                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Эл.почта</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$data -> email}}" maxlength="100" id="email" name="email" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tel" class="col-sm-2 col-form-label">Тел</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> tel}}" maxlength="100" id="tel" name="tel" class="form-control" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="address" class="col-sm-2 col-form-label">Адресс</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> address}}" maxlength="150" id="address" name="address" class="form-control" required>
                  </div>
                </div>

                <h3 class="mt-4">Контакты MLS TRANS</h3>

                <div class="row mb-3">
                  <label for="email_2" class="col-sm-2 col-form-label">Эл.почта</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$data -> email_2}}" maxlength="100" id="email_2" name="email_2" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tel_2" class="col-sm-2 col-form-label">Тел</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> tel_2}}" maxlength="100" id="tel_2" name="tel_2" class="form-control" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="address_2" class="col-sm-2 col-form-label">Адресс</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> address_2}}" maxlength="150" id="address_2" name="address_2" class="form-control" required>
                  </div>
                </div>

                <h3 class="mt-4">Контакты KEBZU OFFICE (ALMATA)</h3>

                <div class="row mb-3">
                  <label for="email_3" class="col-sm-2 col-form-label">Эл.почта</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$data -> email_3}}" maxlength="100" id="email_3" name="email_3" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tel_3" class="col-sm-2 col-form-label">Тел</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> tel_3}}" maxlength="100" id="tel_3" name="tel_3" class="form-control" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="address_3" class="col-sm-2 col-form-label">Адресс</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> address_3}}" maxlength="150" id="address_3" name="address_3" class="form-control" required>
                  </div>
                </div>

                <h3 class="mt-4">Контакты KEBZU OFFICE (TASHKENT)</h3>

                <div class="row mb-3">
                  <label for="email_4" class="col-sm-2 col-form-label">Эл.почта</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$data -> email_4}}" maxlength="100" id="email_4" name="email_4" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tel_4" class="col-sm-2 col-form-label">Тел</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> tel_4}}" maxlength="100" id="tel_4" name="tel_4" class="form-control" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="address_4" class="col-sm-2 col-form-label">Адресс</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> address_4}}" maxlength="150" id="address_4" name="address_4" class="form-control" required>
                  </div>
                </div>



                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Обновить</label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Нажать" >
                  </div>
                </div> 

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

</body>

</html>