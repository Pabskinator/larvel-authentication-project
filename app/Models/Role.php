<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $label
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Ability[] $abilities
 * @property-read int|null $abilities_count
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role query()
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereLabel($value)
 * @method static Builder|Role whereName($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Role extends Model
{
    use HasFactory;

        protected $fillable = [
            'name',
            'label'
        ];

        public function abilities() {
            return $this->belongsToMany(Ability::class)->withTimestamps();
        }

        public function allowTo($ability) {
            if(is_string($ability)){
                $ability = Ability::where('name', $ability)->firstOrFail();
            }

            $this->abilities()->sync($ability, false);
        }
}
