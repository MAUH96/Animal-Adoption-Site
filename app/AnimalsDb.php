<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AnimalsDb extends Model
{
    //

    use Sortable;
    public $sortable = ['name', 'date_of_birth'];
    protected $fillable = ['name', 'date_of_birth', 'description', 'availability', 'picture_count'];
}
