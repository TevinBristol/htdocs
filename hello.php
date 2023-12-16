<html>
<head>
<style>
body {background-color: gray;}
p {color: orange;}
</style>
<title>Book Store</title>
</head>
<body>
<h3> Book Store </h3>
<p> *****Welcome to use book store system***** <p>
<form action = "hello.php" method = "GET">
Find entries that are:<br/>
Author: <input type = "text" name = "author" />
Title : <input type = "text" name = "title" />
<p></p>
Year :
<p></p>
<select name = "select">
<option value=""/></option>
<option value=2005/>2005</option>
<option value=2007/>2007</option>
<option value=2009/>2009</option>
<option value=2010/>2010</option>
</select>
<p></p>
<input type = "submit" name="submit" value="search"/>
</form>
</body>

</html>















<?php
session_start();
if($_GET){
$author = $_GET['author'];
$title = $_GET['title'];
$select = $_GET['select'];
$connect = mysqli_connect("localhost", "root", "","mysql") or die(mysql_error());
if($connect)
{
$query = "SELECT * FROM bookstore WHERE author='" . $author . "' or Title='" . $title . "' ";
$query2 = "SELECT * FROM bookstore WHERE Year = '" . $select ."' ";
$result = mysqli_query($connect,$query) or die(mysql_error());
$result2 = mysqli_query($connect,$query2) or die(mysql_error());
while($row = mysqli_fetch_array($result)){
echo $row['ISBN'] . "<br/>" . $row['Title'] . "<br/>" . $row['Author'] . "<br/>" . $row['Publisher'] . "<br/>" . $row['Year'] . "<br/>";
}
while($row2 = mysqli_fetch_array($result2)){
echo $row2['ISBN'] . "<br/>" . $row2['Title'] . "<br/>" . $row2['Author'] . "<br/>" . $row2['Publisher'] . "<br/>" . $row2['Year'] . "<br/>";
}
} else {
die(mysql_error());
}
mysqli_free_result($result);
mysqli_close($connect);
}
?>