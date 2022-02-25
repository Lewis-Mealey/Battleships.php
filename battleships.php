<?php


const BOARDSIZE = 5;
const GUESSES = 15;
const MAX_SHIPS = 3;

$board = array_fill(0,BOARDSIZE,array_fill(0,BOARDSIZE,"🌫"));

print ("Let's play Battleships!\n");
print_board($board);

function print_board($board){
    foreach($board as $row){
        foreach($row as $element){
            print("$element");
        }
        print("\n");
    }
}

function random_pos(){
    return rand(0, BOARDSIZE-1);
}
 
$ship_row = random_pos();
$ship_col = random_pos();

$ship_row1 = random_pos();
$ship_col1 = random_pos();

$ship_row2 = random_pos();
$ship_col2 = random_pos();

printf ("Battleship at (%s,%s)\n",$ship_row,$ship_col);

printf ("Battleship at (%s,%s)\n",$ship_row1,$ship_col1);

printf ("Battleship at (%s,%s)\n",$ship_row2,$ship_col2);

$guess_row = readline("Guess a row: ");
$guess_col = readline("Guess a column: ");

if(($guess_row == $ship_row)&&($guess_col == $ship_col)){
    print ("Congratulations! You sunk one of my battleship!\n");
}
elseif(($guess_row == $ship_row1)&&($guess_col == $ship_col1)){
    print ("Congratulations! You sunk one of my battleship!\n");
}
elseif(($guess_row == $ship_row2)&&($guess_col == $ship_col2)){
    print ("Congratulations! You sunk one of my battleship!\n");
}
else {
    print ("You missed my battleship!\n");
    $board[$guess_row][$guess_col] = "🌊";
}
print_board($board);

for($turn=1; $turn <= GUESSES; $turn++){
    $guess_row = readline("Guess a row: ");
    $guess_col = readline("Guess a column: ");
    if(($guess_row == $ship_row)&&($guess_col == $ship_col)){
        print ("Congratulations! You sunk one of my battleship!\n");
        break;
    }
    elseif(($guess_row == $ship_row1)&&($guess_col == $ship_col1)){
        print ("Congratulations! You sunk one of my battleship!\n");
        break;
    }
    elseif(($guess_row == $ship_row2)&&($guess_col == $ship_col2)){
        print ("Congratulations! You sunk one of my battleship!\n");
        break;
    }
    else {
        print ("You missed my battleship!\n");
        $board[$guess_row][$guess_col] = "🌊";
 
    }
    printf ("After guess %s of %s\n",$turn,GUESSES);
    print_board($board);
}
print "Game Over";

for($turn=1; $turn <= GUESSES; $turn++){
    $guess_row = readline("Guess a row: ");
    $guess_col = readline("Guess a column: ");
    if(($guess_row =="") || ($guess_col == "") ||
       ($guess_row < 0) || ($guess_col < 0) ||
       ($guess_row >= BOARDSIZE) || ($guess_col >= BOARDSIZE))
    {
        print("Oops, that's not even in the ocean. \n");
    } else
    if(($guess_row == $ship_row)&&($guess_col == $ship_col)){
        print ("Congratulations! You sunk my battleship!\n");
        $board[$guess_row][$guess_col] = " 💥";
        break;
    }
    elseif(($guess_row == $ship_row1)&&($guess_col == $ship_col1)){
        print ("Congratulations! You sunk my battleship!\n");
        $board[$guess_row][$guess_col] = " 💥";
        break;
    }
    elseif(($guess_row == $ship_row2)&&($guess_col == $ship_col2)){
        print ("Congratulations! You sunk my battleship!\n");
        $board[$guess_row][$guess_col] = " 💥";
        break;
    }
    else
    if ($board[$guess_row][$guess_col] == "🌊") {
        print("You guesses that one already. \n");
    }
    else
    {
        print ("You missed my battleship!\n");
        $board[$guess_row][$guess_col] = "🌊";
        if ($turn == GUESSES){
            print("Game over!\n");
            $board[$ship_row][$ship_col] = "⛴";
        }
    }
    printf ("This was turn %s of %s\n",$turn,GUESSES);
    print_board($board);
}

?>