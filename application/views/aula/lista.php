            <h3><i class="fa fa-angle-right"></i> Lista de alunos</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_aluno'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                               <thead>
                                  <tr>
                                      <!--<th> ID</th>-->
                                      <th>Data da aula</th>
                                      <th class="hidden-sm hidden-xs"> Dia da semana</th> 
                                      <th class="hidden-sm hidden-xs"> Hora de início</th>  
                                      <th class="hidden-sm hidden-xs"> Hora de término</th>                                       
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);
                                      //echo "<pre>";
                                      //die(print_r($alunos));

                                      foreach ($aula as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_aula; ?>">
                                                <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->dt_aula); ?></td>
                                                <td class="hidden-sm hidden-xs"><?php echo $value->dia_semana; ?></td>
                                                <td><?php echo $value->hr_inicio; ?></td>
                                                <td><?php echo $value->hr_termino; ?></td>
                                            
                                                <td>
                                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                    <a href="<?php echo base_url("alteracao/form_alterar_aula/" . $value->id_aula); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                    <a type="button" onclick="return deleteReg('<?php echo $value->id_aula;?>','menu/excluir/');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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



