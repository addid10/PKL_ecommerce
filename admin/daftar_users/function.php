<?php
function get_total_all_records() {
	require('../database/db.php');
	$statement = $connection->prepare(
        "SELECT * FROM users FULL JOIN users_profile USING(id)"
        );
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>