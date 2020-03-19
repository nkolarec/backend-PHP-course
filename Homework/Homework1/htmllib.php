<?php
/**
 * Ispisuje otvarajuci tag < table >. Polje parametara
 * odredjuje atribute tablice i
 * vrijednosti atributa .
 *
 * @param $params { array } polje parametara spremljenih
 * po principu ' atribut ' = > ' vrijednost '
 */
function create_table ( $params ): void {
    $table = "<table";
    foreach ($params as $attribute){
        $table .= " " .  $attribute . "=" . $params[$attribute];
    }
    $table .= " >";
    echo htmlentities($table);

}
/**
 * Ispisuje zatvarajuci tag </ table >
 */
function end_table (): void {
    echo htmlentities("< / table >");
}
/**
 * Generira HTML potreban za stvaranje jednog retka tablice .
 * U polju parametara koje prima moraju biti definirane i
 * celije tablice i to parametrom ' contents '.
 * Polje ima sljedeci format :
 * array (
 * ' atribut1 ' = > ' vrijednost1 ' ,
 * ...
 * ' atributN ' = > ' vrijednostN ' ,
 * ' contents ' = > array ( ' cell1 ' , ' cell2 ' , ... , ' cellM ')
 * )
 * Parametar contents odredjuje 1 D polje i svaki element je
 * niz znakova . No , elementi nisu vrijednosti koje treba
 * ispisati u celijama , nego <b > HTML kod </ b > koji definira
 * svaku od celija , npr . ' <td > celija </ td > '.
 * Prazan redak generira se u slucaju da je
 * parametar contents postavljen na prazan niz znakova ili
 * da uopce nije poslan .
 *
 * @param  $params { array } polje parametara koje odredjuje
 * jedan redak tablice
 * @return string niz znakova koji predstavlja HTML kod retka tablice
 */
function create_table_row ( $params ): string {
    $row = "< tr >\n";
    foreach ($params as $attribute){
        if ($attribute === 'contents') {
            foreach ($params['contents'] as $cell){
                $row .= create_table_cell($cell);
            }
        }
        else {
            $row .= " " . $attribute . "=" . $params[$attribute];
        }
    }
    $row .= "< / tr >";
    return $row;

}

/**
 * Na temelju predanih parametara koji odredjuju atribute i
 * vrijednosti generira HTML kod celije . Polje je oblika :
 * array ( ' atribut ' = > ' vrijednost1 ' ,
 * ' atribut2 ' = > ' vrijednost2 ' , ... ,
 * ' atributN ' = > ' vrijednostN ' ).
 * Sadrzaj celije odredjen je parametrom ' contents '.
 * Ako tog parametra nema ili je jednak praznom
 * nizu znakova , potrebno je generirati praznu celiju :
 * < td atribut1 = " vrijednost1 " ... atributN = " vrijednostN " > </ td >
 *
 * @param $params { array } polje parametara koje odredjuje celiju
 * @return string  niz znakova koji odredjuje HTML kod celije
 */
function create_table_cell ( $params ): string {
    $column = "< td >\n";
    $column .= "< / td >\n";
    return $column;
}

/**
 * Na temelju predanih parametara koji odredjuju atribute ,
 * naziva elementa i zastavice koja odredjuje ima li
 * otvarajuci tag pripadajuci zatvarajuci tag generira
 * HTML kod proizvoljnog elementa . Polje parametara je oblika
 * array ( ' atribut ' = > ' vrijednost1 ' ,
 * ' atribut2 ' = > ' vrijednost2 ' , ... ,
 * ' atributN ' = > ' vrijednostN ' ).
 * Ako sadrzaj elementa treba biti prazan ili element
 * uopce nije definiran tako da treba imati sadrzaja ,
 * potrebno je ili postaviti parametar ' contents ' na
 * prazan niz znakova ili ga uopce ne poslati .
 *
 * @param $name
 * @param bool $closed
 * @param $params
 * @return string niz znakova jednak HTML kodu elementa
 */
function create_element ( $name , $closed = true , $params ): string {
     $element = "";
     return $element;
}
