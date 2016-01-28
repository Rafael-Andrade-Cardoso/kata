            <h3><i class="fa fa-angle-right"></i> Lista de instrutores</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_instrutor'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Nome</th>
                                      <th> Sobrenome</th>
                                      <th class="hidden-sm hidden-xs"> Tipo sanguineo</th>
                                      <th> E-mail</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      //debug($instrutores);
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);
                                      //echo "<pre>";
                                      //die(print_r($alunos));

                                      foreach ($instrutores as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_instrutor; ?>">
                                          <td><a href="basic_table.html#"><?php echo $value->nome; ?></a></td>
                                          <td><?php echo $value->sobrenome; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->tipo_sanguineo); ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $value->email; ?></span></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_instrutor); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" onclick="return deleteReg('<?php echo $value->id_instrutor;?>','menu/excluir/');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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



