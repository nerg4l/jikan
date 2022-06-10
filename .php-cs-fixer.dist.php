<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_unused_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
    ])
    ->setFinder($finder)
;
