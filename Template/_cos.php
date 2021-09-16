<?php 
    require_once "conexiune.php";

?>
        <!-- Cos cumparaturi sectiunie Inceput -->
        <div id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 style="font-size:20px;">Cos de cumparaturi</h5>

                <!-- Cos cumparaturi obiecte -->
                <div class="row">
                    <div class="col-sm-9">

                    <?php require_once "conexiune.php";

                        $nume = $_SESSION['NumeUtilizator'];

                        $rec = mysqli_query($conn,"SELECT * FROM `coscumparaturi` WHERE `NUME_UTILIZATOR` = '{$nume}'") or die (mysqli_error($conn));
                        while($element = mysqli_fetch_array($rec, MYSQLI_ASSOC)){ ?>

                                

                        <!-- obiecte cos -->
                        <div class="row py-3 mt-3 border-top">
                            <div class="col-sm-2">
                                <img src="<?php echo $element['IMAGINE']?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5><?php echo $element['DESCRIERE']?></h5>
                                <!-- <small>de Hamle</small> -->
        
                                <!-- Cantitate produs -->
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex w-50">

                                        <div><h5>Nr. de bucati introduse : <?php echo $element['CANTITATE']?></h5></div>

                                    </div>
                                    <?php echo '<a href="sterge.php?id_comanda='.$element['ID_COMANDA'].'&stoc='.$element['CANTITATE'].'&descriere='.$element['DESCRIERE'].
                                                                                '"><i class="fas fa-trash-alt px-3 border-right text-danger"></i></a>';?>
                                </div>
                                <!-- !Cantitate produs -->


                            </div>
        
                            <div class="col-sm-2 text-right">
                                <div class="text-danger">
                                    <span class="pret_produs"><?php echo $element['SUMA_TOTALA']?></span> lei
                                </div>
                            </div>
                            

                            <div class="col-sm-3"></div>
                        </div>
                        <?php
                            $rezultat = mysqli_query($conn,"SELECT SUM(SUMA_TOTALA) AS `total` FROM `coscumparaturi`") or die (mysqli_error($conn));
                            $total = mysqli_fetch_assoc($rezultat);
                            $rezultat2 = mysqli_query($conn,"SELECT SUM(CANTITATE) AS `totalProduse` FROM `coscumparaturi`") or die (mysqli_error($conn));
                            $totalProduse = mysqli_fetch_assoc($rezultat2);
                            } ?>

                        <!-- !Cos cumparaturi obiecte -->
                    </div>
                        <!-- subtotal section-->

                            <div class="col-sm-3">
                                <form action="coscumparaturiFinal.php" method="post">
                                    <input type="hidden" name="numeUtilizator" value="<?php echo $nume;?>">
                                    <div class="sub-total border text-center mt-2">
                                        <?php if($total['total'] > 99){?>
                                        <h6 class="text-success py-3"><i class="fas fa-check"></i>Comanda dumneavoastra este eligibila pentru transportul GRATUIT. </h6>
                                        <?php } else{ echo "<h6 class='text-info py-3'><i class='fas fa-shipping-fast'></i>Cumparati de inca ". 100-$total['total'].
                                                                                                                            " lei pentru a beneficia de transport gratuit </h6>"; }?>
                                        <div class="border-top py-4">
                                            <?php if($total['total'] < 101){ 
                                                echo "<h5>Total (".$totalProduse['totalProduse']." produse):&nbsp;  <span class='text-danger'><span class='text-danger' id='deal-price'>"
                                                        .$total['total']+25 ."</span> lei </span> </h5>";
                                                        ?><input type="hidden" name="taxaTransport" value="<?php echo 25;?>"><?php
                                                echo "<h6> + <span class='text-danger'>25 lei<span class='text-danger' id='deal-price'></span>  </span> taxa de transport</h6>";
                                                } else {
                                                    echo "<h5>Total (".$totalProduse['totalProduse']." produse):&nbsp;  <span class='text-danger'><span class='text-danger' id='deal-price'>"
                                                            .$total['total']."</span> lei </span> </h5>";
                                                            ?>  <input type="hidden" name="taxaTransport" value=<?php echo 0; ?> >  <?php } ?>
                                                    

                                            <button type="submit" name="finalizeazaCumparaturi" class="btn btn-warning mt-3">Finalizeaza cumparaturile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                
                        <!-- !subtotal section-->
                </div>

                

            </div>
        </div>

        <!-- Cos cumparaturi sectiunie Sfarsit -->
