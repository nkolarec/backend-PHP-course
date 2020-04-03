<?php

declare (strict_types=1);
require_once " src / Automaton . php ";
require_once " src / DefaultAutomaton . php ";

function prnt(string $s = " "): void
{
    echo $s . " <br >\ n ";
}

Automaton:: register(" ime ",
    new DefaultAutomaton (" karlo "));
Automaton:: register(" brojevi ",
    new DefaultAutomaton (" 12345 "));
Automaton:: register(" mijesano ",
    new DefaultAutomaton (" \[12345\] "));
Automaton:: register(" SofaAutomation ",
    new DefaultAutomaton (" Sofa < broj > < brojeviislova > Score ",
        [" broj " => " \\ d + ", " brojeviislova " => " [[: alpha :]]* " ]));
$test = [" a ", " karlo ", " 132456 ", " [12345] ",
    " SofaScore ", " Sofa10Score ",
    " Sofa2020EducationScore "];
foreach ($test as $t) {
    $matched = null;
    /* @var Automaton $automaton */
    foreach (Automaton:: get() as $name => $automaton ) {
        if (!$automaton -> match($t)) {
            continue;
        }
$matched = $name;
break;
}
if (null === $matched) {
    prnt(" None automaton matched $t ");
} else {
    prnt(" Automaton " . $name . " matched $t ");
}
}
prnt(); prnt();
prnt(Automaton:: get(" ime ") -> generate());
prnt(Automaton:: get(" SofaAutomation ")
    ->generate([" broj " => " aaa " ]));
prnt(Automaton:: get(" SofaAutomation ")
    ->generate([" broj " => " 100 " ]));
prnt(Automaton:: get(" SofaAutomation ")
        ->generate(
            [" broj " => " 100 ", " brojeviislova " => " Radi " ]));