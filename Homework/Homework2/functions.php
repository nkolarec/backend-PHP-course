<?php

/**
* Ispisuje siguran string od HTML koda .
* @param string $v
* @return string
*/
function __ ( $v ) {

    return htmlentities ( $v , ENT_QUOTES , " utf -8 " );

}

/**
* Iz URL - a dohvaca parametar imena $v .
* Ukoliko parametra nema , null vracen .
* @param string $v
* @param type $d
* @return type
*/

function get ( $v , $d = null ) {
// samostalna implementacija

}

/**
* Iz tijela HTTP zahtjeva dohvaca parametar imena $v .
* Ukoliko parametra nema , null vracen .
* @param string $v
* @param type $d
* @return type
*/

function post ( $v , $d = null ) {
// samostalna implementacija

}

/**
* Provjera je li zahtjev POST .
* Ako je zahtjev POST , provjerava se postoji
* li parametar naziva $key .
* Ako parametar ne postoji , null vracen .
* @param type $key
* @return type
*/
function isPost ( $key = null ) {
    if ( null === $key ) {

        return count ( $_POST ) > 0;

    }
    return null !== post ( $key );

}

function paramExists ( $param ) {

    if ( null !== $param && ! empty ( $param )) return true ;
    return false ;

}

/**
* Usmjeravanje na URL .
* @param type $url
*/
function redirect ( $url ) {

    header ( " Location : " . $url );
    die (); // prekida izvodenje skripte pozivateljice

}

/**
* Provjera prijavljenosti korisnika .
* @return type true ako je korisnik prijavljen , false inace
*/
function isLoggedIn () {

// samostalna implementacija

}

/**
* Vraca ID prijavljenog korisnika
* @return type int ako je korisnik prijavljen , null inace
*/
function userID () {

// samostalna implementacija

}
