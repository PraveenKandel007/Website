<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   
    body{
        margin-left:0px;
        background-color: antiquewhite;
        
    }
    .container{
        
    }
    </style>
<body>

<div class="container mt-4">
    <div class="row">
        <!-- Vertical Navbar -->
        <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                <a class="nav-link" id="gallery-tab" data-toggle="pill" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Gallery</a>
                <a class="nav-link" id="expertise-tab" data-toggle="pill" href="#expertise" role="tab" aria-controls="expertise" aria-selected="false">Expertise/Experience</a>
                <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Display</a>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Home tab -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h2>Home</h2>
                    <form method="post">                        
                        <div class="form-group">
                            <label for="main_text">Main Text</label>
                            <input type="text" class="form-control" id="main_text" name="main_text" value="<?php include 'connect.php';
          $query = "SELECT title, description FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['title'];
            }
          } 
              ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="main_text" name="description" value="<?php include 'connect.php';
          $query = "SELECT title, description FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['description'];
            }
          } 
              ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="home">Update</button>
                    </form>
                    
                </div>

                <!-- Gallery ko tab ko starting -->
                <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    <h2>Gallery</h2>
                    <form method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="action" value="upload_image">
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" name="gallery_submit" class="btn btn-primary">Upload</button>
                    </form>
                    
                    <div class="mt-4">
                        <h3>Images</h3>
                        <table class="table mt-5">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'connect.php';
            $query = "SELECT * FROM images";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['img_id'] . '</td>';
                echo '<td>' . $row['img_name'] . '</td>';
                echo '<td>
                      <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="' . $row['img_id'] . '">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                      </td>';
                echo '</tr>';
              }
            } else {
              echo '<tr><td colspan="3">No images found in the database.</td></tr>';
            }
            if (isset($_POST['delete'])) {
                $delete_id = $_POST['delete_id'];
                $query = "DELETE FROM images WHERE img_id = $delete_id";
                mysqli_query($conn, $query);
                echo "<script>alert('Record deleted successfully');</script>";
                echo "<script>window.location = 'admin.php';</script>";
              }
            ?>
          </tbody>
        </table>
                    </div>
                </div>

                <!-- Expertise/Experience tab -->
                <div class="tab-pane fade" id="expertise" role="tabpanel" aria-labelledby="expertise-tab">
                    <h2>Expertise/Experience</h2>
                    <form method="post"  enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="exp_title">
                        </div>
                        <div class="form-group">
                            <label for="exp_description">Description</label>
                            <textarea class="form-control" id="exp_description" name="exp_description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exp_image">Upload Image</label>
                            <input type="file" class="form-control-file" id="exp_image" name="image">
                        </div>
                        <button type="submit" name="exp_submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>

                <!-- Contact Display tab -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h2>Contact Display</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Contact ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include'connect.php';
                             $sql = "SELECT contact_id, name, contact, message FROM contact";
                             $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['contact_id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['contact'] . "</td>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include 'connect.php';
if (isset($_POST['home'])) {
    $maintext = ($_POST['main_text']);
    $description = ($_POST['description']);
    $query2 = "UPDATE home SET title = '$maintext', description = '$description' WHERE id = 1;";
    $home_update = mysqli_query($conn, $query2);
    if($home_update)
    {
        echo "<script>alert('Home page updated successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed to update');</script>";
    }
  }
?>

<?php
if (isset($_POST['gallery_submit'])) {
  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $fileName = $image['name'];
    $size = $image['size'];
    $fileTemp = $image['tmp_name'];
    $type = $image['type'];
    echo "<br>";
    $size_converted = $size / 1048576;
    $date = date("Y-m-d-H-i-s");

    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date . "." . $extension;
    if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
      if ($size_converted < 5) {
        move_uploaded_file($fileTemp, 'images/' . $newfilename);
        $query = "INSERT INTO images(img_name) VALUES('$newfilename')";
        $res = mysqli_query($conn, $query);
        echo "File uploaded successfully";
      } else {
        die("Error: File is too large");
      }
    } else {
      die("Error: File is not supported");
    }
  } else {
    echo "No files";
  }
}
?>
<?php
include 'connect.php';
if (isset($_POST['exp_submit'])) {
  if (isset($_FILES['image'])) {
    $skill_title = ($_POST['exp_title']);
    $skill_description = ($_POST['exp_description']);
    $image = $_FILES['image'];
    $fileName = $image['name'];
   
    $fileTemp = $image['tmp_name'];
    
    echo "<br>";
    
    $date = date("Y-m-d-H-i-s");

    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date . "." . $extension;
    
    
      
        move_uploaded_file($fileTemp, 'skill_image/' . $newfilename);
        $query = "INSERT INTO skill(title,description,image) VALUES('$skill_title','$skill_description','$newfilename') ";
        $res = mysqli_query($conn, $query);
        echo "<script>alert('File uploaded successfully');</script>";
      } 
   else {
    echo "<script>alert('No files');</script>";
  }
}
?>