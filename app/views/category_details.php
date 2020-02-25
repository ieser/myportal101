<div class="row">  
    <div class="col s12 m10 offset-m1">
        <div class="row">  
            <div class="col s12 ">
                <h4><?php echo $tr_categoriesManagement; ?></h4>
            </div>  
        </div>   
        <div class="row ">  
            <div class="col s12 ">
                <h5><?php echo $tr_editCategory; ?></h5>
            </div>  
            <form method="post" action="/admin/category/<?php echo $categoryDetails[0]["idCategoria"]; ?>" accept-charset="UTF-8">
                <input type="hidden" name="action" value="edit">  
                <?php foreach ($categoryDetails as $p) { ?>
                    <div class="input-field  col s12  <?php echo (in_array($p["idLingua"], $activeLanguages)) ? : "hide"; ?>">
                        <input type="text" id="categoria_<?php echo $p["idLingua"]; ?>" name="categoria_<?php echo $p["idLingua"]; ?>" value="<?php echo $p["nomeCategoria"]; ?>">
                        <label for="categoria_<?php echo $p["idLingua"]; ?>"><?php echo $tr_category; ?> <?php echo $p["lingua"]; ?> </label>
                    </div>
                <?php } ?> 
                <button class="btn col s12 offset-m1 m5 offset-l2 l3"  type="submit" name="action" value="delete">
                    <?php echo $tr_delete; ?><i class="material-icons right">delete</i>
                </button>
                <button class="btn col s12 offset-m2 m5 offset-l2 l3 " type="submit" name="action" value="edit">
                    <?php echo $tr_edit; ?><i class="material-icons right">send</i>
                </button>
             </form>
        </div>   
    </div>
</div>