<h3><i class="fa fa-angle-right"></i> Cadastrar aula</h3>
<?php echo form_open('alteracao/alterar_aula/query->id_aula', array('class' => 'form-horizontal style-form', 'id' => 'form_alterar'));?>
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
                    echo "<pre>";
                    print_r($query);
                ?>

                <div class="form-group">                      
                      <label class="col-sm-2 col-sm-2 control-label">Turma<font color="#FF0202">*</font></label>
                      <div class="col-sm-4">                    
                           <select name="id_turma" id="id_turma" class="form-control" title="Selecione a turma" onclick="javascript: get_info();">
                                <option value="<?php echo set_value('id_turma'); ?>">Escolha a turma</option>
                                <?php
                                    foreach ($turma as $value) {
                                        echo "<option value='" . $value->id_turma . "'";
                                            if (set_value('id_turma', $query->id_turma) == $value->id_turma){
                                                echo " selected ";
                                            }
                                        echo ">" . $value->nm_turma. "</option>";                                    
                                    }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_turma'); ?></div>
                      </div>
                      
                      <label class="col-sm-2 col-sm-2 control-label">Horário<font color="#FF0202">*</font></label>
                      <div class="col-sm-4">                    
                           <select name="id_horario" id="id_horario" class="form-control" title="Selecione o horário que a aula acontecerá">
                                <option value="<?php echo set_value('id_horario'); ?><?php echo set_value('id_horario', $query->id_horario); ?>">Escolha o horário e dia da aula</option>
                                <?php
                                    foreach ($horario as $value) {                                        
                                        echo "<option value='" . $value->id_horario . "'";
                                            if (set_value('id_horario', $query->id_horario) == $value->id_horario){
                                                echo " selected ";
                                            }
                                        echo ">" . $value->dia_semana . "</option>";                                    
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
                                    echo "<option value='" . $value->id_arte_marcial . "'";
                                        if (set_value('id_arte_marcial', $query->id_arte_marcial) == $value->id_arte_marcial){
                                            echo " selected ";
                                        }
                                    echo ">" . $value->nm_arte_marcial. "</option>";                                    
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_arte_marcial'); ?></div>
                    </div>
                    
                    <label class="col-sm-2 col-sm-2 control-label">Data da aula<font color="#FF0202">*</font></label>
                    <div class="col-sm-4" class="form-control">
                        <input type="date" class="form-control" name="dt_aula" id="dt_aula" value="<?php echo set_value('dt_aula'); ?><?php echo set_value('dt_aula', $query->dt_aula); ?>" title="Digite a data da aula">
                        <div class="error"><?php echo form_error('dt_aula'); ?></div>
                    </div>                 
                </div>
                    
                <div class="form-group" >                
                    <label class="col-sm-2 col-sm-2 control-label">Atividade<font color="#FF0202">*</font></label>
                    <!--<font color="#00CC00"><span class="glyphicon glyphicon-plus" id="adicionar" aria-hidden="true"></span></font>-->
                    
                    <div class="col-sm-4">
                        <select MULTIPLE  SIZE=4 name="id_ta_atividade[]" class="form-control" title="Selecione uma ou mais atividades que terá a aula">
                            <option value="">Escolha a atividade</option>
                            <?php
                                foreach ($atividade as $value) {
                                    echo "<option value='" . $value->id_ta_atividade . "'";
                                        if (set_value('id_ta_atividade[]', $query->id_ta_atividade) == $value->id_ta_atividade){
                                            echo " selected ";
                                        }   
                                    echo ">" . $value->nm_atividade. "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_ta_atividade[]'); ?></div>
                    </div>                 
                       
                </div>  
               
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Observações</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="observacao" title="Digite as observações que acha importante"><?php echo set_value('observacao'); ?><?php echo set_value('observacao', $query->observacao); ?> </textarea>
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
        var today = now.getFullYear() + '-' + 0+(now.getMonth() + 1) + '-' + now.getDate()   ;
        //alert(today);
        $('#dt_aula').val(today);
        
        $( "#adicionar" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
        });
        $( "#remover" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
        });        
        
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
