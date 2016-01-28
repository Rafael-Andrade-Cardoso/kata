<h3><i class="fa fa-angle-right"></i> Cadastrar aula</h3>
<?php echo form_open('cadastro/insert_aula', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>
    <!-- dt_aula, obs-->
    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0202" size="2">Dados obrigatórios*</font></h4>
                <?php
                   /* echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                    }
                    //debug($this->session);*/
                ?>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Arte marcial<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <select name="id_arte_marcial" class="form-control" title="Selecione a arte marcial ministrada na aula">
                            <option value="">Escolha o estilo</option>
                            <?php
                                foreach ($arte_marcial as $value) {
                                    echo "<option value='" . $value->id_arte_marcial . "'>" . $value->nm_arte_marcial. "</option>";
                                    /*if (set_value('id_arte_marcial') == $value->id_arte_marcial){
                                          echo " checked ";
                                    }
                                    echo ">" . $value->nm_arte_marcial . "</option>";*/
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_arte_marcial'); ?></div>
                    </div>
                </div>
             
                <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Data da aula<font color="#FF0202">*</font></label>
                        <div class="col-sm-4" class="form-control">
                            <input type="date" class="form-control" name="dt_aula" value="<?php echo set_value('dt_aula'); ?>" title="Digite a data da aula">
                            <div class="error"><?php echo form_error('dt_aula'); ?></div>
                        </div>                 
                </div>
                  
                  <div class="form-group">                      
                      <label class="col-sm-2 col-sm-2 control-label">Horário<font color="#FF0202">*</font></label>
                      <div class="col-sm-10">                    
                           <select name="id_horario" class="form-control" title="Selecione o horário que a aula acontecerá">
                              <option value="<?php echo set_value('id_horario'); ?>">Escolha o horário e dia da aula</option>
                              <?php
                                 /* foreach ($horario->result() as $value) {
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
                                      echo "<option value='" . $value->id_horario . "'>". $dia_semana
                                                                                    . " ".
                                                                                    "-  Hora inicial: ". $value->hr_inicio . " " .
                                                                                    "-  Hora Final: " . $value->hr_termino . " " .
                                                                                    "-  Instrutor: " . $value->nome ." ". $value->sobrenome.
                                            "</option>";                                    
                                  }
                              */?>
                          </select>
                          <div class="error"><?php echo form_error('id_horario'); ?></div>
                      </div>                     
                   </div>    	       
               
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Observações</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="observacao" title="Digite as observações que acha importante"><?php echo set_value('observacao'); ?> </textarea>
                        <div class="error"><?php echo form_error('observacao'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Cadastrar</button>                
            </div>
        </div>
    </div>

<?php echo form_close(); ?>