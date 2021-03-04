<?php
namespace App\Mifarma\Repositories;
use App\Mifarma\Entities\SocialProvider;
class SocialProviderRepo extends BaseRepo{

    public function getModel()
    {
        return new SocialProvider;
    }

    public function loginSocial($provider,$id_provider)
    {
        $user =SocialProvider::select('det_users_social_providers.*')
                    ->leftjoin('det_users_social_providers', function($join) {
                              $join->on('det_users_social_providers.social_provider_id','=', 'social_providers.id');
                            })

                    ->where('social_providers.name',$provider)
                    ->where('det_users_social_providers.id_provider',$id_provider)
                    //->get();
                    ->first();
        return $user;
    }

    public function getIdProvider($provider)
    {
        $socialProvider =SocialProvider::select('social_providers.*')
                    ->where('social_providers.name',$provider)
                    ->first();
        return $socialProvider;
    }
}
