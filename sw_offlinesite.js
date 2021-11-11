var offlineCacheName = 'wholeSiteCached';
var offlineURL = "offline.html";

var offlineSiteCache = 'offlineSite';



var resourcesToCache = [
    'frontpage/vendor.css',
    'frontpage/header-footer.scss.css',
    'frontpage/global.scss.css',
	'frontpage/themes.scss.css',
    'frontpage/arenafont.css',
    'frontpage/change_color.scss.css',
    'frontpage/rating.css',
    'frontpage/custom.css',
    'frontpage/lazysizes.min.js',
    'assets/main/css/color.css',
    'css/placeholder-loading.css',
    'assets/css/modal.css',
    'frontpage/scrollbar.css',
    'styles.scss.css',
    'frontpage/styles-2.scss.css',
    'frontpage/jquery-ui.css',
    'assets/css/easy-responsive-tabs.css',
    'mobile/css/jquery.toast.js',
    'frontpage/jquery-3.5.min.js',
    'frontpage/jquery.swiper.js',
    'frontpage/muuri.min.js',
    'mobile/js/jquery.toast.js',
    'mobile/node_modules/ionicons/dist/ionicons/ionicons.esm.js',
    'mobile/node_modules/ionicons/dist/ionicons/ionicons.js',
    'frontpage/bootstrap.4x.min.js',
    'frontpage/theme-sections.min.js',
    'frontpage/jquerry.plugin.min.js',
    'frontpage/bc.script.js',
    'js/app.js',
    'js/slick.min.js',
    'js/nouislider.min.js',
    'js/jquery.zoom.min.js',
    'frontpage/jquery-ui.js',
    'custom.js',
    'header.php',
    'header-bottom',
    'header-main',
    'index.php',
    'login.php',
    'register.php',
    'store.php',
    'detail.php',
    'category.php',
    'main-nav.php',
    'menu-mobile.php',
    'my-profile.php',
    'orders.php',
    'footer-bottom.php',
    'loadFrontCategories.php',
    'loadFrontProducts.php',
    'loadReturnItems.php',
    'loadToBeReview.php',
    'loadToBeShiped.php',
    'loadUnpaidOrder.php',
    'loadWishList.php',
    'app-setting.php',
    'img/emptycart2.png',
    'img/no-signal.png',
    'img/profile.jpg',
    'gif/categories-loading-unscreen.gif',
    'gif/cart-loading-unscreen.gif',
    'gif/loading.gif'

    


];

this.addEventListener('install', function(event){

	console.log('Service worker installing');

	event.waitUntil(

		caches.open(offlineSiteCache)
		.then(function(cache){
			//return cache.addAll(resourcesToCache);
            return cache.add(offlineURL);
		})
		.then(function(){
			return self.skipWaiting();
		})

	);

});

this.addEventListener('fetch', function(event){

	event.respondWith(

		fetch(event.request)
		.then(function(response){
			var responseClone = response.clone();
			caches.open(offlineCacheName)
			.then(function(cache){
				cache.put(event.request, responseClone);
			})
			return response;
		})
		.catch(function(){
			return caches.match(event.request)
			.then(function(response){
				return response || caches.match(offlineURL);
			});
		})

	);

});

/*this.addEventListener('fetch', function(event){

	event.respondWith(

		fetch(event.request)
		.catch(function(){
			return caches.match(event.request);
		})

	);

});*/