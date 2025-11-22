// side bar controller
const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item =>{
    const li = item.parentElement;
    item.addEventListener('click', () =>{
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

// close the sidebar when clicking the bars
const menuBar = document.querySelector('.content nav .fa-bars');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () =>{
    sideBar.classList.toggle('close');
});

// close control 
window.addEventListener('resize', ()=>{
    if(window.innerWidth < 768){
        sideBar.classList.add('close');
    }
    else{
        sideBar.classList.remove('close');
    }
});

// dark theme mode
// Get the theme toggle element
const toggle = document.getElementById('theme-toggle');

// Add an event listener to the toggle element
toggle.addEventListener('change', function() {
  // If the toggle is checked, add the dark class to the body element
  if (toggle.checked) {
    document.body.classList.add('dark');
    // Store the dark mode state in local storage
    localStorage.setItem('darkMode', 'true');
  } else {
    // If the toggle is not checked, remove the dark class from the body element
    document.body.classList.remove('dark');
    // Store the dark mode state in local storage
    localStorage.setItem('darkMode', 'false');
  }
});

// Add an event listener to the document's DOMContentLoaded event
document.addEventListener('DOMContentLoaded', function() {
  // Get the dark mode state from local storage
  const darkMode = localStorage.getItem('darkMode');
  
  // If the dark mode state is true, add the dark class to the body element
  if (darkMode === 'true') {
    document.body.classList.add('dark');
    /* 
    Set the toggle element to checked. 
    if we don't set the toggle.checked = true, we need to press two time to change the theme.
    */
    toggle.checked = true;
  } else {
    // If the dark mode state is false, remove the dark class from the body element
    document.body.classList.remove('dark');
    // Set the toggle element to unchecked
    toggle.checked = false;
  }
});