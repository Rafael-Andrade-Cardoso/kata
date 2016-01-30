      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="<?php echo base_url('dashboard');?>"><img src="<?php echo base_url('assets/img/logoasatoacademy.png');?>" class="img-circle" width="80" height="60"></a></p>
              	  <h5 class="centered">Academia Asato</h5>
                    <?php
              	   foreach ($menu as $row){
                          // Verifica se o a página atual
                          if (strpos(base_url(), $row->url)){
                              echo "<li class='dcjq-parent active'>";
                          }
                          // Verifica se o menu tem submenus
                          if (!empty($row->submenu)) {
                              echo "<li class='sub-menu dcjq-parent-li'>";
                              echo anchor($row->url, "<i class='" . $row->icone . "'></i> " . $row->nome);
                              echo "<ul class='sub'>";
                              foreach ($row->submenu as $menu_filho){
                                  echo "<li>";
                                  echo anchor($menu_filho->url, "<i class='" . $menu_filho->icone . "'></i> " . $menu_filho->nome);
                                  echo "</li>";
                              }
                              echo "</ul>";
                              echo "</li>";
                          } else { // Caso não tenha submenu
                              echo "<li class='mt'>" . anchor($row->url, "<i class='" . $row->icone . "'></i> " . $row->nome) . "</a></li>";
                          }
                          // Verifica se o a página atual
                          if (strpos(base_url(), $row->nome)){
                              echo "</li>";
                          }
                     }
                    ?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

     <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
