        <?php
         session_start();
          require 'connection.php';
          $user=$_SESSION['user'];
          $query = "SELECT first_name, last_name, user_name FROM user WHERE NOT user_name ='$user' AND NOT user_name IN (SELECT friend FROM friend WHERE user_name ='$user')";

          $result = mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result))
          { ?>

        <div class="d-flex flex-row border rounded" style="margin-top: 20px" >
          <div class="p-0 w-75">
            <img src="photo/Profiledefault.png" class="img-thumbnail border-0" />  
          </div>

          <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
            <?php
              echo "<h4 class='text-info'>"."<a href='others_profile.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>";
            ?>
            <a href="addfriendrequest.php?username= <?php echo$row['user_name'];?>" class="btn btn-dark" ><h1>+</h1></a>
            <a href="#" class="btn btn-dark" onclick="removeDiv(this)"><h3>-</h3></a>
          </div>
        </div>

        <?php
          }
        ?>