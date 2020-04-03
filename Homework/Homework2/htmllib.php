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
    echo create_element('body', false, $params);
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
    echo create_element('table', false, $params);
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
    return create_element('tr',true, $params);
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
    return create_element('td',true,  $params);
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
        }
        else {
            $element .= " " . $attribute . "=" . $value;
        }
    }
    $element .= ">";
    if($contents_flag){
        foreach($params['contents'] as $content){
            $element .= $content;
        }
    }
    if($closed) {
        $element .= "</" . $name . ">\n";
    }
    return $element;
}

/**
* Generira tag < form > i dodjeljuje mu atribute action i
* method s vrijednostima koje ovise o predanim parametrima
*
* @param string  $action relativna ili apsolutna putanja
* do skrtipte za obradu obrasca
* @param string $method GET ili POST
*/

function start_form ( $action , $method ): void {

}

/**
* Ispisuje zatvarajuci tag </ form >
*/

function end_form (): void {

}

/**
* Stvara polje za unos teksta pri cemu su atributi i njihove
* vrijednosti odredjene predanim 2 D poljem parametara .
* Struktura polja parametara :
* array ( ' atribut ' = > ' vrijednost1 ',
* ' atribut2 ' = > ' vrijednost2 ', ... ,
* ' atributN ' = > ' vrijednostN ').
*
* @param  array  $params asocijativno polje parova oblika
* atribut = > vrijednost
* @return string niz znakova koji predstavlja generirani input tag
*/

function create_input ( $params ): string {

}

/**
* Generira padajuci izbornik odredjen elementom select .
* Predani parametri odredjuju atribute izbornika ( npr . name )
* te opcije koje izbornik treba sadrzavati , a one se
* predaju u preko kljuca ' contents '.
* Polje ima sljedeci format :
* array (
* ' kljuc1 ' = > ' vrijednost1 ',
* ...
* ' kljucN ' = > ' vrijednostN '
* ' contents ' = > array ( ' option1 ', ' option2 ', ... , ' optionM ')
* )
* Parametar contents odredjuje 1 D polje i da je svaki element
* niz znakova . No , elementi nisu vrijednosti koje treba
* ispisati kao opcije , nego <b > HTML k ^ od </ b > koji definira
* svaku od opcija , npr . '< option >1 </ option > '
*
* @param  array  $params polje parametara koje odredjuje
* padajuci izbornik
* @return string niz znakova koji predstavlja generirani select tag
*/

function create_select ( $params ): string {

}

/**
 * Stvara element button pomocu predanih parametara i vraca
 * generirani niz tag . Sadrzaj gumba odredjuje parametar
 * contents . Ako je njegova vrijednost jednaka praznom
 * nizu znakova ili uopce nije poslan , sadrzaj treba
 * biti prazan .
 *
 * @param  array  $params polje parametara koje odredjuje dugme
 * @return string niz znakova koji predstavlja generirani tag button
 */

function create_button ( $params ): string {

}








