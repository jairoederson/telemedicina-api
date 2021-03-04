<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Redirect;


use App\User;


class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect($provider)
    {
        
        return Socialite::driver($provider)->redirect();

    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo,$provider); 
        

        if (!$user) {
            return view('register')->with(["infoSocialite"=>array("name"=>$getInfo->name, "email"=>$getInfo->email, "avatar_original"=>$getInfo->avatar_original, "provider"=>$provider, "provider_id"=>$getInfo->id)]);
            
        }

        if($user["provider_id"] == null ) {
            
            $user_to_update = User::findOrFail($user['id']);

            $user_to_update->provider_id = $getInfo->id;
            $user_to_update->provider = $provider;

            $user_to_update->save();

            $device = $this->vexSolucionesVerificarTipoDispositivo();
    
            if($device == 'mobile'){
    
                $url = "https://telemedicina.today/mobile/paciente/dist/#/dashboard/" . $user["id"];
                return Redirect::to($url);
                
            }else{
    
                $url = "https://telemedicina.today/web/paciente/dashboard/" . $user["id"];
                return Redirect::to($url);
    
            }

        }else {
            $device = $this->vexSolucionesVerificarTipoDispositivo();
    
            if($device == 'mobile'){
    
                $url = "https://telemedicina.today/mobile/paciente/dist/#/dashboard/" . $user["id"];
                return Redirect::to($url);
                
            }else{
    
                $url = "https://telemedicina.today/web/paciente/dashboard/" . $user["id"];
                return Redirect::to($url);
    
            }

        }



    }
    
    function createUser($getInfo, $provider){
        $user = User::where('email', $getInfo->email)->first();
        
        return $user;
    }

    public function vexSolucionesVerificarTipoDispositivo() 
    {
        $tablet_browser = 0;
        $mobile_browser = 0;
        $body_class = 'desktop';
        
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
            $body_class = "tablet";
        }
        
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
            $body_class = "mobile";
        }
        
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
            $body_class = "mobile";
        }
        
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');
        
        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }
        
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
            $tablet_browser++;
            }
        }
        if ($tablet_browser > 0) {
            // Si es tablet has lo que necesites
            return 'tablet';
        }
        else if ($mobile_browser > 0) {
            // Si es dispositivo mobil has lo que necesites
            return 'mobile';
        }
        else {
            // Si es ordenador de escritorio has lo que necesites
            return 'desktop';
        } 
    }
}
