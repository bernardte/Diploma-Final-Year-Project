// User post review 
"use strict";

const userID = {
    name: null,
    identity: null,
    image: null, 
    message: null,
    date:null,
};

const userComment = document.querySelector(".usercomment");
const publishBtn = document.querySelector("#Publish");
const comments = document.querySelector(".comments");
const userName = document.querySelector(".user");

    userComment.addEventListener("input", e =>{
        if(!userComment.value){
            publishBtn.setAttribute("disabled", "disabled");
            publishBtn.classList.remove("abled")
        }
        else{
            publishBtn.removeAttribute("disabled");
            publishBtn.classList.add("abled")
        }
    });

function addPost(){
    console.log("The button work!")
    if(!userComment.value) return;
    userID.name = userName.value;
    if(userID.name === "Anonymous"){
        userID.identity = false;
        userID.image = "Image/anonymous.png";
    }
    else{
        userID.identity = true;
        userID.image = "Image/user Profile.jpg";
    }

    userID.message = userComment.value;
    userID.date = new Date().toLocaleString();

    const movieSelect = document.querySelector("#movie");
    // movieSelect.options[movieSelect.selectedIndex]: is the select <option> element.
    const movieTitle = movieSelect.options[movieSelect.selectedIndex].text;

    let published =  
    `<div class="parents">
        <img src = "${userID.image}">
        <div>
            <h1>${userID.name}</h1> 
            <img src="Image/${movieTitle} movie.jpg">
            <h2>${movieTitle}</h2>
            <p>${userID.message}</p>
            <div class="engagements"><img src="Image/like.png"><img src="Image/share.png"></div>
            <span class="date"> ${userID.date}</span>
        </div>
    </div>`;

    comments.innerHTML += published;
    userComment.value = "";

    let commentsNum = document.querySelectorAll(".parents").length;
    document.getElementById("comment").textContent = commentsNum;
};

publishBtn.addEventListener("click", addPost);


userComment.addEventListener("keyup", e => {
    userComment.style.height = "30px";
    let scHeight = e.target.scrollHeight;
    userComment.style.height = `${scHeight}px`;
});
