<?php
$connect = mysqli_connect("localhost", "root", "", "contribute");
if(mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
$fetch = '';
$button = '';
if(isset($_POST["input"])) {
	$search = mysqli_real_escape_string($connect, $_POST["input"]);
	$query = " SELECT commentaire.*, projet.name, user.username
	FROM commentaire, projet, user
	where commentaire.idProjet = projet.id
	and commentaire.idUser = user.id  and projet.name like '%".$search."%'";
} else {
	$query = "SELECT commentaire.*, projet.name, user.username
	FROM commentaire, projet, user
	where commentaire.idProjet = projet.id
	and commentaire.idUser = user.id order by commentaire.id";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0) {
	$fetch = '
		<table class="table table-hover table-md">
			<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Le contenu</th>
					<th>Date</th>
					<th>Sur quel projet</th>
          <th>Action</th>
				</tr>
			</thead>';
	while($row = mysqli_fetch_array($result)) {
		$fetch .= '
			<tbody>
				<tr>
					<td>'.$row["id"].'</td>
					<td>'.$row["username"].'</td>
					<td>'.$row["content"].'</td>
					<td>'.$row["date"].'</td>
					<td>'.$row["name"].'</td>
          <td>
            <form action="traitement.php" method="post">
            <input id="id" name="id" type="hidden" value="'.$row['id'].'"/>
            <input id="commentaire" name="commentaire" type="hidden" value="Supprimer"/>
            <input class="btn btn-sm btn-primary" type="submit" value="Supprimer"/>
            </form>
          </td>
        </tr>
     </tbody>
			';
	}
	echo $fetch;
}
else
{
	echo $no = '<input class="form-control m-4" value="Aucun commentaires" readonly/>';
}
$connect->close();
?>
