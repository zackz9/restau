'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////

$(function () {
  $(document).scroll(function () {
    var $nav = $(".user-interface");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});


/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

var price = document.getElementById('price').value ;
document.getElementById('priceid').innerHTML = price ; 
$('#qte').on('keyup', function(){
	var qte = document.getElementById('qte').value ; 

	if(!isNaN(qte)) {
		if(qte !=''){
			if (qte <1) {
				alert('Entrez un numéro de quantité ');
				document.getElementById('qte').value='';
				document.getElementById('priceid').innerHTML = price;
			}
			else {

				document.getElementById('priceid').innerHTML =qte * price ;
			}
		}
	}
});



