
<footer class="bg-dark text-center text-white" style="position: relative;" >
  <!-- Grid container -->
  <div class="container p-4">
    
    

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">À PROPOS</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Qui sommes-nous ?</a>
            </li>
            <li>
              <a href="#!" class="text-white">Nous rejoindre</a>
            </li>
            <li>
              <a href="#!" class="text-white">L’Avenir a du bon</a>
            </li>
            
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">INFORMATIONS LÉGALES</h5>

          <ul class="list-unstyled mb-0" >
            <li>
              <a href="#!" class="text-white">Conditions générales d’utilisation</a>
            </li>
            <li>
              <a href="#!" class="text-white">Conditions générales de vente</a>
            </li>
            <li>
              <a href="#!" class="text-white">Vie privée / cookies</a>
            </li>
            
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">NOS SOLUTIONS PROS</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Publicité</a>
            </li>
            <li>
              <a href="#!" class="text-white">Annuaire des professionnels</a>
            </li>
            <li>
              <a href="#!" class="text-white">Professionnels de l’auto</a>
            </li>
            
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">DES QUESTIONS ?</h5>

          <ul class="list-unstyled mb-0" >
            <li>
              <a href="#!" class="text-white " style="text-decoration: none;">Votre dossier de location en ligne</a>
            </li>
            <li>
              <a href="#!" class="text-white">Aide</a>
            </li>
            <li>
              <a href="#!" class="text-white">Statut de nos services</a>
            </li>
            
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-white" href="/">FreeAds</a>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script type="text/javascript">
//	window.addEventListener("resize", function() {
//		"use strict"; window.location.reload(); 
//	});


	document.addEventListener("DOMContentLoaded", function(){
        

    	/////// Prevent closing from click inside dropdown
		document.querySelectorAll('.dropdown-menu').forEach(function(element){
			element.addEventListener('click', function (e) {
			  e.stopPropagation();
			});
		})



		// make it as accordion for smaller screens
		if (window.innerWidth < 992) {

			// close all inner dropdowns when parent is closed
			document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
				everydropdown.addEventListener('hidden.bs.dropdown', function () {
					// after dropdown is hidden, then find all submenus
					  this.querySelectorAll('.submenu').forEach(function(everysubmenu){
					  	// hide every submenu as well
					  	everysubmenu.style.display = 'none';
					  });
				})
			});
			
			document.querySelectorAll('.dropdown-menu a').forEach(function(element){
				element.addEventListener('click', function (e) {
		
				  	let nextEl = this.nextElementSibling;
				  	if(nextEl && nextEl.classList.contains('submenu')) {	
				  		// prevent opening link if link needs to open dropdown
				  		e.preventDefault();
				  		console.log(nextEl);
				  		if(nextEl.style.display == 'block'){
				  			nextEl.style.display = 'none';
				  		} else {
				  			nextEl.style.display = 'block';
				  		}

				  	}
				});
			})
		}
		// end if innerWidth

	}); 
	// DOMContentLoaded  end
</script>

</footer>