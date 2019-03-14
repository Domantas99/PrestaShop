<?php
/**
 * Created by PhpStorm.
 * User: lfaus
 * Date: 2019-03-07
 * Time: 18:28
 */

class DofaCommentSubmitModuleFrontController extends ModuleFrontController
{

     public function postProcess()
     {

         parent::postProcess(); // TODO: Change the autogenerated stub\


         if (isset($_POST['submit'])) {
             $username = ($_POST["username"]);
             $email = ($_POST["email"]);
             $phone_number = ($_POST["phone_number"]);
             $comment = ($_POST["comment"]);
             $rating = ((int)$_POST["rating"]);
             $id_product = ((int)$_POST["id_product"]);
             //  Db::getInstance()->execute("INSERT INTO product_comments ('username', 'email', 'phone_number', 'comment', 'star_rating' ) VALUES ('$username', '$email', '$phone_number', '$comment', '$rating')");

             $insertData = array(
                 'username' => $username,
                 'email' => $email,
                 'phone_number' => $phone_number,
                 'comment' => $comment,
                 'star_rating' => $rating,
                 'id_product' => $id_product
             );
             Db::getInstance()->insert(
                 "product_comments", $insertData);
         }

         Tools::redirect($this->context->link->getProductLink($id_product));

     }


}