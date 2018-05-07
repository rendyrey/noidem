<div class="main-container ace-save-state" id="main-container">
  <script type="text/javascript">
    try{ace.settings.loadState('main-container')}catch(e){}
  </script>
  <div id="sidebar" class="sidebar responsive compact">
    <script type="text/javascript">
      try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    </div>
    </div>
    <ul class="nav nav-list">
      <?php
        $menu_0 = \App\MenuUser::where('id_induk', 0)->OrderBy('no_urut', 'ASC')->get();

        $x = true;
        $y = -1;
        $array_select = array();
        $array_select_menu = array();
        $array_select_url = array();

        $tmp = \App\MenuUser::where('url', Request::segment(1))->first();

        if(sizeof($tmp) > 0) {
          $id = $tmp->id;
        } else
        {
          $id = -1;
        }

        while ($x) {
          $select = \App\MenuUser::where('id', $id)->first();

          if(sizeof($select) > 0) {
            $id = $select->id_induk;
            if ($id != 0) { 
                $y = $y + 1;
                $array_select[$y] = $id;
                $array_select_menu[$y] = $select->menu;
                $array_select_url[$y] = $select->url;
            } else {
                $y = $y + 1;
                $array_select_menu[$y] = $select->menu;
                $array_select_url[$y] = $select->url;
            }

          }
          else {
            $x = false;
          }
        }
        $array_select = array_reverse($array_select);
        $array_select_menu  = array_reverse($array_select_menu);
        $array_select_url  = array_reverse($array_select_url);

        if(sizeof($tmp) > 0) {
          $y = $y + 1;
          $array_select[$y] = $tmp->id;
        }  

        $y = $y + 1;
        $array_select[$y] = -1;

        

        foreach ($menu_0 as $key) {
            get_menu_child($key->id, $array_select);
        }

        function get_menu_child($parent = 0, & $array_select) {
          $menu = \App\MenuUser::where('id_induk', $parent)->OrderBy('no_urut', 'ASC')->get();
          $parent = \App\MenuUser::where('id', $parent)->first();
          ?>

          @if ($parent->id_induk == 0) 
          <?php 
          if(isset($array_select[0])) {
            $array_select[0];
          } else {
            $array_select[0] = $array_select[1];
          }
          ?>     

              @if ($parent->id == $array_select[0])
                <?php array_shift($array_select); ?>
                <li class="hover active open">
              @else
                <li class="hover">
              @endif

              @if ($parent->id_induk == 0 && $parent->url == "#")
              <a href="{{url($parent->url)}}" class="dropdown-toggle">
                <i class="{{$parent->icon}}"></i>
                <span class="menu-text">
                  {{$parent->menu}}
                </span>
                <b class="arrow fa fa-angle-down"></b>
                </a>
                
              @else
                <a href="{{url($parent->url)}}">
                <i class="{{$parent->icon}}"></i>
                <span class="menu-text">
                  {{$parent->menu}}
                </span>
                </a>
              @endif
          @else
            @if(sizeof($menu) > 0)
              
              @if ($parent->id == $array_select[0])
                <?php array_shift($array_select); ?>
                <li class="hover active">
              @else
                <li class="hover">
              @endif

            @else
            
              @if ($parent->id == $array_select[0])
                <?php array_shift($array_select); ?>
                <li class="active">
              @else
                <li>
              @endif

            @endif

              <a href="{{url($parent->url)}}">
                <i class="{{$parent->icon}}"></i>
                  &nbsp;&nbsp;&nbsp;{{$parent->menu}}
                @if(sizeof($menu) > 0)
                <b class="arrow fa fa-angle-down"></b>
                @else
                <b class="arrow"></b>
                @endif
              </a>
          @endif
            @if(sizeof($menu) > 0)
              <b class="arrow"></b>
              <ul class="submenu">
                <?php
                  foreach ($menu as $key) {
                    get_menu_child($key->id, $array_select);
                  }
                ?>
              </ul>
            @endif
            </li>
         <?php
        }
        ?>
    </ul>
    </ul>
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
      <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
  </div>
  <div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="{{url('admin')}}">Home</a>
      </li>
        <?php
            $jml_menu = sizeof($array_select_menu);
            $x = $jml_menu - 1;

            for ($i=0; $i < $jml_menu ; $i++) { 
                if ( $i == $x ) {
                    ?>
                    <li> 
                    <?php echo $array_select_menu[$i] ; ?>
                    </li>                    
                    <?php
                } else {
                    ?>
                    <li class="active">
                    <a href="<?php echo $array_select_url[$i]; ?>"><?php echo $array_select_menu[$i] ; ?></a>
                    </li>
                    <?php
                }
                ?>
                <?php
            }
        ?>
    </ul><!-- /.breadcrumb -->
             
    </div>
    