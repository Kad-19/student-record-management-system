<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/login-styles.css" />
    <title>Login</title>
  </head>
  <body>
    <main>
      <section>
        <h2>Login</h2>
        <form id="loginForm" method="post" action="back\login.php" >
          <label for="role">Role</label>
          <select required id="role" name="role">
            <option value="none">--select-your-role--</option>
            <option value="Teacher">Teacher</option>
            <option value="Admin">Administrator</option>
            <option value="Student">Student</option>
          </select>
          <label for="uni">University</label>
          <select required id="uni" name="university">
            <option value="none">--select-university--</option>
            <option value="AASTU">Addis Ababa Science and Technology University</option>
            <option value="ASTU">Adama Science and Technology University</option>
            <option value="BDU">Bahirdar University</option>
          </select>
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            placeholder="email@gmail.com"
            name="email"
            required
          />
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            placeholder="Password"
            name="password"
            required
            minlength="4"
            maxlength="12"
          />
          <div class="bottom">
            <a href="/index.html" class="go-back">Go back</a>
            <a href="resetPassword.html" class="forgot-password"
              >Forgot Password?</a
            >
            <a href="#" id="signin"
              ><input type="submit" value="Login" class="login" id="submit"
            /></a>
          </div>
        </form>
      </section>
    </main>
    <script src="./script/login.js"></script>
    

  </body>
</html>
