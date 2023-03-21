<footer class="bg-slate-900 md:pt-[60px] pt-7 pb-5 relative bg-[#0F172A]">
  <a href="#header"
    class="bg-white scroll-smooth py-2 px-3 rounded-full flex justify-center items-center inline-flex absolute right-8 top-[60px] text-white">
    <i class="text-3xl ri-arrow-up-s-line text-currentColor"></i>
  </a>
  <div class="container mx-auto">
    <div class="flex flex-col md:flex-row md:justify-between">
      <div class="mb-6 md:mb-0">
        <a href="#" class="flex items-center">
          <img src="./project/image/Logo.png" class="h-20 mr-3" alt="kebzu">
        </a>
      </div>
      <div class="grid grid-cols-2 gap-8 sm:w-full md:w-3/4 sm:grid-cols-3">
        <div class=" col-span-2 sm:col-span-1" >
          <h2 class="mb-3 text-sm font-semibold text-white uppercase ">{{LN['Services']}}</h2>
          <ul class="text-white ">
            <?php
              use RedBeanPHP\R as R;
    
              $dt = R::findAll("services");
              foreach ($dt as $val) {
            ?>
          <li class="mt-2.5">
            <a href="/services?id={{$val -> id}}" class="hover:underline">{{(@$_COOKIE['lang'] != 'ru') ? $val -> title : $val -> title_ru}}</a>
          </li>
          <?php }?>
          </ul>
        </div>

        <div>
          <h2 class="mb-6 text-sm font-semibold text-white uppercase ">{{LN['Pages']}}</h2>
          <ul class="text-white">
            <li class="mb-2.5">
              <a href="./about" class="hover:underline">{{LN['_About us']}}</a>
            </li>
            <li class="mb-2.5 ">
              <a href="./blog" class="hover:underline">{{LN['Blog']}}</a>
            </li>
            <li class="mb-2.5 ">
              <a href="./contact" class="hover:underline">{{LN['Contact']}}</a>
            </li>
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold text-white uppercase ">{{LN['Social networks']}}</h2>
          <?php $socials = R::findOne("data", "id = ?", [1])?>
          <ul class="text-white">
            <li class="mb-2.5">
              <a href="{{$socials -> facebook}}" class="hover:underline ">Facebook</a>
            </li>
            <li class="mb-2.5">
              <a href="{{$socials -> instagram}}" class="hover:underline">Instagram</a>
            </li>
            <li class="mb-2.5">
              <a href="{{$socials -> telegram}} class="hover:underline">Telegram</a>
            </li>
          </ul>
        </div>
      </div>

    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8">

  </div>
  <div class="container mx-auto">
    <div class="text-white sm:flex sm:items-center sm:justify-between">
      <span class="text-sm sm:text-center ">© 2023 <a href="#" class="hover:underline">kebzU </a> {{LN['all rights reserved']}}
      </span>
      <div class="flex items-center sm:text-center">
        <span class="mr-2 text-sm"> {{LN['The Web studio was engaged in the creation of the site']}}
        </span>
        <a href="https://marss.uz" class="hover:underline" target="_blank"><img class="w-20 h-8" src="./project/image/MT.png" alt="">
        </a>
      </div>

    </div>
  </div>
</footer>
<script src="js/script.js"></script>