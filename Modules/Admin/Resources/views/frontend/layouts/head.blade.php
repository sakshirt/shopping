<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@if(!empty($data->title)){{ 'Demo' }}@else {{ $data->title }}@endif</title>
  <link rel="icon" href="{{ getPublicFiles('img/icon.png')}}" type="image/gif" sizes="16x16">
  <link href="{{ getPublicFiles('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="{{ getPublicFiles('frontend/css/shop.css')}}" type="text/css" media="screen" property="" />
    
  <link href="{{ getPublicFiles('frontend/css/style7.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ getPublicFiles('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
  <!-- font-awesome-icons -->
  <link href="{{ getPublicFiles('frontend/css/font-awesome.css')}}" rel="stylesheet">
  <!-- //font-awesome-icons -->
  <link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
      rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

  @yield('page_specific_css')
</head>