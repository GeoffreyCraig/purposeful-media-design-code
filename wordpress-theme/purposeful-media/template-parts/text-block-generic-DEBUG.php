<?php
/**
 * DEBUG VERSION - Generic Text Block Component
 * Temporary file to diagnose ACF data retrieval
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

echo '<div style="background: yellow; padding: 20px; margin: 20px; border: 2px solid red;">';
echo '<h3>DEBUG: ACF Text Block Component</h3>';

// Check if ACF function exists
if ( function_exists( 'have_rows' ) ) {
    echo '<p>✅ ACF functions are available</p>';
} else {
    echo '<p>❌ ACF functions NOT available - ACF Pro not active?</p>';
}

// Check if repeater field exists and has rows
echo '<p>Checking for repeater field: text_block_sections</p>';

if ( have_rows( 'text_block_sections' ) ) {
    echo '<p>✅ Repeater field found with rows!</p>';

    $row_count = 0;
    while ( have_rows( 'text_block_sections' ) ) : the_row();
        $row_count++;

        echo '<div style="background: white; padding: 10px; margin: 10px 0; border: 1px solid black;">';
        echo '<h4>Row ' . $row_count . ':</h4>';

        // Get sub-field values
        $heading = get_sub_field( 'section_heading' );
        $content = get_sub_field( 'section_content' );
        $variant = get_sub_field( 'section_style_variant' );

        echo '<p><strong>Heading:</strong> ' . ($heading ? esc_html($heading) : 'EMPTY') . '</p>';
        echo '<p><strong>Content:</strong> ' . ($content ? 'HAS CONTENT (' . strlen($content) . ' chars)' : 'EMPTY') . '</p>';
        echo '<p><strong>Variant:</strong> ' . ($variant ? esc_html($variant) : 'EMPTY') . '</p>';

        // Show actual content
        if ($content) {
            echo '<div style="background: #f0f0f0; padding: 5px; margin: 5px 0;">';
            echo '<strong>Actual Content:</strong><br>';
            echo $content;
            echo '</div>';
        }

        echo '</div>';

    endwhile;

    echo '<p><strong>Total rows found:</strong> ' . $row_count . '</p>';

} else {
    echo '<p>❌ No rows found in repeater field</p>';
    echo '<p>Possible reasons:</p>';
    echo '<ul>';
    echo '<li>Field group not properly imported</li>';
    echo '<li>Field name mismatch</li>';
    echo '<li>Data not saved to this page</li>';
    echo '<li>Wrong post context</li>';
    echo '</ul>';
}

echo '</div>';

// Also try to get field directly (not in repeater)
echo '<div style="background: lightblue; padding: 20px; margin: 20px; border: 2px solid blue;">';
echo '<h3>DEBUG: Direct Field Check</h3>';
$direct_check = get_field( 'text_block_sections' );
echo '<p>Direct get_field result:</p>';
echo '<pre>' . print_r($direct_check, true) . '</pre>';
echo '</div>';
?>
