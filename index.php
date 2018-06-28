<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>

<h2>signup:</h2>
<form action="getstudent.php" method="post">
Name: <input type="text" name="name"><br><br><br>
E-mail: <input type="text" name="email"><br><br><br>
Website: <input type="text" name="website"><br><br><br>
Comment: <textarea name="comment" rows="5" cols="40"></textarea><br><br><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<input type="submit">
</form>

</body>
</html>