<?php
session_start();

global $css_paths, $js_paths, $page_title;

if (!empty($js_paths)) {
  $js_paths .= ",/js/account_menu.js";
} else {
  $js_paths = "/js/account_menu.js";
}

$styles_html = '';
if (!empty($css_paths)) {
	$include_css_paths = explode(',', $css_paths);
	if(isset($include_css_paths)){
		foreach($include_css_paths as $inclusion){
			$styles_html .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$inclusion\" media=\"screen\">";
		}
	}
}

?>

<link rel="icon" type="image/png" href="/images/favicon.ico">
<head>
  <title><?=$page_title?></title>
  <!--Require in order of most to least general-->
  <!--Most General to Most Specific-->
  <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="/js/jquery.js"></script>
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/account_menu.css">
  <link rel="stylesheet" href="/css/sticky_footer.css">
	<?php echo $styles_html?>
	<title>Stephen Alan Buckley</title>
	<!DOCTYPE html>
</head>
<body>
  <header class="page-header">
    <div class="container">
      <h1><a href="/">Stephen Alan Buckley</a></h1>
      <h2><?=crazy_subtitle()?></h2>
    </div>
    <div class="account settings" id="account_group">
      <button class="btn btn-primary" id="login_modal_button" data-toggle="modal" data-target="#login_modal">login</button>
      <button class="btn btn-primary" id="register_modal_button" data-toggle="modal" data-target="#register_modal">register</button>
      <button class="btn btn-primary" id="username_button" data-toggle="modal" hidden="true">Dummy</button>
      <button class="btn btn-primary" id="logout_button" data-toggle="modal" hidden="true">Log Out</button>
    </div>
  </header>
<div id="wrap" class="container">

<!-- Modal -->
  <div class="modal fade" id="login_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Logging In</h4>
        </div>
        
        <div class="modal-body">
          <p>Heeeeey! There you are! My main hominem!</p>
          <p>I knew you'd be back. That's why I made this text which is tailored for your return.</p>
          <p>Anyway, enough chitting and chatting, let's get you logged in, huh? Okay champ!</p>
          <input id="login_username_text" name="username" placeholder="username" type="text">
          <input id="login_password_text" name="password" placeholder="password" type="password">
          <p id="login_status"></p>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="login_ajax">Log The Freak In</button>
        </div>
      
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Makin' a New Account, Huh?</h4>
        </div>
        
        <div class="modal-body">
          <p>Making yourself a new account 's pretty friggin' cool. I hope you'll like the stuff on my site because, you know, I made it! I think it's good stuff.</p>
          <p>But there's only one way for you to find out how good you think the stuff is.</p>
          <input id="register_username_text" name="username" placeholder="username" type="text">
          <input id="register_password_text" name="password" placeholder="password" type="password">
          <input id="register_check_text" name="check" placeholder="same password again!" type="password">
          <input id="register_email_text" name="email" placeholder="email (optional)" type="text">
          <p id="register_status"></p>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="register_ajax">Register</button>
        </div>
      
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<?php

//Fun Header Functions!
//Yeah. That's right. I put a moderately useless comment in this code. If you're wondering why, it's gonna boost future morale.
//Yeah!
//Times this has worked: 1

//This function makes a subtitle that goes in the header h2.
//I could definitely do a Markov Chain deal, or I can make a static list.
function crazy_subtitle() {
  $sayings = array(
    "this isn't pismo beach",
    "in the cyber-flesh",
    "if it ain't broke, i can fix that for you",
    "you may have seen me in movie",
    "lives directly underneath his hair",
    "professional toenail collector",
    "would you believe me if i said i was an interior decorator",
    "clearly this guy likes bootstrap",
    "got a nickel for every time someone said 'if i had a nickel for every time'",
    "bursting at the seams with tasteless rice",
    "invented chalk and encourages child graffitti",
    "master spellor",
    "first edition!",
    "doesn't understand how bears didn't become the dominant species",
    "afraid of horses",
    "and his ongoing hope to never again swim with beavers",
    "if you don't support my site i'll club this baby ceiling",
    "never met a pin he didn't luke",
    "you can google me at: google.com",
    "yes, it's real. yes, you can touch it.",
    "read your late night AIM conversations and judged you harshly",
    "fo real gurl fo real",
    "and the zoot-suit fandangos",
    "and the frothy milk",
    "pitying the fool since nineteen eighty-nine",
    "forgot to put a subtitle here",
    "big fan of small fans",
    "i'm from where you're from",
    "he really knows how to make little kids cry",
    "looks like someone with crumbly earwax",
    "like trying to shave a grenade covered in butter",
    "seriously a ninja cat in human form",
    "wants to do you on public access television",
    "golddiggers friendships",
    "nobel peace prize winner of chopping off eyes",
    "isn't mad he's just disappointed",
    "can't wait for adultish gambino",
    "makes plots with conspiracy theorists to fulfill a recursion fetish",
    "can hold a plate in each hand without constantly looking at the plates",
    "fights with both hands tied behind your back",
    "honorable to the point of shame",
    "doesn't tape before painting",
    "fills notebooks with drawings of other notebooks",
    "has two left feet if you're in the market for left feet",
    "isn't a sellout yet",
    "has been wrong twice- once he thought he was wrong but he wasn't",
    "could fill a bathtub with bad metaphors",
    "now in all uppercase",
    "please excuse the convenience",
    "gets monthly revelations about what that one lyric was",
    "has no problems making palindromes making problems no has Buckley Alan Stephen",
    "just wants to know whose dishes these are",
    "or as children call him, mister broccoli",
    "just knows he was meant to be a late-night watch-salesman",
    "gullible when it's helpful",
    "watched binary hercules go from zero to one",
    "played the bus in speed",
    "writes the dialogue for pixar shorts"
  );
  return $sayings[array_rand($sayings)];
}
