<?php
include ('head2.html');
?>

<body>


    <div class="container-fluid" id="main">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="index.html">Kent Outreach</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="container text-center">
                <div id ="out-of-hour" >
                    <h1>Sorry WE ARE CLOSED !</h1><br>
                </div>

              <h3 id = "body-text">We are either out of Business hours, or
                The fund is no longer available <br>Please Try again later !<br>
                <br> You can also try "Other Resources" below. </h3><br>
              <h4></h4>
            </div>
        </div><br>


        <!--Footer-->
        <div id = "footer" class="container-fluid text-center text-white ">
          <div class="footer">
            <div class="row">

              <!-- Hours of Operations -->
              <div class="col-sm-4"><br>
                <h3 class="hours" >Hours and Location</h3><br>
                <p>Monday:1:00 pm to 4:00 pm<br>
                    Tuesday:9 a.m. to 12:00 noon<br>
                    Wednesday:1:00 pm to 4:00 pm</p>
                <p>Location: <a href="https://goo.gl/maps/W2H8mMH2n6MrQ38n8">24447 94thAve.S Kent,WA98030</a></p>
              </div>

              <div class="col-sm-4"><br>
                <h3>Other Resources</h3>
                <ul>
                  <h5> <a  href="https://www.211.org"> 211   </a><br>
                    <a href="http://Kentmethodist.com/assistance">Kentmethodist</a></h5>
                </ul>
              </div>

              <!-- Google Map -->
              <div class="col-sm-4"><br>
                  <h3>Google Map</h3>
                  <div id="map-container-google-2" class="z-depth-1-half map-container">
                    <iframe  class = "map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.538844396259!2d-122.21858188495025!3d47.38191841146598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54905eaea6606e61%3A0x206815f453c0e48b!2s24447%2094th%20Ave%20S%2C%20Kent%2C%20WA%2098030!5e0!3m2!1sen!2sus!4v1602907487195!5m2!1sen!2sus"  ></iframe>
                  </div>
              </div>

            </div><br>
          </div>
        </div>
    </div>
<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</body>
</html>
