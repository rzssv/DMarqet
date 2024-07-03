<? session_start();
if(isset($_SESSION['user'])) {
  unset($_SESSION['user']);
  header("Location: /");
  echo "Logged out successfully.";
} else {
  echo "Invalid request.";
}
?>
<!DOCTYPE html>
<html>
  <head>
      <title>DMarqet - Logged Out</title>
      <link rel="icon" type="image/x-icon" href="images/favicon.ico">
   </head>
  <br>
  <a href="/">Home</a>
</html>