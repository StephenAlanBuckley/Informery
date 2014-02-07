<?php
$css_paths = "/css/blog.css";
$js_paths = "/js/blog.js";
require_once 'header.php';
require_once '../utilities/db_class.php';

$start = !empty($_GET['start']) ? $_GET['start'] : 1;
$range= !empty($_GET['end']) ? $_GET['end'] : 5;

$story_set = get_stories($start, $range);
$story_html = make_stories_html($story_set);

echo $story_html;
?>

<?
require_once 'footer.php';

function get_stories($start, $range) {
  $db = new Database;
  $db->make_informery_connection();
  
  $story_sql = "SELECT * FROM story ORDER BY story_id DESC LIMIT 0, 1000;";

  $story_posts = $db->query($story_sql);

  $db->end_connection();
  //Subtract one from the start becuase it's zero indexed
  $subset = array_slice($story_posts, $start - 1, $range); 
  return $subset;
}

function make_stories_html($posts) {
  $story_html = "<div class='posts'>";
  foreach($posts as $post) {
    $id = $post['story_id'];
    $title = $post['story_title'];
    $body = nl2br($post['story_body']);
    $tags = $post['story_tags'];
    $published = new DateTime($post['story_create']);
    $published = $published->format('D M jS g:ia');
    $story_html .=
      "<div class='post panel panel-primary' id='story_$id'>
        <div class='title panel-heading'>
          <h3 class='panel-title'>$title</h3>
        </div>
        <div class='story_body panel-body'>$body</div>
        <div class='story_footer panel-footer'>
          <p class='story_published'>$published</p>
          <p class='story_tags'>$tags</p>
        </div>
       </div>";
  }
  $story_html .= "</div>";
  return $story_html;
}
