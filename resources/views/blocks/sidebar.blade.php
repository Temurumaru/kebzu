<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?=(Request::segment(1) == 'admin') ? "" : "collapsed"?>" href="{{route('admin')}}">
        <i class="bi bi-grid"></i>
        <span>Доска</span>
      </a>

      <a class="nav-link <?=(Request::segment(1) == 'admin_blog') ? "" : "collapsed"?>" href="{{route('admin_blog')}}">
        <i class="bi bi-grid"></i>
        <span>Добавить Блог</span>
      </a>

      <a class="nav-link <?=(Request::segment(1) == 'admin_partner') ? "" : "collapsed"?>" href="{{route('admin_partner')}}">
        <i class="bi bi-grid"></i>
        <span>Добавить партера</span>
      </a>


      <a class="nav-link <?=(Request::segment(1) == 'admin_upd_data') ? "" : "collapsed"?>" href="{{route('admin_upd_data')}}">
        <i class="bi bi-grid"></i>
        <span>Обновить данные</span>
      </a>

      <a class="nav-link <?=(Request::segment(1) == 'admin_upd_contact') ? "" : "collapsed"?>" href="{{route('admin_upd_contact')}}">
        <i class="bi bi-grid"></i>
        <span>Обновить контакты</span>
      </a>


      @if (@$_SESSION['admin'] -> level >= 5)
      <a class="nav-link <?=(Request::segment(1) == 'admin_creator') ? "" : "collapsed"?>" href="{{route('admin_creator')}}">
        <i class="bi bi-grid"></i>
        <span>Добавить Аднимистратора</span>
      </a>
      @endif
    </li>

  </ul>

</aside><!-- End Sidebar-->