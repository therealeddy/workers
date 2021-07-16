const scrollToTop = () => {
	jQuery("button#btn-top").click(function() {
		jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
}

const galleryAnimationScroll = () => {
	
	gsap.registerPlugin(ScrollTrigger);

	const sections = gsap.utils.toArray(".item-galerry");
	let maxWidth = 0;

	const getMaxWidth = () => {
		maxWidth = 0;
		sections.forEach((section) => {
			maxWidth += section.offsetWidth;
		});
	};
	
	getMaxWidth();

	ScrollTrigger.addEventListener("refreshInit", getMaxWidth);

	gsap.to(sections, {
		x: () => `-${maxWidth - window.innerWidth}`,
		ease: "none",
		scrollTrigger: {
			trigger: ".gallery",
			pin: true,
			scrub: true,
			end: () => `+=${maxWidth}`,
			invalidateOnRefresh: true
		}
	});

	sections.forEach((sct, i) => {
		ScrollTrigger.create({
			trigger: sct,
			start: () => 'top top-=' + (sct.offsetLeft - window.innerWidth/2) * (maxWidth / (maxWidth - window.innerWidth)),
			end: () => '+=' + sct.offsetWidth * maxWidth,
			toggleClass: {targets: sct, className: "active"}
		});
	});
}

const hideShowAnimationScroll = () => {
	function animateFrom(elem, direction) {
		direction = direction || 1;
		var x = 0,
				y = direction * 100;
		if(elem.classList.contains("gs_reveal_fromLeft")) {
			x = -200;
			y = 0;
		} else if (elem.classList.contains("gs_reveal_fromRight")) {
			x = 200;
			y = 0;
		} else if (elem.classList.contains("gs_reveal_fromTop")) {
			x = 0;
			y = -200;
		} else if (elem.classList.contains("gs_reveal_fromBottom")) {
			x = 0;
			y = 200;
		}
		elem.style.transform = "translate(" + x + "px, " + y + "px)";
		elem.style.opacity = "0";
		gsap.fromTo(elem, {x: x, y: y, autoAlpha: 0}, {
			duration: 2, 
			x: 0,
			y: 0, 
			autoAlpha: 1, 
			ease: "expo", 
			overwrite: "auto"
		});
	}
	
	function hide(elem) {
		gsap.set(elem, {autoAlpha: 0});
	}
	
	gsap.registerPlugin(ScrollTrigger);
	
	gsap.utils.toArray(".gs_reveal").forEach(function(elem) {
		hide(elem);
		
		ScrollTrigger.create({
			trigger: elem,
			onEnter: function() { animateFrom(elem) }, 
			onEnterBack: function() { animateFrom(elem, -1) },
			onLeave: function() { hide(elem) }
		});
	});
}

const parallaxAnimationScroll = () => {
	gsap.to(".contentParallax", {
		yPercent: -100,
		ease: "none",
		scrollTrigger: {
			trigger: ".sectionParallax",
			start: "top bottom",
			end: "bottom top",
			scrub: true
		}, 
	});
}

const parallaxBackground = () => {
	gsap.utils.toArray(".parallax-back").forEach((section, i) => {
		section.bg = section.querySelector(".bg"); 

		if (i) {
			section.bg.style.backgroundPosition = `50% ${-innerHeight / 2}px`;
	
			gsap.to(section.bg, {
				backgroundPosition: `50% ${innerHeight / 2}px`,
				ease: "none",
				scrollTrigger: {
					trigger: section,
					scrub: true
				}
			});
		} 

		else {
			section.bg.style.backgroundPosition = "50% 0px"; 
	
			gsap.to(section.bg, {
				backgroundPosition: `50% ${innerHeight / 2}px`,
				ease: "none",
				scrollTrigger: {
					trigger: section,
					start: "top top", 
					end: "bottom top",
					scrub: true
				}
			});
		}
	});
}

const actionsModal = () => {
	jQuery('.modal-video').on('hidden.bs.modal', function (e) {
		if(jQuery('.modal-video video')) {
			jQuery('.modal-video video').trigger('pause');
		}

		if(jQuery('.modal-video iframe')) {
			var iframe = jQuery('.modal-video iframe').get(0);
			var player = new Vimeo.Player(iframe);
			player.pause();
		}
	})
}

const menuAction = () => {
	jQuery('.main-header .content button').click(function() {
		jQuery('.main-header .menu-open-modal').addClass("active")
		jQuery('body').addClass("modal-body-open")
	})

	jQuery('.main-header .menu-open-modal button.bg-close, .main-header .menu-open-modal button.btn-close, #menu-header a').click(function() {
		jQuery('.main-header .menu-open-modal').removeClass("active")
		jQuery('body').removeClass("modal-body-open")
	})
}

const scrollEase = () => {
	jQuery('a.ease-scroll').on('click', function(event){
		event.preventDefault();
		const hash = this.hash;
		jQuery('html, body').animate({
				scrollTop: jQuery(hash).offset().top
		}, 500);
	});
}

const slider = () => {
	jQuery('.slider').slick({
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	});
}

jQuery('document').ready(function(){
	scrollToTop();
	// galleryAnimationScroll();
	hideShowAnimationScroll();
	parallaxAnimationScroll();
	parallaxBackground();
	actionsModal();
	menuAction();
	scrollEase();
	slider();
});