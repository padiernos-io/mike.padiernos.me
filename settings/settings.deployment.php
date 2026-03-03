<?php

/**
 * @file
 * Deployment settings for the Mike Padiernos website.
 *
 * @category Settings
 * @package Mike_Padiernos_Website
 * @license GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.html
 * @link https://mike.padiernos.me
 * @since PHP 8.0
 */

$databases['default']['default'] = [
  'database' => 'mike',
  'username' => 'padiernos',
  'password' => 'voWr0rOlMwZrKhcdWl47',
  'prefix' => '',
  'host' => 'localhost',
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'driver' => 'mysql',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
];
