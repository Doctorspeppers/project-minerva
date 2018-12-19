<?php
/*
    Modelo de json para contas

    {
    "categoria" : "Eletrostática",
    "nomeFormula": "Quantidade de Carga Elétrica",
    "formula": " Q = ( n * e ) ",
    "incog": ["Q", "n", "e"]
},

*/


function abrefuncoes($path)
{
    $types = array(".json", ".csv" ); //Seta os tipos de arquivos
    $dir = new DirectoryIterator($path); //Abre o diretorio
    foreach ($dir as $fileInfo) 
    { //Percorrendo o diretorio arquivo por arquivo
        $ext = strtolower( $fileInfo->getExtension() ); //pega a extensão do arquivo percorrido
        if( in_array( $ext, $types ))
        { // Se existir um arquivo com a extensão ele entra
            foreach ($types as $key => $value) 
            {
                $files[$value][] = $fileInfo->getFilename(); // Ele procura a posição daquele tipo de arquivo, se não tiver ele cria uma nova para
                //aquele tipo de extensão
            }
        }
        if(isset($files)){//Se existirem arquivos
            foreach($files as $typearray => $value)//percorra pelo tipo de array e o conteudo
            {
                if($typearray == ".json")//se for json entra nesse laço
                {
                    $jsondecoded = json_decode($value, True);//Desfaz o json para array
                    foreach($jsondecoded as $equation)//ele separa o array principal da equação
                    {
                        $return[] = $equation;//Adiciona ao return a equação
                    }
                }elseif($typearray == ".csv"){//Se for csv entra nesse
                    ini_set('auto_detect_line_endings', TRUE);/// (PHP's detection of line endings) write at the top.
                    $csvrows = array_map('str_getcsv', file($value)); //Mapeia o csv
                    $csvheader = array_shift($csvrows); //Tira o cabeçalho do csv para relacionar o mesmo 
                    foreach ($csvrows as $row) {//Laço para o relacionamento
                        $return[] = array_combine($csvheader, $row);//Adiciona o relacionamento ao return
                    }
                }

            }
        }    

    }
    return $return;

}

function verificaEquação($equacao, $variaveis)
{
    $equacaoaberta = explode(" ", $equacao);

}

?>