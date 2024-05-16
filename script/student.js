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

const element = document.getElementById("personal-records");
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
const uni = localStorage.getItem("uniStudent");
uniElement.innerText = uni;

localStorage.setItem("goBack", "./Student.html");

//grade table
const myGradesTableBody = document.querySelector("#my-grade-table tbody");
//my course table
const myCourseTableBody = document.querySelector("#my-courses-table tbody");
//my grade search input
const gradeSearchInput = document.querySelector("#grade-search");
//my course search input
const courseSearchInput = document.querySelector("#course-search");

//Data of my grade table

//clear a table
function clearTable(tableBody) {
  tableBody.innerHTML = "";
}
//inserting data to my grade table
function insertingToMyGradeTable(tableData) {
  // tableData.forEach((item) => {
  //   const newRow = myGradesTableBody.insertRow();

  //   const nameCell = newRow.insertCell(0);
  //   const idCell = newRow.insertCell(1);
  //   const yearCell = newRow.insertCell(2);
  //   const semisterCell = newRow.insertCell(3);
  //   const gradeCell = newRow.insertCell(4);
  //   const gradeMarkCell = newRow.insertCell(5);
  //   const statusCell = newRow.insertCell(6);

  //   idCell.textContent = item.id;
  //   nameCell.textContent = item.name;
  //   yearCell.textContent = item.year;
  //   semisterCell.textContent = item.semister;
  //   gradeCell.textContent = item.grade;
  //   gradeMarkCell.textContent = item.gradeMark;
  //   statusCell.textContent = item.status;
  // });
}
// insertingToMyGradeTable(myGradeData);

//inserting data to my courses table
function insertingToMyCoursesTable(tableData) {
  // tableData.forEach((item) => {
  //   const newRow = myCourseTableBody.insertRow();

  //   const nameCell = newRow.insertCell(0);
  //   const idCell = newRow.insertCell(1);
  //   const gradeCell = newRow.insertCell(2);
  //   const gradeMarkCell = newRow.insertCell(3);
  //   const statusCell = newRow.insertCell(4);

  //   idCell.textContent = item.id;
  //   nameCell.textContent = item.name;
  //   gradeCell.textContent = item.grade;
  //   gradeMarkCell.textContent = item.gradeMark;
  //   statusCell.textContent = item.status;
  // });
}
// insertingToMyCoursesTable(myCoursesData);
//search a text from a table
function search(tableBody, tableData, text) {
  text = text.toLowerCase();
  clearTable(tableBody);
  const filteredData = tableData.filter((item) =>
    item.id.toLowerCase().includes(text)
  );
  return filteredData;
}
//add event listner to the search inputs
gradeSearchInput.addEventListener("input", () => {
  clearTable(myGradesTableBody);
  let filtered = search(myGradesTableBody, myGradeData, gradeSearchInput.value);
  // insertingToMyGradeTable(filtered);
});
courseSearchInput.addEventListener("input", () => {
  clearTable(myCourseTableBody);
  let filtered = search(
    myCourseTableBody,
    myCoursesData,
    courseSearchInput.value
  );
  // insertingToMyCoursesTable(filtered);
});

const messageElement = document.getElementById("warning-message");
const popupElement = document.getElementById("warning");
const closeBtn = document.getElementById("close-btn");

//register new semester validation
const registerSemesterForm = document.getElementById(
  "register-new-semester-form"
);
const foodElement = document.getElementById("food");
const boardingElement = document.getElementById("boarding");

registerSemesterForm.addEventListener("submit", (e) => {
  if (
    foodElement.value == "--service-type--" ||
    boardingElement.value == "--service-type--"
  ) {
    popupElement.classList.add("warning");
    popupElement.classList.remove("invisible");
    messageElement.innerText = "Please fill all inputs";
  } else {
    popupElement.classList.add("warning");

    popupElement.classList.remove("invisible");
    messageElement.innerText =
      "You have successfully registered to the next semester";
    closeBtn.addEventListener("click", () => {
      window.location.href = "";
    });
  }
});

closeBtn.addEventListener("click", () => {
  popupElement.classList.add("invisible");
  popupElement.classList.remove("warning");
});

//add courses form validation
const addcourseForm = document.getElementById("add-course-form");
addcourseForm.addEventListener("submit", (e) => {
  popupElement.classList.add("warning");

  popupElement.classList.remove("invisible");
  messageElement.innerText = "You have successfully added a course";
  closeBtn.addEventListener("click", () => {
    window.location.href = "";
  });
});

//drop courses form validation
const dropCourseForm = document.getElementById("drop-course-form");
dropCourseForm.addEventListener("submit", (e) => {
  popupElement.classList.add("warning");

  popupElement.classList.remove("invisible");
  messageElement.innerText = "You have successfully dropped a course";
  closeBtn.addEventListener("click", () => {
    window.location.href = "";
  });
});
