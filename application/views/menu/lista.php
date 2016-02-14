            <h3><i class="fa fa-angle-right"></i> Lista de menus</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_menu'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <th> Nome</th>
                                      <th> Menu pai</th>
                                      <th class="hidden-sm hidden-xs"> Descrição</th>
                                      <th class="hidden-sm hidden-xs"> Acesso</th>
                                      <th> Ícone</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      //debug($menus);
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);

                                      foreach ($menus as $value) {
                                  ?>
                                      <tr id="line<?php echo $value->id_menu; ?>">
                                          <td><a href=""><?php echo $value->nome; ?></a></td>
                                          <td><?php echo $value->nome_pai; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->desc_menu); ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo $value->tipo_usuario; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $value->icone; ?></span></td>
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_menu); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" OnClick="deleteReg('<?php echo $value->id_menu;?>','<?=base_url("exclusao/excluir_menu");?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

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



