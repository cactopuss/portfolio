<?php
require 'includes/config.php';
require 'partials/header.php';
?>

        <!-- Start of Content -->
        <div class="container">
            <div class="row">
            <!-- Your loop will start here and loop through the card markup -->
            <?php
                 foreach($projects as $project):
              ?>
                <!-- Start of Card -->
                <div class="col-md-3">
                    <div class="panel panel-default" id="item">
                        <div class="panel-heading card-header">
                        <img class="img-responsive" src="<?= $project['image_url'] ?>">
                        </div>

                        <div class="panel-body">
                            <h4><?= $project['title'] ?></h4>
                            <p><?= $project['content'] ?>
                            </p>
                            <a href="<?= $project['link'] ?>" class="btn btn-default btn-xs">
                                View
                            </a>
                            <form method="POST">
                            <button onclick="return confirm('Are you sure you want to delete?')" class="btn btn-default btn-xs"><?php
                            if(isset($_POST['item']) and is_numeric($_POST['item']))
{
 $delete = $_POST['item'];
 $sql = "DELETE FROM `projects` where `id` = '$delete'";


}
                                Delete
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                endforeach
                ?>
                <!-- End of Card -->


            </div>
        </div>

<?php

require 'partials/footer.php';
?>
