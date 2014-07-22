<?php
$markers = $this->get('markers');
$isMarked = (is_array($markers) && count($markers) > 0 );
$count = 0;
?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<style>
    .google-maps {
        height: 100%;
        margin: 0px;
        padding: 0px;
    }
</style>
<script type="text/javascript">
    (function() {
        window.onload = function() {
            var latLng = new google.maps.LatLng('<?php echo $this->get('center.lat'); ?>', '<?php echo $this->get('center.lng'); ?>');
            var mapOptions = {
                zoom: <?php echo $this->get('zoom'); ?>,
                center: latLng
            };
            var map<?php echo $this->get('map'); ?> = new google.maps.Map(document.getElementById('<?php echo $this->get('name'); ?>'), mapOptions)
<?php if ($isMarked) { ?>
    <?php foreach ($markers as $marker) { ?>
                    var marker<?php echo $count; ?> = new google.maps.Marker({
                        position: new google.maps.LatLng('<?php echo $marker->get('lat'); ?>', '<?php echo $marker->get('lng'); ?>'),
                        map: map<?php echo $this->get('map'); ?>,
                        title: '<?php echo $marker->get('title'); ?>'
                    })
        <?php $count++; ?>
    <?php } ?>
<?php } ?>
        }
    })();
</script>
<div class="" style="width:<?php echo $this->get('width');?>px;height:<?php echo $this->get('height');?>px">
    <div id="<?php echo $this->get('name'); ?>" class="google-maps"></div>
</div>