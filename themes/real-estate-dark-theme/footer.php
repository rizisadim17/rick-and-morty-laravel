</main><!-- Close main content -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <!-- Footer Top - Main Content -->
            <div class="footer-content">
                <!-- Column 1 - Logo & Newsletter -->
                <div class="footer-column footer-brand">
                    <div class="footer-logo">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                                <span class="logo-icon">
                                    <i class="fas fa-home"></i>
                                </span>
                                <span class="logo-text-name">Estatein</span>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Newsletter Signup -->
                    <div class="footer-newsletter">
                        <form class="newsletter-form">
                            <div class="newsletter-input-wrapper">
                                <i class="fas fa-envelope newsletter-icon"></i>
                                <input type="email" placeholder="Enter Your Email" class="newsletter-input" required>
                                <button type="submit" class="newsletter-submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Column 2 - Home -->
                <div class="footer-column">
                    <h3 class="footer-title">Home</h3>
                    <ul class="footer-menu">
                        <li><a href="#hero">Hero Section</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#properties">Properties</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                        <li><a href="#faq">FAQs</a></li>
                    </ul>
                </div>

                <!-- Column 3 - About Us -->
                <div class="footer-column">
                    <h3 class="footer-title">About Us</h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url('/about#story'); ?>">Our Story</a></li>
                        <li><a href="<?php echo home_url('/about#works'); ?>">Our Works</a></li>
                        <li><a href="<?php echo home_url('/about#how-it-works'); ?>">How It Works</a></li>
                        <li><a href="<?php echo home_url('/about#team'); ?>">Our Team</a></li>
                        <li><a href="<?php echo home_url('/about#clients'); ?>">Our Clients</a></li>
                    </ul>
                </div>

                <!-- Column 4 - Properties -->
                <div class="footer-column">
                    <h3 class="footer-title">Properties</h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url('/properties'); ?>">Portfolio</a></li>
                        <li><a href="<?php echo home_url('/properties/categories'); ?>">Categories</a></li>
                    </ul>
                </div>

                <!-- Column 5 - Services -->
                <div class="footer-column">
                    <h3 class="footer-title">Services</h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url('/services#valuation'); ?>">Valuation Mastery</a></li>
                        <li><a href="<?php echo home_url('/services#marketing'); ?>">Strategic Marketing</a></li>
                        <li><a href="<?php echo home_url('/services#negotiation'); ?>">Negotiation Wizardry</a></li>
                        <li><a href="<?php echo home_url('/services#closing'); ?>">Closing Success</a></li>
                        <li><a href="<?php echo home_url('/services#management'); ?>">Property Management</a></li>
                    </ul>
                </div>

                <!-- Column 6 - Contact Us -->
                <div class="footer-column">
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url('/contact'); ?>">Contact Form</a></li>
                        <li><a href="<?php echo home_url('/contact#offices'); ?>">Our Offices</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Footer Bottom - Copyright & Social -->
        <div class="footer-bottom">
            <div class="footer-copyright">
                <p>&copy;2023 Estatein. All Rights Reserved. <a href="<?php echo home_url('/terms'); ?>" class="terms-link">Terms & Conditions</a></p>
            </div>
            
            <div class="footer-social">
                <a href="https://facebook.com" target="_blank" rel="noopener" class="social-link">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" rel="noopener" class="social-link">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://twitter.com" target="_blank" rel="noopener" class="social-link">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://youtube.com" target="_blank" rel="noopener" class="social-link">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>