<h3><i class="fa fa-angle-right"></i> Relatório</h3>
    
          	<div class="row mt">
          		<div class="col-lg-8">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Selecione o relatório que deseja imprimir!</h4>
                        <form action=" <?=base_url('index.php/relatorio_pdf/gerar_pdf'); ?>"   class="form-horizontal style-form" method="post">
                            <div class="col-sm-10">
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de alunos matriculados."> Relatório de alunos matriculados.
                                </label><br />
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de alunos por faixa."> Relatório de alunos por faixa.
                                </label><br />
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de instrutores."> Relatório de instrutores.
                                </label><br />
                                <label>
                                    <input type="radio" name="relatorio" value="Relatório de valores recebidos."> Relatório de valores recebidos.
                                </label><br />                                
                             </div>
                             <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Data inicio</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="dt_inicio">
                                    </div>
                                <label class="col-sm-2 col-sm-2 control-label">Data Fim</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="dt_fim">
                                    </div>
                             </div>
                    </div> <!-- form-panel -->
                    <button type="submit" class="btn btn-theme">Gerar pdf</button>                    
          		</div><!-- col-lg-8-->      	
          	</div><!-- /row -->