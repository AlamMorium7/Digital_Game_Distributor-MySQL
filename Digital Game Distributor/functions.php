<?php

//require mysql connection
require('database/DBController.php');

//require games class
require('database/games.php');

//require Cart class
require('database/Cart.php');

//DBController object

$db = new DBController();

//Games Object
$games = new Games($db);
$games_shuffle = $games->getData();

//db data top view
//print_r($games->getData());

//Cart object

$Cart = new Cart($db);
/*$arr = array(
    "user_id" =>2,
    "game_id"=>9
);*/
//$Cart->insertIntoCart($arr);



