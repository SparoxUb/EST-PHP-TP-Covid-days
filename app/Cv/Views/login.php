<div class="col-8 mx-auto mt-1 mb-5">
    <div class="col-11 mx-auto border border-secondary rounded py-4 py-2  "
        style="margin-top: 100px; margin-bottom: 65px;">



        <?php 
    $Form_Obj = new Formulaire('Login','POST','./Consulter.php','0');


    $Form_Obj->Create_Input_With_Label('text','Pseudo','Pseudo ','');
    Formulaire::Afficher_msg('Pseudo');

    
    $Form_Obj->Create_Input_With_Label('password','pwd','Mot de passe','');
    Formulaire::Afficher_msg('pwd');


    $Form_Obj->Create_Submit_btn('login','set','Login');

    $Form_Obj->Close_Form();
?>


    </div>
</div>