  /* Confirma a exclusão de um registro
  *   @param id (primary key)
  *   @param url (destino)
  */
  function deleteReg(id, url){
    /*var caminho = "<?=base_url();?>";
    var caminho = url+"/"+id;*/
    var agree = confirm("Tem certeza de que deseja excluir este registro?");
    if(agree){
      //alert(id);      
      $("#line"+id).fadeOut('slow');
      $.post(url, {id:id}, function(){

      });
    }else{
      return false;
    }
  }

  $(document).ready(function() {
      $("#botao").click(function(e, idform, url){
          e.preventDefault();
          var dados   = $('#'+idform).serialize();
          //var destino = "<?php echo base_url(); ?>";
          //destino += url;
          $.ajax({
              type: "POST",
              url: destino,
              data: dados,
              success: function(response){
                  // TODO faca algo
              },
              error: function(response){
                  // TODO
              }
          });
      });
  });