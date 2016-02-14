    <h3><i class="fa fa-angle-right"></i> Dashboard</h3><hr />
    <div class="col-md-6 com-sm-10" id="chartContainer">FusionCharts XT will load here!</div>
    <div class="col-md-6 com-sm-10" id="chartContainer1">FusionCharts XT will load here!</div>
    <?php /*
                    $i = 0;
                    foreach($alunos_turma as $dados) {
                        $i++;
                    }
                    die(print_r($i));*/
        //echo "<pre>";
        //die(print_r($alunos_turma));
    ?>
    <script type="text/javascript">
    
      FusionCharts.ready(function(){
        var revenueChart = new FusionCharts({
            "type": "column2d",
            "renderAt": "chartContainer",
            "width": "100%",
            "height": "300",
            "dataFormat": "json",
            "dataSource":  {
              "chart": {
                "caption": "Alunos por Turma",
                "subCaption": "",
                "xAxisName": "Número da Turma",
                "yAxisName": "Número de alunos",
                "theme": "ocean"
            },
            "data": [
                <?php
                $i = 0;
                    foreach($alunos_turma as $dados) {
                        echo '
                        {
                        "label": "' . $dados->nm_turma . '",
                        "value": "' . $dados->qtd_aluno . '"
                        }';
                        if($i < $dados->n_turmas) {
                            echo ",";
                        } else {
                            break;
                        }
                        $i++;
                    }
                ?>
              ]
          }
    
      });
    revenueChart.render();
    })
    
    
    FusionCharts.ready(function(){
        var revenueChart = new FusionCharts({
            "type": "column2d",
            "renderAt": "chartContainer1",
            "width": "100%",
            "height": "300",
            "dataFormat": "json",
            "dataSource":  {
              "chart": {
                "caption": "Alunos por graduação",
                "subCaption": "",
                "xAxisName": "Graduação",
                "yAxisName": "Qtd. Alunos",
                "theme": "fint"
            },
            "data": [
                <?php
                $i = 0;
                    foreach($alunos_graduacao as $dados) {
                        echo '
                        {
                        "label": "' . $dados->graduacao . '",
                        "value": "' . $dados->qtd_alunos . '"
                        }';
                        if($i < $dados->qtd_graduacao) {
                            echo ",";
                        } else {
                            break;
                        }
                        $i++;
                    }
                ?>
              ]
          }
    
      });
    revenueChart.render();
    })
    </script>
      <!--main content start
          <h3><i class="fa fa-angle-right"></i> Dashboard</h3>
          	<hr />
              <!-- page start
              <div id="morris">
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Alunos por mês</h4>
                              <div class="panel-body">
                                  <div id="hero-graph" class="graph"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Alunos por graduação</h4>
                              <div class="panel-body">
                                  <div id="hero-bar" class="graph"></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mt">
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Quantidade de alunos por graduação por ano</h4>
                              <div class="panel-body">
                                  <div id="hero-area" class="graph"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Porcentagem por graduação</h4>
                              <div class="panel-body">
                                  <div id="hero-donut" class="graph"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              page end-->
              

