<?php  
if(isset($_POST['submit'])){
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];

}

$host="localhost";
$dbname="resume";
$username="root";
$password="";

$conn=mysqli_connect(hostname:$host,
                    username:$username,
                    password:$password,
                    database:$dbname);

if (mysqli_connect_errno()){
    die("Connection error: ".mysqli_connect_errno());
}
    $sql="INSERT INTO contact(name,email,phone,message)
             VALUES (?,?,?,?)";

    $stmt=mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)){
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt,"ssss",
                            $name,
                            $email, 
                            $phone,
                            $message);

    mysqli_stmt_execute ($stmt);

if($stmt){
        ?>
        <script type="text/javascript">
            alert("Succes");
        </script>
        <?php
    }
    else
    {
    ?>
        <script type="text/javascript">
            alert("Please Try again");
        </script>
        <?php
    }
?>