<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= $description ?>" />
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:site_name" content="Orthodox Icon Shop - Online Orthodox Store">
    <meta property="og:locale" content="en_US">
    <meta property="og:article:author" content="http://orthodoxiconshop.com">
    <meta property="og:url" content="<?= $url ?>">
    <meta property="og:image" content="<?= $image ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="<?= $url ?>">
    <meta name="twitter:title" content="<?= $title ?>">
    <meta name="twitter:description" content="<?= $description ?>">
    <meta name="twitter:image" content="<?= $image ?>">
    <meta name="twitter:site" content="@ortho_icons">
    <meta name="twitter:creator" content="@ortho_icons">
    <?php if(@$prices): ?>
        <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "Product",
              "image": "<?= $image ?>",
              "name": "<?= substr($title, 41) ?>",
              "description":"<?= $description ?>",
              "offers": {
                "@type": "AggregateOffer",
                "highPrice": "<?= $prices[count($prices) - 1]['price'] ?>",
                "lowPrice": "<?= $prices[0]['price'] ?>",
                "priceCurrency": "USD",
                "offerCount": "<?= count($prices) ?>",
                "offers": [
                  <?php foreach ($prices as $price): ?>
                    {
                    "@type": "Offer",
                    "url": "<?= $url ?>",
                    "price": "<?= $price['price'] ?>",
                    "priceCurrency": "USD"
                  },
                  <?php endforeach ?>
                  {
                    "@type": "Offer",
                    "url": "<?= $url ?>"
                  }
                ]
              }
             }
        </script>
    <?php else: ?>
        <script type="application/ld+json">
          {
            "@context" : "http://schema.org",
            "@type" : "Organization",
            "url" : "<?= $url ?>",
            "name": "<?= $title ?>",
            "email": "tomadackovic(at)gmail.com",
            "logo": "http://orthodoxiconshop.com/images/favicon.ico",
            "description": "<?= $description ?>",
            "image": "<?= $image ?>"

         }
        </script>
    <?php endif ?>


  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="html/templates/css/style.css">
<link rel="stylesheet" href="html/templates/css/animate.css">

</head>
<body>
<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand"> <b>Orthodox Icon Shop </b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="col-md-5">
      <ul class="nav navbar-nav nav-pills col-md-12">
        <li class="col-md-4">
             <a href="index.php?shop=online-orthodox-store" class="btn btn-link btn-group btn-lg"><span class="glyphicon-list-alt glyphicon"></span>  Go to Shop</a>
        </li>
        <li class="col-md-3">
          <a href="index.php?about=about-us" class="btn btn-link btn-group btn-lg"><span class="glyphicon-user glyphicon"></span>  About</a>
          </li>
        <li class="col-md-3">
            <a href="index.php?contact=contact-us" class="btn btn-link btn-group btn-lg "><span class="glyphicon-envelope glyphicon"></span>  Contact</a>
          </form>
        </li>
      </ul>
      </div>
      <div class="col-md-5 navbar-right">
      <ul class="nav navbar-nav navbar-right col-md-12">
        <?php if(@$_SESSION['auth'] == 'off'): ?>
        <li class="col-md-offset-4 col-md-6">
          <form method="get" action="index.php">
            <button name="log_in" type="submit" value="log-In-or-sign-up" class="btn btn-link btn-group btn-lg text-center"><span class="glyphicon-log-in glyphicon"></span>  Log In / Sign Up</button>
          </form>
        </li>
        <?php elseif(@$_SESSION['auth'] == 'on'): ?>
        <li class="col-md-5">
          <form method="get" action="index.php">
            <button name="shopping_list" type="submit" value="Shopping+List" class="btn btn-link btn-group btn-lg text-center"><span class="glyphicon-list glyphicon"></span>  Shopping List</button>
          </form>
        </li>
        <li class="col-md-5">
          <form method="post" action="index.php">
            <button name="logout" type="submit" value="Log Out" class="btn btn-link btn-group btn-lg text-center"><span class="glyphicon-log-out glyphicon"></span>  Log Out</button>
          </form>
        </li>
      <?php endif ?>
      </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

