//Turn all sections to invisible
function clearAllSections() {
  const sectonsList = document.querySelectorAll("section");
  sectonsList.forEach((element) => {
    element.classList.add("invisible");
  });
}
//Turn a section to visible
function showSection(element) {
  element.classList.remove("invisible");
}

const element = document.getElementById("announcement");
clearAllSections();
showSection(element);
//add event listener to all navigation links show sections
const linksList = document.querySelectorAll(".nav-sections a");
linksList.forEach((element) => {
  const link = element.getAttribute("href");
  element.addEventListener("click", () => {
    clearAllSections();
    let linkAddress = document.querySelector(link);
    showSection(linkAddress);
  });
});
//Fetch univeristy name from local storage
const uniElement = document.getElementById("university");
const uni = localStorage.getItem("uniTeacher");
uniElement.innerText = uni;

localStorage.setItem("goBack", "./Teacher.html");
