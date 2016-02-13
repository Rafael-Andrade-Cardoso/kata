<h3><i class="fa fa-angle-right"></i> Alterar Turma</h3>
<?php echo form_open("alteracao/alterar_turma/$query0->id_turma", array('class' => 'form-horizontal style-form', 'id' => 'form_alterar'));?>
<input type="hidden" name="id_turma" value="<?php echo set_value('id_turma', $query0->id_turma); ?>" />
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
                    //echo '<pre>';
                    //die(print_r($query));
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome da turma<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-5" class="form-control">
                        <input type="text" class="form-control" name="nm_turma" value="<?php echo set_value('nm_turma', $query0->nm_turma); ?>">
                    </div>  
                    <div class="error"><?php echo form_error('nm_turma'); ?></div>
                </div> 
                <!-- Primeira aula -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Dia da Semana<font color="#FF0202">*</font></label></label>
                        <font color="#00CC00"><span class="glyphicon glyphicon-plus" id="toggle_plus" aria-hidden="true"></span></font>                                   
                    <div class="col-sm-4">
                        <select name="dia_semana" class="form-control" title="Selecione um dia da semana">
                            <?php
                                echo "<option value='".set_value('dia_semana', $query0->dia_semana)."'>";
                                switch($query0->dia_semana){
                                            case 0: $dia = 'Domingo'; break;
                                            case 1: $dia = 'Segunda-feira'; break;
                                            case 2: $dia = 'Terça-feira'; break;
                                            case 3: $dia = 'Quarta-feira'; break;
                                            case 4: $dia = 'Quinta-feira'; break;
                                            case 5: $dia = 'Sexta-feira'; break;
                                            case 6: $dia = 'Sábado'; break;
                                        }
                                echo $dia. "</option>";
                            ?>                             
                        </select>                        
                    <div class="error"><?php echo form_error('dia_semana'); ?></div>
                    </div>
                </div>                    
                        
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horario de início<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time" class="form-control" name="hr_inicio" id="hr_inicio" value="<?php echo set_value('hr_inicio', $query0->hr_inicio); ?>">
                    </div>  
                    <div class="error"><?php echo form_error('hr_inicio'); ?></div>                  
                </div>
                            
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Horario de termino<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-2" class="form-control">
                        <input type="time"  class="form-control" name="hr_termino" id="hr_termino" value="<?php echo set_value('hr_termino', $query0->hr_termino); ?>">
                    </div>
                    <div class="error"><?php echo form_error('hr_termino'); ?></div>
                </div>
                                          
                <!-- Segunda aula -->    
                <div id="dia_semana_2">        
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Dia da Semana</label>
                            <font color="#00CC00"><span class="glyphicon glyphicon-plus" id="toggle_plus_2" aria-hidden="true"></span></font>
                            <font color="#00CC00"><span class="glyphicon glyphicon-minus" id="toggle_minus" aria-hidden="true"></span></font>                                   
                        <div class="col-sm-4">
                            <select name="dia_semana_2" class="form-control" title="Selecione um tipo sanguíneo">
                                <?php
                                    if(isset($query1)){
                                        echo "<option value='".set_value('dia_semana', $query1->dia_semana)."'>";
                                        switch($query1->dia_semana){
                                                    case 0: $dia = 'Domingo'; break;
                                                    case 1: $dia = 'Segunda-feira'; break;
                                                    case 2: $dia = 'Terça-feira'; break;
                                                    case 3: $dia = 'Quarta-feira'; break;
                                                    case 4: $dia = 'Quinta-feira'; break;
                                                    case 5: $dia = 'Sexta-feira'; break;
                                                    case 6: $dia = 'Sábado'; break;
                                                }
                                        echo $dia. "</option>";
                                    }else{
                                        echo "<option value=''>Escolha um dia da semana</option>";
                                        echo "<option value='0'>Domingo</option>";
                                        echo "<option value='1'>Segunda-feira</option>";
                                        echo "<option value='2'>Terça-feira</option>";
                                        echo "<option value='3'>Quarta-feira</option>";
                                        echo "<option value='4'>Quinta-feira</option>";
                                        echo "<option value='5'>Sexta-feira</option>";
                                        echo "<option value='6'>Sábado</option>  ";
                                    }
                                ?>                           
                            </select>                                    
                            <div class="error"><?php echo form_error('dia_semana_2'); ?></div>
                        </div>                  
                    </div>
                        
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Horario de início</label>
                        <div class="col-sm-2" class="form-control">
                            <input type="time" class="form-control" name="hr_inicio_2" id="hr_inicio_2" value="<?php echo set_value('hr_inicio_2', $query1->hr_inicio); ?>">
                        </div>  
                        <div class="error"><?php echo form_error('hr_inicio_2'); ?></div>                  
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Horario de termino</label>
                        <div class="col-sm-2" class="form-control">
                            <input type="time"  class="form-control" name="hr_termino_2" id="hr_termino_2" value="<?php echo set_value('hr_termino_2', $query1->hr_termino); ?>">
                        </div>
                        <div class="error"><?php echo form_error('hr_termino_2'); ?></div>
                    </div>                 
                        
                </div>
                <!-- Terceira aula -->    
                <div id="dia_semana_3">        
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Dia da Semana</label>
                            <font color="#00CC00"><span class="glyphicon glyphicon-minus" id="toggle_minus_2" aria-hidden="true"></span></font>                                   
                        <div class="col-sm-4">
                            <select name="dia_semana_3" class="form-control" title="Selecione um tipo sanguíneo">
                                <?php
                                    if(isset($query2)){
                                        echo "<option value='".set_value('dia_semana_3', $query2->dia_semana)."'>";
                                        switch($query2->dia_semana){
                                                    case 0: $dia = 'Domingo'; break;
                                                    case 1: $dia = 'Segunda-feira'; break;
                                                    case 2: $dia = 'Terça-feira'; break;
                                                    case 3: $dia = 'Quarta-feira'; break;
                                                    case 4: $dia = 'Quinta-feira'; break;
                                                    case 5: $dia = 'Sexta-feira'; break;
                                                    case 6: $dia = 'Sábado'; break;
                                                }
                                        echo $dia. "</option>";
                                    }else{
                                        echo "<option value=''>Escolha um dia da semana</option>";
                                        echo "<option value='0'>Domingo</option>";
                                        echo "<option value='1'>Segunda-feira</option>";
                                        echo "<option value='2'>Terça-feira</option>";
                                        echo "<option value='3'>Quarta-feira</option>";
                                        echo "<option value='4'>Quinta-feira</option>";
                                        echo "<option value='5'>Sexta-feira</option>";
                                        echo "<option value='6'>Sábado</option>  ";
                                    }
                                ?>                            
                            </select>                                    
                            <div class="error"><?php echo form_error('dia_semana_3'); ?></div>
                        </div>                  
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Horario de início</label>
                        <div class="col-sm-2" class="form-control">
                            <input type="time" class="form-control" name="hr_inicio_3" id="hr_inicio_3" value="<?php echo set_value('hr_inicio_3', $query2->hr_inicio); ?>">
                        </div>  
                        <div class="error"><?php echo form_error('hr_inicio_3'); ?></div>                  
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Horario de termino</label>
                        <div class="col-sm-2" class="form-control">
                            <input type="time"  class="form-control" name="hr_termino_3" id="hr_termino_3" value="<?php echo set_value('hr_termino_3', $query2->hr_termino); ?>">
                        </div>
                        <div class="error"><?php echo form_error('hr_termino_3'); ?></div>
                    </div> 
                </div>
            </div>
        </div>
    </div>  
                
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel"> 
                
                <div class="form-group">
                    <!--<label class="col-sm-2 col-sm-2 control-label">Arte marcial<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-4">
                        <select name="id_arte_marcial" class="form-control">
                            <option value="">Escolha o estilo</option>
                            <?php
                                foreach ($arte_marcial as $value) {
                                    echo "<option value='" . $value->id_arte_marcial . "'";
                                        if (set_value('id_instrutor', $query0->id_arte_marcial) == $value->id_arte_marcial){
                                            echo " selected ";
                                        }
                                    echo ">" . $value->nm_arte_marcial. "</option>";                                    
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_arte_marcial'); ?></div>
                    </div> -->
                    
                    <label class="col-sm-2 col-sm-2 control-label">Instrutor<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-4">
                        <select name="id_instrutor" class="form-control">
                          <option value="">Escolha o instrutor</option>
                            <?php
                                foreach ($instrutor as $value) {
                                    echo "<option value='" . $value->id_instrutor . "'";
                                        if (set_value('id_instrutor', $query0->id_instrutor) == $value->id_instrutor){
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
                        <input type="date" class="form-control" id="dt_inicio" name="dt_inicio" value="<?php echo set_value('dt_inicio', $query0->dt_inicio); ?>">
                        <div class="error"><?php echo form_error('dt_inicio'); ?></div>
                    </div> 
                    
                                     
                   
                </div>  
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Máximo de alunos<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-2" class="form-control">                        
                        <input type="text" class="form-control" name="max_aluno" id="max_aluno" value="<?php echo set_value('max_aluno', $query0->max_aluno); ?>">                   
                        <div class="error"><?php echo form_error('max_aluno'); ?></div>
                    </div>
                   
                    <label class="col-sm-2 col-sm-2 control-label">Valor mensalidade<font color="#FF0202">*</font></label></label>
                    <div class="col-sm-2" class="form-control">
                        <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="text" class="form-control" name="valor_mensalidade" id="valor_mensalidade" value="<?php echo set_value('valor_mensalidade', $query0->valor_mensalidade); ?>">
                                                
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
        
        $( "#toggle_plus" ).click(function() {
            $( "#dia_semana_2" ).fadeIn( "slow", "linear" );
        });
        $( "#toggle_plus_2" ).click(function() {
            $( "#dia_semana_3" ).fadeIn( "slow", "linear" );
        });
        $( "#toggle_minus" ).click(function() {
            $( "#dia_semana_2" ).fadeOut( "slow", "linear" );
        });
        $( "#toggle_minus_2" ).click(function() {
            $( "#dia_semana_3" ).fadeOut( "slow", "linear" );
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
        
        $("#hr_inicio_2").blur(function(){
            var data_1 = document.getElementById("hr_inicio_2").value;
            var data_2 = document.getElementById("hr_termino_2").value;
            if(data_1 != "" && data_2 !=""){            
                if ((data_1 > data_2)) {
                    alert("Hora de início da aula deve ser menor que a final");
                    $("#hr_inicio_2").focus();
                    return false;    
                }  
            }  
        });
        
        $("#hr_termino_2").blur(function(){
            var data_1 = document.getElementById("hr_inicio_2").value;
            var data_2 = document.getElementById("hr_termino_2").value;
            if(data_2 != ""){
                if(data_1 != ""){
                    if ((data_1 > data_2)) {
                        alert("Hora de início da aula deve ser menor que a final");
                        $("#hr_inicio_2").focus();
                        return false;    
                    }    
                }
            }
        });
        
        $("#hr_inicio_3").blur(function(){
            var data_1 = document.getElementById("hr_inicio_3").value;
            var data_2 = document.getElementById("hr_termino_3").value;
            if(data_1 != "" && data_2 !=""){            
                if ((data_1 > data_2)) {
                    alert("Hora de início da aula deve ser menor que a final");
                    $("#hr_inicio_3").focus();
                    return false;    
                }  
            }  
        });
        
        $("#hr_termino_3").blur(function(){
            var data_1 = document.getElementById("hr_inicio_3").value;
            var data_2 = document.getElementById("hr_termino_3").value;
            if(data_2 != ""){
                if(data_1 != ""){
                    if ((data_1 > data_2)) {
                        alert("Hora de início da aula deve ser menor que a final");
                        $("#hr_inicio_3").focus();
                        return false;    
                    }    
                }
            }
        });
        
        $('#dt_inicio').blur(function(){
            var dt = document.getElementById("dt_inicio").value;
            //alert(dt);
            var myDate = new Date();
            var displayDate = myDate.getFullYear()+1 + '-' + (myDate.getMonth()+1) + '-' + (myDate.getDate()) ; 
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