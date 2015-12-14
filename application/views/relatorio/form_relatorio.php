<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
<h3><i class="fa fa-angle-right"></i> Relatórios</h3>
    
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o relatório que deseja imprimir!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <font color="#FF0202" size="2">Dados obrigatórios*</font></h4>
                        <form action=" <?=base_url('index.php/relatorio_pdf/gerar_pdf'); ?>"   class="form-horizontal style-form" method="post" onsubmit="verificaDatas(dt_inicio, dt_fim)">
                            <div class="col-sm-12">
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de alunos matriculados."> Relatório de alunos matriculados.
                                </label><br />
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de alunos por instrutor."> Relatório de alunos por instrutor.
                                </label><br />
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de instrutores."> Relatório de instrutores.
                                </label><br />                                
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de turmas."> Relatório de turmas.
                                </label><br />      
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de aulas por instrutor."> Relatório de aulas por instrutor.
                                </label><br /> 
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de alunos por graduação."> Relatório de alunos por graduação.
                                </label><br />  
                                <div class="error"><?php echo form_error('relatorio'); ?></div>                                                
                             </div>
                             
                             <div class="form-group"></div>   
                             
                             <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o período que deseja imprimir!</h4>
                             
                             <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data inicio<font color="#FF0202">*</font></label>
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_inicio" class="form-control" name="dt_inicio">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_inicio'); ?></div>
                            </div> 
                            <div class="form-group">      
                                <label class="col-sm-2 col-sm-2 control-label">Data Fim<font color="#FF0202">*</font></label>
                                    <div class="col-sm-3">
                                        <input type="date" id="dt_fim" class="form-control" name="dt_fim">
                                    </div>
                                    <div class="error"><?php echo form_error('dt_fim'); ?></div>
                            </div>
                        <button type="submit" id="botao" class="btn btn-theme">Gerar pdf</button>   
                    </div> <!-- form-panel -->
                                     
          		</div><!-- col-lg-8-->      	
          	</div><!-- /row -->           

<script type="text/javascript">

    $("#dt_fim").blur(function(){
        var data_1 = document.getElementById("dt_inicio").value;
        var data_2 = document.getElementById("dt_fim").value;
        if ((data_1 > data_2)) {
            alert("Data final deve ser maior que a inicial!");
            $("#dt_inicio").focus();
            return false;    
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
</script>