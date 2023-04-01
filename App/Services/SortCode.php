<?php

namespace App\Services;

class SortCode
{
    private static $auth;

    public static function get()
    {
        return self::$auth ?? self::$auth = new self;
    }

    public function sortA($arr, $codeO, $codeN) : array
    {
        $rez = [];
        $rez[1] = array_values(['','','','','']);
        if($codeO == $codeN) $codeN = strtolower($codeN);
        $rez[1][0] = $codeN;
        if($codeN == 'A') {
            $rez[1][1] = mb_chr(0x21D3);
            usort($arr, fn($a, $b) => $a['accNum'] <=> $b['accNum']);
        }
        if($codeN == 'a') {
            $rez[1][1] = mb_chr(0x21D1);
            usort($arr, fn($a, $b) => $b['accNum'] <=> $a['accNum']);
        }
        if($codeN == 'D') {
            $rez[1][2] = mb_chr(0x21D3);
            usort($arr, fn($a, $b) => $a['surname'] <=> $b['surname']);
        }
        if($codeN == 'd') {
            $rez[1][2] = mb_chr(0x21D1);
            usort($arr, fn($a, $b) => $b['surname'] <=> $a['surname']);
        }
        if($codeN == 'E') {
            $rez[1][2] = mb_chr(0x21D3);
            usort($arr, fn($a, $b) => $b['value'] - $a['value']);
        }
        if($codeN == 'e') {
            $rez[1][2] = mb_chr(0x21D1);
            usort($arr, fn($a, $b) => $a['value'] - $b['value']);
        }
        $rez[0] = array_values($arr);
        return $rez;
    }
}