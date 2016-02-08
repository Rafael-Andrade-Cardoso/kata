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
                      <label class="col-sm-2 col-sm-2 control-label">Turma<font color="#FF0202">*</font></label>
                      <div class="col-sm-4">                    
                           <select name="id_turma" id="id_turma" class="form-control" title="Selecione a turma" onclick="javascript: get_info();">
                                <option value="<?php echo set_value('id_turma'); ?>">Escolha a turma</option>
                                <?php
                                    foreach ($turma->result() as $value) {
                                        echo "<option value='" . $value->id_turma . "'>" . $value->nm_turma. "</option>";                                    
                                    }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_turma'); ?></div>
                      </div>
                      
                      <label class="col-sm-2 col-sm-2 control-label">Horário<font color="#FF0202">*</font></label>
                      <div class="col-sm-4">                    
                           <select name="id_horario" id="id_horario" class="form-control" title="Selecione o horário que a aula acontecerá">
                                <option value="<?php echo set_value('id_horario'); ?>">Escolha o dia da semana e horário</option>
                                <?php
                                    foreach ($horario as $value) {
                                        
                                        echo "<option value='" . $value->id_horario . "'>" . $value->dia_semana .  "</option>";                                    
                                    }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_horario'); ?></div>
                      </div>                     
                </div>  
                   
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Arte marcial<font color="#FF0202">*</font></label>
                    <div class="col-sm-4">
                        <select name="id_arte_marcial" class="form-control" title="Selecione a arte marcial ministrada na aula" >
                            <option value="">Escolha o estilo</option>
                            <?php
                                foreach ($arte_marcial as $value) {
                                    echo "<option value='" . $value->id_arte_marcial . "'>" . $value->nm_arte_marcial. "</option>";                                    
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_arte_marcial'); ?></div>
                    </div>
                    
                    <label class="col-sm-2 col-sm-2 control-label">Data da aula<font color="#FF0202">*</font></label>
                    <div class="col-sm-4" class="form-control">
                        <input type="date" class="form-control" name="dt_aula" id="dt_aula" value="<?php echo set_value('dt_aula'); ?>" title="Digite a data da aula">
                        <div class="error"><?php echo form_error('dt_aula'); ?></div>
                    </div>                 
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Atividade<font color="#FF0202">*</font></label>
                    <div class="col-sm-5">
                        <?php
                            foreach ($atividade as $value) {
                        ?>
                            <div class="checkbox">
                                <label>
                                    <input name="id_ta_atividade[]" type="checkbox" value="<?php echo $value->id_ta_atividade; ?>"
                                    <?php
                                        if (set_value('id_ta_atividade')){
                                            echo (in_array($value->id_ta_atividade, set_value('id_ta_atividade')))?" checked ":"";
                                        }
                                    ?>
                                    />
                                    <?php echo $value->nm_atividade; ?>
                                </label>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>  
               
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Observações</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="observacao" title="Digite as observações que acha importante"><?php echo set_value('observacao'); ?> </textarea>
                        <div class="error"><?php echo form_error('observacao'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Avançar</button>                
            </div>
        </div>
    </div>

<script type="text/javascript">   
    
    $(document).ready(function(){
        var now = new Date();
        if(now.getDate() > 9 && now.getMonth() > 9){
            var today = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
        }else if(now.getDate() < 10 && now.getMonth() < 10){
            var today = now.getFullYear() + '-' + 0+(now.getMonth() + 1) + '-' + 0+now.getDate();
        }else if(now.getDate() < 10 && now.getMonth() > 9){
            var today = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + 0+now.getDate();
        }else if(now.getDate() > 10 && now.getMonth() < 9){        
            var today = now.getFullYear() + '-' + 0+(now.getMonth() + 1) + '-' + now.getDate();
        }
        
        //alert(today);
        $('#dt_aula').val(today);
    });
    
    function get_info() {
            $("#id_turma option:selected").each(function() {
                var id_turma = $("#id_turma").val();
                //var id_turma2 =  document.getElementById("id_turma").value;
                //alert(id_turma);
                str1 = "<?php echo base_url(); ?>cadastro/get_info_aula/"
                var res = str1.concat(id_turma);
                $.post(res, {
                    id_turma : id_turma
                }, function(data) {
                    $("#id_horario").html(data);
                });
                //alert(res);
            });
        }
</script>

<?php echo form_close(); ?>
