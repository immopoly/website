<?php

  setlocale(LC_ALL, 'de_DE');
  header("Content-Type: text/html; charset=utf-8");
  
  require_once('inc/config.inc.php');
  require_once('inc/main.inc.php');  

  $page=validateStartParams();
  
  if(isPlain()){
      the_page($page);    
      exit;
  }

  $isFrameless = isFrameless();

?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Immopoly :: Erobere deinen Kiez</title>
    <meta name="description" content="Ein mobiles Makler-Spiel mit Echtdaten von ImmobilienScout24">
    <meta name="author" content="Krautsourcing UG :: Team Immopoly">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }     
    </style>
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

<?php if($isFrameless): ?>
    <link href="css/frameless.css" rel="stylesheet">    
<?php else: ?>
    <?php define('FRAME_MODE',true); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/overrides.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="img/immopoly.png">
    <link rel="apple-touch-icon" href="img/immopoly.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/immopoly.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/immopoly.png">

    <!-- G+-Page-Badge -->
    <link href="https://plus.google.com/115948347977579800149" rel="publisher" />
    <script type="text/javascript">
    window.___gcfg = {lang: 'de'};
    (function() 
    {var po = document.createElement("script");
    po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(po, s);
    })();</script>

<?php endif; //FRAMELESS ?>

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-25033820-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

  </head>
  <body class="<?php echo $page;?>">
  <?php if($isFrameless): ?>
        <!-- Le javascript
        ================================================== -->
        <!-- Placed before the document to have allow extended functions called in the frameless view -->
        <script type="text/javascript" src="js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <?php
        //reduced output for frameless view
        the_page($page);
        
        else: ?>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
           <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">
            Immopoly
          </a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="home">
                <a href="/">
                  <i class="icon-home icon-white"></i>&nbsp;Home
                </a>
              </li>
              <li class="description">
                <a href="description.html">
                  <i class="icon-info-sign icon-white"></i>&nbsp;Beschreibung
                </a>
              </li>
              <li class="screenshots">
                <a href="screenshots.html">
                  <i class="icon-picture icon-white"></i>&nbsp;Screenshots
                </a>
              </li>
              <li class="download">
                <a href="download.html">
                  <i class="icon-download icon-white"></i>&nbsp;Download
                </a>
              </li>
              <li class="livestats">
                <a href="livestats.html">
                  <i class="icon-list-alt icon-white"></i>&nbsp;Live-Statistiken
                </a>
              </li>
              <li class="blog">
                <a href="http://immopoly.blogspot.de">
                  <i class="icon-share-alt icon-white"></i>&nbsp;Blog
                </a>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
          <div style="display: none;">
            <form class="form-inline pull-right">
              <input type="text" class="input-small disabled" disabled placeholder="Benutzername">
              <input type="password" class="input-small disabled" disabled placeholder="Passwort">
              <button type="submit" class="btn-small disabled" disabled>Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="contentholder">
      <!-- CONTENT HERE -->
      <?php the_page($page); ?>
      </div>
      <hr>

      <footer>
        <p>
          &copy; Krautsourcing UG 2011-2012 &bull; Immopoly Team 
          <span style="display:block;" class="pull-right">
            <a href="contact.html">Kontakt</a>
            &nbsp;|&nbsp;
            <a href="imprint.html">Impressum</a>
          </span>
        </p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <?php if ($page == "screenshots"): ?>
      <script type="text/javascript" src="bootstrap/js/bootstrap-transition.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap-carousel.js"></script>
      <script type="text/javascript">
        $('.carousel').carousel();
      </script>
    <?php elseif ($page == "livestats"): ?>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript" src="js/heatmap.js"></script>
      <script type="text/javascript" src="js/interactive.js"></script>
      <script type="text/javascript">
        
        $("#toplist_switcher a").bind('click',function(){
          
          if($(this).attr("data-type")){
            retrievePlainSubpage($(this).attr("data-type"));
          }
          return false;
        });


        //do on start
        $(document).ready(function() {

          $("#toplist_switcher a.topx_balance").trigger('click');
          updateTable("history",0,30);
          initHeatmap();          
        });
      </script>
      <?php endif; ?>

    <!--
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>
    -->
    <script>
      $(document).ready(function(){
        $(".navbar .nav li.<?php echo $page;?>").addClass("active");
      });
    </script>

<?php endif; //FRAMELESS ?>

  </body>
</html>
