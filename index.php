<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `customer_details`.`cx_details` (`name`, `age`, `mobilenumber`, `email`, `address`, `dt`) VALUES ('$name', '$age', '$mobilenumber', '$email', '$address', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <div class=" h-screen">
        <div class="absolute inset-0 bg-cover bg-center z-0 bg-[url('./bg.jpg')] opacity-70"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="">
                <h1 class="font-bold text-2xl mb-6 text-center">Form Creating with Tailwind CSS</h1>
                <p class="mx-auto text-center mb-8">
                    I am creating a simple form with Tailwind style and using PHP trying to connect with the database.
                    That's it.
                </p>
                <?php
        if($insert == true){
        echo "<p class=' font-bold'>Thanks for submitting your form.</p>";
        }
    ?>
                <form action="index.php" class="bg-gray-400 p-8 rounded shadow-md space-y-4" method="post">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name"
                            class="mt-1 p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" name="age" id="age" placeholder="Age"
                            class="mt-1 p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div>
                        <label for="number" class="block text-sm font-medium text-gray-700">Ph Number</label>
                        <input type="number" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number"
                            class="mt-1 p-2 border border-gray-300 rounded w-full" />
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="mt-1 p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" placeholder="Address"
                            class="mt-1 p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
