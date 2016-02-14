<h3><i class="fa fa-angle-right"></i> Alterar horário</h3>
<?php echo form_open("alteracao/alterar_horario/$query->id_horario", array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>
<input type="hidden" name="id_horario" value="<?php echo set_value('id_horario', $query->id_horario); ?>" />
    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados</h4>
                <?php
                    //echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                        
                    }
                    //debug($this->session);
                ?>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horário de início<font color="#FF0202">*</font></label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time" class="form-control" id="hr_inicio" name="hr_inicio" value="<?php echo set_value('hr_inicio'); ?><?php echo set_value('hr_inicio', $query->hr_inicio); ?>">
                    </div>  
                    <div class="error"><?php echo form_error('hr_inicio'); ?></div>                  
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horário de termino<font color="#FF0202">*</font></label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time"  class="form-control" id="hr_termino" name="hr_termino" value="<?php echo set_value('hr_termino'); ?><?php echo set_value('hr_termino', $query->hr_termino); ?>">
                    </div>
                    <div class="error"><?php echo form_error('hr_termino'); ?></div>
                </div>                
                
               <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Instrutor<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <select name="id_instrutor" class="form-control">
                          <option value="">Escolha o instrutor</option>
                            <?php
                                foreach ($instrutor as $value) {
                                    echo "<option value='" . $value->id_instrutor . "'";
                                    if (set_value('id_instrutor', $query->id_instrutor) == $value->id_instrutor){
                                        echo " selected ";
                                    }
                                    echo ">" . $value->nome . " " . $value->sobrenome. "</option>";                                   
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_instrutor'); ?></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Dia da Semana<font color="#FF0202">*</font></label>                                    
                    <div class="col-sm-4">
                        <select name="dia_semana" class="form-control" title="Selecione um tipo sanguíneo">
                            <option value="">Escolha um dia da semana</option>
                            
                            <?php
                                foreach ($dia_semana as $value) {
                                    $dia = '';
                                    echo "<option value='" . $value . "'";
                                        switch($query->dia_semana){
                                            case 0: $dia = 'Domingo'; break;
                                            case 1: $dia = 'Segunda-feira';break;
                                            case 2: $dia = 'Terça-feira';break;
                                            case 3: $dia = 'Quarta-feira';break;
                                            case 4: $dia = 'Quinta-feira';break;
                                            case 5: $dia = 'Sexta-feira';break;
                                            case 6: $dia = 'Sábado';break;
                                        }
                                    if (set_value('dia_semana', $dia) == $value){
                                        echo " selected ";
                                    }   
                                        echo ">" . $value. "</option>";                                
                                }
                            ?>                           
                          </select>
                        <div class="error"><?php echo form_error('dia_semana'); ?></div>
                    </div>
                </div>
                
                <button class="btn btn-lg btn-primary" >Alterar</button>
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