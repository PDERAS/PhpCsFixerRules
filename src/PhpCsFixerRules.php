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
        '@PSR2' => true,
        // There MUST be one blank line after the namespace declaration.
        'blank_line_after_namespace' => true,
        // The body of each structure MUST be enclosed by braces. Braces should be properly placed. Body of braces should be properly indented.
        'braces' => ['allow_single_line_closure'=>true],
        // Whitespace around the keywords of a class, trait or interfaces definition should be one space.
        'class_definition' => true,
        // The keyword `elseif` should be used instead of `else if` so that all control keywords look like single words.
        'elseif' => true,
        // Spaces should be properly placed in a function declaration.
        'function_declaration' => true,
        // All PHP files must use same line ending.
        'line_ending' => true,
        // PHP keywords MUST be in lower case.
        'lowercase_keywords' => true,
        // There must be a comment when fall-through is intentional in a non-empty case body.
        'no_break_comment' => true,
        // The closing `? >` tag MUST be omitted from files containing only PHP.
        'no_closing_tag' => true,
        // There MUST be no trailing spaces inside comment or PHPDoc.
        'no_trailing_whitespace_in_comment' => true,
        // Each line of multi-line DocComments must have an asterisk [PSR-5] and must be aligned with the first one.
        'align_multiline_comment' => true,
        // Each element of an array must be indented exactly once.
        'array_indentation' => true,
        // PHP arrays should be declared using the configured syntax.
        'array_syntax' => ['syntax'=>'short'],
        // Converts backtick operators to `shell_exec` calls.
        'backtick_to_shell_exec' => true,
        // Binary operators should be surrounded by space as configured.
        'binary_operator_spaces' => ['align_double_arrow'=>true, 'align_equals'=>false],
        // Ensure there is no code on the same line as the PHP open tag and it is followed by a blank line.
        'blank_line_after_opening_tag' => true,
        // An empty line feed must precede any configured statement.
        'blank_line_before_statement' => true,
        // A single space or none should be between cast and variable.
        'cast_spaces' => true,
        // Class, trait and interface elements must be separated with one blank line.
        'class_attributes_separation' => true,
        // Using `isset($var) &&` multiple times should be done in one call.
        'combine_consecutive_issets' => true,
        // Calling `unset` on multiple items should be done in one call.
        'combine_consecutive_unsets' => true,
        // Concatenation should be spaced according configuration.
        'concat_space' => ['spacing'=>'one'],
        // Equal sign in declare statement should be surrounded by spaces or not following configuration.
        'declare_equal_normalize' => true,
        // Add curly braces to indirect variables to make them clear to understand. Requires PHP >= 7.0.
        'explicit_indirect_variable' => true,
        // Converts implicit variables into explicit ones in double-quoted strings or heredoc syntax.
        'explicit_string_variable' => true,
        // Ensure single space between function's argument and its typehint.
        'function_typehint_space' => true,
        // Single line comments should use double slashes `//` and not hash `#`.
        'hash_to_slash_comment' => true,
        // Include/Require and file path should be divided with a single space. File path should not be placed under brackets.
        'include' => true,
        // List (`array` destructuring) assignment should be declared using the configured syntax. Requires PHP >= 7.1.
        'list_syntax' => true,
        // Cast should be written in lower case.
        'lowercase_cast' => true,
        // Class static references `self`, `static` and `parent` MUST be in lower case.
        'lowercase_static_reference' => true,
        // Magic constants should be referred to using the correct casing.
        'magic_constant_casing' => true,
        // Magic method definitions and calls must be using the correct casing.
        'magic_method_casing' => true,
        // Method chaining MUST be properly indented. Method chaining with different levels of indentation is not supported.
        'method_chaining_indentation' => true,
        // Methods must be separated with one blank line.
        'method_separation' => true,
        // Replace control structure alternative syntax to use braces.
        'no_alternative_syntax' => true,
        // There should be no empty lines after class opening brace.
        'no_blank_lines_after_class_opening' => true,
        // There should not be blank lines between docblock and the documented element.
        'no_blank_lines_after_phpdoc' => true,
        // There should not be empty PHPDoc blocks.
        'no_empty_phpdoc' => true,
        // Remove useless semicolon statements.
        'no_empty_statement' => true,
        // Removes extra blank lines and/or blank lines following configuration.
        'no_extra_blank_lines' => true,
        // Removes extra blank lines and/or blank lines following configuration.
        'no_extra_consecutive_blank_lines' => true,
        // Remove leading slashes in `use` clauses.
        'no_leading_import_slash' => true,
        // Operator `=>` should not be surrounded by multi-line whitespaces.
        'no_multiline_whitespace_around_double_arrow' => true,
        // Multi-line whitespace before closing semicolon are prohibited.
        'no_multiline_whitespace_before_semicolons' => true,
        // There MUST NOT be spaces around offset braces.
        'no_spaces_around_offset' => true,
        // Remove trailing commas in list function calls.
        'no_trailing_comma_in_list_call' => true,
        // PHP single-line arrays should not have trailing comma.
        'no_trailing_comma_in_singleline_array' => true,
        // Removes unneeded parentheses around control statements.
        'no_unneeded_control_parentheses' => true,
        // In array declaration, there MUST NOT be a whitespace before each comma.
        'no_whitespace_before_comma_in_array' => true,
        // Remove trailing whitespace at the end of blank lines.
        'no_whitespace_in_blank_line' => true,
        // There should not be space before or after object `T_OBJECT_OPERATOR` `->`.
        'object_operator_without_whitespace' => true,
        // PHPDoc should contain `@param` for all params.
        'phpdoc_add_missing_param_annotation' => ['only_untyped'=>false],
        // Docblocks should have the same indentation as the documented subject.
        'phpdoc_indent' => true,
        // Annotations in PHPDoc should be ordered so that `@param` annotations come first, then `@throws` annotations, then `@return` annotations.
        'phpdoc_order' => true,
        // Annotations in PHPDoc should be grouped together so that annotations of the same type immediately follow each other, and annotations of a different type are separated by a single blank line.
        'phpdoc_separation' => true,
        // PHPDoc summary should end in either a full stop, exclamation mark, or question mark.
        'phpdoc_summary' => true,
        // PHPDoc should start and end with content, excluding the very first and last line of the docblocks.
        'phpdoc_trim' => true,
        // The correct case must be used for standard PHP types in PHPDoc.
        'phpdoc_types' => true,
        // `@var` and `@type` annotations must have type and name in the correct order.
        'phpdoc_var_annotation_correct_order' => true,
        // There should be exactly one blank line before a namespace declaration.
        'single_blank_line_before_namespace' => true,
        // Replace all `<>` with `!=`.
        'standardize_not_equals' => true,
        // Standardize spaces around ternary operator.
        'ternary_operator_spaces' => true,
        // Use `null` coalescing operator `??` where possible. Requires PHP >= 7.0.
        'ternary_to_null_coalescing' => true,
        // Arrays should be formatted like function/method arguments, without leading or trailing single line space.
        'trim_array_spaces' => true,
        // Unary operators should be placed adjacent to their operands.
        'unary_operator_spaces' => true,
        // In array declaration, there MUST be a whitespace after each comma.
        'whitespace_after_comma_in_array' => true,
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
