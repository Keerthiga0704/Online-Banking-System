<?php
include "db1.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>

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
            text-align:center;
        }

        h3{
            color:#2c3e50;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
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
    </style>
</head>

<body>

<div class="container">

<h3>All Books</h3>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
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