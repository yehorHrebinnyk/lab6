<?php 
	include_once "db.php";
	$collection = $db->actor;
	$data = $collection->find()->toArray();
?>

<html>
    <head>
        <title>GENRE FILTER</title>
		<script>
			window.onload = () => {
				let log_block = document.getElementById('log');
				let query_data = window.localStorage.getItem('query result');
				if (!query_data) {
					log_block.innerText = "You don't have recent watched data";
				} else {
					for (let item of query_data.split('\n')) {
						let div = document.createElement('div');
						div.innerText = item;
						log_block.appendChild(div);
					}
				}
			}			
		</script>	
    <head>
    <body>
        <form id="form" method="post" action="/lab6/search_film_cassete.php">
            <p>Get  films recorded on cassetes</p>
            <input type="submit" value="Find!">
        </form>
        <form id="form" method="post" action="/lab6/search_by_actor.php">
            <select name="actor", id="actor">
				<?php
					foreach ($data as $item) {
						echo "<option value='$item->_id'>", $item->name, "</option>";
					};
				?>
			</select>
            <input type="submit" value="Find!">
        </form>
        <form id="form" method="post" action="/lab6/saerch_fresh_films.php">
            <p>Get fresh films</p>
            <input type="submit" value="Find!">
        </form>
		
		<div id="log">
			<h3>Recent query result</h3>
		</div>
    </body>
</html>