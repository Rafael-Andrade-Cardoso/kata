<h3><i class="fa fa-angle-right"></i> Cadastrar Instrutor</h3>
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
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pessoais</h4>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" class="form-control" name="nome" value="<?php echo set_value('nome'); ?>" />
                        <div class="error"><?php echo form_error('nome'); ?></div>
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
                    <label class="col-sm-2 col-sm-2 control-label">CPF</label>
                    <div class="col-sm-5">
                        <input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo set_value('cpf'); ?>" />
                        <div class="error"><?php echo form_error('cpf'); ?></div>
                        <span class="help-block">Informe apenas os números.</span>
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
                    <label class="col-sm-2 col-sm-2 control-label">Tipo sanguíneo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tipo_sanguineo" value="<?php echo set_value('tipo_sanguineo'); ?>" />
                        <div class="error"><?php echo form_error('tipo_sanguineo'); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Sexo</label>
                    <div class="col-sm-10">
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
                      <label class="col-sm-2 col-sm-2 control-label">País</label>
                      <div class="col-sm-10">
                          <select name="id_ta_pais" class="form-control">
                            <?php
                                foreach ($paises as $value) {
                                  echo "<option value='" . $value->id_ta_pais . "'>" . $value->nm_pais . "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_menu_pai'); ?></div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                      <div class="col-sm-10">
                          <select name="id_ta_estado" class="form-control">
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
                      <label class="col-sm-2 col-sm-2 control-label">Cidade</label>
                      <div class="col-sm-10">
                          <select name="id_ta_cidade" class="form-control">
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
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Informações para contato</h4>
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Tipo de telefone</label>
                      <div class="col-sm-10">
                          <select name="id_ta_tipo_telefone" class="form-control">
                              <option value="<?php echo set_value('id_ta_tipo_telefone'); ?>">Escolha o tipo</option>
                              <?php
                                  foreach ($tipos_telefone as $value) {
                                    echo "<option value='" . $value->id_ta_tipo_telefone . "'>" . $value->desc_tipo_telefone . "</option>";
                                  }
                              ?>
                          </select>
                          <div class="error"><?php echo form_error('id_ta_tipo_telefone'); ?></div>
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
                      <label class="col-sm-2 col-sm-2 control-label">E-mail</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" />
                          <div class="error"><?php echo form_error('email'); ?></div>
                      </div>
                  </div>
                <button class="btn btn-lg btn-primary" >Cadastrar</button>
              </div>
          </div>
      </div>

<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#cpf").mask("999.999.999-99");
      });
        alert('teste');

</script>