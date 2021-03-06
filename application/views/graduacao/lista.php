            <h3><i class="fa fa-angle-right"></i> Lista de graduacao</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_graduacao'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Nome</th>
                                      <th> Ordem</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);
                                      foreach ($graduacoes as $value) {
                                  ?>
                                      <tr id="line<?php echo $value->id_ta_graduacao; ?>">
                                          <td><a href="basic_table.html#"><?php echo $value->graduacao; ?></a></td>
                                          <td><a href="basic_table.html#"><?php echo $value->ordem; ?></a></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("alteracao/form_alterar_graduacao/" . $value->id_ta_graduacao); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" onclick="return deleteReg('<?php echo $value->id_ta_graduacao;?>','<?=base_url("exclusao/excluir_graduacao");?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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



