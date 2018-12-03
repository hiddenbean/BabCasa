<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Guest
{		
	public  $id;
	public  $ipAddress;
	public  $os;
	public  $device;
	public  $browser;
	public  $latitude;
	public  $longitude;
	public  $lastAtivity;
	public  $userId;

	public function __construct($session)
	{	
		$this->id = $session->id;
		$this->ipAddress = $session->ip_address;
		$this->os = Guest::getOs($session->user_agent);
		$this->device = Guest::getDevice($session->user_agent);
		$this->browser = Guest::getBrowser($session->user_agent);
		$this->latitude = Guest::getLatitude($session->payload);
		$this->longitude = Guest::getLongitude($session->payload);
		$this->lastActivity = Guest::getLastActivity($session->last_activity);
		$this->userId = $session->user_id;
	}

	/**
	 * had method tat takhod user agent o tat jbad mano operating system
	 *
	 * @param string
	 * @return string
	 */
	public static function getUserAgent($userAgent)
	{
		if(isset($userAgent))
		{
			return  $userAgent;
		}
		else
		{
			throw new Exception("UNKNOWN");
		}
	}

	/**
	 *had method tat takhod user agent o tat jbad mano operating system
	 *
	 * @param string
	 * @return string
	 */
	public static function getOs($user_agent)
	{
		$userAgent = self::getUserAgent($user_agent);
		$osPlatform    =   "Unknown OS Platform";
		$osArray       =   array(
			'/windows nt 10/i'     	=>  'Windows 10',
			'/windows nt 6.3/i'     =>  'Windows 8.1',
			'/windows nt 6.2/i'     =>  'Windows 8',
			'/windows nt 6.1/i'     =>  'Windows 7',
			'/windows nt 6.0/i'     =>  'Windows Vista',
			'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
			'/windows nt 5.1/i'     =>  'Windows XP',
			'/windows xp/i'         =>  'Windows XP',
			'/windows nt 5.0/i'     =>  'Windows 2000',
			'/windows me/i'         =>  'Windows ME',
			'/win98/i'              =>  'Windows 98',
			'/win95/i'              =>  'Windows 95',
			'/win16/i'              =>  'Windows 3.11',
			'/macintosh|mac os x/i' =>  'Mac OS X',
			'/mac_powerpc/i'        =>  'Mac OS 9',
			'/linux/i'              =>  'Linux',
			'/ubuntu/i'             =>  'Ubuntu',
			'/iphone/i'             =>  'iPhone',
			'/ipod/i'               =>  'iPod',
			'/ipad/i'               =>  'iPad',
			'/android/i'            =>  'Android',
			'/blackberry/i'         =>  'BlackBerry',
			'/webos/i'              =>  'Mobile'
		);

		foreach ($osArray as $regex => $value)
		{
			if (preg_match($regex, $userAgent))
			{
				$osPlatform    =   $value;
			}
		}   
		return $osPlatform;
	}


	/**
	 *had method tat takhod user agent o tat jbad mano Browser
	 *
	 * @param string
	 * @return string
	 */
	public static function  getBrowser($user_agent)
	{
		$userAgent= self::getUserAgent($user_agent);
		$browser        =   "Unknown Browser";
		$browserArray  =   array(
			'/msie/i'       =>  'Internet Explorer',
			'/Trident/i'    =>  'Internet Explorer',
			'/firefox/i'    =>  'Firefox',
			'/safari/i'     =>  'Safari',
			'/chrome/i'     =>  'Chrome',
			'/edge/i'       =>  'Edge',
			'/opera/i'      =>  'Opera',
			'/netscape/i'   =>  'Netscape',
			'/maxthon/i'    =>  'Maxthon',
			'/konqueror/i'  =>  'Konqueror',
			'/ubrowser/i'   =>  'UC Browser',
			'/mobile/i'     =>  'Handheld Browser'
		);
		foreach ($browserArray as $regex => $value) 
		{
			if (preg_match($regex, $userAgent))
			{
				$browser    =   $value;
			}
		}
		return $browser;
	}

	/**
	 *had method tat takhod user agent o tat jbad mano device
	 *
	 * @param string
	 * @return string
	 */

	public static function  getDevice($user_agent)
	{
		$userAgent= self::getUserAgent($user_agent);
		$tabletBrowser = 0;
		$mobileBrowser = 0;
		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($userAgent)))
		{
			$tabletBrowser++;
		}
		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($userAgent)))
		{
			$mobileBrowser++;
		}
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']))))
		{
			$mobileBrowser++;
		}
		$mobileUa = strtolower(substr($userAgent, 0, 4));
		$mobileAgents = array(
			'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
			'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
			'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
			'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
			'newt','noki','palm','pana','pant','phil','play','port','prox',
			'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
			'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
			'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
			'wapr','webc','winw','winw','xda ','xda-');
		if (in_array($mobileUa,$mobileAgents)) 
		{
			$mobileBrowser++;
		}
		if (strpos(strtolower($userAgent),'opera mini') > 0) 
		{
			$mobileBrowser++;
			$stockUa = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua))
			{
				$tabletBrowser++;
			}
		}
		if ($tabletBrowser > 0)
		{
			return 'Tablet';
		}
		else if ($mobileBrowser > 0)
		{
			return 'Mobile';
		}
		else 
		{
			return 'Computer';
		}   
	}

	/**
	 * Had method tat takhod payload o tat jbad mano Latitude
	 *
	 * @param string
	 * @return string
	 */

	public static function getLatitude($payload)
	{				
		$pay= unserialize(base64_decode($payload));
		$latitude = null;
		if(isset($pay['latitude'])) {$latitude = $pay['latitude'];}
		return $latitude;	   
	}
	
	/**
	 * Had method tat takhod payload o tat jbad mano Longitude
	 *
	 * @param string
	 * @return string
	 */
	public static function getLongitude($payload)
	{				
		$pay= unserialize(base64_decode($payload));
		$longitude = null;
		if(isset($pay['longitude'])) {$longitude = $pay['longitude'];}
		return $longitude;		   
	}

	/**
	 * Had method tat takhod last_activity  o tat convertiha lina  date 
	 *
	 * @param integer
	 * @return timestamps
	 */
	public static function getLastActivity($last_activity)
	{				
		$lastActivity=date("Y-m-d H:i:s", $last_activity);
		return $lastActivity;		   
	}

	/**
	 * Had method tat jib lina les users li bghina nbayno 
	 *
	 * @param integer
	 * @return string
	 */
	public static function some($users)
	{
		$sessions = DB::table('sessions')
		->where('user_id',$users)
		->get();
		return Guest::mapToGuest($sessions);
	}

	/**
	 * Had method tat jib lina ga3 les guests li kaynin
	 *
	 * 
	 * @return string
	 */
	public static function all()
	{
		$sessions = DB::table('sessions')
		->get();
		return Guest::mapToGuest($sessions);
	}

	/**
	 * Had method tat mapi lina object li tan 3tiwha 
	 *
	 * @param string
	 * @return string
	 */
	public static function mapToGuest($sessions)
	{
		$arrays=[];
		foreach($sessions as $guest)
        {
			$arrays[] = new Guest($guest);
		}
		return $arrays;
	}

	/**
	 * Had method tat takhod user o tat jbad lina les information dyalo
	 *
	 * @param string
	 * @return string
	 */
	public static function find($idSession)
	{
		$session = DB::table('sessions')
        ->where('id',$idSession)
		->first();
		return new Guest($session);
	}
}
	
