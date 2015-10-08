<?php



      function valida_Email($email)
      {
          $string = strtolower($email);
          if (preg_match( '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $string))
          {
                return $string;
          }
      }

      function formatarCPF_CNPJ($campo, $formatado=TRUE)
      {
            # retira formato
            $codigoLimpo = preg_replace("[' '-./ t]", '', $campo);

            # pega o tamanho da string menos os digitos verificadores
            $tamanho = (strlen($codigoLimpo) -2);

            # verifica se o tamanho do código informado é válido
            if ($tamanho != 9 && $tamanho != 12)
            {
                return FALSE;
            }

            if ($formatado)
            {
                # seleciona a máscara para cpf ou cnpj
                $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##';

                $indice = -1;
                for ($i=0; $i < strlen($mascara); $i++)
                {
                    if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
                }

                #retorna o campo formatado
                $retorno = $mascara;
            }
            else
            {
                //se não quer formatado, retorna o campo limpo
                $retorno = $codigoLimpo;
            }
            return $retorno;

      } # formatarCPF_CNPJ


      function objeto2Array($objeto)
      {
          $arr = array();
          for($i = 0; $i < count($objeto); $i++)
          {
              $arr[] = get_object_vars( $objeto[$i] );
          }
          return $arr;
      }

      function zeroAleft($campo=NULL, $zeros=1)
      {
        # Define a quantidade de números preenchendo a esquerda com zeros
        if ( isset($campo) ) { return str_pad( $campo, (int)$zeros, "0", STR_PAD_LEFT ); }
        else { return FALSE; }
      }


      # Acrescentando a função para servidores anteriores ao PHP 5.3 (precisei dessa função e meu server era 5.2)
      # (PHP 5 >= 5.3.0)
      # array_replace — Replaces elements from passed arrays into the first array
      if (!function_exists('array_replace'))
      {
        function array_replace( array &$array, array &$array1 )
        {
          $args = func_get_args();
          $count = func_num_args();
          for ($i = 0; $i < $count; ++$i) {
            if (is_array($args[$i])) {
              foreach ($args[$i] as $key => $val) {
                $array[$key] = $val;
              }
            }
            else {
              trigger_error(
                __FUNCTION__ . '(): Argumento #' . ($i+1) . ' não é um array',
                E_USER_WARNING
              );
              return NULL;
            }
          }
          return $array;
        }
      }
/* End of file funcoes_helper.php */
/* Location: helpers/funcoes_helper.php */