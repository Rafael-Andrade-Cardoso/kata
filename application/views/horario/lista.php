            <h3><i class="fa fa-angle-right"></i> Lista de horario</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_horario'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                     <!-- <th> ID</th>-->
                                      <th> Instrutor</th>
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

                                      foreach ($horarios as $value) {
                                  ?>
                                      <tr id="line<?php echo $value->id_horario; ?>">
                                          <!--<td><a href="basic_table.htm#l"><?php echo $value->id_horario; ?></a></td>-->
                                          <td><?php echo $value->nome . " " . $value->sobrenome; ?></td>
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
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_horario); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" OnClick="deleteReg('<?php echo $value->id_horario;?>','<?=base_url("exclusao/excluir_horario");?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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






