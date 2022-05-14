<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<style>
body{margin-top:70px;background:#eee;}.card {background-color: #fff;border: 0 solid #eee;border-radius: 0;}.card {margin-bottom: 30px;-webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);}
.card-profile .card-header {height: 9rem;background-size: cover;background-position: center center}.card-profile-img {max-width: 8rem;margin-top: -6rem;margin-bottom: 1rem;border: 3px solid #fff;border-radius: 100%}
.avatar {width: 2rem;height: 2rem;line-height: 2rem;border-radius: 50%;display: inline-block;background: #ced4da no-repeat center/cover;position: relative;text-align: center;color: #868e96;font-weight: 600;vertical-align: bottom}
.avatar.avatar-md {width: 3rem;height: 3rem} .avatar.avatar-lg {width: 4rem;height: 4rem} .avatar.avatar-xl {width: 5rem;height: 5rem}.avatar.avatar-xxl {width: 7rem;height: 7rem;min-width: 7rem}
.card-header:first-child {border-radius: 0 0 0 0;}.card-header:first-child {border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;}.card-header {padding: 1rem 1.25rem;background-color: #fff;border-bottom: 1px solid #eee;}
.card-header {-webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.05);box-shadow: 2px 2px 2px rgba(0,0,0,0.05);}.comment{margin-left: 90px;margin-right: 15px;}
</style>
<body>
<?php session_start(); if (empty($_GET)) { header("Location:profile.php"); } else { if($_GET['username']===$_SESSION['user']) { header("Location:profile.php"); } elseif (!isset($_SESSION['user'])) { header("Location:login.php"); } } ?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#30336b;">
<ul class="navbar-nav">
<li class="nav-item ">
<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
</li>
</ul>
</nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-profile">
          <div style="background-color:#30336b;" class="card-header"></div>
            <div style="background-color:#dbdcf2;" class=""><img src="photo/Profiledefault.png" class="card-profile-img">
              <?php
                require 'connection.php';
                $user=$_GET['username'];
                $query = "SELECT first_name,last_name,gender, email FROM user WHERE user_name ='$user'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                echo "<h3 class='mb-3'>".$row['first_name']." ".$row['last_name']."</h3>";
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="col-lg-8">';
                echo '<div class="card">';
                echo '<div class="list-group card-list-group" id="post_aj" >';
                require 'connection.php';
                $user=$_GET['username'];
                $query = "SELECT p.id, p.user_name, p.post_date, p.text, p.Images, u.first_name, u.last_name FROM posts p INNER JOIN user u ON p.user_name = u.user_name WHERE p.user_name='$user' order by post_date DESC";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)==0) {
                echo "<p style='margin-left:10px''>🎃♟  𝓃σ𝓝  🐣👽</p>";
                }
                while($row = mysqli_fetch_assoc($result))
                {
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<div class="container py-3">';
                echo '<div class="card">';
                echo '<div class="row ">';
                echo "<div class='container'>";
                if(!empty($row['Images'])) { echo "<img src='".$row['Images']."' class='w-75 p-3'>";}
                echo "<p class='text-secondary text-center' style='margin-top: 10px; margin-bottom: 5px'>".$row['post_date']."</p>";
                echo "</div>";
                echo '<div class="col-md-8 px-3">';
                echo '<div class="card-block px-3">';
                echo "<h4 class='card-title'>"."<a href='pro_file_friend.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>";  
                echo "<p class='card-text'>".$row['text']."</p>";
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                    $post_id=$row['id'];
                    $query1 = "SELECT c.user_name_comm, c.text ,u.first_name,u.last_name from comments c INNER JOIN user u on  c.user_name_comm = u.user_name WHERE post_id =$post_id";
                    $result1 = mysqli_query($conn, $query1);         
                     while($row1 = mysqli_fetch_assoc($result1))
                    {
                    echo '<div class="card card-inner comment">';
                    echo '<div class="card-body">';
                    echo '<div class="row">';
                    echo '<div class="col-md-10">';
                    echo "<p><strong>"."<a href='pro_file_friend.php?username=".$row1['user_name_comm']."'>".$row1['first_name']." ".$row1['last_name']."</a>"."</strong></p>";
                    echo"<p>".$row1['text']."</p>";
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    echo '<div>';
                    echo '<p id="newlikes">';
                        $query2 = "SELECT count(*) AS likes FROM `like` l where l.post_id = $post_id";
                        $result2 = mysqli_query($conn, $query2);         
                        $row2 = mysqli_fetch_assoc($result2);
                        $query3 = "SELECT l.user_name as liked FROM `like` l WHERE l.user_name = '$user' AND l.post_id= $post_id";
                        $result3 = mysqli_query($conn, $query3);         
                        $row3 = mysqli_fetch_assoc($result3);
                        if (!isset($row3['liked'])) {
                          ?>
                            <a id='like' value="<?php echo $post_id;?>" class="float-left btn text-white btn-primary" onclick="like(this)"><?php echo $row2['likes'];?>♕♨  l𝓲𝓀𝐞𝓈  👣💜</a>
                          <?php
                        } else {
                        ?>
                        <a id='like' value="<?php echo $post_id;?>" class="float-left btn text-white btn-danger" onclick="like(this)"><?php echo $row2['likes'];?>♕♨  l𝓲𝓀𝐞𝓈  👣💜</a>
                        <?php
                          }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>