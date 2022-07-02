<div class="col-10 mx-auto mt-1 mb-5">
    <div class="col-11 mx-auto border border-secondary rounded py-4 py-2  "
        style="margin-top: 100px; margin-bottom: 60px;">

        <?php 
            $Form_Obj = new Formulaire(' Création login : ','POST','./Create.php','0');
                
                echo '<h2 class="h3  mb-5"> Entrez un Pseudo et un mot de passe pour pouvoir consulter votre CV: </h2>';


                $Form_Obj->Create_Input('text','PSeudo','Saisissez un Pseudo');
                Formulaire::Afficher_msg('PSeudo');

                $Form_Obj->Create_Input('password','pwd1','Votre Mot de passe');
                Formulaire::Afficher_msg('pwd1');

                $Form_Obj->Create_Input('password','pwd2','Confirmez le mot de passe');
                Formulaire::Afficher_msg('pwd2');
                
                echo'
                <a class="btn btn-warning d-inline-block ml-auto py-2 px-3 mt-4 col-1" href="./Reset.php" role="button"> <i
                            class="fas fa-reply fa-lg "></i> </a>';
                $Form_Obj->Create_Submit_btn('FinalSubmit','set','Finir');

            $Form_Obj->Close_Form();
        ?>
    </div>

</div>