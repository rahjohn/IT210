<?php
$currentPage = "Endorsements";
include "header.php";
?>
<article>
    <form action="endorse-post.php" method="post">
        Name: <input type="text" id="name" name="name" placeholder="Name"><br><br>
        Date: <input type="date" id="date" name="date" placeholder="Date"><br><br>
        Endorsement: <textarea id="endorse" name="endorse" placeholder="Your endorsement here"></textarea><br><br>
        <button type="submit" class="btn btn-info btn-sm" id="submit">Submit</button><br><br>
        <button type="button" class="btn btn-info btn-sm" id="sortName">Sort By Name</button>
        <button type="button" class="btn btn-info btn-sm" id="sortDate">Sort By Date</button>
    </form>
    <table id="endorsementTable">
    </table>
</article>
<?php
include "footer.php";
?>
