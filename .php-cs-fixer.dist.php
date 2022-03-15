<?php
declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;
$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PSR12' => true,
        'yoda_style'=>true
    ])
    ->setFinder($finder)
;
