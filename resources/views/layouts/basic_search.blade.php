<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#000000">
  <title>Sustainability Connect Catalog</title>

  <link rel="manifest" href="%PUBLIC_URL%/manifest.json">
  <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.png">

  <!--
    Do not use @7 in production, use a complete version like x.x.x, see website for latest version:
    https://community.algolia.com/react-instantsearch/Getting_started.html#load-the-algolia-theme
  -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.24.0/css/patternfly.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.24.0/css/patternfly-additions.min.css">
  <!-- <link rel="stylesheet" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/css/bootstrap-asu.min.css"> -->
  <!-- <link rel="stylesheet" href="https://static.sustainability.asu.edu/asu-theme/asu-header/css/asu-nav.css"> -->
  <!-- <link href="asu_style.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.0.0/themes/algolia.css">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.24.0/js/patternfly.min.js"></script>

  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" defer></script> -->
  <!-- <script type="text/javascript" src="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/js/bootstrap-asu.min.js" defer></script> -->
  <!-- <script type="text/javascript" src="https://static.sustainability.asu.edu/asu-theme/asu-header/js/asu-header.min.js" defer></script> -->
  <!-- <script type="text/javascript" src="https://static.sustainability.asu.edu/asu-theme/asu-header/js/asu-header-config.js" defer></script> -->

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" type="icon" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon.ico" />
  <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/favicon-128.png" sizes="128x128" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="https://static.sustainability.asu.edu/asu-theme/asu-web-standards/img/favicon/mstile-310x310.png" />

  @stack('css')
</head>

<body>
    <div class="content-wrapper">
          @yield('content')
    </div>

    @section('scripts')
    @show

    @section('javascript')
    @show

</body>

</html>
