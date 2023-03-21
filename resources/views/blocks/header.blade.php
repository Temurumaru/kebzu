<?php 
use RedBeanPHP\R as R;
?>

<nav id="nav" class="<?=(Request::segment(1) == '') ? "nav bg-transparent" : "fixed bg-[#0F172A]"?> navbar-fixed py-2 md:py-0 rounded-b fixed top-0 left-0 w-full z-[9999]">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="./" class="flex items-center">
      <img src="./project/image/Logo.png" class="mr-3 h-14 sm:h-20" alt="KEBZU">
    </a>
    <div class="flex items-center md:order-2">
      <button type="button" data-dropdown-toggle="language-dropdown-menu"
      class="inline-flex justify-center items-center p-2 text-sm text-white rounded cursor-pointer hover:bg-gray-800 ">
      <?php if(@$_COOKIE['lang'] != 'ru') {?>
        <svg class="mr-2 w-5 h-5 rounded-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900">
      <path fill="#b22234" d="M0 0h7410v3900H0z"></path>
      <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300">
      </path>
      <path fill="#3c3b6e" d="M0 0h2964v2100H0z"></path>
      <g fill="#fff">
        <g id="d">
        <g id="c">
          <g id="e">
          <g id="b">
            <path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"></path>
            <use xlink:href="#a" y="420"></use>
            <use xlink:href="#a" y="840"></use>
            <use xlink:href="#a" y="1260"></use>
          </g>
          <use xlink:href="#a" y="1680"></use>
          </g>
          <use xlink:href="#b" x="247" y="210"></use>
        </g>
        <use xlink:href="#c" x="494"></use>
        </g>
        <use xlink:href="#d" x="988"></use>
        <use xlink:href="#c" x="1976"></use>
        <use xlink:href="#e" x="2470"></use>
      </g>
      </svg>
      English (US)
    <?php } else {?>
      <img class="w-5 h-5 rounded-full mr-2" src="./project/image/header/Язык.png" alt="">
      Руский
      <?php }?>
    </button>
    <!-- Dropdown -->
      <div class="hidden z-50 my-4 text-base list-none bg-[#0F172A] rounded divide-y divide-gray-100 shadow "
        id="language-dropdown-menu" data-popper-reference-hidden="" data-popper-escaped=""
        data-popper-placement="bottom"
        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 10px);">
        <ul class="py-1" role="none">
          <li onclick="setLang('en');">
            <a class="block py-2 px-4 text-sm text-white hover:bg-gray-800 " role="menuitem">
            <div class="inline-flex items-center">
              <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full mr-2" xmlns="http://www.w3.org/2000/svg"
              id="flag-icon-css-us" viewBox="0 0 512 512">
              <g fill-rule="evenodd">
                <g stroke-width="1pt">
                <path fill="#bd3d44"
                  d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                  transform="scale(3.9385)"></path>
                <path fill="#fff"
                  d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                  transform="scale(3.9385)"></path>
                </g>
                <path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)"></path>
                <path fill="#fff"
                d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                transform="scale(3.9385)"></path>
              </g>
              </svg>
              English
            </div>
            </a>
          </li>
          <li onclick="setLang('ru');">
            <a class="block py-2 px-4 text-sm text-white hover:bg-gray-800 " role="menuitem">
            <div class="inline-flex items-center">
             
              <img class="h-3.5 w-3.5 rounded-full mr-2" src="./project/image/header/Язык.png" alt="">
              Руский
            </div>
            </a>
          </li>


        </ul>
      </div>
      <button data-collapse-toggle="mobile-menu-language-select" type="button"
        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
        aria-controls="mobile-menu-language-select" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
      id="mobile-menu-language-select">
      <ul
        class="flex flex-col p-4 mt-4  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:text-[18px]">
        <li>
          <a href="./"
            class="block py-4 pl-3 pr-4 text-white capitalize duration-200 border-b border-transparent hover:border-white md:bg-transparent md:p-0 md:py-3 ">{{LN['Home']}}</a>
        </li>
        <li>
          <a href="./about" aria-current="page"
            class="block py-4 pl-3 pr-4 text-white capitalize duration-200 border-b border-transparent hover:border-white md:bg-transparent md:p-0 md:py-3 ">{{LN['_About us']}}</a>
        </li>
        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
            class="flex items-center justify-between block py-4 pl-3 pr-4 text-white capitalize duration-200 border-b border-transparent hover:border-white md:bg-transparent md:p-0 md:py-3">{{LN['Services']}}
            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg></button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar" class="hidden z-10 w-44 font-normal bg-[#0F172A] text-white rounded divide-y  shadow ">
            <ul class="py-1 text-sm" aria-labelledby="dropdownLargeButton">
              <?php
                $dt = R::findAll("services");
                foreach ($dt as $val) {
              ?>
              <li>
              <a href="/services?id={{$val -> id}}" class="block py-2 px-4 hover:bg-gray-800">{{(@$_COOKIE['lang'] != 'ru') ? $val -> title : $val -> title_ru}}</a>
              </li>
              <?php }?>
            </ul>
             
          </div>
        </li>
        <li>
          <a href="./blogs"
            class="block py-4 pl-3 pr-4 text-white capitalize duration-200 border-b border-transparent hover:border-white md:bg-transparent md:p-0 md:py-3 ">{{LN['Blog']}}</a>
        </li>
        <li>
          <a href="./contact"
            class="block py-4 pl-3 pr-4 text-white capitalize duration-200 border-b border-transparent hover:border-white md:bg-transparent md:p-0 md:py-3 ">{{LN['Contact']}}</a>
        </li>
        {{-- <li>
          <?php
          $lst = R::findAll('text_pages');
      
          if(empty($lst)) {
            unset($lst);
          } else {
          ?>
      
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2" class="flex justify-between items-center block py-4 border-b border-transparent duration-200 hover:border-white pr-4 pl-3 text-white md:bg-transparent text-white md:p-0  md:py-3 capitalize">{{LN['Pages']}} <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar2" class="hidden z-10 w-44 font-normal bg-[#0F172A] text-white rounded divide-y  shadow ">
            <ul class="py-1 text-sm" aria-labelledby="dropdownLargeButton">
              <?php
              foreach ($lst as $vl) {
              ?>
               
              <li>
                <a
                  href="/text_page?id={{$vl -> id}}"
                  class="block px-4 py-2 capitalize hover:bg-black"
                  >{{(@$_COOKIE['lang'] != 'ru') ? $vl -> title : $vl -> title_ru}}</a>
              </li>
              <?php }?>
            </ul>
             
          </div>
          <?php }?>
        </li> --}}
      </ul>
    </div>
  </div>
</nav>

</nav>