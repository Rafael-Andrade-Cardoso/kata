            <h3><i class="fa fa-angle-right"></i> Lista de alunos</h3>
            <?php
            $id = 16;
            $caminho = base_url('exclusao/excluir');
            ?> 
            <a type="button" OnClick="deleteReg('<?=$id?>','http://127,0,0,1/kata/exclusao/excluir_aluno');" class="btn btn-danger">testeeee</a>
            <!--    ('<?php echo $value->id_aluno;?>','<?=base_url("exclusao/excluir_aluno");?>'-->
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_aluno'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Nome</th>
                                      <th> Sobrenome</th>
                                      <th class="hidden-sm hidden-xs"> Data de nascimento</th>
                                      <th> Situação</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);
                                      //echo "<pre>";
                                      //die(print_r($alunos));

                                      foreach ($alunos as $value) {
                                  ?>
                                      <tr id="line<?php echo $value->id_aluno; ?>">
                                          <td><a href="basic_table.html#"><?php echo $value->nome; ?></a></td>
                                          <td><?php echo $value->sobrenome; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->dt_nascimento); ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $value->id_ta_situacao; ?></span></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("alteracao/form_alterar_aluno/" . $value->id_aluno); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" OnClick="deleteReg('<?php echo $value->id_aluno;?>','<?=base_url("exclusao/excluir_aluno");?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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



