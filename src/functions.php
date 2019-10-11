<?php

function crypting(string $word, int $key): string {
    $alphabet = range('A', 'Z');
    $codedWord = '';

    $wordArray = str_split($word);
    foreach ($wordArray as $letter) {
        $idLetter = array_search(strtoupper($letter), $alphabet);
        $codedLetter = $alphabet[(($idLetter+$key)%26)];
        $codedWord .= $codedLetter;
    }
    return $codedWord;
}