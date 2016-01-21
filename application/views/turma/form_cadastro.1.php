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
                    <label class="col-sm-2 col-sm-2 control-label">Nome da turma</label>
                    <div class="col-sm-4" class="form-control">                        
                        <input type="text" class="form-control" name="nm_turma">                   
                        <div class="error"><?php echo form_error('nm_turma'); ?></div>
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
                        <div class="error"><?php echo form_error('valor_mensalidade'); ?></div>                        
                    </div>        
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horário<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <select name="id_horario" class="form-control">
                            <option value="">Escolha o horário</option>
                            <?php
                                foreach ($horario->result() as $value) {
                                   echo "<option value='" . $value->id_horario . "'>" .  $value->nome . " " . $value->sobrenome . "". 
                                   $value->hr_inicio. "". $value->hr_termino . "" . $value->dia_semana. "</option>";                                   
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_horario'); ?></div>
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
    
    $(document).ready(function(){             
            $('#valor_mensalidade').mask("###,##", {reverse: true});
            $("#max_aluno").mask("99", {selectOnFocus: true});    
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
    
    $('#dt_inicio').blur(function(){
                var dt = document.getElementById("dt_inicio").value;
                //alert(dt);
                var myDate = new Date();
                var displayDate = myDate.getFullYear()+2 + '-' + (myDate.getMonth()+1) + '-' + (myDate.getDate()) ; 
                var displayDate2 = myDate.getFullYear()-1 + '-' + (myDate.getMonth()+1) + '-' + (myDate.getDate()) ;
                //alert(displayDate);
                if(dt != ""){
                    if(dt >= displayDate || dt < displayDate2){
                        alert('Data da aula incorreta!');
                        $("#dt_inicio").focus();
                    }
                }
    });    
</script>