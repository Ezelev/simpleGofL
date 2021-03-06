<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <script data-main="/js/app.js" src="/js/require.js"></script>
  </head>
  <title></title>
<body>
  <div class="w3-padding-64 w3-margin-bottom w3-center w3-teal">
    <h1 class="w3-jumbo">Game of Life</h1>
  </div>

  <div class="w3-row-padding w3-content" style="max-width:1400px">
    <div class="w3-twothird">

      <h2><a href="https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life">Conway's Game of Life</a></h2>
      <div class="w3-justify">
        <p>
          The Game of Life, also known simply as Life, is a cellular automaton devised by the British mathematician John Horton Conway in 1970.
        </p>
        <p>  The game is a zero-player game, meaning that its evolution is determined by its initial state, requiring no further input. One interacts with the Game of Life by creating an initial configuration and observing how it evolves.
        </p>
        <img src="images/Gospers_glider_gun.gif" alt="glider-gun" style="width:50%">
        <p>
          The universe of the Game of Life is an infinite, two-dimensional orthogonal grid of square cells, each of which is in one of two possible states, alive or dead, (or populated and unpopulated, respectively). Every cell interacts with its eight neighbours, which are the cells that are horizontally, vertically, or diagonally adjacent. At each step in time, the following transitions occur:
        </p>
        <ol>
          <li>Any live cell with fewer than two live neighbours dies, as if by underpopulation.</li>
          <li>Any live cell with two or three live neighbours lives on to the next generation.</li>
          <li>Any live cell with more than three live neighbours dies, as if by overpopulation.</li>
          <li>Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.</li>
        </ol>
<p>These rules, which compare the behavior of the automaton to real life, can be condensed into the following:</p>
<ol>
  <li>Any live cell with two or three neighbors survives.</li>
  <li>Any dead cell with three live neighbors becomes a live cell.</li>
  <li>All other live cells die in the next generation. Similarly, all other dead cells stay dead.</li>
</ol>

<p>The initial pattern constitutes the seed of the system. The first generation is created by applying the above rules simultaneously to every cell in the seed; births and deaths occur simultaneously, and the discrete moment at which this happens is sometimes called a tick. Each generation is a pure function of the preceding one. The rules continue to be applied repeatedly to create further generations.
</p>
        </p>
      </div>

    </div>
    <div class="w3-third">
      <div class="w3-container w3-light-grey">
        <h2>First version ready!</h2>
        <p class="w3-justify">
          First version of my Game of Life online implementation is ready!
          <a href="gofl.php">Try Game of life -></a>
        </p>
      </div>
    </div>
  </div>

  </body>
</body>
</html>
