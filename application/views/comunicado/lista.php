            <h3><i class="fa fa-angle-right"></i> Lista de comunicados</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_comunicado'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Título</th>
                                      <th> Data de vencimento</th>
                                      <th> Data de publicacao</th>
                                      <th> Data de criação</th>
                                      <th> Descrição</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);

                                      foreach ($comunicados as $value) {
                                  ?>
                                      <tr id="line<?php echo $value->id_comunicado; ?>">
                                          <td><a href="basic_table.htm#l"><?php echo $value->titulo; ?></a></td>
                                          <td><?php echo $value->dt_vencimento; ?></td>
                                          <td><?php echo $value->dt_publicacao; ?></td>
                                          <td><?php echo $value->dt_criacao; ?></td>
                                          <td><?php echo $value->descricao; ?></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_comunicado); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" onclick="return deleteReg('<?php echo $value->id_comunicado;?>','<?=base_url("exclusao/excluir_comunicado");?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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






