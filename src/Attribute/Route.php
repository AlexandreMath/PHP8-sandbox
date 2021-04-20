<?php

namespace App\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Route
{
    //private string $path;
    
    public function __construct(private string $path) 
    {
        //$this->path = $path;
    }

    
    public function getPath(): string
    {
        return $this->path;
    }
}
?>