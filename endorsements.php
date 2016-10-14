<?php
$currentPage = "Endorsements";
include "header.php";
?>
<article>
    <form>
        Name: <input type="text" id="name" name="name" placeholder="Name"><br><br>
        Date: <input type="date" id="date" name="date" placeholder="Date"><br><br>
        Endorsement: <textarea id="endorse" placeholder="Your endorsement here"></textarea><br><br>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Submit</button><br><br>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Submit</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to submit?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default" id="submit" data-dismiss="modal">Submit</button>
                    </div>
                </div>

            </div>
        </div>
        <button type="button" class="btn btn-info btn-sm" id="sortName">Sort By Name</button>
        <button type="button" class="btn btn-info btn-sm" id="sortDate">Sort By Date</button>
    </form>
    <table id="endorsementTable">
    </table>
</article>
<?php
include "footer.php";
?>
