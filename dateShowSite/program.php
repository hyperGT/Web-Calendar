<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibindo data</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="../calendario/calendario.php">Calendário</a></li>
            <li><a href="#">Sobre</a></li>
        </ul>
    </header>
</body>
</html>

<?php

echo "Hoje é dia " . date('d/m/y'); 

//echo "<br>Hora Atual: ". date('H:i:s');

echo "<br>Hora Atual: " . date('H:i A');

echo "<br>Dia da Semana: " . date('l');

echo "<br>Dia da Semana(Numero): " . date('N');

echo "<br>Mês do Ano: " . date('F');



// Chama a função para calcular dias até o próximo sábado
satIsComming(date('N'));

    /*
    Desafios - Respostas:
    1) (d/m/Y) = 20/05/2022 (d/m/y) = 20/05/22.
    2) Para mudar o formato de exibição das horas, é necessário alterar a função para date('h:i A').
    3) Utilizando a função date('l') podemos ver o dia da semana em inglês.
    4) Utilizando o caracter 'N'(trecho da documentação abaixo) podemos ver o dia da semana como um número inteiro (1 - segunda, 7 - domingo).
    N - The ISO-8601 numeric representation of a day (1 for Monday, 7 for Sunday).
    5) (F) = month (exibe o Mês em inglês).
    6) Função criada para calcular quantos dias faltam para o próximo sábado abaixo.
    */
    
function satIsComming($today){     

    $cont = 0; // inicializa a variável contadora

    for($i = $today; $i <= 6; $i++){
        $cont++;    // atualiza a qnt de dias até o próximo sábado
    }

    // Exibir a quantidade de dias faltando para o próximo sábado
    echo "<br>faltam " . ($cont - 1) . " dias para o próximo sábado";

}
?>
