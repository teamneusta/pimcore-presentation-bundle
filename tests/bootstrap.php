<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$pimcoreProjectRootDir = __DIR__ . '/app';
$_SERVER['PIMCORE_PROJECT_ROOT'] = $pimcoreProjectRootDir;
$_ENV['PIMCORE_PROJECT_ROOT'] = $pimcoreProjectRootDir;
putenv('PIMCORE_PROJECT_ROOT=' . $pimcoreProjectRootDir);

$kernelClass = 'TestKernel';
$_SERVER['KERNEL_CLASS'] = $kernelClass;
$_ENV['KERNEL_CLASS'] = $kernelClass;
putenv('KERNEL_CLASS=' . $kernelClass);

$appEnv = 'test';
$_SERVER['APP_ENV'] = $appEnv;
$_ENV['APP_ENV'] = $appEnv;
putenv('APP_ENV=' . $appEnv);

\Pimcore\Bootstrap::setProjectRoot();
\Pimcore\Bootstrap::bootstrap();
