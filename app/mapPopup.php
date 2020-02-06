<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class mapPopup extends Model
{

    use Sortable;
    
    public function category()
  {
     return $this->belongsTo(Category::class);
  }

      public function user()
  {
     return $this->belongsTo(User::class);
  }
}
