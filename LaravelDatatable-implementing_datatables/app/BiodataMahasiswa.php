<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BiodataMahasiswa extends Model
{
    use SoftDeletes;


    protected $table = "biodata_mahasiswa";

    protected $fillable =[
    	"name",
    	"nim",
    	"address",
    	"photo"];
}
