<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$name="";
$email="";
$number="";
$website="";
$message="";
$conn = new mysqli($servername,$username,$password,$dbname);
//  if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
//  }
//  echo "Connected successfully";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $number=$_POST['number'];
  $website=$_POST['website'];
  $message=$_POST['message'];    

 $stmt =$conn->prepare("INSERT INTO `contact`( `name`, `email`, `number`, `website`, `message`) VALUES (?,?,?,?,?)");
 $stmt->bind_param("sssss",$name, $email, $number, $website, $message);

 $stmt->execute();

//  echo "New records created successfully";

 $stmt->close();
}
 $conn->close();
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="">
<div class="container-fluid vh-100 ">
    <div class=" d-flex container align-items-center justify-content-center h-100 ">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row">
        <h2 class=" text-primary">Request a <span class="text-danger">call</span> back</h2>
        </div>
        <div class="row gap-2 mt-3">
            <input type="text" name="name" placeholder="Name" class="col-5 rounded p-2 border-0 shadow" required>
            <input type="email" name="email" placeholder="Email" class="col-5 rounded p-2 border-0 shadow" required>
        </div>
        <div class="row mt-2 gap-2">
            <input type="number" name="number" placeholder="Phone Number" class=" col-5 rounded p-2 border-0 shadow" required>
            <input type="text" name="website" placeholder="Website" class=" col-5 rounded p-2 border-0 shadow" required>
        </div>
        <div class="row mt-2">
            <textarea name="message" id="" placeholder="Your Message Here"  class=" col-10 rounded p-2 border-0 shadow" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit Now</button>
      </form>    
    </div>
</div>
</body>

</html>