<?php
include("mainclass.php");
$ob = new images();
if (isset($_REQUEST['did'])) {
    $id = $_REQUEST['did'];
    $ob->deletePost($id);
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
                <h3 class="text-3xl font-bold mb-6 text-gray-800">Profile</h3>
                <p class="mb-6 pb-2 md:mb-12 md:pb-0">
                    By day I'm a regular guy and by night a superhero … How tiring is that?! <br>
                    Just joking! I'm a regular guy all the time, good job, close to my family, just bought my own flat with a cat. Actually, my cat thinks I'm a hero because I saved her from the street. I'm a talkative person and I believe communication is the most important thing in a relationship.
                </p>
            </div>

            <div class="flex justify-center text-center m-auto">
                <div>
                    <div class="block rounded-lg shadow-lg bg-white w-full">
                        <div class="overflow-hidden rounded-t-lg h-28" style="background-color: #9d789b;"></div>
                        <div class="w-24 h-24 -mt-12 overflow-hidden border border-2 border-white rounded-full mx-auto bg-white">
                            <img src="./profilePics/<?php echo $_SESSION['profilepic'] ?>" class="object-cover w-24 h-24" />
                        </div>
                        <div class="p-6">
                            <h4 class="text-2xl font-semibold mb-4"><?php echo $_SESSION['name'] ?></h4>
                            <hr />
                            <table class="table-fixed">
                                <tr>
                                    <td class="pt-3 w-1/2">
                                        <p class="px-5 text-xl font-medium text-right">
                                            Email :
                                        </p>
                                    </td>
                                    <td class="pt-3">
                                        <p class="px-5 text-xl font-medium text-left">
                                            <?php echo $_SESSION['usermail'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr class="mt-5">
                                    <td class="pt-3">
                                        <p class="px-5 text-xl font-medium text-right">
                                            Username :
                                        </p>
                                    </td>
                                    <td class="pt-3">
                                        <p class="px-5 text-xl font-medium text-left">
                                            <?php echo $_SESSION['username'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr class="mt-5">
                                    <td class="pt-3">
                                        <p class="px-5 text-xl font-medium text-right">
                                            Password :
                                        </p>
                                    </td>
                                    <td class="pt-3">
                                        <p class="px-5 text-xl font-medium text-left">
                                            <?php echo $_SESSION['userpass'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr class="mt-5">
                                    <td class="form-group py-5" colspan="2">
                                        <?php if (!empty($_SESSION['userid'])) {
                                        ?>
                                            <button type="button" class="inline-block px-8 py-2 border-2 border-blue-400 text-blue-400 font-medium text-xs leading-tight uppercase rounded hover:bg-[#007BFF] hover:bg-opacity-10 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"><a href="./changepassword.php">Change Password</a></button>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr class="mt-5">
                                    <td class="form-group pt-16 pb-5">
                                        <?php if (!empty($_SESSION['userid'])) {
                                        ?>
                                            <button type="button" class="inline-block px-6 py-2 border-2 border-red-400 text-red-400 font-medium text-xs leading-tight uppercase rounded hover:bg-[#dc3545] hover:bg-opacity-10 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"><a href="./login.php?log=1">Logout</a></button>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="form-group pt-16 pb-5">
                                        <button type="button" onclick="history.go(-1)" class="w-1/2 inline-block bg-none-600 text-black font-semibold text-xs leading-tight border-2 border-black uppercase rounded shadow-md hover:bg-black hover:text-white hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-black active:shadow-lg transition duration-150 ease-in-out">
                                            <p class="text-black px-3 py-2 hover:text-white"><i class="fa-solid pr-3 fa-arrow-left"></i>Back</p>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr />
        <section>
            <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-sky-600 text-center mt-10 mainHeading">Your Posts</h3>
            <div class="flex flex-wrap justify-evenly my-8 px-20">
                <!-- LOOP WILL GO HERE -->
                <?php
                $userid = $_SESSION['userid'];
                $publicPosts = $ob->displayProfilePosts($userid);
                if (isset($publicPosts)) {
                    foreach ($publicPosts as $posts) {
                ?>
                        <div class="flex justify-center my-8 w-72">
                            <div class="rounded-lg shadow-lg bg-white w-72">
                                <a href="./showPics.php?pid=<?php echo $posts['id'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    <img class="rounded-lg w-72 h-80 object-cover object-top" src="./uploads/<?php echo $posts['photo'] ?>" alt="" />
                                </a>
                                <div class="p-6">
                                    <button type="button" class=" inline-block px-6 py-2.5 bg-none-600 text-black font-medium text-xs leading-tight uppercase rounded ">Views : <?php echo $posts['views'] ?></button>
                                    <button type="button" class=" inline-block float-right bg-none-600 text-red-600 font-semibold text-xs leading-tight border-2 border-red-600 uppercase rounded shadow-md hover:bg-red-600 hover:text-white hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                        <p class="text-red-600  px-3 py-2.5 hover:text-white"><a href="./profile.php?did=<?php echo $posts['id'] ?>"><i class="fa-solid  pr-3 fa-trash"></i>Delete</a></p>
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>