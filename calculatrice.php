<?php

class Calculatrice {

  public static function addition($chiffreUn, $chiffreDeux) {
    return $chiffreUn + $chiffreDeux;
  }
  public static function soustraction($chiffreUn, $chiffreDeux) {
    return $chiffreUn - $chiffreDeux;
  }
  public static function multiplication($chiffreUn, $chiffreDeux) {
    return $chiffreUn * $chiffreDeux;
  }
  public static function division($chiffreUn, $chiffreDeux) {
    return $chiffreUn / $chiffreDeux;
  }
  public static function modulo($chiffreUn, $chiffreDeux) {
    return $chiffreUn % $chiffreDeux;
  }
}


echo Calculatrice::addition(5, 9) . "<br>";
echo Calculatrice::soustraction(5, 9) . "<br>";
echo Calculatrice::multiplication(5, 9) . "<br>";
echo Calculatrice::division(5, 9) . "<br>";
echo Calculatrice::modulo(5, 9) . "<br>";
