<h3><i class="fa fa-angle-right"></i> Cadastrar aluno</h3>

<input type="submit" OnClick="deleteReg(1,'<?=base_url("aluno/teste");?>');" value="TESTEEEEEEEEE">
<?php echo form_open('cadastro/insert_aluno', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro')); ?>
<input type="hidden" name="dt_matricula" value="<?php echo date("Y-m-d");  ?>" />
<?php
    /*echo "<pre>";
    die(print_r($query));*/
?>
<!-- Área de dados do aluno -->
<div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">

      <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pessoais 
        <font color="#FF0202" size="2" class="campos_obrigatorios">Campos obrigatórios*</font>
      </h4>
      <div class="col-md-6 form-group">
        <label class="col-sm-2 col-sm-2 control-label"> Nome<font color="#FF0202">*</font></label>
        <div class="col-sm-10">
          <input type="text" id="nome" class="form-control" name="nome" value="<?php echo set_value('nome'); ?><?php echo set_value('nome', $query->nome); ?>" title="Digite o nome do aluno"/>
          <div class="error"><?php echo form_error('nome'); ?></div>
        </div>
      </div>

      <div class="col-md-6 form-group">
        <label class="col-sm-2 col-sm-2 control-label">Sobrenome<font color="#FF0202">*</font></label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="sobrenome" value="<?php echo set_value('sobrenome'); ?><?php echo set_value('sobrenome', $query->sobrenome); ?>" title="Digite seu sobrenome"/>
          <div class="error"><?php echo form_error('sobrenome'); ?></div>
        </div>
      </div>

      <div class="col-md-6 form-group">
        <label class="col-sm-2 col-sm-2 control-label">CPF</label>
        <div class="col-sm-10">
          <input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo set_value('cpf'); ?><?php echo set_value('cpf', $query->cpf); ?>" title="Digite seu CPF" onblur="TestaCPF"/>
          <div class="error"><?php echo form_error('cpf'); ?></div>
          <span class="help-block">Informe apenas os números.</span>
        </div>
      </div>

      <div class="col-md-6 form-group">
        <label class="col-sm-2 col-sm-2 control-label">Data de nascimento<font color="#FF0202">*</font></label>
        <div class="col-sm-10">
          <input type="date" id="dt_nascimento"class="form-control" name="dt_nascimento" value="<?php echo set_value('dt_nascimento'); ?><?php echo set_value('dt_nascimento', $query->dt_nascimento); ?>" title="Selecione uma data"/>
          <div class="error"><?php echo form_error('dt_nascimento'); ?></div>
          <span class="help-block">&nbsp;</span>
        </div>
      </div>

      <div class="col-md-6 form-group">
        <label class="col-sm-2 col-sm-2control-label">Altura<font color="#FF0202">*</font></label>
        <div class="col-sm-10">                        
          <div class="input-group"> 
            <input type="text" class="form-control" id="altura" name="altura" value="<?php echo set_value('altura'); ?><?php echo set_value('altura', $query->altura); ?>" title="Digite sua altura em metros"/>
            <span class="input-group-addon">Mts</span>
            <div class="error"><?php echo form_error('altura'); ?></div>
          </div>
        </div>
      </div>

      <div class="col-md-6 form-group">
        <label class="col-sm-2 col-sm-2 control-label">Peso<font color="#FF0202">*</font></label>
        <div class="col-sm-10">
          <div class="input-group">                    
            <input type="text" class="form-control" id="peso" name="peso" value="<?php echo set_value('peso'); ?><?php echo set_value('peso', $query->peso); ?>" title="Digite seu peso em kilogramas"/>
            <span class="input-group-addon">Kg</span>
            <div class="error"><?php echo form_error('peso'); ?></div>
          </div>
        </div>
      </div>      

      <div class="col-md-6 form-group">
        <label class="col-sm-2 control-label">Tipo sanguíneo<font color="#FF0202">*</font></label>                                    
        <div class="col-sm-10">
          <select name="tipo_sanguineo" class="form-control" title="Selecione um tipo sanguíneo">
              <?php
                    echo "<option value='".set_value('tipo_sanguineo', $query->id_aluno)."'>";                                
                    echo $query->tipo_sanguineo. "</option>";
              ?>                                           
          </select>
          <!--<input type="text" class="form-control" name="tipo_sanguineo" value="<?php echo set_value('tipo_sanguineo'); ?>" />-->
          <div class="error"><?php echo form_error('tipo_sanguineo'); ?></div>
        </div>
      </div>

      <div class="col-md-6 form-group">
        <label class="col-sm-2 col-sm-2 control-label">Sexo<font color="#FF0202">*</font></label>
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
        <label class="col-lg-2 control-label">Observações sobre o(a) aluno(a)</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="observacao" ><?php echo set_value('observacao'); ?><?php echo set_value('nome', $query->nome); ?> </textarea>
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
            <input type="date" class="form-control" id="dt_nascimento_responsavel" name="dt_nascimento_responsavel" value="<?php echo set_value('dt_nascimento_responsavel'); ?>" title="Selecione ou digite a data de nascimento do responsável"/>
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
            <input type="radio" name="sexo_responsavel" value="M" checked="true"> Masculino<br />
            <input type="radio" name="sexo_responsavel" value="F"> Feminino
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

     <div class="col-lg-6 form-group">
      <label class="col-sm-2 col-sm-2 control-label">País<font color="#FF0202">*</font></label>
      <div class="col-sm-10">
        <select name="id_ta_pais" class="form-control" title="Selecione um país">
          <option value="<?php echo set_value('id_ta_pais'); ?>">Escolha um país</option>
          <?php          
            foreach ($paises as $value) {
                echo "<option value='" . $value->id_ta_pais . "'";
                if (set_value('id_ta_pais', $query->id_ta_pais) == $value->id_ta_pais){
                    echo " selected ";
                }
                echo ">" . $value->nm_pais . "</option>";                                   
            }
          ?>
        </select>
        <div class="error"><?php echo form_error('id_ta_pais'); ?></div>
      </div>
    </div>

    <div class="col-lg-6 form-group">
      <label class="col-sm-2 col-sm-2 control-label">Estado<font color="#FF0202">*</font></label>
      <div class="col-sm-10">
        <select name="id_ta_estado" class="form-control" title="Selecione um estado">
          <option value="<?php echo set_value('id_ta_estado'); ?>">Escolha um estado</option>
          <?php
          foreach ($estados as $value) {
            echo "<option value='" . $value->id_ta_estado . "'";
            if (set_value('id_ta_estado', $query->id_ta_estado) == $value->id_ta_estado){
              echo " selected ";
            }
            echo ">" . $value->nm_estado . "</option>";
          }
          ?>
        </select>
        <div class="error"><?php echo form_error('id_ta_estado'); ?></div>
      </div>
    </div>

    <div class="col-lg-6 form-group">
      <label class="col-sm-2 col-sm-2 control-label">Cidade<font color="#FF0202">*</font></label>
      <div class="col-sm-10">
        <select name="id_ta_cidade" class="form-control" title="Selecione uma cidade">
          <option value="<?php echo set_value('id_ta_cidade'); ?>">Escolha uma cidade</option>
          <?php
          foreach ($cidades as $value) {
            echo "<option value='" . $value->id_ta_cidade . "'";
            if (set_value('id_ta_cidade', $query->id_ta_cidade) == $value->id_ta_cidade){
              echo " selected ";
            }
            echo ">" . $value->nm_cidade . "</option>";
          }
          ?>
        </select>
        <div class="error"><?php echo form_error('id_ta_cidade'); ?></div>
      </div>
    </div>

    <div class="col-lg-6 form-group">
      <label class="col-sm-2 col-sm-2 control-label">Logradouro<font color="#FF0202">*</font></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="logradouro" value="<?php echo set_value('logradouro'); ?><?php echo set_value('logradouro', $query->logradouro); ?>" title="Digite o nome da rua em que reside"/>
        <div class="error"><?php echo form_error('logradouro'); ?></div>
      </div>
    </div>

    <div class="col-lg-6 form-group">

      <label class="col-sm-2 col-sm-2 control-label">CEP<font color="#FF0202">*</font></label>
      <div class="col-sm-5">
        <input type="text" id="cep" class="form-control" name="cep" value="<?php echo set_value('cep'); ?><?php echo set_value('cep', $query->cep); ?>" title="Digite o CEP"/>
        <div class="error"><?php echo form_error('cep'); ?></div>
        <span class="help-block">Informe apenas os números.</span>
      </div>
    </div>

    <div class="col-lg-6 form-group">
      <label class="col-sm-2 col-sm-2 control-label">Número<font color="#FF0202">*</font></label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="numero" value="<?php echo set_value('numero'); ?><?php echo set_value('numero', $query->numero); ?>" title="Digite o número da casa"/>
        <div class="error"><?php echo form_error('numero'); ?></div>
        <span class="help-block">&nbsp;</span>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Complemento</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="complemento" > <?php echo set_value('complemento'); ?><?php echo set_value('complemento', $query->complemento); ?> </textarea>
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
        <label class="col-sm-2 col-sm-2 control-label">Tipo<font color="#FF0202">*</font></label>
        <div class="col-sm-3">
          <select name="id_ta_tipo_telefone" class="form-control" title="Selecione o tipo para contato telefonico ">
            <option value="<?php echo set_value('id_ta_tipo_telefone'); ?>">Escolha o tipo</option>
            <?php
            foreach ($tipos_telefone as $value) {
              echo "<option value='" . $value->id_ta_tipo_telefone . "'";
              if (set_value('id_ta_tipo_telefone', $query->id_ta_tipo_telefone) == $value->id_ta_tipo_telefone){
                echo " selected";
              }
              echo ">" . $value->desc_tipo_telefone . "</option>";
            }
            ?>
          </select>
          <div class="error"><?php echo form_error('id_ta_tipo_telefone'); ?></div>
        </div>

        <label class="col-sm-2 col-sm-2 control-label">DDD + Telefone<font color="#FF0202">*</font></label>
        <div class="col-sm-5">
          <input type="text" id="telefone" class="form-control" name="telefone" value="<?php echo set_value('telefone'); ?><?php echo set_value('telefone', $query->telefone); ?>" title="Digite o número do telefone"/>
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
        <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?><?php echo set_value('email', $query->email); ?>" title="Digite o e-mail"/>
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
                        <option value="<?php echo set_value('id_ta_tipo_telefone_2'); ?>">Escolha o tipo</option>
                        <?php
                            foreach ($tipos_telefone as $value) {
                                echo "<option value='" . $value->id_ta_tipo_telefone . "'";
                                if (set_value('id_ta_tipo_telefone_2')){
                                    echo " checked ";
                                }
                                echo ">" . $value->desc_tipo_telefone . "</option>";
                            }
                        ?>
                        </select>
                        <div class="error"><?php echo form_error('id_ta_tipo_telefone_2'); ?></div>
                    </div>

                    <label class="col-sm-2 col-sm-2 control-label">DDD + Telefone<font color="#FF0202">*</font></label>
                    <div class="col-sm-5">
                        <input type="text" id="telefone_2" class="form-control" name="telefone_2" value="<?php echo set_value('telefone'); ?>" title="Digite o número do telefone"/>
                        <div class="error"><?php echo form_error('telefone_2'); ?></div>
                    </div>
                </div>

                <!--</div>
            </div>
          </div>-->
            </div>
        </div>             
        </div>
    </div>



    <div class="row mt"> <!-- CONTINUAR AQUI MATRICULA -->
        <div class="col-lg-12">

        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Turma</h4>

            <div class="form-group">                      
            <div class="col-sm-6 col-md-6 col-lg-6">   
            <label class="col-sm-2 col-sm-2 control-label">Turma<font color="#FF0202">*</font></label>
            <div class="col-sm-10">                    
                <select name="id_turma" id="id_turma" class="form-control" title="Selecione a turma" onclick="javascript: get_info();">
                <option value="<?php echo set_value('id_turma'); ?>">Escolha a turma</option>
                <?php
                    echo "<option value='" . $value->id_turma . "'";
                    foreach ($turma as $value) {  
                        if (set_value('id_turma', $query->id_turma) == $value->id_turma){
                            echo " selected";
                        }                                    
                        echo ">". $value->nm_turma . "</option>";
                    }
                ?>
                </select>
            </div>
            <div class="error"><?php echo form_error('id_turma'); ?></div>
            </div>
            <div class="col-sm-6 col-sm-6 control-label" id="id_horario"><?php echo (isset($info))?$info:"";?></div>                     
        </div>

        </div><!-- /form-panel -->
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->

<!-- Área de pagamento -->
    <div class="row mt">
        <div class="col-lg-12">

        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Informações para pagamento</h4>

            <div class="form-group">                      
                <label class="col-sm-2 col-sm-2 control-label">Melhor dia para pagamento<font color="#FF0202">*</font></label>
                <div class="col-sm-4">                    
                    <input type="text" class="form-control" id="dia_vencimento" name="dia_vencimento" value="<?php echo set_value('dia_vencimento'); ?><?php echo set_value('dia_vencimento', $query->dia_vencimento); ?>" title="Digite a data para o pagamento da mensalidade"/>
                <div class="error"><?php echo form_error('dia_vencimento'); ?></div>
                </div>
            </div>
                        
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Desconto<font color="#FF0202">*</font></label>
                <div class="col-sm-4">
                <div class="input-group">  
                    <span class="input-group-addon">R$</span>
                    <input type="text" class="form-control" id="desconto" name="desconto" value="<?php echo set_value('desconto'); ?><?php echo set_value('desconto', $query->desconto); ?>" title="Digite o valor do desconto"/>
                <div class="error"><?php echo form_error('desconto'); ?></div>
                </div>
                </div>
            </div>
            <button class="btn btn-lg btn-primary" >Alterar</button>
        </div><!-- /form-panel -->
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->


              <!-- </div> /form-panel -->
              <!--  </div><!-- /col-lg-12 -->
              <!-- </div><!-- /row -->
              <?php echo form_close(); ?>


<script type="text/javascript">
                $( "#toggle" ).on({
                  "mouseover": function() {
                    $( this ).css("cursor", "pointer");
                  }
                });

                $( "#contato_toggle" ).on({
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

                $('document').ready(function(){
                 $( "#cad_contato" ).fadeOut( "fast" ); 
               });

                $( "#contato_toggle" ).click(function() {
                  $( "#cad_contato" ).fadeToggle( "slow", "linear" );
                });


                $(document).ready(function(){
                  $("#cpf").mask("999.999.999-99", {selectOnFocus: true});
                  $("#cep").mask("99999-999", {selectOnFocus: true}); 
                  $("#telefone").mask("(99) 9999-9999", {selectOnFocus: true}); 
                  $("#telefone_2").mask("(99) 9999-9999", {selectOnFocus: true}); 
                  $("#peso").mask("999", {selectOnFocus: true}); 
                  $("#altura").mask("#,99", {selectOnFocus: true});  
                  $('#desconto').mask("##,##", {reverse: true});
                  $("#dia_vencimento").mask("#0", {selectOnFocus: true}); 
                    
                    function get_info() {
                        var id_turma = $("#id_turma").val();
                            //var id_turma2 =  document.getElementById("id_turma").value;
                            //alert(id_turma);
                        str1 = "<?php echo base_url(); ?>cadastro/get_info_turma/"
                        var res = str1.concat(id_turma);
                        $.post(res, {
                        id_turma : id_turma
                        }, function(data) {
                            $("#id_horario").html(data);
                        });
                        alert(res);                        
                    }
                });

                $(function(){        
            // ## EXEMPLO 2
            // Aciona a validação ao sair do input
            
            $('#cpf').blur(function(){                          
                // O CPF ou CNPJ
                
                var cpf = document.getElementById("cpf").value;    
                if(cpf != ""){            
                // Testa a validação
                if ( TestaCPF( cpf ) ) {
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
                var displayDate = myDate.getFullYear()-4 + '-' + (myDate.getMonth()+1) + '-' + (myDate.getDate()) ; 
                var displayDate2 = myDate.getFullYear()-70 + '-' + (myDate.getMonth()+1) + '-' + (myDate.getDate()) ;
                //alert(displayDate);
                if(dt != ""){
                  if(dt >= displayDate){
                    alert('A criança deve ao menos ter 4 anos de idade');
                    $("#dt_nascimento").focus();
                  }else if(dt < displayDate2){
                    alert('Insira uma data válida');
                    $("#dt_nascimento").focus();
                  }
                }
              });
            
            $('#dt_nascimento_responsavel').blur(function(){
              var dt = document.getElementById("dt_nascimento_responsavel").value;
                //alert(dt);
                var myDate = new Date();
                var displayDate = myDate.getFullYear()-18 + '-' + (myDate.getMonth()+1) + '-' + (myDate.getDate()) ; 
                //alert(displayDate);
                if(dt >= displayDate){
                  alert('Responsável deve ser maior de idade');
                  $("#dt_nascimento_responsavel").focus();
                }    
              });
            
            $('#peso').blur(function(){
              var peso = document.getElementById("peso").value;
                //alert(peso); 
                //alert(displayDate);
                if((peso < 0)){
                  alert('Insira um valor correto para o campo peso');
                  $("#peso").focus();
                }else if(peso > 400){
                  alert('Insira um valor correto para o campo peso');
                  $("#peso").focus();
                }    
              }); 
            
            $('#altura').blur(function(){
              var altura = document.getElementById("altura").value;
                //alert(altura); 
                //alert(displayDate);
                if(altura != ""){    
                  if((altura > "2,80")){
                    alert('Insira um valor correto para o campo altura');
                    $("#altura").focus();
                  }else if(altura < "0,20"){
                    alert('Insira um valor correto para o campo altura');
                    $("#altura").focus();
                  }    
                }
              });
            
            $('#dia_vencimento').blur(function(){
              var dia_vencimento = document.getElementById("dia_vencimento").value;
                //alert(dia_vencimento); 
                //alert(displayDate);
                if((dia_vencimento > 31)){
                  alert('Insira um dia correto para o campo de vencimento');
                  $("#dia_vencimento").focus();
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

          function get_info() {
            $("#id_turma option:selected").each(function() {
              var id_turma = $("#id_turma").val();
                //var id_turma2 =  document.getElementById("id_turma").value;
                //alert(id_turma);
                str1 = "<?php echo base_url(); ?>cadastro/get_info_turma/"
                var res = str1.concat(id_turma);
                $.post(res, {
                  id_turma : id_turma
                }, function(data) {
                  $("#id_horario").html(data);
                });
                //alert(res);
              });
          }
        </script>