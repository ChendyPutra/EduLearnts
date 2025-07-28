<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
        protected $fillable = ['module_id', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'];

    public function module()
{
    return $this->belongsTo(Module::class);
}
}
