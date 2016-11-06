<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description"
	content="A PHP based mini application to make life easier and faster">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<title>Movie Manager</title>

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title"
	content="A PHP based mini application to make life easier and faster">

<link rel="stylesheet" href="assets/material.min.css">
<link rel="stylesheet" href="assets/dataTables.material.min.css">

<script src="assets/material.min.js"></script>
<link rel="stylesheet"
	href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="assets/jquery.min.js"></script>
<script src="assets/jquery.dataTables.min.js"></script>
<script src="assets/dataTables.material.min.js"></script>
<script>
	$(document).ready(function() {
	    $('#data-table-simple').DataTable();
	} );
</script>
</head>
<body
	class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">

<?php 
ini_set('display_errors','Off');
require_once 'class.FileLister.php';

$dirs = new FileLister(include 'config.inc.php');
$thelist = $dirs->lister();

/* echo "<pre>";
var_dump($thelist);
echo "</pre>"; */
?>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<header
			class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
			<div class="mdl-layout--large-screen-only mdl-layout__header-row"></div>
			<div class="mdl-layout--large-screen-only mdl-layout__header-row">
				<h3>Movie Manager</h3>
			</div>
			<div class="mdl-layout--large-screen-only mdl-layout__header-row"></div>

		</header>
		<main class="mdl-layout__content">
		<section
			class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
			<table id="data-table-simple"
				class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp"
				cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="mdl-data-table__cell--non-numeric">Name</th>
						<th class="mdl-data-table__cell--non-numeric">Parent Folder</th>
						<th class="mdl-data-table__cell--non-numeric">Full Path</th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th class="mdl-data-table__cell--non-numeric">Name</th>
						<th class="mdl-data-table__cell--non-numeric">Parent Folder</th>
						<th class="mdl-data-table__cell--non-numeric">Full Path</th>
					</tr>
				</tfoot>

				<tbody>
        <?php
								foreach ( $thelist as $eachmovie ) :
									?>
        <tr>
						<td class="mdl-data-table__cell--non-numeric">
					<strong><?php echo $eachmovie['name']; ?>
					</strong>
					<br />
					<span class="mdl-chip"> 
						<span class="mdl-chip__text"><?php echo filesize($eachmovie['parent']."\\".$eachmovie['name'])/1000000 . ' MB'; ?></span>
					</span>
						</td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo trim($eachmovie['parent']); ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo trim($eachmovie['combined']); ?></td>
					</tr>
        <?php
								endforeach
								;
								?>
	</tbody>
			</table>
		</section>
		</main>
	</div>

</body>
</html>