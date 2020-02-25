<div class="row">
    <div class="col s12 offset-m1 m6 xl4  ">
        <div class="col s12 ">
            <h4><?php echo $tr_profile; ?></h4>
        </div>
        <form action="/admin/account" method="post" autocomplete="off" enctype='multipart/form-data'>
            <div class="col s12">
                <h5><?php echo $tr_personalInformation; ?></h5>
            </div>
            <div class="input-field col s12">
                <input type="text" id="nome" name="nome" value="<?php echo $user["nome"]; ?>" required>
                <label for="nome"><?php echo $tr_name; ?></label>
            </div>
            <div class="input-field col s12">
                <input type="text" id="cognome" name="cognome" value="<?php echo $user["cognome"]; ?>" required>
                <label for="cognome"><?php echo $tr_surname; ?></label>
            </div>
            <div class="input-field col s12">
                <select name="idLingua" id="idLingua">
                    <?php 
                    foreach($linguePannello as $l){
                        echo " <option value='".$l["idLingua"]."'";
                        echo ($user["idLinguaPannello"]==$l["idLingua"]) ? "selected" : "";
                        echo ">".$l["lingua"]."</option>";
                    }
                    ?>
                </select>
                <label for="idLingua"><?php echo $tr_administrativePanelLanguage; ?></label>
            </div>
            <div class="input-field col s12">
                <input type="email" id="email" name="email" value="<?php echo $user["email"]; ?>" required>
                <label for="email"><?php echo $tr_email; ?></label>
            </div>
            <div class="input-field  col s12">
                <input type="text" id="username" name="username" value="<?php echo $user["username"]; ?>" required>
                <label for="username">Username</label>
            </div>
            <div class="input-field  col s12 center">
                <p class="flow-text"><?php echo ($errorInfo!="") ? $errorInfo : ""; ?></p>
            </div>
            <div class="col offset-s1 s10  offset-m7 m4  ">
                <button class="btn teal lighten-1" type="submit" name="action" value="edit"><?php echo $tr_edit; ?><i
                        class="material-icons right">refresh</i></button>
            </div>

        </form>
    </div>
</div>
<div class="row">
    <div class="col s12 offset-m1 m6 xl4  ">
        <form action="/admin/account" method="post" autocomplete="off">

            <div class="col s12">
                <h5><?php echo $tr_changePassword; ?></h5>
            </div>
            <div class="input-field  col s12  ">
                <input type="text" id="passwordold" name="passwordold" required autocomplete="new-password">
                <label for="passwordold"><?php echo $tr_typeTheOldPassword; ?></label>
            </div>
            <div class="input-field  col s12  ">
                <input type="password" id="passwordnew" name="passwordnew" required minlenght="8"
                    autocomplete="new-password">
                <label for="passwordnew"><?php echo $tr_typeTheNewPassword; ?></label>
            </div>
            <div class="input-field  col s12  ">
                <input type="password" id="passwordrepeat" name="passwordrepeat" required minlenght=8
                    autocomplete="new-password">
                <label for="passwordrepeat"><?php echo $tr_retypeTheNewPassword; ?></label>
            </div>
            <div class="input-field  col s12 center">
                <p class="flow-text"><?php echo $errorPassword; ?></p>
            </div>
            <div class="col offset-s1 s10  m4 offset-m7 ">
                <button class="btn teal lighten-1" type="submit" name="action" value="edit"><?php echo $tr_edit; ?>
                    <i class="material-icons right">refresh</i>
                </button>
            </div>
        </form>
    </div>
</div>