<?php

function generateList()
{
    $url = "https://www.canalti.com.br/api/pokemons.json";
    $pokemons = json_decode(file_get_contents($url));
    return $pokemons;
}

function cardColor($colorType)
{
    if($colorType == "Grass") 
        $color = '#bdecb6';
    else if($colorType == "Fire") 
        $color = '#fa7e78';
    else if($colorType == "Water") 
        $color = '#add8e6';
    else if($colorType == "Bug") 
        $color = '#b7d694';
    else if($colorType == "Electric") 
        $color = '#fdfd96';
    else if($colorType == "Poison") 
        $color = '#bd86bd';
    else if($colorType == "Ground") 
        $color = '#d2b48c';
    else if($colorType == "Rock") 
        $color = '#b3a9a1';
    else if($colorType == "Ghost") 
        $color = '#a796b3';
    else if($colorType == "Fighting") 
        $color = '#ebaf7c';
    else if($colorType == "Ice") 
        $color = '#6d9ac9';
    else if($colorType == "Dragon") 
        $color = '#c5d6db';
    else if($colorType == "Psychic") 
        $color = '#d6b2d5';
    else
        $color = '#f0f0f0';

    return $color;
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
