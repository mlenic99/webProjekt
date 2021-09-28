<?php

session_start();

function show_products($stmt)
{
    $counter = 0;
    foreach ($stmt as $row) {
        if ($counter == 4) {
            break;
        }
        $id = $row['eventID'];
        $name = $row['eventName'];
        $sqldate = $row['eventDate'];
        $location = $row['eventLocation'];
        $price = $row['eventPrice'];
        $desc = $row['eventDescription'];
        $qty = $row['eventQty'];
        $date = strtotime($sqldate);
        $myFormatForView = date("d/m/Y", $date);


        echo
        "<div class='col-12 col-md-3 p-3' >
        <div class='p-item p-2' id='item" . $id . "' onmouseover='itemhover(" . $id . ")'>
            <a href='product.php?id=" . $id . "' >
                <img src=" . $row['eventImgURL'] . " class='p-img mw-100 rounded' alt='" . $name . "'>
                <div class='p-name banner-prime-text mt-3 mb-2'>
                    " . $name . "
                </div>
                <div class='p-name banner-prime-text mt-3 mb-2'>
                    " . $myFormatForView . "                
                </div>
                <div class='p-price'><span class='price-text-color'>
                    " . $row['eventPrice'] . "</span> kn
                </div>
            </a>";
               
                
    if($qty==0) {
        echo "
        <label for='quantity' class='content-text'>
                    Količina: 
                </label>
                <input type='number' value='1' class='c-qty input-number ml-1' id='input" . $id . "' min='0' max='" . $qty . "' aria-hidden='true' disabled>
        <input type='button' id='btnAdd" . $id . "'value='Rasprodano' class='cart p-add btn btn-primary w-75 p-2 mt-2' disabled> </div></div> ";

    }elseif ($_SESSION['cart'][$id] !=0){
        echo "
        <label for='quantity' class='content-text'>
                    Količina: 
                </label>
                <input type='number' value='1' class='c-qty input-number ml-1' id='input" . $id . "' min='0' max='" . $qty . "' aria-hidden='true' disabled>
        <input type='button' id='btnAdd" . $id . "'value='Dodano' class='cart p-add btn btn-primary w-75 p-2 mt-2' disabled> </div></div> ";
    } 
    
    else {
    echo "        <label for='quantity' class='content-text pr-1'>
                    Količina: 
                </label>
                <input type='number' value='1' class='c-qty input-number ' id='input" . $id . "' min='0' max='" . $qty . "' aria-hidden='true'>
                <input type='button' id='btnAdd" . $id . "'value='Add To Cart' class='cart p-add btn btn-primary w-75 p-2 mt-2' onclick='cart(" . $id . ")' >
                <input type='hidden' id='" . $id . "_name' value=" . $name . ">
                <input type='hidden' id='" . $id . "_price' value='" . $row['eventPrice'] . "'>
                <input type='hidden' id='" . $id . "_qty' value=" . $row['eventQty'] . ">
           </div> </div>  ";}
        $counter++;
    }
}

function show_product($stmt)
{
    foreach ($stmt as $row) {
        
        $id = $row['eventID'];
        $name = $row['eventName'];
        $sqldate = $row['eventDate'];
        $location = $row['eventLocation'];
        $price = $row['eventPrice'];
        $desc = $row['eventDescription'];
        $qty = $row['eventQty'];
        $date = strtotime($sqldate);
        $myFormatForView = date("d/m/Y", $date);


        echo
        "    <div class='row'>
        
        <div class='p-item col-12 col-md-4' id='item" . $id . "'>
            <img src=" . $row['eventImgURL'] . " class='p-img mw-100 rounded' alt='" . $name . "'>
        </div>
        <div class='p-item col-12 col-md-8' id='item" . $id . "'>
            <div class='p-name banner-prime-text mt-3 mb-2'>
                " . $name . "
            </div>
            <div class='p-date banner-prime-text mt-3 mb-2'>
                " . $myFormatForView . ", " . $location . "
            </div>
            <div class='p-price'><span class='price-text-color'>
                    " . $price . "</span> kn
            </div>
            <div class='p-desc'>
            " . $desc . "
            </div>
           
        
    <div>";
                
    if($qty==0) {
        echo "
        <label class='content-text'>
            Količina:
            <input type='number' value='0' class='c-qty input-number ml-1' id='input" . $id . "' min='0' max='" . $qty . "' aria-hidden='true' disabled></label>
        <input type='button' id='btnAdd" . $id . "'value='Rasprodano' class='cart p-add btn btn-primary w-75 p-2 mt-2' onclick='cart(" . $id . ") disabled> </div> ";

    }elseif ($_SESSION['cart'][$id] !=0){
        echo "
        <label class='content-text'>
            Količina:
        <input type='number' value='".$_SESSION['cart'][$id]."' class='c-qty input-number ml-1' id='input" . $id . "' min='0' max='" . $qty . "' aria-hidden='true' disabled></label>
        <input type='button' id='btnAdd" . $id . "'value='Dodano' class='cart p-add btn btn-primary w-75 p-2 mt-2'  disabled> </div> ";
    } 
    
    else {
    echo "
        <label class='content-text'>
            Količina:
        <input type='number' value='1' class='c-qty input-number ml-1' id='input" . $id . "' min='0' max='" . $qty . "' aria-hidden='true'></label>
    </div>
        <div>
        <input type='button' id='btnAdd" . $id . "' value='Add To Cart' class='cart p-add btn btn-primary w-100 p-2 mt-2' onclick='cart(" . $id . ")'>
        <input type='hidden' id='" . $id . "_name' value=" . $name . ">
        <input type='hidden' id='" . $id . "_price' value='" . $price . "'>
        <input type='hidden' id='" . $id . "_qty' value=" . $row['eventQty'] . ">
        </div>

        </div>     
    </div>  ";}
    }
}


