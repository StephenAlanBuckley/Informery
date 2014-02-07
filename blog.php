<?php
$css_paths = "/css/blog.css";
$js_paths = "/js/blog.js";
require_once 'header.php';
require_once 'utilities/db_class.php';

$start = !empty($_GET['start']) ? $_GET['start'] : 1;
$range= !empty($_GET['end']) ? $_GET['end'] : 5;

$blog_set = get_blog_posts($start, $range);
$blog_html = make_blog_html($blog_set);

echo $blog_html;
?>

<?
require_once 'footer.php';

function get_blog_posts($start, $range) {
  $db = new Database;
  $db->make_sab_basics_database_connection();
  
  $blog_sql = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 0, 1000;";

  $blog_posts = $db->query($blog_sql);

  $db->end_connection();
  //Subtract one from the start becuase it's zero indexed
  $subset = array_slice($blog_posts, $start - 1, $range); 
  return $subset;
}

function make_blog_html($posts) {
  $blog_html = "<div class='posts'>";
  foreach($posts as $post) {
    $id = $post['blog_id'];
    $title = $post['blog_title'];
    $body = nl2br($post['blog_content']);
    $tags = $post['blog_tags'];
    $published = new DateTime($post['blog_date']);
    $published = $published->format('D M jS g:ia');
    $blog_html .=
      "<div class='post panel panel-primary' id='blog_$id'>
        <div class='title panel-heading'>
          <h3 class='panel-title'>$title</h3>
        </div>
        <div class='blog_body panel-body'>$body</div>
        <div class='blog_footer panel-footer'>
          <p class='blog_published'>$published</p>
          <p class='blog_tags'>$tags</p>
        </div>
       </div>";
  }
  $blog_html .= "</div>";
  return $blog_html;
}
