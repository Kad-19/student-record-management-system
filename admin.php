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
        <a class="logout" href="index.php"
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

                  $statement = $conn->prepare("SELECT fname, lname, id, department, year, semester, cgpa, status FROM student");
                  $statement->execute();

                  $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
                  foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
                      echo "
                          <tr>
                              <td>".$value['fname']."</td>
                              <td>".$value['lname']."</td>
                              <td>".$value['id']."</td>
                              <td>".$value['department']."</td>
                              <td>".$value['year']."</td>
                              <td>".$value['semester']."</td>
                              <td>".$value['cgpa']."</td>
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

                  $statement = $conn->prepare("SELECT course_name, course_code, credit_hour, department, year, semester FROM courses");
                  $statement->execute();

                  $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
                  foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
                      echo "
                          <tr>
                              <td>".$value['course_name']."</td>
                              <td>".$value['course_code']."</td>
                              <td>".$value['credit_hour']."</td>
                              <td>".$value['department']."</td>
                              <td>".$value['year']."</td>
                              <td>".$value['semester']."</td>
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

      <section id="register-student">
        <h2>Register a Student</h2>
        <form id="register-student-form" method="post" action="back/registerStudent.php">
          <div class="">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="First Name" required />
          </div>
          <div class="">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" placeholder="Last Name" required />
          </div>
          <div class="">
            <label for="section">Section</label>
            <input type="text" id="section" name="section" placeholder="Section" required />
          </div>
          <div class="">
            <label for="id">Id</label>
            <input type="text" id="id" name="id" placeholder="ETS0000/10" required />
          </div>
          <div class="">
            <label for="department">Department</label>
            <select id="department" name="department" required>
              <option>--select-department--</option>
              <option>Natural Science</option>
              <option>Software Engineering</option>
              <option>Electrical Engineering</option>
              <option>ElectroMechanical Engineering</option>
              <option>civil Engineering</option>
              <option>Mechanical Engineering</option>
            </select>
          </div>
          <div>
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
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
        <form id="update-student-form" method="post" action="back/updateStudent.php">
          <div class="">
            <label for="studId">Student Id</label>
            <input type="text" id="studId" list="students-list" name="id" placeholder="Student Id" required />
            <datalist id="students-list">
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
          
                  $statement = $conn->prepare("SELECT id FROM student");
                  $statement->execute();
          
                  $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
                  foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
                    echo "
                      <option value ='".$value['id']."' />
                    ";
                  } 
          
                  $conn = NULL;
                }
                catch(PDOException $e){
                  echo "<option value='".$e->getMessage()."' />";
                }
              ?>
            </datalist>
          </div>
          <div class="">
            <label for="fname1">First Name</label>
            <input type="text" id="fname1" name="fname1" placeholder="First Name" required />
          </div>
          <div class="">
            <label for="lname1">Last Name</label>
            <input type="text" id="lname1" name="lname1" placeholder="Last Name" required />
          </div>
          <div class="">
            <label for="section">Section</label>
            <input type="text" id="section" name="section" placeholder="Section" required />
          </div>
          <div class="">
            <label for="status">Status</label>
            <select id="status" name="status">
              <option>--change-status--</option>
              <option>Widthdraw</option>
              <option>Readmition</option>
            </select>
          </div>

          <div class="">
            <label for="student-department">Department</label>
            <select id="student-department" name="department" required>
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
        <form id="add-new-course-form" method="post" action="back/addNewCourse.php">
          <div class="">
            <label for="course-name">Course Name</label>
            <input
              type="text"
              id="course-name"
              name="course-name"
              placeholder="Course Name"
              required
            />
          </div>
          <div class="">
            <label for="course-code">Course Code</label>
            <input
              type="text"
              id="course-code"
              name="course-code"
              placeholder="ABCD1234"
              required
            />
          </div>
          <div class="">
            <label for="credit-hr">Credit hour</label>
            <input
              type="number"
              id="credit-hr"
              name="credit-hr"
              placeholder="Credit Hour"
              required
            />
          </div>
          <div class="">
            <label for="course-department">Department</label>
            <select id="course-department" name="department" required>
              <option>--select-department--</option>
              <option>Natural Science</option>
              <option>Software Engineering</option>
              <option>Electrical Engineering</option>
              <option>ElectroMechanical Engineering</option>
              <option>civil Engineering</option>
              <option>Mechanical Engineering</option>
            </select>
          </div>
          <div class="">
            <label for="year">Year</label>
            <input type="number" id="year" name="year" value="1" min="1" />
          </div>
          <div class="">
            <label for="semester">Semister</label>
            <input
              type="number"
              id="semester"
              name="semester"
              value="1"
              min="1"
              max="2"
              required
            />
          </div>
          <div class="">
            <label for="prerequisite">Prerequisite</label>
            <input type="text" id="prerequisite" name="prerequisite" placeholder="Prerequisite" />
          </div>
          <button type="submit" class="submit-btn" id="add-new-course-submit">
            Create new course
          </button>
        </form>
      </section>

      <section id="update-course">
        <h2>Update a Course</h2>
        <form id="update-course-form" method="post" action="back/updateCourse.php">
          <div class="">
            <label for="course-code1">Course Code</label>
            <input
              id="course-code1"
              name="course-code"
              list="course-code-list"
              placeholder="ABCD1234"
              required
            />
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
          </div>
          <div class="">
            <label for="course-name1">Course Name</label>
            <input
              type="text"
              id="course-name1"
              name="course-name"
              placeholder="Course Name"
              required
            />
          </div>
          <div class="">
            <label for="credit-hr1">Credit hour</label>
            <input
              type="number"
              id="credit-hr1"
              name="credit-hr"
              placeholder="Credit Hour"
              required
            />
          </div>
          <div class="">
            <label for="course-department1">Department</label>
            <select id="course-department1" name="department" required>
              <option>--select-department--</option>
              <option>Natural Science</option>
              <option>Software Engineering</option>
              <option>Electrical Engineering</option>
              <option>ElectroMechanical Engineering</option>
              <option>civil Engineering</option>
              <option>Mechanical Engineering</option>
            </select>
          </div>
          <div class="">
            <label for="year1">Year</label>
            <input type="number" id="year1" name="year" value="1" min="1" />
          </div>
          <div class="">
            <label for="semester1">Semister</label>
            <input
              type="number"
              id="semester1"
              name="semester"
              value="1"
              min="1"
              max="2"
              required
            />
          </div>
          <div class="">
            <label for="prerequisite1">Prerequisite</label>
            <input type="text" id="prerequisite1" name="prerequisite" placeholder="Prerequisite" />
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
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for($i = 1; $i <= 5; ++$i){
                  try{
                    $servername = "localhost";
                    $port = "3307"; // Specify the port separately
                    $username = "root";
                    $dbpassword = "";
                    $database = "SRMS";
                    $dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4";

                    $conn = new PDO($dsn, $username, $dbpassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $statement1 = $conn->prepare("SELECT count(*) from student WHERE year=$i");
                    $statement1->execute();
                    $statement2 = $conn->prepare("SELECT count(*) from student WHERE year=$i AND cgpa >= 1.5 AND cgpa < 2 AND status<>'widthdraw'");
                    $statement2->execute();
                    $statement3 = $conn->prepare("SELECT count(*) from student WHERE year=$i AND cgpa < 1.5 AND status<>'widthdraw'");
                    $statement3->execute();
                    $statement4 = $conn->prepare("SELECT count(*) from student WHERE year=$i AND status='widthdraw'");
                    $statement4->execute();

                    $warned = $statement2->fetchColumn();
                    $failed = $statement3->fetchColumn();
                    $widthdraw = $statement4->fetchColumn();
                    $all = $statement1->fetchColumn();
                    $passed = $all - $widthdraw - $warned - $failed;
                    echo "
                      <tr>
                        <th>$i</th>
                        <td>$passed</td>
                        <td>$warned</td>
                        <td>$failed</td>
                        <td>$widthdraw</td>
                        <td>$all</td>
                      </tr>
                    ";
                    $conn = NULL;
                  }
                  catch(PDOException $e){
                    echo $e->getMessage();
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>
    <script src="./script/administrator.js"></script>
  </body>
</html>
