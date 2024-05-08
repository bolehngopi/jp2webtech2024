<?php

namespace Database\Factories\Helpers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class FactoryHelper {
    static public function getRandomModelId(Model $model) {
        $count = User::query()->count();

        if($count === 0) {
            return User::factory()->create();
        } else {
            return rand(1, $count);
        }
    }
}