<?php
session_start();
if (isset($_POST['btn-login'])) {

    require_once("./config.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $query = $stmt->execute();
    $reults = $stmt->get_result();
    $allData = $reults->fetch_array(MYSQLI_ASSOC);

    if ($allData['username'] == $username) {

        $userId = $allData['id'];
        $username = $allData['username'];

        $_SESSION['userId'] = $userId;
        $_SESSION['userName'] = $username;

        ?>
        <script>
            alert("Login Successful...!!!")
            window.location.href="../sales.php";
        </script>
        <?php
    }else{
        header("location:../index.php");
    }
}
