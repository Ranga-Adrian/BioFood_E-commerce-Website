<?php
require_once "conexiune.php";

?>

<!-- Vanzari de top Inceput -->
        <section id="vanzari-top">
            <div class="container py-5">
                <h4 class="font-monospace">Vanzari de Top</h4>
                <hr>
                <!-- Owl Carusel Inceput-->
                <div class="owl-carousel owl-theme">
                    <?php require_once "conexiune.php";
                    
                    $rec = mysqli_query($conn, "select * from produse where COD_PRODUS = 1 || COD_PRODUS = 11 || COD_PRODUS = 30 || COD_PRODUS = 14 || COD_PRODUS = 22");

                    while($element = mysqli_fetch_array($rec, MYSQLI_ASSOC)){ ?>

                    <div class="item py-2">
                        <div class="product font-rale">
                            <a href="#"><img src=<?php echo $element['IMAGINE'] ?> alt="" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $element['DENUMIRE'] ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo $element['PRET'] ?> lei</span>
                                </div>
                                <form action="cos.php" method="post">
                                        <div>
                                            <input type="number" placeholder="Nr.buc:" name="cantitate" id="cantitate" min=<?php if($element['STOC'] == 0) echo 0; else echo 1;?> max="<?php echo $element['STOC'] ?>">
                                        </div>
                                        <input type="hidden" name="DENUMIRE" value="<?php echo $element['DENUMIRE'] ?>">
                                        <input type="hidden" name="PRET" value="<?php echo $element['PRET'] ?>">
                                        <input type="hidden" name="IMAGINE" value="<?php echo $element['IMAGINE'] ?>">
                                        <input type="hidden" name="CATEGORIE" value="<?php echo $element['CATEGORIE'] ?>">
                                        <input type = "hidden" name = "counter" value = "0" />
                                        <input type = "hidden" name = "sumaTotala" value = "0" />
                                        <?php if($element['STOC'] == 0){ ?>
                                            <button type="button" disabled class="btn btn-danger">Stoc epuizat</button>
                                            <?php } else{ ?>
                                                    <button type="submit" <?php if(empty($_SESSION['TipUtilizator'])){ ?> disabled="disabled" <?php } ?> name="adaugaCos" class="btn btn-warning">Adauga cos</button>
                                            <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- Owl Carusel Sfarsit-->
            </div>
        </section>

        <!-- Vanzari de top Sfarsit -->
