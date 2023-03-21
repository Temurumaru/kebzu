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
      <h1>Страница изменения данных</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Обновить данные</h5>

              <!-- General Form Elements -->
              <form action="{{route('updDataC')}}" enctype="multipart/form-data" method="post">
								@csrf
								
								<?php
									$data = R::findOne('data', "id = ?", [1]);
								?>

                <h3 class="mt-4">О нас Страница</h3>
                
                <div class="row mb-3">
                  <label for="about_desc" class="col-sm-2 col-form-label">О нас описание</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="4500" id="about_desc" name="about_desc" required style="height: 140px">{{$data -> about_desc}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about_desc_ru" class="col-sm-2 col-form-label">О нас описание РУ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="4500" id="about_desc_ru" name="about_desc_ru" required style="height: 140px">{{$data -> about_desc_ru}}</textarea>
                  </div>
                </div>

                <h3 class="mt-4">Домашняя страница</h3>

                <div class="row mb-3">
                  <label for="about_desc_mini" class="col-sm-2 col-form-label">О нас описание мини</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="4500" id="about_desc_mini" name="about_desc_mini" required style="height: 140px">{{$data -> about_desc_mini}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about_desc_mini_ru" class="col-sm-2 col-form-label">О нас описание мини РУ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="4500" id="about_desc_mini_ru" name="about_desc_mini_ru" required style="height: 140px">{{$data -> about_desc_mini_ru}}</textarea>
                  </div>
                </div>

                <h5>Статистика</h5>

                
                <hr>

                <div class="row mb-3">
                  <label for="stat_1_text" class="col-sm-2 col-form-label">Стат 1 текст</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_1_text}}" min="0" id="stat_1_text" name="stat_1_text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_1_text_ru" class="col-sm-2 col-form-label">Стат 1 текст РУ</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_1_text_ru}}" min="0" id="stat_1_text_ru" name="stat_1_text_ru" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_1" class="col-sm-2 col-form-label">Стат 1</label>
                  <div class="col-sm-10">
                    <input type="number" value="{{$data -> stat_1}}" min="0" id="stat_1" name="stat_1" class="form-control" required>
                  </div>
                </div>
                
                <hr>

                <div class="row mb-3">
                  <label for="stat_2_text" class="col-sm-2 col-form-label">Стат 2 текст</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_2_text}}" min="0" id="stat_2_text" name="stat_2_text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_2_text_ru" class="col-sm-2 col-form-label">Стат 2 текст РУ</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_2_text_ru}}" min="0" id="stat_2_text_ru" name="stat_2_text_ru" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_2" class="col-sm-2 col-form-label">Стат 2</label>
                  <div class="col-sm-10">
                    <input type="number" value="{{$data -> stat_2}}" min="0" id="stat_2" name="stat_2" class="form-control" required>
                  </div>
                </div>
                
                <hr>

                <div class="row mb-3">
                  <label for="stat_3_text" class="col-sm-2 col-form-label">Стат 3 текст</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_3_text}}" min="0" id="stat_3_text" name="stat_3_text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_3_text_ru" class="col-sm-2 col-form-label">Стат 3 текст РУ</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_3_text_ru}}" min="0" id="stat_3_text_ru" name="stat_3_text_ru" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_3" class="col-sm-2 col-form-label">Стат 3</label>
                  <div class="col-sm-10">
                    <input type="number" value="{{$data -> stat_3}}" min="0" id="stat_3" name="stat_3" class="form-control" required>
                  </div>
                </div>
                
                <hr>

                <div class="row mb-3">
                  <label for="stat_4_text" class="col-sm-2 col-form-label">Стат 4 текст</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_4_text}}" min="0" id="stat_4_text" name="stat_4_text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_4_text_ru" class="col-sm-2 col-form-label">Стат 4 текст РУ</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> stat_4_text_ru}}" min="0" id="stat_4_text_ru" name="stat_4_text_ru" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stat_4" class="col-sm-2 col-form-label">Стат 4</label>
                  <div class="col-sm-10">
                    <input type="number" value="{{$data -> stat_4}}" min="0" id="stat_4" name="stat_4" class="form-control" required>
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