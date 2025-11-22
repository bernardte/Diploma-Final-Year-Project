// Select all the required DOM elements
const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const selectMovie = document.getElementById("movie").value;
const selectDate = document.getElementById("date").value;
let price = document.getElementById("price").value;
const btn = document.querySelector(".btn a");
let count = document.getElementById("count");
let total = document.getElementById("total");
const usersIdInput = document.getElementById("usersId");

// Initialize ticketPrice and date from the selected movie and date elements
let ticketPrice = price;
let date = selectDate;

// Set Movie data and price
function setMovieData(movieIndex, moviePrice, movieDate, movieTitle) {
  localStorage.setItem("selectedMovieIndex", movieIndex);
  localStorage.setItem("selectedMoviePrice", moviePrice);
  localStorage.setItem("selectedMovieDate", movieDate);
  localStorage.setItem("selectedMovieTitle", movieTitle); // Save movie title
}

// Update selected count and total
function updateCountAndTotal() {
  let selectedSeats = document.querySelectorAll(".row .seat.selected");
  count.textContent = selectedSeats.length;

  // Calculate totalSeatSelectionPrice based on ticketPrice and number of selected seats
  let totalSeatSelectionPrice = selectedSeats.length * ticketPrice;

  // Update total element with the calculated price
  if (ticketPrice && ticketPrice > 0) {
    total.textContent = totalSeatSelectionPrice;
  } else {
    total.textContent = " => Please select a movie";
  }

  // Store selected seats data in local storage
  const seatsData = [...selectedSeats].map(seat => seat.dataset.seat);
  localStorage.setItem("selectedSeats", JSON.stringify(seatsData));
}

// Populate UI
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats")) || [];

  seats.forEach((seat, index) => {
    if (selectedSeats.indexOf(seat.dataset.seat) > -1) {
      seat.classList.add("selected");
    }
  });

  const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");
  const selectedMovieDate = localStorage.getItem("selectedMovieDate");

  if (selectedMovieIndex !== null) {
    selectMovie.selectedIndex = selectedMovieIndex;
  }

  if (selectedMovieDate !== null) {
    selectDate.value = selectedMovieDate;
  }
}

// Event listener for date selection
// selectDate.addEventListener("change", (e) => {
//   date = e.target.value;
//   setMovieData(selectMovie.selectedIndex, ticketPrice, date, selectMovie.options[selectMovie.selectedIndex].text); // Update with movie title
//   updateCountAndTotal();
// });

// Event listener for movie selection
// selectMovie.addEventListener("change", (e) => {
//   ticketPrice = e.target.value;
//   setMovieData(e.target.selectedIndex, e.target.value, date, e.target.options[e.target.selectedIndex].text); // Update with movie title
//   updateCountAndTotal();
// });

// Event listener for seat selection
container.addEventListener("click", (e) => {
  if (e.target.classList.contains("seat") && !e.target.classList.contains("occupied")) {
    e.target.classList.toggle("selected");
    updateCountAndTotal();
  } else if (e.target.classList.contains("seat") && e.target.classList.contains("occupied")) {
    alert("This seat is already occupied. Please select another seat.");
  }
});

// Initial update of count and total
updateCountAndTotal();

// Populate UI on page load
populateUI();

btn.addEventListener("click", () => {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");

  const seatsData = [...selectedSeats].map(seat => seat.dataset.seat);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "insert_seat_data.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  const usersId = usersIdInput.value;
  const movieTitle = selectMovie;

  const data = {
    seats: seatsData,
    totalSeatSelectionPrice: total.textContent,
    date: date,
    usersId: usersId,
    movieTitle: movieTitle
  };

  if (selectedSeats.length === 0) {
    console.log("redirect to add_to_cart.php")
    window.location.href="Add_to_cart.php";
    return;
  }
  else{
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.status === "success") {
            const occupiedSeats = JSON.parse(localStorage.getItem("occupiedSeats")) || [];
            seatsData.forEach(seat => occupiedSeats.push(seat));
            localStorage.setItem("occupiedSeats", JSON.stringify(occupiedSeats));

            selectedSeats.forEach(seat => {
              seat.classList.remove("selected");
              seat.classList.add("occupied");
            })
            alert("Seats reserved successfully!");
          } else {
            console.error('Error: ' + response.message);
            alert("Failed to reserve seats. Please try again.");
          }
        } else {
          console.error('Error: ' + xhr.status);
          alert("Failed to connect to server. Please try again later.");
        }
      }
    };

    xhr.send(JSON.stringify(data));
  }
});