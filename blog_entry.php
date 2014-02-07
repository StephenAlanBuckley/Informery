<?php

require_once 'header.php';
require_once 'utilities/db_class.php';

if ($_POST['add_blog_entry']) {
  $title = $_POST['db_blog_title'];
  $body =  $_POST['db_blog_body'];
  $tags =  $_POST['db_blog_tags'];

  $entry_sql =
    "INSERT INTO blog(blog_title, blog_content, blog_tags)
    VALUES('$title', '$body', '$tags');";

  $db = new Database;
  $db->make_sab_basics_database_connection();
  $db->query($entry_sql);

  print_r("<div id='blog_sql'>" . $entry_sql . "</div>");
}
?>

<form action="" method="post">
	<input type="hidden" name="add_blog_entry" value="true"/>
	<p>Title</p><input type="text" id="blog_title" name="db_blog_title"/>
	<p>Body</p><textarea id="blog_body" name="db_blog_body"></textarea>
	<p>Tags</p><input type="text" id="blog_tags" name="db_blog_tags"/>
	<input type="submit" value="Make Blog Engry"/>
</form>

<?php

require_once 'footer.php';
?>
