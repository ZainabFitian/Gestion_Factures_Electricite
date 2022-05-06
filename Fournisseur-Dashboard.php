<?php
session_start();
    $connect= new PDO('mysql:host=localhost;dbname=db_tp2','root','');
    if(isset($_SESSION['NomUtili']))
    {
?>
<!DOCTYPE html>
<html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="Fournisseur-Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar">
        <div class="logo">
            <a href="#">
                <span>F</span>actur<span>E</span>nsa<span>.</span>
            </a>
        </div>
        <div class="nav-list">
            <a href="Agent-Acceder.php" class="nav-link">Accéder aux fichiers</a>
            <a href="Agent.php" class="nav-link">Ajouter fichier</a>
            <a href="index.php" class="nav-link">Log out</a>
        </div>
    </nav>
     <!-- Menu -->
     <div class="menu">
        <div class="line line-1"></div>
        <div class="line line-2"></div>
        <div class="line line-3"></div>
    </div>
    <!-- End of Menu -->
<section class="section1">
    <!-- DIV -->

    <div class="float-container">

        <div class="float-child">
            <div class="green">Nbr de factures non payés : khass t3ml logique</div>
        </div>
  
        <div class="float-child">
            <div class="blue">Montant factures non payés : khass logique</div>
        </div>
  
    </div>


    <!-- Graph 1 -->
    <div>
    <div class="float-container">

        <div class="float-child">
            
            <?php // content="text/plain; charset=utf-8"
            require_once ('jpgraph-4.3.4/src/jpgraph.php');
            require_once ('jpgraph-4.3.4/src/jpgraph_bar.php');
            $cxn= mysqli_connect("localhost","root","","db_tp2") or die("error connecting to the server");


            $jan="select * from facture where Mois='janvier'";
            $res_jan=mysqli_query($cxn,$jan);
            $num_jan=mysqli_num_rows($res_jan);

            $fev="select * from facture where Mois='fevrier'";
            $res_fev=mysqli_query($cxn,$fev);
            $num_fev=mysqli_num_rows($res_fev);

            $mar="select * from facture where Mois='mars'";
            $res_mar=mysqli_query($cxn,$mar);
            $num_mar=mysqli_num_rows($res_mar);

            $av="select * from facture where Mois='avril'";
            $res_av=mysqli_query($cxn,$av);
            $num_av=mysqli_num_rows($res_av);

            $mai="select * from facture where Mois='mai'";
            $res_mai=mysqli_query($cxn,$mai);
            $num_mai=mysqli_num_rows($res_mai);

            $jun="select * from facture where Mois='juin'";
            $res_jun=mysqli_query($cxn,$jun);
            $num_jun=mysqli_num_rows($res_jun);

            $jul="select * from facture where Mois='juillet'";
            $res_jul=mysqli_query($cxn,$jul);
            $num_jul=mysqli_num_rows($res_jul);

            $aou="select * from facture where Mois='aout'";
            $res_aou=mysqli_query($cxn,$aou);
            $num_aou=mysqli_num_rows($res_aou);

            $sep="select * from facture where Mois='septembre'";
            $res_sep=mysqli_query($cxn,$sep);
            $num_sep=mysqli_num_rows($res_sep);

            $oct="select * from facture where Mois='octobre'";
            $res_oct=mysqli_query($cxn,$oct);
            $num_oct=mysqli_num_rows($res_oct);

            $nov="select * from facture where Mois='novembre'";
            $res_nov=mysqli_query($cxn,$nov);
            $num_nov=mysqli_num_rows($res_nov);

            $dec="select * from facture where Mois='decembre'";
            $res_dec=mysqli_query($cxn,$dec);
            $num_dec=mysqli_num_rows($res_dec);

            $data=array($num_jan);
            $data2=array($num_fev);
            $data3=array($num_mar);
            $data4=array($num_av);
            $data5=array($num_mai);
            $data6=array($num_jun);
            $data7=array($num_jul);
            $data8=array($num_aou);
            $data9=array($num_sep);
            $data10=array($num_oct);
            $data11=array($num_nov);
            $data12=array($num_dec);
            $datax=array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");

           $graph= new Graph(800,600);
           $graph ->SetScale("textlin");
           $graph->SetMargin(40,130,20,40);
           $graph->SetShadow();
           $graph->xaxis->SetTickLabels($datax);

           $bplot= new BarPlot($data);
           $bplot->SetColor("orange");
           $bplot->SetWidth(45);
           $bplot->SetWeight(2);
           $bplot->SetLegend("janvier");

           $bplot2= new BarPlot($data2);
           $bplot2->SetColor("orange");
           $bplot2->SetWidth(45);
           $bplot2->SetWeight(2);
           $bplot2->SetLegend("fevrier");

           $bplot3= new BarPlot($data3);
           $bplot3->SetColor("orange");
           $bplot3->SetWidth(45);
           $bplot3->SetWeight(2);
           $bplot3->SetLegend("mars");

           $bplot4= new BarPlot($data4);
           $bplot4->SetColor("orange");
           $bplot4->SetWidth(45);
           $bplot4->SetWeight(2);
           $bplot4->SetLegend("avril");

           $bplot5= new BarPlot($data5);
           $bplot5->SetColor("orange");
           $bplot5->SetWidth(45);
           $bplot5->SetWeight(2);
           $bplot5->SetLegend("mai");

           $bplot6= new BarPlot($data6);
           $bplot6->SetColor("orange");
           $bplot6->SetWidth(45);
           $bplot6->SetWeight(2);
           $bplot6->SetLegend("juin");

           $bplot7= new BarPlot($data7);
           $bplot7->SetColor("orange");
           $bplot7->SetWidth(45);
           $bplot7->SetWeight(2);
           $bplot7->SetLegend("juillet");

           $bplot8= new BarPlot($data8);
           $bplot8->SetColor("orange");
           $bplot8->SetWidth(45);
           $bplot8->SetWeight(2);
           $bplot8->SetLegend("aout");

           $bplot9= new BarPlot($data9);
           $bplot9->SetColor("orange");
           $bplot9->SetWidth(45);
           $bplot9->SetWeight(2);
           $bplot9->SetLegend("septembre");

           $bplot10= new BarPlot($data10);
           $bplot10->SetColor("orange");
           $bplot10->SetWidth(45);
           $bplot10->SetWeight(2);
           $bplot10->SetLegend("octobre");

           $bplot11= new BarPlot($data11);
           $bplot11->SetColor("orange");
           $bplot11->SetWidth(45);
           $bplot11->SetWeight(2);
           $bplot11->SetLegend("novembre");

           $bplot12= new BarPlot($data12);
           $bplot12->SetColor("orange");
           $bplot12->SetWidth(45);
           $bplot12->SetWeight(2);
           $bplot12->SetLegend("decembre");

           $graph->add($bplot);
           $graph->add($bplot2);
           $graph->add($bplot3);
           $graph->add($bplot4);
           $graph->add($bplot5);
           $graph->add($bplot6);
           $graph->add($bplot7);
           $graph->add($bplot8);
           $graph->add($bplot9);
           $graph->add($bplot10);
           $graph->add($bplot11);
           $graph->add($bplot12);
           $graph->title->Set("Consommation par mois:");
           $graph->xaxis->title->Set("Mois");
           $graph->yaxis->title->Set("Consommation");

           $gbarplot= new GroupBarPlot(array($bplot,$bplot2,$bplot3,$bplot4,$bplot5,$bplot6,$bplot7,$bplot8,$bplot9,$bplot10,$bplot11,$bplot12));
            $gbarplot->SetWidth(200);
            $graph->add($gbarplot);
            $graph->xaxis->title->SetFont(FF_FONT1, FS_BOLD);
            $graph->yaxis->title->SetFont(FF_FONT1, FS_BOLD);

         

            // Output line
            //$graph->Stroke();
            $graph->Stroke("graph.png");

            ?>
        <img src="graph.png" />
        </div>
        


    <!-- Graph 2 -->
        <div class="float-child">

            <?php // content="text/plain; charset=utf-8"
            require_once ('jpgraph-4.3.4/src/jpgraph.php');
            require_once ('jpgraph-4.3.4/src/jpgraph_bar.php');
            $cxn= mysqli_connect("localhost","root","","db_tp2") or die("error connecting to the server");


            $query="select * from facture";
            $res=mysqli_query($cxn,$query);
            $arr=[];
            $names=[];
            while($ligne=mysqli_fetch_assoc($res)){
                array_push($names,$ligne["Mois"]);
                array_push($arr, $ligne["Consom"]);
            }

            // Setup the graph
            $graph = new Graph(950,350,'auto');
            $graph->SetScale("textlin");

            $theme_class=new UniversalTheme;
            $graph->SetTheme($theme_class);

            $graph->yaxis->SetTickPositions(array(0,200,400,600,800,1000),array(100,300,500,700,900));

            //$graph->title->Set('Filled Y-grid');
            $graph->SetBox(false);

            //$graph->SetMargin(40,20,36,63);

            //$graph->img->SetAntiAliasing();

            $graph->ygrid->SetFill(false);
            $graph->xaxis->SetTickLabels($names);
            $graph->yaxis->HideLine(false);
            $graph->yaxis->HideTicks(false,false);

            $b1plot = new BarPlot($arr);


            $graph->Add($b1plot);

            $b1plot->SetColor("white");
            $b1plot->SetWidth(45);
            $graph->title->Set("Consommation par mois:");

            // Output line
            //$graph->Stroke();
            $graph->Stroke("graph2.png");

            ?>
        <img src="graph2.png" />

        </div>
        </div>
        </div>

        </section>

    <!-- Footer -->
    <footer class="footer">
            <div class="footer-nav">
                <a href="Agent-Acceder.php">Accéder aux fichiers</a>
                <a href="Agent.php" >Ajouter fichier</a>
                <a href="index.php" >Log out</a>
            </div>
            <p class="copyright">
                Copyright &copy; FacturEnsa All Rights Reserved
            </p>
        </footer>
        <!-- End of Footer -->
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php
    }
?>