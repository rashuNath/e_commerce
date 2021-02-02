<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 05-05-18
 * Time: 01.14
 */

namespace App\Seller;

use App\Message\Message;
use App\Utility\Utility;
use App\Database\Database as DB;
use PDO, PDOException, PDORow;

class Seller extends DB
{
    public $productId;
    public $category;
    public $name;
    public $width;
    public $height;
    public $weight;
    public $description;
    public $picture;
    public $price;
    public $salePrice;
    public $entryDate;
    public $stock;

    public $quantity;
    public $totalPrice;
    
    public $email;
    public $userId;

    public $loopCounter;

    public $product_id=array();
    public $user_id = array();
    public $total_price = array();
    public $sold_counter = array();

    public $orderNumber;
    public $paidAmount;
    public $paid;

    public $categoryId;

    public $subCategory;

    public $transationId="cash";
    public $soldDate;


    public $clientEmail, $clientFname, $clientLName, $clientAddress, $clientState, $clientCity, $clientZip, $clientPhone;

    public function setCategoryGetData($data){
        if(array_key_exists('categoryId',$data)){
            $this->categoryId = $data['categoryId'];
        }
    }

    public function setGetData($data){
        if(array_key_exists('productId',$data)){
            $this->productId = $data['productId'];
        }
    }
    public function setData($data){
        if(array_key_exists('subCategory',$data)){
            $this->subCategory = $data['subCategory'];
        }
        if(array_key_exists('productId',$data)){
            $this->productId = $data['productId'];
        }
        if(array_key_exists('categoryId',$data)){
            $this->categoryId = $data['categoryId'];
        }
        if(array_key_exists('category',$data)){
            $this->category = $data['category'];
        }
        if(array_key_exists('name',$data)){
            $this->name = $data['name'];
        }
        if(array_key_exists('width',$data)){
            $this->width = $data['width'];
        }
        if(array_key_exists('height',$data)){
            $this->height = $data['height'];
        }
        if(array_key_exists('weight',$data)){
            $this->weight = $data['weight'];
        }
        if(array_key_exists('description',$data)){
            $this->description = $data['description'];
        }
        if(array_key_exists('picture',$data)){
            $this->picture = $data['picture'];
        }
        if(array_key_exists('price',$data)){
            $this->price = $data['price'];
        }
        if(array_key_exists('salePrice',$data)){
            $this->salePrice = $data['price'];
        }
        if(array_key_exists('email',$data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('entryDate',$data)){
            $this->entryDate = $data['entryDate'];
        }
        if(array_key_exists('stock',$data)){
            $this->stock = $data['stock'];
        }
    }

    public $itemCategoryId;
    public $itemSubCategoryId;
    public $productCategoryId;
    public $productBrandId;
    public $modelName;
    public $productGroup;
    public $isFeatured;
    public function setProductData($data){
        if(array_key_exists('item-category-id',$data)){
            $this->itemCategoryId = $data['item-category-id'];
        }

        if(array_key_exists('item-subcategory-id',$data)){
            $this->itemSubCategoryId = $data['item-subcategory-id'];
        }


        if(array_key_exists('product-category-id',$data)){
            $this->productCategoryId = $data['product-category-id'];
        }
        if(array_key_exists('product-brand-id',$data)){
            $this->productBrandId = $data['product-brand-id'];
        }
        if(array_key_exists('group-name',$data)){
            $this->productGroup = $data['group-name'];
        }
        if(array_key_exists('name',$data)){
            $this->name = $data['name'];
        }
        if(array_key_exists('model-name',$data)){
            $this->modelName = $data['model-name'];
        }

        if(array_key_exists('picture',$data)){
            $this->picture = $data['picture'];
        }
        if(array_key_exists('description',$data)){
            $this->description = $data['description'];
        }
        if(array_key_exists('width',$data)){
            $this->width = $data['width'];
        }
        if(array_key_exists('height',$data)){
            $this->height = $data['height'];
        }
        if(array_key_exists('weight',$data)){
            $this->weight = $data['weight'];
        }
        if(array_key_exists('price',$data)){
            $this->price = $data['price'];
        }
        if(array_key_exists('salePrice',$data)){
            $this->salePrice = $data['price'];
        }
        if(array_key_exists('email',$data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('entryDate',$data)){
            $this->entryDate = $data['entryDate'];
        }
        if(array_key_exists('stock',$data)){
            $this->stock = $data['stock'];
        }
        if(array_key_exists('is-featured',$data)){
            $this->isFeatured = $data['is-featured'];
        }
    }

    public function setCartData($data){
        if(array_key_exists('email',$data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('productId',$data)){
            $this->productId = $data['productId'];
        }
        if(array_key_exists('productName',$data)){
            $this->name = $data['productName'];
        }
        if(array_key_exists('picture',$data)){
            $this->picture = $data['picture'];
        }
        if(array_key_exists('quantity',$data)){
            $this->quantity = $data['quantity'];
        }
        if(array_key_exists('totalPrice',$data)){
            $this->totalPrice = $data['totalPrice'];
        }
        if(array_key_exists('userId',$data)){
            $this->userId = $data['userId'];
        }
    }

    public function setProductSoldData($data){
        if(array_key_exists('loopCounter',$data)){
            $this->loopCounter = $data['loopCounter'];
        }
        if(array_key_exists('orderNumber',$data)){
            $this->orderNumber = $data['orderNumber'];
        }
        if(array_key_exists('soldDate',$data)){
            $this->soldDate = $data['soldDate'];
        }
        for($i=0; $i<$this->loopCounter; $i++){
            if(array_key_exists("productId",$data)){
                $this->product_id[$i] = $data['productId'][$i];
            }
            if(array_key_exists("quantity",$data)){
                $this->sold_counter[$i] = $data['quantity'][$i];
            }
            if(array_key_exists('totalPrice',$data)){
                $this->total_price[$i] = $data['totalPrice'][$i];
            }
        }
        return $this->product_id;
    }


    public function setOrderData($data){
        if(array_key_exists('userId',$data)){
            $this->userId = $data['userId'];
        }
        if(array_key_exists('orderNumber',$data)){
            $this->orderNumber = $data['orderNumber'];
        }
        if(array_key_exists('paidAmount',$data)){
            $this->paidAmount = $data['paidAmount'];
        }
        if(array_key_exists('paid',$data)){
            $this->paid = $data['paid'];
        }
        if(array_key_exists('transaction-id',$data)){
            $this->transationId = $data['transaction-id'];
        }

        if(array_key_exists('client-email',$data)){
            $this->clientEmail = $data['client-email'];
        }

        if(array_key_exists('client-fname',$data)){
            $this->clientFname = $data['client-fname'];
        }

        if(array_key_exists('client-lname',$data)){
            $this->clientLName = $data['client-lname'];
        }

        if(array_key_exists('client-address',$data)){
            $this->clientAddress = $data['client-address'];
        }

        if(array_key_exists('client-state',$data)){
            $this->clientState = $data['client-state'];
        }

        if(array_key_exists('client-city',$data)){
            $this->clientCity = $data['client-city'];
        }

        if(array_key_exists('client-zip',$data)){
            $this->clientZip = $data['client-zip'];
        }

        if(array_key_exists('client-phone',$data)){
            $this->clientPhone = $data['client-phone'];
        }
    }

    public function storeOrder(){
        $dataArray = array($this->userId, $this->orderNumber, $this->paidAmount, $this->transationId, "no", $this->clientEmail, $this->clientFname, $this->clientLName, $this->clientAddress, $this->clientState, $this->clientCity, $this->clientZip, $this->clientPhone);
        $sql = "insert into orders (user_id, order_number, paid_amount, paid, delivered, client_email, client_fname, client_lname, client_address, client_state, client_city, client_zip, client_phone) values (?, ?, ?, ?,?,?,?,?,?,?,?,?,?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }
    public function getOrderNumber(){
        return $this->orderNumber;
    }

    //insert methods
    public function storeIntoProductSold($user_id){
        $status=FALSE;
        for($i=0; $i<$this->loopCounter; $i++){
            $sql = "select vendor_id from products where product_id='".$this->product_id[$i]."'";
            $sth = $this->dbh->query($sql);
            $vendor_id = $sth->fetch(PDO::FETCH_OBJ);

            $dataArray = array($this->product_id[$i], $user_id, $this->orderNumber, $this->sold_counter[$i], $vendor_id->vendor_id, $this->total_price[$i],$this->soldDate);
            $sql = "insert into product_sold (product_id, user_id, order_number, sold_counter, vendor_id, 
total_price,sold_date) values (?, ?, ?, ?,?,?,?)";
            $sth = $this->dbh->prepare($sql);
            $status = $sth->execute($dataArray);

            if($status){
                $sql="Update products set stock_status=stock_status-1 where product_id='".$this->product_id[$i]."'";
                $sth = $this->dbh->exec($sql);
            }
        }
        return $status;
    }

    public function storeIntoCart(){
        $dataArray = array($this->userId, $this->productId, $this->name, $this->picture, $this->quantity, $this->totalPrice);
        $sql = "insert into cart (user_id, product_id, product_name, picture, quantity, total_price ) values (?, ?, ?, ?, ?, ?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }


    public function storeItemCategory($itemName, $itemPicture){
        $sql = "insert into item_category (name, image) values('".$itemName."','".$itemPicture."')";
        $sth = $this->dbh->exec($sql);
        return $sth;
    }

    public function storeItemSubCategory($itemCategoryId, $name, $picture){
        $sql = "insert into item_subcategory (item_category_id, name, image) values('".$itemCategoryId."','".$name."','".$picture."')";
        $sth = $this->dbh->exec($sql);
        return $sth;
    }

    public function storeProductCategory($itemSubCategoryId, $name, $picture){
        $sql = "insert into product_category (item_subcategory_id, name, image) values('".$itemSubCategoryId."','".$name."','".$picture."')";
        $sth = $this->dbh->exec($sql);
        return $sth;
    }

    public function storeProductBrand($productCategoryId, $name, $picture){
        $sql = "insert into product_brand (product_category_id, name, image) values('".$productCategoryId."','".$name."','".$picture."')";
        $sth = $this->dbh->exec($sql);
        return $sth;
    }

    public function storeCategory($sellerId){
        $sql = "SELECT * FROM category where category_name = '".$this->name."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetch(PDO::FETCH_OBJ);
        if($data->category_name==$this->name){
            Message::message('This category has already been taken.');
            Utility::redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data = array($this->name, $this->description, $this->picture, $sellerId);
            $sql = 'INSERT INTO `category` (`category_name`,`description`,`picture`,`vendor_id`) VALUES (?, ?, ?,?)';
            $sth = $this->dbh->prepare($sql);
            $status = $sth->execute($data);

            if($status){
                $_SESSION['category-stored'] = "Category has been stored successfully.";
                Utility::redirect($_SERVER['HTTP_REFERER']);
            }else{
                $_SESSION['category-updated'] = "Something went wrong!";
                Utility::redirect($_SERVER['HTTP_REFERER']);
            }
        }

    }

    public function updateCategory(){
        $dataArray = array($this->name, $this->description, $this->picture);
        $sql = "update category set category_name=?, description=?, picture=? where category_id='".$this->categoryId."'";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);

        if($status){
            $_SESSION['category-updated'] = "Category has been updated successfully.";
            $location = "seller_dashboard/admin_update_category.php";
            Utility::redirect($location);
        }else{
            $_SESSION['product-updated'] = "Something went wrong!";
            Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function storeSubCategory($sellerId){
        $sql = "select category_id from category where category_name = '".$this->category."'";
        $sth = $this->dbh->query($sql);
        $categoryId = $sth->fetch(PDO::FETCH_OBJ);

        $dataArray = array($this->name, $categoryId->category_id, $this->picture,$sellerId);
        $sql = "insert into sub_category (sub_category_name, category_id, picture, vendor_id) values(?, ?, ?, ?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);

        if($status){
            Message::message("<div class='alert alert-success'>
                            Sub category has been added successfully.
                </div>");
            Utility::redirect($_SERVER['HTTP_REFERER']);
        }else{
            Message::message("<div class='alert alert-danger'>
                            Sub category has not been added!
                </div>");
            Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function storeProduct(){
//        $sql = "select category_id from category where category_name = '".$this->category."'";
//        $sth = $this->dbh->query($sql);
//        $categoryId = $sth->fetch(PDO::FETCH_OBJ);

//        $sql = "select sub_category_id from sub_category where sub_category_name = '".$this->subCategory."'";
//        $sth = $this->dbh->query($sql);
//        $subCategoryId = $sth->fetch(PDO::FETCH_OBJ);

//        $sql = "select user_id from users where email = '".$this->email."'";
//        $sth = $this->dbh->query($sql);
//        $sellerId = $sth->fetch(PDO::FETCH_OBJ);

        $dataArray = array($this->productCategoryId, $this->name, $this->picture, $this->productBrandId, $this->modelName, $this->productGroup, $this->width, $this->height, $this->weight, $this->description, $this->price, $this->salePrice, 1, $this->entryDate, $this->stock, $this->isFeatured, $this->itemCategoryId, $this->itemSubCategoryId);
        $sql = 'insert into products (product_category_id, product_name, picture, product_brand_id, product_model,  product_group, width, height, weight, description, price, sale_price, vendor_id, entry_date, quantity, is_feature, item_category_id, item_subcategory_id) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);

        $sql = "select product_id from products where product_name = '".$this->name."'";
        $sth = $this->dbh->query($sql);
        $product_id = $sth->fetch(PDO::FETCH_OBJ);

        $dataArray = array($product_id->product_id, $this->stock, $this->entryDate);
        $sql = "insert into stock (product_id, present_stock, date) VALUES (?, ?, ?)";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);
        return $status;
    }

    public function updateProduct($productId){
        $dataArray = array($this->name, $this->picture, $this->width, $this->height, $this->weight, $this->description, $this->price, $this->salePrice, $this->stock);
        $sql = "update products set product_name=?, picture=?, width=?, height=?, weight=?, description=?, price=?, sale_price=?, stock_status=? where product_id='".$productId."'";
        $sth = $this->dbh->prepare($sql);
        $status = $sth->execute($dataArray);

        if($status){
            $_SESSION['product-updated'] = "Product has been updated successfully.";
            $location = "seller_dashboard/admin_update_product.php";
            Utility::redirect($location);
        }else{
            $_SESSION['product-updated'] = "Something went wrong!";
            Utility::redirect($_SERVER['HTTP_REFERER']);
        }

    }


    public function categoryName($userId){
        $sql = "SELECT `category_name` FROM `category` where vendor_id='".$userId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        return $data;
    }

    public function subCategoryName($userId){
        $sql = "SELECT `sub_category_name` FROM `sub_category` where vendor_id='".$userId."'";
        $sth = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $data = $sth->fetchAll();
        return $data;
    }

    public function viewAllMethod($table){
        $sql = "select * from `{$table}`";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function viewAllByIdMethod($table, $columnName, $id){
        $sql = "select * from `{$table}` where `{$columnName}`=".$id;
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
//    public function viewAllByIdMethodPaged($table, $columnName, $id){
//        $sql = "select * from `{$table}` where `{$columnName}`=".$id;
//        $sth = $this->dbh->query($sql);
//        $data = $sth->fetchAll(PDO::FETCH_OBJ);
//        return $data;
//
//        // Find out how many items are in the table
//        $total = $sth->rowCount();
//
//        // How many items to list per page
//        $limit = 1;
//
//        // How many pages will there be
//        $pages = ceil($total / $limit);
//
//        // What page are we currently on?
//        $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
//            'options' => array(
//                'default'   => 1,
//                'min_range' => 1,
//            ),
//        )));
//
//        // Calculate the offset for the query
//        $offset = ($page - 1)  * $limit;
//
//        // Some information to display to the user
//        $start = $offset + 1;
//        $end = min(($offset + $limit), $total);
//
//        // The "back" link
//        $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
//
//        // The "forward" link
//        $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
//
//        // Display the paging information
//        echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
//
//        // Prepare the paged query
////        $sql = "select * from `{$table}` where `{$columnName}`=".$id;
//        $sql = "select * from products where `{$columnName}`=$id  ORDER BY RAND() LIMIT $limit OFFSET $offset";
//        $sth = $this->dbh->query($sql);
//        $data = $sth->fetchAll(PDO::FETCH_OBJ);
////        $stmt = $this->dbh->prepare('
////        SELECT
////            *
////        FROM
////            products
////        ORDER BY
////            RAND()
////        LIMIT
////            :limit
////        OFFSET
////            :offset
////    ');
//
//        // Bind the query params
////        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
////        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
////        $sql->execute();
//
//        // Do we have any results?
//        if ($sth->rowCount() > 0) {
//            // Define how we want to fetch the results
////            $stmt->setFetchMode(PDO::FETCH_ASSOC);
////            $iterator = new IteratorIterator($stmt);
//            $iterator = $data;
//            return $iterator;
//
//            // Display the results
////            foreach ($iterator as $row) {
////                echo '<p>', $row['product_name'], '</p>';
////            }
//
//        } else {
//            echo '<p>No results could be displayed.</p>';
//        }
//    }

    //related products
    public function relatedProducts($productId){
        $sql = "select item_subcategory_id from products where product_id = '".$productId."'";
        $sth = $this->dbh->query($sql);
        $itemSubcategoryId = $sth->fetch();
        $itemSubcategoryId = $itemSubcategoryId['item_subcategory_id'];

        $sql = "select * from products where item_subcategory_id = '".$itemSubcategoryId."' AND product_id !='".$productId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }


    public function viewCategory(){
        $sql = 'select * from category';
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function viewItemCategory(){
        $sql = 'select * from item_category';
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function viewCategoryLimit($limit){
        $sql = 'select * from item_category limit '.$limit;
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function viewSubcategoryByCategoryId($categoryId){
        $sql = "select * from sub_category where category_id='".$categoryId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();

        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewOrderDataBySellerId($sellerId){
        $sql = "select * from product_sold where vendor_id='".$sellerId."'";
        $sth =$this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();

        if($row>0){
            return $data;
        }else{
            return FALSE;
        }

    }




    public function productsByCategoryId(){
        $sql = "select * from products where category_id='".$this->categoryId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function productsBySubCategoryId($subCategoryId){
        $sql = "select * from products where sub_category_id='".$subCategoryId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }


    public function productFromCategoryByProductId(){
        $sql = "select category_id from products where product_id='".$this->productId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);

        $sql = "select * from products where category_id='".$data[0]->category_id."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function totalProduct(){
        $sql = 'select * from products ORDER BY RAND()';
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);

        // Find out how many items are in the table
        $total = $sth->rowCount();
        return $total;
    }

    public function productView(){
        $sql = 'select * from products ORDER BY RAND()';
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function productViewPaged($limit, $offset){
        // Prepare the paged query
        $sql = "select * from products ORDER BY RAND() LIMIT $limit OFFSET $offset";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
//        $stmt = $this->dbh->prepare('
//        SELECT
//            *
//        FROM
//            products
//        ORDER BY
//            RAND()
//        LIMIT
//            :limit
//        OFFSET
//            :offset
//    ');

        // Bind the query params
//        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
//        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
//        $sql->execute();

        // Do we have any results?
        if ($sth->rowCount() > 0) {
            // Define how we want to fetch the results
//            $stmt->setFetchMode(PDO::FETCH_ASSOC);
//            $iterator = new IteratorIterator($stmt);
            $iterator = $data;
            return $iterator;

            // Display the results
//            foreach ($iterator as $row) {
//                echo '<p>', $row['product_name'], '</p>';
//            }

        } else {
            echo '<p>No results could be displayed.</p>';
        }
    }

    public function featuredProductView(){
        $sql = "select * from products where is_feature = 'yes' AND quantity>0 limit 4";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }



    public function productViewBySellerId($id){
        $sql = "select * from products WHERE vendor_id = '".$id."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function categoryViewBySellerId($id){
        $sql = "select * from category WHERE vendor_id = '".$id."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function singleProductView(){
        $sql = "select * from products where product_id='".$this->productId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function singleProductViewByProductId($productId){
        $sql = "select * from products where product_id='".$productId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function singleCategoryViewByCategoryId($categoryId){
        $sql = "select * from category where category_id='".$categoryId."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function cartView($id){
        $sql = "select * from cart where user_id = '".$id."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);

        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
        
    }

    public function productIntoCart($id){
        $sql = "select SUM(quantity) as totalquantity from cart where user_id = '".$id."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetch(PDO::FETCH_ASSOC);

        $row = $sth->rowCount();
        if($row>0){
            return $data['totalquantity'];
        }else{
            return 0;
        }

    }

    public function product_filter_by_price($low_price,$high_price){
        $sql = "select * from products where price>='".$low_price."' and price<='".$high_price."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);

        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function product_filter_by_price_by_category($low_price,$high_price,$categoryId, $columnName){
        $sql = "select * from products where `{$columnName}`='".$categoryId."' and price>='".$low_price."' and price<='".$high_price."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);

        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function product_filter_by_price_by_sub_category($low_price,$high_price,$subCategoryId){
        $sql = "select * from products where sub_category_id='".$subCategoryId."' and price>='".$low_price."' and price<='".$high_price."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);

        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewSoldDataForSeller($email){
        $sql = "select user_id from users where email='".$email."'";
        $sth = $this->dbh->query($sql);
        $id = $sth->fetch(PDO::FETCH_OBJ);

        $sql = "select * from product_sold WHERE vendor_id = '".$id->user_id."'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }

    }

    public function viewTotalSoldData(){
        $sql = "select * from product_sold";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function is_exist($data){


    }

    public function deleteOrderDataFromCart($user_id){
        $status = false;
        for($i=0; $i<$this->loopCounter; $i++){
            $sql = "delete from cart where product_id = '".$this->product_id[$i]."' AND user_id='".$user_id."'";
            $sth = $this->dbh->exec($sql);

            if($sth){
                $status = TRUE;
            }else{
                $status = FALSE;
            }
        }
        return $status;

    }

    public function deleteFromCart($cartId){
        $sql = "delete from cart where cart_id =".$cartId;
        $sth = $this->dbh->exec($sql);
        return $sth;
    }

    public function viewOrders(){
        $sql = "Select * from orders where delivered ='no' OR delivered='processing'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();

        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function viewOrdersCompleted(){
        $sql = "Select * from orders where delivered ='completed'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();

        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function order_details_by_orderid($order_number){
        $sql = "select * from orders where order_number = '".$order_number."' and delivered = 'no'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }
    public function order_details_productbyproduct_by_orderid($order_number){
        $sql = "select * from product_sold where order_number = '".$order_number."' and delivered = 'no'";
        $sth = $this->dbh->query($sql);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        $row = $sth->rowCount();
        if($row>0){
            return $data;
        }else{
            return FALSE;
        }
    }

    public function process_order($order_number){
        $sql = "update orders set delivered='processing' where order_number = '".$order_number."'";
        $status = $this->dbh->exec($sql);
        return $status;
    }

    public function complete_order($order_number){
        $sql = "update orders set delivered='completed' where order_number = '".$order_number."'";
        $status = $this->dbh->exec($sql);
        return $status;
    }


}