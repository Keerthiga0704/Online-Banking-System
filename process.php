<?php
include "db1.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue / Return Book</title>

    <style>
        body{
            margin:0;
            padding:20px;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
        }

        .container{
            width:700px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0px 6px 15px rgba(0,0,0,0.3);
        }

        h2,h3{
            text-align:center;
            color:#2c3e50;
        }

        input[type="number"]{
            width:100%;
            padding:8px;
            margin-top:5px;
            margin-bottom:15px;
            box-sizing:border-box;
        }

        input[type="submit"]{
            padding:8px 18px;
            font-size:15px;
            cursor:pointer;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table,th,td{
            border:1px solid black;
        }

        th,td{
            padding:10px;
            text-align:center;
        }

        th{
            background:#e6e6e6;
        }

        a{
            text-decoration:none;
            color:blue;
        }

        hr{
            margin:20px 0;
        }
    </style>
</head>

<body>

<div class="container">

<form method="post">
    Enter the Book ID:<br>
    <input type="number" name="id" required><br>

    <input type="radio" name="action" value="issue" required> Issue
    <input type="radio" name="action" value="return" required> Return
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<hr>

<?php

$message = "";

if(isset($_POST['submit']))
{
    $bookid = $_POST['id'];
    $action = $_POST['action'];

    $check = mysqli_query($conn, "SELECT copies FROM lib WHERE bookid='$bookid'");
    $row = mysqli_fetch_assoc($check);

    if($row)
    {
        if($action == "issue")
        {
            if($row['copies'] > 0)
            {
                mysqli_query($conn, "UPDATE lib SET copies = copies - 1 WHERE bookid='$bookid'");
                $message = "Book Issued Successfully";
            }
            else
            {
                $message = "No copies available!";
            }
        }
        else if($action == "return")
        {
            mysqli_query($conn, "UPDATE lib SET copies = copies + 1 WHERE bookid='$bookid'");
            $message = "Book Returned Successfully";
        }
    }
    else
    {
        $message = "Book ID not found!";
    }
}

if($message != "")
{
    echo "<h3>$message</h3>";
}

?>

<h2>Book Table View</h2>

<table>
<tr>
    <th>Book ID</th>
    <th>Book Name</th>
    <th>Author</th>
    <th>Copies</th>
</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM lib");

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>".$row['bookid']."</td>";
    echo "<td>".$row['bookname']."</td>";
    echo "<td>".$row['author']."</td>";
    echo "<td>".$row['copies']."</td>";
    echo "</tr>";
}

?>

</table>

<br><br>

<a href="index.html">Back to Home</a>

</div>

</body>
</html>