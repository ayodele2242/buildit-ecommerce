  <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="index.php" class="item <?php if( $current_page == 'index' ){ echo "active flex-hcc"; } ?>">
            <div class="col">
                <i class="material-icons icon">home</i>
                <strong>Home</strong>
            </div>
        </a>
        <a href="categories.php" class="item <?php if( $current_page == 'categories' ){ echo "active flex-hcc"; } ?>">
            <div class="col">
            <i class="material-icons icon">menu</i>
                <strong>Categories</strong>
            </div>
        </a>
        <!--<a href="app-components.html" class="item icon-main flex-hcc">
            <div class="col">
                <ion-icon class="col-white" name="add-outline"></ion-icon>
            </div>
        </a>-->
        <a href="app-setting" class="item <?php if( $current_page == 'app-setting' ){ echo "active flex-hcc"; } ?>">
            <div class="col">
            <i class="material-icons icon">person</i>
                <strong>Account</strong>
            </div>
        </a>
        <a href="app-settings.html" class="item">
            <div class="col">
                 <i class="material-icons icon">comment</i>
                <strong>Help</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->