    <!--main content start-->
    <h3><i class="fa fa-angle-right"></i> Cadastro de Usuário</h3><hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Credenciais de acesso</h4>
                <form action="<?=base_url('usuario/cadastro');?>" method="POST" class="form-horizontal style-form">  
                
                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="login">Usuário</label>  
                        <div class="col-md-5">
                            <input id="login" name="login" type="text" placeholder="Usuário" class="form-control" required="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="senha">Senha</label>
                        <div class="col-md-5">
                            <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 control-label" for="confirma_senha">Senha novamente</label>
                        <div class="col-md-5">
                            <input id="confirma_senha" name="confirma_senha" type="password" placeholder="Senha novamente" class="form-control input-md" required="">
                        </div>
                    </div>                    
                    <input type="submit" id="submit_usuario" name="submit_usuario" class="btn btn-primary" value="Cadastrar" />
                </form>
            </div><!-- form-panel --> 
        </div><!-- col-lg-12-->      	
    </div><!-- row mt --> 