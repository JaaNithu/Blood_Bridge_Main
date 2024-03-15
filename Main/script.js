window.addEventListener("scroll", function () {
  var scrollPos = window.scrollY;

  /* Scroll the navigation bar */
  var navbar = document.querySelector(".navbar");
  navbar.style.top = scrollPos + "px";

  /* Scroll the footer */
  var footer = document.querySelector(".footer");
  footer.style.bottom = scrollPos + "px";
});

function validateForm() {
  var email = document.forms["myForm"]["email"].value;
  var message = document.forms["myForm"]["message"].value;

  if (email == "" || message == "") {
    alert("Please fill in all required fields");
    return false;
  } else {
    return true;
  }
}

document.getElementById("myForm").addEventListener("submit", function (event) {
  if (!validateForm()) {
    event.preventDefault();
  }
});
