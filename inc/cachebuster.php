<?php
/**
 * CacheBuster
 *
 * Busts cache for assets.
 */

namespace Twist;

class CacheBuster
{
	private static $version = '';

	public static function bust($force_version = '')
	{
		if ($force_version) {
			self::$version = $force_version;
		} elseif (!self::$version) {
			$new_version = '';
			// Use time as buster in dev environment.
			if (defined('WP_ENV') && WP_ENV == 'development') {
				$new_version = time();
			} else {
				$new_version = filemtime(get_template_directory() . '/dist/styles/main.css');
			}
			self::$version = $new_version;
		}
		return self::$version;
	}
}
