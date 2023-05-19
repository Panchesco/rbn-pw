// An object literal
const app = {
cards: document.querySelectorAll('.contributor-grid-card'),
videos: document.querySelectorAll('video'),
timeouts: {playing: [], paused: []},
reps: 3,
  init: function() {
    app.videosLoaded = Array(app.videos.length).fill(false);
	app.timeouts.playing = Array(app.videos.length).fill(-1);
	app.timeouts.paused = Array(app.videos.length).fill(1);
	app.fadeInCards();
	app.listenForScroll();
	app.scrollTop();
	app.activeLinks();
	app.loadVideos();
	this.reps = this.reps*1000;

  },
  fadeInCards: function() {

	   const wH = window.innerHeight;
	   const fadeInHeight = wH-12;
	   app.cards.forEach( (card,i) => {
		   if ( card.dataset.bg ) {
		   let viewportOffset = card.getBoundingClientRect();
		   if( viewportOffset.top <= fadeInHeight) {
		   let img = new Image()
		   img.src = card.dataset.bg;
		   img.addEventListener('load',() => {
			   card.style.backgroundImage = "url(" + card.dataset.bg + ")";
			   card.classList.add('fade-in');
		   		});
		   	}
		   }
	   })
   },
   loadVideos: function() {
	   document.querySelectorAll('video').forEach( (v,i) => {
		   v.addEventListener("loadeddata",(e) => {
		   		app.playVideo(v,i)
		   })
		   v.closest(".contributor-grid-card").addEventListener( "mouseover", (e) => {
			   app.playVideo(v,i)
			   e.target.addEventListener("mouseout", () => {
				   app.pauseVideo(v,i)
			   })
		   })
	   })
   },
   playVideo: function(v,i) {

	   	  v.classList.remove('pause')
		v.setAttribute("loop","loop")
		  v.play()
		setTimeout( () => {
			  v.classList.add('pause')
			  v.removeAttribute("loop")
			  v.pause()
		  } , (v.duration * this.reps) + 600)
   },
   pauseVideo: function(v,i) {

		   v.removeAttribute("loop")
		   v.pause()
		   setTimeout( () => {
			 v.classList.add('pause')
		 } , (v.duration * this.reps) + 600)
   },
   listenForScroll: function() {
	   window.addEventListener('scroll', () => {
		   app.fadeInCards()
	   })
   },
  scrollTop: function() {
	document.querySelector('[href="#header"]').addEventListener('click', (e) => {
	  e.preventDefault();
	  window.scrollTo({top: 0, behavior: 'smooth'});
	});
  },
  activeLinks: function() {
	  const currHref = window.location.href.replace(window.location.origin,"");
	  const navLinks = document.querySelectorAll(".nav-link");
	  navLinks.forEach( (item) => {
	  const activeHref = item.href.replace(window.location.origin,"");
	if( currHref.indexOf(activeHref) ) {
		 if( currHref.indexOf(activeHref) == 0 || activeHref == '/'){
			  item.classList.add('active')
		 };
	 }
	  })
  }
};

(function() {
  // your page initialization code here
  // the DOM will be available here
  app.init();
})();


( function () {
	'use strict';
	// Focus input if Searchform is empty
	[].forEach.call( document.querySelectorAll( '.search-form' ), ( el ) => {
		el.addEventListener( 'submit', function ( e ) {
			var search = el.querySelector( 'input' );
			if ( search.value.length < 1 ) {
				e.preventDefault();
				search.focus();
			}
		} );
	} );

	// Initialize Popovers: https://getbootstrap.com/docs/5.0/components/popovers
	var popoverTriggerList = [].slice.call( document.querySelectorAll( '[data-bs-toggle="popover"]' ) );
	var popoverList = popoverTriggerList.map( function ( popoverTriggerEl ) {
		return new bootstrap.Popover( popoverTriggerEl, {
			trigger: 'focus',
		} );
	} );
} )();




