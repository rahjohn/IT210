<?php
$currentPage = "Projects";
include "header.php";
?>
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
    </style>
    <article>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="project1.jpg" alt="Cat" id="p1">
                </div>

                <div class="item">
                    <img src="project2.jpg" alt="Cat" id="p2">
                </div>

                <div class="item">
                    <img src="project3.jpg" alt="Cat" id="p3">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <table style="width:100%">
        <h1>Comments</h1>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Comment</th>
            </tr>
           <?php
           include 'settings.php';
           $conn = new mysqli($DBserver, $DBuser, $DBpassword, $DBname);
           // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " .$conn->connect_error);
            }
            $sql = "SELECT Comments.Comment, Comments.Date, Users.name FROM Comments INNER JOIN Users ON Comments.UserID=Users.ID";
           $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_array($result)){
           echo "<tr>";
           echo "<td>" . $row['name'] . "</td>";
           echo "<td>" . $row['Date'] . "</td>";
           echo "<td>" . $row['Comment'] . "</td>";
           echo "</tr>";
           }
           echo "</table>";

           mysqli_close($conn);
           ?>
        <?php
        if (isset($_SESSION['login_user'])) {
            echo "<h3>Submit a comment:</h3>";
            echo "<form action='comment-post.php' method='post'>";
            echo "<textarea id='comment' type='text' class ='comment' name='comment' rows='7' cols='30'></textarea><br>";
            echo "<button type='submit' class='btn btn-info btn-md'>Comment</button>";
        }
        ?>
    </article>
    <?php
    include "footer.php";
    ?>
