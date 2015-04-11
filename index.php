<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>gcc_inv</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico">
   
    <link rel="stylesheet" href="css/bootstrap.css" />

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="pages/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="pages/scripts/jquery-1.11.1.min.js"></script>
   
    <script type="text/javascript" src="pages/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="pages/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="pages/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="pages/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="pages/jqwidgets/jqxlistbox.js"></script>
  <script type="text/javascript" src="pages/jqwidgets/jqxdropdownlist.js"></script> 
   <script type="text/javascript" src="pages/jqwidgets/jqxnotification.js"></script>
    <script type="text/javascript" src="pages/scripts/demos.js"></script> 
<script type="text/javascript">
        $(document).ready(function () {  

       var source =
        {
            datatype: "json",
            datafields: [
            { name: 'username'}
            ],
            url: 'pages/php/dropdownlistdata.php',
            async: false
        };
        var dataAdapter = new $.jqx.dataAdapter(source);
        
        $("#dropdownlist").jqxDropDownList(
        {
            source: dataAdapter,
            filterable: true,
            width: 250,
            height: 25,
            selectedIndex: 0,
            placeHolder: "please select",
            displayMember: 'username',
            valueMember: 'username',

            selectionRenderer: function (element, index, label, value) {
                    var text = label.replace(/<br>/g, " ");

   return "<span style='left: 4px; top: 6px; position: relative;'>USER-->"+text+"</span>";
            }
        });  
 });

</script>


  </head>
  <body>   


    <div class="container">
      <div class="header">
        <h3 class="text-muted">GC&amp;C</h3>
      </div>
        

      <form class="form" id="form"  method="post" action="pages/php/login.php" style="font-size: 13px; font-family: Verdana; width: 650px;">
     <div name="list" id="dropdownlist">
    </div>
     <div>
    <input type="password" id="password" name="password" class="form-control"/>
         <input style="margin-top: 10px;" type="submit" value="Submit" id="sendButton" />
    </div>
   </form>

      <div class="footer">
        <p><span class="glyphicon glyphicon-heart"></span></p>
      </div>

    </div>


    <!-- build:js(.) scripts/vendor.js -->
    <!-- bower:js -->
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <!-- endbower -->
    <!-- endbuild -->

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

       



        <script src="scripts/main.js"></script>
     
 <script type="text/javascript">
        $(document).ready(function () {
          //error message
          $("#messageNotification").jqxNotification({
                width: 250, position: "top-right", opacity: 0.9,
                autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "error"
            });
       
         $("#messageNotification").jqxNotification("open");
                
            
        });


    </script>
<?php 
error_reporting(0); 
session_start();

$b=$_GET['id'];
if ($b=="username or password is incorrect")  {
 echo  '<div id="messageNotification"> <div>   Sign in Failed.  </div>  </div>';
}

      ?>
</body>
</html>
