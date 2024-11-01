<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>


<h1 class='titlesc' style='padding-bottom: 15px;'>Create a backup via Simple Copy</h1>
<p><a class='button buttonsc' href='admin.php?page=sc_backup_pageplugin'>Backup plugins</a></p>
<p><a class='button buttonsc' href='admin.php?page=sc_backup_themes_page'>Backup themes</a></p>
<p><a class='button buttonsc'  href='admin.php?page=sc_backup_pagedb'>Backup database</a></p>
<p style='padding-bottom: 30px;'></p>
    
<h2>Existing Plugins Backups:</h2>
<?php
foreach (glob(  WP_CONTENT_DIR . "/plugins*.zip") as $filename) {
$signlefile = str_replace(WP_CONTENT_DIR . "/", '', $filename);
$signlefileurl = str_replace(WP_CONTENT_DIR, WP_CONTENT_URL, $filename);
echo str_replace("","","<p><a href='$signlefileurl'>$signlefile</a> taken on " . date ('F d Y H:i:s.', filemtime($filename)) . "</p>\n");
}
?>
<p style='padding-bottom: 30px;'></p>

<h2>Existing Themes Backups:</h2>
<?php
foreach (glob(  WP_CONTENT_DIR . "/themes*.zip") as $filename) {
$signlefile = str_replace(WP_CONTENT_DIR . "/", '', $filename);
$signlefileurl = str_replace(WP_CONTENT_DIR, WP_CONTENT_URL, $filename);
echo str_replace("","","<p><a href='$signlefileurl'>$signlefile</a> taken on " . date ('F d Y H:i:s.', filemtime($filename)) . "</p>\n");
}
?>
<p style='padding-bottom: 30px;'></p>

<h2>Existing Database Backups:</h2>
<?php
foreach (glob(  WP_CONTENT_DIR . "/database*.sql") as $filename) {
$signlefile = str_replace(WP_CONTENT_DIR . "/", '', $filename);
$signlefileurl = str_replace(WP_CONTENT_DIR, WP_CONTENT_URL, $filename);
echo str_replace("","","<p><a href='$signlefileurl'>$signlefile</a> taken on " . date ('F d Y H:i:s.', filemtime($filename)) . "</p>\n");
}
?>
<p style='padding-bottom: 30px;'></p>

</br></br>
<p style="font-size: 10px;">Powered by <a href="https://vipestudio.com" target="_blank">Vipe Studio</a></p>
</div>

<div class="wapuu">
    <a href="https://vipestudio.com" target="_blank"><img src="<?php echo plugin_dir_url(__FILE__) . 'img/Wapuu-Vipe-Studio-Ltd.png'; ?>"></a> 
</div>