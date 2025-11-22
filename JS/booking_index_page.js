// let TotalTime = document.querySelectorAll('[id^="t"]');
// function displayTime() {
//         for (let i=0; i<TotalDate.length; i++) {
//             let times = document.querySelector(".times")
//             if (document.getElementById("t" + (i+1)).checked) {
//                 times.insertAdjacentHTML(
//                     "beforeend",
//                     "<input type='radio' name='time' id='t1' checked/><label for='t1' class='time'>11:00</label>"  
//                 );
//             }
            
//         }

// }

let totalTime = document.querySelectorAll('[id^="t"]');
let submit = document.querySelector(".submit-button");
let movieTitle = document.querySelector(".movie-title").innerHTML;
localStorage.setItem("Movie Title", movieTitle);
submit.addEventListener("click", () => {
for (var i = 0; i < totalTime.length; i++) {
    if (document.getElementById("t" + (i+1)).checked) {
      localStorage.setItem("DateTime", document.getElementById("t" + (i+1)).value);
    }
}

});
