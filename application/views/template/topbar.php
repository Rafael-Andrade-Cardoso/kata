  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Katá Project</b></a>
            <!--logo end-->

            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">2</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Você tem 2 novas mensagens</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="subject">
                                        <span class="from">Data do exame</span>
                                    </span>
                                    <span class="message">
                                        Data alterada para 09/11/2015
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="subject">
                                        <span class="from">Horario de treino</span>
                                    </span>
                                    <span class="message">
                                        Novo horário de treino disponível, ...
                                    </span>
                                </a>
                            </li>
                            <!--
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            -->
                            <li>
                                <a href="index.html#">Ver todas</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><?=anchor("login/logout", "<i class='fa fa-sign-out'></i> Sair", array("class" => "logout"));?></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
  </section>