<?php
include "db1.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Book</title>

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
        }

        input[type="text"]{
            width:250px;
            padding:8px;
            margin-right:10px;
        }

        input[type="submit"]{
            padding:8px 15px;
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
    </style>

</head>

<body>

<div class="container">

<h3>Search Book</h3>

<form method="post">
    Enter Book Name:
    <input type="text" name="search" required>
    <input type="submit" name="find" value="Search">
</form>

<br>

<?php
if(isset($_POST['find']))
{
    $search = $_POST['search'];

    $sql = "SELECT * FROM lib WHERE bookname LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    echo "<table>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Copies</th>
            </tr>";

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$row['bookid']."</td>";
            echo "<td>".$row['bookname']."</td>";
            echo "<td>".$row['author']."</td>";
            echo "<td>".$row['copies']."</td>";
            echo "</tr>";
        }
    }
    else
    {
        echo "<tr><td colspan='4'>No Book Found</td></tr>";
    }

    echo "</table>";
}
?>

<br><br>

<a href="index.html">Back to Home</a>

</div>

</body>
</html>