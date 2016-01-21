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
                    <label class="col-sm-2 col-sm-2 control-label">Horário de início<font color="#FF0202">*</font></label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time" class="form-control" id="hr_inicio" name="hr_inicio" value="<?php echo set_value('hr_inicio'); ?>">
                    </div>  
                    <div class="error"><?php echo form_error('hr_inicio'); ?></div>                  
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horário de termino<font color="#FF0202">*</font></label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time"  class="form-control" id="hr_termino" name="hr_termino" value="<?php echo set_value('hr_termino'); ?>">
                    </div>
                    <div class="error"><?php echo form_error('hr_termino'); ?></div>
                </div>                
                
               <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Instrutor<font color="#FF0202">*</font></label>
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
                    <label class="col-sm-2 col-sm-2 control-label">Dia da Semana<font color="#FF0202">*</font></label>                                    
                    <div class="col-sm-4">
                        <select multiple name="dia_semana" class="form-control" title="Selecione um tipo sanguíneo">
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
                </div>
                
                <button class="btn btn-lg btn-primary" >Cadastrar</button>
                <?php
                //echo anchor_popup(base_url('cadastro/form_aluno'), 'Cadastro de Alunos', array('width' => '750', 'height' => '600', 'scrollbars' => 'yes', 'menubar' => 'no', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0'));
                ?>
            </div>
        </div>
    </div>

<?php echo form_close(); ?>

<script type="text/javascript">

    $("#hr_inicio").blur(function(){
        var data_1 = document.getElementById("hr_inicio").value;
        var data_2 = document.getElementById("hr_termino").value;
        if(data_1 != "" && data_2 !=""){            
            if ((data_1 > data_2)) {
                alert("Hora de início da aula deve ser menor que a final");
                $("#hr_inicio").focus();
                return false;    
            }  
        }  
    });
    
    $("#hr_termino").blur(function(){
        var data_1 = document.getElementById("hr_inicio").value;
        var data_2 = document.getElementById("hr_termino").value;
        if(data_2 != ""){
            if(data_1 != ""){
                if ((data_1 > data_2)) {
                    alert("Hora de início da aula deve ser menor que a final");
                    $("#hr_inicio").focus();
                    return false;    
                }    
            }
        }
    });
</script>