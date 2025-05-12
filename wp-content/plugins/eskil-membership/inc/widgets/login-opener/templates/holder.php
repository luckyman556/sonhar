<?php

if ( is_user_logged_in() ) {
	eskil_membership_template_part( 'widgets/login-opener', 'templates/logged-in-content' );
} else {
	eskil_membership_template_part( 'widgets/login-opener', 'templates/logged-out-content' );
}
