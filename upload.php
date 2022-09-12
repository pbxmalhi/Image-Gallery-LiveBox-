<?php
include("mainclass.php");
$ob = new images();
if (isset($_REQUEST['upload'])) {
    $ob->upload($_POST, $_FILES);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("./commons/links.php")
    ?>
    </script>
    <title>Live Box | UPLOAD</title>
</head>

<body>
    <header>
        <?php
        include("./commons/navbar.php");
        ?>
        <div class="block p-6 rounded-lg shadow-lg bg-white h-auto max-w-md m-auto my-16">
            <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-sky-600 text-center mb-6">Upload Post</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-6">
                    <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700">Post Description</label>
                    <textarea name="postDesc" required class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlTextarea1" rows="5" placeholder="Post Description"></textarea>
                </div>
                <div class="form-group mb-6">
                    <input name="pic" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" accept=".png, .jpg, .jpeg" id="formFile">
                </div>
                <div class="form-group mb-6">
                    <select name="visibility" required class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option value="" selected>Select Visibility</option>
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <input type="submit" value="Upload" name="upload" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    </div>
                    <div class="form-group mb-6">
                        <button type="button" class="w-full inline-block bg-none-600 text-black font-semibold text-xs leading-tight border-2 border-black uppercase rounded shadow-md hover:bg-black hover:text-white hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:bg-black active:shadow-lg transition duration-150 ease-in-out">
                            <p class="text-black px-3 py-2 hover:text-white"><i class="fa-solid pr-3 fa-arrow-left"></i><a href="./index.php">Back</a></p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>