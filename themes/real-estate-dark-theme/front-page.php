<?php
/**
 * Homepage Template
 */
get_header();
?>

<!-- Hero Section -->
<section class="header">
    <section id="hero" class="hero-section">
        <!-- Background Sections -->
        <div class="hero-bg-left"></div>
        <div class="hero-bg-right"></div>
        
        <div class="container">
            <div class="hero-wrapper">
                <!-- Left Content -->
                <div class="hero-content">
                    <!-- Title TEXT -->
                    <h1 class="hero-title">Discover Your Dream Property with Estatein</h1>
                    
                    <!-- Description -->
                    <p class="hero-description">
                        Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.
                    </p>
                    
                    <!-- Buttons -->
                    <div class="hero-buttons">
                        <a href="#properties" class="btn btn-secondary">Learn More</a>
                        <a href="<?php echo home_url('/properties'); ?>" class="btn btn-primary">Browse Properties</a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="hero-stats">
                        <div class="stat-item tile">
                            <div class="stat-number">200+</div>
                            <div class="stat-label">Happy Customers</div>
                        </div>
                        <div class="stat-item tile">
                            <div class="stat-number">10k+</div>
                            <div class="stat-label">Properties For Clients</div>
                        </div>
                        <div class="stat-item tile">
                            <div class="stat-number">16+</div>
                            <div class="stat-label">Years of Experience</div>
                        </div>
                    </div>
                </div>
                
                <!-- Divider with Circle -->
                <div class="hero-divider-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/circle-discover.png" alt="Discover" class="hero-circle-image">
                    <div class="hero-divider"></div>
                </div>
                
                <!-- Right: Building Image -->
                <div class="hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bldg-home.png" alt="Building" class="building-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <?php get_template_part('template-parts/services', 'section'); ?>
 </section>

<!-- Featured Properties Section -->
<section id="properties" class="featured-properties-section section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header-with-link">
            <div class="section-header-left">
                <h2 class="section-title">Featured Properties</h2>
                <p class="section-description">
                    Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.
                </p>
            </div>
            <div class="section-header-right">
                <a href="<?php echo home_url('/properties'); ?>" class="btn btn-secondary">View All Properties</a>
            </div>
        </div>

        <!-- Properties Grid -->
        <div class="properties-grid">
            <!-- Property 1 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property-1.png" alt="Seaside Serenity Villa">
                </div>
                
                <div class="property-content">
                    <h3 class="property-title">Seaside Serenity Villa</h3>
                    
                    <p class="property-description">
                        A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... <a href="#" class="read-more">Read More</a>
                    </p>
                    
                    <div class="property-info-tags">
                        <span class="info-tag">
                            <i class="fas fa-bed"></i> 4-Bedroom
                        </span>
                        <span class="info-tag">
                            <i class="fas fa-bath"></i> 3-Bathroom
                        </span>
                        <span class="info-tag">
                            <i class="fas fa-home"></i> Villa
                        </span>
                    </div>
                    
                    <div class="property-footer">
                        <div class="property-price-section">
                            <span class="price-label">Price</span>
                            <span class="property-price">$550,000</span>
                        </div>
                        <a href="#" class="btn btn-primary">View Property Details</a>
                    </div>
                </div>
            </div>

            <!-- Property 2 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property-2.png" alt="Metropolitan Haven">
                </div>
                
                <div class="property-content">
                    <h3 class="property-title">Metropolitan Haven</h3>
                    
                    <p class="property-description">
                        A chic 2-bedroom, 2-bathroom condo with modern amenities in the heart of the city... <a href="#" class="read-more">Read More</a>
                    </p>
                    
                    <div class="property-info-tags">
                        <span class="info-tag">
                            <i class="fas fa-bed"></i> 2-Bedroom
                        </span>
                        <span class="info-tag">
                            <i class="fas fa-bath"></i> 2-Bathroom
                        </span>
                        <span class="info-tag">
                            <i class="fas fa-building"></i> Condo
                        </span>
                    </div>
                    
                    <div class="property-footer">
                        <div class="property-price-section">
                            <span class="price-label">Price</span>
                            <span class="property-price">$550,000</span>
                        </div>
                        <a href="#" class="btn btn-primary">View Property Details</a>
                    </div>
                </div>
            </div>

            <!-- Property 3 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property-3.png" alt="Rustic Retreat Cottage">
                </div>
                
                <div class="property-content">
                    <h3 class="property-title">Rustic Retreat Cottage</h3>
                    
                    <p class="property-description">
                        An elegant 3-bedroom, 2-bathroom cottage surrounded by lush landscapes and mountain views... <a href="#" class="read-more">Read More</a>
                    </p>
                    
                    <div class="property-info-tags">
                        <span class="info-tag">
                            <i class="fas fa-bed"></i> 3-Bedroom
                        </span>
                        <span class="info-tag">
                            <i class="fas fa-bath"></i> 2-Bathroom
                        </span>
                        <span class="info-tag">
                            <i class="fas fa-home"></i> Cottage
                        </span>
                    </div>
                    
                    <div class="property-footer">
                        <div class="property-price-section">
                            <span class="price-label">Price</span>
                            <span class="property-price">$550,000</span>
                        </div>
                        <a href="#" class="btn btn-primary">View Property Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Our Clients Say Section -->
<section id="testimonials" class="testimonials-section section">
    <div class="container">
        <!-- Section Header with Button on Right -->
        <div class="section-header-with-link">
            <div class="section-header-left">
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-description">
                    Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.
                </p>
            </div>
            <div class="section-header-right">
                <a href="<?php echo home_url('/testimonials'); ?>" class="btn btn-secondary">View All Testimonials</a>
            </div>
        </div>

        <!-- Testimonials Grid -->
        <div class="testimonials-grid">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                </div>
                
                <h3 class="testimonial-title">Exceptional Service!</h3>
                
                <p class="testimonial-text">
                    Our experience with Estatein was outstanding. Their team's dedication and professionalism made finding our dream home a breeze. Highly recommended!
                </p>
                
                <div class="testimonial-author">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/client-wade.png" alt="Wade Warren" class="author-photo">
                    <div class="author-info">
                        <div class="author-name">Wade Warren</div>
                        <div class="author-location">USA, California</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                </div>
                
                <h3 class="testimonial-title">Efficient and Reliable</h3>
                
                <p class="testimonial-text">
                    Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn't be happier with the results.
                </p>
                
                <div class="testimonial-author">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/client-emelie.png" alt="Emelie Thomson" class="author-photo">
                    <div class="author-info">
                        <div class="author-name">Emelie Thomson</div>
                        <div class="author-location">USA, Florida</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                    <span class="star-circle"><i class="fas fa-star"></i></span>
                </div>
                
                <h3 class="testimonial-title">Trusted Advisors</h3>
                
                <p class="testimonial-text">
                    The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive. Thank you for your support!
                </p>
                
                <div class="testimonial-author">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/client-john.png" alt="John Mans" class="author-photo">
                    <div class="author-info">
                        <div class="author-name">John Mans</div>
                        <div class="author-location">USA, Nevada</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="faq-section section">
    <div class="container">
        <!-- Section Header with Button -->
        <div class="section-header-with-link">
            <div class="section-header-left">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-description">
                    Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.
                </p>
            </div>
            <div class="section-header-right">
                <a href="<?php echo home_url('/faq'); ?>" class="btn btn-secondary">View All FAQ's</a>
            </div>
        </div>

        <!-- FAQ Grid -->
        <div class="faq-grid">
            <!-- FAQ 1 -->
            <div class="faq-box">
                <h3 class="faq-question">How do I search for properties on Estatein?</h3>
                <p class="faq-answer">
                    Learn how to use our user-friendly search tools to find properties that match your criteria.
                </p>
                <a href="#" class="btn-read-more">Read More</a>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-box">
                <h3 class="faq-question">What documents do I need to sell my property through Estatein?</h3>
                <p class="faq-answer">
                    Find out about the necessary documentation for listing your property with us.
                </p>
                <a href="#" class="btn-read-more">Read More</a>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-box">
                <h3 class="faq-question">How can I contact an Estatein agent?</h3>
                <p class="faq-answer">
                    Discover the different ways you can get in touch with our experienced agents.
                </p>
                <a href="#" class="btn-read-more">Read More</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section - Start Your Real Estate Journey -->
<?php get_template_part('template-parts/cta', 'section'); ?>

<?php get_footer(); ?>