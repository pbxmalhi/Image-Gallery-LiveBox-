<?php
include("mainclass.php");
$ob = new images();
if (isset($_REQUEST['did'])) {
    $id = $_REQUEST['did'];
    $ob->removeFavourite($id);
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
        <section>
            <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-sky-600 text-center mt-10 mainHeading">Favourites</h3>
            <div class="flex flex-wrap justify-evenly my-8 px-20">
                <!-- LOOP WILL GO HERE -->
                <?php
                $favouritePosts = $ob->displayFavPosts();
                if (isset($favouritePosts)) {
                    foreach ($favouritePosts as $posts) {
                ?>
                        <div class="flex justify-center my-8 w-72">
                            <div class="rounded-lg shadow-lg bg-white w-72">
                                <a href="./showPics.php?pid=<?php echo $posts['id'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    <img class="rounded-lg h-80 w-72 object-cover object-top" src="./uploads/<?php echo $posts['photo'] ?>" alt="" />
                                </a>
                                <div class="p-6">
                                    <button type="button" class=" inline-block px-6 py-2.5 bg-none-600 text-black font-medium text-xs leading-tight uppercase rounded ">Views : <?php echo $posts['views'] ?></button>
                                    <button type="button" class=" inline-block float-right bg-none-600 text-red-600 font-semibold text-xs leading-tight border-2 border-red-600 uppercase rounded shadow-md hover:bg-red-600 hover:text-white hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                        <p class="text-red-600  px-3 py-2.5 hover:text-white"><a href="./favourite.php?did=<?php echo $posts['favid'] ?>"><i class="fa-solid  pr-3 fa-trash"></i>Remove</a></p>
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