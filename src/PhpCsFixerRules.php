<?php

namespace Pderas\PhpCsFixerRules;

class PhpCsFixerRules
{
    private static $defaultRules = [
        '@PSR2'                  => true,
        'array_indentation'      => true,
        'array_syntax'           => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align',
            ]
        ],
        'braces'                                      => ['allow_single_line_closure' => true],
        'combine_consecutive_unsets'                  => true,
        'concat_space'                                => ['spacing' => 'one'],
        'declare_equal_normalize'                     => true,
        'function_typehint_space'                     => true,
        'single_line_comment_style'                   => true,
        'include'                                     => true,
        'lowercase_cast'                              => true,
        'class_attributes_separation'                 => true,
        'no_extra_blank_lines'                        => ['tokens' => ['curly_brace_block', 'extra', 'parenthesis_brace_block', 'square_brace_block', 'throw', 'use']],
        'no_multiline_whitespace_around_double_arrow' => true,
        'multiline_whitespace_before_semicolons'      => true,
        'no_spaces_around_offset'                     => true,
        'no_whitespace_before_comma_in_array'         => true,
        'no_whitespace_in_blank_line'                 => true,
        'object_operator_without_whitespace'          => true,
        'single_blank_line_before_namespace'          => true,
        'single_quote'                                => false,
        'ternary_operator_spaces'                     => true,
        'trim_array_spaces'                           => true,
        'unary_operator_spaces'                       => true,
        'whitespace_after_comma_in_array'             => true
    ];

    public static function config($baseDir, $customRules = [])
    {
        $finder = \Symfony\Component\Finder\Finder::create()
            ->notPath('bootstrap/cache')
            ->notPath('storage')
            ->notPath('vendor')
            ->notPath('manual for extractor')
            ->in($baseDir)
            ->name('*.php')
            ->notName('*.blade.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true);

        $config = new \PhpCsFixer\Config();
        $return = $config->setRules(array_merge(self::$defaultRules, $customRules))
            ->setLineEnding("\n")
            ->setFinder($finder);

        return $return;
    }
}
