// const role = document.getElementById("role");
// const uni = document.getElementById("uni");
// const login = document.getElementById("signin");
// const email = document.getElementById("email");
// const password = document.getElementById("password");
// const loginForm = document.getElementById("loginForm");

// role.addEventListener("change", () => {
//   login.href = role.value + "dfsfgfjhgj";
// });

function redirect (role, auth){
  if(auth){
    window.href = role + ".php";
    console.log("auth");
  }
  else{
    console.log("not auth")
  }
}

// const popupElement = document.getElementById("warning");

// loginForm.addEventListener("submit", (e) => {
//   e.preventDefault();

//   if (
//     role.value == "--select-your-role--" ||
//     uni.value == "--select-university--" ||
//     email.value == "" ||
//     password.value == ""
//   ) {
//     popupElement.classList.remove("invisible");
//   } else {
//     localStorage.setItem("uni" + role.value, uni.value);
//     console.log("uni" + role.value);
//     window.location.href = login.href;
//   }
// });

// const closeBtn = document.getElementById("close-btn");
// closeBtn.addEventListener("click", () => {
//   popupElement.classList.add("invisible");
// });
