	<header class="header bg-dark" id="header">
		<div class="header__toggle">
			<i class='bx bx-menu' id="header-toggle"></i>
			<a style="color: white" style="font-size: 1.6rem;" ><img src="images/logo.jpg" alt="" width="40" height="40" class="d-inline-block align-text-top"> Amrut Portal</a>
		</div>
	</header>

	<div class="l-navbar bg-dark" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    
                </a>
                <div class="nav__list">
                    <?php
                        if ($_SESSION['access'] >= 30) {
                            ?>
                            <a href="teacher.php" class="nav__link">
                                <i class='bx bx-video nav__icon' ></i>
                                <span class="nav__name">Capture</span>
                            </a>
                            
                            <a href="view.php" class="nav__link">
                                <i class='bx bx-search-alt nav__icon ' ></i>
                                <span class="nav__name">View</span>
                            </a>
                            
                            <a href="register.php" class="nav__link">
                                <i class='bx bx-user nav__icon' ></i>
                                <span class="nav__name">Register Staff</span>
                            </a>

                            <a href="manage.php" class="nav__link">
                                <i class='bx bx-layer nav__icon' ></i>
                                <span class="nav__name">Staff Management</span>
                            </a>

                            <?php
                    }
                ?>
                    <?php
                        if ($_SESSION['access'] == 20) {
                            ?>
                            <a href="teacher.php" class="nav__link">
                                <i class='bx bx-video nav__icon' ></i>
                                <span class="nav__name">Capture</span>
                            </a>
                            
                            <a href="view.php" class="nav__link">
                                <i class='bx bx-search-alt nav__icon ' ></i>
                                <span class="nav__name">View</span>
                            </a>
                            <?php
                    }
                ?>

                            <a href="profile.php" class="nav__link">
                                <i class='bx bx-user nav__icon' ></i>
                                <span class="nav__name">Profile</span>
                            </a>

                </div>
            </div>

            <a href="logout.php" class="nav__link">
                <i class='bx bx-log-out nav__icon' ></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>
<!--===== MAIN JS =====-->
<script src="include/js/main.js"></script>