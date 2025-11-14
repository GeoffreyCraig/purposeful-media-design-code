<?php
/**
 * Template Name: About & Contact Page
 * Description: Combined About Us and Contact page with detailed contact form
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="about-contact-wrapper">

    <!-- ========================================
         HERO SECTION: Hero Simple Reverse
         ======================================== -->
    <section class="hero-simple-reverse" role="banner" aria-label="<?php esc_attr_e('Page Header', 'purposeful-media'); ?>">
		<!-- Updated to integrate the dynamic ACF Field Group and fallback headline -->
        <div class="hero-simple-reverse__content">
            <h1 class="hero-simple-reverse__headline">
			<?php 
				$headline = get_field('hero-simple-reverse__headline');
				echo esc_html($headline ? $headline : __('About Us & Contact', 'purposeful-media'));
			?>
</h1>
        </div>
    </section>

    <!-- ========================================
         SECTION 1: ABOUT US
         ======================================== -->

    <!-- Headline Banner: About Us -->
    <div class="card-banner-spacer variant-headline-banner" id="about">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('ABOUT US', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Text Block: About Us Content (Wide Layout) -->
    <section class="text-block text-block--wide" data-layout="wide">
        <div class="text-block__container">
            <article class="text-block__content">

                <!-- Header with H1 and Lead Paragraph -->
                <header class="text-block__header">
                    <h1 class="headline headline--h1"><?php _e('Transforming B2B Marketing Through Strategic Expertise', 'purposeful-media'); ?></h1>
                    <p class="paragraph paragraph--lead"><?php _e('Purposeful Media Promotions is a B2B marketing agency dedicated to helping businesses grow through strategic branding, design, and promotion. We partner with companies to transform their marketing efforts and achieve sustainable growth.', 'purposeful-media'); ?></p>
                </header>

                <!-- Our Mission Section -->
                <section class="text-block__section">
                    <h2 class="headline headline--h2"><?php _e('Our Mission', 'purposeful-media'); ?></h2>
                    <p class="paragraph paragraph--default"><?php _e('We believe that every business deserves access to professional marketing resources that drive real results. Our mission is to provide B2B companies with the strategic support, creative expertise, and tactical execution needed to compete and thrive in today\'s marketplace.', 'purposeful-media'); ?></p>

                    <p class="paragraph paragraph--default"><?php _e('Whether you\'re a growing startup or an established enterprise, we bring the experience and dedication necessary to elevate your marketing efforts and generate meaningful business outcomes.', 'purposeful-media'); ?></p>
                </section>

                <!-- What We Do Section -->
                <section class="text-block__section">
                    <h2 class="headline headline--h2"><?php _e('What We Do', 'purposeful-media'); ?></h2>
                    <p class="paragraph paragraph--default"><?php _e('We specialize in three core areas of B2B marketing that deliver measurable impact:', 'purposeful-media'); ?></p>

                    <!-- Icon List -->
                    <ul class="text-block__icon-list">
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default"><?php _e('Email Marketing Management - Strategic campaigns that connect with your audience', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default"><?php _e('Content Creation & Thought Leadership - Compelling content that establishes authority', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default"><?php _e('Webinar Production Services - Professional webinars that generate qualified leads', 'purposeful-media'); ?></span>
                        </li>
                    </ul>
                </section>

                <!-- Why Choose Us Section -->
                <section class="text-block__section">
                    <h2 class="headline headline--h2"><?php _e('Why Choose Us', 'purposeful-media'); ?></h2>
                    <p class="paragraph paragraph--default"><?php _e('We combine deep B2B marketing expertise with a commitment to understanding your unique business challenges. Our approach is collaborative, data-driven, and focused on delivering tangible results that contribute to your bottom line.', 'purposeful-media'); ?></p>

                    <p class="paragraph paragraph--default"><?php _e('When you work with Purposeful Media Promotions, you gain a partner who is invested in your success and dedicated to helping your business thrive.', 'purposeful-media'); ?></p>
                </section>

            </article>
        </div>
    </section>

    <!-- Initialize text-block icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const icons = document.querySelectorAll('.ui-icon-display');
            icons.forEach(icon => {
                const iconName = icon.getAttribute('data-icon');
                const color = icon.getAttribute('data-color');
                if (iconName && color) {
                    icon.classList.add(`icon--${iconName}-${color}`);
                }
            });
        });
    </script>

    <!-- ========================================
         SECTION 2: CONTACT US
         ======================================== -->

    <!-- Headline Banner: Contact Us -->
    <div class="card-banner-spacer variant-headline-banner" id="contact">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('CONTACT US', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Section Contact Us -->
    <section class="section-contactus" data-component="Section/ContactUs" role="region" aria-label="<?php esc_attr_e('Contact Us', 'purposeful-media'); ?>">
        <div class="section-contactus__container">
            <!-- Form Contact Molecule Component -->
            <div class="form-contact" data-state="default" data-name="Form/Contact">
                <!-- Title -->
                <h3 class="form-contact__title"><?php _e('Get in Touch', 'purposeful-media'); ?></h3>

                <!-- Description -->
                <p class="form-contact__description">
                    <?php _e('Ready to transform your marketing? Tell us what\'s on your mind.', 'purposeful-media'); ?>
                </p>

                <!-- Contact Form -->
                <form class="form-contact__form" id="contact-form" method="post" action="">
                    <!-- Name Row (First & Last) -->
                    <div class="form-contact__row">
                        <!-- First Name Field -->
                        <div class="form-contact__field-container">
                            <label for="firstName" class="form-contact__label"><?php _e('First Name', 'purposeful-media'); ?></label>
                            <div class="form-contact__input-wrapper">
                                <input
                                    type="text"
                                    id="firstName"
                                    name="firstName"
                                    class="form-contact__input"
                                    placeholder="<?php esc_attr_e('Enter your first name', 'purposeful-media'); ?>"
                                    aria-describedby="firstName-helper"
                                />
                            </div>
                            <span id="firstName-helper" class="form-contact__helper"><?php _e('How do you prefer to be addressed?', 'purposeful-media'); ?></span>
                        </div>

                        <!-- Last Name Field -->
                        <div class="form-contact__field-container">
                            <label for="lastName" class="form-contact__label"><?php _e('Last Name', 'purposeful-media'); ?></label>
                            <div class="form-contact__input-wrapper">
                                <input
                                    type="text"
                                    id="lastName"
                                    name="lastName"
                                    class="form-contact__input"
                                    placeholder="<?php esc_attr_e('Enter your last name', 'purposeful-media'); ?>"
                                    aria-describedby="lastName-helper"
                                />
                            </div>
                            <span id="lastName-helper" class="form-contact__helper"><?php _e('What is your last name?', 'purposeful-media'); ?></span>
                        </div>
                    </div>

                    <!-- Email Field (Required) -->
                    <div class="form-contact__field-container form-contact__field-container--full">
                        <label for="email" class="form-contact__label"><?php _e('Email Address*', 'purposeful-media'); ?></label>
                        <div class="form-contact__input-wrapper">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-contact__input"
                                placeholder="<?php esc_attr_e('your.email@example.com', 'purposeful-media'); ?>"
                                required
                                aria-required="true"
                                aria-invalid="false"
                                aria-describedby="email-helper"
                            />
                        </div>
                        <span id="email-helper" class="form-contact__helper"><?php _e('*This field is required.', 'purposeful-media'); ?></span>
                    </div>

                    <!-- Phone Number Field -->
                    <div class="form-contact__field-container form-contact__field-container--phone">
                        <label for="phone" class="form-contact__label"><?php _e('Phone Number', 'purposeful-media'); ?></label>
                        <div class="form-contact__input-wrapper">
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-contact__input"
                                placeholder="<?php esc_attr_e('(555) 123-4567', 'purposeful-media'); ?>"
                                aria-describedby="phone-helper"
                            />
                        </div>
                        <span id="phone-helper" class="form-contact__helper"><?php _e('What is your contact phone number?', 'purposeful-media'); ?></span>
                    </div>

                    <!-- Company Field -->
                    <div class="form-contact__field-container form-contact__field-container--full">
                        <label for="company" class="form-contact__label"><?php _e('Company', 'purposeful-media'); ?></label>
                        <div class="form-contact__input-wrapper">
                            <input
                                type="text"
                                id="company"
                                name="company"
                                class="form-contact__input"
                                placeholder="<?php esc_attr_e('Your company name', 'purposeful-media'); ?>"
                                aria-describedby="company-helper"
                            />
                        </div>
                        <span id="company-helper" class="form-contact__helper"><?php _e('What is your company?', 'purposeful-media'); ?></span>
                    </div>

                    <!-- Message Field -->
                    <div class="form-contact__field-container form-contact__field-container--message">
                        <label for="message" class="form-contact__label"><?php _e('Your Message', 'purposeful-media'); ?></label>
                        <div class="form-contact__input-wrapper">
                            <textarea
                                id="message"
                                name="message"
                                class="form-contact__textarea"
                                placeholder="<?php esc_attr_e('Tell us about your project...', 'purposeful-media'); ?>"
                                aria-describedby="message-helper"
                            ></textarea>
                        </div>
                        <span id="message-helper" class="form-contact__helper"><?php _e('Please write your message', 'purposeful-media'); ?></span>
                    </div>

                    <!-- Submit Container -->
                    <div class="form-contact__submit-container">
                        <button type="submit" class="form-contact__submit">
                            <?php _e('Send Message', 'purposeful-media'); ?>
                        </button>
                    </div>
                </form>

                <!-- Success State (Hidden by default) -->
                <div class="form-contact__success form-contact__success--hidden" id="contact-success">
                    <!-- Success Title -->
                    <h3 class="form-contact__title"><?php _e('Thank you for reaching out to us!', 'purposeful-media'); ?></h3>

                    <!-- Success Description -->
                    <p class="form-contact__description">
                        <?php _e('Please check your inbox for our automated response. Our representative will follow up with you in person shortly.', 'purposeful-media'); ?>
                    </p>

                    <!-- Success CTA -->
                    <div class="form-contact__submit-container">
                        <p class="form-contact__success-message">
                            <?php _e('To schedule a meeting with us, please follow this link to our calendar to check our availability and reserve your time.', 'purposeful-media'); ?>
                        </p>
                        <a href="#" class="form-contact__success-link"><?php _e('Schedule an Appointment', 'purposeful-media'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Form Handling -->
    <script>
        // Configuration
        const HUBSPOT_CONFIG = {
            portalId: '48424315', // Purposeful Media HubSpot Portal ID
            formId: 'd3b25d84-8bbf-4637-ba32-bd0c9b4d732e', // Contact Form ID
            region: 'na1' // North America region
        };

        // Handle form submission
        function handleFormSubmit(event) {
            event.preventDefault();

            const form = event.target;
            const formData = {
                firstName: form.firstName.value,
                lastName: form.lastName.value,
                email: form.email.value,
                phone: form.phone.value,
                company: form.company.value,
                message: form.message.value
            };

            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const emailInput = form.email;

            if (!emailRegex.test(emailInput.value)) {
                // Show error state
                emailInput.classList.add('form-contact__input--error');
                emailInput.setAttribute('aria-invalid', 'true');

                // Update helper text
                const helper = document.getElementById('email-helper');
                if (helper) {
                    helper.textContent = '<?php echo esc_js(__('Please check your address format and try again.', 'purposeful-media')); ?>';
                    helper.classList.add('form-contact__helper--error');
                }

                return;
            }

            // Here you would typically submit to HubSpot
            console.log('Form submitted with data:', formData);

            // Show success state (for demo purposes)
            showSuccessState();

            // In production, you would submit to HubSpot like this:
            /*
            fetch(`https://api.hsforms.com/submissions/v3/integration/submit/${HUBSPOT_CONFIG.portalId}/${HUBSPOT_CONFIG.formId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    fields: [
                        { name: 'firstname', value: formData.firstName },
                        { name: 'lastname', value: formData.lastName },
                        { name: 'email', value: formData.email },
                        { name: 'phone', value: formData.phone },
                        { name: 'company', value: formData.company },
                        { name: 'message', value: formData.message }
                    ]
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.inlineMessage) {
                    showSuccessState();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
            */
        }

        // Show success state
        function showSuccessState() {
            const form = document.getElementById('contact-form');
            const successDiv = document.getElementById('contact-success');
            const component = document.querySelector('.form-contact');

            // Hide form
            if (form) {
                form.style.display = 'none';
            }

            // Show success message
            if (successDiv) {
                successDiv.classList.remove('form-contact__success--hidden');
            }

            // Update component state
            if (component) {
                component.setAttribute('data-state', 'success');
                component.classList.add('form-contact--success');
            }
        }

        // Handle input field interactions
        function setupFieldInteractions() {
            const inputs = document.querySelectorAll('.form-contact__input, .form-contact__textarea');
            const component = document.querySelector('.form-contact');

            inputs.forEach(input => {
                // Clear error on typing
                input.addEventListener('input', function() {
                    if (this.classList.contains('form-contact__input--error')) {
                        this.classList.remove('form-contact__input--error');
                        this.setAttribute('aria-invalid', 'false');

                        // Reset helper text for email field
                        if (this.id === 'email') {
                            const helper = document.getElementById('email-helper');
                            if (helper) {
                                helper.textContent = '<?php echo esc_js(__('*This field is required.', 'purposeful-media')); ?>';
                                helper.classList.remove('form-contact__helper--error');
                            }
                        }
                    }
                });

                // Focus state
                input.addEventListener('focus', function() {
                    component.setAttribute('data-state', 'active');
                    component.classList.add('form-contact--active');
                });

                // Blur state
                input.addEventListener('blur', function() {
                    component.setAttribute('data-state', 'default');
                    component.classList.remove('form-contact--active');
                });
            });

            // Hover state for component
            if (component) {
                component.addEventListener('mouseenter', function() {
                    if (!component.classList.contains('form-contact--active')) {
                        component.classList.add('form-contact--hover');
                    }
                });

                component.addEventListener('mouseleave', function() {
                    component.classList.remove('form-contact--hover');
                });
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Setup form submission
            const form = document.getElementById('contact-form');
            if (form) {
                form.addEventListener('submit', handleFormSubmit);
            }

            // Setup field interactions
            setupFieldInteractions();
        });
    </script>

</main>
<!-- End of about-contact-wrapper -->

<?php get_footer(); ?>
