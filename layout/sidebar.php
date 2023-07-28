<div class="section" id="category-product-wp">
    <div class="section-head">
        <h3 class="section-title">Danh mục sản phẩm</h3>
    </div>
    <div class="secion-detail">

        <ul class="list-item">


            <?php

            foreach ($list_cate as $cate) {


                if ($cate['parent_id'] == 0) {





            ?>
                    <li>
                        <a href="san-pham/<?php echo $cate['slug']; ?>.html/<?php echo $cate['id']; ?>" title=""><?php echo $cate['name']; ?></a>

                        <?php
                        foreach ($list_cate as $cat) {

                            if ($cat['parent_id'] == $cate['id']) {


                        ?>
                                <ul class="sub-menu">

                                    <?php
                                    foreach ($list_cate as $cat) {

                                        if ($cat['parent_id'] == $cate['id']) {


                                    ?>

                                            <li>
                                                <a href="san-pham/<?php echo $cat['slug']; ?>.html/<?php echo $cat['id']; ?>" title=""><?php echo $cat['name']; ?></a>

                                                <?php
                                                foreach ($list_cate as $category) {

                                                    if ($category['parent_id'] == $cat['id']) {


                                                ?>
                                                        <ul class="sub-menu">

                                                            <?php
                                                            foreach ($list_cate as $category) {

                                                                if ($category['parent_id'] == $cat['id']) {


                                                            ?>
                                                                    <li>
                                                                        <a href="san-pham/<?php echo $category['slug']; ?>.html/<?php echo $category['id']; ?>" title=""><?php echo $category['name']; ?></a>
                                                                    </li>


                                                            <?php

                                                                }
                                                            }

                                                            ?>

                                                        </ul>

                                                <?php

                                                    }
                                                }

                                                ?>
                                            </li>

                                    <?php
                                        }
                                    }
                                    ?>



                                </ul>

                        <?php
                            }
                        }
                        ?>


                    </li>

            <?php
                }
            }

            ?>

        </ul>
    </div>
</div>