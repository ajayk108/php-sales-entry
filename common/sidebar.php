<div class="l-navbar expander" id="navbar">
    <nav class="nav">
        <div>
            <div class="nav__brand">
                <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                <a href="#" class="nav__logo">Salse Entries </a>
            </div>
            <div class="nav__list">
                <a href="./addItems.php" class="nav__link <?php if($page=='addItems'){echo "active";} ?>">
                    <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Add Items</span>
                </a>
                <a href="./sales.php" class="nav__link <?php if($page=='sales'){echo "active";} ?>">
                    <ion-icon name="pie-chart-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Sales</span>
                </a>
                <a href="#" class="nav__link">
                    <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Settings</span>
                </a>
            </div>
        </div>

        <a href="./logout.php" class="nav__link">
            <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>