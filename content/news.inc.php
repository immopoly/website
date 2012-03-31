<?php
	//TODO find new/all news
	// $_GET['lastvisit']
	$lastvisit = empty($_GET['lastvisit']) ? null : $_GET['lastvisit'];
	$newsFiles = findNewsFiles($lastvisit);

?>

<h1>News</h1>

<div class="row">
	<div class="span6">

<?php if(empty($newsFiles) ||  ! is_array($newsFiles)): ?>
	<p>
		Sorry, bisher gibt es nichts neues vom Immopoly Team. Schau doch später mal wieder vorbei!
	</p>
<?php else: ?>

<?php foreach ($newsFiles as $id => $newsFile): ?>
	<div class="well news_entry">
		<span class="pull-right btn-small"><?echo '#'.$id; ?></span>
		<?php include($newsFile); ?>
		<span class="pull-right btn-small"><?php echo date("d.m.Y H:m",filemtime($newsFile)); ?></span>
		<div class="clearfix">&nbsp;</div>
	</div>
<?php endforeach; ?>

<?php endif; ?>

	</div>
</div>