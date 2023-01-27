<?php

$cpf = (string) 74305429055;
$firstVerifiedDigit = $secondVerifiedDigit = 0;

// ## Início cálculo primeiro digito
// pegar os 9 primeiros digitos
$firstNineDigits = substr($cpf, 0, 9);

$countFirst = 0;
$multiplierFirst = 10;
for ($i = 0; $i < 9; $i++) {
    $countFirst += $firstNineDigits[$i] * $multiplierFirst--;
}
echo "\nsoma dos digitos múltiplicados da esquerda para direita com um valor decremental começando por 10: $countFirst\n";

// dividindo a soma (count)  por 11 para obter o resto
$remainder = $countFirst % 11;
echo "\nResto da divisão: $remainder\n";

// Se o resto da divisão for menor que 2, então o dígito é igual a 0 (Zero). -> Como iniciamos o $firstVerifiedDigit com 0 não precisamos da validação
// Se o resto da divisão for maior ou igual a 2, então o dígito verificador é igual a 11 menos o resto da divisão (11 - resto)
if ($remainder >= 2) {
    $firstVerifiedDigit = 11 - $remainder;
}
echo "\nValor do primeiro dígito verificador: $firstVerifiedDigit\n";
// ## Fim cálculo primeiro digito

// ## Início cálculo segundo digito
// adicionando o primeiro digito verificador ao final do cpf
$cpfWithFirstDigit = $firstNineDigits . $firstVerifiedDigit;
echo "\nCPF com o primeiro dígito verificado ao final: $cpfWithFirstDigit\n";

$countSecond = 0;
$multiplierSecond = 11;
for ($i = 0; $i < 10; $i++) {
    $countSecond += $cpfWithFirstDigit[$i] * $multiplierSecond--;
}
echo "\nsoma dos digitos múltiplicados da esquerda para direita com um valor decremental começando por 11: $countSecond\n";

// dividindo a soma (count)  por 11 para obter o resto
$remainder = $countSecond % 11;
echo "\nResto da divisão: $remainder\n";

// Se o resto da divisão for menor que 2, então o dígito é igual a 0 (Zero). -> Como iniciamos o $secondVerifiedDigit com 0 não precisamos da validação
// Se o resto da divisão for maior ou igual a 2, então o dígito verificador é igual a 11 menos o resto da divisão (11 - resto)
if ($remainder >= 2) {
    $secondVerifiedDigit = 11 - $remainder;
}
echo "\nValor do segundo dígito verificador: $secondVerifiedDigit\n";
// ## Fim cálculo segundo digito

// adicionando o segundo digito verificador ao final do cpf
$cpfValid = $cpfWithFirstDigit . $secondVerifiedDigit;
echo "\nCPF: $cpfValid\n";
