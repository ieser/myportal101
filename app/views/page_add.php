<div class="row">
    <div class="col s12 ">
        <h4><?php echo $tr_addPage; ?></h4>
    </div>
</div>
<form method="post" action="/admin/page/add" accept-charset="UTF-8" autocomplete="off" enctype='multipart/form-data'>
    <div class="row">
        <div class="col s12 m8 l9">
            <div class="row">
                    <?php foreach ($activeLanguages as $l) {?>
                        <div class="col s12">
                            <h5><?php echo $l["lingua"]; ?></h5>
                        </div>
                        <div class="input-field  col s12  ">
                            <input type="text" id="titolo_<?php echo $l["idLingua"]; ?>" name="titolo_<?php echo $l["idLingua"]; ?>" value="" required idLingua="<?php echo $l["idLingua"]; ?>">
                            <label for="titolo_<?php echo $l["idLingua"]; ?>"><?php echo $tr_title; ?></label>
                        </div>
                        <div class="col s12">
                            <span><?php echo $SCHEME."://".$HOST."/"; ?></span>
                            <div class="input-field inline slug">
                                <input type="text" id="slug_<?php echo $l["idLingua"]; ?>" name="slug_<?php echo $l["idLingua"]; ?>" value="<?php echo $p["slug"]; ?>" idLingua="<?php echo $l["idLingua"]; ?>">
                                <label for="slug_<?php echo $l["idLingua"]; ?>">Permalink</label>
                            </div>
                        </div>
                        <div class="input-field  col s12  ">
                            <textarea name="page_<?php echo $l["idLingua"]; ?>"
                                class="summernote materialize-textarea"><?php echo $tr_writeYourPageHere; ?></textarea>
                        </div>
                    <?php }?>
            </div>
        </div>
        <div class="col s12 m4 l3">
            <div class="row">
                <div class="col s12 ">
                    <h5>Stato</h4>
                </div>
                <div class="col s6 ">
                    <a class="btn  " href="/admin/page/add"><?php echo $tr_delete; ?><i class="material-icons right">delete</i></a>
                </div>
                <div class="col s6 ">
                    <button class="btn" type="submit" name="action" value="add"><?php echo $tr_add; ?><i class="material-icons right">add</i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        placeholder: 'Hello bootstrap 4',
        tabsize: 2,
        height: 300,
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0], this);
            }
        }
    });
});
<?php 
    foreach($activeLanguages as $al){ ?>
        $('#titolo_<?php echo $al["idLingua"]; ?>').focusout(function() {
            var idLingua = $(this).attr("idLingua");
            var slug = $(this).val().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $('#slug_' + idLingua).val(slug);
            M.updateTextFields();
        });
        $('#slug_<?php echo $al["idLingua"]; ?>').focusout(function() {
            var idLingua = $(this).attr("idLingua");
            var slug = $(this).val().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $('#slug_' + idLingua).val(slug);
            M.updateTextFields();
        });
<?php 
    } ?>

function uploadImage(image, editor) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        type: "post",
        url: '/ajax/media/add',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(url) {
            var image = $('<img>').attr('src', url);
            $(editor).summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>