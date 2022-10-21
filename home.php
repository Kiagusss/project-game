<?php
include 'db.php';
if(!isset($_SESSION['id'])) header("location:index.php");
$id = $_SESSION['id'];
$sql = "Select * from users where id = '$id'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body onkeyup="key2()" onkeydown="key()">
    <div id="containers">
    <section aria-label="Floating Logo">
<div class="tilts">
              <h2>S</h2>
              <h2>P</h2>
              <h2>A</h2>
              <h2>C</h2>
              <h2>E</h2>
              <h2>A</h2>
              <h2>D</h2>
              <h2>V</h2>
              <h2>E</h2>
              <h2>N</h2>
              <h2>T</h2>
              <h2>U</h2>
              <h2>R</h2>
              <h2>E</h2>
            </div>
          </section>
                  <h1 id="nama">Player: <?php echo $row['username'];?> #<?php echo $row['id'];?> </h1>  
    <div class="container1" id="container1">
        <div id="loti">
        <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_g9uulobe.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px; position:absolute; margin-left:600px;"  loop  autoplay></lottie-player>
        </div>
        <div class="isi"></div>
        <div class="warna">
        <label for="color" class="labels
        ">Pilih Warna:</label>
        <input type="color" name="warna" id="warna">
        </div>
        <div class="tombol">
        <a href="logout.php" class="lgot">Logout</a>
        <button id="btns" onclick="startGame()">Start</button>
        </div>
        
    </div>
    </div>
    <footer>
	<p>Developed By Kiagus Ahmad Farhan Aziz</p>
</footer>
<div class="container5">
<input type="button" value="Restart" onclick="ulang()" id="ulang" style="display:none;">
<input type="button" value="Exit" onclick="exit()" id="keluar" style="display:none;">
</div>

 <script src="assets/game.js"></script>
 <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>

