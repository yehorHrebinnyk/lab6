<?php 
	include_once "db.php";
	$collection = $db->film;
	$data = $collection->find(array(), array('limit' => 1, 'sort' => array('year' => -1)))->toArray();
?>

<html>
	<head>
		<title>SAERCH RESULTS</title>
	</head>
	<body>
		<?php
			foreach ($data as $item) {
				echo '<div>', $item->name, '</div>';
			};
		?>
		<script>
			let content = document.body.getElementsByTagName('div');
			window.localStorage.setItem('query result', '');
			for (let item of content) {
				window.localStorage.setItem('query result', window.localStorage.getItem('query result').concat('\n', item.innerText));
			}
		</script>
	</body>
</html>