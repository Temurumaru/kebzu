<?php
use RedBeanPHP\R as R;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- aaaa -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>kebzU - {{LN['Blog']}}</title>
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
        class="header__content bg-[url('./project/image/3.jpg')] bg-fixed bg-top md:mt-0 pt-32 pb-40 md:py-40 md:pb-50 text-white bg-no-repeat bg-cover">
        <div class=" w-full h-full">
          <div  data-aos="fade-right" data-aos-delay="100"  class="container mx-auto text-white cursor-pointer">
            <h2 class="text-3xl md:text-[45px] font-extrabold capitalize mb-3">{{LN['Blog']}}</h2>
            <h3 class="text-lg font-light md:text-xl">
              <a href="./" class="lowercase">{{LN['Home']}}</a> /
              <span class="#">
                <a href="./about" class="lowercase"> {{LN['Blog']}}</a></span>
            </h3>
          </div>
        </div>
    </header>

    <main class="blog">
          <!-- Section NEWS -->

          <section class="py-[45px] md:py-[90px]">
            <div class="container mx-auto">
              <div class="grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 md:gap-12 gap-8 ">

                <?php
          
              if(@$_COOKIE['lang'] != "ru") {
              $arr = [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
              ];
            } else {
              $arr = [
                'Янв',
                'Фев',
                'Мрт',
                'Апр',
                'Май',
                'Июн',
                'Июл',
                'Авг',
                'Сен',
                'Окт',
                'Ноя',
                'Дек'
              ];
            }


              $limit = 9;

              $bl_lng = (@$_COOKIE['lang'] != 'ru') ? 'en' : 'ru';
                
              $needles = R::count('blog', 'lang = ?', [$bl_lng]);
              
              $n2 = false;
              if($needles > $limit) $n2 = true;
                
              $blog_total_pages = ceil($needles / $limit);
              
              if($blog_total_pages < 2) $n2 = false;
                
              if(isset($_GET['b_page'])) {
                $b_page = $_GET['b_page'];
                if($b_page < 1 || $b_page > $blog_total_pages) {$b_page = 1;}
              } else {
                $b_page = 1;
              }
                
              $blogs = R::find("blog","lang = ? ORDER BY id DESC LIMIT " . (($b_page-1)*$limit).', '.$limit, [$bl_lng]);
              foreach ($blogs as $val) { 
                $month = intval((explode(" ", $val -> date)[0]) - 1);

                ?>
            
                <div data-aos="fade-down"  data-aos-delay="40"
                  class="max-w-sm border-0   mx-auto transition-all duration-500">
                  <a href="/blog?id={{$val -> id}}" class=" border-0">
                    <img class="w-full max-h-45 border-0 h-[250px] object-cover" src="/upl_data/prevs/{{$val -> preview}}" alt="">
                    <div class="pt-3">
                      <span>
                        <div class="text-slate-400 flex items-center mb-2">
                          <i class="ri-calendar-todo-line text-lg mr-2"></i>
                          <p class="text-sm"><?=str_replace(",", "", (explode(" ", $val -> date)[1]))." ".$arr[$month]." ".date('Y')?></p>
                        </div>
                      </span>
                      <h5 class="mb-2 text-lg font-bold tracking-tight text-white">
                        <?=$val -> title?>
                      </h5>
                      <p class="mb-10 text-base font-normal text-white">
                        {{substr(str_replace("*", "", str_replace("#", "", $val -> text)), 0, 90) . '...'}}
                      </p>
                      
                      <a href="/blog?id={{$val -> id}}" class="relative inline-flex items-center justify-center py-3 px-4 overflow-hidden font-mono font-medium tracking-tighter text-white hover:text-slate-900 border border-white bg-transparent group">
                        <span class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56"></span>
                        <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-50 "></span>
                        <span class="relative">Подробнее</span>
                        </a>
                    </div>
                  </a>
                </div>

                <?php }?>
    
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