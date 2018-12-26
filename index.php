<?php include "Templates/header.php"; ?>
<?php include "Templates/nav.php"; ?>
<?php session_start() ?>
<div class="Home">
<h1>Home</h1>
<?php if (isset($_SESSION["Username"])){
    $name = $_SESSION["Username"];
    echo "<p> Hello '$name'</p>";
}
?>
</div>
</body>
</html>