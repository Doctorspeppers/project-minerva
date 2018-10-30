<?php

    $variaveis = buscaVariaveis("json/", $_SESSION["materia"].".json");
?>

<form class="form-horizontal" action="conta.php?acao=dados" method="post">
    <fieldset>
        <!-- Form Name -->
        <legend style="color: white">Escolha as variáveis presente em seu exercício:</legend>
        <!-- Multiple Checkboxes -->
        <div class="form-group">
            <div class="col-md-12">
                <?php foreach($variaveis as $key => $variavel):?>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label for="<?php echo $key ?>">
                                <input type="checkbox" name="variaveis[]" id="<? echo $key ?>" value="<?php echo $key?>">
                                <?php echo $variavel["nome"] ." ( " . $variavel["mascara"] ." ) "?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">Enviar Dados</label>
            <div class="col-md-8">
                <button id="singlebutton" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </fieldset>
</form>