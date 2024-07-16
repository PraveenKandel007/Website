<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pixels Photography Portfolio</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <style>
      body {
        background-color: antiquewhite;
        color: #343a40;
      }

      a {
        color: #f8f9fa !important;
      }

      #home {
        margin-top: 20px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      #navbar {
        background-color: #a71d2a !important;
      }

      #gallery-adjust {
        padding-top: 42px;
        margin-top: 32px;
      }

      .gallery-image {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
        border-radius: 10px;
      }

      .gallery-image:hover {
        scale: 1.03;
        transition-duration: 0.4s;
      }
      #skills {
        margin-top: 42px;
        background-color: ;
        padding: 48px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .skill-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }

      #contact {
        margin-top: 60px;
      }

      .btn-primary {
        background-color: #a71d2a;
        border-color: #a71d2a;
      }

      .btn-primary:hover {
        background-color: #922029;
        border-color: #922029;
      }
      #navbar {
        background-color: #a71d2a !important;
        font-size: 1.2rem;
        height: 48px;
      }
     
        .footer {
            
            height: 80px; 
            
            background-color: silver;
        }
        
      
        .about-section {
            padding: 80px 0;
        }
        .about-content {
            max-width: 600px;
            margin: 0 auto;
        }
        .social-links a {
            display: inline-block;
            margin-right: 10px;
            color: #007bff;
        }
        .social-links a:hover {
            text-decoration: none;
        }
        .body-bg{
          width: 100%;
        }
        #home{
          background:url('bg.jpg');
          background-size:cover;
          
          width:100%;
          height: 850px;
          color:white;
          border-radius:0px;
          margin-top:0px;
          
        }
        .body-des{
          font-size:20px;
          font-weight:bold;
          
        }
       #maintext{
        font-weight:bold;
        
       }
    </style>
  </head>

  <body>
    <ul class="nav justify-content-center sticky-top" id="navbar">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#gallery">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#skills">Skills/Experience</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact Us</a>
      </li>
    </ul>
    <div class="container-fluid" id="home">
      <center>
        <h1 class="display-1" id="maintext"><?php include 'connect.php';
          $query = "SELECT title, description FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['title'];
            }
          } 
              ?></h1>
              <br>
      </center>
      <p class="body-des">
      <?php include 'connect.php';
          $query = "SELECT title, description FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['description'];
            }
          } 
              ?>
              
         </p>
         <!--
      <h2>Why Choose Us?</h2>
      <ul>
          <li><strong>Expertise and Creativity:</strong> Our photographers are not only skilled but also bring a creative touch to every project, ensuring your photos are unique and memorable.</li>
          <li><strong>High-Quality Images:</strong> We use state-of-the-art equipment to deliver high-resolution images that stand out.</li>
          <li><strong>Personalized Service:</strong> We understand that every client is different, so we tailor our services to meet your specific needs and preferences.</li>
          <li><strong>Professional Editing:</strong> Our team also includes expert editors who enhance your photos to perfection, ensuring every detail is just right.</li>
      </ul>
      <h2>Our Services</h2>
      <ul>
          <li><strong>Wedding Photography:</strong> Capturing the magic and emotions of your special day.</li>
          <li><strong>Event Photography:</strong> From corporate events to private parties, we cover it all.</li>
          <li><strong>Portrait Photography:</strong> Personal, family, and professional portraits that reflect your personality.</li>
          <li><strong>Commercial Photography:</strong> High-quality images that enhance your brand and business.</li>
      </ul>
      <h2>Our Mission</h2>
      <p>
          Our mission is to create timeless images that you will cherish forever. We strive to provide an exceptional photography experience, from the initial consultation to the final delivery of your photos. Whether you're looking to capture a special occasion or need professional images for your business, Pixels Photography is here to bring your vision to life.
      </p>
      <h2>Let's Connect</h2>
      <p>
          We invite you to explore our portfolio and see the world through our lens. If you like what you see and want to learn more about how we can help you, please don't hesitate to get in touch with us.
      </p>
      <p>
          Thank you for considering Pixels Photography. We look forward to working with you and creating stunning images that you'll treasure for years to come.
      </p> -->
      </p>
    </div>

    

    <div id="gallery">
  <div class="container-fluid" id="gallery-adjust">
    <center>
      <h1 class="display-1">Gallery</h1>
    </center>
    <br />
    <div class="row">
      <?php
        include 'connect.php';
        $query = "SELECT img_name FROM images";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-3">';
            echo '<div class="gallery-item">';
            echo '<img src="images/' . $row['img_name'] . '" class="gallery-image" alt="Gallery Image">';
            echo '</div>';
            echo '</div>';
           
          }
        } else {
          echo '<p>No images found in the database.</p>';
        }
      ?>
    </div>
  </div>
</div>


        

    <div class="container-fluid" id="skills">
      <center>
        <h1 class="display-4">Our Skills and Experience</h1>
      </center>
      <br>
      <br>

     
      
      <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php
        include 'connect.php';
        $query = "SELECT title,description,image FROM skill";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          
          while ($row = mysqli_fetch_assoc($result)) {
            echo ' <div class="col">';
            echo '<div class="card">';
            echo '<img src="skill_image/' . $row['image'] . '" class="card-img-top" >';
            echo'<div class="card-body">';
            echo'<h5 class="card-title">'. $row['title'] . '</h5>';
            echo'<p class="card-text">' . $row['description'] . '</p>';
            echo'</div>';
            echo '</div>';
            echo '</div>';
           
          }
        } else {
          echo '<p>No data found in the database.</p>';
        }
      ?>
  
</div>
      
    </div>

    <div class="container" id="contact">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <center>
            <h2>Contact Us</h2>
          </center>
          <br />
          <form method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter your name"
                name="name"
              />
            </div>
            <div class="form-group">
              <label for="contact">Contact</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter your contact details"
                name="contact"
              />
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea
                class="form-control"
                id="message"
                rows="5"
                placeholder="Enter your message"
                name="message"
              ></textarea>
            </div>
            <br />
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto about-content text-center">
                
                <p>Contact us for your photography needs:</p>
                <ul class="list-unstyled">
                    <li><strong>Phone:</strong> 980000000</li>
                    <li><strong>Email:</strong> pixels@gmail.com</li>
                    <li><strong>Address:</strong> butwal,Nepal</li>
                </ul>
                <!-- Social Links -->
                <div class="social-links">
                    <a href="#" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram-square fa-2x"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
                    <!-- Add more social links as needed -->
                </div>
            </div>
        </div>
    </div>
</section>
    <br>
    <br>
    <footer class="footer">
    <div class="container text-center">
      <br>
      
        <span class="text-muted">© 2024 Pixels Photography. All rights reserved.</span>
    </div>
</footer>
  </body>
</html>
<?php
include 'connect.php';
if (isset($_POST['contact'])) {
    $name = ($_POST['name']);
    $contact = ($_POST['contact']);
    $message = ($_POST['message']);
    $contact_query = "insert into contact (name,contact,message) values ('$name','$contact','$message')";
    $contact_update = mysqli_query($conn, $contact_query);
    if($contact_update)
    {
        echo "<script>alert('Message sent successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed to Message');</script>";
    }
  }
?>