<?php
require_once "conexiune.php";
$totalProduse = $produs->getData('produse');
?>
<?php 
    $brand = array_map(function($prod){return $prod['CATEGORIE'];},$totalProduse);
    $unic = array_unique($brand);
    sort(array: $unic);
?>
        <!-- Gama produse Inceput-->
        <section id="gama-produse">
            <div class="container">
                <h4>Gama de produse</h4>
                <div id="filters" class="button-group text-end" role="group">
                    <button class="btn is-checked" data-filter="*">Toate produsele</button>
                    <?php
                        array_map(function($brand){
                            printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                        },$unic);
                    ?>
                </div>

                <div class="grid">
                    <?php array_map(function($element){?>
                    <div class="grid-item <?php echo $element['CATEGORIE'];?>" style="border: 2px inset greenyellow;">
                        <div class="item py-2">
                            <div class="py-2" style="width: 10em;">
                                <div class="product">
                                    <a href="#"><img src="<?php echo $element['IMAGINE']?>"  alt=""
                                            class="img-fluid"></a>
                                    <div class="text-center">
                                        <h6 style="font-size:0.8em"><?php echo $element['DENUMIRE']?></h6>
                                        <div class="rating text-warning font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                        <div class="price py-2">
                                            <span><?php echo $element['PRET']?> lei</span>
                                        </div>
                                        <form action="cos.php" method="post">
                                        <div>
                                            <input type="number" placeholder="Nr.buc:" name="cantitate" id="cantitate" min=<?php if($element['STOC'] == 0) echo 0;
                                                                                                                        else echo 1;?> max="<?php echo $element['STOC'] ?>">
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
                        </div>
                    </div>
                    <?php },$totalProduse) ?>

                </div>
            </div>
        </section>

        <!-- Gama produse Sfarsit-->
