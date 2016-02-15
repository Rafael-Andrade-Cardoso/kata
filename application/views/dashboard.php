    <h3><i class="fa fa-angle-right"></i> Dashboard</h3><hr />
    <div class="col-md-6 com-sm-10" id="chartContainer">FusionCharts XT will load here!</div>
    <div class="col-md-6 com-sm-10" id="chartContainer1">FusionCharts XT will load here!</div>
    <div class="col-lg-12 col-md-12 col-sm-12 mb">
        <div class="content-panel pn">
            <div id="blog-bg">
                    <div class="blog-title">Tempo para exame</div>
                </div>
                    <div class="blog-text">
                    <?php
                    foreach($get_alunos_hora_exame as $key => $aluno) {
                        if ($aluno->qtd_aulas > 1) {
                        echo "<div class='aluno-exame'>";
                        echo $aluno->nome . " " . $aluno->sobrenome;
                        echo $aluno->qtd_aulas;
                        echo "</div>";          
                        }          
                    }
                    ?><br />
                    
                <a href="<?php echo base_url('cadastro/form_exame'); ?>" class="btn btn-lg btn-primary col-lg-12">Marcar exame</a><br /><br />
            </div>
        </div>
    </div>
    <?php 
        $faixas_coloridas = 0;
        foreach($alunos_graduacao as $dados) {
            $faixas_coloridas += $dados->qtd_alunos;
        }
        $faixas_brancas = $qtd_alunos - $faixas_coloridas;
        
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
                    echo '
                        {
                        "label": "' . "Faixa Branca" . '",
                        "value": "' . $faixas_brancas . '"
                        },';
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
              

