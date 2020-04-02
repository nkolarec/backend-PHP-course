<?php

require 'htmllib.php';

/**
 * Funkcija koja vraća prvih $n Fibonaccijevih brojeva kao niz znakova
 * @param int $n broj Fibonaccijevih brojeva
 * @return array prvih $n Fibonaccijevih brojeva kao niz integera
 */
function fibonacci($n): array {
    $fibonacci_numbers = array();
    for ( $i = 0; $i < $n; $i++){
        if($i == 0 or $i == 1) {
            $fibonacci_numbers[$i] = $i;
        }
        else{
            $fibonacci_numbers[$i] = $fibonacci_numbers[$i-1] + $fibonacci_numbers[$i-2];
        }
    }
    return $fibonacci_numbers;
}

/**
 * Funkcija koja vraća prvih $n prostih brojeva
 * @param int $n broj prostih brojeva
 * @return array prvih $n prostih brojeva kao niz integera
 */
function prime_numbers($n): array {
    $is_prime = true;
    $prime = array();
    $current_number = 2;
    for ($i = 0; $i < $n; $i++) {
        for( $j = 2; $j < sqrt($current_number); $j++){
            if($current_number % 2 === 0) {
                $is_prime = false;
                break;
            }
        }
        if($is_prime){
            $prime[$i] = $current_number;
        }
        $current_number++;
        $is_prime = true;
    }
    return $prime;
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

function matrix_multiplication($matrix_1, $matrix_2): array {
    $matrix_1_columns = count($matrix_1);
    $matrix_2_columns = count($matrix_2);
    $matrix_1_rows = count($matrix_1[0]);
    $matrix_2_rows = count($matrix_2[0]);

    $flag_start_first_matrix = true;
    $result = array();

    if ($matrix_1_columns === $matrix_2_rows){
        $result_columns = $matrix_1_columns;
        $result_rows = $matrix_2_rows;
        $flag_start_first_matrix = false;
    } elseif ($matrix_2_columns === $matrix_1_rows){
        $result_columns = $matrix_2_columns;
        $result_rows = $matrix_1_rows;
    } else {
        return ['Matrices cannot be multiplied.'];
    }

    for ($i = 0; $i < $result_rows; $i++) {
        for ($j = 0; $j < $result_columns; $j++) {
            $result[$i][$j] = 0;
            for ($k = 0; $k < $result_rows; $k++) {
                if($flag_start_first_matrix){
                    $result[$i][$j] += $matrix_1[$i][$k] * $matrix_2[$k][$j];
                } else {
                    $result[$i][$j] += $matrix_2[$i][$k] * $matrix_1[$k][$j];
                }
            }
        }
    }
    return $result;
}


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



