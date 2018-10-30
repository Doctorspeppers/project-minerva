<?php

/**  ----  Funcoes matematica   ----  */

/**
 * @param $a
 * @param $b
 * @param $c
 * @return array
 */
function bhaskara($a, $b, $c){
    $passoApasso = [];

    $delta = pow( $b,2) - 4 * $a * $c;
    @eval('$delta =' . $delta . ';');

    $equacao["x1"] = "( - $b + pow($delta,1/2) ) / (2 * $a)";
    @eval('$equacao["x1"] = (float)' . $equacao["x1"] . ';');

    $equacao["x2"] = "( - $b - pow($delta,1/2) ) / (2 * $a)";
    @eval('$equacao["x2"] = (float)' . $equacao["x2"] . ';');

    $passoApasso[] = 'x = ( - b +/- ²√Δ ) / 2 * a';
    $passoApasso[] = 'Δ = b² - 4 * a * c';
    $passoApasso[] = 'Δ = ' . $b . '- 4 * ' . $a . ' * ' . $c;
    $passoApasso[] = 'Δ = ' . $delta;
    $passoApasso[] = 'x = ( - ' . $b . ' +/- ²√' . $delta . ' ) / 2 *' . $a;
    $raizDelta =  (float) pow($delta, 1/2);
    $passoApasso[] = 'x = ( - ' . $b . ' +/- ' . $raizDelta . ' ) / ' . 2 * $a;
    $passoApasso[] = 'x\' = ( - ' . $b . ' + ' . $raizDelta . ' ) / ' . 2 * $a;
    $passoApasso[] = 'x\' = ' . $equacao['x1'];
    $passoApasso[] = 'x\'\' = ( - ' . $b . ' - ' . $raizDelta . ' ) / ' . 2 * $a;
    $passoApasso[] = 'x\'\' = ' . $equacao['x2'];

    if ($delta < 0 and $a < 0) {
        $sinal = "A função é sempre negativa!";

    }elseif ($delta < 0 and $a > 0) {
        $sinal = "A função é sempre negativa!";

    }elseif ($delta > 0 and $a < 0) {
        $sinal = "[-∞, " . $equacao['x1'] . " ]U[ " . $equacao['x2'] . " , ∞] a Função é negativa!; [ " . $equacao['x1'] . " , " . $equacao['x2'] . " ] a Função é positiva!";

    } else {
        $sinal = "[-∞, " . $equacao['x1'] . " ]U[ " . $equacao['x2'] . ", ∞] a Função é positiva!; [ " . $equacao['x1'] . " , " . $equacao['x2'] . " ] a Função é negativa!";

    }

    $x = -($b / 2*$a);
    $y = -($delta)/4*$a;

    $vertice =  "[ $x , $y ]";

    $resposta = [
        "passoApasso" => $passoApasso,
        "sinal"       => $sinal,
        "vertice"    =>  $vertice
    ];

    return $resposta;
}

/**
 * @param $a
 * @param $b
 * @return array
 */
function afim($a,$b){
    $passoApasso = [];

    $equacao = $a/$b;
    @eval('$equacao = (float)' . $equacao . ';');

    $passoApasso[] = 'x = a / b';
    $passoApasso[] = 'x = ' . $a . ' / ' . $b;
    $passoApasso[] = 'x = ' . (float)$equacao;

    if ($a < 0) {
        $posicao = "Decrescente";
    } elseif ($a > 0) {
        $posicao = "Crescente";
    } else {
        $posicao = "Continua";
    }

    $sinal = '[$b ; ∞[ x é positivo e para [  -∞; $b [ x é negativo';

    $resposta = [
        "passoApasso" => $passoApasso,
        "sinal"       => $sinal,
        "posicao"     => $posicao
    ];

    return $resposta;
}

/**
 * @param $string
 * @return array
 */
function arvorePossibilidades($string){
    $count = strlen($string);

    $stringArray = [];
    $fatorial = 1;
    for ($i = 0; $i < $count; $i++){
        $stringArray[] = $string[$i];
        $fatorial = $fatorial * ($i + 1);
    }

    $possibilidades = [];
    foreach ($stringArray as $string1){
        $possivel = [];
        foreach ($stringArray as $string2){
            if ($string1 != $string2){
                $possivel[$string2] = [];
                foreach ($stringArray as $string3){
                    if ($string1 != $string2 and $string1 != $string3 and $string2 != $string3) {
                        $possivel[$string2][$string3] = [];
                        foreach ($stringArray as $string4){
                            if ($string4 != $string1 and $string4 != $string2 and $string3 != $string4) {
                                $possivel[$string2][$string3][$string4] = '';
                            }
                        }
                    }
                }
            }
        }
        $possibilidades[$string1] = $possivel;
    }


    return $possibilidades;
}

/**
 * @param $matriz
 * @return array
 */
function calculaDeterminante($matriz)
{
    $matriz = explode('; ' , $matriz);
    $count = count($matriz);

    $matrizNova = [];
    foreach ($matriz as $key => $mat) {
        $linha = explode(',', $mat);
        foreach ($linha as $numero) {
            $matrizNova[$key][] = $numero;
        }
    }

    $constroiTable = "<table class=\"table table-bordered\" style='text-align: center'><tbody>";
    foreach ($matrizNova as $key => $matriz1){
        $constroiTable = $constroiTable . "<tr>";
        foreach ($matriz1 as $matriz2){
            $constroiTable = $constroiTable . "<td>" . $matriz2 . "</td>";
        }
        $constroiTable = $constroiTable . "</tr>";
    }
    $constroiTable = $constroiTable . "</tbody></table>";
    $passoApasso['matriz'] = $constroiTable;

    $determinante = [];
    if ($count == 2){
        $determinante = '(' . $matrizNova[0][0] . '*' . $matrizNova[1][1] . ')-('. $matrizNova[0][1] . '*' . $matrizNova[1][0]  .')';
    } else {
        $termo = '';
        $j = 0;
        $posiJ = 0;
        $verificaSinal = false;
        for ($mutiplica = 0; $mutiplica < 2 * $count; $mutiplica++) {
            if ($mutiplica == $count) {
                $posiJ = $count - 1;
                $verificaSinal = true;
            }
            $j = $posiJ;
            for ($i = 0; $i < $count; $i++) {
                if ($j >= $count) {
                    $j = 0;
                } elseif ($j < 0 and $verificaSinal) {
                    $j = $count - 1;
                }
                if (empty($termo)){
                    $termo =  $matrizNova[$i][$j];
                } else {
                    $termo = $termo . '*' . $matrizNova[$i][$j];
                }


                if ($verificaSinal) {
                    $j--;
                } else {
                    $j++;
                }
            }
            if ($mutiplica < $count and $mutiplica > 0) {
                $determinante[] = '+ (' . $termo . ')';
            } elseif ($mutiplica < 2 * $count and $mutiplica > 0) {
                $determinante[] =  '- (' . $termo . ')';
            } else {
                $determinante[] =  '(' . $termo . ')';
            }
            $termo = null;

            if ($verificaSinal) {
                $posiJ--;
            } else {
                $posiJ++;
            }
        }
    }
    $passoApasso['determinante'] = $determinante;
    @eval('$determinante = ' . $determinante . ';');


    return [
        'determinante' => $determinante,
        'passoApasso'  => $passoApasso
    ];
}


/**  ----  Funcoes funcionamento   ----  */

/**
 * @param array $equacao
 * @return string
 */
function passoApasso(array $equacao){
    $operacoes           = ["+", "-", "/", "*", ",1/2)", ",2)", "pow("];
    $operacoesMascaradas = ["+", "-", "÷", "x", ")¹/²", ")²", "("];

    $passoApasso = '';
    $count = count($equacao) -1;
    $d = 0;
    $explode = "";
    foreach ($equacao as $equa){
        $explode = $explode.' '.$equa;
    }
    $explode = explode(" ", $explode);
    foreach ($explode as $key => $ex) {
        $verificaOp = true;
        foreach ($operacoes as $key => $op){
            if ($ex == $op){
                $passoApasso = $passoApasso .' '. $operacoesMascaradas[$key];
                $verificaOp = false;
                break;
            }
        }
        if ($ex == "" AND $count == $d) {
            }
        elseif ($verificaOp){
            $passoApasso = $passoApasso .' '. $ex;
        }
        $d++;
    }
    return $passoApasso;
}

/**
 * @param array $dados
 * @param array $incognitas
 * @param $formula
 * @return array
 */
function resolveEquacao(array $dados, array $incognitas, $formula){

    $resultado = "ainda nao deu"; //Define valor para resultado

    $operacoes         = ["+", "-", "/", "*", ",1/2)", ",2)"];
    $operacoesInversas = ["-", "+", "*", "/", ",2)", ",1/2)"];

    $equacaoAberta = explode(" ", $formula);
    $equacao = [];
    $passoApasso = [];
    $passoApasso[] = passoApasso($equacaoAberta);
    $verificaPow = false;
    $incognitaBuscada = "";
    foreach ($dados as $keyDado => $dado){
        if($keyDado == $dado){
            $incognitaBuscada = $dado;
        }
    }

    foreach ($equacaoAberta as $termo){
        $verificaOperacao = true;
        foreach ($operacoes as $operacao){
            if ($termo == $operacao or $termo == "="){
                $verificaOperacao = false;
            }
        }

        $verificaNumero = false;
        foreach ($incognitas as $incognita){
            if ($incognita == $termo){
                $verificaNumero = true;
            }
        }
        if ($verificaOperacao and $verificaNumero){
            if (isset($dados[$termo])){
                $equacao[] = $dados[$termo];
            }
        } else {
            $equacao[] = $termo;
        }
    } //Substitui incognitas

    $passoApasso[] = passoApasso($equacao);

    $igual = false;
    $lado[0] = '';
    $lado[1] = '';
    $posicaoIgual = 0;
    $posicaoIncognita = 0;
    foreach ($equacao as $key => $termo){
        if ($termo == '='){
            $igual = true;
            $posicaoIgual = $key;
        } elseif ($igual){
            $lado[1] =  $lado[1] . $termo;
            foreach ($incognitas as $incognita){
                if ($termo == $incognita){
                    $posicaoIncognita = $key;
                }
            }
        } else {
            $lado[0] = $lado[0] . $termo;
            foreach ($incognitas as $incognita){
                if ($termo == $incognita){
                    $posicaoIncognita = $key;
                }
            }
        }
    } //Separa os dois lados da equacao, verica a posição do igual e da incognita

    $primeiroPow = true;
    foreach ($equacao as $key => $eq){
        if ($eq == 'pow(' and $primeiroPow){
            $posicaoPow['abre'] = $key;
            $primeiroPow = false;
        } elseif ($eq == ',1/2)'){
            $posicaoPow['fecha'] = $key;
        }
    }
    if  (!isset($posicaoPow['fecha']) or !isset($posicaoPow['abre'])){
        $posicaoPow['fecha'] = 0;
        $posicaoPow['abre'] = 0;
    }

    if ($posicaoIncognita < $posicaoIgual){


        @eval('$resultado =' . $lado[1] . ';');  //Se a incognita ja estiver isolada
        $passoApasso[] = $incognitaBuscada . ' = ' . $resultado;

    } /*Verica a posicao da incognita, se ela estiver isolada resolva a equação*/ else {

        @eval('$lado[0] =' . $lado[0] . ';');

        if (isset($posicaoPow)){
            if ($posicaoPow['abre'] == 2 and $posicaoPow['fecha'] == count($equacao) -1){
                $novaEquacao = [];
                foreach ($equacao as $key => $eq){
                    if ($key == 0){
                        @eval('$lado[0] =' . 'pow(' .$lado[0] . ',2);');
                        $novaEquacao[] = $lado[0];
                    } elseif ($posicaoPow['abre'] != $key and $posicaoPow['fecha'] != $key){
                        $novaEquacao[] = $eq;
                    }
                }
                $equacao = $novaEquacao;
                $passoApasso[] = passoApasso($equacao);
                foreach ($equacao as $key => $eq){
                    foreach ($incognitas as $incognita){
                        if ($eq == $incognita){
                            $posicaoIncognita = $key;
                        } elseif ( '=' == $eq){
                            $posicaoIgual = $key;
                        }
                    }

                }
            }
        } //Pow

        $verificaAlocarLado0 = true;
        $equacaoNova = [];
        foreach ($equacao as $key => $eq){
            if ($key < $posicaoIgual and $verificaAlocarLado0){
                $equacaoNova[] = $lado[0];
                $verificaAlocarLado0 = false;
            } elseif ($key >= $posicaoIgual){
                $equacaoNova[] = $eq;
            }
        } //Realoca as posiçoes da equação
        $equacao = $equacaoNova;
        $passoApasso[] = passoApasso($equacao);

        $i = 0;
        $verificaParenteses = false;
        $termo = [];
        $verificaAlocarTermo = false;
        $termoResolvido = '';
        $termoIncognita = -1;
        $novaEquacao = [];
        foreach ($equacao as $key => $eq){
            if (!isset($termo[$i])){
                $termo[$i] = '';
            }

            if ($eq == '(' and $key > $posicaoIgual){
                $verificaParenteses = true;
                $verificaAlocarTermo = true;
            } elseif ($eq == ')' and $key > $posicaoIgual){
                $verificaParenteses = false;
                $i++;
            } elseif ($verificaParenteses){
                $termo[$i] = $termo[$i] . $eq . ' ';
                if ($key == $posicaoIncognita){
                    $termoIncognita = $i;
                }
            } else {
                if ($verificaAlocarTermo){
                    if ($termoIncognita != $i - 1){
                        @eval('$termoResolvido =' . $termo[$i - 1 ]. ';');
                    } else {
                        $termoResolvido = $termo[$i - 1];
                    }

                    $novaEquacao[] = $termoResolvido;
                    $verificaAlocarTermo = false;

                    foreach ($operacoes as $op){
                        if ($op == $eq){
                            $novaEquacao[] = $eq;
                        }
                    }
                } else {
                    $novaEquacao[] = $eq;
                }
            }
        } //Separa e resolve os termos
        if ($verificaAlocarTermo){
            if ($termoIncognita != $i -1){
                @eval('$termoResolvido =' . $termo[$i-1] . ';');

            } else {
                $termoResolvido = $termo[$i-1];
                $termoResolvido = explode(" ", $termoResolvido);
            }
            foreach ($termoResolvido as $key => $termos) {
                if ($termos == "") {
                    
                }
                else{
                    $novaEquacao[] = $termos;    
                }
                
            }
        } //Faz parte ^

        $equacao = $novaEquacao;
        $passoApasso[] = passoApasso($equacao);
        if (isset($termo[$termoIncognita])){
            foreach ($equacao as $key => $eq){
                if ( '=' == $eq){
                    $posicaoIgual = $key;
                }
            }

            $lado1semIncognita = '';
            foreach ($equacao as $key => $eq){
                if ($eq != $termo[$termoIncognita] and $posicaoIgual < $key){
                    $lado1semIncognita = $lado1semIncognita . $eq;
                } elseif ($eq == $termo[$termoIncognita]){
                    $lado1semIncognita = $lado1semIncognita . 0;
                }
            }
            $equacaoNova = [];
            $count = count($lado[0]);
            if ($count == 1) {
                $equacaoNova[0] = $lado[0];   
            }
            else{
            @eval('$equacaoNova[0] =' . $lado[0] . '-1*(' . $lado1semIncognita . ');');
            }
            $equacaoNova[1] = '=';
            foreach (explode(" ", $termo[$termoIncognita]) as $eq){
                $equacaoNova[] = $eq;
            }
            $equacao = $equacaoNova;
            $equacao = tira_espaco($equacao);
            // var_dump($equacao);
            $passoApasso[] = passoApasso($equacao);

            $verificaDivisao = false;
            foreach ($equacao as $key => $eq){
                if ($eq == '/'){
                    $verificaDivisao = true;
                    $posicaoDivisao = $key;
                }
            }

            if ($verificaDivisao){

                foreach ($equacao as $key => $eq){
                    foreach ($incognitas as $incog){
                        if ($incog == $eq){
                            $posicaoIncognita = $key;
                        }
                    }
                }

                if ($posicaoIncognita > $posicaoDivisao){
                    $lado1semIncognita = '';
                    for ($i = 2; $i < $posicaoDivisao; $i++){
                        $lado1semIncognita = $lado1semIncognita . $equacao[$i];
                    }
                    @eval('$ladosemIncognita =' . $lado1semIncognita . ';');
                    $t = $incognitaBuscada . ' = ' . $lado1semIncognita . ' / ' . $equacao[0];
                    $r = explode(" ", $t); 
                    $passoApasso[] = passoApasso($r);
                    @eval('$resultado =' . $lado1semIncognita . '/' . $equacao[0] . ';');
                    $t = $incognitaBuscada . ' = ' . $resultado;
                    $r = explode(" ", $t);
                    $passoApasso[] = passoApasso($r); 
                } else {
                    $lado1semIncognita = '';
                    $count = count($equacao);
                    for ($i = $posicaoDivisao + 1; $i < $count; $i++){
                        $lado1semIncognita = $lado1semIncognita . $equacao[$i];
                    }
                    @eval('$ladosemIncognita =' . $lado1semIncognita . ';');
                    $t = $incognitaBuscada . ' = ' . $lado1semIncognita . ' * ' . $equacao[0];
                    $r = explode(" ", $t);
                    // var_dump($r);
                    $passoApasso[] = passoApasso($r);
                    @eval('$resultado =' . $equacao[0] . '*' . $lado1semIncognita . ';');
                    $t = $incognitaBuscada . ' = ' . $resultado;
                    $r = explode(" ", $t);
                    // var_dump($r);
                    $passoApasso[] = passoApasso($r);
                }

            } else {
                foreach ($equacao as $key => $eq){
                    foreach ($incognitas as $incognita){
                        if ($eq == $incognita){
                            $posicaoIncognita = $key;
                        } elseif ( '=' == $eq){
                            $posicaoIgual = $key;
                        }
                    }

                }

                $primeiroPow = true;
                unset($posicaoPow);
                foreach ($equacao as $key => $eq){
                    if ($eq == 'pow(' and $primeiroPow){
                        $posicaoPow['abre'] = $key;
                        $primeiroPow = false;
                    } elseif ($eq == ',2)'){
                        $posicaoPow['fecha'] = $key;
                    }
                }

                if (isset($posicaoPow)) {
                    if ($posicaoIncognita > $posicaoPow["abre"] and $posicaoIncognita < $posicaoPow['fecha']) {
                        $novaEquacao = [];
                        $constroiPow = '';
                        $posicaoIncognita = -1;
                        foreach ($equacao as $key => $eq){
                            if ($key >= $posicaoPow["abre"] and $key <= $posicaoPow['fecha']){
                                $constroiPow = $constroiPow . ' ' . $eq;
                            } else {
                                $novaEquacao[] = $eq;
                                ++$posicaoIncognita;
                            }
                            if ($key == $posicaoPow['fecha'] ){
                                $novaEquacao[] = $constroiPow;
                            }
                        }
                        $equacao = $novaEquacao;
                        $passoApasso[] = passoApasso($equacao);
                        $verificaPow = true;
                    }
                }


                $isoladoDaIncognita = '';
                foreach ($equacao as $key => $eq){
                    if ($key > $posicaoIgual and $key != $posicaoIncognita){
                        $isoladoDaIncognita = $isoladoDaIncognita . $eq;
                        // echo $eq;
                    } elseif ($key == $posicaoIncognita){
                        $isoladoDaIncognita = $isoladoDaIncognita . $eq;
                    }
                }

                if ($verificaPow){
                    echo '$isoladoDaIncognita =' . $isoladoDaIncognita . ';';
                    @eval('$isoladoDaIncognita =' . $isoladoDaIncognita . ';');
                    $y = $incognitaBuscada . ' = ' . 'pow( ' . $equacao[0] . ' / ' . $isoladoDaIncognita . ' ,1/2)';
                    $r = explode(" ", $y);
                    $passoApasso[] = passoApasso($r);
                    @eval('$resultado =' . 'pow(' . $equacao[0] . ' / ' . $isoladoDaIncognita . ',1/2);');
                    $y = $incognitaBuscada . ' = ' . $resultado;
                    $r = explode(" ", $y);
                    $passoApasso[] = passoApasso($r);
                } else {
                    @eval('$isoladoDaIncognita =' . $isoladoDaIncognita . ';');
                    $y = $incognitaBuscada . ' = ' . $equacao[0] . ' / ' . $isoladoDaIncognita;
                    $r = explode(" ", $y);
                    $passoApasso[] = passoApasso($r);
                    @eval('$resultado =' . $equacao[0] . '/' . $isoladoDaIncognita . ';');
                    $y = $incognitaBuscada . ' = ' . $resultado;
                    $r = explode(" ", $y);
                    $passoApasso[] = passoApasso($r);
                }

            }

        } else {
            $primeiroPow = true;
            $posicaoPow = [];
            foreach ($equacao as $key => $eq){
                if ($eq == 'pow(' and $primeiroPow){
                    $posicaoPow['abre'] = $key;
                    $primeiroPow = false;
                } elseif ($eq == ',2)'){
                    $posicaoPow['fecha'] = $key;
                }
            }

            if (isset($posicaoPow['fecha'])) {
                if ($posicaoIncognita > $posicaoPow["abre"] and $posicaoIncognita < $posicaoPow['fecha']) {
                    $novaEquacao = [];
                    $constroiPow = '';
                    $posicaoIncognita = -1;
                    foreach ($equacao as $key => $eq){
                        if ($key >= $posicaoPow["abre"] and $key <= $posicaoPow['fecha']){
                            $constroiPow = $constroiPow . ' ' . $eq;
                        } else {
                            $novaEquacao[] = $eq;
                            ++$posicaoIncognita;
                        }
                        if ($key == $posicaoPow['fecha'] ){
                            $novaEquacao[] = $constroiPow;
                        }
                    }
                    $equacao = $novaEquacao;
                    $passoApasso[] = passoApasso($equacao);
                    $verificaPow = true;
                }
            }


            foreach ($equacao as $key => $eq){
                foreach ($incognitas as $incognita){
                    if ($eq == $incognita){
                        $posicaoIncognita = $key;
                    } elseif ( '=' == $eq){
                        $posicaoIgual = $key;
                    }
                }
            }

            foreach ($equacao as $key => $eq){
                if ($verificaPow){
                    if ($constroiPow == $eq){
                        $posicaoIncognita = $key;
                    }
                }
            }

            $lado1semIncognita = '';
            foreach ($equacao as $key => $eq){
                if ($key != $posicaoIncognita and $posicaoIgual < $key){
                    $lado1semIncognita = $lado1semIncognita . $eq; //BEAT
                }
            }

            if ($verificaPow){
                @eval('$isoladoDaIncognita =' . $lado1semIncognita . ';');
                $passoApasso[] = $incognitaBuscada . ' = ' . 'pow( ' . $equacao[0] . ' -1 * ( ' . $lado1semIncognita . ' ) ,1/2)';
                //aqui
                @eval('$resultado =' . 'pow(' . $equacao[0] . '-1*(' . $lado1semIncognita . ') ,1/2);');
                $passoApasso[] = $incognitaBuscada . ' = ' . $resultado;
            } else {
                @eval('$isoladoDaIncognita =' . $lado1semIncognita . ';');
                $passoApasso[] = $incognitaBuscada . ' = ' . $equacao[0] . '-1 * ( ' . $lado1semIncognita . ' )';
                @eval('$resultado =' . $equacao[0] . '-1*(' . $lado1semIncognita . ') ;');
                $passoApasso[] = $incognita . ' = ' . $resultado;
            }
        }
    }
    $final = [
        'resultado' => $resultado,
        'passoApasso' => $passoApasso
    ];
    $final['passoApasso'] = array_unique($final['passoApasso']);
    $final['passoApasso'] = array_unique($final['passoApasso']);
    return $final;
}

/**
 * @param array $formulasComIncognitas
 * @param array $dados
 * @param $apenasCompletas
 * @return array
 */
function pontua(array $formulasComIncognitas, array $dados, $apenasCompletas){
    $formulasPossiveis = [];
    $verificaFormula = false;
    foreach ($formulasComIncognitas as $key => $formulaCI){
        $pontos = 0;
        $formulaCI = (array) $formulaCI;
        foreach ($formulaCI["incog"] as $incog){
            foreach ($dados as $keyDado => $value){
                if ($keyDado == $incog){
                    $pontos++;
                }
            }
            if ($pontos >= count($formulaCI["incog"])){
                $formulasPossiveis[] = $formulaCI;
                $verificaFormula = true;
            } elseif ($pontos >= count($formulaCI["incog"]) -1 and !$apenasCompletas){
                $formulasPossiveis[] = $formulaCI;
            }
        }

    } //Puxa formulas apartir de pontuação

    return [
        "formulasPossiveis" => $formulasPossiveis,
        "verificaFormula" => $verificaFormula // Per3s
    ];
}

/**
 * @param $caminho
 * @param array $dados
 * @return array
 */
function buscaEquacao($caminho, array $dados){
    $formulas = json_decode(file_get_contents($caminho, true));
    // var_dump($dados);
    $incognitas= [];
    foreach ($dados as $key => $dado){
        if ($key == $dado and gettype($dado) == "string"){
            $incognitas[] = $key;
        }
    } //Encontra Incognitas

    $formulasComIncognitas = [];
    foreach ($formulas as $key => $formula){
        $formula = (array) $formula;
        foreach ($formula["incog"] as $incog){
            foreach ($incognitas as $incognita){
                if ($incognita == $incog){
                    $formulasComIncognitas[] = $formula;
                    break;
                }
            }
        }

    } //Puxa apenas os arrays com incognitas

    $pontua = pontua($formulasComIncognitas, $dados, true);
    $formulasPossiveis = $pontua["formulasPossiveis"];
    $verificaFormula   = $pontua["verificaFormula"];

    $resultadoFinal = [];
    if ($verificaFormula and count($incognitas) == 1){
        $resultadoFinal[] = [
            "formula" => $formulasPossiveis[0],
            "dados"   => $dados
        ];
    } else {
        $pontua = pontua($formulas, $dados, false);

        $formulasPossiveis = $pontua["formulasPossiveis"];
        $verificaFormula   = $pontua["verificaFormula"];

        foreach ($formulasPossiveis as $formulaPossivel){
            foreach ($formulaPossivel["incog"] as $incog){
                $verificaIncog = true;
                foreach ($dados as $keyDado => $value){
                    if ($keyDado == $incog){
                        $verificaIncog = false;
                    }
                }
                if ($verificaIncog){
                    $dados[$incog] = $incog;
                }
            }
        }

        $pontua = pontua($formulas, $dados, true);

        $formulasPossiveis = $pontua["formulasPossiveis"];

        foreach ($formulasPossiveis as $key => $formulaPossivel){
            $novoDado = [];
            foreach ($formulaPossivel["incog"] as $incog){
                foreach ($dados as $keyDado => $dado){
                    if ($keyDado == $incog){
                        $novoDado[$keyDado] = $dado;
                    }
                }
            }
            $resultadopre[] = [
                "formula" => $formulaPossivel,
                "dados"   => $novoDado
            ];
        }
        // var_dump($resultadopre);
        foreach ($resultadopre as $key => $resultado) {
            $x = 0;
            foreach ($resultado['dados'] as $keyDado => $dado) {
            $count = count($resultado['formula']['incog']) - 1;
                        if ($dado != $keyDado) {
                            $x++;
                            // echo $dado;
                            // echo $incog;
                        }
            }
            if ($x == $count) {
                //$resultadoFinal = $resultado; 
                // echo $x;
                // echo "/";
                // var_dump($resultado);
                $resultadoFinal[] = $resultado;
            }
        }
    }



    return $resultadoFinal;
}

/**
 * @param $caminho
 * @return array
 */
function buscaVariaveis($caminho, $materia){
    $formulas      = json_decode(file_get_contents($caminho . $materia, true));
    $variaveisJson = (array) json_decode(file_get_contents($caminho . "variaveis_" . $materia, true));

    $variaveis = [];
    foreach ($formulas as $formula){
        $formula = (array) $formula;
        foreach ($formula["incog"] as $incog){
            $verificaVariavel = true;
            foreach ($variaveis as $variavel){
                if ($variavel == $incog){
                    $verificaVariavel = false;
                }
            }

            if ($verificaVariavel){
                $variaveis[] = $incog;
            }

        }
    }

    $variaveisNovas = [];
    foreach ($variaveisJson as $keyJson => $variavelJson){
        foreach ($variaveis as $key => $variavel){
            if ($variavel == $keyJson){
                $variaveisNovas[$variavel] = (array) $variavelJson;
            }
        }
    }


    return $variaveisNovas;
}

/**
 * @param $variaveis
 * @param $escolhidas
 * @return array
 */
function arrumaVariaveis($variaveis, $escolhidas){
    $mascaradas = [];

    foreach ($variaveis as $key => $variavel){
        foreach ($escolhidas as $escolhida){
            if ($key == $escolhida){
                $mascaradas[$key] = $variavel;
            }
        }
    }

    return $mascaradas;
}

/**
 * @param $acao
 * @param $caminho
 */
function rotas($acao){
    if ($_SESSION["materia"] == "matematica"){
        include "arquivosPadrao/buttons.php";
    } else {
        switch ($acao) {
            case "variaveis":
                include "arquivosPadrao/formVariaveis.php";
                break;

            case "dados":
                include "arquivosPadrao/formDados.php";
                break;

            case "resultado":
                include "arquivosPadrao/resultado.php";
                break;

            default:
                break;
        }
    }
}
function medida ($incognita_formula, $caminho_variavel){
    $incognita = explode(" ", $incognita_formula);
    // var_dump($incognita);
    $variaveis = json_decode(file_get_contents($caminho_variavel, true));
    $i = 0;
    if ($incognita[$i] == "") {
        $i = 1;
    }
    foreach ($variaveis as $key => $variavel) {
        if ($incognita[$i] == $variavel->mascara) {
            $incognita_formula = $incognita_formula . " ". $variavel->unidade;
            // var_dump($variavel->mascara);
            // echo "oi";
            // var_dump($incognita_formula);

            // var_dump($variavel->mascara);
        }
            // var_dump($variavel->unidade);
    }
return $incognita_formula;
}
function tira_espaco($formula){
    foreach ($formula as $key => $formulinha) {
        if ($formulinha == "") {
            
        }
        else{
            $equacao[] = $formulinha;
        }
    }
    return $equacao;
}