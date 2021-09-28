<?php 
class event {
    public $id;
    public $name;
    public $date;
    public $location;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed|string $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return int|mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param int|mixed $qty
     */
    public function setQty($qty): void
    {
        $this->qty = $qty;
    }
    public $price;
    public $description;
    public $qty;

    function __construct($id, $name, $date, $location, $price, $description="", $qty=0) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->location = $location;
        $this->price = $price;
        $this->description = $description;
        $this->qty  = $qty;
      }


}

