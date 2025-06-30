<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $handler
 * @property string $description
 * @property string $picture
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;
}
