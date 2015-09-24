            <h3><i class="fa fa-angle-right"></i> Lista de Menus</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Nome</th>
                                      <th> URL</th>
                                      <th class="hidden-sm hidden-xs"> Descrição</th>
                                      <th> Ordem</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);
                                      foreach ($menus as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_menu; ?>">
                                          <td><a href="basic_table.html#"><?php echo $value->nome; ?></a></td>
                                          <td><?php echo $value->url; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo $value->desc_menu; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $value->ordem; ?></span></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_menu); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <!-- <a href="<?php echo base_url("menu/excluir/" . $value->id_menu); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>-->
                                              <!-- <a href="<?php echo base_url("menu/excluir/" . $value->id_menu); ?>" type="button" onclick="return confirmaExcusao()" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a> -->
                                              <a type="button" onclick="return deleteReg('<?php echo $value->id_menu;?>','menu/excluir/');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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



