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

//courses table
const coursesTableBody = document.querySelector("#courses-table tbody");
//grade book table
const gradeBookTableBody = document.querySelector("#gradeBook-table tbody");
//attendance table
const attendanceTableBody = document.querySelector("#attendance-table tbody");
//courses search input
const coursesSearchInput = document.querySelector("#course-search");
//grade book search input
const gradeSearchInput = document.querySelector("#grade-search");
//attendance search input
const attendanceSearchInput = document.querySelector("#attendance-search");

//Data of courses table
const coursesData = [
  {
    id: "SWEG3107",
    name: "Internet Programming I",
    creditHour: 3,
    department: "Software Engineering",
    year: 3,
    semester: 1,
    classSection: "C",
    numberOfStudents: 50,
  },
  {
    id: "SWEG3107",
    name: "Internet Programming I",
    creditHour: 3,
    department: "Software Engineering",
    year: 3,
    semester: 1,
    classSection: "C",
    numberOfStudents: 50,
  },
  {
    id: "SWEG3107",
    name: "Internet Programming I",
    creditHour: 3,
    department: "Software Engineering",
    year: 3,
    semester: 1,
    classSection: "C",
    numberOfStudents: 50,
  },
  {
    id: "SWEG3107",
    name: "Internet Programming I",
    creditHour: 3,
    department: "Software Engineering",
    year: 3,
    semester: 1,
    classSection: "C",
    numberOfStudents: 50,
  },
  {
    id: "SWEG3107",
    name: "Internet Programming I",
    creditHour: 3,
    department: "Software Engineering",
    year: 3,
    semester: 1,
    classSection: "C",
    numberOfStudents: 50,
  },
];
//Data of grade book
const gradeBookData = [
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
  {
    id: "ETS0925/14",
    fName: "Kidus",
    lName: "Asebe",
    test: 15,
    labTest: 10,
    quiz: 5,
    project: 20,
    final: 50,
    total: 100,
  },
];

//Data of attendance table
const attendanceData = [
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
  { id: "ETS0925/14", fName: "Kidus", lName: "Asebe" },
];
//clear a table
function clearTable(tableBody) {
  tableBody.innerHTML = "";
}
//inserting data to courses table
function insertingToCoursesTable(tableData) {
  tableData.forEach((item) => {
    const newRow = coursesTableBody.insertRow();

    const idCell = newRow.insertCell(0);
    const nameCell = newRow.insertCell(1);
    const creditHourCell = newRow.insertCell(2);
    const departmentCell = newRow.insertCell(3);
    const yearCell = newRow.insertCell(4);
    const semesterCell = newRow.insertCell(5);
    const sectionCell = newRow.insertCell(6);
    const numberOfStudentsCell = newRow.insertCell(7);

    idCell.textContent = item.id;
    nameCell.textContent = item.name;
    creditHourCell.textContent = item.creditHour;
    departmentCell.textContent = item.department;
    yearCell.textContent = item.year;
    semesterCell.textContent = item.semester;
    sectionCell.textContent = item.classSection;
    numberOfStudentsCell.textContent = item.numberOfStudents;
  });
}
insertingToCoursesTable(coursesData);

//inserting data to grade book
function insertingToGradeBook(tableData) {
  tableData.forEach((item) => {
    const newRow = gradeBookTableBody.insertRow();

    const fNameCell = newRow.insertCell(0);
    const lNameCell = newRow.insertCell(1);
    const idCell = newRow.insertCell(2);
    const testCell = newRow.insertCell(3);
    const labTestCell = newRow.insertCell(4);
    const quizCell = newRow.insertCell(5);
    const projectCell = newRow.insertCell(6);
    const finalCell = newRow.insertCell(7);
    const totalCell = newRow.insertCell(8);

    idCell.textContent = item.id;
    fNameCell.textContent = item.fName;
    lNameCell.textContent = item.lName;

    let testInputElement = document.createElement("input");
    testInputElement.type = "number";
    testInputElement.value = item.test;
    testInputElement.min = 0;
    testInputElement.max = 15;
    testInputElement.step = 0.1;
    testCell.appendChild(testInputElement);
    let labTestInputElement = document.createElement("input");
    labTestInputElement.type = "number";
    labTestInputElement.value = item.labTest;
    labTestInputElement.min = 0;
    labTestInputElement.max = 10;
    labTestInputElement.step = 0.1;
    labTestCell.appendChild(labTestInputElement);
    let quizInputElement = document.createElement("input");
    quizInputElement.type = "number";
    quizInputElement.value = item.quiz;
    quizInputElement.min = 0;
    quizInputElement.max = 5;
    quizInputElement.step = 0.1;
    quizCell.appendChild(quizInputElement);
    let projectInputElement = document.createElement("input");
    projectInputElement.type = "number";
    projectInputElement.value = item.project;
    projectInputElement.min = 0;
    projectInputElement.max = 20;
    projectInputElement.step = 0.1;
    projectCell.appendChild(projectInputElement);
    let finalInputElement = document.createElement("input");
    finalInputElement.type = "number";
    finalInputElement.value = item.final;
    finalInputElement.min = 0;
    finalInputElement.max = 50;
    finalInputElement.step = 0.1;
    finalCell.appendChild(finalInputElement);
    totalCell.textContent =
      item.final + item.quiz + item.labTest + item.test + item.project;
  });
}
insertingToGradeBook(gradeBookData);
//inserting data to attendance
function insertingToAttendance(tableData) {
  tableData.forEach((item) => {
    const newRow = attendanceTableBody.insertRow();

    const fNameCell = newRow.insertCell(0);
    const lNameCell = newRow.insertCell(1);
    const idCell = newRow.insertCell(2);
    for (let i = 0; i < 5; i++) {
      const date = newRow.insertCell(i + 3);
      let input = document.createElement("input");
      input.type = "checkbox";
      date.appendChild(input);
    }
    fNameCell.textContent = item.fName;
    lNameCell.textContent = item.lName;
    idCell.textContent = item.id;
  });
}
insertingToAttendance(attendanceData);
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
coursesSearchInput.addEventListener("input", () => {
  clearTable(coursesTableBody);
  let filtered = search(coursesTableBody, coursesData, coursesSearchInput.value);
  insertingToCoursesTable(filtered);
});
gradeSearchInput.addEventListener("input", () => {
  clearTable(gradeBookTableBody);
  let filtered = search(
    gradeBookTableBody,
    gradeBookData,
    gradeSearchInput.value
  );
  insertingToGradeBook(filtered);
});
attendanceSearchInput.addEventListener("input", () => {
  clearTable(attendanceTableBody);
  let filtered = search(
    attendanceTableBody,
    attendanceData,
    attendanceSearchInput.value
  );
  insertingToAttendance(filtered);
});
