<?php
class Narudzba
{
    public $id;
    public $name;
    public $address;
    public $postcode;
    public $town;
    public $email;
    public $products;

    function __construct($id, $name, $address, $postcode, $town, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->postcode = $postcode;
        $this->town = $town;
        $this->email = $email;
        $this->products  = array();
      }

    function set_id($id)
    {
        $this->id = $id;
    }
    function get_id()
    {
        return $this->id;
    }
    function set_name($name)
    {
        $this->name = $name;
    }
    function get_name()
    {
        return $this->name;
    }
    function set_address($address)
    {
        $this->address = $address;
    }
    function get_address()
    {
        return $this->address;
    }
    function set_postcode($postcode)
    {
        $this->postcode = $postcode;
    }
    function get_postcode()
    {
        return $this->postcode;
    }
    function set_town($town)
    {
        $this->town = $town;
    }
    function get_town()
    {
        return $this->town;
    }
    function set_email($email)
    {
        $this->email = $email;
    }
    function get_email()
    {
        return $this->email;
    }
    function set_products($products)
    {
        $this->products = $products;
    }
    function add_products($product)
    {
        array_push($this->products, $product);
    }
    function get_products()
    {
        return $this->products;
    }
    function get_order_price() {
        $sum=0;
        $prod=$this->products;
        foreach($prod as $p){
            $sum= $sum + $p->get_totalprice();
        }
        return $sum;
    }
}


class Proizvod {
    public $id;
    public $name;
    public $quantity;
    public $price;
    public $totalPrice;

    function __construct($id, $name, $quantity, $price=0) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->totalPrice= $price*$quantity;
      }

    function set_id($id)
    {
        $this->id = $id;
    }
    function get_id()
    {
        return $this->id;
    }
    function set_name($name)
    {
        $this->name = $name;
    }
    function get_name()
    {
        return $this->name;
    }
    function set_quantity($quantity)
    {
        $this->quantity = $quantity;
    }
    function get_quantity()
    {
        return $this->quantity;
    }
    function set_price($price)
    {
        $this->price = $price;
    }
    function get_price()
    {
        return $this->price;
    }
    function get_totalprice()
    {
        return $this->totalPrice;
    }
}