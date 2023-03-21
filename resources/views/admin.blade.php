<?php
use RedBeanPHP\R as R;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kebzu Admin</title>
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('admin')}}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block"><img src="/project/image/LogoB.png" alt=""></span>
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
      <h1>Доска</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="card col-12">
              <div class="card-body">
                <h5 class="card-title">Сервисы</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr class="">
                      {{-- <th scope="col"><a href="?services_srch=id">ID <?=(@$_GET['services_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th> --}}
                      <th scope="col"><a href="?services_srch=title">Название <?=(@$_GET['services_srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col"><a href="?services_srch=views">Просмотров <?=(@$_GET['services_srch'] == 'views') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col" style="display:flex;justify-content: flex-end;">Действие</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $services_srch = "id";

                    if(@$_GET['services_srch'] == "id") $services_srch = "id DESC";
                    if(@$_GET['services_srch'] == "title") $services_srch = "title";
                    if(@$_GET['services_srch'] == "views") $services_srch = "views DESC";


                    $blogs = R::find("services", "ORDER BY ".$services_srch);
                    foreach ($blogs as $val) { ?>

                    <tr>
                      {{-- <td><?=$val -> id?></td> --}}
                      <td><?=$val -> title?></td>
                      <td><?=$val -> views?></td>
                      <td style="display:flex;justify-content: flex-end;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <a class="btn btn-sm btn-success" target="_blank" href="/services?id=<?=$val -> id?>">Открыть</a>
                          <a class="btn btn-sm btn-warning" href="/admin_services?id=<?=$val -> id?>">Редактировать</a>
                        </div>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
            

            <div class="card col-12">
              <div class="card-body">
                <h5 class="card-title">Блоги</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th scope="col"><a href="?srch=id">ID <?=(@$_GET['srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th> --}}
                      <th scope="col"><a href="?srch=title">Тема <?=(@$_GET['srch'] == 'title') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col"><a href="?srch=lang">Язык <?=(@$_GET['srch'] == 'lang') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col"><a href="?srch=views">Просмотров <?=(@$_GET['srch'] == 'views') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col"><a href="?srch=date">Дата <?=(@$_GET['srch'] == 'date') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col" style="display:flex;justify-content: flex-end;">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                    $srch = "id";

                    if(@$_GET['srch'] == "id") $srch = "id DESC";
                    if(@$_GET['srch'] == "title") $srch = "title";
                    if(@$_GET['srch'] == "lang") $srch =  "lang";
                    if(@$_GET['srch'] == "views") $srch = "views DESC";
                    if(@$_GET['srch'] == "date") $srch =  "date DESC";


                    $blogs = R::find("blog", "ORDER BY ".$srch);
                    foreach ($blogs as $val) { ?>

                    <tr>
                      {{-- <td><?=$val -> id?></td> --}}
                      <td><?=$val -> title?></td>
                      <td><?=($val -> lang == "en") ? "<span style='padding: 4px;background-color:rgba(54, 54, 226, 0.8);color:black;border-radius:3px;'>EN</span>" : "<span style='padding: 4px;background-color:rgba(220, 45, 45, 0.808);color:black;border-radius:3px;'>RU</span>"?></td>
                      <td><?=$val -> views?></td>
                      <td><?=$val -> date?></td>
                      <td style="display:flex;justify-content: flex-end;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <a class="btn btn-sm btn-success" target="_blank" href="/blog?id=<?=$val -> id?>">Открыть</a>
													<a class="btn btn-sm btn-warning" href="/admin_blog_upd?id=<?=$val -> id?>">Редактирвоать</a>
													<a class="btn btn-sm btn-danger" onclick="delPostBlogOnCLick(<?=$val -> id?>, '<?=$val -> title?>')" href="#">Удалить</a>
                        </div>
                      </td>
                    </tr>

                    <?php }?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>

            <div class="card col-12">
              <div class="card-body">
                <h5 class="card-title">Спронсоры</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th scope="col">ИД</th> --}}
                      <th scope="col">Name</th>
                      <th scope="col" style="display:flex;justify-content: flex-end;">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
										
                    <?php
										$ads = R::findAll("partners");
										foreach ($ads as $val) {
											?>
										<tr>
											{{-- <th scope="row"><?=$val -> id?></th> --}}
											<td><?=$val -> name?></td>
											<td style="display:flex;justify-content: flex-end;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <button type="button" onclick="delPartnerOnCLick(<?=$val -> id?>, '<?=$val -> name?>')" class="btn btn-danger btn-sm">Удалить</button>
                        </div>
                      </td>
                    </tr>
										<?php }?>

                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>


            @if (@$_SESSION['admin'] -> level >= 5)
            <div class="card col-12">
              <div class="card-body">
                <h5 class="card-title">Администраторы</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ИД</th>
                      <th scope="col">Логин</th>
                      <th scope="col" style="display:flex;justify-content: flex-end;">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
										
                    <?php
										$ads = R::find("admins", "level != ?", [5]);
										foreach ($ads as $val) {
											?>
										<tr>
											<th scope="row"><?=$val -> id?></th>
											<td><?=$val -> login?></td>
											{{-- <td><?=$val -> level?></td> --}}
											<td style="display:flex;justify-content: flex-end;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <button type="button" onclick="delAdminOnCLick(<?=$val -> id?>, '<?=$val -> login?>')" class="btn btn-danger btn-sm">Удалить</button>
                        </div>
                      </td>
                    </tr>
										<?php }?>

                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
            @endif

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Website Traffic -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Трафик Сервисов</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [
                        <?php
                        $blogs = R::findAll("services");
                        foreach ($blogs as $val) { ?>
                        {
                          value: {{$val -> views}},
                          name: '{{$val -> title}}'
                        },
                        <?php }?>

                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- Vendor JS Files -->

  <script>
		function delPostBlogOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delPostBlogC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function (data) {
						location.reload();
					}
				});
			}
		}

		function delTxtPageOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delTextPageC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function (data) {
						location.reload();
					}
				});
			}
		}

    function delPartnerOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить партнёра '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delPartnerC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function (data) {
						location.reload();
					}
				});
			}
		}
    
    @if (@$_SESSION['admin'] -> level >= 5)
		function delAdminOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delAdminC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function (data) {
						location.reload();
					}
				});
			}
		}
    @endif
	</script>

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
