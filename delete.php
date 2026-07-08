<?php include "db1.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>

    <style>
        body{
            margin:0;
            padding:20px;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
        }

        .container{
            width:400px;
            margin:auto;
            margin-top:100px;
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

        input[type="number"]{
            width:100%;
            padding:8px;
            margin-top:8px;
            margin-bottom:15px;
            box-sizing:border-box;
        }

        input[type="submit"]{
            padding:8px 18px;
            font-size:15px;
            cursor:pointer;
        }

        a{
            text-decoration:none;
            color:blue;
        }
    </style>

</head>

<body>

<div class="container">

<h3>Delete Book</h3>

<form method="post">
    Enter Book ID:<br><br>
    <input type="number" name="bookid" required><br>

    <input type="submit" name="delete" value="Delete">
</form>

<?php
if(isset($_POST['delete']))
{
    $id = $_POST['bookid'];

    $sql = "DELETE FROM lib WHERE bookid='$id'";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        echo "<script>
                window.location='view.php';
              </script>";
    }
    else
    {
        echo "<p>Error deleting record</p>";
    }
}
?>

<br>

<a href="index.html">Back to Home</a>

</div>

</body>
</html>