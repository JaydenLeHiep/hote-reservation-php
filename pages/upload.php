<?php
// Check if valid user is logged in.
if (@$_SESSION['admin']) {
    //echo '<h1>Welcome</h1>';
}
?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="display-1">Upload</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                <a href="index.php?menu=gallery" class="btn btn-outline-success my-2">Show gallery</a>
                <a href="#" class="btn btn-outline-secondary my-2">Other option</a>
            </p>
        </div>
    </div>
</section>


<div class="container mb-5" style="display: flex; align-items: center;">
    <div class="card mx-auto" style="width: 50%;">
        <div class="card-header">
            <h3>Upload Blog Post</h3>
        </div>
        <div class="card-body">
            <form action="index.php?menu=upload" method="post" enctype="multipart/form-data" id="blog-form">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="3" name="content" maxlength="500"></textarea>
                </div>
                <div class="form-group my-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
</div>


<div id="preview-container"></div>

<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_FILES['image'])) {

        // Connect to the MySQL server using XAMPP and phpMyAdmin
        $conn = mysqli_connect("localhost", "root", "", "hotel");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Get the form data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $image = $_FILES['image']['name'];
        // move the uploaded image to the uploads/news folder
        $upload_path = "uploads/";
        $upload_path = $upload_path . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {

            echo '<div class="text-center text-white" style="font-size: 2rem;">The file ' . basename($_FILES['image']['name']) . ' has been uploaded</div> ';
        }
        // Insert the data into the blog_posts table
        $sql = "INSERT INTO blog_posts (title, date, image, content) VALUES ('$title', NOW(), '$image', '$content')";
        if (mysqli_query($conn, $sql)) {
            echo '<div class="text-center text-white" style="font-size: 2rem;">Your post has been added successfully</div>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Close the connection
    mysqli_close($conn);
}

?>
</div>
<p class="text-center text-danger"> <?php echo @$error_up; ?></p>