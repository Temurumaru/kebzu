<?php

use RedBeanPHP\R as R;

$data = R::findOne("services", "id = ?", [$_GET['id']]);

$data -> views++;
R::store($data);

$gallery = json_decode($data -> img, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- aaaa -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>kebzU - <?= (@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru ?></title>
  <link rel="icon" href="./project/image/icon.png" type="image/gif">
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
    <header id="header" class="relative">

      @include('blocks.header')

      <div
        class="header__content bg-[url('/upl_data/wallpapers/{{$data -> wallpaper}}')] bg-fixed md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class=" w-full h-full">
          <div  data-aos="fade-right" data-aos-delay="100"  class="container mx-auto text-white">
            <h2 class="text-3xl md:text-[45px] font-bold mb-3 uppercase"><?= (@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru ?></h2>
            <h3 class="text-lg md:text-2xl font-semibold">
              <a href="./">{{LN['Home']}}</a> /
              <span class="#">
                <a class="capitalize" href="/"><?= (@$_COOKIE['lang'] != 'ru') ? $data -> title : $data -> title_ru ?></a></span>
            </h3>
          </div>
        </div>
    </header>
    <main class="blog">
      <!-- Section NEWS -->

      <section class="py-[45px] md:py-[90px]">
        <div class="container mx-auto">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="col-span-2 md:text-xl text-base text-white">
              <img class="w-full h-[40vh] md:h-[50vh] object-cover md:mb-10 mb-5"
                src="/upl_data/prevs/{{$data -> preview}}" alt="">
              <p data-aos="fade-up" data-aos-delay="100" class="mt-5 text-justify"> 
                <?= (@$_COOKIE['lang'] != 'ru') ? $data -> top_text : $data -> top_text_ru ?>
              </p>

              <p data-aos="fade-up" data-aos-delay="100" class="mt-5 text-justify">
                
              <?= (@$_COOKIE['lang'] != 'ru') ? $data -> bottom_text : $data -> bottom_text_ru ?>
              </p>
            </div>
            <div class="col-span-1">
              <div class="grid grid-cols-1 gap-y-3">
                <h3 class="text-base text-white uppercase">{{LN['OTHER COMPANIES']}}</h3>

                <?php
                $dt = R::findAll("services");
                foreach ($dt as $val) {
                  ?>
                  <a data-aos="fade-left" data-aos-delay="300" href="/services?id={{$val -> id}}" class="w-full px-3 py-7 bg-[#2D4479] text-white hover:bg-slate-900 text-base border border-transparent hover:border-white duration-300">{{(@$_COOKIE['lang'] != 'ru') ? $val -> title : $val -> title_ru}}</a>
                  <?php 
                } ?>
              </div>
              <img  data-aos="fade-up" data-aos-delay="800" class="w-full h-[500px] md:h-96 object-cover mt-10" src="upl_data/imgs/{{$data -> sponsor}}" alt="">
            </div>
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