<?php

require 'htmllib.php';

/**
 * Funkcija koja vraća sljedeći Fibonaccijev broj
 * @param int $number trenutni broj
 * @return int sljedeći broj
 */
function fibonacci($number): int {
    switch ($number):
        case 0: return 0;
        case 1: return 1;
        default: return fibonacci($number - 1) + fibonacci($number - 2);
        endswitch;
}

/**
 * Funkcija koja vraća prvih $number Fibonaccijevih brojeva kao niz znakova
 * @param int $number broj Fibonaccijevih brojeva
 * @return string niz znakova prvih $number Fibonaccijevih brojeva
 */
function string_fibonacci($number): string {
    $result = "0, 1";
    for ( $i = 2; $i < $number; $i++){
        $result .= ", " . fibonacci($i);
    }
    return $result;
}

/**
 * Funkcija koja vraća prvih $number prostih brojeva
 * @param int $number broj prostih brojeva
 * @return string prvih $number prostih brojeva u tekstualnom zapisu
 */
function prime_numbers($number): string {
    $result = "1, 2, 3";
    $counter = 0;
    $num = 2;
    while ($counter < $number )
    {
        $div_count = 0;
        for ( $i = 3; $i <= $num; $i++)
        {
            if (($num % $i) === 0)
            {
                $div_count++;
            }
        }
        if ($div_count<3)
        {
            $result .= ", " . $num;
            $counter++;
        }
        $num++;
    }
    return $result;
}

/**
 * Funkcija koja vraća broj pi aproksimiran formulom pi = 4/1 - 4/3 + 4/5 - 4/7 ...
 * @return string vraća pi kao niz znakova
 * */
function string_pi(): string {
    $bottom = 1;
    $pi = 0;
    for ($i = 1; $i < 1000; $i++) {
        if ($i % 2 == 1) {
            $pi += 4 / $bottom;
        } else {
            $pi -= 4 / $bottom;
        }
        $bottom += 2;
    }
    return $pi;
}


/**
 * Parametri za komponente stranice
 * */
$website_name = ['contents' => 'Simple website'];
$website_body = ['align' => 'center', 'style' => 'background-color:powderblue;'];
$website_header1 = ['contents' => 'Welcome!'];
$website_header2 = ['contents' => 'Number pi: '. string_pi()];
$website_image1 = [];
$website_image2 = [];
$website_link1 = [];
$website_link2 = [];
$website_paragraph1 = ['contents' => 'First 50 Fibonacci numbers: '. string_fibonacci(50)];
$website_paragraph2 = ['contents' => 'First 100 prime numbers: '. prime_numbers(100)];
$website_table = ['style' => 'width:80%', 'bgcolor' => 'blue'];

/**
 * Generirani kod HTML stranice
 * */
create_doctype();
begin_html();
begin_head();
echo create_element("title", true, $website_name);
end_head();
begin_body($website_body);
echo create_element("h1", true, $website_header1);
echo create_element("h2", true, $website_header2);
echo create_element("p", true, $website_paragraph1);
echo create_element("p", true, $website_paragraph2);
create_table($website_table);
end_table();
end_body();
end_html();



