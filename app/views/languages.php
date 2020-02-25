
<div class="row">
    <div class="col s12">
        <h4><?php echo $tr_languagesManagement; ?></h4>
    </div>
    <div class="col s12 m8 l9">
        <div class="row">
            <div class="col s12">
                <h5>Lingue inserite</h5>
            </div>
            <div class="col s12">
                <table class="highlight">
                    <thead>
                        <tr>
                            <th><?php echo $tr_language; ?></th>
                            <th class="center"><?php echo $tr_status; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($lingue as $l) {
                                $checked = ($l["attiva"] == 1) ? "checked" : "";
                                echo '<tr>
                                        <td>' . $l["lingua"].' ('.strtoupper($l["sigla"]).')</td>
                                        <td class="center">
                                            <div class="switch">
                                                <label>
                                                    <input type="checkbox" '.$checked.' id="" value="'.$l["idLingua"].'" class="languageStatus">
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </td>
                                </tr>';
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <form action="/admin/language/add" method="post">
            <div class="col s12">
                <h5>Aggiungi lingua</h5> 
            </div>
            <div class="input-field  col s12 m6 ">
                <input type="text" id="nomeLingua" name="nomeLingua" required>
                <label for="nomeLingua">Nome</label>
            </div>
            <div class="input-field  col s12 m3  ">
                <input type="text" id="siglaLingua" name="siglaLingua" lenght="2" required>
                <label for="siglaLingua">Sigla</label>
            </div>
            <div class="input-field col s12 m3 ">
                <button class="btn" type="submit" name="action" value="add">AGGIUNGI<i class="material-icons right">add</i></button>
            </div>
        </form>
    </div>
    <div class="col s12 m4 l3">
            




    </div>
</div>
<script>
$(document).ready(function() {
    $('input.languageStatus').click(function() {
        $.post({
            url: "/admin/languages",
            data: { 
                idLingua: $(this).val(),
                status: $(this).prop('checked')
            }
        });
    });

});
</script>