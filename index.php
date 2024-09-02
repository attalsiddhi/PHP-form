<?php
$dataFile = 'dataForm.txt';
if(isset($_POST['submit'])){
    if((empty($_POST['Fname'])) || (empty($_POST['Lname'])) || (empty($_POST['email'])) || (empty($_POST['gender'])) || (empty($_POST['password']))){
        $error = "*"."please fill all the required field";
    }
    else{
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $hide = 1;

        $data = $Fname."\n".$Lname."\n".$email."\n".$gender."\n".$password."\n===\n";
        file_put_contents($dataFile, $data, FILE_APPEND);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Simple form </title>
</head>
<body>
    <div class="container">
    <?php 
         if(!isset($hide)){ ?>
        <h2>Fill the form</h2>
        <!-- form -->
         
         <form method="post" action="index.php">
            <?php
            if(isset($_POST['submit'])){
                if(isset($error)){
                    echo "<p class='text-danger'>".$error."</p>";
                }
            }
            ?>
            <!-- Fname -->
            <div class="mb-3">
                <label class="form-label">First Name</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="Fname" placeholder="Enter First Name">
            </div>
            <!-- Lname -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label><span class="text-danger">*</span>
                <input type="text" class="form-control" name="Lname" placeholder="Enter Last Name">
            </div>
            <!-- email -->
            <div class="mb-3">
                <label class="form-label">Email address</label><span class="text-danger">*</span>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <!-- gender -->
            <div class="mb-3">
                <label class="form-label">Gender</label><span class="text-danger">*</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Male">
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female">
                    <label class="form-check-label">Female</label>
                </div>
            </div>
            <!-- password -->
            <div class="mb-3">
                <label class="form-label">Password</label><span class="text-danger">*</span>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>
            <br>
            <!-- submit -->
            <input class="btn btn-primary" type="submit" value="Submit" name="submit">

         </form>
         <?php }?>
         <?php
    if(isset($_POST['submit'])){
        if(!isset($error)){
            $hide = 1;
            echo "Thanks!! Data Submitted Successfully";
            
        }
    }
    ?>
         
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
