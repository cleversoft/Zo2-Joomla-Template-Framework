<?php foreach($this->articles as $a) : ?>
<?php
$link = ContentHelperRoute::getArticleRoute($a['id']);
?>
<h3><a href="<?php echo $link?>"><?php echo $a['title']?></a></h3>
<p class="lead"><?php echo $a['introtext']?></p>
<a class="btn btn-small btn-success" href="<?php echo $link?>">Read more</a>
<hr />
<?php endforeach; ?>