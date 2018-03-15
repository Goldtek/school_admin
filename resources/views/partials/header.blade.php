
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>@yield('title')</title>
<link rel="icon" href={{URL::to("images/favicon.ico")}} type="image/x-icon">

<!-- BOOTSTRAPE STYLESHEET CSS FILES -->
<link rel="stylesheet" href= {{URL::to("css/bootstrap.min.css")}}>

<!-- JQUERY SELECT -->
<link href= {{URL::to("css/select2.min.css")}} rel="stylesheet" />

<!-- JQUERY MENU -->
<link rel="stylesheet" href={{URL::to("css/mega_menu.min.css")}}>
    
    
    @yield('head')

<!-- ANIMATION -->
<link rel="stylesheet" href= {{URL::to("css/animate.min.css")}}>

<!-- OWl  CAROUSEL-->
<link rel="stylesheet" href={{URL::to("css/owl.carousel.css")}}>
<link rel="stylesheet" href={{URL::to("css/owl.style.css")}}>

<!-- TEMPLATE CORE CSS -->
<link rel="stylesheet" href= {{URL::to("css/style.css")}}>
    
    
<link rel="stylesheet" href= {{URL::to("css/bootstrap-datetimepicker.min.css")}}>

<!-- FONT AWESOME -->
<link rel="stylesheet" type="text/css" href= {{URL::to("css/font-awesome.min.css")}}>
<link rel="stylesheet" href= {{URL::to("css/et-line-fonts.css")}} type="text/css">

<!-- Google Fonts -->
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<!-- JavaScripts -->
<script src= {{URL::to("js/modernizr.js")}}></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>