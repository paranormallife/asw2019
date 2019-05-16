<nav id="headerNav" class="header-nav">

    <ul id="header-icons">
        <li class="phone"><a href="tel:<?php echo get_option('phone'); ?>"><i class="fas fa-phone"></i></a></li>
        <li class="menu">
            <span onClick="navToggle()">
                <span class="menu-closed"><i class="fas fa-bars"></i></span>
                <span class="menu-open"><i class="fas fa-times"></i></span>
            </span>
        </li>
        <li class="email"><a href="mailto:<?php echo get_option('email'); ?>"><i class="fas fa-envelope"></i></a></li>
    </ul>

    <div id="navToggle">
        <div class="nav-container">
            <?php wp_nav_menu( array( 'theme_location' => 'nav1' ) ); ?>
        </div>
    </div>

</nav>