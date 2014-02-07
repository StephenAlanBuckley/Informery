<?php
global $js_paths;

$js_html = '';
if (!empty($js_paths)) {
	$include_js_paths = explode(',', $js_paths);
	if(isset($include_js_paths)){
		foreach($include_js_paths as $inclusion){
			$js_html .= "<script src='". $inclusion . "'></script>";
		}
	}
}

echo $js_html;
?>
<!--We close the contents box and container clearfix(?)-->
</div> 
<div id="footer" class="container">
		<p>Copyright 2013 Stephen Alan Buckley. All rights reserved, I think. Stephen Buckley, Allston, MA  02134</p>
</div>
</body>
</html>
