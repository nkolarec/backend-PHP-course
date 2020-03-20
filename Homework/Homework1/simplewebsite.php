<?php

require 'htmllib.php';

/**
 * Funkcija koja vraća prvih $number Fibonaccijevih brojeva kao niz znakova
 * @param int $number broj Fibonaccijevih brojeva
 * @return string niz znakova prvih $number Fibonaccijevih brojeva
 */
function fibonacci($number): string {
    $result = '0';
    for ( $i = 1; $i < $number; $i++){
        $result .= ', ' . round(pow((sqrt(5)+1)/2, $i) / sqrt(5));
    }
    return $result;
}

/**
 * Funkcija koja vraća prvih $number prostih brojeva
 * @param int $number broj prostih brojeva
 * @return string prvih $number prostih brojeva u tekstualnom zapisu
 */
function prime_numbers($number): string {
    $result = '1';
    $counter = 0;
    $num = 2;
    while ($counter < $number )
    {
        $div_count = 0;
        for ( $i = 1; $i <= $num; $i++)
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
function pi_approximation(): string {
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
$website_header2 = ['contents' => 'Number pi: '. pi_approximation()];
$website_header3 = ['align' => 'left', 'contents' => 'First 50 Fibonacci numbers:'];
$website_header4 = ['align' => 'left', 'contents' => 'First 100 prime numbers: '];
$website_image1 = [];
$website_image2 = [];
$website_link1 = [];
$website_link2 = [];
$website_paragraph1 = ['align' => 'left', 'contents' => fibonacci(50)];
$website_paragraph2 = ['align' => 'left', 'contents' => prime_numbers(100)];
$website_table = [];

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
echo create_element("h3", true, $website_header3);
echo create_element("p", true, $website_paragraph1);
echo create_element("h4", true, $website_header4);
echo create_element("p", true, $website_paragraph2);
end_body();
end_html();



