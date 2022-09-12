<?php
include("mainclass.php");
$ob = new images();
if (isset($_REQUEST['register'])) {
    $resultmail = $ob->existingMail($_POST);
    $resultuser = $ob->existingUser($_POST);
    if ($resultmail && $resultuser) {
        $ob->register($_POST, $_FILES);
    } else if (!$resultmail && !$resultuser) {
        $doubleError = true;
    } else if (!$resultmail && $resultuser) {
        $mailError = true;
    } else if ($resultmail && !$resultuser) {
        $userError = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("./commons/links.php")
    ?>
    </script>
    <title>Live Box | REGISTER</title>
</head>

<body>
    <header>
        <?php
        include("./commons/navbar.php");
        ?>
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md m-auto my-16">
            <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600 text-center mb-6">Register</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-6">
                    <input type="text" name="name" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput123" aria-describedby="emailHelp123" placeholder="Your Name">
                </div>
                <div class="form-group mb-6">
                    <?php
                    if (isset($doubleError) || isset($mailError)) {
                    ?>
                        <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                            Email Already exists
                        </div>
                    <?php
                    }
                    ?>
                    <input type="email" name="usermail" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput125" placeholder="Email address">
                </div>
                <div class="form-group mb-6">
                    <?php
                    if (isset($doubleError) || isset($userError)) {
                    ?>
                        <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                            Username Already exists
                        </div>
                    <?php
                    }
                    ?>
                    <input type="text" name="username" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput125" placeholder="username">
                </div>
                <div class="form-group mb-6">
                    <input type="password" name="userpass" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput126" placeholder="Password">
                </div>
                <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Add Profile Pic</label>
                <div class="form-group mb-6">
                    <input name="profilepic" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" accept=".png, .jpg, .jpeg" id="formFile">
                </div>
                <input type="submit" name="register" value="Sign Up" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <p class="text-gray-800 mt-6 text-center">Already a member? <a href="./login.php" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">Login</a>
                </p>
            </form>
        </div>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>