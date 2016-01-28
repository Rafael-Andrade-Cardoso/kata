            <h3><i class="fa fa-angle-right"></i> Lista alunos por turmas</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      
                      
                        <form action="aluno_turma" method="POST"> 
                            <br />                 
                            <label class="col-sm-2 col-sm-2 control-label">Turma</label>
                            <div class="col-sm-8">                                                   
                                <select name="id_horario" id="id_horario" class="form-control" title="Selecione a turma" onclick="javascript: getvalor();">
                                    <option value="<?php echo set_value('id_horario'); ?>">Escolha o horário e dia da aula</option>
                                    <?php
                                        foreach ($horario->result() as $value) {
                                            if($value->dia_semana == 0)
                                                $dia_semana = "Domingo";
                                            else if($value->dia_semana == 1)
                                                $dia_semana = "Segunda-feira";
                                            else if($value->dia_semana == 2)
                                                $dia_semana = "Terça-feira";
                                            else if($value->dia_semana == 3)
                                                $dia_semana = "Quarta-feira";
                                            else if($value->dia_semana == 4)
                                                $dia_semana = "Quinta-feira";
                                            else if($value->dia_semana == 5)
                                                $dia_semana = "Sexta-feira";
                                            else if($value->dia_semana == 6)
                                                $dia_semana = "Sábado";
                                            echo "<option value='" . $value->id_turma . "'>". $dia_semana
                                                                                            . " ".
                                                                                            "-  Hora inicial: ". $value->hr_inicio . " " .
                                                                                            "-  Hora Final: " . $value->hr_termino . " " .
                                                                                            "-  Instrutor: " . $value->nome ." ". $value->sobrenome. " ".
                                                                                            "-  Valor: ". $value->valor_mensalidade . " " .
                                                    "</option>";
                                            /*echo "<option value='" . $value->id_horario . "'";
                                            if (set_value('id_ta_tipo_telefone')){
                                            echo " checked ";
                                            }
                                            echo ">" . $value->desc_tipo_telefone . "</option>";*/
                                        }
                                    ?>
                                </select>
                                <br /> 
                                <input class="btn btn-primary" type="submit" value="filtar">
                                    <div class="error"><?php echo form_error('id_horario'); ?></div>
                                    
                            </div>        
                        </form>             
                       
                   
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                                  <tr>
                                      <!--<th> ID</th>-->
                                      <th> Aluno</th>
                                      <th class="hidden-sm hidden-xs"> Graduação</th>
                                      <th class="hidden-sm hidden-xs"> Tipo Sanguineo</th>                                      
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);

                                      if(isset($aluno)){
                                      foreach ($aluno as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_aluno; ?>">
                                          <!--<td><a href="basic_table.htm#l"><?php// echo $value->id_turma; ?></a></td>-->
                                          <td><?php echo $value->nome . " " . $value->sobrenome; ?></td>
                                          <td class="hidden-sm hidden-xs"><?php echo ($value->graduacao)?$value->graduacao:"Faixa branca"; ?></td>
                                          <td><?php echo $value->tipo_sanguineo; ?></td>
                                       
                                          <td>
                                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                              <a href="<?php echo base_url("menu/form_alterar/" . $value->id_aluno); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                              <a type="button" onclick="return deleteReg('<?php echo $value->id_aluno;?>','menu/excluir/');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                                          </td>
                                      </tr>
                                  <?php
                                      }
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






