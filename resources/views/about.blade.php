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
  <title>kebzU - {{LN['_About us']}}</title>
  <link rel="icon" href="./project/image/icon.png" type="image/gif">
  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="./project/plugins/flowbite/flowbite.css" />

  <link rel="stylesheet" href="./project/plugins/swiper/swiper.css" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />

  <script src="./project/plugins/tailwind/tailwind.js"></script>
  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />
</head>

<body class="scroll-smooth">
  
  <div class="overflow-hidden wrapper">
    <header id="header" class="relative">

      @include('blocks.header')

      <div
        class="header__content bg-[url('./project/image/3.jpg')] bg-fixed bg-top md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class=" w-full h-full">
          <div  data-aos="fade-right" data-aos-delay="100"  class="container mx-auto text-white cursor-pointer">
            <h2 class="text-3xl md:text-[45px] font-extrabold capitalize mb-3">{{LN['ABOUT US']}}</h2>
            <h3 class="text-lg font-light md:text-xl capitalize">
              <a class='lowercase' href="./">{{LN['Home']}}</a> /
              <span class="#">
                <a class='lowercase' href="./about"> {{LN['ABOUT US']}}</a></span>
            </h3>
          </div>
        </div>
    </header>
    <main class="blog">
      <!-- Section NEWS -->

      <section class="pt-[45px] md:pt-[90px]">
        <div class="container mx-auto">
          <div class="text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" class="text-2xl text-white capitalize font-semibold mb-5 section-title">
              О компании
            </h2>
            <p data-aos="fade-up" data-aos-delay="160" class="text-md text-justify text-white">
              <?=(@$_COOKIE['lang'] != 'ru') ? $data -> about_desc : $data -> about_desc_ru?>

            </p>
          </div>
          <iframe data-aos="fade-up" data-aos-delay="100" class="w-full h-[50vh] my-10" src="https://www.youtube.com/embed/T2t_MveBmd0" title="How are microchips made?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </section>
      <section class="py-[45px] product md:py-[90px]">
        <div class="container mx-auto">
          <h2 data-aos="fade-up" data-aos-delay="100"
            class="text-xl md:text-3xl text-white font-bold text-center mb-10 uppercase section-title">
            {{LN['OUR PARTNERS']}}
          </h2>
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
      <!-- Section NEWS -->
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