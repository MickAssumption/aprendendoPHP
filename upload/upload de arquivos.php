<!DOCTYPE html>
<!-- ATENÇÃO!!
Esse código é apenas para fins de estudo, análise e pesquisa. Pois o mesmo contém diversas falhas.
-->

<body>
    <?php
        if(isset($_POST['enviar-formulario'])):
            $formatosPermitidos = array("png", "jpg", "jpeg", "gif"); //veficiação de formato permitido
            $registro = count($_FILES['arquivo']['name']);//recebe o número de arquivos enviados.
            $contador = 0;

            while ($contador < $registro):
            /*echo '<pre>'; 
            var_dump($_FILES); 
            echo '</pre>';//usada para ver o conteúdo do upload.*/
            $extensao = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION);
            $nomeAntigo = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_FILENAME);
            //no files, ele escolhe o nome do array do input, para chegar nos dados do nome, então usa o parmetro opiciona de rernar apenas a extensão. 

            if(in_array($extensao, $formatosPermitidos)): //verifica se o valor da variavel extensao está dentro do array formatosPermitidos.
                $pasta = "upload/"; //pasta onde será armazenado o arquivo
                $temporario = $_FILES['arquivo']['tmp_name'][$contador]; //o local defult pra onde o arquivo vai
                $novoNome = uniqid(). "$extensao"; //o nome do arquivo que será uma chave de indentificação única pra não ter problema. Tem o ponto da concatenação e o ponto da extensão.
                    if(move_uploaded_file($temporario, $pasta.$novoNome)): //uso da função move_upload_file para mandar pra pasta certa com o nome certo.
                        echo "tudo certo, upload do $nomeAntigo feito em $pasta.$novoNome";
                    else:
                        echo "nao deu pra mover pra past, ta tudo no $temporario";
            

                    endif;
            else:
                echo "voce enviou um arquivo no formato $extensao , ta errado.";
            endif;
                $contador ++;
            endwhile;
        else:
            echo "vc não enviou nada";
        endif;

    ?>

    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST" enctype="multipart/form-data">; <!-- para upload, no form é preciso colocar o metodo post e o enctype. Utilizo o 'SCRIPT_NAME', para apontar esta página, por ser mais seguro-->

        <input type="file" name="arquivo[]" multiple><br> <!-- para fazer os uploads dos arquivos, foi adicionado multiples e especificado um array para o name-->
        <input type="submit" name="enviar-formulario">

</body>

</html>