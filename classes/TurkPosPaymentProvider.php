<?php
/**
 * TurkPosPaymentProvider.php
 *
 * Main file of the module
 *
 * @author  Geliyoo <eticaret@geliyoo.com>
 * @version 1.0.0
 * @see     PaymentModuleCore
 */

require_once 'turkpos/wsdl/TurkPos_x0020_WS_x0020_PROD.php';
/**
 * Payment Provider Class
 */
class TurkPosPaymentProvider
{
    protected $turkPosSoapService;
    protected $username;
    protected $password;
    protected $clientCode;
    protected $guid;
    protected $wsdlUrl;
    protected $auth;
    protected $errors;

    public function __construct()
    {
        $this->wsdlUrl = self::getSoapServiceUrl();

        $this->clientCode = Configuration::get(TurkPosSettings::TURK_POS_CLIENT_CODE);
        $this->username = Configuration::get(TurkPosSettings::TURK_POS_CLIENT_USERNAME);
        $this->password = Configuration::get(TurkPosSettings::TURK_POS_CLIENT_PASSWORD);
        $this->guid = Configuration::get(TurkPosSettings::TURK_POS_CLIENT_GUID);

        $this->auth = new ST_WS_Guvenlik($this->clientCode, $this->username, $this->password);

        $this->turkPosSoapService = new TurkPos_x0020_WS_x0020_PROD(array(), $this->wsdlUrl);

        $this->initErrors();
    }

    /**
     * Get the payment URL
     *
     * @return string
     */
    public static function getSoapServiceUrl()
    {
        if (Configuration::get(TurkPosSettings::TURK_POS_IS_LIVE)) {
            return (Configuration::get(TurkPosSettings::TURK_POST_WSDL_URL_FOR_PROD));
        } else {
            return (Configuration::get(TurkPosSettings::TURK_POST_WSDL_URL_FOR_TEST));
        }
    }

    /**
     * @return BIN_SanalPosResponse
     */
    public function binListService()
    {
        $binSanalPos = new BIN_SanalPos($this->auth, null);
        return $this->turkPosSoapService->BIN_SanalPos($binSanalPos);
    }

    /**
     * @return TP_Ozel_Oran_SK_ListeResponse
     */
    public function skCommissionRates()
    {
        $skOzelOranListe = new TP_Ozel_Oran_SK_Liste($this->auth, $this->guid);
        return $this->turkPosSoapService->TP_Ozel_Oran_SK_Liste($skOzelOranListe);
    }

    /**
     * @param $str
     * @return SHA2B64Response
     */
    public function SHA2B64($str)
    {
        $lstr = $this->clientCode . $this->guid . $str;
        return $this->turkPosSoapService->SHA2B64(new SHA2B64($lstr));
    }

    /**
     * @param $params
     * @return TP_Islem_OdemeResponse
     */
    public function tpIslemOdeme($params)
    {

        $tp_islem = new TP_Islem_Odeme(
            $this->auth,
            $params['pos_id'],
            $this->guid,
            $params['cc_name'],
            $params['cc_number'],
            $params['cc_month'],
            $params['cc_year'],
            $params['cc_cvc'],
            $params['customer_gsm'],
            $params['error_url'],
            $params['success_url'],
            null,
            null,
            $params['installment'],
            $params['cart_amount'],
            $params['cart_amount_with_fee'],
            $params['process_hash'],
            null,
            $params['remote_ip'],
            null,
            null,
            null,
            null,
            null,
            null
        );

        return $this->turkPosSoapService->TP_Islem_Odeme($tp_islem);
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getErrorMessage($code)
    {
        return $this->errors[$code];
    }

    /**
     *
     */
    protected function initErrors()
    {
        $this->errors = array();
        $list = "1 Başarılı 
-1 Başarısız
-101 Güvenlik hatası.
-102 İşlem Hash geçersiz.
-103 GUID uzunluğu geçersiz.
-104 Siparis_ID en fazla 36 karakter olabilir.
-105 Kredi kartı CVV uzunluğu geçersiz. 3 hane olmalıdır.
-106 Kredi kartı yıl uzunluğu geçersiz.
-107 Kredi kartı son kullanma ay uzunluğu geçersiz.
-108 Müşteri GSM no geçersiz.
-109 SanalPOS_ID uzunluğu geçersiz.
-110 Taksit geçersiz.
-111 IP formatı geçersiz. Tutar formatı geçersiz. Nokta kullanmayınız. Kuruş formatında virgüllü gönderiniz.
-113 Tutar, 0 dan küçük veya eşit olmamalıdır.
-114 Test kullanıcısı ile işlem yapılamaz.
-115 Tutar formatı geçersiz. Virgülden sonra 2 basamak şeklinde olmalıdır.
-116 Başarılı URL veya Hata URL boş olamaz.
-200 Komisyon bilgisi bulunamadı.
-201 SanalPOS_ID ye ait taksit geçersiz.
-202 Toplam tutara eklenen komisyon hatalı.
-203 Kesilecek komisyon bilgisi hesaplanırken hata oluştu.
-204 SanalPOS Tipi hatalı.
-205 Ödeme bilgileri kayıt edilirken hata oluştu. İşlemi tekrarlayınız.
-206 Sanal POS İşlemi kaydedilemedi.
-207 Sistem Hatası
-208 SanalPOS Tipi veya Kart No bulunamadı.
-209 İşlem bilgisi bulunamadı.
-210 İptal/İadeye uygun işlem bulunamadı.
-211 İşlem iptal durumunda.
-212 İşlem iade durumunda.
-213 İade olabilecek işlem İptal edilmek isteniyor.
-214 İptal olabilecek işlem İade edilmek isteniyor.
-215 SanalPOS_ID ile Kredi Kartı BIN kodu uyumsuz. Kredi Kartı markasına göre yanlış SanalPOS_ID seçiliyor.";
        $lines = explode("\n", $list);
        foreach ($lines as $line) {
            $lexpode = preg_split('/ /', $line, 2);
            $this->errors[(int)(trim($lexpode[0]))] = trim($lexpode[1]);
        }
    }
}
