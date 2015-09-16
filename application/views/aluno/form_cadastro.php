<h3><i class="fa fa-angle-right"></i> Cadastrar Aluno</h3>
<?php echo form_open('aluno/inserir', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro')); ?>
    <input type="hidden" name="dt_matricula" value="<?php echo date("Y-m-d");  ?>" />
    <!-- ALUNO -->
    <div class="row mt">
    		<div class="col-lg-12">
            <div class="form-panel">
            	  <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pessoais</h4>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" value="<?php echo set_value('nome'); ?>" />
                        <div class="error"><?php echo form_error('nome'); ?></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-sm-4 col-sm-4 control-label">CPF</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cpf" value="<?php echo set_value('cpf'); ?>" />
                            <div class="error"><?php echo form_error('cpf'); ?></div>
                            <span class="help-block">Informe apenas os números.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-sm-4 col-sm-4 control-label">RG</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="rg" value="<?php echo set_value('rg'); ?>" />
                            <div class="error"><?php echo form_error('rg'); ?></div>
                            <span class="help-block">Informe apenas os números.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data de nascimento</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="dt_nascimento" value="<?php echo set_value('dt_nascimento'); ?>" />
                        <div class="error"><?php echo form_error('dt_nascimento'); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Peso</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="peso" value="<?php echo set_value('peso'); ?>" />
                        <div class="error"><?php echo form_error('peso'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Altura</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="altura" value="<?php echo set_value('altura'); ?>" />
                        <div class="error"><?php echo form_error('altura'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados dos responsáveis</h4>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome da mãe</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomemae" value="<?php echo set_value('nomemae'); ?>" />
                        <div class="error"><?php echo form_error('nomemae'); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome do pai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomepai" value="<?php echo set_value('nomepai'); ?>" />
                        <div class="error"><?php echo form_error('nomepai'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Responsável</label>
                    <div class="col-sm-4">
                        <select name="id_responsavel" class="form-control">
                          <option value="<?php echo set_value('id_responsavel'); ?>">Escolha uma pessoal</option>
                        </select>
                        <div class="error"><?php echo form_error('id_responsavel'); ?></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            	  <h4 class="mb"><i class="fa fa-angle-right"></i> Endereço</h4>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Altura</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" name="altura" value="<?php echo set_value('altura'); ?>" />
                          <div class="error"><?php echo form_error('altura'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Altura</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" name="altura" value="<?php echo set_value('altura'); ?>" />
                          <div class="error"><?php echo form_error('altura'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">País</label>
                      <div class="col-sm-10">
                          <select name="id_pais" class="form-control">
                            <option value="<?php echo set_value('id_pais'); ?>">Escolha uma pessoal</option>
                          </select>
                          <div class="error"><?php echo form_error('id_pais'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                      <div class="col-sm-10">
                          <select name="id_estado" class="form-control">
                            <option value="<?php echo set_value('id_estado'); ?>">Escolha uma pessoal</option>
                          </select>
                          <div class="error"><?php echo form_error('id_estado'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Cidade</label>
                      <div class="col-sm-10">
                          <select name="id_estado" class="form-control">
                            <option value="<?php echo set_value('id_estado'); ?>">Escolha uma pessoal</option>
                          </select>
                          <div class="error"><?php echo form_error('id_estado'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Cidade</label>
                      <div class="col-sm-10">
                          <select name="id_cidade" class="form-control">
                            <option value="<?php echo set_value('id_cidade'); ?>">Escolha uma pessoal</option>
                          </select>
                          <div class="error"><?php echo form_error('id_cidade'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Logradouro</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="logradouro" value="<?php echo set_value('logradouro'); ?>" />
                          <div class="error"><?php echo form_error('logradouro'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Número</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="numero" value="<?php echo set_value('numero'); ?>" />
                          <div class="error"><?php echo form_error('numero'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">CEP</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="cep" value="<?php echo set_value('cep'); ?>" />
                          <div class="error"><?php echo form_error('cep'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Complemento</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="complemento" value="<?php echo set_value('complemento'); ?>" > </textarea>
                          <div class="error"><?php echo form_error('complemento'); ?></div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Tipo</label>
                      <div class="col-sm-10">
                          <select name="id_ta_tipo_telefone" class="form-control">
                            <option value="<?php echo set_value('id_ta_tipo_telefone'); ?>">Escolha o tipo</option>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_tipo_telefone'); ?></div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">E-mail</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" />
                          <div class="error"><?php echo form_error('email'); ?></div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">DDD + Telefone</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="telefone" value="<?php echo set_value('telefone'); ?>" />
                          <div class="error"><?php echo form_error('telefone'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Sobrenome</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="sobrenome" value="<?php echo set_value('sobrenome'); ?>" />
                          <div class="error"><?php echo form_error('sobrenome'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Tipo sanguíneo</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="tipo_sanguineo" value="<?php echo set_value('tipo_sanguineo'); ?>" />
                          <div class="error"><?php echo form_error('tipo_sanguineo'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Sexo</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="sexo" value="<?php echo set_value('sexo'); ?>" />
                          <div class="error"><?php echo form_error('sexo'); ?></div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Tipo de documento</label>
                      <div class="col-sm-10">
                          <select name="id_ta_tipo_documento" class="form-control">
                            <option value="<?php echo set_value('id_ta_tipo_documento'); ?>">Escolha o tipo</option>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_tipo_documento'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Número do documento</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="valor_documento" value="<?php echo set_value('valor_documento'); ?>" />
                          <div class="error"><?php echo form_error('valor_documento'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Melhor data para Vencimento</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="dia_vencimento" value="<?php echo set_value('dia_vencimento'); ?>" />
                          <div class="error"><?php echo form_error('dia_vencimento'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Valor da mensalidade</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="valor_mensalidade" value="<?php echo set_value('valor_mensalidade'); ?>" />
                          <div class="error"><?php echo form_error('valor_mensalidade'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Observações sobre o(a) aluno(a)</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="observacao" value="<?php echo set_value('observacao'); ?>" > </textarea>
                          <div class="error"><?php echo form_error('observacao'); ?></div>
                      </div>
                  </div>
                  <button class="btn btn-lg btn-primary" >Cadastrar</button>
    			    </div><!-- /form-panel -->
    		  </div><!-- /col-lg-12 -->
    	</div><!-- /row -->
<?php echo form_close(); ?>

<script type="text/javascript">
    $(function() {
        $("#form_cadastro").submit(function(evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();
            $.post(url, postData, function(o) {

            }, 'json ');
        });
    });
</script>
