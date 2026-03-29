<?php

namespace App\Repositories;

trait HasTimestampsTrait {
    public function formatDate(mixed $model): string {
        return $model->created_at->format('d.m.Y H:i');
    }

    public function isUpdatedAt(mixed $model): bool {
        return $model->updated_at > $model->created_at;       
    }
}