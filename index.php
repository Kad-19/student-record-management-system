<?php
  session_start();
  $_SESSION['id'] = "";
  $_SESSION['role'] = "";
  $_SESSION['university'] = "";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/home-styles.css" />
    <title>EduSync</title>
  </head>
  <body>
    <header>
      <h1>EduSync</h1>
      <nav>
        <a href="">Home</a>
        <a href="About.html" target="_blank">About</a>
        <label for="uni">Universities</label>
        <input type="checkbox" id="uni" />
        <a href="#address">Contact</a>
        <a href="login.html">Login</a>
        <div class="universities-dropdown">
          <a href="http://www.aastu.edu.et/" target="_blank">AASTU</a>
          <a href="https://www.aau.edu.et/" target="_blank">AAU</a>
          <a href="https://bdu.edu.et/" target="_blank">BDU</a>
        </div>
      </nav>
    </header>

    <main>
      <div class="main-intro">
        <h1>University Students Record Management System</h1>
      </div>

      <div class="mission-section">
        <div class="mission-text moving-div">
          <h2>Our Mission</h2>
          <p>
            At EduSync, our mission is to revolutionize education by providing a
            cutting-edge online student record management system. We empower
            universities with seamless and efficient tools, fostering academic
            success. UniSync is dedicated to simplifying administrative
            processes, enhancing collaboration, and ensuring a smooth
            educational journey for students and institutions alike.
          </p>
          <a href="/About.html" class="button" target="_blank">Read More</a>
        </div>

        <div class="slogan moving-div">Elevating Academic Efficiency</div>
      </div>
      <div class="stat-section">
        <p><span id="counter1">0</span>Students</p>
        <p><span id="counter2">0</span>Teachers</p>
        <p><span id="counter3">0</span>Departments</p>
        <p><span id="counter4">0</span>Universities</p>
      </div>
    </main>

    <footer>
      <address id="address">
        <h1>EduSync</h1>
        <p>Addis Ababa, Ethiopia</p>
        <h2>Contact Us</h2>
        <p><b>Phone : </b>+251-900-0000-00</p>
        <p><b>Email : </b>edusync@gmail.com</p>
      </address>
      <div class="useful-links">
        <h2>Useful Links</h2>
        <div class="links">
          <a href="#">Home</a>
          <a href="#">About</a>
          <a href="/login.html">Login</a>
        </div>
      </div>
    </footer>
    <script>
      const movingDiv = document.querySelectorAll(".moving-div");

      document.addEventListener("scroll", function () {
        const scrollPosition = window.scrollY;
        if (scrollPosition < 200) {
          const scaleValue = 0.5 + scrollPosition / 400;
          movingDiv.forEach(function (element) {
            element.style.transform = `scale(${scaleValue})`;
          });
        }
      });
      const counterElement1 = document.getElementById("counter1");
      const counterElement2 = document.getElementById("counter2");
      const counterElement3 = document.getElementById("counter3");
      const counterElement4 = document.getElementById("counter4");


      function incrementNumbers(targetNumber, duration, element) {
        const startNumber = 0;
        const interval = 50; 
        const steps = duration / interval;
        const incrementValue = targetNumber / steps;

        let currentNumber = startNumber;
        let step = 1;

        const intervalId = setInterval(function () {
          if (step <= steps) {
            currentNumber += incrementValue;
            element.textContent = Math.round(currentNumber);
            step++;
          } else {
            clearInterval(intervalId);
          }
        }, interval);
      }
      let times = 0;
      document.addEventListener("scroll", () => {
        const scrollPosition = window.scrollY;

        if (scrollPosition > 400 && times == 0) {
          incrementNumbers(1000, 2000, counterElement1);
          incrementNumbers(150, 1500, counterElement2);
          incrementNumbers(25, 1000, counterElement3);
          incrementNumbers(3, 500, counterElement4);
          times = 1;
        }
      });
    </script>
  </body>
</html>
