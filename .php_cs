<?php
declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        __DIR__ . '/Resources',
        __DIR__ . '/vendor',
    ])
;

// do not enable self_accessor as it breaks pimcore models relying on get_called_class()
return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR1'                  => true,
        '@PSR2'                  => true,
        'array_syntax'           => ['syntax' => 'short'],
        // keep aligned = and => operators as they are: do not force aligning, but do not remove it
        'binary_operator_spaces' => ['align_double_arrow' => null, 'align_equals' => null],
        'blank_line_before_return'            => true,
        'encoding'                            => true,
        'function_typehint_space'             => true,
        'hash_to_slash_comment'               => true,
        'lowercase_cast'                      => true,
        'magic_constant_casing'               => true,
        'method_argument_space'               => ['ensure_fully_multiline' => false],
        'method_separation'                   => true,
        'native_function_casing'              => true,
        'no_blank_lines_after_class_opening'  => true,
        'no_blank_lines_after_phpdoc'         => true,
        'no_empty_comment'                    => true,
        'no_empty_phpdoc'                     => true,
        'no_empty_statement'                  => true,
        'no_extra_consecutive_blank_lines'    => true,
        'no_leading_import_slash'             => true,
        'no_leading_namespace_whitespace'     => true,
        'no_short_bool_cast'                  => true,
        'no_spaces_around_offset'             => true,
        'no_unneeded_control_parentheses'     => true,
        'no_unused_imports'                   => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line'         => true,
        'object_operator_without_whitespace'  => true,
        'ordered_imports'                     => true,
        'phpdoc_indent'                       => true,
        'phpdoc_no_useless_inheritdoc'        => true,
        'phpdoc_scalar'                       => true,
        'phpdoc_separation'                   => true,
        'phpdoc_single_line_var_spacing'      => true,
        'return_type_declaration'             => true,
        'short_scalar_cast'                   => true,
        'single_blank_line_before_namespace'  => true,
        'single_quote'                        => true,
        'space_after_semicolon'               => true,
        'standardize_not_equals'              => true,
        'ternary_operator_spaces'             => true,
        'whitespace_after_comma_in_array'     => true,
        // bundle specific rules
        '@PHP71Migration'                     => true,
        '@PHP71Migration:risky'               => true,
        'align_multiline_comment'             => true,
        'concat_space'                        => ['spacing' => 'one'],
        'method_chaining_indentation'         => true,
        'no_useless_else'                     => true,
        'no_useless_return'                   => true,
        'ordered_class_elements'              => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order'                        => true,
        'return_assignment'                   => true,
        'strict_param'                        => true,
    ]);
