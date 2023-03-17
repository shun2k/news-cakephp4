<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JcodesFixture
 */
class JcodesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public $connection = 'test';
    public function init(): void
    {
        $this->records = [
            [
                // 'id' => 1,
                'name' => 'pref_city',
                'json' => '[
                    {
                      "01": {
                        "id": "01",
                        "city": [
                          {
                            "id": "0101",
                            "name": "札幌市",
                            "coords": "119,163,156,183",
                            "en_city": "Sapporo"
                          },
                          {
                            "id": "0102",
                            "name": "函館市",
                            "coords": "240,371,277,392",
                            "en_city": "Hakodate"
                          },
                          {
                            "id": "0103",
                            "name": "旭川市",
                            "coords": "299,221,336,242",
                            "en_city": "Asahikawa"
                          },
                          {
                            "id": "0104",
                            "name": "室蘭市",
                            "coords": "239,330,276,351",
                            "en_city": "Muroran"
                          },
                          {
                            "id": "0105",
                            "name": "釧路市",
                            "coords": "389,284,426,305",
                            "en_city": "Kushiro"
                          },
                          {
                            "id": "0106",
                            "name": "網走市",
                            "coords": "368,97,406,118",
                            "en_city": "Abashiri"
                          },
                          {
                            "id": "0107",
                            "name": "稚内市",
                            "coords": "290,20,327,41",
                            "en_city": "Wakkanai"
                          }
                        ],
                        "pref": "北海道",
                        "en_pref": "Hokkaido"
                      }
                    },
                    {
                      "02": {
                        "id": "02",
                        "city": [
                          {
                            "id": "0201",
                            "name": "青森市",
                            "coords": "327,218,364,239",
                            "en_city": "Aomori-shi"
                          },
                          {
                            "id": "0202",
                            "name": "弘前市",
                            "coords": "253,258,290,279",
                            "en_city": "Hirosaki"
                          },
                          {
                            "id": "0203",
                            "name": "八戸市",
                            "coords": "469,251,506,272",
                            "en_city": "Hachinohe"
                          },
                          {
                            "id": "0204",
                            "name": "むつ市",
                            "coords": "457,74,495,95",
                            "en_city": "Mutsu"
                          },
                          {
                            "id": "0205",
                            "name": "深浦町",
                            "coords": "138,344,175,365",
                            "en_city": "Fukaura"
                          }
                        ],
                        "pref": "青森県",
                        "en_pref": "Aomori-ken"
                      }
                    },
                    {
                      "03": {
                        "id": "03",
                        "city": [
                          {
                            "id": "0301",
                            "name": "盛岡市",
                            "coords": "311,128,348,150",
                            "en_city": "Morioka"
                          },
                          {
                            "id": "0302",
                            "name": "宮古市",
                            "coords": "435,181,473,202",
                            "en_city": "Miyako"
                          },
                          {
                            "id": "0303",
                            "name": "大船渡市",
                            "coords": "414,310,469,332",
                            "en_city": "Ofunato"
                          },
                          {
                            "id": "0304",
                            "name": "久慈市",
                            "coords": "417,58,454,79",
                            "en_city": "Kuji"
                          },
                          {
                            "id": "0305",
                            "name": "一関市",
                            "coords": "343,360,380,381",
                            "en_city": "Ichinoseki"
                          }
                        ],
                        "pref": "岩手県",
                        "en_pref": "Iwate"
                      }
                    },
                    {
                      "04": {
                        "id": "04",
                        "city": [
                          {
                            "id": "0401",
                            "name": "仙台市",
                            "coords": "323,281,361,304",
                            "en_city": "Sendai"
                          },
                          {
                            "id": "0402",
                            "name": "石巻市",
                            "coords": "465,161,502,182",
                            "en_city": "Ishinomaki"
                          },
                          {
                            "id": "0403",
                            "name": "白石市",
                            "coords": "70,327,107,349",
                            "en_city": "Shiroishi"
                          },
                          {
                            "id": "0404",
                            "name": "大崎市",
                            "coords": "131,103,168,125",
                            "en_city": "Osaki"
                          }
                        ],
                        "pref": "宮城県",
                        "en_pref": "Miyagi-ken"
                      }
                    },
                    {
                      "05": {
                        "id": "05",
                        "city": [
                          {
                            "id": "0501",
                            "name": "秋田市",
                            "coords": "295,193,332,214",
                            "en_city": "Akita"
                          },
                          {
                            "id": "0502",
                            "name": "能代市",
                            "coords": "287,88,324,109",
                            "en_city": "Noshiro"
                          },
                          {
                            "id": "0503",
                            "name": "横手市",
                            "coords": "407,289,444,312",
                            "en_city": "Yokote"
                          },
                          {
                            "id": "0504",
                            "name": "大館市",
                            "coords": "404,47,441,67",
                            "en_city": "Odate"
                          },
                          {
                            "id": "0505",
                            "name": "由利本荘市",
                            "coords": "289,266,362,287",
                            "en_city": "Yurihonjo"
                          }
                        ],
                        "pref": "秋田県",
                        "en_pref": "Akita-ken"
                      }
                    },
                    {
                      "06": {
                        "id": "06",
                        "city": [
                          {
                            "id": "0601",
                            "name": "山形市",
                            "coords": "413,239,450,260",
                            "en_city": "Yamagata-shi"
                          },
                          {
                            "id": "0602",
                            "name": "米沢市",
                            "coords": "388,359,425,380",
                            "en_city": "Yonezawa"
                          },
                          {
                            "id": "0603",
                            "name": "鶴岡市",
                            "coords": "106,141,143,163",
                            "en_city": "Tsuruoka"
                          },
                          {
                            "id": "0604",
                            "name": "酒田市",
                            "coords": "155,58,192,79",
                            "en_city": "Sakata"
                          },
                          {
                            "id": "0605",
                            "name": "新庄市",
                            "coords": "433,75,470,96",
                            "en_city": "Shinjo"
                          }
                        ],
                        "pref": "山形県",
                        "en_pref": "Yamagata-ken"
                      }
                    },
                    {
                      "07": {
                        "id": "07",
                        "city": [
                          {
                            "id": "0701",
                            "name": "福島市",
                            "coords": "412,25,449,47",
                            "en_city": "Fukushima-shi"
                          },
                          {
                            "id": "0702",
                            "name": "郡山市",
                            "coords": "381,195,418,216",
                            "en_city": "Koriyama"
                          },
                          {
                            "id": "0703",
                            "name": "いわき市",
                            "coords": "426,350,481,370",
                            "en_city": "Iwaki"
                          },
                          {
                            "id": "0704",
                            "name": "喜多方市",
                            "coords": "149,52,204,74",
                            "en_city": "Kitakata"
                          },
                          {
                            "id": "0705",
                            "name": "只見町",
                            "coords": "57,214,93,235",
                            "en_city": "Tadami"
                          }
                        ],
                        "pref": "福島県",
                        "en_pref": "Fukushima-ken"
                      }
                    },
                    {
                      "08": {
                        "id": "08",
                        "city": [
                          {
                            "id": "0801",
                            "name": "水戸市",
                            "coords": "404,189,441,210",
                            "en_city": "Mito"
                          },
                          {
                            "id": "0802",
                            "name": "日立市",
                            "coords": "445,91,482,112",
                            "en_city": "Hitachi, JP"
                          },
                          {
                            "id": "0803",
                            "name": "土浦市",
                            "coords": "177,342,214,363",
                            "en_city": "Tsuchiura"
                          },
                          {
                            "id": "0804",
                            "name": "鹿嶋市",
                            "coords": "419,276,456,297",
                            "en_city": "Kashima-shi"
                          },
                          {
                            "id": "0805",
                            "name": "筑西市",
                            "coords": "148,147,185,168",
                            "en_city": "Chikusei"
                          }
                        ],
                        "pref": "茨城県",
                        "en_pref": "Ibaraki"
                      }
                    },
                    {
                      "09": {
                        "id": "09",
                        "city": [
                          {
                            "id": "0901",
                            "name": "宇都宮市",
                            "coords": "469,240,524,262",
                            "en_city": "Utsunomiya"
                          },
                          {
                            "id": "0902",
                            "name": "栃木市",
                            "coords": "102,312,139,332",
                            "en_city": "Tochigi"
                          },
                          {
                            "id": "0903",
                            "name": "日光市",
                            "coords": "119,59,155,80",
                            "en_city": "Nikko"
                          },
                          {
                            "id": "0904",
                            "name": "那須塩原市",
                            "coords": "463,80,536,101",
                            "en_city": "Nasushiobara"
                          },
                          {
                            "id": "0905",
                            "name": "益子町",
                            "coords": "444,342,481,363",
                            "en_city": "Mashiko"
                          }
                        ],
                        "pref": "栃木県",
                        "en_pref": "Tochigi-ken"
                      }
                    },
                    {
                      "10": {
                        "id": "10",
                        "city": [
                          {
                            "id": "1001",
                            "name": "前橋市",
                            "coords": "310,323,347,344",
                            "en_city": "Maebashi"
                          },
                          {
                            "id": "1002",
                            "name": "桐生市",
                            "coords": "436,211,473,232",
                            "en_city": "Kiryu"
                          },
                          {
                            "id": "1003",
                            "name": "沼田市",
                            "coords": "414,133,451,154",
                            "en_city": "Numata"
                          },
                          {
                            "id": "1004",
                            "name": "下仁田町",
                            "coords": "88,288,144,309",
                            "en_city": "Shimonita"
                          },
                          {
                            "id": "1005",
                            "name": "長野原町",
                            "coords": "159,86,213,107",
                            "en_city": "Naganohara"
                          }
                        ],
                        "pref": "群馬県",
                        "en_pref": "Gunma-ken"
                      }
                    },
                    {
                      "11": {
                        "id": "11",
                        "city": [
                          {
                            "id": "1101",
                            "name": "さいたま市",
                            "coords": "467,304,540,325",
                            "en_city": "Saitama"
                          },
                          {
                            "id": "1102",
                            "name": "熊谷市",
                            "coords": "361,73,398,95",
                            "en_city": "Kumagaya"
                          },
                          {
                            "id": "1103",
                            "name": "秩父市",
                            "coords": "149,284,187,305",
                            "en_city": "Chichibu"
                          },
                          {
                            "id": "1104",
                            "name": "所沢市",
                            "coords": "326,319,363,340",
                            "en_city": "Tokorozawa"
                          },
                          {
                            "id": "1105",
                            "name": "春日部市",
                            "coords": "495,198,550,220",
                            "en_city": "Kasukabe"
                          }
                        ],
                        "pref": "埼玉県",
                        "en_pref": "Saitama-ken"
                      }
                    },
                    {
                      "12": {
                        "id": "12",
                        "city": [
                          {
                            "id": "1201",
                            "name": "千葉市",
                            "coords": "130,164,167,185",
                            "en_city": "Chiba-shi"
                          },
                          {
                            "id": "1202",
                            "name": "銚子市",
                            "coords": "415,75,452,96",
                            "en_city": "Hasaki"
                          },
                          {
                            "id": "1203",
                            "name": "館山市",
                            "coords": "113,313,150,334",
                            "en_city": "Tateyama"
                          },
                          {
                            "id": "1204",
                            "name": "木更津市",
                            "coords": "113,229,168,250",
                            "en_city": "Kisarazu"
                          },
                          {
                            "id": "1205",
                            "name": "成田市",
                            "coords": "297,28,334,49",
                            "en_city": "Narita"
                          },
                          {
                            "id": "1206",
                            "name": "九十九里町",
                            "coords": "378,182,452,203",
                            "en_city": "Kujukuri"
                          }
                        ],
                        "pref": "千葉県",
                        "en_pref": "Chiba-ken"
                      }
                    },
                    {
                      "13": {
                        "id": "13",
                        "city": [
                          {
                            "id": "1301",
                            "name": "千代田区",
                            "coords": "516,210,571,231",
                            "en_city": "Chiyoda-ku"
                          },
                          {
                            "id": "1302",
                            "name": "品川区",
                            "coords": "462,267,498,288",
                            "en_city": "Shinagawa-ku"
                          },
                          {
                            "id": "1303",
                            "name": "練馬区",
                            "coords": "406,76,444,97",
                            "en_city": "Nerima"
                          },
                          {
                            "id": "1304",
                            "name": "八王子市",
                            "coords": "275,233,330,254",
                            "en_city": "Hachioji"
                          },
                          {
                            "id": "1305",
                            "name": "青梅市",
                            "coords": "272,48,308,70",
                            "en_city": "Ome,JP"
                          },
                          {
                            "id": "1306",
                            "name": "町田市",
                            "coords": "395,262,432,283",
                            "en_city": "Machida"
                          },
                          {
                            "id": "1307",
                            "name": "大島町",
                            "coords": "123,187,178,208",
                            "en_city": "Okata"
                          },
                          {
                            "id": "1308",
                            "name": "三宅村",
                            "coords": "140,235,195,255",
                            "en_city": "Tsubota"
                          },
                          {
                            "id": "1309",
                            "name": "八丈町",
                            "coords": "329,303,384,324",
                            "en_city": "Okago"
                          }
                        ],
                        "pref": "東京都",
                        "en_pref": "Tokyo"
                      }
                    },
                    {
                      "14": {
                        "id": "14",
                        "city": [
                          {
                            "id": "1401",
                            "name": "横浜市",
                            "coords": "476,172,514,194",
                            "en_city": "Yokohama"
                          },
                          {
                            "id": "1402",
                            "name": "相模原市",
                            "coords": "362,34,417,56",
                            "en_city": "Sagamihara"
                          },
                          {
                            "id": "1403",
                            "name": "平塚市",
                            "coords": "275,268,312,289",
                            "en_city": "Hiratsuka"
                          },
                          {
                            "id": "1404",
                            "name": "鎌倉市",
                            "coords": "459,227,496,248",
                            "en_city": "Kamakura"
                          },
                          {
                            "id": "1405",
                            "name": "三浦市",
                            "coords": "459,317,497,337",
                            "en_city": "Miura"
                          },
                          {
                            "id": "1406",
                            "name": "厚木市",
                            "coords": "126,90,163,111",
                            "en_city": "Atsugi, JP"
                          },
                          {
                            "id": "1407",
                            "name": "箱根町",
                            "coords": "70,280,107,302",
                            "en_city": "Hakone"
                          }
                        ],
                        "pref": "神奈川県",
                        "en_pref": "Kanagawa"
                      }
                    },
                    {
                      "15": {
                        "id": "15",
                        "city": [
                          {
                            "id": "1501",
                            "name": "新潟市",
                            "coords": "316,88,353,110",
                            "en_city": "Niigata-shi"
                          },
                          {
                            "id": "1502",
                            "name": "柏崎市",
                            "coords": "198,217,235,237",
                            "en_city": "Kashiwazaki"
                          },
                          {
                            "id": "1503",
                            "name": "村上市",
                            "coords": "500,41,537,62",
                            "en_city": "Murakami"
                          },
                          {
                            "id": "1504",
                            "name": "糸魚川市",
                            "coords": "48,270,103,291",
                            "en_city": "Itoigawa"
                          },
                          {
                            "id": "1505",
                            "name": "佐渡市",
                            "coords": "155,102,192,123",
                            "en_city": "Ryotsu-minato"
                          },
                          {
                            "id": "1506",
                            "name": "南魚沼市",
                            "coords": "399,320,455,342",
                            "en_city": "Muikamachi"
                          }
                        ],
                        "pref": "新潟県",
                        "en_pref": "Niigata-ken"
                      }
                    },
                    {
                      "16": {
                        "id": "16",
                        "city": [
                          {
                            "id": "1601",
                            "name": "富山市",
                            "coords": "267,99,304,121",
                            "en_city": "Toyama"
                          },
                          {
                            "id": "1602",
                            "name": "魚津市",
                            "coords": "490,119,527,141",
                            "en_city": "Uozu"
                          },
                          {
                            "id": "1603",
                            "name": "氷見市",
                            "coords": "89,81,126,102",
                            "en_city": "Himimachi"
                          },
                          {
                            "id": "1604",
                            "name": "砺波市",
                            "coords": "70,183,107,204",
                            "en_city": "Tonami"
                          }
                        ],
                        "pref": "富山県",
                        "en_pref": "Toyama-ken"
                      }
                    },
                    {
                      "17": {
                        "id": "17",
                        "city": [
                          {
                            "id": "1701",
                            "name": "金沢市",
                            "coords": "335,262,372,283",
                            "en_city": "Kanazawa"
                          },
                          {
                            "id": "1702",
                            "name": "七尾市",
                            "coords": "394,129,431,151",
                            "en_city": "Nanao"
                          },
                          {
                            "id": "1703",
                            "name": "輪島市",
                            "coords": "235,43,272,65",
                            "en_city": "Wajima"
                          },
                          {
                            "id": "1704",
                            "name": "加賀市",
                            "coords": "123,322,160,344",
                            "en_city": "Kaga"
                          },
                          {
                            "id": "1705",
                            "name": "羽咋市",
                            "coords": "219,164,256,185",
                            "en_city": "Hakui"
                          }
                        ],
                        "pref": "石川県",
                        "en_pref": "Ishikawa-ken"
                      }
                    },
                    {
                      "18": {
                        "id": "18",
                        "city": [
                          {
                            "id": "1801",
                            "name": "福井市",
                            "coords": "191,112,228,133",
                            "en_city": "Fukui-shi"
                          },
                          {
                            "id": "1802",
                            "name": "敦賀市",
                            "coords": "332,255,370,276",
                            "en_city": "Tsuruga"
                          },
                          {
                            "id": "1803",
                            "name": "小浜市",
                            "coords": "167,245,204,266",
                            "en_city": "Obama"
                          },
                          {
                            "id": "1804",
                            "name": "勝山市",
                            "coords": "451,59,488,80",
                            "en_city": "Katsuyama"
                          },
                          {
                            "id": "1805",
                            "name": "越前市",
                            "coords": "192,171,229,192",
                            "en_city": "Echizen"
                          }
                        ],
                        "pref": "福井県",
                        "en_pref": "Fukui-ken"
                      }
                    },
                    {
                      "19": {
                        "id": "19",
                        "city": [
                          {
                            "id": "1901",
                            "name": "甲府市",
                            "coords": "263,175,300,196",
                            "en_city": "Kofu"
                          },
                          {
                            "id": "1902",
                            "name": "山梨市",
                            "coords": "381,29,418,50",
                            "en_city": "Yamanashi"
                          },
                          {
                            "id": "1903",
                            "name": "大月市",
                            "coords": "450,101,487,122",
                            "en_city": "Otsuki"
                          },
                          {
                            "id": "1904",
                            "name": "韮崎市",
                            "coords": "68,119,105,141",
                            "en_city": "Nirasaki"
                          },
                          {
                            "id": "1905",
                            "name": "早川町",
                            "coords": "69,267,106,288",
                            "en_city": "Hayakawa"
                          },
                          {
                            "id": "1906",
                            "name": "山中湖村",
                            "coords": "419,266,474,287",
                            "en_city": "Yamanakako"
                          }
                        ],
                        "pref": "山梨県",
                        "en_pref": "Yamanashi-ken"
                      }
                    },
                    {
                      "20": {
                        "id": "20",
                        "city": [
                          {
                            "id": "2001",
                            "name": "長野市",
                            "coords": "186,73,223,94",
                            "en_city": "Nagano-shi"
                          },
                          {
                            "id": "2002",
                            "name": "松本市",
                            "coords": "163,163,200,184",
                            "en_city": "Matsumoto"
                          },
                          {
                            "id": "2003",
                            "name": "飯田市",
                            "coords": "376,330,413,351",
                            "en_city": "Iida"
                          },
                          {
                            "id": "2004",
                            "name": "伊那市",
                            "coords": "374,260,411,281",
                            "en_city": "Ina"
                          },
                          {
                            "id": "2005",
                            "name": "軽井沢町",
                            "coords": "437,148,492,170",
                            "en_city": "Karuizawa"
                          }
                        ],
                        "pref": "長野県",
                        "en_pref": "Nagano-ken"
                      }
                    },
                    {
                      "21": {
                        "id": "21",
                        "city": [
                          {
                            "id": "2101",
                            "name": "岐阜市",
                            "coords": "282,354,319,375",
                            "en_city": "Gifu-shi"
                          },
                          {
                            "id": "2102",
                            "name": "大垣市",
                            "coords": "111,317,148,338",
                            "en_city": "Ogaki"
                          },
                          {
                            "id": "2103",
                            "name": "高山市",
                            "coords": "466,89,503,111",
                            "en_city": "Takayama"
                          },
                          {
                            "id": "2104",
                            "name": "中津川市",
                            "coords": "466,261,521,283",
                            "en_city": "Nakatsugawa"
                          },
                          {
                            "id": "2105",
                            "name": "郡上市",
                            "coords": "208,144,245,166",
                            "en_city": "Gujo"
                          }
                        ],
                        "pref": "岐阜県",
                        "en_pref": "Gifu-ken"
                      }
                    },
                    {
                      "22": {
                        "id": "22",
                        "city": [
                          {
                            "id": "2201",
                            "name": "静岡市",
                            "coords": "306,268,343,290",
                            "en_city": "Shizuoka-shi"
                          },
                          {
                            "id": "2202",
                            "name": "浜松市",
                            "coords": "147,347,184,369",
                            "en_city": "Hamamatsu"
                          },
                          {
                            "id": "2203",
                            "name": "熱海市",
                            "coords": "503,194,541,215",
                            "en_city": "Atami"
                          },
                          {
                            "id": "2204",
                            "name": "富士宮市",
                            "coords": "340,58,395,80",
                            "en_city": "Fujinomiya"
                          },
                          {
                            "id": "2205",
                            "name": "御殿場市",
                            "coords": "485,146,540,168",
                            "en_city": "Gotenba"
                          },
                          {
                            "id": "2206",
                            "name": "下田市",
                            "coords": "479,304,516,326",
                            "en_city": "Shimoda"
                          }
                        ],
                        "pref": "静岡県",
                        "en_pref": "Shizuoka-ken"
                      }
                    },
                    {
                      "23": {
                        "id": "23",
                        "city": [
                          {
                            "id": "2301",
                            "name": "名古屋市",
                            "coords": "48,139,103,160",
                            "en_city": "Nagoya"
                          },
                          {
                            "id": "2302",
                            "name": "豊橋市",
                            "coords": "380,338,417,360",
                            "en_city": "Toyohashi"
                          },
                          {
                            "id": "2303",
                            "name": "一宮市",
                            "coords": "79,85,116,106",
                            "en_city": "Ichinomiya"
                          },
                          {
                            "id": "2304",
                            "name": "豊田市",
                            "coords": "293,47,330,69",
                            "en_city": "Toyota"
                          },
                          {
                            "id": "2305",
                            "name": "蒲郡市",
                            "coords": "432,249,469,271",
                            "en_city": "Gamagori"
                          },
                          {
                            "id": "2306",
                            "name": "常滑市",
                            "coords": "105,230,142,252",
                            "en_city": "Tokoname"
                          }
                        ],
                        "pref": "愛知県",
                        "en_pref": "Aichi-ken"
                      }
                    },
                    {
                      "24": {
                        "id": "24",
                        "city": [
                          {
                            "id": "2401",
                            "name": "津市",
                            "coords": "393,143,431,165",
                            "en_city": "Tsu"
                          },
                          {
                            "id": "2402",
                            "name": "四日市市",
                            "coords": "389,68,444,89",
                            "en_city": "Yokkaichi"
                          },
                          {
                            "id": "2403",
                            "name": "伊勢市",
                            "coords": "448,194,485,215",
                            "en_city": "Ise"
                          },
                          {
                            "id": "2404",
                            "name": "尾鷲市",
                            "coords": "322,308,359,329",
                            "en_city": "Owase"
                          },
                          {
                            "id": "2405",
                            "name": "伊賀市",
                            "coords": "167,126,205,148",
                            "en_city": "Iga-shi"
                          }
                        ],
                        "pref": "三重県",
                        "en_pref": "Mie-ken"
                      }
                    },
                    {
                      "25": {
                        "id": "25",
                        "city": [
                          {
                            "id": "2501",
                            "name": "大津市",
                            "coords": "128,237,165,258",
                            "en_city": "Otsu"
                          },
                          {
                            "id": "2502",
                            "name": "彦根市",
                            "coords": "429,191,466,213",
                            "en_city": "Hikone"
                          },
                          {
                            "id": "2503",
                            "name": "長浜市",
                            "coords": "427,85,464,106",
                            "en_city": "Nagahama"
                          },
                          {
                            "id": "2504",
                            "name": "甲賀市",
                            "coords": "429,315,466,336",
                            "en_city": "Minakuchicho-matoba"
                          },
                          {
                            "id": "2505",
                            "name": "高島市",
                            "coords": "128,142,165,164",
                            "en_city": "Takashima"
                          }
                        ],
                        "pref": "滋賀県",
                        "en_pref": "Shiga-ken"
                      }
                    },
                    {
                      "26": {
                        "id": "26",
                        "city": [
                          {
                            "id": "2601",
                            "name": "京都市",
                            "coords": "448,221,485,243",
                            "en_city": "Kyoto, JP"
                          },
                          {
                            "id": "2602",
                            "name": "福知山市",
                            "coords": "173,229,228,251",
                            "en_city": "Fukuchiyama"
                          },
                          {
                            "id": "2603",
                            "name": "舞鶴市",
                            "coords": "359,123,396,145",
                            "en_city": "Maizuru"
                          },
                          {
                            "id": "2604",
                            "name": "宇治市",
                            "coords": "448,308,485,330",
                            "en_city": "Uji"
                          },
                          {
                            "id": "2605",
                            "name": "亀岡市",
                            "coords": "220,270,257,291",
                            "en_city": "Kameoka"
                          },
                          {
                            "id": "2606",
                            "name": "京丹後市",
                            "coords": "60,47,115,69",
                            "en_city": "Kyotango"
                          }
                        ],
                        "pref": "京都府",
                        "en_pref": "KyotoXPrefecture,JP"
                      }
                    },
                    {
                      "27": {
                        "id": "27",
                        "city": [
                          {
                            "id": "2701",
                            "name": "大阪市",
                            "coords": "242,137,280,158",
                            "en_city": "Osaka-shi"
                          },
                          {
                            "id": "2702",
                            "name": "堺市",
                            "coords": "237,242,270,263",
                            "en_city": "Sakai, JP"
                          },
                          {
                            "id": "2703",
                            "name": "岸和田市",
                            "coords": "142,292,198,313",
                            "en_city": "Kishiwada"
                          },
                          {
                            "id": "2704",
                            "name": "高槻市",
                            "coords": "434,93,472,114",
                            "en_city": "Takatsuki"
                          },
                          {
                            "id": "2705",
                            "name": "富田林市",
                            "coords": "434,273,489,295",
                            "en_city": "Tondabayashicho"
                          },
                          {
                            "id": "2706",
                            "name": "東大阪市",
                            "coords": "436,188,491,209",
                            "en_city": "Higashi-osaka"
                          }
                        ],
                        "pref": "大阪府",
                        "en_pref": "Osaka-fu"
                      }
                    },
                    {
                      "28": {
                        "id": "28",
                        "city": [
                          {
                            "id": "2801",
                            "name": "神戸市",
                            "coords": "416,293,453,315",
                            "en_city": "Kobe"
                          },
                          {
                            "id": "2802",
                            "name": "姫路市",
                            "coords": "179,285,216,307",
                            "en_city": "Himeji"
                          },
                          {
                            "id": "2803",
                            "name": "西宮市",
                            "coords": "460,240,497,262",
                            "en_city": "Nishinomiya-hama"
                          },
                          {
                            "id": "2804",
                            "name": "洲本市",
                            "coords": "356,333,393,355",
                            "en_city": "Sumoto"
                          },
                          {
                            "id": "2805",
                            "name": "豊岡市",
                            "coords": "377,35,414,57",
                            "en_city": "Toyooka"
                          },
                          {
                            "id": "2806",
                            "name": "朝来市",
                            "coords": "377,96,414,118",
                            "en_city": "Asago"
                          }
                        ],
                        "pref": "兵庫県",
                        "en_pref": "Hyogo"
                      }
                    },
                    {
                      "29": {
                        "id": "29",
                        "city": [
                          {
                            "id": "2901",
                            "name": "奈良市",
                            "coords": "409,46,446,67",
                            "en_city": "Nara-shi"
                          },
                          {
                            "id": "2902",
                            "name": "大和高田市",
                            "coords": "100,110,173,131",
                            "en_city": "Yamatotakada"
                          },
                          {
                            "id": "2903",
                            "name": "五條市",
                            "coords": "137,206,175,227",
                            "en_city": "Gojo"
                          },
                          {
                            "id": "2904",
                            "name": "天川村",
                            "coords": "409,234,446,255",
                            "en_city": "Tenkawa"
                          },
                          {
                            "id": "2905",
                            "name": "東吉野村",
                            "coords": "408,158,464,179",
                            "en_city": "Higashiyoshino"
                          }
                        ],
                        "pref": "奈良県",
                        "en_pref": "Nara-ken"
                      }
                    },
                    {
                      "30": {
                        "id": "30",
                        "city": [
                          {
                            "id": "3001",
                            "name": "和歌山市",
                            "coords": "80,67,135,88",
                            "en_city": "Wakayama-shi"
                          },
                          {
                            "id": "3002",
                            "name": "橋本市",
                            "coords": "388,27,425,49",
                            "en_city": "Hashimoto"
                          },
                          {
                            "id": "3003",
                            "name": "田辺市",
                            "coords": "124,235,161,256",
                            "en_city": "Tanabe"
                          },
                          {
                            "id": "3004",
                            "name": "新宮市",
                            "coords": "470,215,507,236",
                            "en_city": "Shingu"
                          },
                          {
                            "id": "3005",
                            "name": "高野町",
                            "coords": "371,120,408,141",
                            "en_city": "Koya"
                          },
                          {
                            "id": "3006",
                            "name": "串本町",
                            "coords": "242,354,279,375",
                            "en_city": "Kushimoto"
                          }
                        ],
                        "pref": "和歌山県",
                        "en_pref": "Wakayama-ken"
                      }
                    },
                    {
                      "31": {
                        "id": "31",
                        "city": [
                          {
                            "id": "3101",
                            "name": "鳥取市",
                            "coords": "381,80,418,102",
                            "en_city": "Tottori-shi"
                          },
                          {
                            "id": "3102",
                            "name": "米子市",
                            "coords": "149,91,186,111",
                            "en_city": "Yonago"
                          },
                          {
                            "id": "3103",
                            "name": "倉吉市",
                            "coords": "252,274,289,295",
                            "en_city": "Kurayoshi"
                          },
                          {
                            "id": "3104",
                            "name": "智頭町",
                            "coords": "404,273,442,295",
                            "en_city": "Chizu"
                          }
                        ],
                        "pref": "鳥取県",
                        "en_pref": "Tottori-ken"
                      }
                    },
                    {
                      "32": {
                        "id": "32",
                        "city": [
                          {
                            "id": "3201",
                            "name": "松江市",
                            "coords": "360,111,397,132",
                            "en_city": "Matsue"
                          },
                          {
                            "id": "3202",
                            "name": "浜田市",
                            "coords": "141,240,179,261",
                            "en_city": "Hamada"
                          },
                          {
                            "id": "3203",
                            "name": "大田市",
                            "coords": "261,171,298,192",
                            "en_city": "Odacho-oda"
                          },
                          {
                            "id": "3204",
                            "name": "奥出雲町",
                            "coords": "352,288,406,310",
                            "en_city": "Okuizumo"
                          },
                          {
                            "id": "3205",
                            "name": "津和野町",
                            "coords": "77,344,132,365",
                            "en_city": "Tsuwano"
                          },
                          {
                            "id": "3206",
                            "name": "隠岐の島町",
                            "coords": "271,17,344,38",
                            "en_city": "Imazu"
                          }
                        ],
                        "pref": "島根県",
                        "en_pref": "Shimane-ken"
                      }
                    },
                    {
                      "33": {
                        "id": "33",
                        "city": [
                          {
                            "id": "3301",
                            "name": "岡山市",
                            "coords": "402,345,439,366",
                            "en_city": "Okayama-shi"
                          },
                          {
                            "id": "3302",
                            "name": "倉敷市",
                            "coords": "102,314,139,336",
                            "en_city": "Kurashiki"
                          },
                          {
                            "id": "3303",
                            "name": "津山市",
                            "coords": "413,27,450,48",
                            "en_city": "Tsuyama"
                          },
                          {
                            "id": "3304",
                            "name": "新見市",
                            "coords": "80,69,117,90",
                            "en_city": "Niimi"
                          },
                          {
                            "id": "3305",
                            "name": "備前市",
                            "coords": "472,245,509,266",
                            "en_city": "Bizen"
                          }
                        ],
                        "pref": "岡山県",
                        "en_pref": "Okayama-ken"
                      }
                    },
                    {
                      "34": {
                        "id": "34",
                        "city": [
                          {
                            "id": "3401",
                            "name": "広島市",
                            "coords": "114,333,151,354",
                            "en_city": "Hiroshima-shi"
                          },
                          {
                            "id": "3402",
                            "name": "呉市",
                            "coords": "316,354,348,377",
                            "en_city": "Kure"
                          },
                          {
                            "id": "3403",
                            "name": "福山市",
                            "coords": "441,302,478,324",
                            "en_city": "Fukuyama"
                          },
                          {
                            "id": "3404",
                            "name": "庄原市",
                            "coords": "215,62,252,84",
                            "en_city": "Shobara"
                          },
                          {
                            "id": "3405",
                            "name": "廿日市市",
                            "coords": "38,257,94,279",
                            "en_city": "Hatsukaichi"
                          }
                        ],
                        "pref": "広島県",
                        "en_pref": "Hiroshima-ken"
                      }
                    },
                    {
                      "35": {
                        "id": "35",
                        "city": [
                          {
                            "id": "3501",
                            "name": "下関市",
                            "coords": "116,308,155,330",
                            "en_city": "Shimonoseki"
                          },
                          {
                            "id": "3502",
                            "name": "宇部市",
                            "coords": "196,307,233,329",
                            "en_city": "Ube"
                          },
                          {
                            "id": "3503",
                            "name": "山口市",
                            "coords": "314,290,351,311",
                            "en_city": "Yamaguchi-shi"
                          },
                          {
                            "id": "3504",
                            "name": "萩市",
                            "coords": "168,84,205,106",
                            "en_city": "Hagi"
                          },
                          {
                            "id": "3505",
                            "name": "岩国市",
                            "coords": "464,233,502,255",
                            "en_city": "Iwakuni"
                          }
                        ],
                        "pref": "山口県",
                        "en_pref": "Yamaguchi-ken"
                      }
                    },
                    {
                      "36": {
                        "id": "36",
                        "city": [
                          {
                            "id": "3601",
                            "name": "徳島市",
                            "coords": "463,130,500,152",
                            "en_city": "Tokushima-shi"
                          },
                          {
                            "id": "3602",
                            "name": "鳴門市",
                            "coords": "462,80,499,102",
                            "en_city": "Narutocho-mitsuishi"
                          },
                          {
                            "id": "3603",
                            "name": "阿波市",
                            "coords": "303,39,341,61",
                            "en_city": "Anan"
                          },
                          {
                            "id": "3604",
                            "name": "美馬市",
                            "coords": "181,76,218,98",
                            "en_city": "Mima"
                          },
                          {
                            "id": "3605",
                            "name": "牟岐町",
                            "coords": "419,281,456,303",
                            "en_city": "Mugiura"
                          }
                        ],
                        "pref": "徳島県",
                        "en_pref": "Tokushima-ken"
                      }
                    },
                    {
                      "37": {
                        "id": "37",
                        "city": [
                          {
                            "id": "3701",
                            "name": "高松市",
                            "coords": "444,184,481,206",
                            "en_city": "Takamatsu-shi"
                          },
                          {
                            "id": "3702",
                            "name": "丸亀市",
                            "coords": "196,103,233,125",
                            "en_city": "Marugame"
                          },
                          {
                            "id": "3703",
                            "name": "観音寺市",
                            "coords": "45,306,100,327",
                            "en_city": "Kanonjicho"
                          },
                          {
                            "id": "3704",
                            "name": "土庄町",
                            "coords": "381,35,419,56",
                            "en_city": "Tonosho"
                          },
                          {
                            "id": "3705",
                            "name": "綾川町",
                            "coords": "267,338,304,360",
                            "en_city": "Ayagawa"
                          }
                        ],
                        "pref": "香川県",
                        "en_pref": "Kagawa-ken"
                      }
                    },
                    {
                      "38": {
                        "id": "38",
                        "city": [
                          {
                            "id": "3801",
                            "name": "松山市",
                            "coords": "195,113,232,135",
                            "en_city": "Matsuyama"
                          },
                          {
                            "id": "3802",
                            "name": "宇和島市",
                            "coords": "368,316,423,338",
                            "en_city": "Uwajima"
                          },
                          {
                            "id": "3803",
                            "name": "西条市",
                            "coords": "355,49,393,71",
                            "en_city": "Saijo"
                          },
                          {
                            "id": "3804",
                            "name": "四国中央市",
                            "coords": "424,35,497,57",
                            "en_city": "Kawanoecho"
                          },
                          {
                            "id": "3805",
                            "name": "西予市",
                            "coords": "367,256,405,278",
                            "en_city": "Seiyo"
                          },
                          {
                            "id": "3806",
                            "name": "内子町",
                            "coords": "367,201,404,223",
                            "en_city": "Uchiko"
                          }
                        ],
                        "pref": "愛媛県",
                        "en_pref": "Ehime-ken"
                      }
                    },
                    {
                      "39": {
                        "id": "39",
                        "city": [
                          {
                            "id": "3901",
                            "name": "高知市",
                            "coords": "302,182,340,204",
                            "en_city": "Kochi, JP"
                          },
                          {
                            "id": "3902",
                            "name": "室戸市",
                            "coords": "439,239,477,261",
                            "en_city": "Muroto-misakicho"
                          },
                          {
                            "id": "3903",
                            "name": "安芸市",
                            "coords": "391,181,428,203",
                            "en_city": "Aki"
                          },
                          {
                            "id": "3904",
                            "name": "四万十市",
                            "coords": "274,279,330,301",
                            "en_city": "Shimanto"
                          },
                          {
                            "id": "3905",
                            "name": "梼原町",
                            "coords": "116,172,153,194",
                            "en_city": "Yusuhara"
                          }
                        ],
                        "pref": "高知県",
                        "en_pref": "KochiXPrefecture"
                      }
                    },
                    {
                      "40": {
                        "id": "40",
                        "city": [
                          {
                            "id": "4001",
                            "name": "北九州市",
                            "coords": "459,41,515,63",
                            "en_city": "Kitakyushu"
                          },
                          {
                            "id": "4002",
                            "name": "福岡市",
                            "coords": "137,94,175,116",
                            "en_city": "Fukuoka-shi"
                          },
                          {
                            "id": "4003",
                            "name": "大牟田市",
                            "coords": "127,361,182,382",
                            "en_city": "Omuta"
                          },
                          {
                            "id": "4004",
                            "name": "久留米市",
                            "coords": "379,368,434,389",
                            "en_city": "Kurume"
                          },
                          {
                            "id": "4005",
                            "name": "飯塚市",
                            "coords": "411,249,449,270",
                            "en_city": "Iizuka"
                          },
                          {
                            "id": "4006",
                            "name": "行橋市",
                            "coords": "482,117,519,138",
                            "en_city": "Yukuhashi"
                          },
                          {
                            "id": "4007",
                            "name": "宗像市",
                            "coords": "174,54,211,76",
                            "en_city": "Munakata"
                          },
                          {
                            "id": "4008",
                            "name": "太宰府市",
                            "coords": "161,242,216,263",
                            "en_city": "Dazaifu"
                          }
                        ],
                        "pref": "福岡県",
                        "en_pref": "FukuokaXPrefecture"
                      }
                    },
                    {
                      "41": {
                        "id": "41",
                        "city": [
                          {
                            "id": "4101",
                            "name": "佐賀市",
                            "coords": "349,54,386,76",
                            "en_city": "Saga-shi"
                          },
                          {
                            "id": "4102",
                            "name": "唐津市",
                            "coords": "220,55,257,77",
                            "en_city": "Karatsu"
                          },
                          {
                            "id": "4103",
                            "name": "鳥栖市",
                            "coords": "452,223,489,245",
                            "en_city": "Tosu"
                          },
                          {
                            "id": "4104",
                            "name": "伊万里市",
                            "coords": "44,177,99,198",
                            "en_city": "Imaricho-ko"
                          },
                          {
                            "id": "4105",
                            "name": "嬉野市",
                            "coords": "142,305,179,327",
                            "en_city": "Ureshinomachi-shimojuku"
                          }
                        ],
                        "pref": "佐賀県",
                        "en_pref": "Saga-ken"
                      }
                    },
                    {
                      "42": {
                        "id": "42",
                        "city": [
                          {
                            "id": "4201",
                            "name": "長崎市",
                            "coords": "276,338,313,360",
                            "en_city": "Nagasaki-shi"
                          },
                          {
                            "id": "4202",
                            "name": "佐世保市",
                            "coords": "395,268,450,290",
                            "en_city": "Sasebo"
                          },
                          {
                            "id": "4203",
                            "name": "島原市",
                            "coords": "466,337,503,359",
                            "en_city": "Shimabara"
                          },
                          {
                            "id": "4204",
                            "name": "平戸市",
                            "coords": "234,206,271,227",
                            "en_city": "Hirado"
                          },
                          {
                            "id": "4205",
                            "name": "対馬市",
                            "coords": "331,25,368,47",
                            "en_city": "Mitsushimacho-ofunakoshi"
                          },
                          {
                            "id": "4206",
                            "name": "壱岐市",
                            "coords": "382,164,420,186",
                            "en_city": "Ishidacho-indojiura"
                          },
                          {
                            "id": "4207",
                            "name": "五島市",
                            "coords": "173,284,211,305",
                            "en_city": "Fukuecho"
                          }
                        ],
                        "pref": "長崎県",
                        "en_pref": "NagasakiXPrefecture"
                      }
                    },
                    {
                      "43": {
                        "id": "43",
                        "city": [
                          {
                            "id": "4301",
                            "name": "熊本市",
                            "coords": "212,141,249,163",
                            "en_city": "Kumamoto-shi"
                          },
                          {
                            "id": "4302",
                            "name": "八代市",
                            "coords": "438,250,475,272",
                            "en_city": "Honmachi"
                          },
                          {
                            "id": "4303",
                            "name": "人吉市",
                            "coords": "458,350,495,371",
                            "en_city": "Hitoyoshi"
                          },
                          {
                            "id": "4304",
                            "name": "阿蘇市",
                            "coords": "495,94,532,115",
                            "en_city": "Aso"
                          },
                          {
                            "id": "432156",
                            "name": "天草市",
                            "coords": "141,184,178,206",
                            "en_city": "Hondomachi-hondo"
                          }
                        ],
                        "pref": "熊本県",
                        "en_pref": "Kumamoto-ken"
                      }
                    },
                    {
                      "44": {
                        "id": "44",
                        "city": [
                          {
                            "id": "4401",
                            "name": "大分市",
                            "coords": "403,141,440,163",
                            "en_city": "Oita-shi"
                          },
                          {
                            "id": "4402",
                            "name": "中津市",
                            "coords": "127,52,164,74",
                            "en_city": "Nakatsu"
                          },
                          {
                            "id": "4403",
                            "name": "日田市",
                            "coords": "132,299,169,321",
                            "en_city": "Hita, JP"
                          },
                          {
                            "id": "4404",
                            "name": "佐伯市",
                            "coords": "496,307,533,329",
                            "en_city": "Saiki"
                          },
                          {
                            "id": "4405",
                            "name": "国東市",
                            "coords": "423,76,461,98",
                            "en_city": "Kunisaki-shi"
                          }
                        ],
                        "pref": "大分県",
                        "en_pref": "OitaXPrefecture"
                      }
                    },
                    {
                      "45": {
                        "id": "45",
                        "city": [
                          {
                            "id": "4501",
                            "name": "宮崎市",
                            "coords": "423,238,460,260",
                            "en_city": "Miyazaki-shi"
                          },
                          {
                            "id": "4502",
                            "name": "都城市",
                            "coords": "146,323,184,345",
                            "en_city": "Miyakonojo"
                          },
                          {
                            "id": "4503",
                            "name": "延岡市",
                            "coords": "424,45,462,67",
                            "en_city": "Nobeoka"
                          },
                          {
                            "id": "4504",
                            "name": "日向市",
                            "coords": "424,111,461,133",
                            "en_city": "Hyuga"
                          },
                          {
                            "id": "4505",
                            "name": "えびの市",
                            "coords": "61,204,116,225",
                            "en_city": "Ebino"
                          },
                          {
                            "id": "4506",
                            "name": "高千穂町",
                            "coords": "150,26,205,48",
                            "en_city": "Takachiho"
                          }
                        ],
                        "pref": "宮崎県",
                        "en_pref": "Miyazaki-ken"
                      }
                    },
                    {
                      "46": {
                        "id": "46",
                        "city": [
                          {
                            "id": "4601",
                            "name": "鹿児島市",
                            "coords": "287,132,342,154",
                            "en_city": "Kagoshima-shi"
                          },
                          {
                            "id": "4602",
                            "name": "鹿屋市",
                            "coords": "502,173,539,195",
                            "en_city": "Kanoya"
                          },
                          {
                            "id": "4603",
                            "name": "枕崎市",
                            "coords": "342,227,380,249",
                            "en_city": "Makurazaki"
                          },
                          {
                            "id": "4604",
                            "name": "西之表市",
                            "coords": "506,241,562,263",
                            "en_city": "Nishinoomote"
                          },
                          {
                            "id": "4605",
                            "name": "奄美市",
                            "coords": "155,172,193,194",
                            "en_city": "Naze"
                          },
                          {
                            "id": "4606",
                            "name": "伊佐市",
                            "coords": "220,43,258,65",
                            "en_city": "Isa"
                          },
                          {
                            "id": "4607",
                            "name": "和泊町",
                            "coords": "239,356,277,378",
                            "en_city": "Wadomari"
                          },
                          {
                            "id": "4608",
                            "name": "与論町",
                            "coords": "14,171,52,193",
                            "en_city": "Chabana"
                          }
                        ],
                        "pref": "鹿児島県",
                        "en_pref": "Kagoshima-ken"
                      }
                    },
                    {
                      "47": {
                        "id": "47",
                        "city": [
                          {
                            "id": "4701",
                            "name": "那覇市",
                            "coords": "435,324,472,346",
                            "en_city": "Naha"
                          },
                          {
                            "id": "4702",
                            "name": "石垣市",
                            "coords": "97,239,134,261",
                            "en_city": "Ishigaki"
                          },
                          {
                            "id": "4703",
                            "name": "名護市",
                            "coords": "512,253,549,275",
                            "en_city": "Nago"
                          },
                          {
                            "id": "4704",
                            "name": "宮古島市",
                            "coords": "292,246,347,268",
                            "en_city": "Hirara"
                          },
                          {
                            "id": "4705",
                            "name": "渡嘉敷村",
                            "coords": "258,177,313,199",
                            "en_city": "Zamami"
                          },
                          {
                            "id": "4706",
                            "name": "座間味村",
                            "coords": "166,238,221,260",
                            "en_city": "Nishi"
                          },
                          {
                            "id": "4707",
                            "name": "南大東村",
                            "coords": "426,127,482,149",
                            "en_city": "Shinto"
                          },
                          {
                            "id": "4708",
                            "name": "伊是名村",
                            "coords": "426,62,481,84",
                            "en_city": "Izena"
                          },
                          {
                            "id": "4709",
                            "name": "与那国町",
                            "coords": "2,240,57,261",
                            "en_city": "Yonakuni"
                          }
                        ],
                        "pref": "沖縄県",
                        "en_pref": "Okinawa-ken"
                      }
                    }
                  ]',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];
        parent::init();
    }
}
