<?php session_start();
// include composer autoload
require "vendor/autoload.php";

// import the Intervention image manager class file
use Intervention\Image\ImageManagerStatic as Image;
// Main Class for the project
class images
{
    private $servername = "localhost";
    private $username = "root";
    private $userpass = "";
    private $database = "livebox";
    private $connect;

    // Connection to the database
    public function __construct()
    {
        $this->connect = new mysqli($this->servername, $this->username, $this->userpass, $this->database);
        if (mysqli_connect_error()) {
            echo "Connection Failed";
        } else {
            return $this->connect;
        }
    }

    // checking for existing usermail
    public function existingMail()
    {
        $usermail = $this->connect->real_escape_string($_POST['usermail']);
        $query = "select * from login where email = '$usermail'";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            return 0;
        } else {
            return 1;
        }
    }
    // checking for existing username
    public function existingUser()
    {
        $username = $this->connect->real_escape_string($_POST['username']);
        $query = "select * from login where username = '$username'";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            return 0;
        } else {
            return 1;
        }
    }

    // Registering a user
    public function register($post, $file)
    {
        $name = $this->connect->real_escape_string($_POST['name']);
        $usermail = $this->connect->real_escape_string($_POST['usermail']);
        $username = $this->connect->real_escape_string($_POST['username']);
        $userpass = $this->connect->real_escape_string($_POST['userpass']);
        $filename = $_FILES['profilepic']['name'];
        $filepath = $_FILES['profilepic']['tmp_name'];
        $imagename = explode(".", $filename);
        $extension = $imagename[1];
        $query = "show table status like 'login'";
        $result = $this->connect->query($query);
        $row = $result->fetch_assoc();
        $id = $row['Auto_increment'];
        $newFilename = $id . "." . $extension;
        $query = "insert into login(name, email, username, pass, profilepic) values('$name', '$usermail', '$username', '$userpass', '$newFilename')";
        if ($this->connect->query($query)) {
            move_uploaded_file($filepath, "UsedprofilePics/" . $newFilename);
            $Image = Image::make("UsedprofilePics/" . $newFilename)->resize(200, 200)->save("profilePics/" . $newFilename, 100);
        } else {
            echo "There is an error in the code";
        }
        header("Location:login.php");
        clearstatcache();

        exit;
    }

    // Logging in 
    public function login()
    {
        $email = $this->connect->real_escape_string($_REQUEST['usermail']);
        $password = $this->connect->real_escape_string($_REQUEST['userpass']);
        $query = "select * from login where email = '$email' and pass = '$password'";
        $result = $this->connect->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['userid'] =  $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['profilepic'] = $row['profilepic'];
            $_SESSION['usermail'] = $row['email'];
            $_SESSION['userpass'] = $row['pass'];
            header("location:index.php");
        } else {
            return 1;
        }
    }

    // Uploading a post
    public function upload()
    {
        $postdesc = $this->connect->real_escape_string($_POST['postDesc']);
        $visibility = $this->connect->real_escape_string($_POST['visibility']);
        $views = 0;
        $userid = $_SESSION['userid'];
        $filename = $_FILES['pic']['name'];
        $filepath = $_FILES['pic']['tmp_name'];
        $imagename = explode(".", $filename);
        $extension = $imagename[1];
        $query = "show table status like 'upload'";
        $result = $this->connect->query($query);
        $row = $result->fetch_assoc();
        $id = $row['Auto_increment'];
        $newFilename = $id . "." . $extension;
        $query = "insert into upload(userid, postdesc, photo, visibility, views) values('$userid', '$postdesc', '$newFilename', '$visibility', '$views')";
        if ($this->connect->query($query)) {
            move_uploaded_file($filepath, "uploads/" . $newFilename);
?>
            <script>
                alert("Post Uploaded successfully.");
                window.location.href = 'http://localhost/php/ImageProject/upload.php';
            </script>
        <?php
        }
        clearstatcache();
        exit;
    }

    // Displaying public posts
    public function displayPublicPosts()
    {
        $query = "select * from upload where visibility = 'public'";
        $result = $this->connect->query($query);
        if ($result) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // Displaying Profile posts
    public function displayProfilePosts($id)
    {
        $query = "select * from upload where userid = $id";
        $result = $this->connect->query($query);
        if ($result) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // Displaying the pic that user clicks and Views increasing
    public function showSelectedPost($id)
    {
        $query = "update upload set views= views + 1 where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
            $query = "select u.*, l.username, l.email from upload u , login l where u.userid = l.id and u.id = $id";
            $result = $this->connect->query($query);
            if ($result) {
                $row = $result->fetch_assoc();
                return $row;
            }
        }
    }

    // Adding post to favourites
    public function addToFavourite($id)
    {
        $userid = $_SESSION['userid'];
        $query = "insert into favourite(postid, userid) values($id, $userid)";
        $result = $this->connect->query($query);
        if ($result) {
        ?>
            <script>
                alert("Post added to favourites Successfully.")
                window.location.href = 'http://localhost/php/ImageProject/index.php';
            </script>
        <?php
        }
    }

    // Displaying favourite posts
    public function displayFavPosts()
    {
        $userid = $_SESSION['userid'];
        $query = "select u.*, f.postid, f.userid, f.id as favid from upload u , favourite f where u.id = f.postid and f.userid = $userid";
        $result = $this->connect->query($query);
        if ($result) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // Removing Posts form favourites
    public function removeFavourite($id)
    {
        $query = "delete from favourite where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
        ?>
            <script>
                alert("Post removed from favourites successfully.");
                window.location.href = 'http://localhost/php/ImageProject/favourite.php';
            </script>
        <?php
        }
    }

    // Deleting Posts by the user
    public function deletePost($id)
    {
        $query = "select * from upload where id = $id";
        $result = $this->connect->query($query);
        $row = $result->fetch_assoc();
        unlink('./uploads/' . $row['photo']);
        $query = "delete from upload where id = $id";
        $result = $this->connect->query($query);
        if ($result) {
        ?>
            <script>
                alert("Post deleted successfully.");
                window.location.href = 'http://localhost/php/ImageProject/profile.php';
            </script>
            <?php
        }
    }

    // Change password
    public function changePassword()
    {
        $email = $this->connect->real_escape_string($_POST['usermail']);
        $oldpass = $this->connect->real_escape_string(($_POST['userOldPass']));
        $newpass = $this->connect->real_escape_string(($_POST['userNewPass']));
        $loginUser = $_SESSION['usermail'];
        if ($email == $loginUser) {
            $query = "select * from login where email = '$email' and  pass = '$oldpass'";
            $result = $this->connect->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id = $row['id'];
                $query = "update login set pass = '$newpass' where id=$id";
                $result = $this->connect->query($query);
                if ($result == true) {
            ?>
                    <script>
                        alert("Password Changed Successfully. Please Login with new Password.");
                        window.location.href = 'http://localhost/php/ImageProject/login.php?log=1';
                    </script>
<?php
                } else {
                    return 1;
                }
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }
}
