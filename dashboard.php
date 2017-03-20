<?php
require 'partials/header.php';
require 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$title = $image_url = $content = $link = '';
// Add data from form
$title = $_POST['title'];
$image_url = $_POST['image_url'];
$content = $_POST['content'];
$link = $_POST['link'];
// Next, we must do some validation to see if we got valid data
$errors = [];

createProject($dbh, $title, $image_url, $content, $link);
header("Location: dashboard.php");
die();
  }
  // Here is where you would send an email or save to the database etc
  // pass the function to run the updateDatabase

  // require 'thanks.php';
  // require 'includes/email-form.php';
  // mail();
  // require 'index.php';
  // die();

?>
        <!-- Start of Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dashboard
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="dashboard.php">
                                <!-- Form Title -->
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Add new project
                                    </label>
                                </div>

                                <!-- Title Input -->
                                <div class="form-group">
                                    <label for="title" class="col-md-4 control-label">Title<?=!empty($errors['title']) ? $errors['title'] : ''; ?></label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="<?=!empty($title) ? $title : ''; ?>" required="" autofocus="">
                                    </div>
                                </div>

                                <!-- Image Url Input -->
                                <div class="form-group">
                                    <label for="image_url" class="col-md-4 control-label">Image Url<?=!empty($errors['image_url']) ? $errors['image_url'] : ''; ?></label>

                                    <div class="col-md-6">
                                        <input id="image_url" type="text" class="form-control" name="image_url" value="<?=!empty($image_url) ? $image_url : ''; ?>" required="" autofocus=""  onchange="readURL(this)">
                                    </div>
                                </div>

                                <!-- Content Input -->
                                <div class="form-group">
                                    <label for="content" class="col-md-4 control-label">Content<?=!empty($errors['content']) ? $errors['content'] : ''; ?></label>

                                    <div class="col-md-6">
                                        <input id="content" type="text" class="form-control" name="content" value="<?=!empty($content) ? $content : ''; ?>" required="" autofocus="">
                                    </div>
                                </div>

                                <!-- Link Input -->
                                <div class="form-group">
                                    <label for="link" class="col-md-4 control-label">Link<?=!empty($errors['link']) ? $errors['link'] : ''; ?></label>

                                    <div class="col-md-6">
                                        <input id="link" type="text" class="form-control" name="link" value="<?=!empty($link) ? $link : ''; ?>" required="" autofocus="">
                                    </div>
                                </div>

                                 <!-- Submit Button -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Image Display Thumbnail -->
                    <div class="form-group">
                        <img style="display: block;" width="300px" height="200px" id="projectThumbnail" src="img/place-holder.png" class="img-responsive">
                    </div>
                </div>

            </div>
        </div>
        <!-- End of Content -->
    </div>

<?php
require 'partials/footer.php';
?>
