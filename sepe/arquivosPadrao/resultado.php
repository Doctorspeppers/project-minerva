<?php

    $dados = [];
    foreach ($_POST as $keyPost => $post){
        if (empty($post) and $post != "0"){
            $dados[$keyPost] = $keyPost;
        } elseif ($post == "0"){
            $dados[$keyPost] = "0";
        } else {
            $dados[$keyPost] = $post;
        }
    }

    ?>
<style>
    ul {
        margin: 10px;
    }
    h4 {
        margin-top: 20px;
    }
</style>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <?php
        $verdade = true;
        while ($verdade):
    $materia = "json/".$_SESSION["materia"].".json";
    $caminho_variavel = "json/"."variaveis_".$_SESSION["materia"].".json";
    $formulas =  buscaEquacao($materia, $dados);
    $incognitas= '';
    foreach ($dados as $key => $dado){
        if ($key == $dado and gettype($dado) == "string"){
            $incognitas = $key;
        }
    }
    // var_dump($incognitas);
    $count = count($formulas);
    // var_dump($formulas);
        $incognita = "";
        // var_dump($formulas[0]["dados"]);
        foreach ($formulas[0]["dados"] as $key => $dado){
            if ($dado == $key){
                $incognita = $dado;
            }
        }
        if ($incognita != $incognitas) {
            $verdade = true;
        }
        else{
            $verdade = false;
        }
        $verdade = false;
        // var_dump($incognita);
        $resultado = resolveEquacao($formulas[0]["dados"], $formulas[0]["formula"]["incog"], $formulas[0]["formula"]["formula"]);
        $resultado['passoApasso'] = tira_espaco($resultado['passoApasso']);
        $count = count($resultado['passoApasso']) -1;
        // var_dump($resultado['passoApasso'][$count]);
        $resultado['passoApasso'][$count] = medida($resultado['passoApasso'][$count], $caminho_variavel);

    ?>
        <h4>Para descobrirmos "<?php echo $incognita ?>" usamos a formula dx <?php echo $formulas[0]["formula"]["nomeFormula"] ?></h4>
        <ul>
            <?php foreach ($resultado['passoApasso'] as $passoApasso): ?>
                <li style="list-style-type: none"><?php echo $passoApasso ?></li>
            <?php endforeach;
            if (isset($dados)){
                foreach ($formulas[0]["dados"] as $key => $dados1){
                    foreach ($dados as  $keydado => $dados2){
                        if ($dados1 == $key){
                            $dados[$key] = $resultado['resultado'];
                            // var_dump($key);
                            // var_dump($dados[$key]);
                            // var_dump($dados1);
                            // var_dump($key);
                            // var_dump($dados2);
                            // var_dump($keydado);
                            // echo ";";
                            // var_dump($dados[$key]);
                             // var_dump($resultado['resultado']);
                        }
                    }
                }
            }
            foreach ($formulas[0]["dados"] as $key => $dados1){

                foreach ($dados as  $keydado => $dados2){
                    if ($dados2 == $keydado){
                        $verdade = true;
                        // var_dump($keydado);
                        // var_dump($dados2);
                    }
                }
            }
            ?>
        </ul>
    <?php endwhile; ?>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton">Voltar para o inicio</label>
        <div class="col-md-8">
            <a id="singlebutton" class="btn btn-primary" href="index.php">Voltar</a>
        </div>
    </div>
    </div>
</div>