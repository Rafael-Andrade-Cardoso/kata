      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?php echo base_url('assets/img/ui-sam.jpg');?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Escola Legal</h5>
              	  	
                  <li class="mt">
                  	<?= anchor("#",' <i class="fa fa-dashboard"></i><span>Início</span>')?>
                  </li>

                  <li class="sub-menu">
                  	<?= anchor("#",' <i class="fa fa-desktop""></i><span>Aluno</span>')?>
                      <ul class="sub">
                      	<li><?= anchor("#",'Cadastrar')?></li>	
                      </ul>
                  </li>

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
      