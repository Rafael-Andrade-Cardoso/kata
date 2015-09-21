<h3><i class="fa fa-angle-right"></i> Cadastrar Menu</h3>
<?php echo form_open('menu/inserir', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>



    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados</h4>
                <?php
                    echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                    }
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" class="form-control" name="nome" value="<?php echo set_value('nome'); ?>" />
                        <div class="error"><?php echo form_error('nome'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Menu pai</label>
                    <div class="col-sm-10">
                        <select name="id_menu_pai" class="form-control">
                          <option value="">Menu de primeiro nível</option>
                          <?php
                              foreach ($menus as $value) {
                                echo "<option value='" . $value->id_menu . "'>" . $value->nome . " - " . $value->url . "</option>";
                              }
                          ?>
                        </select>
                        <div class="error"><?php echo form_error('id_menu_pai'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">URL</label>
                    <div class="col-sm-10">
                        <input type="text" id="url" class="form-control" name="url" value="<?php echo set_value('url'); ?>" />
                        <div class="error"><?php echo form_error('url'); ?></div>
                        <span class="help-block">Ex: http://www.google.com.br</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ordem</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="ordem" value="<?php echo set_value('ordem'); ?>" />
                        <div class="error"><?php echo form_error('ordem'); ?></div>
                        <span class="help-block">Informe apenas os números.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Descrição de funcionalidade</label>
                    <div class="col-sm-6">
                        <textarea rows="5" class="form-control" name="desc_menu" value="<?php echo set_value('desc_menu'); ?>" > </textarea>
                        <div class="error"><?php echo form_error('desc_menu'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ícone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="icone" value="<?php echo set_value('icone'); ?>" />
                        <div class="error"><?php echo form_error('icone'); ?></div>
                        <span class="help-block">Ex: fa fa-users ( <i class='fa fa-users'></i> )</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Grupo com permissão</label>
                    <div class="col-sm-5">
                        <?php
                            foreach ($tipos_usuario as $value) {
                        ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="<?php echo $value->id_ta_tipo_usuario; ?>">
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
