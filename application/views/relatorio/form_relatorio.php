<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
<h3><i class="fa fa-angle-right"></i> Relatórios</h3>
<?php echo form_open('relatorio_pdf/gerar_pdf', array('class' => 'form-horizontal style-form', 'id' => 'form_relatorio')); ?>
    
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o relatório que deseja imprimir
                            <font color="#FF0202" size="2" class="campos_obrigatorios">Campos obrigatórios*</font>
                        </h4>
                        
                            <div >
                                <label>
                                    <input type="radio" id="1" name="relatorio" value="Relatório de alunos matriculados."> Relatório de alunos matriculados.
                                </label><br />
                                <label>
                                    <input type="radio" id="2" name="relatorio" value="Relatório de alunos por instrutor."> Relatório de alunos por instrutor.
                                </label><br />
                                <label>
                                    <input type="radio" id="3" name="relatorio" value="Relatório de instrutores."> Relatório de instrutores.
                                </label><br />                                
                                <label>
                                    <input type="radio" id="4" name="relatorio" value="Relatório de turmas."> Relatório de turmas.
                                </label><br />      
                                <label>
                                    <input type="radio" id="5" name="relatorio" value="Relatório de aulas por instrutor."> Relatório de aulas por instrutor.
                                </label><br /> 
                                <label>
                                    <input type="radio" id="6" name="relatorio" value="Relatório de alunos por graduação."> Relatório de alunos por graduação.
                                </label><br />  
                                <div class="error"><?php echo form_error('relatorio'); ?></div>                                                
                            </div>                                                    
                           
                    </div> <!-- form-panel -->                                     
          		</div><!-- col-lg-8-->      	
          	</div><!-- /row -->
              
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel" id="periodo1">                       
                        <div>                        
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o período que deseja imprimir! </h4>               
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data de início das matriculas<font color="#FF0202">*</font></label>                                        
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_inicio" class="form-control" name="dt_inicio">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_inicio'); ?></div>                                        
                            </div>
                            
                            <div class="form-group">      
                                <label class="col-sm-2 col-sm-2 control-label">Data fim das mastriculas<font color="#FF0202">*</font></label>
                                <div class="col-sm-3">
                                    <input type="date" id="dt_fim" class="form-control" name="dt_fim">
                                </div>
                                <div class="error"><?php echo form_error('dt_fim'); ?></div>
                            </div>
                        </div>
                    <button type="submit" id="botao" class="btn btn-theme">Gerar pdf</button>    
                    </div> <!-- form-panel --> 
                    
                    <div class="form-panel" id="periodo2" >                       
                        <div>                        
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o período que deseja imprimir! </h4>               
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data de início dos alunos matriculados<font color="#FF0202">*</font></label>                                        
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_inicio_2" class="form-control" name="dt_inicio_2">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_inicio_2'); ?></div> 
                                    
                                <label class="col-sm-2 col-sm-2 control-label">Nome do instrutor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nome_instrutor">
                                    </div>
                            </div>
                            
                            <div class="form-group">      
                                <label class="col-sm-2 col-sm-2 control-label">Data fim dos alunos mastriculados<font color="#FF0202">*</font></label>
                                <div class="col-sm-3">
                                    <input type="date" id="dt_fim_2" class="form-control" name="dt_fim_2">
                                </div>
                                <div class="error"><?php echo form_error('dt_fim_2'); ?></div>
                            </div>
                        </div>
                    <button type="submit" id="botao" class="btn btn-theme">Gerar pdf</button>    
                    </div> <!-- form-panel -->
                    
                    <div class="form-panel" id="periodo3" >                       
                        <div>                        
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o período que deseja imprimir! </h4>               
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data de início dos instrutores cadastrados<font color="#FF0202">*</font></label>                                        
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_inicio_3" class="form-control" name="dt_inicio_3">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_inicio_3'); ?></div>                                        
                            </div>
                            
                            <div class="form-group">      
                                <label class="col-sm-2 col-sm-2 control-label">Data final dos instrutores cadastrados<font color="#FF0202">*</font></label>
                                <div class="col-sm-3">
                                    <input type="date" id="dt_fim_3" class="form-control" name="dt_fim_3">
                                </div>
                                <div class="error"><?php echo form_error('dt_fim_3'); ?></div>
                            </div>
                        </div>
                    <button type="submit" id="botao" class="btn btn-theme">Gerar pdf</button>    
                    </div> <!-- form-panel -->
                    
                    <div class="form-panel" id="periodo4" >                       
                        <div>                        
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o período que deseja imprimir! </h4>               
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data de início das turmas<font color="#FF0202">*</font></label>                                        
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_inicio_4" class="form-control" name="dt_inicio_4">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_inicio_4'); ?></div>                                        
                            </div>
                            
                            <div class="form-group">      
                                <label class="col-sm-2 col-sm-2 control-label">Data final das turmas<font color="#FF0202">*</font></label>
                                <div class="col-sm-3">
                                    <input type="date" id="dt_fim_4" class="form-control" name="dt_fim_4">
                                </div>
                                <div class="error"><?php echo form_error('dt_fim_4'); ?></div>
                            </div>
                        </div>
                    <button type="submit" id="botao" class="btn btn-theme">Gerar pdf</button>    
                    </div> <!-- form-panel -->
                    
                    <div class="form-panel" id="periodo5" >                       
                        <div>                        
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o período que deseja imprimir! </h4>               
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data de início das aulas<font color="#FF0202">*</font></label>                                        
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_inicio_5" class="form-control" name="dt_inicio_5">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_inicio_5'); ?></div>                                        
                            </div>
                            
                            <div class="form-group">      
                                <label class="col-sm-2 col-sm-2 control-label">Data final das aulas<font color="#FF0202">*</font></label>
                                <div class="col-sm-3">
                                    <input type="date" id="dt_fim_5" class="form-control" name="dt_fim_5">
                                </div>
                                <div class="error"><?php echo form_error('dt_fim_5'); ?></div>
                            </div>
                        </div>
                    <button type="submit" id="botao" class="btn btn-theme">Gerar pdf</button>    
                    </div> <!-- form-panel -->
                    
                    <div class="form-panel" id="periodo6" >                       
                        <div>                        
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o período que deseja imprimir! </h4>               
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data inícial das matriculas<font color="#FF0202">*</font></label>                                        
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_inicio_6" class="form-control" name="dt_inicio_6">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_inicio_6'); ?></div>                                        
                            </div>
                            
                            <div class="form-group">      
                                <label class="col-sm-2 col-sm-2 control-label">Data final das mastriculas<font color="#FF0202">*</font></label>
                                <div class="col-sm-3">
                                    <input type="date" id="dt_fim_6" class="form-control" name="dt_fim_6">
                                </div>
                                <div class="error"><?php echo form_error('dt_fim_6'); ?></div>
                            </div>
                        </div>
                    <button type="submit" id="botao" class="btn btn-theme">Gerar pdf</button>    
                    </div> <!-- form-panel -->                 
                                                        
          		</div><!-- col-lg-8-->      	
            </div><!-- /row -->

<script type="text/javascript">

    $("#dt_fim").blur(function(){
        if(document.getElementById("dt_inicio").value != "")
            var data_1 = document.getElementById("dt_inicio").value;            
        else if(document.getElementById("dt_inicio_2").value != '')
            var data_1 = document.getElementById("dt_inicio_2").value;            
        else if(document.getElementById("dt_inicio_3").value != '')
            var data_1 = document.getElementById("dt_inicio_3").value;            
        else if(document.getElementById("dt_inicio_4").value != '')
            var data_1 = document.getElementById("dt_inicio_4").value;            
        else if(document.getElementById("dt_inicio_5").value != '')
            var data_1 = document.getElementById("dt_inicio_5").value;            
        else if(document.getElementById("dt_inicio_6").value != '')
            var data_1 = document.getElementById("dt_inicio_6").value;
            
        if(document.getElementById("dt_fim").value != "")   
            var data_2 = document.getElementById("dt_fim").value;
        else if(document.getElementById("dt_fim_2").value != "")   
            var data_2 = document.getElementById("dt_fim_2").value;
        else if(document.getElementById("dt_fim_3").value != "")   
            var data_2 = document.getElementById("dt_fim_3").value;
        else if(document.getElementById("dt_fim_4").value != "")   
            var data_2 = document.getElementById("dt_fim_4").value;
        else if(document.getElementById("dt_fim_5").value != "")   
            var data_2 = document.getElementById("dt_fim_5").value;
        else if(document.getElementById("dt_fim_6").value != "")   
            var data_2 = document.getElementById("dt_fim_6").value;        
        
        if(data_1 != ""){
            if ((data_1 > data_2)) {
                alert("Data final deve ser maior que a inicial!");
                $("#dt_inicio").focus();
                return false;    
            }    
        }
    });
    
    $("#dt_inicio").blur(function(){
        var data_1 = document.getElementById("dt_inicio").value;
        var data_2 = document.getElementById("dt_fim").value;
        if(data_2 != ""){
            if ((data_1 > data_2)) {
                alert("Data final deve ser maior que a inicial!");
                $("#dt_inicio").focus();
                return false;    
            }    
        }
    });
    
    $( "#toggle" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
    });

    $('document').ready(function(){
        $( "#periodo1" ).fadeOut( "fast" );
        $( "#periodo2" ).fadeOut( "fast" );
        $( "#periodo3" ).fadeOut( "fast" );
        $( "#periodo4" ).fadeOut( "fast" );
        $( "#periodo5" ).fadeOut( "fast" );
        $( "#periodo6" ).fadeOut( "fast" ); 
    });
        
    $( "#1" ).click(function() {
        $( "#periodo1" ).fadeIn( "slow", "linear" );
        $( "#periodo2" ).fadeOut( "fast" );
        $( "#periodo3" ).fadeOut( "fast" );
        $( "#periodo4" ).fadeOut( "fast" );
        $( "#periodo5" ).fadeOut( "fast" );
        $( "#periodo6" ).fadeOut( "fast" );
    });
    $( "#2" ).click(function() {
        $( "#periodo2" ).fadeIn( "slow", "linear" );
        $( "#periodo1" ).fadeOut( "fast" );
        $( "#periodo3" ).fadeOut( "fast" );
        $( "#periodo4" ).fadeOut( "fast" );
        $( "#periodo5" ).fadeOut( "fast" );
        $( "#periodo6" ).fadeOut( "fast" );
    });
    $( "#3" ).click(function() {
        $( "#periodo3" ).fadeIn( "slow", "linear" );
        $( "#periodo2" ).fadeOut( "fast" );
        $( "#periodo1" ).fadeOut( "fast" );
        $( "#periodo4" ).fadeOut( "fast" );
        $( "#periodo5" ).fadeOut( "fast" );
        $( "#periodo6" ).fadeOut( "fast" );
    });
    $( "#4" ).click(function() {
        $( "#periodo4" ).fadeIn( "slow", "linear" );
        $( "#periodo2" ).fadeOut( "fast" );
        $( "#periodo3" ).fadeOut( "fast" );
        $( "#periodo1" ).fadeOut( "fast" );
        $( "#periodo5" ).fadeOut( "fast" );
        $( "#periodo6" ).fadeOut( "fast" );
    });
    $( "#5" ).click(function() {
        $( "#periodo5" ).fadeIn( "slow", "linear" );
        $( "#periodo2" ).fadeOut( "fast" );
        $( "#periodo3" ).fadeOut( "fast" );
        $( "#periodo4" ).fadeOut( "fast" );
        $( "#periodo1" ).fadeOut( "fast" );
        $( "#periodo6" ).fadeOut( "fast" );
    });
    $( "#6" ).click(function() {
        $( "#periodo6" ).fadeIn( "slow", "linear" );
        $( "#periodo2" ).fadeOut( "fast" );
        $( "#periodo3" ).fadeOut( "fast" );
        $( "#periodo4" ).fadeOut( "fast" );
        $( "#periodo5" ).fadeOut( "fast" );
        $( "#periodo1" ).fadeOut( "fast" );
    });
    
</script>