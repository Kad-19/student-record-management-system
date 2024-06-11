<?php
session_start();
if($_SESSION['role'] != 'student'){
  header("Location: http://localhost/student-record-management-system/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/student-styles.css" />
    <title>Student</title>
  </head>
  <body>
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
    <datalist id="course-code-list">
      <?php
        $servername = "localhost";
        $port = "3307"; // Specify the port separately
        $username = "root";
        $dbpassword = "";
        $database = "SRMS";
        $dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4";
        try{
          $conn = new PDO($dsn, $username, $dbpassword);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
          $statement = $conn->prepare("SELECT course_code FROM courses");
          $statement->execute();
  
          $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
          foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
            echo "
              <option value ='".$value['course_code']."' />
            ";
          } 
  
          $conn = NULL;
        }
        catch(PDOException $e){
          echo "<option value='".$e->getMessage()."' />";
        }
      ?>
    </datalist>
    <header>
      <h1>Student Dashboard</h1>
    </header>

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
        <a href="#personal-records">Personal Records</a>
        <a href="#announcements">Announcements</a>
        <a href="#class-schedule">Class Schedule</a>
        <a href="#my-grade">My Grade</a>
        <a href="#my-courses">My Courses</a>
        <a href="#register-new-semester">Semester registration</a>
        <a href="#add-course">Add Courses</a>
        <a href="#drop-course">Drop Courses</a>
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
      <section id="personal-records">
        <h2>Personal Records</h2>
        <div class="profile-wrapper">
          <?php
            $servername = "localhost";
            $port = "3307"; // Specify the port separately
            $username = "root";
            $dbpassword = "";
            $database = "SRMS";
            $dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4";
            try{
              $conn = new PDO($dsn, $username, $dbpassword);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
              $statement = $conn->prepare("SELECT id, fname, lname, department, status, year, semester, section, semester_load, cgpa FROM student where id = '" . $_SESSION['id'] . "'");
              $statement->execute();
  
              $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
              foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
                echo "
                  <p>Student Name : ".$value['fname']." ".$value['lname']."</p>
                  <p>Student Id : ".$value['id']."</p>
                  <p>Department : ".$value['department']."</p>
                  <p>Status : ".$value['status']."</p>
                  <p>Year : ".$value['year']."</p>
                  <p>Semester : ".$value['semester']."</p>
                  <p>Section : ".$value['section']."</p>
                  <p>Semester Load : ".$value['semester_load']."</p>
                  <p>CGPA : ".$value['cgpa']."</p>
                ";
              } 
  
              $conn = NULL;
            }
            catch(PDOException $e){
              echo $e->getMessage();
            }
          ?>
        </div>
      </section>

      <section id="announcements">
        <h2>Announcements</h2>
        <div class="announcement-wrapper">
          <article>
            <p>We have class tomorrow</p>
            <p class="time">Teacher A</p>
            <p class="time">13/01/2024 2pm</p>
          </article>
          <article>
            <p>We have class tomorrow</p>
            <p class="time">Teacher B</p>
            <p class="time">13/01/2024 2pm</p>
          </article>
          <article>
            <p>We have class tomorrow</p>
            <p class="time">Teacher C</p>
            <p class="time">13/01/2024 2pm</p>
          </article>
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
                <td>Computer Architecure</td>
                <td>Object Oriented Programming</td>
                <td>Object Oriented Programming</td>
                <td>System Analysis</td>
                <td></td>
              </tr>
              <tr>
                <th>04 : 30 - 06 : 30 AM</th>
                <td>Data Structures and Algorithm</td>
                <td>Internet Programming I</td>
                <td></td>
                <td></td>
                <td>System Analysis</td>
              </tr>
              <tr>
                <th>08 : 00 - 10 : 00 AM</th>
                <td>Data Structures and Algorithm</td>
                <td>Internet Programming I</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <section id="my-grade">
        <h2>My Grade</h2>
        <div class="search-wrapper">
          <div class="search">
            <input type="text" placeholder="Course Code" id="grade-search" />
            <img src="./images/search.svg" />
          </div>
        </div>
        <div class="table-wrapper">
          <table class="fl-table" id="my-grade-table">
            <thead>
              <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Year</th>
                <th>Semester</th>
                <th>Grade</th>
                <th>Grade Mark</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <tr>
                <th>CGPA</th>
                <td>4.0</td>
                <td>Pass</td>
              </tr>
            </tfoot>
          </table>
        </div>
        <h2>Semister Grade</h2>
        <div class="table-wrapper">
          <table class="fl-table">
            <thead>
              <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Test</th>
                <th>Lab Test</th>
                <th>Quiz</th>
                <th>Project</th>
                <th>Final Exam</th>
                <th>Total</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </section>

      <section id="my-courses">
        <h2>My Courses</h2>
        <div class="search-wrapper">
          <div class="search">
            <input type="text" placeholder="Course code" id="course-search" />
            <img src="./images/search.svg" />
          </div>
        </div>
        <div class="table-wrapper">
          <table class="fl-table" id="my-courses-table">
            <thead>
              <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Grade</th>
                <th>Grade Mark</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $servername = "localhost";
                $port = "3307"; // Specify the port separately
                $username = "root";
                $dbpassword = "";
                $database = "SRMS";
                $dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4";
                try{
                  $conn = new PDO($dsn, $username, $dbpassword);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $statement = $conn->prepare("SELECT coursecode, coursename, grade, grademark, status FROM mycourse WHERE studid='" . $_SESSION['id'] . "'");
                  $statement->execute();

                  $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
                  foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
                      echo "
                          <tr>
                              <td>".$value['coursename']."</td>
                              <td>".$value['coursecode']."</td>
                              <td>".$value['grade']."</td>
                              <td>".$value['grademark']."</td>
                              <td>".$value['status']."</td>
                          </tr>
                      ";
                  }
                  $conn = NULL;
                }
                catch(PDOException $e){
                  echo $e->getMessage();
                }
              ?>
            </tbody>
          </table>
        </div>
      </section>

      <section id="add-course">
        <h2>Add courses</h2>
        <form id="add-course-form" method="post" action="back/addCourse.php">
          <div class="">
            <label for="course-code1">Course Code</label>
            <input
              type="text"
              id="course-code1"
              name="course-code"
              list="course-code-list"
              placeholder="Course code"
              required
            />
          </div>
          <!-- <div class="">
            <label for="sec">Section</label>
            <input type="text" id="sec" list="section-list" placeholder="Section" required />
          </div> -->
          <button type="submit" value="Add Course" class="submit-btn">
            Add Course
          </button>
        </form>
      </section>

      <section id="register-new-semester" method="post" action="back/registerNewSemester.php">
        <h2>Register for a new Semester</h2>
        <form id="register-new-semester-form">
          <div>
            <label>What services would you demand</label><br>
            
          </div>
          <div>
            <label for="food">Food</label>
            <select id="food">
              <option>--service-type--</option>
              <option>In kind</option>
              <option>In cash</option>
            </select>
            
          </div>
          <div>
            <label for="boarding">Boarding</label>
            <select id="boarding">
              <option>--service-type--</option>
              <option>In kind</option>
              <option>In cash</option>
            </select>
            
          </div>
          <button type="submit" value="Register" class="submit-btn">Register</button>
        </form>
      </section>

      <section id="drop-course" method="post" action="back/dropCourse.php">
        <h2>Drop courses</h2>
        <form id="drop-course-form">
          <div class="">
            <label for="course-code2">Course Code</label>
            <input
              type="text"
              id="course-code2"
              name="course-code"
              list="course-code-list"
              placeholder="Course code"
              required
            />
          </div>
          <input type="submit" value="Drop Course" class="submit-btn" />
        </form>
      </section>
    </main>
    <script src="./script/student.js"></script>
  </body>
</html>
