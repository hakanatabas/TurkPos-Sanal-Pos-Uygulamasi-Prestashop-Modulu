<?php

include_once('BIN_SanalPos.php');
include_once('ST_WS_Guvenlik.php');
include_once('BIN_SanalPosResponse.php');
include_once('ST_Genel_Sonuc.php');
include_once('DT_Bilgi.php');
include_once('TP_Ozel_Oran_Liste.php');
include_once('TP_Ozel_Oran_ListeResponse.php');
include_once('TP_Ozel_Oran_SK_Liste.php');
include_once('TP_Ozel_Oran_SK_ListeResponse.php');
include_once('TP_Ozel_Oran_SK_Guncelle.php');
include_once('TP_Ozel_Oran_SK_GuncelleResponse.php');
include_once('ST_Sonuc.php');
include_once('TP_Islem_Dekont_Gonder.php');
include_once('TP_Islem_Dekont_GonderResponse.php');
include_once('TP_Islem_Odeme.php');
include_once('TP_Islem_OdemeResponse.php');
include_once('ST_TP_Islem_Odeme.php');
include_once('TP_Islem_Odeme_WNS.php');
include_once('TP_Islem_Odeme_WNSResponse.php');
include_once('TP_Islem_Odeme_BKM.php');
include_once('TP_Islem_Odeme_BKMResponse.php');
include_once('ST_TP_Islem_Odeme_BKM.php');
include_once('TP_Islem_Odeme_WKS.php');
include_once('TP_Islem_Odeme_WKSResponse.php');
include_once('KK_Saklama.php');
include_once('KK_SaklamaResponse.php');
include_once('ST_KK_Saklama.php');
include_once('KK_Sakli_Liste.php');
include_once('KK_Sakli_ListeResponse.php');
include_once('TP_Islem_Sorgulama.php');
include_once('TP_Islem_SorgulamaResponse.php');
include_once('TP_Mutabakat_Ozet.php');
include_once('TP_Mutabakat_OzetResponse.php');
include_once('TP_Islem_Iptal_Iade.php');
include_once('TP_Islem_Iptal_IadeResponse.php');
include_once('TP_Islem_Izleme.php');
include_once('TP_Islem_IzlemeResponse.php');
include_once('TP_Islem_Iptal_Iade_Kismi.php');
include_once('TP_Islem_Iptal_Iade_KismiResponse.php');
include_once('SHA2B64.php');
include_once('SHA2B64Response.php');


/**
 * TURK Elektronik Para A.Ş.
 */
class TurkPos_x0020_WS_x0020_PROD extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     * @access private
     */
    private static $classmap = array(
        'BIN_SanalPos' => '\BIN_SanalPos',
        'ST_WS_Guvenlik' => '\ST_WS_Guvenlik',
        'BIN_SanalPosResponse' => '\BIN_SanalPosResponse',
        'ST_Genel_Sonuc' => '\ST_Genel_Sonuc',
        'DT_Bilgi' => '\DT_Bilgi',
        'TP_Ozel_Oran_Liste' => '\TP_Ozel_Oran_Liste',
        'TP_Ozel_Oran_ListeResponse' => '\TP_Ozel_Oran_ListeResponse',
        'TP_Ozel_Oran_SK_Liste' => '\TP_Ozel_Oran_SK_Liste',
        'TP_Ozel_Oran_SK_ListeResponse' => '\TP_Ozel_Oran_SK_ListeResponse',
        'TP_Ozel_Oran_SK_Guncelle' => '\TP_Ozel_Oran_SK_Guncelle',
        'TP_Ozel_Oran_SK_GuncelleResponse' => '\TP_Ozel_Oran_SK_GuncelleResponse',
        'ST_Sonuc' => '\ST_Sonuc',
        'TP_Islem_Dekont_Gonder' => '\TP_Islem_Dekont_Gonder',
        'TP_Islem_Dekont_GonderResponse' => '\TP_Islem_Dekont_GonderResponse',
        'TP_Islem_Odeme' => '\TP_Islem_Odeme',
        'TP_Islem_OdemeResponse' => '\TP_Islem_OdemeResponse',
        'ST_TP_Islem_Odeme' => '\ST_TP_Islem_Odeme',
        'TP_Islem_Odeme_WNS' => '\TP_Islem_Odeme_WNS',
        'TP_Islem_Odeme_WNSResponse' => '\TP_Islem_Odeme_WNSResponse',
        'TP_Islem_Odeme_BKM' => '\TP_Islem_Odeme_BKM',
        'TP_Islem_Odeme_BKMResponse' => '\TP_Islem_Odeme_BKMResponse',
        'ST_TP_Islem_Odeme_BKM' => '\ST_TP_Islem_Odeme_BKM',
        'TP_Islem_Odeme_WKS' => '\TP_Islem_Odeme_WKS',
        'TP_Islem_Odeme_WKSResponse' => '\TP_Islem_Odeme_WKSResponse',
        'KK_Saklama' => '\KK_Saklama',
        'KK_SaklamaResponse' => '\KK_SaklamaResponse',
        'ST_KK_Saklama' => '\ST_KK_Saklama',
        'KK_Sakli_Liste' => '\KK_Sakli_Liste',
        'KK_Sakli_ListeResponse' => '\KK_Sakli_ListeResponse',
        'TP_Islem_Sorgulama' => '\TP_Islem_Sorgulama',
        'TP_Islem_SorgulamaResponse' => '\TP_Islem_SorgulamaResponse',
        'TP_Mutabakat_Ozet' => '\TP_Mutabakat_Ozet',
        'TP_Mutabakat_OzetResponse' => '\TP_Mutabakat_OzetResponse',
        'TP_Islem_Iptal_Iade' => '\TP_Islem_Iptal_Iade',
        'TP_Islem_Iptal_IadeResponse' => '\TP_Islem_Iptal_IadeResponse',
        'TP_Islem_Izleme' => '\TP_Islem_Izleme',
        'TP_Islem_IzlemeResponse' => '\TP_Islem_IzlemeResponse',
        'TP_Islem_Iptal_Iade_Kismi' => '\TP_Islem_Iptal_Iade_Kismi',
        'TP_Islem_Iptal_Iade_KismiResponse' => '\TP_Islem_Iptal_Iade_KismiResponse',
        'SHA2B64' => '\SHA2B64',
        'SHA2B64Response' => '\SHA2B64Response'
    );

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     * @access public
     */
    public function __construct(
        array $options = array(),
        // PROD URL
        //$wsdl = 'https://dmzws.ew.com.tr/turkpos.ws/service_turkpos_prod.asmx?WSDL'
        // TEST URL
        $wsdl = 'http://dmzws.ew.com.tr/turkpos.ws/service_turkpos_test.asmx?WSDL'
    ) {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }

        parent::__construct($wsdl, $options);
    }

    /**
     * @param BIN_SanalPos $parameters
     * @access public
     * @return BIN_SanalPosResponse
     */
    public function BIN_SanalPos(BIN_SanalPos $parameters)
    {
        return $this->__soapCall('BIN_SanalPos', array($parameters));
    }

    /**
     * @param TP_Ozel_Oran_Liste $parameters
     * @access public
     * @return TP_Ozel_Oran_ListeResponse
     */
    public function TP_Ozel_Oran_Liste(TP_Ozel_Oran_Liste $parameters)
    {
        return $this->__soapCall('TP_Ozel_Oran_Liste', array($parameters));
    }

    /**
     * @param TP_Ozel_Oran_SK_Liste $parameters
     * @access public
     * @return TP_Ozel_Oran_SK_ListeResponse
     */
    public function TP_Ozel_Oran_SK_Liste(TP_Ozel_Oran_SK_Liste $parameters)
    {
        return $this->__soapCall('TP_Ozel_Oran_SK_Liste', array($parameters));
    }

    /**
     * @param TP_Ozel_Oran_SK_Guncelle $parameters
     * @access public
     * @return TP_Ozel_Oran_SK_GuncelleResponse
     */
    public function TP_Ozel_Oran_SK_Guncelle(TP_Ozel_Oran_SK_Guncelle $parameters)
    {
        return $this->__soapCall('TP_Ozel_Oran_SK_Guncelle', array($parameters));
    }

    /**
     * @param TP_Islem_Dekont_Gonder $parameters
     * @access public
     * @return TP_Islem_Dekont_GonderResponse
     */
    public function TP_Islem_Dekont_Gonder(TP_Islem_Dekont_Gonder $parameters)
    {
        return $this->__soapCall('TP_Islem_Dekont_Gonder', array($parameters));
    }

    /**
     * @param TP_Islem_Odeme $parameters
     * @access public
     * @return TP_Islem_OdemeResponse
     */
    public function TP_Islem_Odeme(TP_Islem_Odeme $parameters)
    {
        return $this->__soapCall('TP_Islem_Odeme', array($parameters));
    }

    /**
     * @param TP_Islem_Odeme_WNS $parameters
     * @access public
     * @return TP_Islem_Odeme_WNSResponse
     */
    public function TP_Islem_Odeme_WNS(TP_Islem_Odeme_WNS $parameters)
    {
        return $this->__soapCall('TP_Islem_Odeme_WNS', array($parameters));
    }

    /**
     * @param TP_Islem_Odeme_BKM $parameters
     * @access public
     * @return TP_Islem_Odeme_BKMResponse
     */
    public function TP_Islem_Odeme_BKM(TP_Islem_Odeme_BKM $parameters)
    {
        return $this->__soapCall('TP_Islem_Odeme_BKM', array($parameters));
    }

    /**
     * @param TP_Islem_Odeme_WKS $parameters
     * @access public
     * @return TP_Islem_Odeme_WKSResponse
     */
    public function TP_Islem_Odeme_WKS(TP_Islem_Odeme_WKS $parameters)
    {
        return $this->__soapCall('TP_Islem_Odeme_WKS', array($parameters));
    }

    /**
     * @param KK_Saklama $parameters
     * @access public
     * @return KK_SaklamaResponse
     */
    public function KK_Saklama(KK_Saklama $parameters)
    {
        return $this->__soapCall('KK_Saklama', array($parameters));
    }

    /**
     * @param KK_Sakli_Liste $parameters
     * @access public
     * @return KK_Sakli_ListeResponse
     */
    public function KK_Sakli_Liste(KK_Sakli_Liste $parameters)
    {
        return $this->__soapCall('KK_Sakli_Liste', array($parameters));
    }

    /**
     * @param TP_Islem_Sorgulama $parameters
     * @access public
     * @return TP_Islem_SorgulamaResponse
     */
    public function TP_Islem_Sorgulama(TP_Islem_Sorgulama $parameters)
    {
        return $this->__soapCall('TP_Islem_Sorgulama', array($parameters));
    }

    /**
     * @param TP_Mutabakat_Ozet $parameters
     * @access public
     * @return TP_Mutabakat_OzetResponse
     */
    public function TP_Mutabakat_Ozet(TP_Mutabakat_Ozet $parameters)
    {
        return $this->__soapCall('TP_Mutabakat_Ozet', array($parameters));
    }

    /**
     * @param TP_Islem_Iptal_Iade $parameters
     * @access public
     * @return TP_Islem_Iptal_IadeResponse
     */
    public function TP_Islem_Iptal_Iade(TP_Islem_Iptal_Iade $parameters)
    {
        return $this->__soapCall('TP_Islem_Iptal_Iade', array($parameters));
    }

    /**
     * @param TP_Islem_Izleme $parameters
     * @access public
     * @return TP_Islem_IzlemeResponse
     */
    public function TP_Islem_Izleme(TP_Islem_Izleme $parameters)
    {
        return $this->__soapCall('TP_Islem_Izleme', array($parameters));
    }

    /**
     * @param TP_Islem_Iptal_Iade_Kismi $parameters
     * @access public
     * @return TP_Islem_Iptal_Iade_KismiResponse
     */
    public function TP_Islem_Iptal_Iade_Kismi(TP_Islem_Iptal_Iade_Kismi $parameters)
    {
        return $this->__soapCall('TP_Islem_Iptal_Iade_Kismi', array($parameters));
    }

    /**
     * @param SHA2B64 $parameters
     * @access public
     * @return SHA2B64Response
     */
    public function SHA2B64(SHA2B64 $parameters)
    {
        return $this->__soapCall('SHA2B64', array($parameters));
    }

}
