<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Question extends Model{
    protected $table = 'questions';
    public $timestamps = false;
    public $fillable = ['name','quiz_id','img'];

}
?>