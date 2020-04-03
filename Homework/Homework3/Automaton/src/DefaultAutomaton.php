<?php

declare (strict_types = 1);

class DefaultAutomaton extends Automaton
{

    /**
    * DefaultAutomaton constructor .
    * Konstruktorska metoda .
    * @param $input ulazni regularni izraz . Posebni parametri
    * nalaze se unutar tagova <>, te se smiju iskljucivo sastojati
    * od brojeva , malih slova engleske abecede te znaka podvlake .
    * @param array $regex mapa imena parametara i prudruzenih
    * regularnih izraza ; regularni izrazi moraju biti valjani i u
    * skladu s PHP notacijom da bi ih PCRE mogao izvoditi .
    */
    public function __construct ( $input , array $regex = []) {

// TODO

    }

    /**
     * Nadjacana metoda .
     *
     * @param $input
     * @return bool
     */
    public function match ($input) : bool {

// TODO

    }
    /**
    * Nadjacana metoda .
    *
    * @return string
    */
    public function generate ( array $array = []) : string {

// TODO

    }
}