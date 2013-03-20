<?php

require_once 'bing.class.php';
require_once 'google.class.php';

if(isset($_GET['search'])) {

   $q = $_GET['search'];

} else { $q = 'MooTools'; }

$appid = '49EB4B94127F7C7836C96DEB3F2CD8A6D12BDB71';

$obj = new Bing($appid);

$obj->search( $q );

$bing = $obj->getHTML();

$obj2 = new Google($appid);

$obj2->search( $q );

$google = $obj2->getHTML();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
   <title>GooBing - Search Google and Bind in one go</title>
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/base/base.css" type="text/css">
   <style type="text/css">
    html,body{color:#fff;background:#222;font-family:calibri,verdana,arial,sans-serif;}
    h1{font-size:300%;margin:0;text-align:right;color:#3c3}
    h2{background:#369;padding:5px;color:#fff;font-weight:bold;-moz-box-shadow: 0px 4px 2px -2px #000;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow: #000 1px 1px;}
    h3 a{color:#69c;text-decoration:none;}
    h3{margin:0 0 .2em 0}
    .info{font-size:200%;color:#999;margin:1em 0;}
    input[type=text]{-moz-border-radius:5px;-webkit-border-radius:5px;border:1px solid #fff;padding:3px;}
    input[type=submit]{-moz-border-radius:5px;-webkit-border-radius:5px;border:2px solid #3c3;background:#3c3}
    form{font-size:150%;margin-top:-1.8em;}
    ul,ul li{margin:0;padding:0;list-style:none;}
    #google p span, #bing p span{display:block;text-align: left;margin-top:.5em;font-size:90%;color:#999;}
    #yahoo a{color:#c6c;}
    #yahoo h2{background:#c6c;}
    #bing a{color:#fc6;}
    #bing h2{background:#fc6;}
    #ft p{color:#666;text-align: left;}
    #ft a{color:#ccc;}
   </style>  
</head>
<body>
<div id="doc2" class="yui-t7">
   <div id="hd" role="banner"><h1>GooBing</h1></div>
   <div id="bd" role="main">
    <form action="" method="get" id="mainform">
          <div>
               <label for="search">Search:</label>
               <input type="text" name="search" id="search" value="<?php if(isset($_GET['search'])) echo$q; ?>"/>
               <input type="submit" value="Go!">
          </div>
    </form>
    <p class="info">GooBing allows you to search Google and Bing in one go</p>
    <div class="yui-gb">
        <div class="yui-u first" id="bing"><?php echo$bing;?></div>
        <div class="yui-u" id="google"><?php echo$google;?></div>
        <div class="yui-u" id="yahoo"></div>
    </div>
    </div>
   <div id="ft" role="contentinfo"><p>Created by @<a href="http://twitter.com/thinkphp">thinkphp</a> using PHP</p></div>
</div>
</body>
</html>

