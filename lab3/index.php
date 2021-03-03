<?php
$text = '
	<h2>Заголовок 1</h2>
	<p>...</p>
	<h2>Заголовок 2</h2>
	<p>...</p>
	<h2>Заголовок 3</h2>
	<p>...</p>
	<h2>Заголовок 4</h2>
	<p>...</p>
';
 
$text = stripslashes($text);
preg_match_all("/<h2.*?>(.*?)<\/h2>/i", $text, $items);
 
if (!empty($items[1])) {
	?>
	<div class="texts-list">
		<h3>Содержание</h3>
		<ol>
			<?php
			foreach ($items[1] as $i => $row) {
				echo '<li><a href="#tag-' . ++$i . '">' . $row . '</a></li>';
			}
			?>					
		</ol>
	</div>
	<?php	
}
 
if (!empty($items[0])) {
	foreach ($items[0] as $i => $row) {
		$text = str_replace($row, '<a name="tag-' . ++$i . '"></a>' . $row, $text);
	} 
}
 
echo $text;
