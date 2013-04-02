<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>DCMR.nl</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
  <div id="header">
    <div class="fl_left">
      <h1><img src="images/demo/logo.jpg" alt="" width="119" height="113" /></h1>
    </div>
    <div class="fl_right"></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li class="active"><a href="#">home</a></li>
      </ul>
    </div>
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="container">
    <div id="content">

	<ul>


<?php
//Set the page name or ID
$FBid = '132479880266046';

//Get the contents of a Facebook page
$FBpage = file_get_contents('https://graph.facebook.com/' . $FBid . '/feed?access_token=119102168278644|tLZLnIWdm2Q_LarODtjUFdJUH8A&limit=10');

//Interpret data with JSON
$FBdata = json_decode($FBpage);

//Ttime stamp function
function timeSince($original) {
// Array of time period
$chunks = array(
array(60 * 60 * 24 * 365 , 'year'),
array(60 * 60 * 24 * 30 , 'month'),
array(60 * 60 * 24 * 7, 'week'),
array(60 * 60 * 24 , 'day'),
array(60 * 60 , 'hour'),
array(60 , 'minute'),
);

// Current time
$today = time();
$since = $today - $original;

// $j saves performing the count function each time around the loop
for ($i = 0, $j = count($chunks); $i < $j; $i++) {

$seconds = $chunks[$i][0];
$name = $chunks[$i][1];

// finding the biggest chunk (if the chunk fits, break)
if (($count = floor($since / $seconds)) != 0) {
break;
}
}

$print = ($count == 1) ? '1 '.$name : "$count {$name}s";

if ($i + 1 < $j) {
// now getting the second item
$seconds2 = $chunks[$i + 1][0];
$name2 = $chunks[$i + 1][1];

// add second item if it's greater than 0
if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
$print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
}
}
return $print;
}



//Loop through data for each news item
foreach ($FBdata->data as $news )
{
//Explode News and Page ID's into 2 values
$StatusID = explode("_", $news->id);

echo '<div class="news-item">';

//Text/title/description/date
if (!empty($news->story)) { echo '<h3>' . $news->story . '</h3>'; }
if (!empty($news->message)) { echo '<h3>' . $news->message . '</h3>'; }
if (!empty($news->description)) { echo '<p>' . $news->description . '</p>'; }
echo '<p class="date">Posted '. timeSince(strtotime($news->created_time)) . ' ago</p>';

//Check for rich media
if ($news->type == 'link') {
echo '<a href="'.$news->link.'"><img src="'. $news->picture .'" border="0" style="padding-right:10px;" /></a>';

//Display link name and description
if (!empty($news->description)) {
echo '<a href="'.$news->link.'">'. '<b>' . $news->name . '</b></a>';
}
}
else if ($news->type == 'photo') {
echo '<a class="photo" href="'.$news->link.'"><img src="'. $news->picture .'" border="0" /></a>';
}
else if ($news->type == 'swf') {
echo '<a href="http://www.facebook.com/permalink.php?story_fbid='.$StatusID['1'].'&id='.$StatusID['0'].'" target="_blank"><img src="'. $news->picture .'" border="0" /></a>';
}
else if ($news->type == 'video') {
//Show play button over video thumbnail
echo '<a class="vidLink" href="' . $news->source . '"><img class="playBtn" src="images/facebook-playBtn.png" /><img class="poster" src="' . $news->picture . '" alt="' . $news->description . '" /></a>';
}

//Check for likes/comments/share counts
echo '<ul class="meta"><li>Likes: ';

if (empty($news->likes->count)) { echo '0'; }
else { echo $news->likes->count; }

echo '</li><li>Comments: ';

if (empty($news->comments->count)) { echo '0'; }
else { echo $news->comments->count; }

echo '</li><li>Shares: ';

if (empty($news->shares->count)) { echo '0'; }
else { echo $news->shares->count . '<br />'; }

echo '</li></ul>';

if (!empty($news->link)) { echo '<a class="viewpost" href="' . $news->link . '">View this post on Facebook</a>'; }

echo '</div> <!-- end .news-item -->';
}

?>
<div class="likebox"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/<?php echo $FBid ?>" width="200" show_faces="false" stream="false" header="true"></fb:like-box></div>
 </ul>
     
    </div>
    <div id="column">
      
    </div>
    <br class="clear" />
  </div>
  <br class="clear" />
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col7">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2013 - All Rights Reserved - DCMR.nl</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
