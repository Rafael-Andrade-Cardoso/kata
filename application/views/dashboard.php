    <h3><i class="fa fa-angle-right"></i> Dashboard</h3><hr />
    <div class="col-md-6 com-sm-10" id="chartContainer">FusionCharts XT will load here!</div>
    <div class="col-md-6 com-sm-10" id="chartContainer1">FusionCharts XT will load here!</div>
    <?php /*
                    $i = 0;
                    foreach($alunos_turma as $dados) {
                        $i++;
                    }
                    die(print_r($i));*/
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
                        "label": "' . $dados->qtd_aluno . '",
                        "value": "' . $dados->id_turma . '"
                        }';
                        if($i < 1) {
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
                "caption": "Monthly revenue for last year",
                "subCaption": "Harry's SuperMart",
                "xAxisName": "Month",
                "yAxisName": "Revenues (In USD)",
                "theme": "fint"
            },
            "data": [
                {
                  "label": "Jan",
                  "value": "420000"
                },
                {
                  "label": "Feb",
                  "value": "810000"
                },
                {
                  "label": "Mar",
                  "value": "720000"
                },
                {
                  "label": "Apr",
                  "value": "550000"
                },
                {
                  "label": "May",
                  "value": "910000"
                },
                {
                  "label": "Jun",
                  "value": "510000"
                },
                {
                  "label": "Jul",
                  "value": "680000"
                },
                {
                  "label": "Aug",
                  "value": "620000"
                },
                {
                  "label": "Sep",
                  "value": "610000"
                },
                {
                  "label": "Oct",
                  "value": "490000"
                },
                {
                  "label": "Nov",
                  "value": "900000"
                },
                {
                  "label": "Dec",
                  "value": "730000"
                }
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
              

