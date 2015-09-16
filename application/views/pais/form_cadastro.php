    <!--main content start-->
    <h3><i class="fa fa-angle-right"></i> Cadastro de País</h3><hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Credenciais de acesso</h4>
                <form action="<?=base_url('pais/cadastro');?>" method="POST" class="form-horizontal style-form">  
                
                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="nm_pais">Nome do país</label>  
                        <div class="col-md-5">
                            <input id="nm_pais" name="nm_pais" type="text" placeholder="Usuário" class="form-control" required="">
                        </div>
                    </div>
					             
                    <input type="submit" id="submit_usuario" name="submit_usuario" class="btn btn-primary" value="Cadastrar" />
                </form>
            </div><!-- form-panel --> 
        </div><!-- col-lg-12-->      	
    </div><!-- row mt --> 