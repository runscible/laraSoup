<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SoupTest extends TestCase
{
    use soupControlller;

    public function test_soup_case(){
        $soupString  = 'oiejkdjoiedsadkljasdoie';
        app/Http/Controllers/soupController::getResults($soupString); 
        
        return assert('results horizontal right: 3 results horizontal left: 0 results vertical: 0 results down: 0 results diagonal up right : 0 results diagonal up left: 0 results diagonal down right: 0 results diagonal down left 0'); 
    }
}
