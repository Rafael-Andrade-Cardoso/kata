            <h3><i class="fa fa-angle-right"></i> Lista de turmas</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_turma'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <!--<th> ID</th>-->
                                      <th> Turma</th>
                                      <th> Instrutor</th>
                                      <th class="hidden-sm hidden-xs"> Máximo de alunos</th>
                                      <th> Valor mensalidade</th>
                                      <th class="hidden-sm hidden-xs"> Data de início</th>
                                      <th class="hidden-sm hidden-xs"> Data final</th>                                      
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);

                                      foreach ($turma as $value) {
                                          //die(print_r($value));
                                  ?>
                                      <tr id="line<?php echo $value->id_turma; ?>">
                                          <!--<td><a href="basic_table.htm#l"><?php echo $value->id_turma; ?></a></td>-->
                                          <td><?php echo $value->nm_turma; ?></td>
                                          <td><?php echo $value->nome . " " . $value->sobrenome; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo $value->max_aluno; ?></td>
                                          <td><?php echo "R$".$value->valor_mensalidade; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->dt_inicio); ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->dt_final); ?></td>
                                          
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("alteracao/form_alterar_turma/" . $value->id_turma); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" OnClick="deleteReg('<?php echo $value->id_turma;?>','<?=base_url("exclusao/excluir_turma");?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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






