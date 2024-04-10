# 2048-Game
Coded up a version of the popular single player puzzle game 2048, originally developed by Gabriele Cirulli. Coded in HTML, CSS, And JavaScript.

2048 Game By Hemanth Peddapatla

This HTML, CSS, JavaScript, and PHP based Website is the adaptation of the classic 2048 puzzle game. The game prompts the user to use the keyboard
to move in the four directions: Up, Down, Right, and Left to combine the randomly spawning number tiles on the game grid to equate the final value
of the most valued block to be 2048. Starting from the beginnning, the game will have two tiles spawned in at random places on the grid and will
allow the player to move tiles merging them into one another and doubling the value of the tiles in the process. This process will continue until
either the player has filled the grid and none of the tiles on the grid can be combined anymore or 2048 is reached as the score.

2048.php
This file contains the logic and backend functionality of the 2048 Game. 

2048.html
This file contains HTML, CSS, and JavaScript. It includes the game styling, keyboard logic, and score logic for the game with user interactivity
in JavaScript.

This file has functions initGrid() which initializes the game and spawns the two initial tiles for the game to get started, it then initializes
the score and the High score. The next function is the updateGrid(), this updates the appearance of the grid and and the position of the tiles
in the grid. The next function generateRandomTile() is called at the beginning of the game when the user first enters the site, when the user
presses the restart button, and when the user is playing the game. This function is responsible for spawning a new tile every time the user
clicks on a keyboard direction, spawning a new tile with a value of 2. Another function is moveTiles(), this function is responsible for the 
movement of the tiles in the grid, I initialized the grid with an array and track every tile that is stored in the grid, as well as every tile
that spawns and is removed off of the grid. After that the function mergeTiles(), is responsible for combining the tiles of same value and 
essentially doubling the value of the tile after every merge if they are the same value. The next function after that is getTileColor(), this 
function is responsible for setting the color of a tile for every value from 2 to 2048, the function is initialized with a const rainbowColors 
which essentially holds 10 colors for the ten numbers from 2 to 2048. The next function is UpdateScore(), this updates the score every game and
holds the value of the highest valued tile. After that is UpdateHighScore(), this function updates with score and will hold its value after the
tab is closed, it holds the greatest value achieved by the player. Next is checkGameStatus(), this checks whether the player has won or lost 
and displays a message reflecting the players game status. After that is canMoveTiles(), this function returns a true or false statement that 
signifies to the program whether or not a certain tile can move or are surrounded by different number tiles and cannot move. Finally the last 
function is restartGame(), which resets the game when the user clicks the restart game button. In addition to the functions that give the code
functionality, I also included EventListener for the keyboard functions for the Up, Down, Right, and Left directions.

1. To play the game open your web browser and type in https://hpeddap.people.clemson.edu this url will take you to the landing page of my game
  website, here you can choose between the wordle game and the 2048 game.
2. Click on 2048, once you arrive to the game screen, you can immediately start playing using the arrow keys on your keyboard.
3. The objective is to keep merging the tiles together until the number 2048 is displayed, in which you will then win the game. The number 2048
  is 2^10 of 2 which indicates that you must double the tile values 10 times in total.
4. The game may be restarted at anytime with a click of the restart game button.
