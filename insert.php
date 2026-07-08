<!DOCTYPE html>
<html>

<head>
    <title>Insert Book</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 30px;
            width: 380px;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.3);
        }

        h3 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 8px 18px;
            font-size: 15px;
            cursor: pointer;
        }

        p {
            text-align: center;
            color: red;
        }
    </style>

</head>

<body>

<div class="container">

<h3>Add New Book</h3>

<form method="post">
    Book ID:<br>
    <input type="number" name="bookid" required>

    Book Name:<br>
    <input type="text" name="bookname" required>

    Author Name:<br>
    <input type="text" name="authorname" required>

    Copies:<br>
    <input type="number" name="quantity" required>

    <input type="submit" name="add" value="Insert">
</form>

<?php
if(isset($_POST['add'])){

    $id = $_POST['bookid'];
    $name = $_POST['bookname'];
    $author = $_POST['authorname'];
    $copies = $_POST['quantity'];

    $con = mysqli_connect("localhost","root","","library1");

    if(!$con){
        die("Connection Failed: " . mysqli_connect_error());
    }

    $check = "SELECT * FROM lib WHERE bookid='$id'";
    $result = mysqli_query($con,$check);

    if(mysqli_num_rows($result)>0){
        echo "<p>Book ID already exists!</p>";
    }
    else{

        $sql = "INSERT INTO lib(bookid,bookname,author,copies)
                VALUES('$id','$name','$author','$copies')";

        if(mysqli_query($con,$sql)){
            echo "<script>
                    window.location='view.php';
                  </script>";
        }else{
            echo mysqli_error($con);
        }
    }

    mysqli_close($con);
}
?>

</div>

</body>
</html>