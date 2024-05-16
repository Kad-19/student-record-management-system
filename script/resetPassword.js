const emailElement = document.querySelector('#email');
const resetForm = document.querySelector("form");
resetForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if(emailElement.value != ""){
      window.location.href = "login.html";

  }
});
