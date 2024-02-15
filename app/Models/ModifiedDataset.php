<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifiedDataset extends Model
{
    use HasFactory;
    protected $table = 'modified_dataset';
    protected $fillable = array(
        'remote_dataset_id',
        'dataset',
    );
}
