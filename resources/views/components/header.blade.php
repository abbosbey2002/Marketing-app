 <?php
    $lang = \Illuminate\Support\Facades\App::getLocale();
    ?> 
 
 <!-- Header -->
    <header id="bringer-header" class="is-frosted is-sticky" data-appear="fade-down" data-unload="fade-up">
        <!-- Desktop Header -->
        <div class="bringer-header-inner">
            <!-- Header Logo -->
            <div class="bringer-header-lp">
                <a href="/" class="bringer-logo">
                    <img src="./public/assets/img/logo.png" alt="bringer." width="88" height="24">
                </a>
            </div>
            <!-- Main Menu -->
            <div class="bringer-header-mp">
                <nav class="bringer-nav">
                    <ul class="main-menu" data-stagger-appear="fade-down" data-stagger-delay="75">
                        <li class="{{ Request::is('/') ? 'current-menu-item' : '' }}">
                            <a href="/">
                                @if($lang === 'uz')Bosh saxifa @endif
                                @if($lang === 'ru')Bosh saxifa @endif
                            </a>
                        </li>
                        <li class="{{ Request::is('page-providers') ? 'current-menu-item' : '' }}">
                            <a href="/page-providers">page-provider</a>
                        </li>
                        <li class="{{ Request::is('search-providers') ? 'current-menu-item' : '' }}">
                            <a href="/search-providers">search-providers</a>
                        </li>
                        <li class="{{ Request::is('single-providers') ? 'current-menu-item' : '' }}">
                            <a href="/single-providers">single-providers</a>
                        </li>
                        <li class="{{ Request::is('provider-login') ? 'current-menu-item' : '' }}">
                            <a href="/provider-login">Login</a>
                        </li>
                        <li class="{{ Request::is('provider-register') ? 'current-menu-item' : '' }}">
                            <a href="/provider-register">Register</a>
                        </li>
                    </ul>
                </nav>
            </div>


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                
                    const menuItems = document.querySelectorAll('.main-menu li');
    
                    menuItems.forEach(item => {
                    
                        item.addEventListener('click', function() {
                        
                            document.querySelector('.main-menu .current-menu-item')?.classList.remove('current-menu-item');
    
                            this.classList.add('current-menu-item');
                        });
                    });
                });
            </script>

            <!-- Header Button -->
            <div class="bringer-header-rp">
                <a href="/auth/login" class="bringer-button">Login</a>
            </div>
            <div class="bringer-header-rp">
                <a href="/auth/join" class="bringer-button">Sign up</a>
            </div>
        </div>
        <!-- Mobile Header -->
        <div class="bringer-mobile-header-inner">
            <a href="main.html" class="bringer-logo">
                <img src="./public/assets/img/logo.png" alt="bringer." width="88" height="24">
            </a>
            <a href="/" class="bringer-mobile-menu-toggler">
                <i class="bringer-menu-toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </i>
            </a>
        </div>
    </header>