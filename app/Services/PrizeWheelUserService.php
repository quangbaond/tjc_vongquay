<?php

namespace App\Services;

use App\Repositories\PrizeWheelUserRepository;
use App\Services\BaseService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class PrizeWheelUserService extends BaseService
{
    protected PrizeWheelUserRepository $prizeWheelUserRepository;

    /**
     * @param PrizeWheelUserRepository $prizeWheelUserRepository
     */

    public function __construct(PrizeWheelUserRepository $prizeWheelUserRepository)
    {
        parent::__construct($prizeWheelUserRepository);
        $this->prizeWheelUserRepository = $prizeWheelUserRepository;
    }

    /**
     * @param $phone
     * @return int
     */
    public function checkUser($phone): int
    {
        return $this->prizeWheelUserRepository->count([
            'phone' => $phone
        ]);
    }

    /**
     * @param $user
     * @param $setting
     * @return string|bool
     * @throws GuzzleException
     */
    public function sendMessenger($user, $setting): string|bool
    {
        $facebook = str_replace('https://www.facebook.com/', '', $user->facebook);
        $message = 'Chúc mừng bạn đã trúng thưởng ' . $user->prize . ' từ chương trình quay số may mắn của ' .env('APP_NAME') . 'Vui lòng liên hệ với chúng tôi để nhận quà. Xin cảm ơn!';
        $client = new \GuzzleHttp\Client();
        $getFacebookId = Http::get('https://www.facebook.com/' . $facebook);
        $dom = new \DOMDocument();
        @$dom->loadHTML(mb_convert_encoding((string) $getFacebookId->body(), 'HTML-ENTITIES',  'UTF-8'));
        $xpath = new \DOMXPath($dom);
        $getFacebookId = $xpath->query('//meta[@property="al:android:url"]')->item(0)->getAttribute('content');
        $fbid = explode('fb://profile/', $getFacebookId)[1];
        $response = Http::post(env('APP_API_MESSAGE_URL') . '/messenger', [
            'fbid' => $fbid,
            'message' => $message,
        ]);
        $response = json_decode($response->body(), true);

        if ($response['status'] == 200) {
            return true;
        }
        return $fbid;
    }
}
