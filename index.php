<?php 
    //include header.php
    include('header.php')
?>

<?php
    //include _carusel.php
    include('Template/_carusel.php')

?>

        <!-- Utilitati Inceput-->

        <section class="utilitati">
            <div class="continut">
                <div class="row text-center">
                    <div class="col-md-3 text-center d-flex align-self-strech">
                        <article class="card card-body">
                            <figure class="text-centrat">
                                <span class="icon-md mb-2">
                                    <img src="assets/images/f-car.png" alt="">
                                </span>
                                <figcaption class="pt-4">
                                    <h5 class="mb-3">Transport Gratuit</h5>
                                    <p>Transport gratuit pe toata Romania pentru comenzile peste 100 RON</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>

                    <div class="col-md-3">
                        <article class="card card-body">
                            <figure class="text-center">
                                <span class="icon-md mb-2">
                                    <img src="assets/images/f-headphone.png" alt="">
                                </span>
                                <figcaption class="pt-4">
                                    <h5 class="mb-3">Suport 24/7</h5>
                                    <p>Oferim suport 24h pe zi </p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>

                    <div class="col-md-3">
                        <article class="card card-body">
                            <figure class="text-center">
                                <span class="icon-md mb-2">
                                    <img src="assets/images/f-money.png" alt="">
                                </span>
                                <figcaption class="pt-4">
                                    <h5 class="mb-3">100% Banii Inapoi</h5>
                                    <p>Oferim suport 24h pe zi </p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>


                    <div class="col-md-3">
                        <article class="card card-body">
                            <figure class="text-center">
                                <span class="icon-md mb-2">
                                    <img src="assets/images/f-security.png" alt="">
                                </span>
                                <figcaption class="pt-4">
                                    <h5 class="mb-3">Plata securizata</h5>
                                    <p>Asiguram siguranta platii</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>

            </div>

        </section>

        <!-- Utilitati  Sfarsit-->

<?php 
    //include _vanzariTop.php
    include('Template/_vanzariTop.php')

?>


<?php 
    //include _gamaProduse.php
    include('Template/_gamaProduse.php')

?>

<?php 
    //include _blog.php
    include('Template/_blog.php')

?>

<?php 
    //include _contact.php
    include('Template/_contact.php')

?>



        <!-- Buton Inapoi sus -->
        <button
        type="button"
        class="btn btn-floating btn-lg"
        id="btn-back-to-top"
        >
        <i class="fas fa-arrow-up"></i>
        </button>

        <!-- !Buton Inapoi sus -->
    


        <!-- Sfarsit sectiune Contact -->

<?php 
    //include footer.php
    include('footer.php');

?>