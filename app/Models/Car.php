<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model{
    // public string $now;
    // public function __construct(int $now){
    //     $this -> now = $now;
    // }
    // public function greet()
    // {
    //    if($this->now <= 12){
    //      return("おはようございます");
    //    }
    //    if($this->now <= 18){
    //      return("こんにちは");
    //    }
    //    return("こんばんは");
    // }

    private string $size;
    private string $color;
    private string $country;

    public function  __construct(string $size, string $color, string $country){
        $this->size  = $size;
        $this->color = $color;
        $this->country = $country;
    }
    public function getSize(){
        return $this->size;
        return $this->color;
        return $this->country;
    }
}
