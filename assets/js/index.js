  /* Confirma a exclusão de um registro
  *   @param id (primary key)
  *   @param url (destino)
  */
    function deleteReg(id, url){
        var agree = confirm("Tem certeza de que deseja excluir este registro?");
        if(agree){           
            $("#line"+id).fadeOut('slow');
            $.post(url, {id:id}, function(){

            });
        }else{
            return false;
        }
    }
    
    
    function deleteReg1(id, url) {
        myForm = document.createElement("form");
        myForm.action = url;
        myForm.method = "POST";
        var input = document.createElement("input");
        input.type = "text";
        input.value = id;
        input.name = "id";
        myForm.appendChild(input);
        document.body.appendChild(myForm);
        myForm.submit();
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