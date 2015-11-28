<h3><i class="fa fa-angle-right"></i> Cadastrar aluno</h3>

<?php echo form_open('cadastro/insert_aluno', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro')); ?>
    <input type="hidden" name="dt_matricula" value="<?php echo date("Y-m-d");  ?>" />
    <!-- Área de dados do aluno -->
    <div class="row mt">
    		<div class="col-lg-12">
            <div class="form-panel">
            	  <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pessoais</h4>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" class="form-control" name="nome" value="<?php echo set_value('nome'); ?>" title="Digite o nome do aluno"/>
                        <div class="error"><?php echo form_error('nome'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sobrenome" value="<?php echo set_value('sobrenome'); ?>" title="Digite seu sobrenome"/>
                        <div class="error"><?php echo form_error('sobrenome'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">CPF</label>
                    <div class="col-sm-5">
                        <input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo set_value('cpf'); ?>" title="Digite seu CPF"/>
                        <div class="error"><?php echo form_error('cpf'); ?></div>
                        <span class="help-block">Informe apenas os números.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data de nascimento</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="dt_nascimento" value="<?php echo set_value('dt_nascimento'); ?>" title="Selecione uma data"/>
                        <div class="error"><?php echo form_error('dt_nascimento'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Peso</label>
                    <div class="col-sm-3">
                    <div class="input-group">                    
                        <input type="text" class="form-control" name="peso" value="<?php echo set_value('peso'); ?>" title="Digite seu peso em kilogramas"/>
                        <span class="input-group-addon">Kg</span>
                        <div class="error"><?php echo form_error('peso'); ?></div>
                    </div>
                    </div>
                    
                    <label class="col-sm-2 col-sm-2 control-label">Altura</label>
                    <div class="col-sm-3">                        
                    <div class="input-group"> 
                        <input type="text" class="form-control" name="altura" value="<?php echo set_value('altura'); ?>" title="Digite sua altura em metros"/>
                        <span class="input-group-addon">Mts</span>
                        <div class="error"><?php echo form_error('altura'); ?></div>
                    </div>
                    </div>
                </div>
                
              <!--  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Altura</label>
                    <div class="col-sm-3">                        
                    <div class="input-group"> 
                        <input type="text" class="form-control" name="altura" value="<?php echo set_value('altura'); ?>" title="Em metros"/>
                        <span class="input-group-addon">mts</span>
                        <div class="error"><?php echo form_error('altura'); ?></div>
                    </div>
                    </div>
                </div>-->

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tipo sanguíneo</label>                                    
                    <div class="col-sm-3">
                        <select name="tipo_sanguineo" class="form-control" title="Selecione um tipo sanguíneo">
                            <option value="">Escolha um tipo</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="0+">O+</option>
                            <option value="0-">O-</option>                                
                          </select>
                        <!--<input type="text" class="form-control" name="tipo_sanguineo" value="<?php echo set_value('tipo_sanguineo'); ?>" />-->
                        <div class="error"><?php echo form_error('tipo_sanguineo'); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sexo</label>
                    <div class="col-sm-8">
                        <label>
                            <input type="radio" name="sexo" value="0" checked="true"> Masculino
                        </label><br />
                        <label>
                            <input type="radio" name="sexo" value="1"> Feminino
                        </label>
                        <div class="error"><?php echo form_error('sexo'); ?></div>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Observações sobre o(a) aluno(a)</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="observacao" ><?php echo set_value('observacao'); ?> </textarea>
                          <div class="error"><?php echo form_error('observacao'); ?></div>
                      </div>
                  </div>
            </div>
        </div>
    </div>

    <!-- Área de dados do responsável -->
    
   
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb" id="toggle"><i class="fa fa-angle-right"></i> Dados do responsável</h4>
                <div id="cad_responsavel">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome_responsavel" value="<?php echo set_value('nome_responsavel'); ?>" title="Digite o nome do responsável" />
                        <div class="error"><?php echo form_error('nome_responsavel'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sobrenome_responsavel" value="<?php echo set_value('sobrenome_responsavel'); ?>" title="Digite o sobrenome do responsável"/>
                        <div class="error"><?php echo form_error('sobrenome_responsavel'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data de nascimento</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="dt_nascimento_responsavel" value="<?php echo set_value('dt_nascimento_responsavel'); ?>" title="Selecione ou digite a data de nascimento do responsável"/>
                        <div class="error"><?php echo form_error('dt_nascimento_responsavel'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email_responsavel" value="<?php echo set_value('email_responsavel'); ?>" title="Digite o e-mail do responsável"/>
                        <div class="error"><?php echo form_error('email_responsavel'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sexo</label>
                    <div class="col-sm-10">
                        <input type="radio" name="sexo_responsavel" value="0" checked="true"> Masculino<br />
                        <input type="radio" name="sexo_responsavel" value="1"> Feminino
                        <div class="error"><?php echo form_error('sexo_responsavel'); ?></div>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>

    <!-- Área de endereço -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            	  <h4 class="mb"><i class="fa fa-angle-right"></i> Endereço</h4>
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">País</label>
                      <div class="col-sm-10">
                          <select name="id_ta_pais" class="form-control" title="Selecione um país">
                              <option value="<?php echo set_value('id_ta_pais'); ?>">Escolha uma pessoal</option>
                              <?php
                                  foreach ($paises as $value) {
                                    echo "<option value='" . $value->id_ta_pais . "'";
                                    if (set_value('id_ta_pai')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->nm_pais . "</option>";
                                  }
                              ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_pais'); ?></div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                      <div class="col-sm-10">
                          <select name="id_ta_estado" class="form-control" title="Selecione um estado">
                            <option value="<?php echo set_value('id_ta_estado'); ?>">Escolha uma pessoal</option>
                            <?php
                                  foreach ($estados as $value) {
                                    echo "<option value='" . $value->id_estado . "'";
                                    if (set_value('id_ta_estado')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->nm_estado . "</option>";
                                  }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_estado'); ?></div>
                      </div>
                  </div>
                 
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Cidade</label>
                      <div class="col-sm-10">
                          <select name="id_ta_cidade" class="form-control" title="Selecione uma cidade">
                            <option value="<?php echo set_value('id_ta_cidade'); ?>">Escolha uma pessoal</option>
                                <?php
                                  foreach ($cidades as $value) {
                                    echo "<option value='" . $value->id_ta_cidade . "'";
                                    if (set_value('id_ta_cidade')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->nm_cidade . "</option>";
                                  }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_cidade'); ?></div>
                      </div>
                  </div>
                 
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Logradouro</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="logradouro" value="<?php echo set_value('logradouro'); ?>" title="Digite o nome da rua em que reside"/>
                          <div class="error"><?php echo form_error('logradouro'); ?></div>
                      </div>
                  </div>
                 
                  <div class="form-group">
                      
                      <label class="col-sm-2 col-sm-2 control-label">Número</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="numero" value="<?php echo set_value('numero'); ?>" title="Digite o número da casa"/>
                          <div class="error"><?php echo form_error('numero'); ?></div>
                      </div>
                      
                      <label class="col-sm-2 col-sm-2 control-label">CEP</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="cep" value="<?php echo set_value('cep'); ?>" title="Digite o CEP"/>
                          <div class="error"><?php echo form_error('cep'); ?></div>
                      </div>
                  </div>
                  <!--<div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">CEP</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="cep" value="<?php echo set_value('cep'); ?>" />
                          <div class="error"><?php echo form_error('cep'); ?></div>
                      </div>
                  </div>-->
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Complemento</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="complemento" > <?php echo set_value('complemento'); ?> </textarea>
                          <div class="error"><?php echo form_error('complemento'); ?></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <!-- Área de contato -->
      <div class="row mt">
          <div class="col-lg-12">
              <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Informações para contato</h4>
                 
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Tipo</label>
                      <div class="col-sm-3">
                          <select name="id_ta_tipo_telefone" class="form-control" title="Selecione o tipo para contato telefonico ">
                              <option value="<?php echo set_value('id_ta_tipo_telefone'); ?>">Escolha o tipo</option>
                              <?php
                                  foreach ($tipos_telefone as $value) {
                                    echo "<option value='" . $value->id_ta_tipo_telefone . "'";
                                    if (set_value('id_ta_tipo_telefone')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->desc_tipo_telefone . "</option>";
                                  }
                              ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_tipo_telefone'); ?></div>
                      </div>
                     
                      <label class="col-sm-2 col-sm-2 control-label">DDD + Telefone</label>
                      <div class="col-sm-5">
                          <input type="text" class="form-control" name="telefone" value="<?php echo set_value('telefone'); ?>" title="Digite o número do telefone"/>
                          <div class="error"><?php echo form_error('telefone'); ?></div>
                      </div>
                  </div>

                  <!--<div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">DDD + Telefone</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="telefone" value="<?php echo set_value('telefone'); ?>" />
                          <div class="error"><?php echo form_error('telefone'); ?></div>
                      </div>
                  </div>-->

                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">E-mail</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" title="Digite o e-mail"/>
                          <div class="error"><?php echo form_error('email'); ?></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Área de pagamento -->
      <div class="row mt">
          <div class="col-lg-12">
              
              <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Informações para pagamento</h4>
                  
                  <div class="form-group">                      
                      <label class="col-sm-2 col-sm-2 control-label">Melhor data para pagamento</label>
                      <div class="col-sm-4">                    
                          <input type="text" class="form-control" name="dia_vencimento" value="<?php echo set_value('dia_vencimento'); ?>" title="Digite a data para o pagamento da mensalidade"/>
                          <div class="error"><?php echo form_error('dia_vencimento'); ?></div>
                      </div>
                      
                      <label class="col-sm-2 col-sm-2 control-label">Valor da mensalidade</label>
                      <div class="col-sm-4">
                      <div class="input-group">                      
                          <input type="text" class="form-control" name="valor_mensalidade" value="<?php echo set_value('valor_mensalidade'); ?>" title="Digite o valor da mesalidade"/>
                          <span class="input-group-addon">R$</span>
                          <div class="error"><?php echo form_error('valor_mensalidade'); ?></div>
                      </div>
                      </div>                      
                  </div>
                  <!--<div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Valor da mensalidade</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="valor_mensalidade" value="<?php echo set_value('valor_mensalidade'); ?>" />
                          <div class="error"><?php echo form_error('valor_mensalidade'); ?></div>
                      </div>
                  </div>-->
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Desconto</label>
                      <div class="col-sm-4">
                      <div class="input-group">  
                          <input type="text" class="form-control" name="desconto" value="<?php echo set_value('desconto'); ?>" title="Digite o valor do desconto"/>
                          <span class="input-group-addon">R$</span>
                          <div class="error"><?php echo form_error('desconto'); ?></div>
                      </div>
                      </div>
                  </div>
    			    </div><!-- /form-panel -->
    		  </div><!-- /col-lg-12 -->
    	</div><!-- /row -->

      <!-- Área de pagamento -->
      <div class="row mt">
          <div class="col-lg-12">
              
              <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Dados de usuário</h4>
                 
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Usuário</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="login" value="<?php echo set_value('login'); ?>" title="Digite o nome de usuário"/>
                          <div class="error"><?php echo form_error('login'); ?></div>
                      </div>
                     
                      <label class="col-sm-2 col-sm-2 control-label">Senha</label>
                      <div class="col-sm-4">
                          <input type="password" class="form-control" name="senha" value="<?php echo set_value('senha'); ?>" title="Digite a senha do usuário"/>
                          <div class="error"><?php echo form_error('senha'); ?></div>
                      </div>
                  </div>
                
                  <!--<div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Senha</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" name="senha" value="<?php echo set_value('senha'); ?>" />
                          <div class="error"><?php echo form_error('senha'); ?></div>
                      </div>
                  </div>-->
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Situação</label>
                      <div class="col-sm-10">
                          <select name="id_ta_situacao" class="form-control" title="Selecione uma situação">
                            <option value="<?php echo set_value('id_ta_situacao'); ?>">Escolha uma pessoal</option>
                                <?php
                                  foreach ($situacoes as $value) {
                                    echo "<option value='" . $value->id_ta_situacao . "'";
                                    if (set_value('id_ta_situacao')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->nm_situacao . "</option>";
                                  }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_situacao'); ?></div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Grupo de permissão</label>
                    <div class="col-sm-5">
                        <?php
                            foreach ($tipos_usuario as $value) {
                        ?>
                            <div class="radio">
                                <label>
                                    <input name="id_ta_tipo_usuario" type="radio" value="<?php echo $value->id_ta_tipo_usuario; ?>"
                                    <?php
                                        if (set_value('id_ta_tipo_usuario')){
                                            echo ($value->id_ta_tipo_usuario == set_value('id_ta_tipo_usuario'))?" checked ":"";
                                        }
                                    ?>
                                    />
                                    <?php echo $value->ds_tipo_usuario; ?>
                                </label>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                  <button class="btn btn-lg btn-primary" >Cadastrar</button>
              </div><!-- /form-panel -->
          </div><!-- /col-lg-12 -->
      </div><!-- /row -->
<?php echo form_close(); ?>


<script type="text/javascript">
        $( "#toggle" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
        });
        
        $('document').ready(function(){
           $( "#cad_responsavel" ).fadeOut( "fast" ); 
        });
        
        $( "#toggle" ).click(function() {
            $( "#cad_responsavel" ).fadeToggle( "slow", "linear" );
        });

</script>