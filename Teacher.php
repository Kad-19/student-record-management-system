<?php
session_start();
if($_SESSION['role'] != 'teacher'){
  header("Location: http://localhost/student-record-management-system/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/teacher-style.css" />
    <title>Teacher</title>
  </head>
  <body>
    <header>
      <h2>Teacher Dashboard</h2>
    </header>

    <datalist id="section-list">
      <option value="1st year section A" />
      <option value="1st year section B" />
      <option value="1st year section C" />
      <option value="1st year section D" />
      <option value="1st year section E" />
      <option value="2nd year section A" />
      <option value="2nd year section B" />
      <option value="2nd year section C" />
      <option value="2nd year section D" />
      <option value="2nd year section E" />
      <option value="3rd year section A" />
      <option value="3rd year section B" />
      <option value="3rd year section C" />
      <option value="3rd year section D" />
      <option value="3rd year section E" />
      <option value="4th year section A" />
      <option value="4th year section B" />
      <option value="4th year section C" />
      <option value="4th year section D" />
      <option value="4th year section E" />
      <option value="5th year section A" />
      <option value="5th year section B" />
      <option value="5th year section C" />
      <option value="5th year section D" />
      <option value="5th year section E" />
    </datalist>

    <nav>
      <label for="menu-click">
        <img src="/images/menu.svg" alt="menu-icon" />
      </label>
      <input type="checkbox" id="menu-click" />
      <div class="nav-sections">
        <p id="university"></p>
        <a class="logout" href="index.php"
          ><img src="./images/logout.svg" alt="logout icon" />Logout</a
        >
        <a href="#announcement">Announcement</a>
        <a href="#courses">Courses</a>
        <a href="#gradebook">Grade Book</a>
        <a href="#attendance">Attendance</a>
        <a href="#class-schedule">Class Schedule</a>
        <a href="changePassword.html">Change Password</a>
      </div>
    </nav>

    <main>
      <section id="warning" class="invisible">
        <div id="popup">
          <div id="warning-message"></div>
          <button id="close-btn">Ok</button>
        </div>
      </section>
      <section id="announcement">
        <h2>Announcement</h2>
        <div class="announcement-wrapper">
          <article>
            <p>We have class tomorrow</p>
            <p class="time">Section C</p>
            <p class="time">13/01/2024 2pm</p>
          </article>
          <article>
            <p>We have class tomorrow</p>
            <p class="time">Section B</p>
            <p class="time">13/01/2024 2pm</p>
          </article>
          <article>
            <p>We have class tomorrow</p>
            <p class="time">Section B</p>
            <p class="time">13/01/2024 2pm</p>
          </article>
          <form>
            <div>
              <input
                type="text"
                value="Announcement"
                class="anounce-input"
                required
              />
              <input
                type="text"
                value=""
                list="section-list"
                placeholder="Section"
              />
              <button type="submit" class="submit-btn" value="Announce">
                Announce
              </button>
            </div>
          </form>
        </div>
      </section>
      
      <section id="courses">
        <h2>Courses</h2>
        <div class="search-wrapper">
          <div class="search">
            <input type="text" placeholder="Course code" id="course-search"/>
            <img src="./images/search.svg">
          </div>
        </div>
        <div class="table-wrapper" id="courses-table">
          <table class="fl-table">
            <thead>
              <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit Hour</th>
                <th>Department</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Class Section</th>
                <th>Number of Students</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </section>

      <section id="gradebook">
        <h2>Grade Book</h2>
        <div class="search-wrapper">
          <div class="search">
            <input type="text" placeholder="Student Id" id="grade-search"/>
            <img src="./images/search.svg">
          </div>
        </div>
        <div class="table-wrapper">
          <table class="fl-table" id="gradeBook-table">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>ID</th>
                <th>Test</th>
                <th>Lab Test</th>
                <th>Quiz</th>
                <th>Project</th>
                <th>Final Exam</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          <form>
            <button type="submit" class="submit-btn" value="Save Changes">
              Save Changes
            </button>
          </form>
        </div>
      </section>

      <section id="attendance">
        <h2>Attendance</h2>
        <div class="search-wrapper">
          <div class="search">
            <input type="text" placeholder="Student Id" id="attendance-search"/>
            <img src="./images/search.svg">
          </div>
        </div>
        <div class="table-wrapper">
          <table class="fl-table" id="attendance-table">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>ID</th>
                <th>Date 1</th>
                <th>Date 2</th>
                <th>Date 3</th>
                <th>Date 4</th>
                <th>Date 5</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <form>
            <button type="submit" class="submit-btn" value="Save Changes">
              Save Changes
            </button>
          </form>
        </div>
      </section>
      
      <section id="class-schedule">
        <h2>Class Schedule</h2>
        <div class="table-wrapper">
          <table class="fl-table">
            <thead>
              <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>02 : 30 - 04 : 30 AM</th>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    value="Object Oriented Programming"
                  /><input
                    type="text"
                    value="3rd year section C"
                    list="section-list"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    value="Object Oriented Programming"
                  /><input
                    type="text"
                    value="3rd year section C"
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
              </tr>
              <tr>
                <th>04 : 30 - 06 : 30 AM</th>
                <td>
                  <input
                    type="text"
                    value="Data Structures and Algorithm"
                  /><input
                    type="text"
                    value="3rd year section A"
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
              </tr>
              <tr>
                <th>08 : 00 - 10 : 00 AM</th>
                <td>
                  <input
                    type="text"
                    value="Data Structures and Algorithm"
                  /><input
                    type="text"
                    value="3rd year section A"
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
                <td>
                  <input type="text" value="" /><input
                    type="text"
                    value=""
                    list="section-list"
                  />
                </td>
              </tr>
            </tbody>
          </table>
          <form>
            <button type="submit" class="submit-btn" value="Save Changes">
              Save Changes
            </button>
          </form>
        </div>
      </section>
    </main>
    <script src="/script/teacher.js"></script>
  </body>
</html>
