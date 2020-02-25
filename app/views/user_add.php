<div class="row">
    <div class="col s12">
        <h4>Nuovo utente</h4>
    </div>
</div>
<form method="post" action="/admin/user/add">
    <div class="row">
        <div class="col s12 m8 l9">
            <div class="row">
                <div class="col s12">
                    <h5>Dati utente</h5>
                </div>
                <div class="input-field  col s12 m6">
                    <input type="text" id="nome" name="nome" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field  col s12 m6">
                    <input type="text" id="cognome" name="cognome" required>
                    <label for="cognome">Cognome</label>
                </div>
                <div class="input-field  col s12 m6">
                    <input type="text" id="username" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-field  col s12 m6">
                    <input type="text" id="email" name="email" required>
                    <label for="email">Email</label>
                </div>
            </div>
        </div>
        <div class="col s12 m4 l3">
            <div class="col s12 ">
                <h5>Aggiungi</h5>
            </div>
            <div class="input-field  col s12 ">
                <select required name="idRuolo" id="idRuolo">
                    <option value="all"><?php echo $tr_allRoles;  ?></option>
                    <?php foreach($roles as $r){
                        echo '<option value="'.$r["idRuolo"].'">'.$r["ruolo"].'</option>';
                    }  ?>
                </select>
                <label for="idCategoria"><?php echo $tr_selectARole; ?></label>
            </div>
            <div class="input-field col s6">
                <a href="/admin/users" class="btn"> <i class="material-icons right">arrow_back</i>Lista utenti</a>
            </div>
            <div class="input-field col s6">
                <button class="btn" type="submit" name="action" value="add"><?php echo $tr_add; ?><i class="material-icons right">add</i></button>
            </div>
        </div>
    </div>
<form>