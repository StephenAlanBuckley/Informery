var posts = $(".posts");
var blog_bodies = $(".blog_body");

for (index =0; index < blog_bodies.length; index++) {
  var current_entry = blog_bodies.eq(index)
  var new_text = current_entry.html().replace(/ \(\*(([^\*])*)\*\)/g, '<a class="btn parenthetical_comment" href="#" data-content="$1" rel="popover" data-placement="bottom">*</a>');
  current_entry.html(new_text);
}

$('.parenthetical_comment').popover({ trigger: "hover"});
