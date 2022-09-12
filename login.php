<?php
include("mainclass.php");
$ob = new images();
if (isset($_REQUEST['login'])) {
    $result = $ob->login($_POST);
    if ($result) {
        $error = true;
    }
}
if (isset($_REQUEST["log"])) {
    session_destroy();
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("./commons/links.php")
    ?>
    <title>Live Box | LOGIN</title>
</head>

<body>
    <header>
        <?php
        include("./commons/navbar.php");
        ?>
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm m-auto my-16">
            <form method="post">
                <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600 text-center mb-6">Login</h3>
                <?php
                if (isset($error)) {
                ?>
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                        Wrong Credentials login Failed
                    </div>
                <?php
                }
                ?>
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Email address</label>
                    <input type="email" name="usermail" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group mb-6">
                    <label for="exampleInputPassword2" class="form-label inline-block mb-2 text-gray-700">Password</label>
                    <input type="password" name="userpass" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputPassword2" placeholder="Password" required>
                </div>
                <!-- <div class="flex justify-between items-center mb-6">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" id="exampleCheck2">
                        <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember me</label>
                    </div>
                    <a href="#!" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">Forgot
                        password?</a>
                </div> -->
                <input type="submit" value="Sign in" name="login" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <p class="text-gray-800 mt-6 text-center">Not a member? <a href="./register.php" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">Register</a>
                </p>
            </form>
        </div>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>