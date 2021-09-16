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
                        <!--!Cos gol-->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-12 text-center py-3">
                                <img src="./assets/images/empty_cart.png" alt="Cos Gol" class="img-fluid" style="height:200px;">
                                <p class="text-black-50" style="font-size:14px;">Cosul de cumparaturi este gol</p>
                            </div>
                        </div>
                        <!--Cos gol-->
                    </div>
                        <!-- subtotal section-->
                        <?php 
                        $rezultat = mysqli_query($conn,"SELECT SUM(SUMA_TOTALA) AS `total` FROM `coscumparaturi`") or die (mysqli_error($conn));
                            $total = mysqli_fetch_assoc($rezultat); ?>
                        <div class="col-sm-3">
                                <form action="coscumparaturiFinal.php" method="post">
                                    <input type="hidden" name="numeUtilizator" value="<?php echo $nume;?>">
                                    <div class="sub-total border text-center mt-2">
                                        <?php if($total['total'] > 99){?>
                                        <h6 class="text-success py-3"><i class="fas fa-check"></i>Comanda dumneavoastra este eligibila pentru transportul GRATUIT. </h6>
                                        <?php } else{ echo "<h6 class='text-info py-3'><i class='fas fa-shipping-fast'></i>Cumparati de minim ". 100 . " lei pentru a beneficia de transport gratuit </h6>"; }?>
                                        <div class="border-top py-4">
                                            <h5>Total (0 produse):&nbsp; <span class="text-danger"><span class="text-danger" id="deal-price"><?php echo $total['total'];?></span>lei </span> </h5>
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
