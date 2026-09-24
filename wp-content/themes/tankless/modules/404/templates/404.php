<?php
    if( isset( $enable_404message ) && ( $enable_404message == 1 || $enable_404message == true )  ) {
        $class = $notfound_style;
        $class .= ( isset( $notfound_darkbg ) && ( $notfound_darkbg == 1 ) ) ? " wdt-dark-bg" :"";
    ?>
    <div class="wrapper <?php echo esc_attr( $class );?>">
        <div class="container">
            <div class="center-content-wrapper">
                <div class="center-content">
                    <div class="error-box square">
                        <div class="error-box-inner">
                        <img class="error-image" alt="The Page Not Found" src="<?php echo esc_url(GLIDEX_ROOT_URI.'/assets/images/404-image.png');?>"/>
                            <h4><?php esc_html_e("Taking a Wrong Turn? Let’s Get You Rolling Again!", 'glidex'); ?></h4>
                        </div>
                    </div>
                    <div class="wdt-hr-invisible-xsmall"></div>
                    <p><?php esc_html_e("Sorry, the page you are looking for cannot be found. It seems that the URL you were trying to access is either incorrect or the page has been removed.", 'glidex'); ?></p>
                    <div class="wdt-hr-invisible-xsmall"></div>
                    <a class="wdt-button filled small" target="_self" href="<?php echo esc_url(home_url('/'));?>">
                    <?php esc_html_e("Back to Home",'glidex');?></a>
                </div>
            </div>
        </div>
    </div><?php
}?>