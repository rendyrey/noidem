<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Panel Admin</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>Administrator</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('main_dashboard')}}">Main Dashboard</a></li>
                    <li><a href="{{url('vacancy_dashboard')}}">Vacancy Dashboard</a></li>
                    <li><a href="{{url('applicant_dashboard')}}">Applicant Dashboard</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Master <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('bidang_usaha')}}">Bidang Usaha</a></li>
                    <li><a href="{{url('institusi')}}">Institusi</a></li>
                    <li><a href="{{url('provinsi')}}">Provinsi</a></li>
                    <li><a href="{{url('kota')}}">Kota</a></li>
                    <li><a href="{{url('major_grup')}}">Major Group</a></li>
                    <li><a href="{{url('major')}}">Major</a></li>
                    <li><a href="{{url('advertising_category')}}">Advertising Category</a></li>
                    <li><a href="{{url('advertising_media')}}">Advertising Media</a></li>
                    <li><a href="{{url('tingkat_pendidikan')}}">Tingkat Pendidikan</a></li>
                    <li><a href="{{url('tanggal_psychotest')}}">Tanggal Psychotest</a></li>
                    <li><a href="{{url('kriteria_syarat')}}">Kriteria Syarat</a></li>
                    <li><a href="{{url('akreditasi')}}">Akreditasi</a></li>
                    <li><a href="{{url('posisi')}}">Posisi</a></li>
                    <li><a href="{{url('position_publish')}}">Position Publish</a></li>
                    <li><a href="{{url('position_category')}}">Position Category</a></li>
                    <li><a href="{{url('user')}}">User</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-gears"></i>Settings <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('syarat_prescreening')}}">Syarat Pre-Screening</a></li>
                    <li><a href="{{url('syarat_psychotest')}}">Syarat Psychotest</a></li>
                  </ul>
                </li>
                <li><a href="{{url('vacancy_advertising')}}"><i class="fa fa-sitemap"></i>Vacancy Advertising</span></a>

                </li>
                <li><a><i class="fa fa-users"></i>Pelamar<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('pelamar')}}">Pelamar</a></li>
                    <li><a href="{{url('pelamar_inproses')}}">In-process<span class="fa fa-refresh" style="color:lightblue"></span></a></li>
                    <li><a href="{{url('pelamar_awaiting')}}">Awaiting<span class="fa fa-minus" style="color:yellow"></span></a></li>
                    <li><a href="{{url('pelamar_failed')}}">Failed<span class="fa fa-close" style="color:red"></span></a></li>
                    <li class="green"><a href="{{url('pelamar_passed')}}">Passed<span class="fa fa-check" style="color:green;"></span></a></li>
                  </ul>
                </li>

              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{url('logout')}}">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">Administrator
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                  <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>


            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
