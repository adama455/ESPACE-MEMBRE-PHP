
<?php
require_once('connexiondb.php');
    $idc=isset($_GET['idC'])?$_GET['idC']:"0";
    $requete="select * from cotisation where id=$idc";
    $result=$pdo->query($requete);
    $cotisation=$result->fetch();
    $numcotis=$cotisation['numcotis'];        
    $date=$cotisation['datecotis'];
    $mois=$cotisation['mois'];
    $motif=$cotisation['motif'];
    $montant=$cotisation['montant'];
    $matricule=$cotisation['matricule'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de style -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
    
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <title>SaisieCotisation</title>
</head>
<body>

   <div class="container col-sm-7 mt-5">
   <form method="post" action="controlemodifiercotisation.php" class="form-control">
   <br><h2 class="text-center">MODIFIER COTISATION</h2><br><br>
        <label for="numcotis"><b>ID: <?php echo $idc?></b>
            <input type="hidden" name="idC" class="form-control" value="<?php echo $idc?>" required>
        </label> 
        <br><br>
        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">N° Cotisation</label>
        <div class="col-sm-10 ">
        <input type="text" class="form-control" name="numcotis" value="<?php echo $numcotis ?>" required>
        </div>
        </div>
    
        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" name="date" value="<?php echo $date ?>">
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Mois</label>
        <div class="col-sm-10">
            <select class="select" name="mois" >
                    <option value=""></option>
                    <option value="Janvier" <?php if($mois=="Janvier") echo "selected" ?>>Janvier</option>
                    <option value="Février" <?php if($mois=="Fevrier") echo "selected" ?>>Février</option>
                    <option value="Mars" <?php if($mois=="Mars") echo "selected" ?>>Mars</option>
                    <option value="Avril" <?php if($mois=="Avril") echo "selected" ?>>Avril</option>
                    <option value="Mai" <?php if($mois=="Mai") echo "selected" ?>>Mai</option>
                    <option value="Juin" <?php if($mois=="Juin") echo "selected" ?>>Juin</option>
                    <option value="Juillet" <?php if($mois=="Juillet") echo "selected" ?>>Juillet</option>
                    <option value="Août" <?php if($mois=="Aout") echo "selected" ?>>Août</option>
                    <option value="Septembre" <?php if($mois=="Septembre") echo "selected" ?>>Septembre</option>
                    <option value="Octobre" <?php if($mois=="Octobre") echo "selected" ?>>Octobre</option>
                    <option value="Novembre"<?php if($mois=="Novembre") echo "selected" ?>>Novembre</option>
                    <option value="Decembre" <?php if($mois=="Decembre") echo "selected" ?>>Decembre</option>
            </select>
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Motif</label>
        <div class="col-sm-10">
        <select class="select" name="motif">
                <option value=""></option>
                <option value="inscription" <?php if($motif=="inscription") echo "selected" ?>>Inscription</option>
                <option value="mensualité" <?php if($motif=="mensualité") echo "selected" ?>>Mensualité</option>
                </select>
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Montant</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="montant" value="<?php echo $montant ?>" required>
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Matricule</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="matricule" value="<?php echo $matricule ?>" required>
        </div>
        </div>

              

         <!-- Submit button -->
            <input type="submit" name="update" class="btn btn-primary btn-block" value="Enregistrer">
            <button type="reset" class="btn btn-secondary btn-block">Annuler</button>
            <br>   
    </form>
   </div>
    

    




    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
</body>
</html>