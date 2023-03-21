<?php 
use RedBeanPHP\R as R;

$data = R::findOne("data", "id = ?", [1]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- aaaa -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KEBZU</title>
  <link rel="icon" href="./project/image/icon.png" type="image/gif">

  <meta name="description" content='ООО “TLS-KEBZU” и OOO "MLS TRANS" – ведущие фирмы в Узбекистане, оказывающая таможенные и транспортные услуги. Мы оказываем Таможенно-брокерские услуги с 2008 года и имеем высочайший рейтинг на рынке Узбекистана. У нас сплоченная команда профессионалов, имеющих опыт работы в международной логистике более 10 лет. ООО “TLS-KEBZU” и "MLS TRANS" - это лицензированная таможенно-консалтинговая компании, предоставляющая услуги таможенного представителя по оформлению грузов клиента в таможенных органах на основании заключённого с ним письменного договора. ООО “TLS-KEBZU” и ООО "MLS TRANS" - это специализированный экспортный таможенный представитель, деятельность которого направлена на оптимальное решение вопросов связанных с организацией таможенного оформления импортно-экспортных поставок (грузов). В своей работе таможенного брокера мы используем самые современные технические средства и программные продукты. Оперативно (в сжатые сроки) оформляем многотоварные таможенные декларации. После выпуска товара в свободное обращение, мы оповещаем клиента любым, заранее обговоренным способом. Мы сами получим от вас необходимые документы для таможенного оформления вашего груза и доставим вам в офис таможенные документы и грузы на ваш склад, после полной таможенной очистки.'>
	<meta name="keywords" content="TLS, KEBZU, MLS TRANS, CARGO">
		
	<meta name="Author" content="Marss Team">
	<meta name="Copyright" content="TLS KEBZU">
	<meta name="Address" content="{{$data -> address}}">

  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="./project/plugins/flowbite/flowbite.css" />

  <link rel="stylesheet" href="./project/plugins/swiper/swiper.css" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />

  <script src="./project/plugins/tailwind/tailwind.js"></script>
  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />
</head>

<body>

  <div class="overflow-hidden wrapper">
    <div class="loader-page">
      <img class="w-40 " src="./project/image/Logo.png" alt="">
    </div>
    <header id="header" class="relative">

      @include('blocks.header')


      <video class="object-cover w-full h-screen" autoplay muted loop id="myVideo">
        <source src="./project/image/header/video.mp4" class="w-full h-full" type="video/mp4">
      </video>
    </header>
    <main class="bg-[url('./project/image/main-bg.png')] bg-no-repeat bg-cover">



      <!-- Section NEWS -->

      <section class="py-[45px] md:py-[90px]">
        <div class="container mx-auto">
          <div class="flex items-center justify-between mb-5 md:mb-10 section__header">
            <h2 data-aos="fade-up" data-aos-delay="100"
              class="relative text-xl font-bold text-left uppercase text-currentColor lg:text-4xl md:text-3xl section-title">
              {{LN['SERVICES']}}
            </h2>
            <!-- <div class="section__header-line w-[80%] bg-gold" data-aos="fade-left" data-aos-delay="500" >
              </div> -->
          </div>
          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 md:gap-10 ">
						<?php
					
						$services = R::find("services","ORDER BY id DESC LIMIT 6",);
						foreach ($services as $val) { ?>

            <div data-aos="fade-down" data-aos-delay="40"
              class="w-full mx-auto transition-all duration-200 duration-500 border-0 group">
              <a href="/services?id={{$val -> id}}" class="w-full overflow-hidden border-0">
                <div class="w-full max-h-45 border-0 h-[250px]  overflow-hidden">
                  <img class="object-cover w-full h-full duration-200 group-hover:scale-105"
                    src="/upl_data/prevs/{{$val -> preview}}" alt="">

                </div>
                <div class="p-3 space-y-4 border-l-[7px] bg-currentColor border-gold">
                  <h5 class="text-lg font-bold tracking-tight text-white md:text-xl card__title">
                    <?=(@$_COOKIE['lang'] != 'ru') ? $val -> title : $val -> title_ru?>
                  </h5>
                  <p class=" text-base font-normal text-white section__text text-[#DBDBDB] mt-4">
                    <?=(@$_COOKIE['lang'] != 'ru') ? $val -> top_text : $val -> top_text_ru?>
                  <div class="flex justify-end ">
                    <a href="/services?id={{$val -> id}}" class="flex items-center inline-block space-x-2">
                      <span class="text-sm text-gold">
                        {{LN['More detailed']}}
                      </span>
                      <span class="px-2 py-1 rounded-full bg-gold">
                        <i class=" ri-arrow-right-s-line"></i>
                      </span>
                    </a>
                  </div>
                </div>
              </a>
            </div>

						<?php }?>
					
          </div>
        </div>
      </section>

      <!-- Section NEWS -->

      <!-- section About -->

      <section
        class="py-[45px] md:py-[90px] about text-white bg-[url('./project/image/4.jpg')] bg-cover bg-fixed">
        <div class="container mx-auto">
          <div class="flex items-center justify-between mb-2 md:mb-10 section__header">
            <h2 data-aos="fade-up" data-aos-delay="100"
              class="relative text-xl font-bold text-left text-white uppercase lg:text-4xl md:text-3xl section-title">
              {{LN['_About us com']}}
            </h2>
            <!-- <div class="section__header-line w-[80%] bg-white" data-aos="fade-left" data-aos-delay="500" >
                </div> -->
          </div>
          <?php 
          $data = R::findOne("data", "id = ?", [1]);
          ?>
          <p data-aos="fade-down" data-aos-delay="150"
            class="text-lg md:text-xl text-center font-normal mb-5 md:leading-[2.2rem]">
            <?=(@$_COOKIE['lang'] != 'ru') ? $data -> about_desc_mini : $data -> about_desc_mini_ru?>


          </p>
          <!-- 
              <h2 class="text-xl font-semibold text-center text-zinc-900">
              Zemfira Li, CEO
              </h2> 
            -->
        </div>
      </section>

      <!-- section About -->


      <!-- section Partner -->
     
      {{-- <section class="py-[45px] product md:py-[90px]">
        <div class="container mx-auto">
          <div class="flex items-center justify-between mb-5 md:mb-12 section__header">
            <h2 data-aos="fade-up" data-aos-delay="100"
              class="relative text-xl font-bold text-left uppercase text-currentColor lg:text-4xl md:text-3xl section-title">
              {{LN['STATISTICS']}}
            </h2>
            <!-- <div class="section__header-line w-[80%] bg-gold" data-aos="fade-left" data-aos-delay="500" >
            </div> -->
          </div>
          <div class="grid grid-cols-2 gap-10 md:grid-cols-4">
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="100">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-truck-line "></i>
              </div>
              <div class="text-2xl font-extrabold md:text-4xl text-currentColor section-title value" akhi="1000">0</div>
              <h3 class="mt-2 text-md center text-[#adadad] md:text-xl">
                Complate delivery
              </h3>
            </div>
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="120">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-map-pin-user-line"></i>
              </div>
              <div class="text-2xl font-bold text-currentColor md:text-4xl value section-title" akhi="1650">0</div>
              <h3 class="mt-2 text-md center text- md:text-xl text-[#adadad]">
                Complate delivery
              </h3>
            </div>
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="130">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-settings-5-line"></i>
              </div>
              <div class="text-2xl font-bold text-currentColor md:text-4xl value section-title" akhi="2051">0</div>
              <h3 class="mt-2 text-md center text-[#adadad] md:text-xl">
                Complate delivery
              </h3>
            </div>
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="140">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-user-settings-line"></i>
              </div>
              <div class="text-2xl font-bold text-currentColor md:text-4xl value section-title" akhi="100">0</div>
              <h3 class="mt-2 text-md center text-[#adadad] md:text-xl">
                Complate delivery
              </h3>
            </div>
          </div>
        </div>
      </section> --}}
      <section class="statistics py-[45px] product md:py-[90px]">
        <div class="container mx-auto">
          <div class="flex items-center justify-between mb-5 md:mb-12 section__header">
            <h2 data-aos="fade-up" data-aos-delay="100"
              class="relative text-xl font-bold text-left uppercase text-currentColor lg:text-4xl md:text-3xl section-title">
              {{LN['STATISTICS']}}
            </h2>
            <!-- <div class="section__header-line w-[80%] bg-gold" data-aos="fade-left" data-aos-delay="500" >
            </div> -->
          </div>
          <div class="grid grid-cols-2 gap-10 md:grid-cols-4">
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="100">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-truck-line "></i>
              </div>
              <div class="text-2xl font-extrabold md:text-4xl text-currentColor section-title value" akhi="{{$data -> stat_1}}">0</div>
              <h3 class="mt-2 text-md center text-[#adadad] md:text-xl">
               <?= (@$_COOKIE['lang'] != 'ru') ? $data -> stat_1_text : $data -> stat_1_text_ru ?>
              </h3>
            </div>
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="120">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-map-pin-user-line"></i>
              </div>
              <div class="text-2xl font-bold text-currentColor md:text-4xl value section-title" akhi="{{$data -> stat_2}}">0</div>
              <h3 class="mt-2 text-md center text- md:text-xl text-[#adadad]">
               <?= (@$_COOKIE['lang'] != 'ru') ? $data -> stat_2_text : $data -> stat_2_text_ru ?>
              </h3>
            </div>
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="130">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-settings-5-line"></i>
              </div>
              <div class="text-2xl font-bold text-currentColor md:text-4xl value section-title" akhi="{{$data -> stat_3}}">0</div>
              <h3 class="mt-2 text-md center text-[#adadad] md:text-xl">
               <?= (@$_COOKIE['lang'] != 'ru') ? $data -> stat_3_text : $data -> stat_3_text_ru ?>
              </h3>
            </div>
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="140">
              <div class="px-3 py-2 mb-5 rounded-full bg-currentColor">
                <i class="text-4xl text-white md:text-6xl ri-user-settings-line"></i>
              </div>
              <div class="text-2xl font-bold text-currentColor md:text-4xl value section-title" akhi="{{$data -> stat_4}}">0</div>
              <h3 class="mt-2 text-md center text-[#adadad] md:text-xl">
               <?= (@$_COOKIE['lang'] != 'ru') ? $data -> stat_4_text : $data -> stat_4_text_ru ?>
              </h3>
            </div>
          </div>
        </div>
      </section>
      <section class="pb-[45px] product md:pb-[90px]">
        <div class="container mx-auto">
          <div class="flex items-center justify-between mb-5 md:mb-12 section__header">
            <h2 data-aos="fade-up" data-aos-delay="100"
              class="relative text-xl font-bold text-left uppercase text-currentColor lg:text-4xl md:text-3xl section-title">
              {{LN['OUR PARTNERS']}}
            </h2>
            <!-- <div class="section__header-line w-[80%] bg-gold" data-aos="fade-left" data-aos-delay="500" >
            </div> -->
          </div>
          <div class="w-full swiper mySwiper">
            <div class="swiper-wrapper">
              <?php $parts = R::findAll("partners");?>
              @foreach($parts as $val)
              <div data-aos-delay="50" data-aos="fade-up"
                class="w-full h-full duration-1000 ease-in rounded-md swiper-slide">
                <div class="flex items-center justify-center">
                  <img class="w-full h-[200px] object-cover " src="/upl_data/prevs/{{$val -> img}}" alt="{{$val -> name}}">
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
      <?php 
      
      $data = R::findOne("data", "id = ?", [1]);
      ?>

      <!-- contact -->
      <section class="product  container-fluid bg-[#0F172A]">
        <div class="grid grid-cols-1 md:grid-cols-2 ">
          <iframe class="w-full h-full" src="https://yandex.uz/map-widget/v1/-/CCUrV-AwLD" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div class="order-1 md:order-2 border-b border-b-[#B18F62]">
            <img class="w-full h-[280px] object-cover" src="./project/image/contact/contact.png">
            <div class="p-6 bg-slate-900 lg:p-10">
              <h3 class="text-2xl uppercase font-bold text-[#B18F62] ">Наши офис</h3>
              <div class="flex items-center my-4 ">
                <i class="mr-4 text-2xl ri-map-pin-2-fill text-[#B18F62]"></i>
                <a href="#" class="text-base text-white">
                  {{$data -> address}}
                </a>
              </div>
              <div class="flex flex-col md:flex-row">
                <div class="flex items-center my-4 md:mr-10 ">
                  <i class="mr-4 text-2xl text-[#B18F62] ri-phone-fill "></i>
                  <a href="tel:" class="mr-4 text-base text-white">
                    {{$data -> tel}}
                  </a>
                </div>

              </div>
              <div class="flex items-center my-4 ">
                <i class="mr-4 text-[#B18F62] text-2xl ri-mail-fill "></i>
                <a href="#" class="text-base text-white">
                  {{$data -> email}}
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>


    @include('blocks.footer')


  </div>



  <script src="./project/plugins/swiper/swipperJsBuld.js"></script>
  <script src="./project/plugins/flowbite/flowbite.js"></script>
  <script src="./project/js/swiper.js"></script>
  <script src="./project/plugins/aos/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="./project/js/script.js"></script>
</body>

</html>