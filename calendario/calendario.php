<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
    <style>        
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        #calendario-container {                        
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;            
        }
        .mes-container {
            margin: 10px;
        }
        header ul {
            display: flex;
            justify-content: space-around;
            list-style-type: none;           
        }
        ul a{
            list-style-type: none;
            text-decoration: none;
            color: blue;
        }
        header {
            background-color: gray;
            padding: 20px;
            text-align: center;
        }
        table{            
            width: 100%; /* Garante que a tabela preencha o contêiner */
            border-collapse: collapse;
        }
        table th, td {
            border: 1px solid black;
        }
        th, td {
            background-color: lightgray;
            padding: 5px;
            text-align: center;
        }
        h2 {text-align: center;}
    </style>
</head>
<body>

    <header>
        <ul>
            <li><a href="calendario.php">Home</a></li>
            <li><a href="../dateShowSite/program.php">Data</a></li>
            <li><a href="#">Sobre</a></li>
        </ul>
    </header>

    <main>
        <h1><?php exibirMensagem();?></h1>
    </main>
    
    <div id="calendario-container">        
        <?php calendario(1);?>
    </div>
</body>
</html>


<?php
function linha($semana){    

    echo "<tr>";
    for($i = 0; $i <= 6; $i++){
        if(isset($semana[$i])){

            // exibir sábado em vermelho
            if($i == 6){
                echo "<td style='color: red;'>{$semana[$i]}</td>";  // imprime o dia na posição $i da semana em vermelho
            }else{
                echo "<td>{$semana[$i]}</td>";  // imprime o dia na posição $i da semana
            }
        }else{
            echo "<td></td>";  // imprime um espaço vazio caso não haja um dia na posição $i da semana
        }
    }
    echo "</tr>";
}

function cabecalho(){
    echo "
        <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sáb</th>
        </tr>
    ";
}

function exibirNomeMes($mes){
    $nomeMes = date('F', mktime(0, 0, 0, $mes, 1));
    echo "<h2>{$nomeMes}</h2>";
}

function calendario($mes){
    
    if($mes > 12){      // caso base
        return 0;
    }else{

        echo "<div class='mes-container'>";

        exibirNomeMes($mes);    // exibe o nome do mês

        echo "<table border='1'>"; 
        
        cabecalho(); // imprime o cabeçalho 
        
        $dia = 1;   
        $semana = array();  
        $diaAtual = date('j'); 
        $mesAtual = date('n');

        // Descobre o primeiro dia do mês
        $primeiroDiaMes = date('w', mktime(0, 0, 0, $mes, 1));

        // preencher os dias vazios até o primeiro dia do mês
        for($i=0; $i < $primeiroDiaMes; $i++){
            array_push($semana, ''); // adiciona um dia vazio à semana
        }
        
        while($dia <= date('t', mktime(0, 0, 0, $mes, 1))){
            
            // verifica se o dia atual deve ser exibido em negrito
            $displayDia = (($dia == $diaAtual && $mes == $mesAtual) || count($semana) == 0) ? "<b>{$dia}</b>" : $dia;
    
            array_push($semana, $displayDia); // adiciona o dia à semana             
    
            // verifica se o dia é final de semana
            if(count($semana) == 7){
                linha($semana);
                $semana = array(); // limpa a semana para preencher a próxima linha do calendário
            }
    
            $dia++; // incrementa o dia
        }
        if($semana != NULL) linha($semana); // imprime a última semana caso não seja um dia completo
    }

    echo "</table>"; // fecha a tag table

    echo "</div>"; // fecha a tag div 
    

    return calendario($mes+1);
}

function exibirMensagem(){

    $hora = date('H');

    if($hora >= 6 && $hora < 12){
        echo "Bom dia!";
    }elseif($hora >= 12 && $hora < 18){
        echo "Boa tarde!";
    }else{
        echo "Boa noite!";
    }
}
// Olha como esse fdp passa os exercícios
?>



