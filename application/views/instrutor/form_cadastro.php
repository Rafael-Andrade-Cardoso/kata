<h3><i class="fa fa-angle-right"></i> Cadastrar Instrutor</h3>
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>
<?php echo form_open('cadastro/insert_instrutor', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro')); ?>
    <input type="hidden" name="dt_matricula" value="<?php echo date("Y-m-d");  ?>" />
    <!-- Área de dados do aluno -->
    <div class="row mt">
            <div class="col-lg-12">
                <?php
                    echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                    }
                ?>
            <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pessoais&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <font color="#FF0202" size="2">Dados obrigatórios*</font></h4>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" class="form-control" name="nome" value="<?php echo set_value('nome'); ?>" title="Digite o nome do Instrutor"/>
                        <div class="error"><?php echo form_error('nome'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sobrenome<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sobrenome" value="<?php echo set_value('sobrenome'); ?>" title="Digite o sobrenome do Instrutor"/>
                        <div class="error"><?php echo form_error('sobrenome'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">CPF<font color="#FF0202">*</font></label>
                    <div class="col-sm-5">
                        <input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo set_value('cpf'); ?>" title="Digite o cpf do Instrutor"/>
                        <div class="error"><?php echo form_error('cpf'); ?></div>
                        <span class="help-block">Informe apenas os números.</span>
                    </div>
                <!--</div>


                <div class="form-group">-->
                    <label class="col-sm-2 col-sm-2 control-label">Data de nascimento<font color="#FF0202">*</font></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" value="<?php echo set_value('dt_nascimento'); ?>" title="Digite ou selecione a data de nascimento do Instrutor"/>
                        <div class="error"><?php echo form_error('dt_nascimento'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tipo sanguíneo<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sexo<font color="#FF0202">*</font></label>
                    <div class="col-sm-10">
                        <label>
                            <input type="radio" name="sexo" value="M" checked="true"> Masculino
                        </label><br />
                        <label>
                            <input type="radio" name="sexo" value="F"> Feminino
                        </label>
                        <div class="error"><?php echo form_error('sexo'); ?></div>
                    </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Observações sobre o(a) Instrutor(a)</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="observacao" > <?php echo set_value('observacao'); ?></textarea>
                          <div class="error"><?php echo form_error('observacao'); ?></div>
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
                      <label class="col-sm-2 col-sm-2 control-label">País<font color="#FF0202">*</font></label>
                      <div class="col-sm-4">
                          <select name="id_ta_pais" class="form-control" title="Selecione um país">
                            <?php
                                foreach ($paises as $value) {
                                  echo "<option value='" . $value->id_ta_pais . "'>" . $value->nm_pais . "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_ta_pais'); ?></div>
                      </div>
                 <!-- </div>
                  <div class="form-group">-->
                      <label class="col-sm-2 col-sm-2 control-label">Estado<font color="#FF0202">*</font></label>
                      <div class="col-sm-4">
                          <select name="id_ta_estado" class="form-control" title="Selecione um estado">
                                <?php
                                  foreach ($estados as $value) {
                                    echo "<option value='" . $value->id_estado . "'>" . $value->nm_estado . "</option>";
                                  }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_estado'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Cidade<font color="#FF0202">*</font></label>
                      <div class="col-sm-10">
                          <select name="id_ta_cidade" class="form-control" title="Selecione uma cidade">
                                <?php
                                  foreach ($cidades as $value) {
                                    echo "<option value='" . $value->id_ta_cidade . "'>" . $value->nm_cidade . "</option>";
                                  }
                                ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_cidade'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Logradouro<font color="#FF0202">*</font></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="logradouro" value="<?php echo set_value('logradouro'); ?>" title="Digite a rua em que o Instrutor reside"/>
                          <div class="error"><?php echo form_error('logradouro'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Número<font color="#FF0202">*</font></label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" id="numero" name="numero" value="<?php echo set_value('numero'); ?>" title="Digite o número"/>
                          <div class="error"><?php echo form_error('numero'); ?></div>
                      </div>
                      
                      <label class="col-sm-2 col-sm-2 control-label">CEP<font color="#FF0202">*</font></label>
                      <div class="col-sm-5">
                          <input type="text" id="cep" class="form-control" name="cep" value="<?php echo set_value('cep'); ?>" title="Digite o CEP"/>
                          <div class="error"><?php echo form_error('cep'); ?></div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Complemento</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="complemento" ><?php echo set_value('complemento'); ?> </textarea>
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
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Informações para contato
                    <font color="#00CC00"><span class="glyphicon glyphicon-plus" id="contato_toggle" aria-hidden="true"></span></font>
                  </h4>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Tipo de telefone<font color="#FF0202">*</font></label>
                      <div class="col-sm-3">
                          <select name="id_ta_tipo_telefone" class="form-control" title="Selecione o tipo de telefone">
                              <option value="<?php echo set_value('id_ta_tipo_telefone'); ?>">Escolha o tipo</option>
                              <?php
                                  foreach ($tipos_telefone as $value) {
                                    echo "<option value='" . $value->id_ta_tipo_telefone . "'>" . $value->desc_tipo_telefone . "</option>";
                                  }
                              ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_tipo_telefone'); ?></div>
                      </div>
                      
                      <label class="col-sm-2 col-sm-2 control-label">DDD + Telefone<font color="#FF0202">*</font></label>
                      <div class="col-sm-5">
                          <input type="text" id="telefone" class="form-control" name="telefone" value="<?php echo set_value('telefone'); ?>" title="Digite o telefone do Instrutor"/>
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
                      <label class="col-sm-2 col-sm-2 control-label">E-mail<font color="#FF0202">*</font></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" title="Digite o e-mail do Instrutor"/>
                          <div class="error"><?php echo form_error('email'); ?></div>
                      </div>
                  </div>
                  
                  <div id="cad_contato">
        <!--<div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">-->
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Telefone</h4>                
                    
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tipo<font color="#FF0202">*</font></label>
                            <div class="col-sm-3">
                                <select name="id_ta_tipo_telefone_2" class="form-control" title="Selecione o tipo para contato telefonico ">
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
                        
                            <label class="col-sm-2 col-sm-2 control-label">DDD + Telefone<font color="#FF0202">*</font></label>
                            <div class="col-sm-5">
                                <input type="text" id="telefone_2" class="form-control" name="telefone_2" value="<?php echo set_value('telefone'); ?>" title="Digite o número do telefone"/>
                                <div class="error"><?php echo form_error('telefone'); ?></div>
                            </div>
                        </div>
                                 
                <!--</div>
            </div>
        </div>-->
                    </div>
                
              </div>
          </div>
        </div>
          
          <!-- Área de pagamento -->
      <div class="row mt">
          <div class="col-lg-12">
              
            <div class="form-panel">
                  
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Dados de usuário</h4>
                 
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Usuário<font color="#FF0202">*</font></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="login" value="<?php echo set_value('login'); ?>" title="Digite o nome de usuário"/>
                            <div class="error"><?php echo form_error('login'); ?></div>
                        </div>
                        
                        <label class="col-sm-2 col-sm-2 control-label">Senha<font color="#FF0202">*</font></label>
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
                        <label class="col-sm-2 col-sm-2 control-label">Situação<font color="#FF0202">*</font></label>
                        <div class="col-sm-10">
                            <select name="id_ta_situacao" class="form-control" title="Selecione uma situação">
                                <option value="<?php echo set_value('id_ta_situacao'); ?>">Escolha uma situação</option>
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
                        <label class="col-sm-2 col-sm-2 control-label">Grupo de permissão<font color="#FF0202">*</font></label>
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
            </div>
        </div>
        </div>
       
<?php echo form_close(); ?>

<script type="text/javascript">

    $( "#contato_toggle" ).on({
            "mouseover": function() {
                $( this ).css("cursor", "pointer");
            }
    });

    $('document').ready(function(){
           $( "#cad_contato" ).fadeOut( "fast" ); 
        });
        
        $( "#contato_toggle" ).click(function() {
            $( "#cad_contato" ).fadeToggle( "slow", "linear" );
    });
    
    $(document).ready(function(){
        $("#cpf").mask("999.999.999-99");
        $("#cep").mask("99999-999"); 
        $("#telefone").mask("(99) 9999-9999"); 
      });       
      
       // alert('teste');
      $(function(){        
            // ## EXEMPLO 2
            // Aciona a validação ao sair do input
            $('#cpf').blur(function(){                          
                // O CPF ou CNPJ
                
                var cpf_cnpj = document.getElementById("cpf").value;                
                // Testa a validação
                if(cpf_cnpj != ""){
                    if ( TestaCPF( cpf_cnpj ) ) {
                    //alert('OK');
                    } else {
                        alert('CPF inválido!');
                        $("#cpf").focus();
                    }                
                }
            }); 
            
            $('#dt_nascimento').blur(function(){
                var dt = document.getElementById("dt_nascimento").value;
                //alert(dt);
                var myDate = new Date();
                var displayDate = myDate.getFullYear()-18 + '-' + (myDate.getMonth()+1) + '-' + (myDate.getDate()) ; 
                //alert(displayDate);
                if(dt >= displayDate){
                    alert('Instrutor deve ser maior de idade');
                    $("#dt_nascimento").focus();
                }    
            });          
        });     
    
        function TestaCPF(cpf) {  
            cpf = cpf.replace(/[^\d]+/g,'');    
            if(cpf == '') return false; 
            // Elimina CPFs invalidos conhecidos    
            if (cpf.length != 11 || 
                cpf == "00000000000" || 
                cpf == "11111111111" || 
                cpf == "22222222222" || 
                cpf == "33333333333" || 
                cpf == "44444444444" || 
                cpf == "55555555555" || 
                cpf == "66666666666" || 
                cpf == "77777777777" || 
                cpf == "88888888888" || 
                cpf == "99999999999")
                    return false;       
            // Valida 1o digito 
            add = 0;    
            for (i=0; i < 9; i ++)       
                add += parseInt(cpf.charAt(i)) * (10 - i);  
                rev = 11 - (add % 11);  
                if (rev == 10 || rev == 11)     
                    rev = 0;    
                if (rev != parseInt(cpf.charAt(9)))     
                    return false;       
            // Valida 2o digito 
            add = 0;    
            for (i = 0; i < 10; i ++)        
                add += parseInt(cpf.charAt(i)) * (11 - i);  
            rev = 11 - (add % 11);  
            if (rev == 10 || rev == 11) 
                rev = 0;    
            if (rev != parseInt(cpf.charAt(10)))
                return false;       
            return true;   
        }

</script>