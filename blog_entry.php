<?php

require_once 'header.php';
require_once '../utilities/db_class.php';

if ($_POST['add_story_entry']) {
  $title = $_POST['db_story_title'];
  $body =  $_POST['db_story_body'];
  $tags =  $_POST['db_story_tags'];

  $entry_sql =
    "INSERT INTO story(story_title, story_content, story_tags)
    VALUES('$title', '$body', '$tags');";

  $db = new Database;
  $db->make_informery_connection();
  $db->query($entry_sql);

  print_r("<div id='story_sql'>" . $entry_sql . "</div>");
}
?>

<form action="" method="post">
	<input type="hidden" name="add_story_entry" value="true"/>
	<p>Title</p><input type="text" id="story_title" name="db_story_title"/>
	<p>Body</p><textarea id="story_body" name="db_story_body"></textarea>
	<p>Tags</p><input type="text" id="story_tags" name="db_story_tags"/>
	<input type="submit" value="Make Blog Engry"/>
</form>

<?php

require_once 'footer.php';
?>
