<?php
$json_config = $folder_template . "/plugins/particlesjs/assets/config.json";
$js_file = $folder_template . "/plugins/particlesjs/particles.min.js";
?>

<div id="particles-js"></div>

<script src=<?=$js_file?>></script>

<script>
particlesJS.load('particles-js', '<?= $json_config ?>', function() {
	console.log('callback - particles.js config loaded');
});
</script>