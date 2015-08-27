    <!--main content start-->
    <h3><i class="fa fa-angle-right"></i> Cadastro de Usuário</h3><hr />
<div class="row">
    <div class="col-md-6">
        <form action="<?=site_url('usuario/cadastro');?>" method="POST" class="form-horizontal">  
            
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="login">Usuário</label>  
                <div class="col-md-5 controls">
                    <input id="login" name="login" type="text" placeholder="Usuário" class="form-control input-md" required="">
                </div>
            </div>
            
            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="senha">Senha</label>
                <div class="col-md-5 controls">
                    <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control input-md" required="">
                </div>
            </div>
            
            <!-- Confirmar senha-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="confirma_senha">Senha Novamente</label>
                <div class="col-md-5 controls">
                    <input id="confirma_senha" name="confirma_senha" type="password" placeholder="Senha novamente" class="form-control input-md" required="">
                </div>
            </div>
            
            <!-- Button -->
            <input type="submit" id="submit_usuario" name="submit_usuario" class="btn btn-primary" value="Cadastrar" />
        </form>
    </div>
</div>