<?php
/**
 * Template Name: Contact Us Page
 */

get_header();
?>

<main class="site-main contact-page">
    
    <!-- Contact Hero Section -->
    <section class="contact-hero-section">
        <div class="container">
            <div class="contact-hero-content">
                <h1 class="contact-hero-title">Get in Touch with Estatein</h1>
                <p class="contact-hero-description">
                    Welcome to Estatein's Contact Us page. We're here to assist you with any inquiries, requests, or feedback you may have. Whether you're looking to buy or sell a property, explore investment opportunities, or simply want to connect, we're just a message away. Reach out to us, and let's start a conversation.
                </p>
            </div>
        </div>
    </section>
    <!-- Services Grid Section -->
    <?php get_template_part('template-parts/services', 'section'); ?>
    <!-- Contact Form Section -->
    <section class="contact-form-section section" id="contact-form">
        <div class="container">
            <div class="section-badge">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/abstract-design.png" alt="Abstract Design" class="abstract-design">
            </div>
            <h2 class="section-title">Let's Connect</h2>
            <p class="section-description">
                We're excited to connect with you and learn more about your real estate goals. Use the form below to get in touch with Estatein. Whether you're a prospective client, partner, or simply curious about our services, we're here to answer your questions and provide the assistance you need.
            </p>
            
            <div class="contact-form-wrapper">
                <form class="estatein-contact-form" id="contactForm" method="post">
                    <!-- Row 1 -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your Email" required>
                        </div>
                    </div>
                    
                    <!-- Row 2 -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="inquiry_type">Inquiry Type</label>
                            <select id="inquiry_type" name="inquiry_type" required>
                                <option value="">Select Inquiry</option>
                                <option value="buying">Buying Property</option>
                                <option value="selling">Selling Property</option>
                                <option value="investment">Investment</option>
                                <option value="general">General Inquiry</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="hear_about">How Did You Hear About Us?</label>
                            <select id="hear_about" name="hear_about" required>
                                <option value="">Select</option>
                                <option value="google">Google Search</option>
                                <option value="social">Social Media</option>
                                <option value="referral">Referral</option>
                                <option value="advertisement">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Message -->
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="6" placeholder="Enter Your Message" required></textarea>
                    </div>
                    
                    <!-- Terms & Submit -->
                    <div class="form-footer">
                        <div class="form-checkbox">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree with <a href="<?php echo home_url('/terms'); ?>">Terms of Use</a> and <a href="<?php echo home_url('/privacy'); ?>">Privacy Policy</a></label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Send Your Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Office Locations Section -->
    <section class="office-locations-section section" id="locations">
        <div class="container">
            <div class="section-badge">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/abstract-design.png" alt="Abstract Design" class="abstract-design">
            </div>
            <h2 class="section-title">Discover Our Office Locations</h2>
            <p class="section-description">
                Estatein is here to serve you across multiple locations. Whether you're looking to meet our team, discuss real estate opportunities, or simply drop by for a chat, we have offices conveniently located to serve your needs. Explore the categories below to find the Estatein office nearest to you.
            </p>
            
            <!-- Location Filter Buttons -->
            <div class="location-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="regional">Regional</button>
                <button class="filter-btn" data-filter="international">International</button>
            </div>
            
            <!-- Office Cards -->
            <div class="offices-grid">
                <!-- Main Headquarters -->
                <div class="office-card" data-category="regional">
                    <span class="office-label">Main Headquarters</span>
                    <h3 class="office-title">123 Estatein Plaza, City Center, Metropolis</h3>
                    <p class="office-description">
                        Our main headquarters serve as the heart of Estatein. Located in the bustling city center, this is where our core team of experts operates, driving the excellence and innovation that define us.
                    </p>
                    
                    <div class="office-contact-info">
                        <a href="mailto:info@estatein.com" class="contact-info-btn">
                            <i class="fas fa-envelope"></i>
                            <span>info@estatein.com</span>
                        </a>
                        <a href="tel:+11234567890" class="contact-info-btn">
                            <i class="fas fa-phone"></i>
                            <span>+1 (123) 456-7890</span>
                        </a>
                        <a href="#" class="contact-info-btn">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Metropolis</span>
                        </a>
                    </div>
                    
                    <a href="#" class="btn btn-primary btn-block">Get Direction</a>
                </div>
                
                <!-- Regional Offices -->
                <div class="office-card" data-category="regional">
                    <span class="office-label">Regional Offices</span>
                    <h3 class="office-title">456 Urban Avenue, Downtown District, Metropolis</h3>
                    <p class="office-description">
                        Estatein's presence extends to multiple regions, each with its own dynamic real estate landscape. Discover our regional offices, staffed by local experts who understand the nuances of their respective markets.
                    </p>
                    
                    <div class="office-contact-info">
                        <a href="mailto:info@estatein.com" class="contact-info-btn">
                            <i class="fas fa-envelope"></i>
                            <span>info@estatein.com</span>
                        </a>
                        <a href="tel:+11234567890" class="contact-info-btn">
                            <i class="fas fa-phone"></i>
                            <span>+1 (123) 456-7890</span>
                        </a>
                        <a href="#" class="contact-info-btn">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Metropolis</span>
                        </a>
                    </div>
                    
                    <a href="#" class="btn btn-primary btn-block">Get Direction</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section section" id="gallery">
        <div class="container">
            <div class="gallery-wrapper">
                <div class="gallery-grid">
                    <!-- Row 1, Col 1 - Image -->
                    <div class="gallery-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-1.png" alt="Office Space">
                    </div>
                    
                    <!-- Row 1, Col 2 - Image -->
                    <div class="gallery-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-2.png" alt="Team Photo">
                    </div>
                    
                    <!-- Row 2, Col 1 - Image -->
                    <div class="gallery-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-3.png" alt="Team Meeting">
                    </div>
                    
                    <!-- Row 2, Col 2 - Image (Small) -->
                    <div class="gallery-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-4.png" alt="Team Group">
                    </div>
                    
                    <!-- Row 2, Col 3 - Image (Small) -->
                    <div class="gallery-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-5.png" alt="Team Portrait">
                    </div>
                    
                    <!-- Row 3, Col 1 - Text Box -->
                    <div class="gallery-item gallery-text-box">
                        <div class="section-badge">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/abstract-design.png" alt="Abstract Design" class="abstract-design">
                        </div>
                        <h3 class="gallery-title">Explore Estatein's World</h3>
                        <p class="gallery-description">
                            Step inside the world of Estatein, where professionalism meets warmth, and expertise meets passion. Our gallery offers a glimpse into our team and workspaces, inviting you to get to know us better.
                        </p>
                    </div>
                    
                    <!-- Row 3, Col 2 - Large Image (Spans 2 columns) -->
                    <div class="gallery-item gallery-large">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-6.png" alt="Handshake Meeting">
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