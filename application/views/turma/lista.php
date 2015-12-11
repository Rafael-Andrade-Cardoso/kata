            <h3><i class="fa fa-angle-right"></i> Lista de turmas</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastrar/form_turma'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <!--<th> ID</th>-->
                                      <th> Instrutor</th>
                                      <th class="hidden-sm hidden-xs"> Máximo de alunos</th>
                                      <th> Valor mensalidade</th>
                                      <th class="hidden-sm hidden-xs"> Data de início</th>
                                      <th class="hidden-sm hidden-xs"> Data final</th>
                                      <th> Hora início</th>
                                      <th> Hora término</th>
                                      <th> Dia da semana</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);

                                      foreach ($turmas as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_turma; ?>">
                                          <!--<td><a href="basic_table.htm#l"><?php echo $value->id_turma; ?></a></td>-->
                                          <td><?php echo $value->nome . " " . $value->sobrenome; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo $value->max_aluno; ?></td>
                                          <td><?php echo "R$".$value->valor_mensalidade; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->dt_inicio); ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->dt_final); ?></td>
                                          <td><?php echo $value->hr_inicio; ?></td>
                                          <td><?php echo $value->hr_termino; ?></td>
                                          <td><?php if($value->dia_semana == 0)
                                                        echo "Domingo";
                                                    else if($value->dia_semana == 1)
                                                        echo"Segunda-feira";
                                                    else if($value->dia_semana == 2)
                                                        echo "Terça-feira";
                                                    else if($value->dia_semana == 3)
                                                        echo "Quarta-feira";
                                                    else if($value->dia_semana == 4)
                                                        echo "Quinta-feira";
                                                    else if($value->dia_semana == 5)
                                                        echo "Sexta-feira";
                                                    else if($value->dia_semana == 6)
                                                       echo "Sábado";//echo $value->dia_semana; 
                                                ?></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_turma); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" onclick="return deleteReg('<?php echo $value->id_turma;?>','menu/excluir/');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                                          </td>
                                      </tr>
                                  <?php
                                      }
                                  ?>
                              </tbody>
                          </table>
                          <?php
                              if($paginacao) {
                                echo $paginacao;
                              }
                          ?>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->






