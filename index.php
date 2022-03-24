<?php

define("cardValues", [
    "two" => 2,
    "three" => 3,
    "four" => 4,
    "five" => 5,
    "six" => 6,
    "seven" => 7,
    "eight" => 8,
    "nine" => 9,
    "ten" => 10,
    "jack" => 10,
    "queen" => 10,
    "king" => 10
]);


function BlackJackHighest($strArr)
{

    $count = 0;
    $highest = "two";
    $result = "";
    $ace = false;
    foreach ($strArr as $item) {
        if (cardValues[$item] > cardValues[$highest]) {
            $highest = $item;
        } else {
            if (cardValues[$item] == cardValues[$highest] && $highest == "ten" && $item == "jack" || $item == "queen" || $item == "king") {
                $highest = $item;
            } else if (cardValues[$item] == cardValues[$highest] && $item == "queen" && $highest == "jack") {
                $highest = $item;
            } else if (cardValues[$item] == cardValues[$highest] && $item == "king" && $highest == "jack") {
                $highest = $item;
            } else if (cardValues[$item] == cardValues[$highest] && $item == "king" && $highest == "queen") {
                $highest = $item;
            }
        }
        if ($item == "ace") {
            $ace = true;
        } else {
            $count += cardValues[$item];
        }
    }

    if ($ace && $count < 11) {
        $highest = "ace";
        $count += 11;
    } else {
        $count += 1;
    }

    if ($count < 21) {
        $result = "below";
    } else if ($count == 21) {
        $result = "blackjack";
    } else {
        $result = "above";
    }
    return $result .= " " . $highest;
}

echo BlackJackHighest(["four", "ace", "ten"]);
echo '<br>';
echo BlackJackHighest(["ace", "queen"]);
?>