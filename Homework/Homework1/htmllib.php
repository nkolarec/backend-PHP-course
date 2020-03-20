<?php

/**
 * Uvijek ispisuje sadrzaj " <! doctype html > "
 * i koristi se kao prva naredba
 * kod stvaranja dokumenta .
 */
function create_doctype (): void {
    echo "<!DOCTYPE html>";
}

/**
 * Ispisuje otvarajuci tag < html >
 */
function begin_html (): void {
    echo "<html>";
}

/**
 * Ispisuje zatvarajuci tag </ html >
 */
function end_html (): void
{
    echo "</html>";
}

/**
 * Ispisuje otvarajuci tag < head >
 */
function begin_head (): void {
    echo "<head>";
}

/**
 * Ispisuje zatvarajuci tag </ head >
 */
function end_head (): void {
    echo "</head>";
}

/**
 * Ispisuje otvarajuci tag < body > te mu
 * pridruzuje parove ( atribut , vrijednost ) na
 * temelju polja predanih parametara .
 * Parove ( atribut , vrijednost ) potrebno je umetnuti u
 * tag na valjan nacin : nazivAtributa = " vrijednostAtributa " .
 *
 * @param array $params asocijativno polje
 * parova atribut = > vrijednost
 */
function begin_body ( $params ): void {
    $body = "<body";
    foreach ($params as $attribute => $value){
        $body .= " " .  $attribute . "=" . $value;
    }
    $body .= " >";
    echo $body;
}

/**
 * Ispisuje zatvarajuci tag </ body >
 */
function end_body (): void {
    echo "</body>";
}

/**
 * Ispisuje otvarajuci tag < table >. Polje parametara
 * odredjuje atribute tablice i
 * vrijednosti atributa .
 *
 * @param array $params polje parametara spremljenih
 * po principu ' atribut ' = > ' vrijednost '
 */
function create_table ( $params ): void {
    $table = "<table";
    foreach ($params as $attribute => $value){
        $table .= " " .  $attribute . "=" . $value;
    }
    $table .= ">";
    echo $table;

}

/**
 * Ispisuje zatvarajuci tag </ table >
 */
function end_table (): void {
    echo "</table>";
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
 * @param  array $params polje parametara koje odredjuje
 * jedan redak tablice
 * @return string niz znakova koji predstavlja HTML kod retka tablice
 */
function create_table_row ( $params ): string {
    $contents_flag = false;
    $row = "<tr";
    foreach ($params as $attribute => $value){
        if ($attribute === 'contents' and $value ==! null) {
            $row .= " >";
            $contents_flag = true;
            foreach ($value as $cell){
                $row .= create_table_cell($cell);
            }
        }
        else {
            $row .= " " . $attribute . "=" . $value;
        }
    }
    if (!$contents_flag){
        $row .= ">";
    }
    $row .= "</tr>";
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
 * @param array $params polje parametara koje odredjuje celiju
 * @return string  niz znakova koji odredjuje HTML kod celije
 */
function create_table_cell ( $params ): string {
    $cell = "<td";
    $contents_flag = false;
    foreach ($params as $attribute => $value){
        if ($attribute === 'contents' and $value ==! null) {
            $cell .= " >";
            $contents_flag = true;
            $cell .= $value;
        }
        else {
            $cell .= " " . $attribute . "=" . $value;
        }
    }
    if (!$contents_flag){
        $cell .= ">";
    }
    $cell .= "</td>";
    return $cell;
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
 * uopce nije definiran tako da treba imati sadrzja ,
 * potrebno je ili postaviti parametar ' contents ' na
 * prazan niz znakova ili ga uopce ne poslati .
 *
 * @param  string  $name naziv elementa
 * @param boolean $closed true ako ima zatvarajuci tag , false inace
 * @param array $params polje parametara koje odredjuje celiju
 * @return string niz znakova jednak HTML kodu elementa
 */
function create_element ( $name , $closed = true , $params ): string {
    $contents_flag = false;
    $element = "<". $name;
    foreach ($params as $attribute => $value){
        if ($attribute === 'contents'){
            $contents_flag = true;
            $element .= ">" . $value;
        }
        else {
            $element .= " " . $attribute . "=" . $value;
        }
    }
    if(!$contents_flag){
        $element .= ">";
    }
    if($closed === true) {
        $element .= "</" . $name . ">\n";
    }
    return $element;
}

