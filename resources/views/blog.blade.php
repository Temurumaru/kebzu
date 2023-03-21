<?php

use RedBeanPHP\R as R;
use League\CommonMark\CommonMarkConverter;

$md = new CommonMarkConverter([
    'html_input' => 'strip',
    'allow_unsafe_links' => false,
]);


$data = R::findOne("blog", "id = ?", [$_GET['id']]);

$data -> views++;
R::store($data);

$text = $md -> convert($data -> text);

?>

<!DOCTYPE html>
<html lang="<?=$data -> lang?>">

<head>
  <meta charset="UTF-8" />
  <!-- aaaa -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>kebzU - <?=$data -> title?></title>
  <link rel="icon" href="./project/image/icon.png" type="image/gif">
  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="./project/plugins/flowbite/flowbite.css" />

  <link rel="stylesheet" href="./project/plugins/swiper/swiper.css" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />

  <script src="./project/plugins/tailwind/tailwind.js"></script>
  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />

  <style>

    article * {
      font-family: "Inter" , sans-serif;
    }

    article > h1 {
      font-size: 3.25rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article > h2 {
      font-size: 2.75rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article > h3 {
      font-size: 2.25rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }
    
    article > h4 {
      font-size: 1.85rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article > h5 {
      font-size: 1.35rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article > h6 {
      font-size: 0.99rem !important;
      margin-top: 0.9rem !important;
    }

    article > ul {
      list-style-type: disc !important;
      margin-left: 1.7rem !important;
    }

    article > ol {
      list-style-type: decimal !important;
      margin-left: 1.7rem !important;
    }

    article * h1 {
      font-size: 3.25rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article * h2 {
      font-size: 2.75rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article * h3 {
      font-size: 2.25rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }
    
    article * h4 {
      font-size: 1.85rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article * h5 {
      font-size: 1.35rem !important;
      margin-top: 0.9rem !important;
      color: #587AE9;
    }

    article * h6 {
      font-size: 0.99rem !important;
      margin-top: 0.9rem !important;
    }

    article * ul {
      list-style-type: disc !important;
      margin-left: 1.7rem !important;
    }

    article * ol {
      list-style-type: decimal !important;
      margin-left: 1.7rem !important;
    }

    article > a {
      color: #587AE9;
      text-decoration: underline;
      cursor: pointer;
    }

    article * a {
      color: #587AE9;
      text-decoration: underline;
      cursor: pointer;
    }

    article > p {
      margin-top: 0.8rem !important;
    }

    article * p {
      margin-top: 0.8rem !important;
    }
  </style>
</head>

<body>
  <div class="overflow-hidden wrapper">
    <header id="header" class="relative">
      @include('blocks.header')

      <div
        class="header__content bg-[url('/upl_data/wallpapers/{{$data -> wallpaper}}')]  bg-fixed md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class=" w-full h-full">
          <div data-aos="fade-right" data-aos-delay="100"  class="container mx-auto text-white cursor-pointer section-title">
            <h2 class="text-3xl md:text-[45px] font-extrabold capitalize mb-3"><?=$data -> title?></h2>
            <h3 class="text-lg font-light md:text-xl">
              <a href="./" class="lowercase">Главная</a> /
              <span class="#">
                <a href="/blog?id={{@$_GET['id']}}" ><?=$data -> title?></a></span>
            </h3>
          </div>
        </div>
    </header>
    <main class="blog">
      <!-- Section NEWS -->

      <section class="py-[45px] md:py-[90px]">
        <div class="container mx-auto">
          <div class="blog-single text-white">
            <div class="flex mb-5">
              <div data-aos="fade-up" data-aos-delay="200" class="text-white flex items-center mr-9">
                <i class="ri-calendar-todo-line text-lg mr-2"></i>
                <p class="text-sm"><?=$data -> date?></p>
              </div>
              <div data-aos="fade-up" data-aos-delay="250" class="text-white flex items-center ">
                <i class="ri-eye-fill text-lg mr-2"></i>
                <p class="text-sm"><?=$data -> views?></p>
              </div>
            </div>
            
            <img data-aos="fade-bottom" data-aos-delay="50" class="w-full md:w-[50%] mb-10 h-[50vh] object-cover" src="/upl_data/prevs/{{$data -> preview}}" alt="">

            <article id="article">
              <?=$text?>
            </article>

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