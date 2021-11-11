var offlineCacheName = 'wholeSiteCached';
var offlineURL = "offline.html";

var offlineSiteCache = 'offlineSite';



var resourcesToCache = [
    'vendor/materializeicon/material-icons.css',
    'vendor/materializeicon/MaterialIcons-Regular.woff2',
    'css/avatar.css',
	'css/animate.css',
    'css/animate.min.css',
    'css/animated.css',
    'css/default.css',
    'css/form-wizard-blue.css',
    'css/ionicons.min.css',
    'css/jquery.toast.css',
    'css/placeholder-loading.css',
    'css/placeholder-loading.min.css',
    'css/rating.css',
    'css/slider.css',
    'css/step_form.css',
    'css/style.css',
    'css/avatar.css',
    'css/src/bootstrap/bootstrap.min.css',
    'css/src/owl-carousel/owl.carousel.min.css',
    'css/src/owl-carousel/owl.theme.default.min.css',
    'js/lib/popper.min.js',
    'js/lib/bootstrap.min.js',
    'js/jquery.toast.js',
    'node_modules/ionicons/dist/ionicons/ionicons.esm.js',
    'node_modules/ionicons/dist/ionicons/ionicons.js',
    'js/app.js',
    'custom.js',
    'js/form-wizard.js',
    'login.php',
    'header.php',
    'footer.php',
    'index.php',
    'about.php',
    'app-setting.php',
    'bottom-menu.php',
    'cart.php',
    'search.php',
    'categories.php',
    'category-search.php',
    'checkout.php',
    'contact-us.php',
    'forgot-password.php',
    'get_address.php',
    'getStoreData.php',
    'header-bottom.php',
    'header-2.php',
    'process.php',
    'product_detail.php',
    'product_rating.php',
    'product-search.php',
    'register.php',
    'getMoreFailedOrder.php',
    'to_be_shipped.php',
    'getMoreToBeShiped.php',
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