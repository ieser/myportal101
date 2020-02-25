<div class="row">
    <div class="col s12">
        <h4><?php echo $tr_articles;  ?></h4>
    </div>
</div>
<div class="row">
    <div class="input-field col s10 offset-s1 m3   ">
        <a href="/admin/article/add" class="waves-effect waves-light btn"> <i class="material-icons right">add</i><?php echo $tr_add." ".$tr_article; ?></a>
    </div>
</div>
<div class="row">
    <form method="post" action="/admin/articles/<?php echo $activePage; ?>">
        <div class="input-field  col s12 center">
            <ul class="pagination">
                <li class="<?php echo ($activePage==1) ? "disabled" : ""; ?> "><a href="/admin/articles/1"><i
                            class="material-icons">chevron_left</i></a></li>
                <?php for($i=1;$pagesArticleNumber>=$i;$i++){ ?>
                <li class="waves-effect <?php echo ($i==$activePage) ? "active" : ""; ?>"><a
                        href="/admin/articles/<?php echo $i;?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li class="<?php echo ($activePage==$pagesArticleNumber OR $pagesArticleNumber==0) ? "disabled" : ""; ?>">
                    <a href="/admin/articles/<?php echo $pagesArticleNumber;?>">
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="input-field  col s12 m4  ">
            <select required name="idCategoria" id="idCategoria">
                <option value="all"><?php echo $tr_allCategories;  ?></option>
                <?php foreach($categoriesList as $c){
                    echo '<option value="'.$c["idCategoria"].'"';
                    echo ($c["idCategoria"] == $idCategoriaSelezionata) ? 'selected' : '';
                    echo ' >'.$c["nomeCategoria"].'</option>';
                }?>
            </select>
            <label for="idCategoria"><?php echo $tr_selectACategory; ?></label>
        </div>
        <div class="input-field  col s12 m4  ">
            <select required name="articlesPerPage" id="articlesPerPage">
                <option value="25" <?php echo ($articlesPerPage=="25") ? "selected" : ""; ?>>25</option>
                <option value="50" <?php echo ($articlesPerPage=="50") ? "selected" : ""; ?>>50</option>
                <option value="100" <?php echo ($articlesPerPage=="100") ? "selected" : ""; ?>>100</option>
            </select>
            <label for="articlesPerPage"><?php echo $tr_articlePerPage; ?></label>
        </div>
        <div class="input-field col offset-s1 s10 offset-m1 m3">
            <button class="btn" type="submit" name="action"><?php echo $tr_filter; ?><i class="material-icons right">search</i></button>
        </div>
        <form>
</div>
<div class="row">
    <div class="col s12 ">
        <table class=" highlight">
            <thead>
                <tr>
                    <th></th>
                    <th><?php echo $tr_article; ?></th>
                    <th><?php echo $tr_category; ?></th>
                    <th class="center"><?php echo $tr_articleDate; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                            if (empty($articleList)) {
                                echo "<tr>
                                        <td colspan='4'>".$tr_noArticleInserted.".</td>
                                    </tr>";
                            }
                            foreach ($articleList as $p) {
                                echo '<tr data-href="/admin/article/' . $p["idArticolo"] . '" class="linkedRows">
                                        <td>' . $p["idArticolo"] . '</td>
                                        <td>' . $p["titolo"] . '</td>
                                        <td>' . $p["nomeCategoria"] . '</td>
                                        <td class="center">' . $p["dataArticolo"] . '</td>
                                    </tr>';
                            }
                            ?>
            </tbody>
        </table>
    </div>
    <div class="input-field  col s12 center">
        <ul class="pagination">
            <li class="<?php echo ($activePage==1) ? "disabled" : ""; ?> ">
                <a href="/admin/articles/1"><i class="material-icons">chevron_left</i>
                </a>
            </li>
            <?php for($i=1;$pagesArticleNumber>=$i;$i++){ ?>
                <li class="waves-effect <?php echo ($i==$activePage) ? "active" : ""; ?>">
                    <a href="/admin/articles/<?php echo $i;?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>
            <li class="<?php echo ($activePage==$pagesArticleNumber OR $pagesArticleNumber==0) ? "disabled" : ""; ?>">
                <a href="/admin/articles/<?php echo $pagesArticleNumber;?>">
                    <i class="material-icons">chevron_right</i>
                </a>
            </li>
        </ul>
    </div>
</div>