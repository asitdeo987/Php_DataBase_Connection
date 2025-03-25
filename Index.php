<?php
$insert=false;
   if(isset($_POST['name'])){
//conection variable

   $server = "localhost";
   $username = "root";
   $password = "";
//set conection

   $con = mysqli_connect($server, $username, $password);
/* Check connection done or not*/
   if(!$con){
    die("Connection failed".mysqli_connect_error());
   }
//    echo "SuccessFully Connected";

/* Variable post collecting */
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    
    $sql = "INSERT INTO `travel`.`travel` ( `name`, `age`, `gender`, `e-mail`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;
/* Exicution Query*/
    if($con->query($sql) == true){
        // echo "Successfully Inserted";
        /* Flag for Succesful Exicution */
        $insert = true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="your name.png" alt="Your Name">
    <div class="container">
        <h1>Welcome to Trip form</h3>
            <p>Enter your details and submit this form to confirm your participation in the trip </p>
       
        <?php
         if($insert == true){
         echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>

            <form action="Index.php" method="POST">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your Age">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                <textarea name="desc" id="desc" cols="30" rows="10"
                    placeholder="Enter any other information here"></textarea>
                <button class="btn">Submit</button>
            </form>
    </div>
    <script src="index.js"></script>

</body>

</html>