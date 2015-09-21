<h3><i class="fa fa-angle-right"></i> Cadastrar Menu</h3>
<?php echo form_open("menu/alterar/$query->id_menu", array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>



    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados</h4>
                <?php
                    echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('edicaook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('edicaook').'</p>';
                    }
                    //echo '<pre>';
                    //die(print_r($query));
                ?>
                <div class="form-group">
                        <input type="hidden" id="id_menu" class="form-control" name="id_menu" value="<?php echo set_value('id_menu', $query->id_menu); ?>" />
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" class="form-control" name="nome" value="<?php echo set_value('nome', $query->nome); ?>" />
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
                                echo "<option value='" . $value->id_menu . "'";
                                if (set_value('nome', $query->id_menu_pai) == $value->id_menu){
                                    echo " selected ";
                                }
                                echo ">" . $value->nome . " - " . $value->url . "</option>";
                              }
                          ?>
                        </select>
                        <div class="error"><?php echo form_error('id_menu_pai'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">URL</label>
                    <div class="col-sm-10">
                        <input type="text" id="url" class="form-control" name="url" value="<?php echo set_value('url', $query->url); ?>" />
                        <div class="error"><?php echo form_error('url'); ?></div>
                        <span class="help-block">Ex: http://www.google.com.br</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ordem</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="ordem" value="<?php echo set_value('ordem', $query->ordem); ?>" />
                        <div class="error"><?php echo form_error('ordem'); ?></div>
                        <span class="help-block">Informe apenas os números.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Descrição de funcionalidade</label>
                    <div class="col-sm-6">
                        <textarea rows="5" class="form-control" name="desc_menu" ><?php echo set_value('desc_menu', $query->desc_menu); ?> </textarea>
                        <div class="error"><?php echo form_error('desc_menu'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Ícone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="icone" value="<?php echo set_value('icone', $query->icone); ?>" />
                        <div class="error"><?php echo form_error('icone'); ?></div>
                        <span class="help-block">Ex: fa fa-users ( <i class='fa fa-users'></i> )</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Grupo com permissão</label>
                    <div class="col-sm-5">
                        <?php
                            foreach ($tipo_usuario_menu as $value) {
                            //echo "<pre>";
                            //print_r($tipo_usuario_menu);
                        ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="<?php echo $value->id_ta_tipo_usuario; ?>"
                                    <?php if ($value->checked){
                                        echo " checked ";
                                    }
                                    >
                                    <?php echo $value->ds_tipo_usuario; ?>
                                </label>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" >Alterar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>
