
<div class="row">
    <div class="col s12">
        <h4>Modifica articolo</h4>
    </div>
</div>  
<form method="post" action="/admin/article/<?php echo $articleDetails[0]["idArticolo"]; ?>" accept-charset="UTF-8" id="editForm">
    <div class="row">
        <div class="col s12 m8 l9">
            <div class="row">
                    <div class="col s12 ">
                        <?php foreach ($articleDetails as $p) { 
                            $idLingua = $p["idLingua"];   ?>
                            <div class="row <?php echo (in_array($idLingua, $activeLanguages)) ? "" : "hide"; ?>">  
                                <div class="col s12">
                                    <h5><?php echo $p["lingua"]; ?></h5>
                                </div>
                                <div class="input-field  col s12  ">
                                    <input type="text" id="titolo_<?php echo $idLingua; ?>" name="titolo_<?php echo $idLingua; ?>" value="<?php echo $p["titolo"]; ?>" idLingua="<?php echo $idLingua; ?>">
                                    <label for="titolo_<?php echo $idLingua; ?>">Titolo</label>
                                </div>
                                <div class="col s12">
                                    <span ><?php echo $SCHEME."://".$HOST."/archives/"; ?></span>
                                    <div class="input-field inline slug">
                                        <input type="text" id="slug_<?php echo $idLingua; ?>" name="slug_<?php echo $idLingua; ?>" value="<?php echo $p["slug"]; ?>"  idLingua="<?php echo $idLingua; ?>">
                                        <label for="slug_<?php echo $idLingua; ?>">Permalink</label>
                                    </div>
                                </div>
                                <div class="input-field  col s12">
                                    <textarea  name="article_<?php echo $idLingua; ?>"  class="summernote materialize-textarea"><?php echo $p["contenuto"]; ?></textarea>
                                </div>
                            </div>

                        <?php } ?> 
                    </div>
            </div>
        </div>
        <div class="col s12 m4 l3">
            <div class="row">
                <div class="col s12 ">
                    <h5><?php echo $tr_category; ?></h5>
                </div>   
                <div class="input-field  col s12  ">
                        <select required name="idCategoria" id="idCategoria">
                            <?php foreach($categoriesList as $c){
                                echo '<option value="'.$c["idCategoria"].'" ';
                                echo ($c["idCategoria"]== $articleDetails[0]["idCategoria"]) ? "selected" : "";
                                echo '>'.$c["nomeCategoria"].'</option>';
                            }?>
                        </select>
                        <label for="idCategoria"><?php echo $tr_selectACategory; ?></label>
                </div>

                <div class="col s12 ">
                    <h5>Tags</h4>
                </div>
                <div class="col s12 ">
                    <div class="chips">
                        <input name="tags" id="tags">
                    </div>
                </div>

                <div class="col s6 ">
                    <button class="btn"  type="submit" name="action" value="delete"> <?php echo $tr_delete; ?><i class="material-icons right">delete</i></button>
                </div>
                <div class="col s6">
                    <button class="btn " type="button" name="action" value="edit" id="submitEdit"> <?php echo $tr_edit; ?><i class="material-icons right">send</i> </button>
                </div>
                <input name="action" id="submitAction" type="hidden" value="">
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        var options_chips = {
                placeholder: '<?php echo $tr_enterTag;?>',
                secondaryPlaceholder: '<?php echo $tr_enterTag;?>',
                data: [<?php echo $tags;?>],
                autocompleteOptions: {
                    data: {  },
                    limit: Infinity,
                    minLength: 1
                }
            };
        var elems_chips = document.querySelectorAll('.chips');
        var instances_chips = M.Chips.init(elems_chips,options_chips);

        $('#submitEdit').click(function(){
            
            var chips = JSON.stringify(M.Chips.getInstance($('.chips')).chipsData);
            $('input#tags').val(chips);

            $('#submitAction').val("edit");
            $('#editForm').submit();
        });

        $('.summernote').summernote({
            placeholder: 'Scrivi qui il tuo articolo',
            tabsize: 2,
            height: 300,
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0],this);
                }
            }
        });
        <?php 
        foreach($languages as $al){ ?>
            $('#titolo_<?php echo $al["idLingua"]; ?>').focusout(function(){
                var idLingua = $(this).attr("idLingua");
                var slug = $(this).val().toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
                $('#slug_' +idLingua).val(slug);
                M.updateTextFields();
            });
            $('#slug_<?php echo $al["idLingua"]; ?>').focusout(function(){
                var idLingua = $(this).attr("idLingua");
                var slug = $(this).val().toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
                $('#slug_' +idLingua).val(slug);
                M.updateTextFields();
            });

        <?php }
        ?>
    });

    function uploadImage(image,editor) {
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
                var image = $('<img>').attr('src',  url);
                $(editor).summernote("insertNode", image[0]);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>