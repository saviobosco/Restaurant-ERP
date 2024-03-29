<?php

namespace App\Database\Schema;

use Closure;
use Illuminate\Database\Schema\Blueprint as DefaultBluePrint;

class Blueprint extends DefaultBluePrint
{

    /**
     * Create a new schema blueprint.
     *
     * @param  string  $table
     * @param  \Closure|null  $callback
     * @param  string  $prefix
     * @return void
     */
    public function __construct($table, Closure $callback = null, $prefix = '')
    {
        parent::__construct($table, $callback, $prefix);

        if (! is_null($callback)) {
            $callback($this);
        }
    }

    public function creator()
    {
        $this->string("createdBy")->nullable();

        $this->string("updatedBy")->nullable();
    }



}
