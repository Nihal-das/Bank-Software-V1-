<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CustomModel extends Model
{
    protected $table = 'custom_models';

    protected $fillable = [
        'name',
        'description'
    ];

    // Accessor & Mutator
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected static function booted()
    {
        parent::booted();

        if (!Schema::hasTable('custom_models')) {
            Schema::create('custom_models', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
    }
}
