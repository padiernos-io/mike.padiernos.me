<?php


# Redis configuration for Drupal 9.4.x and above.
$redis_module_enabled = FALSE;
$core_extension_file = !empty($settings['config_sync_directory'])
	? rtrim($settings['config_sync_directory'], '/') . '/core.extension.yml'
	: '';

if ($core_extension_file && is_readable($core_extension_file)) {
	$core_extension_contents = file_get_contents($core_extension_file);
	$redis_module_enabled = $core_extension_contents !== FALSE
		&& preg_match('/^\s{2}redis:\s*\d+\s*$/m', $core_extension_contents) === 1;
}

if (extension_loaded('redis') && $redis_module_enabled) {
	$conf['redis_cache_socket']                       = '/var/run/redis/redis-server.sock';
	$settings['redis.connection']['interface']        = 'PhpRedis';
	$settings['redis.connection']['host']             = '127.0.0.1';
	$settings['redis.connection']['port']             = '6379';
	$settings['redis.connection']['base']             = 0;
	$settings['cache_prefix']['default']              = 'mike_';
	$settings['cache']['default']                     = 'cache.backend.redis';
	$settings['cache']['bins']['bootstrap']           = 'cache.backend.chainedfast';
	$settings['cache']['bins']['discovery']           = 'cache.backend.chainedfast';
	$settings['cache']['bins']['config']              = 'cache.backend.chainedfast';
	$settings['cache']['bins']['render']              = 'cache.backend.redis';
	$settings['cache']['bins']['dynamic_page_cache']  = 'cache.backend.redis';
	$settings['cache']['bins']['page']                = 'cache.backend.redis';
	$settings['cache']['bins']['data']                = 'cache.backend.redis';
	// $_COOKIE['redis_test'] = '1';

	$settings['session_storage'] = [
		'handler' => 'redis.session.handler',
		'save_path' => 'tcp://127.0.0.1:6379',
	];
}
