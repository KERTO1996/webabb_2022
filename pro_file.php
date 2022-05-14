</script>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
<link rel="stylesheet" href="stylecopy.css">
<script src="index.js" defer></script>
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
body{ background:#eee; } .card {background-color: #fff;border: 0 solid #eee;border-radius: 0; } .card {margin-bottom: 30px; -webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);}
.card-profile .card-header {height: 9rem;background-size: cover;background-position: center center} .card-profile-img {max-width: 8rem;margin-top: -6rem;margin-bottom: 1rem;border: 3px solid #fff;border-radius: 100%}
.avatar {width: 2rem;height: 2rem;line-height: 2rem;border-radius: 50%;display: inline-block;background: #ced4da no-repeat center/cover;position: relative;text-align: center;color: #868e96;font-weight: 600;vertical-align: bottom}
.avatar.avatar-md {width: 3rem;height: 3rem}.avatar.avatar-lg {width: 4rem;height: 4rem}.avatar.avatar-xl {width: 5rem;height: 5rem} .avatar.avatar-xxl {width: 7rem;height: 7rem;min-width: 7rem}
.card-header:first-child { border-radius: 0 0 0 0;}
.card-header:first-child {border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;} .card-header {padding: 1rem 1.25rem;background-color: #fff;border-bottom: 1px solid #eee;} .card-header {-webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.05);box-shadow: 2px 2px 2px rgba(0,0,0,0.05);}
.comment{margin-left: 90px;margin-right: 15px;}
</style>
<body>
<?php
session_start();
if ( !isset( $_SESSION['user'] ) ) {
header("Location:login.php");
}
?>
<nav class=''>
<div class="logo">
<img src="photo/Profiledefault.png" alt="user">
</div>
<ul>
<li> <a href="index.php">Home</a> </li>
<li> <a href="pro_file.php">Profile</a> </li>
<li> <a href="logout.php">Log out</a> </li>
<li class="nav-item dropdown">
<a class="" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications</a>
        <?php
        require 'connection.php';
        echo '<div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown" >';
        echo  '<p style="margin-left: 150px; margin-top: 10px;">💗𝑅𝑒𝓆𝓊𝑒𝓈𝓉𝓈</p>';
        echo '<div id="sstr">';
        $user=$_SESSION['user'];
        $query = "SELECT first_name, last_name,user_name FROM user WHERE user_name IN (SELECT sender FROM friend_request WHERE receiver='$user')";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==0) {
              echo "<p style='margin-left:10px''>𝒩💗𝑅𝑒𝓆𝓊𝑒𝓈𝓉𝓈</p>";
        }
        while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="d-flex flex-row border rounded" style="margin-top: 20px" >';
        echo '<div class="p-0 w-25">';
        echo '<img src="photo/Profiledefault.png" class="img-thumbnail border-0" />';
        echo '</div>';
        echo '<div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">';
        echo "<h4 class='card-title'>"."<a href='pro_file_friend.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>";
        echo "<a class='btn btn-dark' href='addfriend.php?username=".$row['user_name']."'><h1>+</h1></a>";
        echo "<a class='btn btn-dark' href='deletefriendrequest.php?username=" .$row['user_name']."'><h3>-</h3></a>";
        echo "</div>";
        echo "</div>";
        }
        ?>
        </div>
        </div>
        </li>
        </ul>
        </nav>
        <header>
        <button id="toggle" class="toggle">
        <i class="fa fa-bars fa-2x"></i>
        </button>
        <h1>Profile</h1>
        <p>☆*: .｡. o(≧▽≦)o .｡.:*☆</p>
          </header>
        <div class="container">
        <div class="row">
        <div class="col-lg-4">
        <div class="card card-profile">
        <div style="background-color:#30336b;" class="card-header"></div>
        <div style="background-color:#dbdcf2;" class=""><img src="photo/Profiledefault.png" class="card-profile-img">
        <?php
        require 'connection.php';
        $user=$_SESSION['user'];
        $query = "SELECT * FROM user WHERE user_name = '$user'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        echo "<h3 class='mb-3'>".$row['first_name']." ".$row['last_name']."</h3>";
        echo "<p class='mb-4'> " .$row['email']." </p>";
        echo "<p class='mb-4'> " .$row['gender']." </p>";
        echo "<p class='mb-4'> " .$row['address']." </p>";
        echo "<p class='mb-4'> " .$row['phone_no']." </p>";
        echo "<p class='mb-4'> " .$row['date_birth']." </p>";
        echo '<p> <b>🎀  𝐹𝓇𝒾𝑒𝓃𝒹𝓈  🎀</b></p>';
        echo '<div id="myfrinds">';
        require 'connection.php';
        $user=$_SESSION['user'];
        $query = "SELECT first_name, last_name, user_name FROM user WHERE user_name IN (SELECT friend FROM friend WHERE user_name='$user')";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==0){ echo "You have no friends :c";}
        while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="d-flex flex-row border rounded" style="margin-top: 20px">';
        echo '<div class="p-0 w-25">';
        echo '<img src="photo/Profiledefault.png" class="img-thumbnail border-0" />';
        echo '</div>';
        echo '<div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">';
        echo "<h4 class='card-title'>"."<a href='pro_file_friend.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>"; 
        echo '</div>';
        echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-8">';
        echo '<div class="card">';
        echo '<div class="card-header">';
        echo '<div class="input-group">';
        echo '<div class="input-group-append">';
        ?>
        <style> input , textarea {display: block;width: 300px;padding: 10px;border: 1px solid #ccc;border-radius: 25px;margin-top: 15px;margin-bottom: 15px;outline: none;} textarea {height: 100px;width: 100%;} input{width: 100%;}</style>
        <div class="container">
        <div class="row">
        <div class="" >
        <div class="">
        <div class="card-body">
        <h1 style=" padding-bottom: 7px; text-align: center;">⋆🌠  🎀  𝒜𝒟𝒟𝒫♡𝒮𝒯  🎀  🌠⋆</h1>
        <form class="form-signin" action="addpost.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <textarea name="text" placeholder="Text"></textarea>
        </div>
        <div class="form-group">
        <input type="file" name="file"></textarea>
        </div>
        <button  class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">ADD</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
        </div>
        <div class="list-group card-list-group" id="post_aj" >
        <?php
        require 'connection.php';
        $user=$_SESSION['user'];
        $query = "SELECT p.id, p.user_name, p.post_date, p.text, p.Images, u.first_name, u.last_name FROM posts p INNER JOIN user u ON p.user_name = u.user_name WHERE p.user_name='$user' order by post_date DESC";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==0) { echo "<p style='margin-left:10px''>👣💥  Ň𝐎𝕟  😈♟</p>";}
        while($row = mysqli_fetch_assoc($result)) {
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
        $query1 = "SELECT c.user_name_comm, c.text ,u.first_name,u.last_name from comments c INNER JOIN user u on  c.user_name_comm = u.user_name WHERE post_id=$post_id";
        $result1 = mysqli_query($conn, $query1);
        while($row1 = mysqli_fetch_assoc($result1)) {      
        echo '<div class="card card-inner comment">';
        echo '<div class="card-body">';
        echo '<div class="row">';
        echo '<div class="col-md-10">';
        echo "<p><strong>"."<a href='pro_file_friend.php?username=".$row1['user_name_comm']."'>".$row1['first_name']." ".$row1['last_name']."</a>"."</strong></p>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        }
        echo '<div class="input-group mb-3 mt-3">';
        echo '<form action="comment_from.php" method="post" class="ajax form-inline ml-auto" >';
        echo '<div class="form-group mx-sm-3 mb-2 ">';
        echo '<input class="form-control" style="width: 500px" type="text" name="text" id="newcomment" placeholder="Write a comment"  aria-describedby="basic-addon2" required>';
        ?>
        <input type="hidden" name="post_id" value="<?php echo($post_id)?>">
        </div>
        <input type="submit" value="🍫 ⋆ 🍪  🎀  𝒜𝒹𝒹 𝒸🏵𝓂𝓂𝑒𝓃𝓉  🎀  🍪 ⋆ 🍫" class="btn btn-primary mb-2 btn-outline-secondary comment_btn">
        </form>
        </div>
        <div>
        <p id="newlikes">
        <?php
        $query2 = "SELECT count(*) AS likes FROM `like` l where l.post_id = $post_id";
        $result2 = mysqli_query($conn, $query2);
        $row2 = mysqli_fetch_assoc($result2);
        $query3 = "SELECT l.user_name as liked FROM `like` l WHERE l.user_name = '$user' AND l.post_id= $post_id";
        $result3 = mysqli_query($conn, $query3);         
        $row3 = mysqli_fetch_assoc($result3);
        if (!isset($row3['liked'])) {
        ?>
        <a id='like' value="<?php echo $post_id;?>" class="float-left btn text-white btn-primary" onclick="like(this)"><?php echo $row2['likes'];?>♕♨  l𝓲𝓀𝐞𝓈  👣💜</a>
        <a href="deletepost.php?id= <?php echo$row['id'];?>" class="float-left btn text-white btn-primary ml-2">Delete</a>
        <?php
        } else {
        ?>
        <a id='like' value="<?php echo $post_id;?>" class="float-left btn text-white btn-danger" onclick="like(this)"><?php echo $row2['likes'];?>♕♨  l𝓲𝓀𝐞𝓈  👣💜</a>
        <a href="deletepost.php?id= <?php echo$row['id'];?>" class="float-left btn text-white btn-primary ml-2">Delete</a>
        <?php
        }
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        }
        ?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
<script>
setInterval(function() {
  $(document).ready(function(){
        $("#post_aj").load("aj_profilecomments.php");
  });
}, 100000);
</script>
<script>
setInterval(function() {
  $(document).ready(function(){
        $("#freq").load("load-freq.php");
  });
}, 30000);
</script>
<script>
setInterval(function() {
  $(document).ready(function(){
        $("#myfrinds").load("load-myfrinds.php");
  });
}, 30000);
</script>
<script>
  $('form.ajax').on('submit',function(){
    var that = $(this),
        url = that.attr('action'), 
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

      data[name] = value;
    });
    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response){
          console.log(response);
           $(document).ready(function(){
      $("#post_aj").load("aj_profilecomments.php");
    });
        }
    });
   
    return false;
  });
</script>
<script>
function like(el) {
  if ($(el).hasClass('btn-primary'))
  {
    like.staticVar=$(el).attr('value');
    $.ajax(
    {
       url: "add_like.php?id="+like.staticVar,
       success: function(data){
        $("#post_aj").load("aj_profilecomments.php");
        console.log("success");
       }
    });
  }
  else
  {
    like.staticVar=$(el).attr('value');
    $.ajax(
    {
       url: "delete_like.php?id="+like.staticVar,
       success: function(data){
        $("#post_aj").load("aj_profilecomments.php");
        console.log("success");
       }
   });
  }
};
