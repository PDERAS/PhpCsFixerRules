<?php
namespace Pderas\PhpCsFixerRules;

class PhpCsFixerRules
{
    private static $defaultRules = [
        '@PSR2' => true,
        'array_indentation' => true,
        'array_syntax' => [ 'syntax' => 'short' ],
        'binary_operator_spaces' => [ 'align_double_arrow' => true, 'align_equals' => false ],
        'braces' => [ 'allow_single_line_closure' => true ],
        'combine_consecutive_unsets' => true,
        'concat_space' => [ 'spacing' => 'one' ],
        'declare_equal_normalize' => true,
        'function_typehint_space' => true,
        'hash_to_slash_comment' => true,
        'include' => true,
        'lowercase_cast' => true,
        'method_separation' => true,
        'no_extra_consecutive_blank_lines' => [ 'curly_brace_block', 'extra', 'parenthesis_brace_block', 'square_brace_block', 'throw', 'use' ],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_multiline_whitespace_before_semicolons' => true,
        'no_spaces_around_offset' => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line' => true,
        'object_operator_without_whitespace' => true,
        'single_blank_line_before_namespace' => true,
        'single_quote' => false,
        'ternary_operator_spaces' => true,
        'trim_array_spaces' => true,
        'unary_operator_spaces' => true,
        'whitespace_after_comma_in_array' => true
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


        return \PhpCsFixer\Config::create()
            ->setRules(array_merge(self::$defaultRules, $customRules))
            //->setIndent("\t")
            ->setLineEnding("\n")
            ->setFinder($finder);
    }
}
