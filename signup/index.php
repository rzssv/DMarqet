<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>DMarqet - Sign Up</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
      body {overflow: hidden;}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="login-form">
        <h1 style="font-size: 35px;margin:0;">Sign Up</h1>

        <hr style="width: 20vw;border: 1px solid black;">
        <form action="/signedup" method="post">
          <input class="form-input" type="text"  name="user" placeholder="Username" style="font-family: Roboto;margin: 5px;" required>
          <br>
          <input class="form-input" type="password" name="pass" placeholder="Password" style="font-family: Roboto;margin: 5px;" required>     
          <br>
          <input class="form-input" type="password" name="confirmpass" placeholder="Confirm Password" style="font-family: Roboto;margin: 5px;" required>
          <br>
          <button class="form-submit" style="font-family: Roboto;margin: 5px;margin-bottom: 0;" type="submit">Sign Up</button>
        </form>
        <hr style="width: 20vw;border: 1px solid black;">
        <span style="font-size: 15px;"><a style="margin-inline: 10px;" href="/login">Log In</a><a style="margin-inline: 10px;" href="/">Home</a></span>
      </div>
    </div>
  </body>
</html>
  