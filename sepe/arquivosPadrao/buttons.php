<style>
    legend {
        color: white;
    }
</style>

<?php switch ($_GET["acao"]):

    case "variaveis": ?>
        <div class="row" style="margin: 30px">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="conta.php?acao=bhaskara" class="btn btn-danger btn-lg btn-block">Bhaskara</a>
                <a href="conta.php?acao=afim" class="btn btn-info btn-lg  btn-block">Função Afim</a>
                <a href="conta.php?acao=arvore" class="btn btn-success btn-lg  btn-block">Arvore de Possibilidade</a>
                <a href="conta.php?acao=determinante" class="btn btn-warning btn-lg  btn-block">Determinante Matriz</a>
            </div>
        </div>
    <?php break;

    case "bhaskara": ?>

        <form class="form-horizontal" action="conta.php?acao=resolveBhaskara" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Bhaskara</legend>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="prependedtext"></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">a</span>
                                <input id="prependedtext" name="a" class="form-control" placeholder="a" type="number" required="">
                            </div>

                        </div>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="prependedtext"></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">b</span>
                                <input id="prependedtext" name="b" class="form-control" placeholder="b" type="number" required="">
                            </div>

                        </div>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="prependedtext"></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">c</span>
                                <input id="prependedtext" name="c" class="form-control" placeholder="c" type="number" required="">
                            </div>

                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Enviar Dados</label>
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        <?php break;

    case "afim": ?>

        <form class="form-horizontal" action="conta.php?acao=resolveAfim" method="post">
            <fieldset>

                <!-- Form Name -->
                <legend>Função Afim</legend>

                <!-- Prepended text-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="prependedtext"></label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">a</span>
                            <input id="prependedtext" name="a" class="form-control" placeholder="a" type="number" required="">
                        </div>

                    </div>
                </div>

                <!-- Prepended text-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="prependedtext"></label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">b</span>
                            <input id="prependedtext" name="b" class="form-control" placeholder="b" type="number" required="">
                        </div>

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Enviar Dados</label>
                    <div class="col-md-4">
                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <?php break;

    case "arvore": ?>

        <form class="form-horizontal" action="conta.php?acao=resolveArvore" method="post">
            <fieldset>

                <!-- Form Name -->
                <legend>Arvore de Possibilidade</legend>

                <!-- Prepended text-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="prependedtext">Digite uma palavra com apenas 4 letras</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">abcd</span>
                            <input id="prependedtext" name="arvore" class="form-control" placeholder="abcd" type="text" required="">
                        </div>

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Enviar Dados</label>
                    <div class="col-md-4">
                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <?php break;

    case "determinante": ?>

        <form class="form-horizontal" action="conta.php?acao=resolveDeterminante" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Determinante Matriz</legend>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textarea">Digite uma matriz </label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">1,1; <br>2,2 </span>
                        <textarea class="form-control" id="textarea" name="determinante">1,1; 2,2</textarea>
                    </div>

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton">Enviar Dados</label>
                <div class="col-md-4">
                    <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
                </div>
            </div>

        </fieldset>
        </form>

        <?php break;

    case "resolveBhaskara":     $bhaskara = bhaskara($_POST["a"],$_POST["b"],$_POST["c"])?>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h4>Resolução</h4>
                <ul>
                    <?php foreach ($bhaskara['passoApasso'] as $passoApasso): ?>
                        <li style="list-style-type: none"><?php echo $passoApasso ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4>Sinal da Função</h4>
                <ul>
                    <li style="list-style-type: none"><?php echo $bhaskara['sinal'];?></li>
                </ul>
                <h4>Vertice</h4>
                <ul>
                    <li style="list-style-type: none"><?php echo $bhaskara['vertice'];?></li>
                </ul>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Voltar para o inicio</label>
                    <div class="col-md-8">
                        <a id="singlebutton" class="btn btn-primary" href="index.php">Voltar</a>
                    </div>
                </div>
            </div>
        </div>

        <?php break;

    case "resolveAfim":     $afim = afim($_POST["a"],$_POST["b"]);?>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h4>Resolução</h4>
                <ul>
                    <?php foreach ($afim['passoApasso'] as $passoApasso): ?>
                        <li style="list-style-type: none"><?php echo $passoApasso ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4>Sinal da Função</h4>
                <ul>
                    <li style="list-style-type: none"><?php echo $afim['sinal'];?></li>
                </ul>
                <h4>Posição</h4>
                <ul>
                    <li style="list-style-type: none"><?php echo $afim['posicao'];?></li>
                </ul>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Voltar para o inicio</label>
                    <div class="col-md-8">
                        <a id="singlebutton" class="btn btn-primary" href="index.php">Voltar</a>
                    </div>
                </div>
            </div>
        </div>

        <?php break;

    case "resolveArvore":     $arvore = arvorePossibilidades($_POST["arvore"]);?>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered" style="text-align: center">
                            <thead>
                            <tr>
                                <th colspan="24" style="text-align: center"><?php echo $_POST["arvore"] ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php foreach ($arvore as $key1 => $value1):?>
                                    <td colspan="6"><?php echo $key1 ?></td>
                                <?php endforeach;?>
                            </tr>
                            <tr><?php
                                foreach ($arvore as $key1 => $value1):
                                    foreach ($arvore[$key1] as $key2 => $value2):?>
                                        <td colspan="2"><?php echo $key2 ?></td>
                                <?php endforeach; endforeach;?>
                            </tr>
                            <tr><?php
                                foreach ($arvore as $key1 => $value1):
                                    foreach ($value1 as $key2 => $value2):
                                        foreach ($value2 as $key3 => $value3):?>
                                            <td colspan="1"><?php echo $key3 ?></td>
                                    <?php endforeach; endforeach; endforeach;?>
                            </tr>
                            <tr><?php
                                foreach ($arvore as $key1 => $value1):
                                    foreach ($value1 as $key2 => $value2):
                                        foreach ($value2 as $key3 => $value3):
                                            foreach ($value3 as $key4 => $value4):?>
                                                <td colspan="1"><?php echo $key4 ?></td>
                                        <?php endforeach; endforeach; endforeach; endforeach;?>
                            </tr>
                            </tbody>
                    </table>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Voltar para o inicio</label>
                    <div class="col-md-8">
                        <a id="singlebutton" class="btn btn-primary" href="index.php">Voltar</a>
                    </div>
                </div>
            </div>
        </div>

        <?php break;

    case "resolveDeterminante":     $determinante = calculaDeterminante($_POST["determinante"]); echo $determinante['passoApasso']['matriz'];?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Voltar para o inicio</label>
                    <div class="col-md-8">
                        <a id="singlebutton" class="btn btn-primary" href="index.php">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php break;

endswitch; ?>