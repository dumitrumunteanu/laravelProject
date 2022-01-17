<?php

namespace App\Models;

interface LoggableInterface {
    /*
     * Get Loggable unique name for message generation
     */
    public function convertToLoggableString(): string;
    public function getData(): array;
}
