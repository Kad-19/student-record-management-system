//students information table
const StudentsTableBody = document.querySelector(
  "#students-information-table tbody"
);
//courses information table
const coursesTableBody = document.querySelector(
  "#course-information-table tbody"
);
//students search input
const searchInput = document.querySelector("#students-search");
//courses search input
const courseSearchInput = document.querySelector("#course-search");

//Data of students
const studentInfoData = [
  {
    id: "ETS0925/14",
    firstName: "Kidus",
    lastName: "Asebe",
    department: "EME",
    year: 3,
    semister: 1,
    cgpa: 3.8,
    status: "Pass",
  },
  {
    id: "ETS0924/14",
    firstName: "Kidus",
    lastName: "Hawoltu",
    department: "SWEG",
    year: 3,
    semister: 1,
    cgpa: 3.9,
    status: "Pass",
  },
  {
    id: "ETS0926/14",
    firstName: "Kidus",
    lastName: "Berhane",
    department: "SWEG",
    year: 3,
    semister: 1,
    cgpa: 3.7,
    status: "Pass",
  },
  {
    id: "ETS0925/14",
    firstName: "Kidus",
    lastName: "Asebe",
    department: "SWEG",
    year: 3,
    semister: 1,
    cgpa: 3.6,
    status: "Pass",
  },
  {
    id: "ETS0925/14",
    firstName: "Kidus",
    lastName: "Asebe",
    department: "SWEG",
    year: 3,
    semister: 1,
    cgpa: 3.5,
    status: "Pass",
  },
];
//Data of courses
const courseData = [
  {
    id: "SWEG3107",
    name: "Internet Programming",
    creditHour: "3",
    department: "Electrical engineering",
    year: "3",
    semister: "1",
  },
  {
    id: "SWEG3105",
    name: "Internet Programming",
    creditHour: "3",
    department: "Software engineering",
    year: "3",
    semister: "1",
  },
  {
    id: "SWEG3106",
    name: "Internet Programming",
    creditHour: "3",
    department: "Software engineering",
    year: "3",
    semister: "1",
  },
  {
    id: "SWEG3104",
    name: "Internet Programming",
    creditHour: "3",
    department: "Software engineering",
    year: "3",
    semister: "1",
  },
  {
    id: "SWEG3103",
    name: "Internet Programming",
    creditHour: "3",
    department: "Software engineering",
    year: "3",
    semister: "1",
  },
  {
    id: "SWEG3102",
    name: "Internet Programming",
    creditHour: "3",
    department: "Software engineering",
    year: "3",
    semister: "1",
  },
];
//inserting data to students information table
function insertStudentInfoData(tableData) {
  const tableBody = document.querySelector("#students-information-table tbody");

  tableData.forEach((item) => {
    const newRow = tableBody.insertRow();

    const fNameCell = newRow.insertCell(0);
    const lNameCell = newRow.insertCell(1);
    const idCell = newRow.insertCell(2);
    const departmentCell = newRow.insertCell(3);
    const yearCell = newRow.insertCell(4);
    const semisterCell = newRow.insertCell(5);
    const cgpaCell = newRow.insertCell(6);
    const statusCell = newRow.insertCell(7);

    idCell.textContent = item.id;
    fNameCell.textContent = item.firstName;
    lNameCell.textContent = item.lastName;
    departmentCell.textContent = item.department;
    yearCell.textContent = item.year;
    semisterCell.textContent = item.semister;
    cgpaCell.textContent = item.cgpa;
    statusCell.textContent = item.status;
  });
}
insertStudentInfoData(studentInfoData);
//inserting data to courses information table
function courseInfoData(tableData) {
  const tableBody = document.querySelector("#course-information-table tbody");

  tableData.forEach((item) => {
    const newRow = tableBody.insertRow();

    const nameCell = newRow.insertCell(0);
    const courseCodeCell = newRow.insertCell(1);
    const creditHourCell = newRow.insertCell(2);
    const courseDepartmentCell = newRow.insertCell(3);
    const courseYearCell = newRow.insertCell(4);
    const courseSemisterCell = newRow.insertCell(5);

    courseCodeCell.textContent = item.id;
    nameCell.textContent = item.name;
    courseDepartmentCell.textContent = item.department;
    courseYearCell.textContent = item.year;
    courseSemisterCell.textContent = item.semister;
    creditHourCell.textContent = item.creditHour;
  });
}
courseInfoData(courseData);
//clear a table
function clearTable(tableBody) {
  tableBody.innerHTML = "";
}

searchInput.addEventListener("input", () => {
  clearTable(StudentsTableBody);
  let filtered = search(StudentsTableBody, studentInfoData, searchInput.value);
  insertStudentInfoData(filtered);
});
courseSearchInput.addEventListener("input", () => {
  clearTable(coursesTableBody);
  let filtered = search(coursesTableBody, courseData, courseSearchInput.value);

  courseInfoData(filtered);
});
//search a text from a table
function search(tableBody, tableData, text) {
  text = text.toLowerCase();
  clearTable(tableBody);
  const filteredData = tableData.filter((item) =>
    item.id.toLowerCase().includes(text)
  );
  return filteredData;
}
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

const element = document.getElementById("students-information");
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
const uni = localStorage.getItem("uniAdministrator");
uniElement.innerText = uni;

localStorage.setItem("goBack", "./Administrator.html");

//Sort Students with cgpa
function CGPA_asce() {
  clearTable(StudentsTableBody);
  const sorted = studentInfoData.sort((a, b) => {
    return a.cgpa - b.cgpa;
  });
  insertStudentInfoData(sorted);
  return sorted;
}
function CGPA_desc() {
  clearTable(StudentsTableBody);
  const sorted = studentInfoData.sort((a, b) => {
    return b.cgpa - a.cgpa;
  });
  insertStudentInfoData(sorted);
  return sorted;
}

//Filer Courses with Department
function filterCourse(text) {
  clearTable(coursesTableBody);
  const filterd = courseData.filter((item) => item.department.includes(text));
  courseInfoData(filterd);
  return filterd;
}

//resgister a student form validation
const studentResgisterForm = document.querySelector("#register-student-form");
const departmentElement = document.querySelector("#department");
const registerBtn = document.querySelector("#register-submit");
const messageElement = document.getElementById("warning-message");
const popupElement = document.getElementById("warning");
const closeBtn = document.getElementById("close-btn");

studentResgisterForm.addEventListener("submit", (e) => {
  e.preventDefault();

  if (departmentElement.value == "--select-department--") {
    popupElement.classList.add("warning");
    popupElement.classList.remove("invisible");
    messageElement.innerText = "Please fill department input";
  } else {
    popupElement.classList.add("warning");

    popupElement.classList.remove("invisible");
    messageElement.innerText =
      "You have successfully registered a new student ";
    closeBtn.addEventListener("click", () => {
      window.location.href = "";
    });
  }
});

closeBtn.addEventListener("click", () => {
  popupElement.classList.add("invisible");
  popupElement.classList.remove("warning");
});

//update a student form validation
const studentUpdateForm = document.querySelector("#update-student-form");
const departmentUpdateElement = document.querySelector("#student-department");
const statusUpdateElement = document.querySelector("#status");
const UpdateStudentBtn = document.querySelector("#register-submit");

studentUpdateForm.addEventListener("submit", (e) => {
  e.preventDefault();

  if (
    statusUpdateElement.value == "--change-status--" ||
    departmentUpdateElement.value == "--select-department--"
  ) {
    popupElement.classList.add("warning");
    popupElement.classList.remove("invisible");
    messageElement.innerText = "Please fill all input fields";
  } else {
    popupElement.classList.add("warning");

    popupElement.classList.remove("invisible");
    messageElement.innerText = "You have successfully updated a student ";
    closeBtn.addEventListener("click", () => {
      window.location.href = "";
    });
  }
});

//add a new course form validation
const addNewCourseForm = document.querySelector("#add-new-course-form");
const courseDepartmentElement = document.querySelector("#course-department");

addNewCourseForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if(courseDepartmentElement.value == "--select-department--"){
    popupElement.classList.add("warning");
    popupElement.classList.remove("invisible");
    messageElement.innerText = "Please fill department input";
  }
  else{
    popupElement.classList.add("warning");

    popupElement.classList.remove("invisible");
    messageElement.innerText =
      "You have successfully added a new course";
    closeBtn.addEventListener("click", () => {
      window.location.href = "";
    });
  }
})

//update a course form validation
const updateCourseForm = document.querySelector('#update-course-form');
const updateDepartmentElement = document.querySelector('#course-department1');

updateCourseForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if(updateDepartmentElement.value == "--select-department--"){
    popupElement.classList.add("warning");
    popupElement.classList.remove("invisible");
    messageElement.innerText = "Please fill department input";
  }
  else{
    popupElement.classList.add("warning");

    popupElement.classList.remove("invisible");
    messageElement.innerText =
      "You have successfully updated a course";
    closeBtn.addEventListener("click", () => {
      window.location.href = "";
    });
  }
});

