<?php
$ablakcim = array(
    'cim' => 'Forma 1',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
	'cim' => 'Forma 1',
	'motto' => ''
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Készitette: Eötvös Levente (BXIMLQ)  -  Takács Máté (GV9NMD)'
);

$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Címlap', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'gallery' => array('fajl' => 'gallery', 'szoveg' => 'Galéria', 'menun' => array(1,1)),
    'uzenetek'=> array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0,1)),
    'crudList'=> array('fajl' => 'crudList', 'szoveg' => 'CRUD', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
    
    'crudEdit' => array('fajl' => 'crudEdit', 'szoveg' => '', 'menun' => array(0,0)),
    'crudDelete' => array('fajl'=> 'crudDelete', 'szoveg' => '', 'menun' => array(0,0)),
    'crudAdd' => array('fajl'=> 'crudAdd', 'szoveg' => '', 'menun'=> array(0,0)),
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>