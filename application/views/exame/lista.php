            <h3><i class="fa fa-angle-right"></i> Lista de Menus</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Arte marcial</th>
                                      <th> Aluno</th>
                                      <th> Graduação</th>
                                      <th> Data exame</th>
                                      <th class="hidden-sm hidden-xs"> valor</th>
                                      <th> local</th>
                                      <th class="hidden-sm hidden-xs"> Descrição</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);

                                      foreach ($exames as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_instrutor; ?>">
                                          <td><a href="basic_table.html#"><?php echo $value->nm_arte_marcial; ?></a></td>
                                          <td><?php echo $value->nome . " " . $value->sobrenome; ?></td>
                                          <td><?php echo data_from_db($value->dt_exame); ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo $value->valor; ?></td>
                                          <td><?php echo $value->local; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo $value->descricao; ?></td>
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



