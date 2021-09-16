<?php
    require_once "conexiune.php";
    if(isset($_POST['editeazaProdus'])){
        
        $identificator = $_POST['cod_Produs'];
        $codProdus1 = $_POST['CodProdus'];
        $codFurnizor1 = $_POST['CodFurnizor'];
        $denumire1 = $_POST['Denumire'];
        $pret1 = $_POST['Pret'];
        $stoc1 = $_POST['Stoc'];
        $categorie1 = $_POST['Categorie'];
        $imagine1 = $_POST['incarcaImagine'];
            

        $querry = "UPDATE `produse` SET `COD_PRODUS`='$codProdus1',`COD_FURNIZOR`='$codFurnizor1',
                    `DENUMIRE`='$denumire1',`PRET`='$pret1',`STOC`='$stoc1',`IMAGINE`='$imagine1',
                    `CATEGORIE`='$categorie1' WHERE `COD_PRODUS`=$identificator";
        


        if($conn->query($querry) === TRUE){
            echo "Produsul a fost modificat cu succes";
        } else {
            echo "Eroare la conectare!";
        }
        
        header('Location: index_admin.php?editare=succes');

    }

?>