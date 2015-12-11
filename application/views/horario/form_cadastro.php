<h3><i class="fa fa-angle-right"></i> Cadastrar Turma</h3>
<?php echo form_open('cadastro/insert_horario', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>

    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados</h4>
                <?php
                   /* echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                    }*/
                    //debug($this->session);
                ?>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horario de início</label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time" class="form-control" name="hr_inicio">
                    </div>  
                    <div class="error"><?php echo form_error('hr_inicio'); ?></div>                  
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horario de termino</label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time"  class="form-control" name="hr_termino">
                    </div>
                    <div class="error"><?php echo form_error('hr_termino'); ?></div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Arte marcial</label>
                    <div class="col-sm-10">
                        <select name="id_arte_marcial" class="form-control">
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
                    <label class="col-sm-2 col-sm-2 control-label">Instrutor</label>
                    <div class="col-sm-10">
                        <select name="id_instrutor" class="form-control">
                          <option value="">Escolha o instrutor</option>
                            <?php
                                foreach ($instrutor->result() as $value) {
                                   echo "<option value='" . $value->id_instrutor . "'>" .  $value->nome . " " . $value->sobrenome . "</option>";
                                   /*echo "<option value='" . $value->id_instrutor . "'";
                                    if (set_value('id_instrutor')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->nome . " " . $value->sobrenome . "</option>";*/
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_instrutor'); ?></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Dia da Semana</label>                                    
                    <div class="col-sm-4">
                        <select name="dia_semana" class="form-control" title="Selecione um tipo sanguíneo">
                            <option value="">Escolha um dia da semana</option>
                            <option value="0">Domingo</option>
                            <option value="1">Segunda-feira</option>
                            <option value="2">Terça-feira</option>
                            <option value="3">Quarta-feira</option>
                            <option value="4">Quinta-feira</option>
                            <option value="5">Sexta-feira</option>
                            <option value="6">Sábado</option>                              
                          </select>
                        <!--<input type="text" class="form-control" name="tipo_sanguineo" value="<?php echo set_value('tipo_sanguineo'); ?>" />-->
                        <div class="error"><?php echo form_error('dia_semana'); ?></div>
                    </div>
                    
                    <label class="col-sm-2 col-sm-2 control-label">Máximo de alunos</label>
                    <div class="col-sm-4" class="form-control">                        
                        <input type="text" class="form-control" name="max_aluno">                   
                        <div class="error"><?php echo form_error('max_aluno'); ?></div>
                    </div>                 
                   
                </div>  
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data de início</label>
                    <div class="col-sm-4" class="form-control">
                        <input type="date" class="form-control" name="dt_inicio">
                        <div class="error"><?php echo form_error('dt_inicio'); ?></div>
                    </div>                 
                   
                    <label class="col-sm-2 col-sm-2 control-label">Valor mensalidade</label>
                    <div class="col-sm-4" class="form-control">
                        <div class="input-group">
                        <input type="text" class="form-control" name="valor_mensalidade">
                        <span class="input-group-addon">R$</span>                        
                    </div>
                        <div class="error"><?php echo form_error('dt_inicio'); ?></div>
                    </div>                 
                </div>             

                <button class="btn btn-lg btn-primary" >Cadastrar</button>
                <?php
                //echo anchor_popup(base_url('cadastro/form_aluno'), 'Cadastro de Alunos', array('width' => '750', 'height' => '600', 'scrollbars' => 'yes', 'menubar' => 'no', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0'));
                ?>
            </div>
        </div>
    </div>

<?php echo form_close(); ?>
