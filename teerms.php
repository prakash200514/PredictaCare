<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114312764-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date()); 

  gtag('config', 'UA-114312764-1');
</script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

  <meta name="author" content="Disease Prediction System ">

  <title>Disease Prediction System </title>
 

  <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
  <link href="css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
    <link rel="stylesheet" href="css/all.min.css" media="screen" >
    <link rel="stylesheet" href="css/dashboard.css"> <!-- New Dashboard CSS -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="css/main.css" media="screen" >
    <script src="js/modernizr/modernizr.min.js"></script>

      

<!-- Facebook Pixel Code --> 
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '221517861789129');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=221517861789129&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


</head>

<body class="teerms-body">

<?php include('link/user-topber.php'); ?> 

<div class="dashboard-container">
    
    <!-- Sidebar -->
    <?php include('link/user-leftbar.php');?>  

    <!-- Main Content -->
    <div class="main-content-wrapper">
        <div class="dashboard-card glass-effect">
            <div id="organswrapper">
                <div id="frt_base">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1390 1370" xml:space="preserve">
                        <image overflow="visible" width="750" height="1370" xlink:href="images/male.png"></image>
                        <a href="head-symptoms1.php"><path id="frt_1" d="M418.334,70C416.668,38,382,19,363,19c-30.833,0-50.167,31.5-53.167,44.5c-1.915,8.295-2.833,23.5-2.5,28.167s1,12.333,0.667,16.167c2.04,7.695,6.667,23,6.667,33c0.667,5.167,1.167,12.5,3.333,18.833c3,4,22.5,23.333,44.167,23.333s36.5-8.667,45.708-23c2.625-5.625,5-15.25,4.75-18.625c-0.708-5.125,4.708-28.042,5.709-32.708C419.001,101.334,420,102,418.334,70z"/></a>
                        <a href="eye-symptoms1.php"><path id="frt_2" d="M340.5,102.25c8.561,0,14.5-4.197,14.5-9.375s-5.939-9.375-14.5-9.375S325,87.697,325,92.875S331.939,102.25,340.5,102.25z"/></a>
                        <a href="eye-symptoms1.php"><path id="frt_3" d="M388.5,102.25c8.561,0,15.5-4.197,15.5-9.375s-6.939-9.375-15.5-9.375S374,87.697,374,92.875S379.939,102.25,388.5,102.25z"/></a>
                        <a href="ear-symptoms1.php"><path id="frt_4" d="M299.833,106c-4,4-1.833,17-0.833,20.667s5.833,14.667,7.167,15.833s5.167,4.833,8.5-1.667c0-10-4.627-25.305-6.667-33C307,106,303.833,102,299.833,106z"/></a>
                        <a href="ear-symptoms1.php"><path id="frt_5" d="M412.625,141.375c3.75,6.375,8.875,3.25,10-1.75s7.625-7.875,6.75-23.625s-8.041-11.667-11.041-7.333C417.333,113.333,411.917,136.25,412.625,141.375z"/></a>
                        <a href="nose-symptoms1.php"><path id="frt_6" d="M355.375,105.25c-0.375,3.125-5,6.375-5.625,13.125c-0.438,4.731,6.25,7.5,10.25,6.5c5,2.625,6.75,0.625,9.875-0.625c5.75,0.875,8-3.25,8-7.75s-4.375-6.75-4.875-12.25s-3.375-7.625-3.125-13.5s-2.375-9.875-6.086-9.875c-5.21,0-6.289,7.875-5.914,10.625S355.75,102.125,355.375,105.25z"/></a>
                        <a href="mouth-symptoms1.php"><path id="frt_7" d="M374.25,133.25c-2.256-2.723-6.231-1.652-7.875-0.75c-0.882,0.484-3.5,0.875-5.125-0.375s-6.125-0.125-7.375,1.625s-11.75,5.125-12.625,8.125s8.625,3.25,11,4.125s4.5,3.75,13.125,3.75s10.966-2.787,13.25-3.25s8.125-1.125,8.5-3.5S377.875,137.625,374.25,133.25z"/></a>
                        <a href="chest-symptoms1.php"><path id="frt_9" d="M486.5,295c-2.018-20.749-37.75-48.25-48.562-51.137c-4.605,0.447-9.488,0.376-14.438-0.363c-12.805-1.911-47-1.667-50.833,4.333s-15.5,5.833-19.667,0s-29.667-4.5-45.333-3.667c-5.294,0.281-10.873-0.674-16.059-2.159c-8.004,3.48-46.033,26.426-52.127,58.308c-0.459,2.402-0.744,4.852-0.814,7.351c-1,35.667,0.003,72.11-0.165,85.722c0.383-0.096,9.666,25.111,12.166,30.778S255.75,442,259.25,448.75C267.5,456.5,306,474,332.5,467s36.5-6.244,65,0.128s52.668-2.794,73.084-27.211c1.25-3.25,4.75-11.75,5.333-15s2.667-6.999,4.084-9.749s7.455-21.675,8.005-21.176C488.678,380.65,487.667,307.001,486.5,295z"/></a>
                        <a href="abdomen-symptoms1.php"><path id="frt_10" d="M397.5,467.128C369,460.756,359,460,332.5,467s-65-10.5-73.25-18.25c3.5,6.75,2,12,3.75,17.75s5,21.334,0.5,41.501s-1.667,35.666-0.5,40.166c0.785,3.029,2.326,5.001,1.419,8.813C276,568.5,294.834,591.5,364.917,591.5s86.417-20.498,98.75-33.499c-1.666-4.5-0.501-12,2.499-21.167s-3.499-44.667-3.833-52.833s2.501-21.5,2.751-27.584s4.25-13.25,5.5-16.5C450.168,464.334,426,473.5,397.5,467.128z"/></a>
                        <a href="knee-symptoms1.php"><path id="frt_27" d="M242.139,883.927c1.212,2.56,2.353,4.901,3.361,7.073c6.5,14,6,37.5,6.5,61c0.078,3.657,0.262,7.679,0.348,11.921c10.591,44.449,51.024,21.223,68.904,3.938c0.325-1.35,0.929-2.658,1.373-3.483c0.875-1.625,2.125-10.625,3.375-16.625s2-18.5,4-26.75c0.175-0.721,0.386-1.643,0.623-2.715C295.938,940.693,277.793,897.127,242.139,883.927z"/></a>
                        <g id="bck_spots"></g>
                    </svg>
                </div>
            </div>
            <div class="clear"></div>
        </div> <!-- End dashboard-card -->
    </div> <!-- End main-content-wrapper -->
</div> <!-- End dashboard-container -->

  <div class="scroll-top"><span class="scroll-top-icon"></span></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/jquery/jquery-2.2.4.js"></script>
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>
  
  <!--scroll-top script-->
<script>
  $(function(){$(document).on( 'scroll', function(){ if ($(window).scrollTop() > 600) {$('.scroll-top').addClass('show');} else {$('.scroll-top').removeClass('show');}});$('.scroll-top').on('click', scrollToTop);});function scrollToTop() {verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;element = $('body');offset = element.offset();offsetTop = offset.top;$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');}
</script>
<script>
    $(function($) {
        $(".js-states").select2();
        $(".js-states-limit").select2({
            maximumSelectionLength: 2
        });
        $(".js-states-hide").select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>
</body>
</html>
<?php } ?>