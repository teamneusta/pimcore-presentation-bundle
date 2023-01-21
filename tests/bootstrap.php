<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$setEnv = function (string $name, string $value): void {
    putenv("{$name}=" . $_ENV[$name] = $_SERVER[$name] = $value);
};

$setEnv('PIMCORE_PROJECT_ROOT', __DIR__ . '/app');
$setEnv('KERNEL_CLASS', 'TestKernel');
$setEnv('APP_ENV', 'test');

\Pimcore\Bootstrap::setProjectRoot();
\Pimcore\Bootstrap::bootstrap();
