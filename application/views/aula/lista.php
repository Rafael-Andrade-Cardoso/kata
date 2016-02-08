            <h3><i class="fa fa-angle-right"></i> Lista de aulas</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <a href="<?php echo base_url('cadastro/form_aula'); ?>" class="btn btn-primary">Cadastrar</a><br /><br />
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                               <thead>
                                  <tr>
                                      <!--<th> ID</th>-->
                                      <th>Turma</th>
                                      <th class="hidden-sm hidden-xs"> Data da aula</th> 
                                      <th class="hidden-sm hidden-xs"> Dia da semana</th> 
                                      <th class="hidden-sm hidden-xs"> Hora de início</th>  
                                      <th class="hidden-sm hidden-xs"> Hora de término</th>                                       
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      $qtd = $this->uri->segment(3);
                                      $inicio = $this->uri->segment(4);
                                      //echo "<pre>";
                                      //die(print_r($alunos));

                                      foreach ($aula as $value) {
                                  ?>
                                      <tr id="line_menu<?php echo $value->id_aula; ?>">
                                                <td class="hidden-sm hidden-xs"><?php echo $value->nm_turma; ?></td>
                                                <td class="hidden-sm hidden-xs"><?php echo data_from_db($value->dt_aula); ?></td>
                                                <?php
                                                    switch($value->dia_semana){
                                                        case 0: $dia = 'Domingo'; break;
                                                        case 1: $dia = 'Segunda-feira'; break;
                                                        case 2: $dia = 'Terça-feira'; break;
                                                        case 3: $dia = 'Quarta-feira'; break;
                                                        case 4: $dia = 'Quinta-feira'; break;
                                                        case 5: $dia = 'Sexta-feira'; break;
                                                        case 6: $dia = 'Sábado'; break;
                                                    }
                                                ?>
                                                <td class="hidden-sm hidden-xs"><?php echo $dia; ?></td>
                                                <td><?php echo substr($value->hr_inicio, 0,5); ?></td>
                                                <td><?php echo substr($value->hr_termino, 0,5); ?></td>
                                            
                                                <td>
                                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                                    <a href="<?php echo base_url("alteracao/form_alterar_aula/" . $value->id_aula); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?php //echo base_url(); ?>" type="button" id="excluir" onclick="return deleteReg1('<?php echo $value->id_aula;?>','exclusao/excluir_aula/');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                                                </td>
                                            </tr>
                                  <?php
                                      }
                                  ?>
                              </tbody>
                          </table>
                          <?php
                              if($paginacao) {
                                echo $paginacao;
                              }
                          ?>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
<script type="text/javascript">
    
    function deleteReg1(id_teste, url){
        /*var caminho = '<?php echo base_url()?>';
        //alert(url);
        caminho = caminho + '/' + url;
        //alert(caminho + "," + id);
        
        str1 = "<?php echo base_url(); ?>exclusao/excluir_aula/"
        var res = str1.concat(id_teste);
        alert(id_teste);
        alert(res);
        
        var agree = confirm("Tem certeza de que deseja excluir este registro?");
        if(agree){            
            $("#line_menu"+id_teste).fadeOut('slow');
            $.post(res, {id : id_teste}, function(){
                //alert('Sucesso');   
            });
        }else{
            return false;
        }*/
         var caminho = '<?php echo base_url()?>';
            caminho += url;
            var agree = confirm("Tem certeza de que deseja excluir este registro?");
            if(agree){
                alert(id_teste);      
            //$("#line_menu"+id).fadeOut('slow');
            //$.post(caminho, {id:id}, function(){

            //});
            }else{
            return false;
            }
    }
    
    function deleteReg2(id, url) {
        //$("#excluir").click(function() {
            //var id = $("#id_ta_pais").val();
            str1 = "<?php echo base_url(); ?>exclusao/excluir_aula/"
            var res = str1.concat(id);
            alert(res);
            $.post(res, {id : id}, function(data) {
                //$("#id_estado").html(data);
                alert('Sucesso');
            });
            //alert(res);
        //});
    }
    
    /*$(function(){$('excluir').click(function(){ 
        alert('teste');
        
        $.ajax({
            type      : 'post',
 
            url       : 'teste.php',
 
            data      : 'nome='+ $('#campo1').val() +'&sobrenome='+ $('#campo2').val(),
 
            dataType  : 'html',
 
            success : function(txt){
                    $('body p').html(txt);
                }
        });
 
        });
    });*/
</script>


