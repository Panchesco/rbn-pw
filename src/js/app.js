// An object literal
const app = {
  init: function() {
    app.fadeInCards();
    app.listenForScroll();
	app.activeLinks();
  },
  fadeInCards: function() {
       const cards = document.querySelectorAll('.contributor-grid-card');
       const wH = window.innerHeight;
       const fadeInHeight = wH-42;
       cards.forEach( (card) => {
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
   listenForScroll: function() {
       window.addEventListener('scroll', () => {
           app.fadeInCards()
       })
   },
  scrollTop: function() {
    window.scrollTo({top: 0, behavior: 'smooth'});
  },
  activeLinks: function() {
	  const currHref = window.location.href.replace(window.location.origin,"");
	  const navLinks = document.querySelectorAll("#menu-global-nav li a");
	  navLinks.forEach( (item) => {
		 if(currHref==item.href.replace(window.location.origin,"")){
			  item.classList.add('active')
		 };
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

console.log(window.location.href);



