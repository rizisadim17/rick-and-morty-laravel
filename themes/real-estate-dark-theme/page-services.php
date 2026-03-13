<?php
/**
 * Template Name: Services Page
 */

get_header();
?>

<main class="site-main services-page">
    
    <!-- Hero Banner Section -->
    <section class="services-hero-section">
        <div class="container">
            <div class="services-hero-content">
                <h1 class="services-hero-title">Elevate Your Real Estate Experience</h1>
                <p class="services-hero-description">
                    Welcome to Estatein, where your real estate aspirations meet expert guidance. Explore our comprehensive range of services, each designed to cater to your unique needs and dreams.
                </p>
            </div>
        </div>
    </section>
    <!-- Services Grid Section -->
    <?php get_template_part('template-parts/services', 'section'); ?>
    <!-- Unlock Property Value Section -->
    <section class="service-category-section" id="property-selling">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/abstract-design.png" alt="Abstract Design" class="abstract-design">
                </div>
                <h2 class="section-title">Unlock Property Value</h2>
                <p class="section-description">
                    Selling your property should be a rewarding experience, and at Estatein, we make sure it is. Our Property Selling Service is designed to maximize the value of your property, ensuring you get the best deal possible. Explore the categories below to see how we can help you at every step of your selling journey.
                </p>
            </div>
            
            <div class="service-boxes-grid">
                <!-- Service Box 1 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-valuation.png" alt="Valuation Mastery">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Valuation Mastery</h3>
                        <p class="service-feature-description">
                            Discover the true worth of your property with our expert valuation services.
                        </p>
                    </div>
                </div>

                <!-- Service Box 2 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-marketing.png" alt="Strategic Marketing">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Strategic Marketing</h3>
                        <p class="service-feature-description">
                            Selling a property requires more than just a listing; it demands a strategic marketing approach.
                        </p>
                    </div>
                </div>

                <!-- Service Box 3 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-negotiation.png" alt="Negotiation Wizardry">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Negotiation Wizardry</h3>
                        <p class="service-feature-description">
                            Negotiating the best deal is an art, and our negotiation experts are masters of it.
                        </p>
                    </div>
                </div>

                <!-- Service Box 4 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-closing.png" alt="Closing Success">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Closing Success</h3>
                        <p class="service-feature-description">
                            A successful sale is not complete until the closing. We guide you through the intricate closing process.
                        </p>
                    </div>
                </div>

                <!-- CTA Box 5 -->
                <div class="service-feature-box cta-box-variant">
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Unlock the Value of Your Property Today</h3>
                        <p class="service-feature-description">
                            Ready to unlock the true value of your property? Explore our Property Selling Service categories and let us help you achieve the best deal possible for your valuable asset.
                        </p>
                    </div>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Effortless Property Management Section -->
    <section class="service-category-section" id="property-management">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/abstract-design.png" alt="Abstract Design" class="abstract-design">
                </div>
                <h2 class="section-title">Effortless Property Management</h2>
                <p class="section-description">
                    Owning a property should be a pleasure, not a hassle. Estatein's Property Management Service takes the stress out of property ownership, offering comprehensive solutions tailored to your needs. Explore the categories below to see how we can make property management effortless for you.
                </p>
            </div>
            
            <div class="service-boxes-grid">
                <!-- Service Box 1 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-tenant.png" alt="Tenant Harmony">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Tenant Harmony</h3>
                        <p class="service-feature-description">
                            Our Tenant Management services ensure that your tenants have a smooth and reducing vacancies.
                        </p>
                    </div>
                </div>

                <!-- Service Box 2 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-maintenance.png" alt="Maintenance Ease">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Maintenance Ease</h3>
                        <p class="service-feature-description">
                            Say goodbye to property maintenance headaches. We handle all aspects of property upkeep.
                        </p>
                    </div>
                </div>

                <!-- Service Box 3 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-financial.png" alt="Financial Peace of Mind">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Financial Peace of Mind</h3>
                        <p class="service-feature-description">
                            Managing property finances can be complex. Our financial experts take care of rent collection.
                        </p>
                    </div>
                </div>

                <!-- Service Box 4 -->
                <div class="service-feature-box">
                    <div class="service-feature-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-legal.png" alt="Legal Guardian">
                    </div>
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Legal Guardian</h3>
                        <p class="service-feature-description">
                            Stay compliant with property laws and regulations effortlessly.
                        </p>
                    </div>
                </div>

                <!-- CTA Box 5 -->
                <div class="service-feature-box cta-box-variant">
                    <div class="service-feature-content">
                        <h3 class="service-feature-title">Experience Effortless Property Management</h3>
                        <p class="service-feature-description">
                            Ready to experience hassle-free property management? Explore our Property Management Service categories and let us handle the complexities while you enjoy the benefits of property ownership.
                        </p>
                    </div>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Smart Investments Section -->
    <section class="investment-advisory-section" id="investment-advisory">
        <div class="container">
            <div class="investment-split-layout">
                <!-- Left Column -->
                <div class="investment-left-column">
                    <div class="investment-header">
                        <div class="section-badge">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/abstract-design.png" alt="Abstract Design" class="abstract-design">
                        </div>
                        <h2 class="section-title">Smart Investments, Informed Decisions</h2>
                        <p class="section-description">
                            Building a real estate portfolio requires a strategic approach. Estatein's Investment Advisory Service empowers you to make smart investments and informed decisions.
                        </p>
                    </div>
                    
                    <div class="investment-cta-box">
                        <h3 class="cta-box-title">Unlock Your Investment Potential</h3>
                        <p class="cta-box-description">
                            Explore our Property Management Service categories and let us handle the complexities while you enjoy the benefits of property ownership.
                        </p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="investment-right-column">
                    <div class="investment-features-grid">
                        <!-- Feature 1 -->
                        <div class="investment-feature-box">
                            <div class="feature-header">
                                <div class="service-feature-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-marketing.png" alt="Market Insight">
                                </div>
                                <h3 class="service-feature-title">Market Insight</h3>
                            </div>
                            <p class="service-feature-description">
                                Stay ahead of market trends with our expert Market Analysis. We provide in-depth insights into real estate market conditions.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="investment-feature-box">
                            <div class="feature-header">
                                <div class="service-feature-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-roi.png" alt="ROI Assessment">
                                </div>
                                <h3 class="service-feature-title">ROI Assessment</h3>
                            </div>
                            <p class="service-feature-description">
                                Make investment decisions with confidence. Our ROI Assessment services evaluate the potential returns on your investments.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="investment-feature-box">
                            <div class="feature-header">
                                <div class="service-feature-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-customized.png" alt="Customized Strategies">
                                </div>
                                <h3 class="service-feature-title">Customized Strategies</h3>
                            </div>
                            <p class="service-feature-description">
                                Every investor is unique, and so are their goals. We develop Customized Investment Strategies tailored to your specific needs.
                            </p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="investment-feature-box">
                            <div class="feature-header">
                                <div class="service-feature-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-investments.png" alt="Diversification Mastery">
                                </div>
                                <h3 class="service-feature-title">Diversification Mastery</h3>
                            </div>
                            <p class="service-feature-description">
                                Diversify your real estate portfolio effectively. Our experts guide you in spreading your investments across various property types and locations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reuse CTA Section -->
    <?php get_template_part('template-parts/cta', 'section'); ?>

</main>

<?php
get_footer();
?>