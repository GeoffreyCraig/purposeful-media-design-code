    <!-- ============================================
         FOOTER SECTION
         ============================================ -->
    <footer class="footer-responsive">
        <!-- DESKTOP/TABLET FOOTER (768px and up) -->
        <div class="footer-main" data-breakpoint="responsive">
            <div class="footer-container">
                <!-- Logo Section -->
                <div class="footer-logo-section">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-mobile.svg" 
                         alt="<?php bloginfo('name'); ?>" 
                         class="footer-logo">
                </div>

                <!-- Footer Content Columns -->
                <div class="footer-content">
                    <!-- Column 1: Services -->
                    <div class="footer-column" data-column="services">
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title"><?php _e('Services', 'purposeful-media'); ?></h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><a href="<?php echo esc_url(home_url('/email-deliverability-consulting-service')); ?>" class="footer-menu-link"><?php _e('Email Marketing', 'purposeful-media'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/webinar-production-service')); ?>" class="footer-menu-link"><?php _e('Webinar Production', 'purposeful-media'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/content-creation-service')); ?>" class="footer-menu-link"><?php _e('Content Creation', 'purposeful-media'); ?></a></li>
                                    <li><span class="footer-menu-link disabled"><?php _e('Succession Planning [Coming Soon]', 'purposeful-media'); ?></span></li>
                                    <li><span class="footer-menu-link disabled"><?php _e('Business Unit Growth [Coming Soon]', 'purposeful-media'); ?></span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Column 2: Who We Serve -->
                    <div class="footer-column" data-column="who-we-serve">
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title"><?php _e('Who We Serve', 'purposeful-media'); ?></h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><span class="footer-menu-link disabled"><?php _e('Revenue Growth [Coming Soon]', 'purposeful-media'); ?></span></li>
                                    <li><span class="footer-menu-link disabled"><?php _e('Preparing for Exit [Coming Soon]', 'purposeful-media'); ?></span></li>
                                    <li><span class="footer-menu-link disabled"><?php _e('Plan a Webinar [Coming Soon]', 'purposeful-media'); ?></span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Column 3: Resources -->
                    <div class="footer-column" data-column="resources">
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title"><?php _e('Resources', 'purposeful-media'); ?></h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><a href="<?php echo esc_url(home_url('/blog-archive')); ?>" class="footer-menu-link"><?php _e('Read Our Blog', 'purposeful-media'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/purposeful-resources-library')); ?>" class="footer-menu-link"><?php _e('Thought Leadership', 'purposeful-media'); ?></a></li>
                                    <li><span class="footer-menu-link disabled"><?php _e('Pricing [Coming Soon]', 'purposeful-media'); ?></span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Column 4: Company & Newsletter -->
                    <div class="footer-column" data-column="company-newsletter">
                        <!-- Company Menu -->
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title"><?php _e('Company', 'purposeful-media'); ?></h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><a href="<?php echo esc_url(home_url('/about-and-contact-purposeful-media-promotions')); ?>" class="footer-menu-link"><?php _e('About Us', 'purposeful-media'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/about-and-contact-purposeful-media-promotions/#contact')); ?>" class="footer-menu-link"><?php _e('Contact Us', 'purposeful-media'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/privacy-policy-statement')); ?>" class="footer-menu-link"><?php _e('Privacy Policy', 'purposeful-media'); ?></a></li>
                                    <li><span class="footer-menu-link disabled"><?php _e('Affiliates [Coming Soon]', 'purposeful-media'); ?></span></li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Newsletter Form - Using production molecule structure -->
                        <div class="footer-newsletter">
                            <form class="form-newsletter form-newsletter--mobile" method="post" action="">
                                <h3 class="form-newsletter__title"><?php _e('Stay Connected', 'purposeful-media'); ?></h3>
                                <p class="form-newsletter__description">
                                    <?php _e('Share your email address and get our B2B marketing strategies and digital transformation inspirations in your inbox.', 'purposeful-media'); ?>
                                </p>
                                <div class="form-newsletter__field-container">
                                    <label for="footer-email" class="form-newsletter__label"><?php _e('Email Address*', 'purposeful-media'); ?></label>
                                    <div class="form-newsletter__input-wrapper">
                                        <input type="email"
                                               id="footer-email"
                                               name="email"
                                               class="form-newsletter__input"
                                               placeholder="<?php esc_attr_e('Write your input here', 'purposeful-media'); ?>"
                                               required
                                               aria-required="true"
                                               aria-invalid="false">
                                    </div>
                                    <span class="form-newsletter__helper"><?php _e('*This field is required.', 'purposeful-media'); ?></span>
                                </div>
                                <div class="form-newsletter__submit-container">
                                    <button type="submit" class="form-newsletter__submit">
                                        <?php _e('Subscribe Now', 'purposeful-media'); ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attribution Sub-footer -->
            <div class="footer-attribution">
                <div class="footer-attribution-content">
                    <span class="footer-copyright"><?php printf(__('© All rights reserved %s', 'purposeful-media'), date('Y')); ?></span>
                    <span class="footer-divider">|</span>
                    <span class="footer-company"><?php bloginfo('name'); ?></span>
                    <span class="footer-divider">|</span>
                    <a href="<?php echo esc_url(home_url('/policy')); ?>" class="footer-policy-link"><?php _e('Policy Statement', 'purposeful-media'); ?></a>
                </div>
            </div>
        </div>

        <!-- MOBILE FOOTER (767px and below) -->
        <div class="footer-mobile">
            <div class="footer-mobile__top">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-mobile.svg" 
                     alt="<?php bloginfo('name'); ?>" 
                     class="footer-mobile__logo">
            </div>
            
            <nav class="footer-mobile__nav">
                <!-- Services -->
                <div class="footer-mobile__nav-item" data-dropdown="services">
                    <span class="footer-mobile__nav-text"><?php _e('Services', 'purposeful-media'); ?></span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Services Dropdown -->
                <div class="dropdown-mobile" id="dropdown-services">
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/email-deliverability-consulting-service')); ?>" class="dropdown-mobile__link"><?php _e('Email Marketing', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/webinar-production-service')); ?>" class="dropdown-mobile__link"><?php _e('Webinar Production', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/content-creation-service')); ?>" class="dropdown-mobile__link"><?php _e('Content Creation', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled"><?php _e('Succession Planning', 'purposeful-media'); ?></span>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled"><?php _e('Business Unit Growth', 'purposeful-media'); ?></span>
                    </div>
                </div>
                
                <!-- Who We Serve -->
                <div class="footer-mobile__nav-item" data-dropdown="who-we-serve">
                    <span class="footer-mobile__nav-text"><?php _e('Who We Serve', 'purposeful-media'); ?></span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Who We Serve Dropdown -->
                <div class="dropdown-mobile" id="dropdown-who-we-serve">	
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled"><?php _e('Revenue Growth', 'purposeful-media'); ?></span>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled"><?php _e('Preparing for Exit', 'purposeful-media'); ?></span>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled"><?php _e('Plan a Webinar', 'purposeful-media'); ?></span>
                    </div>
                </div>
                
                <!-- Resources -->
                <div class="footer-mobile__nav-item" data-dropdown="resources">
                    <span class="footer-mobile__nav-text"><?php _e('Resources', 'purposeful-media'); ?></span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Resources Dropdown -->
                <div class="dropdown-mobile" id="dropdown-resources">
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/blog-archive')); ?>" class="dropdown-mobile__link"><?php _e('Read Our Blog', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/purposeful-resources-library')); ?>" class="dropdown-mobile__link"><?php _e('Thought Leadership', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled"><?php _e('Pricing', 'purposeful-media'); ?></span>
                    </div>
                </div>
                
                <!-- Company -->
                <div class="footer-mobile__nav-item" data-dropdown="company">
                    <span class="footer-mobile__nav-text"><?php _e('Company', 'purposeful-media'); ?></span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Company Dropdown -->
                <div class="dropdown-mobile" id="dropdown-company">
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/about-and-contact-purposeful-media-promotions')); ?>" class="dropdown-mobile__link"><?php _e('About Us', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/about-and-contact-purposeful-media-promotions/#contact')); ?>" class="dropdown-mobile__link"><?php _e('Contact Us', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo esc_url(home_url('/privacy-policy-statement')); ?>" class="dropdown-mobile__link"><?php _e('Privacy Policy', 'purposeful-media'); ?></a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled"><?php _e('Affiliates [Coming Soon]', 'purposeful-media'); ?></span>
                    </div>
                </div>
            </nav>
            
            <!-- Newsletter Form for Mobile - Using production molecule structure -->
            <div class="footer-mobile__newsletter">
                <form class="form-newsletter form-newsletter--mobile" method="post" action="">
                    <h3 class="form-newsletter__title"><?php _e('Stay Connected', 'purposeful-media'); ?></h3>
                    <p class="form-newsletter__description">
                        <?php _e('Get B2B marketing strategies and digital transformation inspiration in your inbox.', 'purposeful-media'); ?>
                    </p>
                    <div class="form-newsletter__field-container">
                        <label for="footer-mobile-email" class="form-newsletter__label"><?php _e('Email Address*', 'purposeful-media'); ?></label>
                        <div class="form-newsletter__input-wrapper">
                            <input type="email"
                                   id="footer-mobile-email"
                                   name="email"
                                   class="form-newsletter__input"
                                   placeholder="<?php esc_attr_e('Write your input here', 'purposeful-media'); ?>"
                                   required
                                   aria-required="true"
                                   aria-invalid="false">
                        </div>
                        <span class="form-newsletter__helper"><?php _e('*This field is required.', 'purposeful-media'); ?></span>
                    </div>
                    <div class="form-newsletter__submit-container">
                        <button type="submit" class="form-newsletter__submit">
                            <?php _e('Subscribe Now', 'purposeful-media'); ?>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="footer-mobile__attribution">
                <div class="footer-mobile__attribution-content">
                    <div class="footer-mobile__copyright"><?php printf(__('© All rights reserved %s', 'purposeful-media'), date('Y')); ?></div>
                    <div class="footer-mobile__company"><?php bloginfo('name'); ?></div>
                    <a href="<?php echo esc_url(home_url('/privacy-policy-statement')); ?>" class="footer-mobile__policy"><?php _e('Policy Statement', 'purposeful-media'); ?></a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- ============================================
         RETURN TO TOP BUTTON - Production Component
         Updated: November 8, 2025
         ============================================ -->
    <button class="return-button" id="returnButton" aria-label="<?php esc_attr_e('Return to top', 'purposeful-media'); ?>">
        <span class="ui-icon-display ui-icon-display--large" data-icon="arrow-up" data-color="gray" data-direction="up"></span>
    </button>

<?php wp_footer(); ?>
</body>
</html>

