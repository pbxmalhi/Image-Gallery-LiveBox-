<?php
include("mainclass.php");
$ob = new images();
if (isset($_REQUEST['pid'])) {
    $id = $_REQUEST['pid'];
    $data = $ob->showSelectedPost($id);
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
        <div class="flex justify-center m-auto my-16">
            <div class="flex flex-col md:flex-row md:max-w-xl relative overflow-hidden bg-no-repeat bg-cover rounded-lg bg-white shadow-lg">
                <img class=" w-full h-96 object-cover object-top cursor-pointer md:w-6/12 rounded-t-lg md:rounded-none md:rounded-l-lg hover:scale-110 transition duration-300 ease-in-ou" src="./uploads/<?php echo $data['photo'] ?>" alt="" />
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <h5 class="text-gray-900 text-xl font-medium mb-2"><?php echo $data['username'] ?></h5>
                        <p class="text-gray-700 text-base mb-4">
                            <?php echo $data['email'] ?>
                        </p>
                        <p class="text-gray-600 text-xs"><?php echo $data['postdesc'] ?></p>
                    </div>
                    <div class="flex flex-col">
                        <button type="button" class=" inline-block px-6 py-2.5 bg-none-600 text-black font-medium text-xs leading-tight uppercase rounded my-3">Views : <?php echo $data['views'] ?></button>
                        <button type="button" onclick="history.go(-1)" class=" inline-block float-right bg-none-600 text-black font-semibold text-xs leading-tight border-2 border-black uppercase rounded shadow-md hover:bg-black hover:text-white hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-black active:shadow-lg transition duration-150 ease-in-out">
                            <p class="text-black px-3 py-2.5 hover:text-white"><i class="fa-solid pr-3 fa-arrow-left"></i>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>