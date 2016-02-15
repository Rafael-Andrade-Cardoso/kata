<h3><i class="fa fa-angle-right"></i> Alterar Turma</h3>
<?php echo form_open("alteracao/alterar_turma/$id_turma", array('class' => 'form-horizontal style-form', 'id' => 'form_alterar'));?>
<input type="hidden" name="id_turma" value="<?php echo set_value('id_turma', $id_turma); ?>" />
    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados
                    <font color="#FF0202" size="2" class="campos_obrigatorios">Campos obrigatórios*</font>
                </h4>
                <?php
                    echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('edicaook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('edicaook').'</p>';
                    }
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome da turma<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-5" class="form-control">
                        <input type="text" class="form-control" name="nm_turma" value="<?php echo set_value('nm_turma', $nm_turma); ?>">
                    </div>  
                    <div class="error"><?php echo form_error('nm_turma'); ?></div>
                </div> 
                <?php
                foreach($horarios as $key => $horario) {
                    //die(print_r($horario->dia_semana));
                ?>
                    <div id="horarios">
                        <div id="dia_semana">        
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Dia da Semana</label>
                                    <font color="#00CC00"><span class="glyphicon glyphicon-plus" onclick="duplicarCampos()" id="toggle_plus" aria-hidden="true"></span></font>
                                    <font color="#00CC00"><span class="glyphicon glyphicon-minus" id="toggle_minus" aria-hidden="true"></span></font>                                   
                                <div class="col-sm-4">
                                    <select name="dia_semana[]" class="form-control" title="Selecione um dia">
                                        <?php
                                                echo "<option value='-1'>Escolha um dia da semana</option>";
                                                echo "<option "; 
                                                    echo ($horario->dia_semana==0)?"selected":"";
                                                echo " value='0'>Domingo</option>";
                                                echo "<option "; 
                                                    echo ($horario->dia_semana==1)?"selected":"";
                                                echo " value='1'>Segunda-feira</option>";
                                                echo "<option "; 
                                                    echo ($horario->dia_semana==2)?"selected":"";
                                                echo " value='2'>Terça-feira</option>";
                                                echo "<option "; 
                                                    echo ($horario->dia_semana==3)?"selected":"";
                                                echo " value='3'>Quarta-feira</option>";
                                                echo "<option "; 
                                                    echo ($horario->dia_semana==4)?"selected":"";
                                                echo " value='4'>Quinta-feira</option>";
                                                echo "<option "; 
                                                    echo ($horario->dia_semana==5)?"selected":"";
                                                echo " value='5'>Sexta-feira</option>";
                                                echo "<option "; 
                                                    echo ($horario->dia_semana==6)?"selected":"";
                                                echo " value='6'>Sábado</option>";
                                        ?>                           
                                    </select>                                    
                                    <div class="error"><?php echo form_error($key); ?></div>
                                </div>                  
                            </div>
                                
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Horario de início</label>
                                <div class="col-sm-2" class="form-control">
                                    <input type="time" class="form-control" name="hr_inicio[]" id="hr_inicio[]" value="<?php echo set_value('hr_inicio_'.$key, $horario->hr_inicio); ?>">
                                </div>  
                                <div class="error"><?php echo form_error('hr_inicio_'.$key); ?></div>                  
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Horario de termino</label>
                                <div class="col-sm-2" class="form-control">
                                    <input type="time"  class="form-control" name="hr_termino[]" id="hr_termino[]" value="<?php echo set_value('hr_termino_'.$key, $horario->hr_termino); ?>">
                                </div>
                                <div class="error"><?php echo form_error('hr_termino_'.$key); ?></div>
                            </div>                 
                                
                        </div>
                    </div>
                <?php
                $last_key = $key;                
                }
                ?>
                <script language="text/javascipt">
                    var last_key = <?php echo $key; ?>;
                </script>                   
            </div>
        </div>
    </div>  
                
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel"> 
                
                <div class="form-group">                    
                    <label class="col-sm-2 col-sm-2 control-label">Instrutor<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-4">
                        <select name="id_instrutor" class="form-control">
                          <option value="">Escolha o instrutor</option>
                            <?php
                                foreach ($instrutor as $value) {
                                    echo "<option value='" . $value->id_instrutor . "'";
                                        if (set_value('id_instrutor', $id_instrutor) == $value->id_instrutor){
                                            echo " selected ";
                                        }
                                    echo ">" . $value->nome. " ".$value->sobrenome. "</option>";                                    
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_instrutor'); ?></div>
                    </div> 
                    
                <!--</div>               
                
                <div class="form-group">-->
                    <label class="col-sm-2 col-sm-2 control-label">Data de início<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-2" class="form-control">
                        <input type="date" class="form-control" id="dt_inicio" name="dt_inicio" value="<?php echo set_value('dt_inicio', $turma->dt_inicio); ?>">
                        <div class="error"><?php echo form_error('dt_inicio'); ?></div>
                    </div> 
                    
                                     
                   
                </div>  
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Máximo de alunos<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-2" class="form-control">                        
                        <input type="text" class="form-control" name="max_aluno" id="max_aluno" value="<?php echo set_value('max_aluno', $turma->max_aluno); ?>">                   
                        <div class="error"><?php echo form_error('max_aluno'); ?></div>
                    </div>
                   
                    <label class="col-sm-2 col-sm-2 control-label">Valor mensalidade<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-2" class="form-control">
                        <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="text" class="form-control" name="valor_mensalidade" id="valor_mensalidade" value="<?php echo set_value('valor_mensalidade', $turma->valor_mensalidade); ?>">
                                                
                        </div>
                        <div class="error"><?php echo form_error('valor_mensalidade'); ?></div>
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
   function duplicarCampos(){
        var clone = document.getElementById('dia_semana').cloneNode(true);
        var destino = document.getElementById('horarios');
        destino.appendChild (clone);
        var camposClonados = clone.getElementsByTagName('input');
        for(i=0; i<camposClonados.length;i++){
            camposClonados[i].value = '';
        }
    }
    function removerCampos(id){
        var node1 = document.getElementById('destino');
        node1.removeChild(node1.childNodes[0]);
    }

    
        <?php
        foreach($horarios as $key => $horario) {
        ?>

            $("#hr_inicio_<?=$key;?>").blur(function(){
                var inicio = document.getElementById("hr_inicio_<?=$key;?>").value;
                var termino = document.getElementById("hr_termino_<?=$key;?>").value;
                if(inicio != "" && termino !=""){            
                    if ((inicio > termino)) {
                        alert("Hora de início ("+inicio+") da aula deve ser menor que a final ("+termino+")");
                        $("#hr_inicio_<?=$key;?>").focus();
                        return false;    
                    }  
                }  
            });
            
            $("#hr_termino_<?=$key;?>").blur(function(){
                var inicio = document.getElementById("hr_inicio_<?=$key;?>").value;
                var termino = document.getElementById("hr_termino_<?=$key;?>").value;
                if(termino != ""){
                    if(inicio != ""){
                        if ((inicio > termino)) {
                            alert("Hora de início ("+inicio+") da aula deve ser menor que a final ("+termino+")");
                            $("#hr_inicio_<?=$key;?>").focus();
                            return false;    
                        }    
                    }
                }
            });
        <?php
        }
        ?>
                    
                    
        $(document).ready(function(){             
            $('#valor_mensalidade').mask("###,##", {reverse: true});
            $("#max_aluno").mask("99", {selectOnFocus: true});    
        });
        
        $( "#toggle_plus" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
        });
        $( "#toggle_plus_2" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
        });
        $( "#toggle_minus" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
        });        
        $( "#toggle_minus_2" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
        });
        
        $('document').ready(function(){
            $( "#dia_semana_2" ).fadeOut( "fast" );
            $( "#dia_semana_3" ).fadeOut( "fast" );
            
            var dia_2 = $( "#hr_inicio_2" ).val();
            if(dia_2 != ""){
                $( "#dia_semana_2" ).fadeIn( "fast" );
            }
            var dia_3 = $( "#hr_inicio_3" ).val();
            if(dia_3 != ""){
                $( "#dia_semana_3" ).fadeIn( "fast" );
            }
           //$( "#dia_semana_3" ).fadeOut( "fast" ); 
        });
        
        
       $("#max_aluno").blur(function(){
        var max_aluno = document.getElementById("max_aluno").value;
        if(max_aluno != ""){
            if ((max_aluno < 1)) {
                alert("A turma deve ter ao menos 1 aluno!");
                $("#max_aluno").focus();
                return false;    
            }  
        }  
        });

        
</script>