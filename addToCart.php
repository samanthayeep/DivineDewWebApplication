<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['title'])) {
    //if the action is remove , it will retrieve the title of the item to be removed
    $titleToRemove = $_GET['title'];
    //store the value of 'title' parameter in the variable titleToRemove
    foreach ($_SESSION['cart'] as $index => $item) {
        //it iterates through each item in the shopping cart,
        //$index variable represent index of current item
        //$item represent the details of current item
        if ($item['title'] === $titleToRemove) {
            //if current item  matches the title to be removed
            unset($_SESSION['cart'][$index]);
            //remove the item form the shopping cart by unsetting it from the $session array
            //using index obtained from the loop
            echo 'Item removed from cart successfully.';
            //ouput a remove successfully message
            exit; 
            //exit the execution
        }
    }

    echo 'Item not found in cart.';

}else if (isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['title']) && isset($_GET['quantity'])) {
    //if action is set in the URL & value is update & title and quantity parameters are set
    $titleToUpdate = $_GET['title'];
    //retrieve the value & store it in variable titleToUpdate
    $value = $_GET['quantity']; 
    //retrieve value of quantity parameter & store it in variable value

    foreach ($_SESSION['cart'] as &$item) {
        //iterate through eahc item in shopping cart in th session, $item variable represent details of current item
        //item variable represent the details of current item
        if ($item['title'] === $titleToUpdate) {
            //if title of the current item matches the title to be updated
            $item['quantity'] = $item['quantity'] + $value;
            //update quantity of current item by adding the value retrieve 
            echo 'Item quantity updated successfully.';
            //Output a success message
            exit; 
        }
    }

    echo 'Item not found in cart.';

} else {
    //adding new product to the cart
    $title = $_GET['title'];
    //retrieve value of title parameter$ store it in the variable $title
    $image = $_GET['image'];
    $price = $_GET['price'];
    $quantity = 1;
    //set the quantity of the new item to 1 by default

    if (!isset($_SESSION['cart'])) {
        // if the cart session variable is not set
        $_SESSION['cart'] = [];
        //initialize it as an empty array
    }

    $_SESSION['cart'][] = [
        //add new item to shopping cart array 
        'title' => $title,
        'image' => $image,
        'price' => $price,
        'quantity' => $quantity
    ];

    echo 'Product added to cart successfully.';
}

