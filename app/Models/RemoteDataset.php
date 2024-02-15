<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemoteDataset extends Model
{
    use HasFactory;

    protected $table = 'remote_dataset';
    protected $fillable = array(
        'dataset'
    );


    /**
     * @throws \JsonException
     */
    public function getJsonDatasetAttribute(){
        return json_decode($this->attributes['dataset'], false, 512, JSON_THROW_ON_ERROR);
    }

    public function modifiedVersions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModifiedDataset::class,'remote_dataset_id','id');
    }
}
