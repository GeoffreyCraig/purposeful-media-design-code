<?php
/**
 * Template Part: Generic Text Block Component
 *
 * Renders ACF text block sections with style variants.
 * Uses ACF repeater field "text_block_sections" with sub-fields:
 * - section_heading (text)
 * - section_content (WYSIWYG)
 * - section_style_variant (select: default, wide, narrative, pillar, featured, sidebar)
 * - section_icon (select: optional decorative icon)
 * - section_icon_color (select: navy, gray, dark, white)
 * - section_anchor (text: optional anchor ID)
 *
 * @package Purposeful_Media
 * @version 1.0.0
 * @since Week 47 Thursday 11/20/2025
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Check if ACF repeater field exists and has rows
if ( have_rows( 'text_block_sections' ) ) :

    while ( have_rows( 'text_block_sections' ) ) : the_row();

        // Get sub-field values
        $heading = get_sub_field( 'section_heading' );
        $content = get_sub_field( 'section_content' );
        $variant = get_sub_field( 'section_style_variant' ) ?: 'default';
        $icon = get_sub_field( 'section_icon' );
        $icon_color = get_sub_field( 'section_icon_color' ) ?: 'navy';
        $anchor = get_sub_field( 'section_anchor' );

        // Build section attributes
        $section_classes = 'text-block text-block--' . esc_attr( $variant );
        $section_attrs = '';

        if ( $anchor ) {
            $section_attrs = ' id="' . esc_attr( sanitize_title( $anchor ) ) . '"';
        }
        ?>

        <!-- ========================================
             TEXT BLOCK SECTION: <?php echo esc_attr( strtoupper( $variant ) ); ?>
             ======================================== -->
        <section class="<?php echo esc_attr( $section_classes ); ?>" data-layout="<?php echo esc_attr( $variant ); ?>"<?php echo $section_attrs; ?>>
            <div class="text-block__container">
                <article class="text-block__content">

                    <?php if ( $icon ) : ?>
                        <!-- Icon Display -->
                        <div class="text-block__icon-header">
                            <div class="decorative-icon-display decorative-icon-display--large"
                                 data-icon="<?php echo esc_attr( $icon ); ?>"
                                 data-color="<?php echo esc_attr( $icon_color ); ?>"
                                 role="img"
                                 aria-label="<?php echo esc_attr( ucfirst( $icon ) ); ?> icon"></div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $heading ) : ?>
                        <!-- Section Heading -->
                        <header class="text-block__header">
                            <h2 class="headline headline--h2"><?php echo esc_html( $heading ); ?></h2>
                        </header>
                    <?php endif; ?>

                    <?php if ( $content ) : ?>
                        <!-- Section Content (WYSIWYG) -->
                        <div class="text-block__section">
                            <?php
                            // Output WYSIWYG content (already escaped by WordPress)
                            echo $content;
                            ?>
                        </div>
                    <?php endif; ?>

                </article>
            </div>
        </section>

    <?php endwhile; ?>

    <!-- Initialize icons for text block sections -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const icons = document.querySelectorAll('.text-block .decorative-icon-display');
            icons.forEach(icon => {
                const iconName = icon.getAttribute('data-icon');
                const color = icon.getAttribute('data-color');
                if (iconName && color) {
                    icon.classList.add(`icon--${iconName}-${color}`);
                }
            });
        });
    </script>

<?php else : ?>

    <!-- No text block sections found -->
    <section class="text-block text-block--default">
        <div class="text-block__container">
            <article class="text-block__content">
                <p class="paragraph paragraph--default">
                    <?php _e( 'No text block content has been added yet. Please add content sections in the WordPress editor.', 'purposeful-media' ); ?>
                </p>
            </article>
        </div>
    </section>

<?php endif; ?>
