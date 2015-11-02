            <h3><i class="fa fa-angle-right"></i> Lista de atividades</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_atividade'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Nome</th>
                                      <th> Descrição</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      //debug($atividades);
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);

                                      foreach ($atividades as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_ta_atividade; ?>">
                                          <td><a href="basic_table.htm#l"><?php echo $value->nm_atividade; ?></a></td>
                                          <td><?php echo $value->desc_atividade; ?></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_ta_atividade); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" onclick="return deleteReg('<?php echo $value->id_ta_atividade;?>','menu/excluir/');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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



