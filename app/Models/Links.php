<?php

namespace App\Models;

use App\Policies\LinksPolicy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $order
 * @property int $user_id
 *
 */

class Links extends Model
{
    /** @use HasFactory<\Database\Factories\LinksFactory> */
    use HasFactory;

    public function moveUp()
    {
        $this->move(1);
    }

    public function moveDown()
    {
        $this->move(-1);
    }

    private function move($to)
    {
        $targetPosition = $this->order + $to;
        $currentPosition = $this->order;

        /** @var User $user */
        $user = Auth::user();
        $swapingWith = $user->links()
            ->where('order', $targetPosition)
            ->first();

        $swapingWith->fill(['order' => $currentPosition])->save();

        $this->fill([
            'order' => $targetPosition
        ])->save();
    }
}
