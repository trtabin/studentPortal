<!DOCTYPE html>
<!--
Template Name: Xanpon
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>EEE</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{ asset('layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
 
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url({{ asset('/images/background.jpg') }});"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left"> 
        <!-- ################################################################################################ -->
        <h1 class="logoname"><a href="/">NSTU <span>EEE</span></a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li><a href="/">Home</a></li>
          <li><a href="/thesisTopic">Thesis Topic</a></li>
          <li><a href="/questionBank">Question Bank</a></li>
          <li><a class="drop" >Course Material</a>
            <ul>
              <li><a href="{{ asset('/courseMaterial/1/1') }}">Year 1 Term 1</a></li>
              <li><a href="/courseMaterial/1/2">Year 1 Term 2</a></li>
              <li><a href="/courseMaterial/2/1">Year 2 Term 1</a></li>
              <li><a href="/courseMaterial/2/2">Year 2 Term 2</a></li>
              <li><a href="/courseMaterial/3/1">Year 3 Term 1</a></li>
              <li><a href="/courseMaterial/3/2">Year 3 Term 2</a></li>
              <li><a href="/courseMaterial/4/1">Year 4 Term 1</a></li>
              <li><a href="/courseMaterial/4/2">Year 4 Term 2</a></li>
            </ul>
          </li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
    
  @yield('home')
  <!-- ################################################################################################ -->
</div>
@yield('main')
<!-- <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a> -->

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2021 | All Rights Reserved | <a href="#">NSTU EEE</a></p>
    <p class="fl_right">Developed By <a target="_blank" href="/" title="">Tahmidur Rahman Tabin</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>