<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/Admin-style.css" />
    <title>Admin</title>
  </head>
  <body>
    <header>
      <h1>Administrator</h1>
    </header>

    <nav>
      <label for="menu-click">
        <img src="/images/menu.svg" alt="menu-icon" />
      </label>
      <input type="checkbox" id="menu-click" />
      <div class="nav-sections">
        <p id="university"></p>
        <a class="logout" href="index.html"
          ><img src="./images/logout.svg" alt="logout icon" />Logout</a
        >
        <a href="#students-information">Students Information</a>
        <a href="#course-information">Course Information</a>
        <a href="#register-student">Register a Student</a>
        <a href="#update-student">Update a Student</a>
        <a href="#add-new-course">Add a New Course</a>
        <a href="#update-course">Update a Course</a>
        <a href="#statistical-report">Statistical Report</a>
        <a href="changePassword.html">Change Password</a>
      </div>
    </nav>
    <main>
      <article id="warning" class="invisible">
        <div id="popup">
          <div id="warning-message"></div>
          <button id="close-btn">Ok</button>
        </div>
      </article>
      <section id="students-information">
        <h2>Students Information</h2>
        <div class="search-wrapper">
          <div class="search">
            <input type="text" placeholder="Student Id" id="students-search" />
            <img src="./images/search.svg" />
          </div>
        </div>
        <div class="table-wrapper">
          <table class="fl-table" id="students-information-table">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>ID</th>
                <th>Department</th>
                <th>Year</th>
                <th>Semister</th>
                <th>CGPA</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </section>

      <section id="course-information">
        <h2>Course Information</h2>
        <div class="search-wrapper">
          <div class="search">
            <input type="text" placeholder="Course code" id="course-search" />
            <img src="./images/search.svg" />
          </div>
        </div>
        <div class="table-wrapper">
          <table class="fl-table" id="course-information-table">
            <thead>
              <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Credit Hour</th>
                <th>Department</th>
                <th>Year</th>
                <th>Semister</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </section>

      <section id="register-student">
        <h2>Register a Student</h2>
        <form id="register-student-form">
          <div class="">
            <label for="fname">First Name</label>
            <input type="text" id="fname" placeholder="First Name" required />
          </div>
          <div class="">
            <label for="mname">Middle Name</label>
            <input type="text" id="mname" placeholder="Middle Name" required />
          </div>
          <div class="">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" placeholder="Last Name" required />
          </div>
          <div class="">
            <label for="id">Id</label>
            <input type="text" id="id" placeholder="ETS0000/10" required />
          </div>
          <div class="">
            <label for="department">Department</label>
            <select id="department" required>
              <option>--select-department--</option>
              <option>Natural Science</option>
            </select>
          </div>
          <div>
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              placeholder="email@gmail.com"
              required
            />
          </div>
          <button type="submit" class="submit-btn" id="register-submit">
            Register Student
          </button>
        </form>
      </section>

      <section id="update-student">
        <h2>Update a Student</h2>
        <form id="update-student-form">
          <div class="">
            <label for="studId">Student Id</label>
            <input type="text" id="studId" list="students-list" placeholder="Student Id" required />
            <datalist id="students-list">
              <option>ETS0921/14</option>
              <option>ETS0922/14</option>
              <option>ETS0923/14</option>
              <option>ETS0924/14</option>
              <option>ETS0925/14</option>
              <option>ETS0926/14</option>
              <option>ETS0927/14</option>
              <option>ETS0928/14</option>
              <option>ETS0929/14</option>
              <option>ETS0930/14</option>
              <option>ETS0931/14</option>
              <option>ETS0932/14</option>
              <option>ETS0933/14</option>
            </datalist>
          </div>
          <div class="">
            <label for="fname1">First Name</label>
            <input type="text" id="fname1" placeholder="First Name" required />
          </div>
          <div class="">
            <label for="mname1">Middle Name</label>
            <input type="text" id="mname1" placeholder="Middle Name" required />
          </div>
          <div class="">
            <label for="lname1">Last Name</label>
            <input type="text" id="lname1" placeholder="Last Name" required />
          </div>
          <div class="">
            <label for="status">Status</label>
            <select id="status">
              <option>--change-status--</option>
              <option>Widthdrawal</option>
              <option>Readmition</option>
            </select>
          </div>

          <div class="">
            <label for="student-department">Department</label>
            <select id="student-department" required>
              <option>--select-department--</option>
              <option>Natural Science</option>
              <option>Software Engineering</option>
              <option>Electrical Engineering</option>
              <option>ElectroMechanical Engineering</option>
              <option>civil Engineering</option>
              <option>Mechanical Engineering</option>
            </select>
          </div>
          <button type="submit" class="submit-btn" id="update-student-submit">
            Update Student
          </button>
        </form>
      </section>

      <section id="add-new-course">
        <h2>Add a New Course</h2>
        <form id="add-new-course-form">
          <div class="">
            <label for="course-name">Course Name</label>
            <input
              type="text"
              id="course-name"
              placeholder="Course Name"
              required
            />
          </div>
          <div class="">
            <label for="course-code">Course Code</label>
            <input
              type="text"
              id="course-code"
              placeholder="ABCD1234"
              required
            />
          </div>
          <div class="">
            <label for="credit-hr">Credit hour</label>
            <input
              type="number"
              id="credit-hr"
              placeholder="Credit Hour"
              required
            />
          </div>
          <div class="">
            <label for="course-department">Department</label>
            <select id="course-department" required>
              <option>--select-department--</option>
              <option>Natural Science</option>
            </select>
          </div>
          <div class="">
            <label for="year">Year</label>
            <input type="number" id="year" value="1" min="1" />
          </div>
          <div class="">
            <label for="semester">Semister</label>
            <input
              type="number"
              id="semester"
              value="1"
              min="1"
              max="2"
              required
            />
          </div>
          <div class="">
            <label for="prerequisite">Prerequisite</label>
            <input type="text" id="prerequisite" placeholder="Prerequisite" />
          </div>
          <button type="submit" class="submit-btn" id="add-new-course-submit">
            Create new course
          </button>
        </form>
      </section>

      <section id="update-course">
        <h2>Update a Course</h2>
        <form id="update-course-form">
          <div class="">
            <label for="course-code1">Course Code</label>
            <input
              id="course-code1"
              list="course-code-list"
              placeholder="Course code"
              required
            />
            <datalist id="course-code-list">
              <option>SWEG3107</option>
              <option>SWEG3106</option>
              <option>SWEG3105</option>
              <option>SWEG3104</option>
              <option>SWEG3102</option>
            </datalist>
          </div>
          <div class="">
            <label for="course-name1">Course Name</label>
            <input
              type="text"
              id="course-name1"
              placeholder="Course Name"
              required
            />
          </div>
          <div class="">
            <label for="credit-hr1">Credit hour</label>
            <input
              type="number"
              id="credit-hr1"
              placeholder="ABCD1234"
              required
            />
          </div>
          <div class="">
            <label for="course-department1">Department</label>
            <select id="course-department1" required>
              <option>--select-department--</option>
              <option>Natural Science</option>
            </select>
          </div>
          <div class="">
            <label for="year1">Year</label>
            <input type="number" id="year1" value="1" min="1" />
          </div>
          <div class="">
            <label for="semester1">Semister</label>
            <input
              type="number"
              id="semester1"
              value="1"
              min="1"
              max="2"
              required
            />
          </div>
          <div class="">
            <label for="prerequisite1">Prerequisite</label>
            <input type="text" id="prerequisite1" placeholder="Prerequisite" />
          </div>
          <button type="submit" class="submit-btn">Update course</button>
        </form>
      </section>

      <section id="statistical-report">
        <h2>Statistical Report</h2>
        <div class="table-wrapper">
          <table class="fl-table">
            <thead>
              <tr>
                <th>Batch</th>
                <th>Passed</th>
                <th>Warned</th>
                <th>Failed</th>
                <th>Withdraws</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
              <tr>
                <th>2</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
              <tr>
                <th>3</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
              <tr>
                <th>4</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
              <tr>
                <th>5</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>
    <script src="./script/administrator.js"></script>
  </body>
</html>
