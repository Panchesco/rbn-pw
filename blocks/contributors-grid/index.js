
document.addEventListener("DOMContentLoaded", () => {
    const gridCards = {
        cards: [],
        init: function() {
            this.listenerInt()
        },
        listenerInt: function() {
            let intID = setInterval(() => {
            this.cards  = document.querySelectorAll('.contributor-grid-card')
            if( this.cards ) {
               if(this.cards.length != 0) {
                if(intID) {
                  clearInterval(intID)
                }
                this.showGridItems()
               }
            }
            },300)
        },
        showCards: function() {

        },
        clearInt: function() {
           clearInterval(this.listener);
        },
        showGridItems: function() {
         this.cards.forEach((card,i) => {
            const lnk = card.querySelector('a');
            lnk.addEventListener("click",(e) => {
               e.preventDefault();
            })
         })
        }
    }
   gridCards.init()
})
