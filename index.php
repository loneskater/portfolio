
<?php
define("EMAIL", "syrilbobadilla_08@yahoo.com");
 
if(isset($_POST['submit'])) {
 
  include('validate.class.php');
  
  //assign post data to variables
  $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
 
  //start validating our form
  $v = new validate();
  $v->validateStr($name, "name", 3, 75);
  $v->validateEmail($email, "email");
  $v->validateStr($message, "message", 5, 1000);  
 
  if(!$v->hasErrors()) {
        $header = "From: $email\n" . "Reply-To: $email\n";
        $subject = "Contact Form Subject";
        $email_to = EMAIL;
 
        $emailMessage = "Name: " . $name . "\n";
        $emailMessage .= "Email: " . $email . "\n\n";
        $emailMessage .= $message;
 
    //use php's mail function to send the email
        @mail($email_to, $subject ,$emailMessage ,$header );  
 
    //grab the current url, append ?sent=yes to it and then redirect to that url
        $url = "http". ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        header('Location: '.$url."?sent=yes");
 
    } else {
    //set the number of errors message
    $message_text = $v->errorNumMessage();       
 
    //store the errors list in a variable
    $errors = $v->displayErrors();
 
    //get the individual error messages
    $nameErr = $v->getError("name");
    $emailErr = $v->getError("email");
    $messageErr = $v->getError("message");
  }//end error check
}// end isset
?>
<html lang="en">

<head>
  <title>Syril Bobadilla | Web & Graphic Designer</title>
  <meta name="" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/style.css" rel="stylesheet" media="screen">
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.src.js"></script>
  <![endif]-->
</head>
<body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#blog">Blog</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="visible-md visible-lg"><a id="toTop" href="#home">Go to Top</a></div>

  <section id="home" class="clearfix text-center">
    <div class="container">
      <img src="images/hello-there.gif" class="img-responsive center">
      <div id="title2"><p>Web & Graphic Designer</p></div>
    </div>
  </section>

  <div class="container text-center">
      <div id="pencil2" class="visible-md visible-lg">
        <div id="arrow-down"><a href="#about"></a></div>
        <img src="images/pencil-2x.jpg">
      </div>
      <div id="pencil" class="visible-xs visible-sm">
        <img src="images/pencil.jpg" class="img-responsive center">
      </div>
  </div>

  <section id="about" class="clearfix text-center">
    <div class="container">
    <div id="pencil-top">
      <img src="images/pencil-top.jpg" class="visible-md visible-lg center">
    </div>
      <div id="intro">
        <div id="title"><h1>About Me</h1></div>
        <p class="lead">I'm Syril Bobadilla, a web & graphic designer based in Manila, Philippines. I focus in building creative and professional websites so feel free to contact me for solutions.</p>
      </div>
      <div id="focus">
        <div id="title2"><h4>Focus</h4></div>
        <div class="col-sm-6 col-md-3">
          <img src="images/icon-web.jpg">
          <h4>Web Design & Development</h4>
          <p>I design and develop websites. I'm no hardcore developer but I try to keep up with the latest trends especially with RWD (Responsive Web Design).</p></div>
        <div class="col-sm-6 col-md-3">
          <img src="images/icon-graphic.jpg">
          <h4>Graphic / Illustration</h4>
          <p>I love graphic design, and I'm obsessed with making everything look pretty. Let's bring out the beauty in simple things.</p>
        </div>
        <div class="col-sm-6 col-md-3">
          <img src="images/icon-type.jpg">
          <h4>Typography</h4>
          <p>Who doesn't love type? Words alone aren't enough for me. If you have something say, say it with style - and there goes typography.</p>
        </div>
        <div class="col-sm-6 col-md-3">
          <img src="images/icon-identity.jpg">
          <h4>Branding / Identity</h4>
          <p>Everyone else's identity is taken so better have your own. I can help you create an identity that is yours and yours alone.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="container text-center">
      <div id="pencil2" class="visible-md visible-lg">
        <div id="arrow-down"><a href="#portfolio"></a></div>
        <img src="images/pencil-2x.jpg">
      </div>
      <div id="pencil" class="visible-xs visible-sm">
        <img src="images/pencil.jpg" class="img-responsive center">
      </div>
  </div>

  <section id="portfolio" class="text-center">
    <div class="container">
    <div id="pencil-top">
      <img src="images/pencil-top.jpg" class="visible-md visible-lg center">
    </div>
      <div id="title" class="text-center"><h1>Portfolio</h1></div>
      
      <div class="controls">  
        <ul class="list-unstyled list-inline">
          <li class="filter" data-filter="all">All</li>
          <li class="filter" data-filter="graphic">Graphic</li>
          <li class="filter" data-filter="web">Web</li>
          <li class="filter" data-filter="typography">Typography</li>
          <li class="filter" data-filter="identity">Identity</li>
        </ul>
      </div>

    <div id="Grid" class="text-center">
        <div class="view view-blur mix graphic">
          <img src="images/s-ultrabook.jpg" class="img-responsive"/>
            <div class="mask">
              <a class="fancybox" href="images/b-ultrabook.jpg" title="Ultrabook"><h2>Ultrabook</h2></a>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/s-happy-easter.jpg" class="img-responsive"/>
            <div class="mask">
              <a class="fancybox" href="images/b-happy-easter.jpg" title="Happy Easter!"><h2>Happy Easter!</h2></a>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/s-mickey-skater.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Mickey Skater</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a class="fancybox info" href="images/b-mickey-skater.jpg" title="Mickey Skater">View</a>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/chikoy.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Chickoy</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/minion.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>One in a Minion</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix graphic typography">
          <img src="images/crunchbot.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Crunchbot</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/riz-wedding.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Budz & Riz Wedding</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix typography">
          <img src="images/spread-love.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Spread Love </h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix typography">
          <img src="images/gadgets.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Great Gadgets</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/paperboat.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Hover Style #10</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/cut-the-silence.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Cut the Silence</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>
        <div class="view view-blur mix graphic">
          <img src="images/interstitial.jpg" class="img-responsive"/>
            <div class="mask">
              <h2>Hover Style #10</h2>
                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                <a href="#" class="info">View</a>
            </div>
        </div>

        <div class="gap"></div>
        <div class="gap"></div>
        <div class="gap"></div>
        <div class="gap"></div>
        <div class="gap"></div>    
    </div>
    </div>
  </section>

  <div class="container text-center">
      <div id="pencil2" class="visible-md visible-lg">
        <div id="arrow-down"><a href="#contact"></a></div>
        <img src="images/pencil-2x.jpg">
      </div>
      <div id="pencil" class="visible-xs visible-sm">
        <img src="images/pencil.jpg" class="img-responsive center">
      </div>
  </div>

  <section id="contact">
    <div class="container">
    <div id="pencil-top">
      <img src="images/pencil-top.jpg" class="visible-md visible-lg center">
    </div>
    <div id="title" class="text-center">
      <h1>Contact</h1>
    </div>
      <p class="lead text-center">Have a project in mind?</br> Let's talk or just say "Hi!"</p>

    <div id="contact-form" class="center">
    <span class="message"><?php echo $message_text; ?></span>
    <?php echo $errors; ?>
    <?php if(isset($_GET['sent'])): ?><h2>Your message has been sent :)</h2><?php endif; ?>
      <form action="<?php echo $PHP_SELF; ?>#contact" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo htmlentities($name); ?>">
          <span class="errors"><?php echo $nameErr ?></span>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo htmlentities($email); ?>">
          <span id="errorEmail" class="formError"></span>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" rows="3" name="email" id="message" placeholder="Say Hi!"><?php echo htmlentities($message); ?></textarea>
          <span class="errors"><?php echo $messageErr ?></span>
        </div>
        <button type="submit" class="btn btn-default" id="submit">Submit</button>
      </form>
    </div>
  </div>
</section>


  <footer><p class="text-center"><strong>Email:</strong> lynnsyril@gmail.com</br>
      <strong>Mobile:</strong> +639 234 537 78</p>
  </footer>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
  <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
  <script type="text/javascript" src="http://flesler-plugins.googlecode.com/files/jquery.localscroll-1.2.7-min.js"></script>

  <script type="text/javascript" src="js/scripts.js"></script>

</body>
</html>