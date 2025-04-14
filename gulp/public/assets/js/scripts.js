// =======================================================
// loading
// =======================================================

window.onload = function() {
	const spinner = document.getElementById('wrapper');
	spinner.classList.add('loaded');
}


window.addEventListener('load', function() {
	// デバイス判定
	$tablet = 768;
	$laptop = 1080;
	// var w = $(window).width();
	var width = window.innerWidth;


	// 関数：スムーススクロール
	function scrollToAnker(hash) {
		var target = $(hash);
		var position = target.offset().top;
		var win = $(window).width();
		var p = 980;
		if (win > p) {
			var offset = 70;
		} else {
			var offset = 80;
		}
		// var h_h = $("header").outerHeight();
		$('body,html').stop().animate({scrollTop:position - offset}, 500);
	}

	//通常のクリック時
	$('a[href^="#"]:not(._noanker a)').not('._btnVideo').click(function() {
		var href= $(this).attr("href");
		var hash = href == "#" || href == "" ? 'html' : href;
		scrollToAnker(hash);
		return false;
	});



	// bodyを固定する関数
	bodyFixFlag = false;

	function bodyFix() {
		const scrollPosi = $(window).scrollTop();
		$('body').css({
			'position': 'fixed',
			'width': '100%',
			'z-index': '1',
			'overflow-y': 'hidden',
			'top': -scrollPosi
		})
	}

	// body固定を解除する関数
	function bodyFixReset() {
		const scrollPosi = $('body').offset().top;
		$('body').css({
			'position': 'relative',
			'width': 'auto',
			'overflow-y': 'auto',
			'top': 'auto'
		})
		//scroll位置を調整
		$('html, body').scrollTop(-scrollPosi);
	}


	if($('#global_nav_btn').length){

		gnav = $('#global_nav');
		gnavBtn = $('#global_nav_btn');
		gnavOverlay = $('#global_nav_overlay');

		var tl = gsap.timeline({ paused: true });

		tl
			.to("#global_nav_overlay", { opacity: 1, visibility: 'visible', duration: 0.3, stagger: 0.03, ease: Power1.easeInOut })
			.to("#global_nav", { opacity: 1, visibility: 'visible', duration: 0.15, stagger: 0.06, ease: Power1.easeInOut })

		tl.reverse();


		function addHeigth(elm) {
			var elm = $(elm);
			var wH = $(window).innerHeight();
			elm.css({
				height: wH,
			})
		}

		function gnavOpen() {
			$('body').addClass('_open');
			gnav.addClass('_open');
			gnavBtn.addClass('_open');
			addHeigth(gnavOverlay);
			tl.reversed(!tl.reversed());
			// bodyを固定
			bodyFix();
			bodyFixFlag = true;
		};

		function gnavClose() {
			$('body').removeClass('_open');
			gnav.removeClass('_open');
			gnavBtn.removeClass('_open');
			addHeigth(gnavOverlay);
			tl.reversed(!tl.reversed());
			// bodyの固定解除
			bodyFixReset();
			bodyFixFlag = false;
		};



		gnavBtn.on('click', function(){
			if($(this).hasClass('_open')) {
				gnavClose();
			} else {
				gnavOpen();
			}
		});

		gnavOverlay.on('click', function(){
			gnavClose();
		});


		let resizeTimer;
		window.addEventListener('resize', function() {
			clearTimeout(resizeTimer)
			resizeTimer = setTimeout(function () {
				var width = window.innerWidth;
				if (width < 768) {
					globalNav();
				}
			}, 200)
		})
	}


	if($('#fv').length){
		if (width > 767) {
			$('#fv video').append('<source src="./cms/wp-content/themes/hellotokyo/assets/movie/fv.mp4" type="video/mp4">');
		} else {
			$('#fv video').append('<source src="./cms/wp-content/themes/hellotokyo/assets/movie/fv_sp.mp4" type="video/mp4">');
		}
	}


})




// アコーディオン
function accordion(parents, button, target, time) {
	var button = $(button);
	var parents = $(parents);
	var target = $(target);

	button.on('click', function(e) {
		e.preventDefault();
		$(this).toggleClass('_open')
		$(this).closest(parents).toggleClass('_open');
		$(this).closest(parents).find(target).slideToggle(time);
	});
}








