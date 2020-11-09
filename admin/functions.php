<?php
function add_category(){
?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6 ">

                <h2>Add Category</h2>
                <form class="form-group" name="form" method="post" action="action.php" enctype="multipart/form-data">
                    <div class="alert alert-error"></div>
                    <div class="row">

                        <label >&nbsp; Category Name:</label>
                        <div class="col-md-7">
                            <input id="name" class="hh2 " type="text" class="form-control"
                                   placeholder="Enter name"  name="name">
                        </div>
                    </div>
                    <div class="row">

                        <label >&nbsp; Category Image:</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary ml-5" name="add_cat">Add</button>

                </form >
            </div>


            </form>

        </div>
    </div>

    <?php
}
function add_sub(){
?>

    <?php
}
function add_grand_sub(){
?>


    <?php
}