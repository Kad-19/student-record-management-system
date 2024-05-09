const currPassword = document.getElementById("current-password");
const newPassword = document.getElementById("new-password");
const confirmPassword = document.getElementById("confirm-password");
const submitBtn = document.getElementById("submit");
const formElement = document.getElementById("change-password-form");
const messageElement = document.getElementById("warning-message");
const popupElement = document.getElementById("warning");
const closeBtn = document.getElementById("close-btn");

const goBackLink = localStorage.getItem("goBack");

formElement.addEventListener("submit", (e) => {
  e.preventDefault();

  if (
    currPassword.value == "" ||
    newPassword.value == "" ||
    confirmPassword.value == ""
  ) {
    popupElement.classList.remove("invisible");
    messageElement.innerText = "Please fill all inputs";
  } else if (newPassword.value != confirmPassword.value) {
    popupElement.classList.remove("invisible");

    messageElement.innerText =
      "New password and confirm password doesn't match";
  } else {
    popupElement.classList.remove("invisible");
    messageElement.innerText = "You have successfully changed your password";
    closeBtn.addEventListener("click", () => {
      window.location.href = goBackLink;
    });
  }
});

closeBtn.addEventListener("click", () => {
  popupElement.classList.add("invisible");
});

const goBackElement = document.querySelector(".go-back");
goBackElement.setAttribute("href", goBackLink);
