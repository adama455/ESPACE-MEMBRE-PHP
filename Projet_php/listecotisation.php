<?php
    
   
    require_once("connexiondb.php");
    
        
        
        $numc=isset($_GET['numC'])?$_GET['numC']:"";
        $mois=isset($_GET['moiscotis'])?$_GET['moiscotis']:"all";

        $size=isset($_GET['size'])?$_GET['size']:6;
        $page=isset($_GET['page'])?$_GET['page']:1;
        $offset=($page-1)*$size;
        

        if($mois=="all"){
            $requete="select * from cotisation
                    where numcotis like '%$numc%'
                    order by id DESC
                    limit $size
                    offset $offset";
            
            $requeteCount="select count(*) countN from cotisation
                    where numcotis like '%$numc%'"; 
        }else{
            $requete="select * from cotisation
                    where
                        numcotis like '%$numc%'
                    and 
                        mois='$mois'
                    order by datecotis DESC
                    limit $size
                    offset $offset";
            
            $requeteCount="select count(*) countN from cotisation
                    where numcotis like '%$numc%' 
                    and 
                        mois='$mois'";
            
        }
        $resultatF=$pdo->query($requete);

        $resultatCount=$pdo->query($requeteCount);
        $tabCount=$resultatCount->fetch();
        $nbrnaiss=$tabCount['countN'];
        $reste=$nbrnaiss % $size; //% operateur modulo: le reste de la division
                                 //euclidienne de $nbrnaiss par size
        if($reste===0)//$nbrnaiss est un multiple de $size
            $nbrPage=$nbrnaiss/$size;
        else
            $nbrPage=floor ($nbrnaiss/$size)+1; //floor: la partie entière d'un nombre décimal

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de style -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <title>ListeCotisation</title>
</head>
<body>
    

<div class="container">
    <br><br>
        <div class="panel panel-success margetop">
            <div class="panel-heading fs-5">(liste des cotisations)   Rechercher...</div>
            <div class="panel-body">
                <form method="get" action="listecotisation.php" class="form-inline">
                    <div class="form-group">
                    <input  name="numC" placeholder="Numéro de cotisation" class="form-control" value="<?php echo $numc ?>"/>&nbsp;&nbsp;
                    </div>    
                    &nbsp;<label for="moiscotis" class="control-label">Mois:</label>&nbsp;
                    <select name="moiscotis" class="form-control" onechange="this.form.submit();">
                        <option value="all" <?php if($mois==="all") echo "selected" ?>>Tous les mois</option>
                        <option value="Janvier" <?php if($mois==="Janvier") echo "selected" ?>>Janvier</option>
                        <option value="Fevrier" <?php if($mois==="Fevrier") echo "selected" ?>>Février</option>
                        <option value="Mars" <?php if($mois==="Mars") echo "selected" ?>>Mars</option>
                        <option value="Avril" <?php if($mois==="Avril") echo "selected" ?>>Avril</option> 
                        <option value="Mai" <?php if($mois==="Mai") echo "selected" ?>>Mai</option>
                        <option value="Juin" <?php if($mois==="Juin") echo "selected" ?>>Juin</option>
                        <option value="Juillet" <?php if($mois==="Juillet") echo "selected" ?>>Juillet</option>
                        <option value="Aout" <?php if($mois==="Aout") echo "selected" ?>>Août</option> 
                        <option value="Septembre" <?php if($mois==="Septembre") echo "selected" ?>>Septembre</option>
                        <option value="Octobre" <?php if($mois==="Octobre") echo "selected" ?>>Octobre</option>
                        <option value="Novembre" <?php if($mois==="Novembre") echo "selected" ?>>Novembre</option>
                        <option value="Decembre" <?php if($mois==="Decembre") echo "selected" ?>>Decembre</option> 
                    </select>&nbsp;
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search fs-6"></span>
                        Rechercher...
                    </button>
                    &nbsp;&nbsp;
                    <a href="saisiecotisation.php"><button type="button" class="btn btn-primary fs-6"><span class="glyphicon glyphicon-plus"></span>Nouvelle enregistrement</button></a>
                    &nbsp;&nbsp;
                    <a href="accueil.php"><button type="button" class="btn btn-primary fs-6">Accueil</button></a>
                </form>
            </div>
        </div>
        
        <div class="panel panel-primary ">
            <div class="panel-heading">La liste des cotisation (<?php echo $nbrnaiss ?>&nbsp; Enregistrements)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered fs-5">
                    <thead>
                        <tr class="text-center">
                            <th>Id</th><th>N° Cotisation</th><th>Date</th><th>Mois</th><th>Motif</th><th>Montant</th><th>Matricule</th><th>Operations</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        <?php while($cotisation=$resultatF->fetch()){ ?>
                            <tr class="text-center">
                                <td><?php echo $cotisation["id"] ?></td>
                                <td><?php echo $cotisation["numcotis"] ?></td> 
                                <td><?php echo $cotisation["datecotis"] ?></td>
                                <td><?php echo $cotisation["mois"] ?></td>
                                <td><?php echo $cotisation["motif"] ?></td> 
                                <td><?php echo $cotisation["montant"] ?></td>
                                <td><?php echo $cotisation["matricule"] ?></td>
                                <td>
                                <a href="modifiercotisation.php?idC=<?php echo $cotisation['id'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                    &nbsp;
                                <a onclick="return confirm('Etes vous sur de vouloir supprier cette enregistrement?')" href="supprimercotisation.php?idC=<?php echo $cotisation['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>    
                        <?php } ?>
                            </tr>                                                                         
                    </tbody>
                </table>
                <div>
                    <ul class="pagination">
                        <?php for ($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>">
                                <a href="listecotisation.php?page=<?php echo $i;?>&numC=<?php echo $numc?>&numcotis=<?php echo $annee ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                    </div>                        
            </div>
        </div>
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