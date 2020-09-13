<?php

/** Request Info Button */
add_shortcode('cookyourbest-request-info-button', 'create_request_info_button');
/**
 * Request Info Button
 *
 * https://codex.wordpress.org/Function_Reference/site_url
 * $site_url = site_url();
 * <?php echo $site_url; ?>
 *
 * @return string
 */
function create_request_info_button()
{
    $site_url = site_url();
    ob_start();
    ?>

    <div class="align-center">
        <a href="<?php echo $site_url; ?>/contact/request-a-quote/">
            <img class="button-image" title="Grasscrete Projects - Request a Quote"
                 src="<?php echo $site_url; ?>/wp-content/uploads/2014/03/request_quote.png" alt="Request A Quote"
                 width="165" height="81"/>
        </a>
    </div>

    <?php
    return ob_get_clean();
}

