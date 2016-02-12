<h3><i class="fa fa-angle-right"></i> Cadastrar exame</h3>
<?php echo form_open('cadastro/insert_exame', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>

    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados</h4>
                <?php
                    echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                    }
                ?>

                   <!--
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
                -->
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Turma<span class="obrigatorio"> *</span></label>
                    <div class="col-sm-10">
                        <select name="id_turma" id="id_turma" class="form-control">
                            <option value="">Escolha a turma</option>
                            <?php
                                foreach ($turma as $value) {
                                    echo "<option value='" . $value->id_turma . "'>" . $value->nm_turma. "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_arte_marcial'); ?></div>
                    </div>
                </div>
                
                <div class="form-group">                    
                    <label class="col-sm-2 col-sm-2 control-label">Alunos<span class="obrigatorio"> *</span></label>
                    <div class="col-sm-12" id="alunos_exame">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data do exame<span class="obrigatorio"> *</span></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="dt_exame" value="<?php echo set_value('dt_exame'); ?>" />
                        <div class="error"><?php echo form_error('dt_exame'); ?></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Valor do exame<span class="obrigatorio"> *</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="valor" id="valor" value="<?php echo set_value('valor'); ?>" />
                        <div class="error"><?php echo form_error('valor'); ?></div>
                    </div>
                </div>
                       <!--
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Valor</label>
                    <div class="col-sm-3">
                        <input type="text" id="valor" class="form-control" name="valor" value="<?php echo set_value('valor'); ?>" />
                        <div class="error"><?php echo form_error('valor'); ?></div>
                    </div>
                </div>
                -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Local<span class="obrigatorio"> *</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="local"><?php echo set_value('local'); ?> </textarea>
                        <div class="error"><?php echo form_error('local'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Observações</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="descricao" ><?php echo set_value('descricao'); ?> </textarea>
                        <div class="error"><?php echo form_error('descricao'); ?></div>
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

<script>
    function iniciaAjax() { 
        var req; 
        
        try {req = new ActiveXObject("Microsoft.XMLHTTP");} 
        catch(e){ 
            try {req = new ActiveXObject("Msxml2.XMLHTTP");} 
            catch(ex){	
                try {req = new XMLHttpRequest();} 
                catch(exc) { 
                    alert("Esse browser não tem recursos para uso do Ajax!"); 
                    req = null; 
                } 
            } 
        } 
        return req; 
    } 
    
    $("#id_turma").change(function() {
        valIni = document.getElementById("id_turma").value; 
        ajax = iniciaAjax(); 
        if(ajax) { 
            document.getElementById("alunos_exame").innerHTML = "<label class='alunos_exame'>Carregando...</label>";
            ajax.open("GET", "alunos_turma/" + valIni, true); 
            ajax.onreadystatechange = function() { 
                if(ajax.readyState == 4) { 
                    if(ajax.status == 200) { 
                        var xx = ajax.responseText; 
                        document.getElementById("alunos_exame").innerHTML = xx;     
                    } else { 
                        alert(ajax.statusText); 
                    } 
                }  
            }
        ajax.send(null); 
        } else { 
            alert("O Ajax nao funcionou corretamente"); 
        } 
    });
    
    $(document).ready(function(){
        $('#valor').mask("####,##", {reverse: true});   
    });
</script>
