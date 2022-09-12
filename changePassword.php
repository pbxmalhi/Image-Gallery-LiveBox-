<?php
include("mainclass.php");
$ob = new images();
if (isset($_REQUEST['confirm'])) {
    $result = $ob->changePassword($_POST);
    if ($result) {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("./commons/links.php")
    ?>
    <title>Live Box | HOME</title>
</head>

<body>
    <header>
        <?php
        include("./commons/navbar.php");
        ?>
        <section class="mb-20 text-gray-700 my-16">
            <div class="text-center md:max-w-xl lg:max-w-3xl mx-auto">
                <h3 class="text-3xl font-bold mb-6 text-gray-800">Change Password</h3>
            </div>

            <div class="flex justify-center text-center m-auto">
                <div>
                    <div class="block rounded-lg shadow-lg bg-white w-full">
                        <div class="overflow-hidden rounded-t-lg h-28" style="background-color: #DC3545;"></div>
                        <div class="w-24 h-24 -mt-12 overflow-hidden border border-2 border-white rounded-full mx-auto bg-white">
                            <img src="./profilePics/<?php echo $_SESSION['profilepic'] ?>" class="object-cover w-24 h-24" />
                        </div>
                        <div class="p-6">
                            <h4 class="text-2xl font-semibold mb-4"><?php echo $_SESSION['name'] ?></h4>
                            <hr />
                            <?php
                            if (isset($error)) {
                            ?>
                                <div class="bg-red-100 rounded-lg py-5 px-6 my-4 text-base text-red-700 mb-3" role="alert">
                                    Wrong Credentials login Failed
                                </div>
                            <?php
                            }
                            ?>
                            <form method="post">
                                <table class="table-fixed">
                                    <tr>
                                        <td class="pt-3" colspan="2">
                                            <p class="px-5 text-base font-medium text-left">
                                                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Email address</label>
                                                <input type="email" name="usermail" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email" required>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="mt-5">
                                        <td class="pt-3" colspan="2">
                                            <p class="px-5 text-base font-medium text-left">
                                                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Old Password</label>
                                                <input type="password" name="userOldPass" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputPassword2" placeholder="Old Password" required>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="mt-5">
                                        <td class="pt-3" colspan="2">
                                            <p class="px-5 text-base font-medium text-left">
                                                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">New Password</label>
                                                <input type="password" name="userNewPass" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputPassword2" placeholder="New Password" required>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="mt-5">
                                        <td class="form-group pt-8" colspan="2">
                                            <input type="submit" name="confirm" value="Confirm" class="w-2/3 cursor-pointer inline-block px-6 py-2 border-2 border-red-400 text-red-400 font-medium text-xs leading-tight uppercase rounded hover:bg-[#dc3545] hover:bg-opacity-10 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                        </td>
                                    </tr>
                                    <tr class="mt-5">
                                        <td class="form-group pt-3" colspan="2">
                                            <button type="button" onclick="history.go(-1)" class="w-2/3 inline-block bg-none-600 text-black font-semibold text-xs leading-tight border-2 border-black uppercase rounded shadow-md hover:bg-black hover:text-white hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-black active:shadow-lg transition duration-150 ease-in-out">
                                                <p class="text-black px-3 py-2 hover:text-white"><i class="fa-solid pr-3 fa-arrow-left"></i>Back</p>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>