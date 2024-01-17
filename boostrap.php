<?php

// Register Collection::set() as an alias of put() - with support for bulk-setting values
use Illuminate\Support\Collection;

Collection::macro('set', function(mixed $values) {
    /** @var Collection $this */
    if (is_array($values)) {
        foreach ($values as $key => $value) {
            $this->put($key, $value);
        }
    } else {
        $this->put(...func_get_args());
    }
    return $this;
});
