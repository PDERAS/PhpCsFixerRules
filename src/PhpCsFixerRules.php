<?php

namespace Pderas\PhpCsFixerRules;

use Symfony\Component\Finder\Finder;
use PhpCsFixer\Config;

class PhpCsFixerRules
{
    /**
     * Default formatting rules.
     *
     * @var array $defaultRules
     */
    private static $defaultRules = [
        '@PSR2'                                       => true,
        'align_multiline_comment'                     => true,
        'array_indentation'                           => true,
        'array_syntax'                                => ['syntax' => 'short'],
        'backtick_to_shell_exec'                      => true,
        'binary_operator_spaces'                      => ['align_double_arrow' => true, 'align_equals' => false],
        'blank_line_after_namespace'                  => true,
        'blank_line_after_opening_tag'                => true,
        'blank_line_before_statement'                 => true,
        'braces'                                      => ['allow_single_line_closure' => true],
        'cast_spaces'                                 => true,
        'class_attributes_separation'                 => true,
        'class_definition'                            => true,
        'combine_consecutive_issets'                  => true,
        'combine_consecutive_unsets'                  => true,
        'concat_space'                                => ['spacing' => 'one'],
        'declare_equal_normalize'                     => true,
        'elseif'                                      => true,
        'explicit_indirect_variable'                  => true,
        'explicit_string_variable'                    => true,
        'function_declaration'                        => true,
        'function_typehint_space'                     => true,
        'hash_to_slash_comment'                       => true,
        'include'                                     => true,
        'line_ending'                                 => true,
        'list_syntax'                                 => true,
        'lowercase_cast'                              => true,
        'lowercase_keywords'                          => true,
        'lowercase_static_reference'                  => true,
        'magic_constant_casing'                       => true,
        'magic_method_casing'                         => true,
        'method_chaining_indentation'                 => true,
        'method_separation'                           => true,
        'no_alternative_syntax'                       => true,
        'no_blank_lines_after_class_opening'          => true,
        'no_blank_lines_after_phpdoc'                 => true,
        'no_break_comment'                            => true,
        'no_closing_tag'                              => true,
        'no_empty_phpdoc'                             => true,
        'no_empty_statement'                          => true,
        'no_extra_blank_lines'                        => true,
        'no_extra_consecutive_blank_lines'            => ['curly_brace_block', 'extra', 'parenthesis_brace_block', 'square_brace_block', 'throw', 'use'],
        'no_leading_import_slash'                     => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_multiline_whitespace_before_semicolons'   => true,
        'no_spaces_around_offset'                     => true,
        'no_trailing_comma_in_list_call'              => true,
        'no_trailing_comma_in_singleline_array'       => true,
        'no_trailing_whitespace_in_comment'           => true,
        'no_unneeded_control_parentheses'             => true,
        'no_whitespace_before_comma_in_array'         => true,
        'no_whitespace_in_blank_line'                 => true,
        'object_operator_without_whitespace'          => true,
        'phpdoc_add_missing_param_annotation'         => ['only_untyped' => false],
        'phpdoc_indent'                               => true,
        'phpdoc_order'                                => true,
        'phpdoc_separation'                           => true,
        'phpdoc_summary'                              => true,
        'phpdoc_trim'                                 => true,
        'phpdoc_types'                                => true,
        'phpdoc_var_annotation_correct_order'         => true,
        'single_blank_line_before_namespace'          => true,
        'single_quote'                                => false,
        'standardize_not_equals'                      => true,
        'ternary_operator_spaces'                     => true,
        'ternary_to_null_coalescing'                  => true,
        'trim_array_spaces'                           => true,
        'unary_operator_spaces'                       => true,
        'whitespace_after_comma_in_array'             => true,
    ];

    /**
     * Returns the 'finder' which is in charge of which files to attempt to fix.
     *
     * @param string $baseDir The directory to begin searching for files
     *
     * @return \Symfony\Component\Finder\Finder
     */
    private static function makeFinder(string $baseDir): Finder
    {
        return Finder::create()
            ->notPath('bootstrap/cache')
            ->notPath('storage')
            ->notPath('vendor')
            ->notPath('manual for extractor')
            ->in($baseDir)
            ->name('*.php')
            ->notName('*.blade.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true);
    }

    /**
     * Exports the configured php-cs-fixer rules.
     *
     * @param string $baseDir - root project directory. likely '__DIR__'
     * @param array [$customRules=[]] - custom project rules to override the built in defaults
     *
     * @return \PhpCsFixer\Config
     */
    public static function config(string $baseDir, array $customRules = []): Config
    {
        return Config::create()
            ->setRules(array_merge(self::$defaultRules, $customRules))
            ->setLineEnding("\n")
            ->setFinder(self::makeFinder($baseDir));
    }
}
