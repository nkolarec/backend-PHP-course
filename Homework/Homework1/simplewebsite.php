<?php

require 'htmllib.php';

/**
 * Funkcija koja vraća prvih $number Fibonaccijevih brojeva kao niz znakova
 * @param int $number broj Fibonaccijevih brojeva
 * @return string prvih $number Fibonaccijevih brojeva kao niz znakova
 */

/*
znam koja je bila namjera, ali ovo nema smisla kada se traži prvih n brojeva.
uporaba ISPAVNE formule ima smisla kad se traži n. fibo broj

dodatno, ova jednadžba nije ispravna
*/
function fibonacci($number): string {
    $result = '0';
    for ( $i = 1; $i < $number; $i++){
        $result .= ', ' . round(pow((sqrt(5) + 1) / 2, $i) / sqrt(5));
    }
    return $result;
}

/**
 * Funkcija koja vraća prvih $number prostih brojeva
 * @param int $number broj prostih brojeva
 * @return string prvih $number prostih brojeva kao niz znakova
 */

/*
što akoi je $number negativan?

ovo je jako velika složenost i čak nepotrebno dijeljenje s 1???

pogledaj zašto se petlja može vrtjeti do sqrt($number) -> puno manja složenost!


*/
function prime_numbers($number): string {
    $result = '1'; // prikladnija struktura bi bila lista da se vraća lista intova
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
        if ($div_count < 3)
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

//množenje matrica???


/**
 * Parametri za komponente stranice
 * */
$website_name = ['contents' => 'Simple website'];
$website_body = ['align' => 'left', 'style' => 'background-color:powderblue;'];
$website_header1 = ['align' => 'center', 'contents' => 'Welcome!'];
$website_header2 = ['align' => 'center', 'contents' => 'Number pi: '. pi_approximation()];
$website_header3 = ['contents' => 'First 50 Fibonacci numbers:'];
$website_header4 = ['contents' => 'First 100 prime numbers:'];
$website_header5 = ['contents' => 'Matrix multiplication:'];
$website_image =
    [
        'src' => 'https://lh3.googleusercontent.com/proxy/R1IYSC58tkZ-L2x4jfTm-QWfkS44SLE5aVtxVByIrHN51lV2CMAtMycHU7U2lKBeEqXmSbq4jaD4oIBbntZXBRvlgkjSqhlkXW3b1A80DgQ',
        'style' => 'width:600px;height:300px;'
    ];
$website_link1 =
    [
        'href' => 'https://en.wikipedia.org/wiki/Fibonacci_number',
        'contents' => 'Fibonacci number wiki'
    ];
$website_link2 =
    [
        'href' => 'https://en.wikipedia.org/wiki/Prime_number',
        'contents' => 'Prime number wiki'
    ];
$website_link3 =
    [
        'href' => 'https://en.wikipedia.org/wiki/Matrix_multiplication',
        'contents' => 'Matrix multiplication wiki'
    ];
$website_paragraph1 = ['contents' => fibonacci(50)];
$website_paragraph2 = ['contents' => prime_numbers(100)];
$website_table = ['align' => 'center', 'cellspacing' => '20'];
$website_table_row =
    [
        'contents' =>
        [
            ['contents' => create_element("a", true, $website_link1)],
            ['contents' => create_element("a", true, $website_link2)],
            ['contents' => create_element("a", true, $website_link3)]
        ]
    ];

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
create_table($website_table);
echo create_table_row($website_table_row);
end_table();
echo create_element("h3", true, $website_header3);
echo create_element("p", true, $website_paragraph1);
echo create_element("h4", true, $website_header4);
echo create_element("p", true, $website_paragraph2);
echo create_element("h5", true, $website_header5);
echo create_element("img", true, $website_image);
end_body();
end_html();



