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
  <title>kebzU - {{LN['Contact']}}</title>
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
          class="header__content bg-[url('./project/image/4.jpg')] bg-fixed md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover"
        >
        <div class=" w-full h-full">
          <div class="container mx-auto text-white cursor-pointer">
            <h2 class="text-3xl md:text-[45px] font-extrabold capitalize mb-3">{{LN['Contact']}} </h2>
            <h3 class="text-lg font-light md:text-xl">
              <a href="./index.html" class="lowercase">{{LN['Home']}}</a> /
              <span class="">
                <a href="./contact.html" class="lowercase">{{LN['Contact']}}</a></span
              >
            </h3>
          </div>
        </div>

     
    </header>
    <main class="blog">
      <!-- section contact-page -->

      <section class="py-[45px] md:py-[90px] contact-page">
        <div class="container mx-auto">
         <div class="grid md:grid-cols-3 grid-cols-1">
          <div class="col-span-1">
            <div class="px-7 py-6 flex items-center bg-slate-900 text-white">
              <i class="ri-map-pin-2-line w-5 mr-4"></i>
              <h3 class="text-base section-title ">{{LN['Locations']}}</h3>
            </div>
            <div>
              <div class="md:px-7 md:py-7 py-4 px-4 border border-gray-300 bg-white">
                <h3 class="text-base text-slate-900 font-semibold mb-4 uppercase">TLS KEBZU</h3>
                <a class="flex mb-2.5">
                  <i class="ri-map-pin-line w-5 mr-4 text-slate-900"></i>
                  <p class="text-sm text-gray-500">{{$data -> address}}</p>
                </a>
                <a class="flex mb-4 items-center">
                  <i class="ri-phone-line w-5 mr-4 space-x-3"></i>
                  <p class="text-sm text-gray-500 mr-5">{{$data -> tel}}</p>
                </a>
                <a class="flex mb-2.5">
                  <i class="ri-mail-line w-5 mr-4"></i>
                  <p class="text-sm text-gray-500">{{$data -> email}}</p>
                </a>
              </div>
              <div class="md:px-7 md:py-7 py-4 px-4 border border-gray-300 bg-white">
                <h3 class="text-base text-slate-900 font-semibold mb-4 uppercase">MLS TRANS</h3>
                <a class="flex mb-2.5">
                  <i class="ri-map-pin-line w-5 mr-5 text-slate-900"></i>
                  <p class="text-sm text-gray-500">{{$data -> address_2}}</p>
                </a>
                <a class="flex mb-4 items-center">
                  <i class="ri-phone-line w-5 mr-4"></i>
                  <p class="text-sm text-gray-500 mr-5">{{$data -> tel_2}}</p>
                </a>
                <a class="flex mb-2.5">
                  <i class="ri-mail-line w-5 mr-4"></i>
                  <p class="text-sm text-gray-500">{{$data -> email_2}}</p>
                </a>
              </div>
              <div class="md:px-7 md:py-7 py-4 px-4 border border-gray-300 bg-white">
                <h3 class="text-base text-slate-900 font-semibold mb-4 uppercase">KEBZU Office (Almata)</h3>
                <a class="flex mb-2.5">
                  <i class="ri-map-pin-line w-5 mr-5 text-slate-900"></i>
                  <p class="text-sm text-gray-500">{{$data -> address_3}}</p>
                </a>
                <a class="flex mb-4 items-center">
                  <i class="ri-phone-line w-5 mr-4"></i>
                  <p class="text-sm text-gray-500 mr-5">{{$data -> tel_3}}</p>
                </a>
                <a class="flex mb-2.5">
                  <i class="ri-mail-line w-5 mr-4"></i>
                  <p class="text-sm text-gray-500">{{$data -> email_3}}</p>
                </a>
              </div>
              <div class="md:px-7 md:py-7 py-4 px-4 border border-gray-300 bg-white">
                <h3 class="text-base text-slate-900 font-semibold mb-4 uppercase">KEBZU Office (Tashkent)</h3>
                <a class="flex mb-2.5">
                  <i class="ri-map-pin-line w-5 mr-5 text-slate-900"></i>
                  <p class="text-sm text-gray-500">{{$data -> address_4}}</p>
                </a>
                <a class="flex mb-4 items-center">
                  <i class="ri-phone-line w-5 mr-4"></i>
                  <p class="text-sm text-gray-500 mr-5">{{$data -> tel_4}}</p>
                </a>
                <a class="flex mb-2.5">
                  <i class="ri-mail-line w-5 mr-4"></i>
                  <p class="text-sm text-gray-500">{{$data -> email_4}}</p>
                </a>
              </div>
            </div>
          </div>
          <div class="col-span-2 h-[50vh] md:h-auto">
            <iframe class="w-full h-full" src="https://yandex.uz/map-widget/v1/-/CCUrV-AwLD" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
         </div>
        </div>
      </section>

      <!-- section contact-page -->

     

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