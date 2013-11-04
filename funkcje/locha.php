<?php


if($_GET['p'] == "locha" AND !$_GET['st'] AND $_GET['id_l'])
{
     //karta_loch($_GET['id_l']);
     include('karta_lochy.php');
     //karta_loch($_GET['id_l']);
}

elseif($_GET['p'] == "locha" AND $_GET['st'] == "z" AND $_GET['id_l'])
{
     //Działa
     if(zakoncz_loche($_GET['id_l']))
     {
          echo "Zakończono lochę";
     }

     else
     {
          echo "Błąd";
     }
}

elseif($_GET['p'] == "ins" AND $_GET['id_l'])
{
     if(isset($_POST['zapisz']))
     {
          if(dodaj_zaproszenie($_GET['id_l'], $_POST['l_ins'], $_POST['data'], $_POST['rasa']))
          {
               echo "Dodano inseminację";
          }

          else
          {
               echo "błąd inseminacji";
          }
     }

     else
     {
          echo "dodaj inseminacje";
          include('form_ins.php');
     }
}

elseif($_GET['p'] == "opr" AND $_GET['id_l'])
{
     if(isset($_POST['zapisz']))
     {
          if(dodaj_oprodzenie($_GET['id_l'], $_POST['data'], $_POST['zywe'], $_POST['martwe'], $_POST['opis']))
          {
               echo "Dodano oproszenie";
          }

          else
          {
               echo "błąd oproszenie";
          }
     }

     else
     {
          echo "dodaj oproszenie";
          include('form_opr.php');
     }
}

else
{
     echo "błąd";
}

?>