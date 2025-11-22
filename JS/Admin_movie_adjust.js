
const textarea = document.querySelector("textarea");
textarea.addEventListener("keyup", e => {
  e.target.style.height = '4px';
  e.target.style.height = e.target.scrollHeight + 'px';
});

//link active
document.querySelectorAll('.nav-link').forEach(function(link) {
  link.addEventListener('click', function() {
    document.querySelectorAll('.nav-link').forEach(function(otherLink) {
      otherLink.classList.remove('active');
    });
    link.classList.add('active');
  });
});
