<?php

// Timezone
date_default_timezone_set('Europe/Berlin');

// DB
putenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_HOST=localhost');
putenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_DBNAME=methods');
putenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_USER=root');
putenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_PASSWORD=');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);

// Error Handling Middleware settings
$settings['error'] = function() {
    return [
      'displayErrorDetails' => true,
      'logErrors' => true,
      'logErrorDetails' => true
    ];
};

return $settings;

?>