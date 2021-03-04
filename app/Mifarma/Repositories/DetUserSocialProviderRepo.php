<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\DetUserSocialProvider;
class DetUserSocialProviderRepo extends BaseRepo{
    
    public function getModel()
    {
        return new DetUserSocialProvider;
    }

    
} 
