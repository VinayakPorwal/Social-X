<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script>
    user2 = <?php echo $_GET['userid'];
            session_start();

            ?>
  </script>
  <?php // echo $_SESSION['stat']; 
  ?>
  <script>
    function showUser() {
      var int = document.getElementById("inp").value;

      // console.log(int);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

          document.getElementById("inp").value = "";
        }
      };
      xhttp.open("POST", "z_data.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("user2=" + user2 + "&msg=" + int);


    }

    function showUser2() {

      // console.log(int);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // var x = navigator.onLine;
          // document.getElementById("stat").innerHTML = x;
          document.getElementById("txtHint").innerHTML = this.responseText;

        }
      };
      xhttp.open("GET", "zchamtz.php?userid=" + user2, true);
      xhttp.send();


    }
    showUser2();
    setInterval(function() {
        showUser2()
      }, 2000)
  </script>
  <style>
    #n ul li {
      padding: 0 10px !important;

    }

   
#chatbody::before{
        content: "";
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    z-index: -4;
    left: 0px;
    background-image: url(./imgs/background.jpg);
    filter: brightness(0.5);
}
    #profile {
      text-align: center;
      background-color: bisque;
      padding: 5px 0;
      top: 45px;
      position: sticky;
      z-index: 1;
      font-weight: 600;
    }

    #inp {
      width: 86vw;
      position: relative;
      border: 1px solid;
      border-radius: 4px;
      margin: 0px 9px 0 13px;
      border-bottom: 2px solid;
    border-top: 0px;
    border-right: 0px;
    border-left: 0px;
    background:slategrey;
    color:white;
    }
    #inp:focus{
        outline:none;
        /* color:white; */
    }
#inp::placeholder
{
    color:white;
}    #sub {
      margin: 10px 10px 10px 10px;

    }

    #chattype {
      display: flex;
      background: slategray;
      align-items: center;
      position: sticky;
      bottom: 0;
      justify-content: center;
    }

    #sidechat {
      float: right;
      top: 54x;
      /* position: fixed; */
      right: 0;
      overflow-y: scroll;


      /* margin: 0 -18px 0 0px; */
      width: 19vw;
      background-color: grey;
      height: 93vh;
      /* max-height: 86vh; */

    }

    @media screen and (max-width : 1000px) {
      #sidechat {
        display: none;
      }

    }

    @media screen and (min-width : 1000px) {
      #chat222 {
        width: 80vw;
      }

      #inp {
        width: 70vw;
      }
    }

    /* sidechat */

    .hehe {
      z-index: 1;
      opacity: 100%;
    }

    .w3-bar .w3-button {
      padding: 16px;
    }

    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    .ppic {
      width: 40px;
      height: 40px;
      background-color: yellow;
      border: 1px solid;
      text-align: center;
      vertical-align: middle;
      position: relative;
      margin: 0px 0 0 10px;
      font-weight: 600;
      font-size: large;
    }

    #profile2 {
      padding: 10px 0 !important;
      display: flex;
      padding-bottom: 16px;
      background: aquamarine;
      display: flex;
      border-radius: 10px;
      margin: 10px 0;
    }

    .w3-opacity {
      font-style: italic;
      font-size: x-small;
    }

    .username {
      margin: -5px 8px;
      text-align: left;

    }
  </style>
</head>

<body>
  <?php
  include "./components/navbar.php";
  ?>
  <div id="sidechat">
    <div style="background-color: #00b4e6;">
      <h3 style="margin:0" class="w3-center">Recent Chats</h3>
      <div class="w3-row-padding w3-center">
        <?php
        include "conn.php";

        $user1 = $_SESSION['id'];
        $sql = "SELECT * FROM register ORDER BY `sno.` DESC";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            $user2 = $row['sno.'];
            $name = $row['name'];
            // echo $user1;
            // echo $user2;
            $sql2 = "SELECT * FROM `user_data` WHERE user2 = '$user2' OR user1 ='$user1' AND user1 ='$user2' OR user2 ='$user1' ORDER BY id DESC LIMIT 1;";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            if (mysqli_num_rows($query2) > 0) {
              if (($row2['user1'] == $user1)) {

                $result = $row2['message'];
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    
    
                $substr = substr($name, 0, 1);
                echo '<a style="text-decoration:none;"href="z_test.php?userid=' . $user2 . '">
                        <div id="profile2">
                          <div class="w3-circle ppic" >' . $substr . '</div>
                            <p class="username">' . $name . '<br>
                             <span style="word-break: break-word">you:' . $msg . '</span>
                            </p>
                        </div>
                      </a>';
              }
               else {
                $result = $row2['message'];
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    
    
                $substr = substr($name, 0, 1);
                echo '<a style="text-decoration:none;"href="z_test.php?userid=' . $user2 . '">
                        <div id="profile2">
                          <div class="w3-circle ppic" >' . $substr . '</div>
                            <p class="username">' . $name . '<br>
                             <span style="word-break: break-word">' . $msg . '</span>
                            </p>
                        </div>
                      </a>';
              }
            } 
          }
        }

        ?>
      </div>
    </div>
  </div>
  <div id="chat222" style="min-height: 93vh;">
    <!-- <div id="stat"></div> -->
    <div id="txtHint"><b>Chats will be Loading here..</b></div>
    <br>
    <div id="chattype">


      <input id="inp" name="msg" type="text" autocomplete="off" autofocus placeholder="Type your message here..">

      <button type="button" id="sub" onclick="showUser()" name="sub">send</button>
    </div>
  </div>
  <?php
//   include "./components/footer.php";
  ?>
</body>

</html>