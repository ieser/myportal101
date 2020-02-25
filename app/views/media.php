<div class="row">
    <div class="col s12">
        <h4><?php echo $tr_mediaLibrary; ?></h4>
    </div>
</div>
<form id="deleteMedia" method="post" action="/admin/media/delete" enctype='multipart/form-data'>
    <div class="row">
        <div class="input-field col s12 m3 xl2">
            <button class="btn-small modal-trigger waves-effect waves-light" id="addMedia" data-target="addMediaModal"><i class="material-icons right">add</i>Aggiungi media</button>
        </div>
        <div class="input-field col s12 m3 xl2">
            <button class="btn-small waves-effect waves-light" type="submit" name="action" value="delete"> <i class="material-icons right">delete</i>Elimina selezione</button>
        </div>
    </div>
    <!-- BOX  MEDIA -->
    <div class="row mediaList">
        <?php if (!is_array($media)) {?>
        <div class="col s12">Nessun media inserito.</div>
        <?php } 
                    foreach ($media as $m) {?>
        <div class="col s3 m2 l2 xl1">
            <label> <input type="checkbox" class="filled-in" value="<?php echo $m["idMedia"]; ?>"
                    name="idMedia[]"><span> </span></label>
            <a href="<?php echo $m["url"]; ?>">
                <img src="<?php echo $m["urlThumbnail"]; ?>" class=" responsive-img ">
                <p><?php echo $m["filename"]; ?></p>
            </a>
        </div>
        <?php } ?>
    </div>
    <!-- FINE BOX LISTA MEDIA -->
</form>
<!-- MODAL AGGIUNGI MEDIA -->
<form class="modal" id="addMediaModal" method="post" action="/admin/media/add" accept-charset="UTF-8" autocomplete="off"
    enctype='multipart/form-data'>
    <div class="modal-content">
        <div class="row">
            <h5><?php echo $tr_addMedia; ?></h5>
        </div>
        <div class="row">
            <div class="col s12 m6 l4 ">
                <img class="responsive-img" src="" id="preview1">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="file-field input-field ">
                    <div class="btn not-full-width">
                        <span>Seleziona</span>
                        <input id="image1" name="media" type="file" onchange="readURL(this, 1);" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input id="image_text1" class="file-path validate" type="text" placeholder="Seleziona o trascina qui i file per caricarli">
                    </div>
                </div>
            </div>
            <div class="input-field col s12 offset-m6 m6 offset-l4 l4">
                <button class="btn" type="submit" name="action" value="add">INSERISCI<i class="material-icons right">arrow_forward</i></button>
            </div>
        </div>
    </div>
</form>
<!-- FINE MODAL AGGIUNGI MEDIA -->


<script>
$(document).ready(function() {
    $('.modal').modal();
});
</script>