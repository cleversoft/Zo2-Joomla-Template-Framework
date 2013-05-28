<?php
defined ('_JEXEC') or die ('resticted aceess');
//access zo2 framework
/** @var Zo2Framework $zo2 */
$zo2 = $this->zo2;
?>
<!DOCTYPE html>
<html>
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/vendor/font-awesome/css/font-awesome.min.css" type="text/css" />
</head>
<body>
<div class="container">
    <jdoc:include type="modules" name="top" />
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="bottom" />
</div>
</body>
</html>