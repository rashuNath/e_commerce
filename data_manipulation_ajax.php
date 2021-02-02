<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 05-05-18
 * Time: 02.20
 */
if(!isset($_SESSION)){
    session_start();
}
include_once('vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;

$objectSeller = new \App\Seller\Seller();

if(isset($_POST['item_category_id'])){
    $itemSubCategories = $objectSeller->viewAllByIdMethod('item_subcategory','item_category_id',$_POST['item_category_id']);
    $htmlString = "<option value='choose'>Choose Item Subcategory</option>";
    if($itemSubCategories){
        foreach ($itemSubCategories as $itemSubCategory){
            $htmlString .="<option value='".$itemSubCategory->item_subcategory_id."'>".$itemSubCategory->name."</option>";
        }
    }
    echo $htmlString;
}

if(isset($_POST['product_category_id'])){
    $itemSubCategories = $objectSeller->viewAllByIdMethod('product_category','item_subcategory_id',$_POST['product_category_id']);
    $htmlString = "<option value='choose'>Choose Product Category</option>";
    if($itemSubCategories){
        foreach ($itemSubCategories as $itemSubCategory){
            $htmlString .="<option value='".$itemSubCategory->product_category_id."'>".$itemSubCategory->name."</option>";
        }
    }
    echo $htmlString;
}

if(isset($_POST['product_category_idd'])){
    $itemSubCategories = $objectSeller->viewAllByIdMethod('product_brand','product_category_id',$_POST['product_category_idd']);
    $htmlString = "<option value='choose'>Choose Product Brand</option>";
    if($itemSubCategories){
        foreach ($itemSubCategories as $itemSubCategory){
            $htmlString .="<option value='".$itemSubCategory->product_brand_id."'>".$itemSubCategory->name."</option>";
        }
    }
    echo $htmlString;
}