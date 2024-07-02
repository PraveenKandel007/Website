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
        <h1 class="display-1"><?php
          include 'connect.php';
          $query = "SELECT title, description FROM about_us";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['title'];
            }
          } 
        ?></h1>
      </center>
      <p>
      <?php
          include 'connect.php';
          $query = "SELECT title, description FROM about_us";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['description'];
            }
          } 
        ?>
        <!-- </p>
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
            echo '<div class="col-md-4">';
            echo '<div class="gallery-item">';
            echo '<img src="images/' . $row['img_name'] . '" class="gallery-image" alt="Gallery Image">';
            echo '</div>';
            echo '</div>';
            $count++;
            // Start a new row after every 3 images
            if ($count % 3 == 0) {
              echo '</div><div class="row">';
            }
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
      <div class="row">
        <div class="col-md-6">
          <div class="skill-card">
            <center>
              <h3>Photography Skills</h3>
              <p>
                <br>
                I have been working as a professional photographer for over 4
                years. I specialize in wedding, event, portrait, and commercial
                photography. My goal is to capture the beauty and emotions of
                every moment, creating images that tell a story and evoke a
                feeling. I use state-of-the-art equipment and editing techniques
                to deliver high-quality images that exceed your expectations.
              </p>
            </center>
          </div>
        </div>
        <div class="col-md-6">
          <div class="skill-card">
            <center>
              <h3>Videography Skills</h3>
              <p>
                <br>
                I have a passion for videography and storytelling. I am skilled
                in shooting and editing videos for various projects, including
                weddings, events, and promotional content. I use cinematic
                techniques and creative editing to bring your vision to life on
                screen.  I can help you create compelling
                visual content that engages your audience.
              </p>
            </center>
          </div>
        </div>
        <div class="col-md-6">
          <div class="skill-card">
            <center>
              <h3>Editing Skills</h3>
              <p>
                <br>
                I have extensive experience in photo and video editing using
                industry-standard software. I pay attention to detail and strive
                for perfection in every project. Whether it's color correction,
                retouching, or special effects, I can enhance your images and
                videos to make them stand out. I work closely with my clients to
                understand their vision and deliver results that exceed their
                expectations.
              </p>
            </center>
          </div>
        </div>
        <div class="col-md-6">
          <div class="skill-card">
            <center>
              <h3>4 Years Experience</h3>
              <br>
              <p>
                 I have covered a wide range of events and projects, from
                weddings and corporate events to portraits and commercial
                shoots. My experience has honed my skills and creativity,
                allowing me to deliver exceptional results for my clients. I am
                dedicated to capturing the moments that matter most to you and
                creating images that you will cherish for a lifetime.
              </p>
            </center>
          </div>
        </div>
      </div>
    </div>

    <div class="container" id="contact">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <center>
            <h2>Contact Us</h2>
          </center>
          <br />
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter your name"
              />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter your email"
              />
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea
                class="form-control"
                id="message"
                rows="5"
                placeholder="Enter your message"
              ></textarea>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
