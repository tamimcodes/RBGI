
<?php 
require_once "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="./output.css" rel="stylesheet">
</head>
<body>
  <!--------navigation bar start------------>
<section class="fixed top-0 left-0 w-full bg-background shadow-xl flex items-center justify-between z-50">
    <div class="flex justify-start items-center gap-10">
        <div>
            <a href="index.php"><h1 class="font-bold text-7xl text-butBlue pl-20">RBGI</h1></a>
        </div>
        <div class="flex gap-4 font-bold">
            <a href="http://localhost/rbgi/src/index.php">Home</a>
            <a href="http://localhost/rbgi/src/index.php">About</a>
            <a href="">Tools</a>
            <a href="">Hall of fame</a>

        </div>
    </div>

    <!--------------login button------------>
    <di class="font-bold flex gap-3 pr-20">
       <a href="login.php"><button class="bg-butBlue text-background rounded-md w-30 h-10">Log in</button></a>
    

</section>
    <div class="h-16"></div>

<!--------navigation bar end------------>
    

    <div class="bg-background p-10 shadow-xl">

    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
  <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md w-full max-w-md space-y-4">
    <h2 class="text-2xl font-bold text-center mb-4">Sign up Form</h2>

    <div>
      <label for="name" class="block mb-1 font-bold text-lg">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Tamim Ahmed Fahim" class="w-full border p-2 rounded" required>
    </div>

    <div>
      <label for="email" class="block mb-1 font-bold text-lg">Email</label>
      <input type="email" id="email" name="email" placeholder="abc@gmail.com" class="w-full border p-2 rounded" required>
    </div>

    <div>
      <label for="password" class="block mb-1 font-bold text-lg">Password</label>
      <input type="password" id="password" name="password" class="w-full border p-2 rounded" required>
    </div>

    <div>
      <label for="dob" class="block mb-1 font-bold text-lg">Date of Birth</label>
      <input type="date" id="dob" name="dob" class="w-full border p-2 rounded" required>
    </div>

    <div>
      <span class="block mb-1 font-bold text-lg">Gender</span>
      <div class="flex items-center gap-4">
        <label class="flex items-center"> 
          <input type="radio" name="gender" value="male" class="mr-2" required> Male
        </label>
        <label class="flex items-center">
          <input type="radio" name="gender" value="female" class="mr-2"> Female
        </label>
        <label class="flex items-center">
          <input type="radio" name="gender" value="other" class="mr-2"> Other
        </label>
      </div>
    </div>

    <div>
      <label for="institute" class="block mb-1 font-bold text-lg">Institute</label>
      <input type="text" id="institute" name="institute" class="w-full border p-2 rounded" required>
    </div>

    <div>
      <label for="department" class="block mb-1 font-bold text-lg">Department</label>
      <input type="text" id="department" name="department" class="w-full border p-2 rounded" required>
    </div>

    <div>
      <label for="contact" class="block mb-1 font-bold text-lg">Contact Number</label>
      <input type="text" id="contact" name="contact" class="w-full border p-2 rounded">
    </div>

    <div>
      <label for="photo" class="block mb-1 font-bold text-lg">Upload Photo</label>
      <input type="file" id="photo" name="photo" class="w-full border p-2 rounded" >
    </div>

    <button class="bg-butBlue h-10 w-25 rounded-md text-white m-10"><input type="submit" name="submit_btn" value="Submit"></button>
  </form>
</div>

    </div>

    <?php 
    
  //Check if the form was submitted
  if (isset($_POST['submit_btn'])){
    //echo "success";
      
    // Get form data
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $name       = $_POST['name'];
    $dob        = $_POST['dob'];
    $gender     = $_POST['gender'];
    $institute  = $_POST['institute'];
    $department = $_POST['department'];
    $contact    = $_POST['contact'];
    $pic      = $_FILES['photo']['name'];
    $tmpname    = $_FILES['photo']['tmp_name'];
    $destination = "/opt/lampp/htdocs/rbgi/image/".$pic;
    // Move uploaded file to destination folder
    move_uploaded_file($tmpname, $destination);

    // Validate email and password (ensure they are not empty)
    if (empty($email) || empty($password)) {
      ?>
      <script type="text/javascript">
          alert("Enter email and password data!");
          window.open("http://localhost/rbgi/src/index.php","_self");
          exit();
      </script>
      <?php
      exit(); // Exit after alert
    }

    // Insert query to insert user details into the database
    $quere = "INSERT INTO account (email, password, name, dob, gender, institute, department, phone, photo) 
          VALUES ('$email', '$password', '$name', '$dob', '$gender', '$institute', '$department', '$contact', '$pic')";

    // Execute query
    $data = mysqli_query($connection, $quere);

    // Check if the query was successful
    if ($data) {
        ?>
        <script type="text/javascript">
            alert("Account created successfully");
            window.open("http://localhost/rbgi/src/index.php","_self");
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Failed to create account. Please try again! Error: <?php echo mysqli_error($connection); ?>");
            window.open("http://localhost/rbgi/src/index.php","_self");
        </script>
        <?php
    }
    
  }
?>



</body>
</html>
