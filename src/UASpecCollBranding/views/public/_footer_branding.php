<div class="block" id="custom-footer-text">
    <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
        <p><?php echo $footerText; ?></p>
    <?php endif; ?>
    <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
    <?php endif; ?>
</div>

<div class="ua-speccoll-branding-footer" id="ua-speccoll-branding-footer">
    <div class="ua-speccoll-branding-footer__row">
        <div class="ua-speccoll-branding-footer__col">
            <h4>Special Collections at the <br><a href="http://www.library.arizona.edu/">University of Arizona Libraries</a></h4>
            <p>1510 E. University Blvd.</p>
            <p>Tucson, AZ 85721</p>
            <p>520-621-6423</p>
        </div>

        <div class="ua-speccoll-branding-footer__col">
            <h4><a href="http://speccoll.library.arizona.edu/hours-location-parking" rel="nofollow">Location and Hours</a></h4>
            <a class="ua-speccoll-branding-footer__map-icon" href="http://speccoll.library.arizona.edu/hours-location-parking" rel="nofollow">Map</a>
            <p>Monday - Friday</p>
            <p>9&nbsp;a.m. -&nbsp;6 p.m.</p>
            <p>Closed Saturdays and Sundays</p>
        </div>

        <div class="ua-speccoll-branding-footer__col">
            <h4><a href="#">Support Special Collections</a></h4>
            <p>Our publicly available collections are made possible by the generosity of others.</p>
            <p><a href="http://speccoll.library.arizona.edu/support" class="ua-speccoll-branding-footer__button">Make a donation to help preserve our history.</a></p>
        </div>
    </div>
</div>
