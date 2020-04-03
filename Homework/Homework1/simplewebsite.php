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
            $fibonacci_numbers[$i] = ' ' . $i;
        }
        else{
            $fibonacci_numbers[$i] = ' ' . ($fibonacci_numbers[$i-1] + $fibonacci_numbers[$i-2]);
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
        for( $j = 2; $j <= sqrt($current_number); $j++){
            if($current_number % $j === 0) {
                $is_prime = false;
                $i -= 1;
                break;
            }
        }
        if($is_prime){
            $prime[$i] = ' ' . $current_number;
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
        }
        else {
            $pi -= 4 / $bottom;
        }
        $bottom += 2;
    }
    return $pi;
}

function matrix_multiplication($matrix_1, $matrix_2): array {
    $matrix_1_rows = count($matrix_1);
    $matrix_2_rows = count($matrix_2);
    $matrix_1_columns = count($matrix_1[0]);
    $matrix_2_columns = count($matrix_2[0]);

    if($matrix_1_columns !== $matrix_2_rows){
        return ['Incompatible matrices, mutliplication is not possible.'];
    }
    $result = array();

    for ($i = 0; $i < $matrix_1_rows; $i++) {
        $result[$i] = '<tr>';
        for ($j = 0; $j < $matrix_2_columns; $j++) {
            $sum = 0;
            for ($k = 0; $k < $matrix_2_rows; $k++) {
                $sum += $matrix_1[$i][$k] * $matrix_2[$k][$j];
            }
            $result[$i] .= '<td>' . $sum . '</td>';
        }
        $result[$i] .= '</tr>';
    }
    return $result;
}


/**
 * Parametri za komponente stranice
 * */
$website_name = ['contents' => ['Simple website']];
$website_body = ['align' => 'center', 'style' => 'background-color:powderblue;'];
$website_header2 = ['contents' => ['Number pi: '. pi_approximation()]];
$website_header3 = ['align' => 'left', 'contents' => ['First 50 Fibonacci numbers:']];
$website_header4 = ['align' => 'left', 'contents' => ['First 100 prime numbers:']];
$website_header5 = ['align' => 'left', 'contents' => ['Matrix multiplication:']];
$website_image =
    [
        'src' => 'https://www.askideas.com/media/13/Welcome-Image.png',
        'align' => 'center',
        'style' => 'width:600px;height:300px;'
    ];
$website_link1 =
    [
        'href' => 'https://en.wikipedia.org/wiki/Fibonacci_number',
        'contents' => ['Fibonacci number wiki']
    ];
$website_link2 =
    [
        'href' => 'https://en.wikipedia.org/wiki/Prime_number',
        'contents' => ['Prime number wiki']
    ];
$website_link3 =
    [
        'href' => 'https://en.wikipedia.org/wiki/Matrix_multiplication',
        'contents' => ['Matrix multiplication wiki']
    ];
$website_links =
    [
        'align' => 'center',
        'cellspacing' => '20',
        'contents' =>
            [
                create_table_row
                (['contents' =>
                    [
                        create_table_cell(['contents' => [create_element('a',true, $website_link1)]]),
                        create_table_cell(['contents' => [create_element('a',true, $website_link2)]]),
                        create_table_cell(['contents' => [create_element('a',true, $website_link3)]]),
                    ]
                ])
            ]
    ];
$website_paragraph1 = ['align' => 'left', 'contents' => fibonacci(50)];
$website_paragraph2 = ['align' => 'left', 'contents' => prime_numbers(100)];
$matrix_1 = array(array(1, 1, 3), array(5, 3, 4));
$matrix_2 = array(array(1, 2), array(2, 6), array(3 ,2));
$website_table_matrix_1 =
    [
        'align' => 'left',
        'border' => '1',
        'cellspacing' => '20',
        'contents' =>
            [
                create_table_row(
                    ['contents' =>
                        [
                            create_table_cell(['contents' => ['1']]),
                            create_table_cell(['contents' => ['1']]),
                            create_table_cell(['contents' => ['3']]),
                        ]
                    ]),
                create_table_row(
                    ['contents' =>
                        [
                            create_table_cell(['contents' => ['5']]),
                            create_table_cell(['contents' => ['3']]),
                            create_table_cell(['contents' => ['4']]),
                        ]
                    ])
            ]];
$website_table_matrix_2 =
    [
        'align' => 'left',
        'border' => '1',
        'cellspacing' => '20',
        'contents' =>
            [
                create_table_row
                (['contents' =>
                    [
                        create_table_cell(['contents' => ['1']]),
                        create_table_cell(['contents' => ['2']])
                    ]
                ]),
                create_table_row
                (['contents' =>
                    [
                        create_table_cell(['contents' => ['2']]),
                        create_table_cell(['contents' => ['6']])
                    ]
                ]),
                create_table_row
                (['contents' =>
                    [
                        create_table_cell(['contents' => ['3']]),
                        create_table_cell(['contents' => ['2']])
                    ]
                ])
            ]
    ];
$website_table_operator =
    [
        'align' => 'left',
        'cellspacing' => '20',
        'contents' =>
            [
                create_table_row([]),
                create_table_row
                (['contents' =>
                        [
                            create_table_cell([]),
                            create_table_cell(['contents' => ['*']]),
                            create_table_cell([]),
                        ]
                ]),
                create_table_row([])
            ]
    ];
$website_table_equals =
    [
        'align' => 'left',
        'cellspacing' => '20',
        'contents' =>
            [
                create_table_row([]),
                create_table_row
                (['contents' =>
                        [
                            create_table_cell([]),
                            create_table_cell(['contents' => ['=']]),
                            create_table_cell([]),
                        ]
                ]),
                create_table_row([])
            ]
    ];
$website_table_result = ['align' => 'left', 'border' => '1', 'cellspacing' => '20', 'contents' => matrix_multiplication($matrix_1, $matrix_2)];

/**
 * Generirani kod HTML stranice
 * */
create_doctype();
begin_html();
begin_head();
echo create_element("title", true, $website_name);
end_head();
begin_body($website_body);
echo create_element("img", true, $website_image);
create_table($website_links);
end_table();
echo create_element("h2", true, $website_header2);
echo create_element("h3", true, $website_header3);
echo create_element("p", true, $website_paragraph1);
echo create_element("h4", true, $website_header4);
echo create_element("p", true, $website_paragraph2);
echo create_element("h5", true, $website_header5);
create_table($website_table_matrix_1);
end_table();
create_table($website_table_operator);
end_table();
create_table($website_table_matrix_2);
end_table();
create_table($website_table_equals);
end_table();
create_table($website_table_result);
end_table();
end_body();
end_html();



