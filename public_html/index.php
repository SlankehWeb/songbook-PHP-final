<?php 
$strPageTitle = "Forside";
require $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/header.php";
?>

<h1>
    <?php echo $strPageTitle ?>
</h1>

<h1 >
   <?php echo "hvad kan PHP?"; ?>
</h1>
<h2>
   <?php echo "Her er en liste over nogle af de ting man kan med PHP:"; ?> 
</h2>
<ul><?php echo
 " <li>PHP kan generere dynamisk indhold på din webside</li>
  <li>PHP kan oprette, åbne, læse, skrive, slette og lukke filer på serveren</li>
  <li>PHP kan modtage data fra en formular</li>
  <li>PHP kan læse, tilføje, redigere og slette data i din database</li>
  <li>PHP kan bruges til brugerkontrolleret adgang</li>
  "; ?></ul>
<?php
echo "<h1 class='text-primary'>PHP's Historie</h1>";
echo "<div class='container'>
  <div class='row'>
    <div class='col-md-6'>
      <p>Grundlagt af Rasmus Lerdorf og udgivet første gang den 8. juni 1995</p>
      <p>Startede som et lille, simpelt CGI script i Perl til trafik overvågning</p>
      <p>PHP står for Hypertext Preprocessor</p>
    </div>
    <div class='col-md-6'>
      <p>open source, objekt-orienteret server-side programmeringssprog</p>
      <p>ideel til udvikling af dynamiske webapplikationer</p>
      <p>Afvikles på webserver software som Apache eller IIS</p>
    </div>
  </div>
</div>";
?> 

<?php 
   $senter="Bo Nicolajsen";
   $email="bo@someplace.dk";
   $amount="21.405,52";
   $reciver="Tina";
   $str="til $senter </br></br> Vi skriver fordi der endnu er penge på din konto og den er blevet spærret. Grundet vi har skiftet platform bedes du oprette din konto på ny med email adressen:  $email - Efter oprettelse vil dine penge vente på din konto hvor du enten kan bruge dem eller få dem udbetalt. </br> Beløb tilgængeligt opgjort pr. : $amount kr.</br>  </br> venlig hilsen $reciver </br> </br>";
   echo strtoupper(str_replace("bo@someplace.dk","bob@someplace.dk","$str"));
   echo count_chars($str,3);
?>


<?php 
   $senter="Bo";
   $reciver="Hel Tina";
   $donar="GeorgGiraf";
   $str="<div> $reciver</div> </br><div> Da jeg er ufattelig rig, og derfor ikke har brug for pengene. Ser jeg gerne at i </br>donere alle pengene til Dyrenes beskyttelse. Under navnet \"$donar\".</div> </br><div> Venlig hilsen $senter </div>";
   echo strtolower(str_replace("rig","fattig",str_replace("ikke","","$str")));
   echo count_chars($str,3);
?>

<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/footer.php";
?>

<?php 
   $sim = similar_text('til Bo Nicolajsen Vi skriver fordi der endnu er penge på din konto og den er blevet spærret Grundet vi har skiftet platform bedes du oprette din konto på ny med email adressen  bo@someplacedk  Efter oprettelse vil dine penge vente på din konto hvor du enten kan bruge dem eller få dem udbetalt Beløb tilgængeligt opgjort pr  21.405,52 kr venlig hilsen Tina ', ' Hel Tina Da jeg er ufattelig rig og derfor ikke har brug for pengene Ser jeg gerne at i donere alle pengene til Dyrenes beskyttelse Under navnet GeorgGiraf Venlig hilsen Bo ', $perc);
   echo "similarity: $sim "; 
?>