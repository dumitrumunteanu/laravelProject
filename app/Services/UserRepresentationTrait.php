<?php

namespace App\Services;

use App\Models\User;

trait UserRepresentationTrait {
    protected function identifyUserRepresentation(?User $user) {
        return $user ? "User with id {$user->id}" : 'Unknown user';
    }
}
