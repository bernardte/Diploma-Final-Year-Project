<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Seat</title>
    <link rel="stylesheet" href="CSS/Movie_seat.css">
</head>
<body>
        <div class="movie-container">
          <h2>Starlight Cinema</h2>
          <label>Select a Movie:</label>
          <select id="movie">
            <option value="15">Wonder Women 1984</option>
            <option value="10">Avenger: Endgame</option>
            <option value="12">Joker</option>
            <option value="8">Toy Story 4</option>
          </select>
          <select>
            <option value="12">12 Jul Sun</option>
            <option value="13">13 Jul Mon</option>
            <option value="14">14 Jul Tue</option>
            <option value="15">15 Jul Wed</option>
            <option value="16">16 Jul Thu</option>
            <option value="17">17 Jul Fri</option>
            <option value="18">18 Jul Sat</option>
          </select>
        </div>
    
        <ul class="showcase"> 
          <li>
            <div class="seat"></div>
            <small>Available</small>
          </li>
          <li>
            <div class="seat selected"></div>
            <small>Selected</small>
          </li>
          <li>
            <div class="seat occupied"></div>
            <small>Occupied</small>
          </li>
        </ul>
    
        <div class="container">
          <div class="screen"></div>

          <div class="column">
              <div class="column-gap">1</div>
              <div class="column-gap">2</div>
              <div class="column-gap">3</div>
              <div class="column-gap">4</div>
              <div class="column-gap">5</div>
              <div class="column-gap">6</div>
              <div class="column-gap">7</div>
              <div class="column-gap">8</div>
          </div>
    
          <div class="row">
            <div>A </div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div>B </div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div>C </div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
          </div>
          <div class="row">
            <div>D </div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div>E </div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div>F </div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div>G </div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div>H </div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
        </div>
    
        <p class="text">
          You have selected <span id="count">0</span> movies for price of RM<span
            id="total"
            >0</span>
        </p>

        <div class="btn">
          <a href="Food_and_Beverages.php" >Proceed to Select Snack</a>
        </div>
      
        <script src="JS/Movie_seat.js"></script>
</body>
</html>