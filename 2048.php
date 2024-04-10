<?php
session_start(); // Start or resume the session

// Function to generate initial game grid
function initGrid($size) {
    $_SESSION['grid'] = array_fill(0, $size, array_fill(0, $size, 0));
}

// Function to generate a random tile
function generateRandomTile() {
    $emptyCells = array();
    $grid = $_SESSION['grid'];
    $size = count($grid);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($grid[$i][$j] === 0) {
                $emptyCells[] = array('row' => $i, 'col' => $j);
            }
        }
    }

    if (!empty($emptyCells)) {
        $randomIndex = array_rand($emptyCells);
        $randomCell = $emptyCells[$randomIndex];
        $_SESSION['grid'][$randomCell['row']][$randomCell['col']] = 2; // Always spawn a 2 tile
    }
}

// Function to move tiles in the specified direction
function moveTiles($deltaRow, $deltaCol) {
    $grid = $_SESSION['grid'];
    $size = count($grid);
    $moved = false;
    $movedTiles = array_fill(0, $size, array_fill(0, $size, false));

    for ($i = $deltaRow === 1 ? $size - 1 : ($deltaRow === -1 ? 0 : 0); $deltaRow === 1 ? $i >= 0 : ($deltaRow === -1 ? $i < $size : $i < $size); $deltaRow === 1 ? $i-- : ($deltaRow === -1 ? $i++ : $i++)) {
        for ($j = $deltaCol === 1 ? $size - 1 : ($deltaCol === -1 ? 0 : 0); $deltaCol === 1 ? $j >= 0 : ($deltaCol === -1 ? $j < $size : $j < $size); $deltaCol === 1 ? $j-- : ($deltaCol === -1 ? $j++ : $j++)) {
            if ($grid[$i][$j] !== 0) {
                $newRow = $i + $deltaRow;
                $newCol = $j + $deltaCol;
                while ($newRow >= 0 && $newRow < $size && $newCol >= 0 && $newCol < $size && $grid[$newRow][$newCol] === 0) {
                    $grid[$newRow][$newCol] = $grid[$i][$j];
                    $grid[$i][$j] = 0;
                    $i = $newRow;
                    $j = $newCol;
                    $newRow += $deltaRow;
                    $newCol += $deltaCol;
                    $moved = true;
                }
            }
        }
    }

    $_SESSION['grid'] = $grid;
    return $moved;
}

// Initialize the game grid
initGrid(4);

// Handle user input
if (isset($_POST['move'])) {
    $move = $_POST['move'];
    switch ($move) {
        case 'up':
            moveTiles(-1, 0);
            break;
        case 'down':
            moveTiles(1, 0);
            break;
        case 'left':
            moveTiles(0, -1);
            break;
        case 'right':
            moveTiles(0, 1);
            break;
    }
    generateRandomTile(); // Generate a new random tile after each move
}
?>
