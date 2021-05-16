<?php
class cart
{
    public $srno;
    public $pro_id;
    public $pro_name;
    public $pro_photo;
    public $price;
    public $brand;
    public $discount;
    public $qty;
    public function __construct($cno,$pid,$pname,$photo,$amt,$_brand,$disc,$_qty)
    {
        $this->srno=$cno;
        $this->pro_id=$pid;
        $this->pro_name=$pname;
        $this->pro_photo=$photo;
        $this->price=$amt;
        $this->brand=$_brand;
        $this->discount=$disc;
        $this->qty=$_qty;
    }
    public function getPro_id(){
        return $this->pro_id;
    }

    public function getQty()
    {
        return $this->qty;
    }
    public function setQty($quantity){
        $this->qty=$quantity;
    }
}