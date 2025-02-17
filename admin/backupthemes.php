<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

///Zip Function
// Get real path for our folder
$rootPath = realpath(WP_CONTENT_DIR . '/themes');

// Initialize archive object
$zip = new ZipArchive();
$zip->open(WP_CONTENT_DIR . '/themes_by_simplecopy_'.date('d-m-Y-H-i-s').'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
?>

<?php

echo '<p style="margin-bottom: 15px; font-weight: bold;">Themes are zipped</p>';
echo '<a href=" ' . admin_url() . 'admin.php?page=simplecopy">Go Back to previous page to download</a>';

?>