<?php
//prepare the data to be displayed
$query = "SELECT * FROM tag LIMIT 15";

$result = $mysqli->query($query);

$tags = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    $tags[] = $data;
}

$page = str_replace('_detail', '', $module);
$page = str_replace('_', '-', $module);
?>

<div class="sidebar_section">
    <div class="sidebar_section_title">
        <h3>Tags</h3>
    </div>
    <div class="tags d-flex flex-row flex-wrap">
        <?php foreach ($tags as $tag) : ?>
            <div class="tag"><a href="<?= "/$page/{$tag['tag_seo']}" ?>"><?= ucfirst($tag['tag']) ?></a></div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .tags .tag {
        background: none;
        border: #f44f00 2px solid;
    }

    .tags .tag a {
        color: #1a1a1a;
    }
</style>