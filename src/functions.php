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

function decrypting(string $word, int $key): string {
    $alphabet = range('A', 'Z');
    $decodedWord = '';
    $wordArray = str_split($word);
    foreach ($wordArray as $letter) {
        $idLetter = array_search(strtoupper($letter), $alphabet);
        $idDecodedLetter = ($idLetter-$key < 0 ) ? $idLetter-$key+26 : $idLetter-$key;
        $decodedLetter = $alphabet[$idDecodedLetter%26];
        $decodedWord .= $decodedLetter;
    }
    return $decodedWord;
}