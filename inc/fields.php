<?php
/**
 * Custom Fields
 *
 * Carbon (custom) fields for the current theme.
 * Docs: https://docs.carbonfields.net/
 */

namespace Twist\Fields;

$fields_dir = new \DirectoryIterator(__DIR__ . '/fields');
foreach ($fields_dir as $fileinfo) {
    if ($fileinfo->isFile() && $fileinfo->getExtension() === 'php') {
        require_once $fileinfo->getPathname();
    }
}
