<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    public $name;
    public $phone;
    public $email;
    public $address;

    public function __construct($name, $email, $phone, $address)
    {
        $this->name = $name;
        $this->mobilePhone = $phone;
        $this->email = $email;
        $this->address = $address;
    }
}
