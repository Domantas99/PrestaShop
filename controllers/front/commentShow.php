<?php

class DofaCommentShowModuleFrontController
{
    public function diplayComment()
    {
        $id_product=Tools::getValue('id_product');

        $sql = new DbQuery();
        $sql->select('`username`, `comment`, `star_rating`,`id_product`');
        $sql->from('product_comment');


    }
}
