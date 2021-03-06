<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'id' => 1,
                'province_id' => 1,

                'name' => 'آذرشهر',
                'en_name' => 'Azarshahr',
                'latitude' => '37.7560129',
                'longitude' => '45.9540934',
            ],
            [
                'id' => 2,
                'province_id' => 1,

                'name' => 'تیمورلو',
                'en_name' => 'Teymourlou',
                'latitude' => '37.8104085',
                'longitude' => '45.8815454',
            ],
            [
                'id' => 3,
                'province_id' => 1,

                'name' => 'گوگان',
                'en_name' => 'Gogan',
                'latitude' => '37.7815346',
                'longitude' => '45.8983255',
            ],
            [
                'id' => 4,
                'province_id' => 1,

                'name' => 'ممقان',
                'en_name' => 'Mamaqan',
                'latitude' => '37.8561644',
                'longitude' => '45.9274841',
            ],
            [
                'id' => 5,
                'province_id' => 1,

                'name' => 'اسکو',
                'en_name' => 'Osku',
                'latitude' => '37.9041424',
                'longitude' => '46.1085588',
            ],
            [
                'id' => 6,
                'province_id' => 1,

                'name' => 'ایلخچی',
                'en_name' => 'Ilkhichi',
                'latitude' => '37.9374859',
                'longitude' => '45.9433216',
            ],
            [
                'id' => 7,
                'province_id' => 1,

                'name' => 'سهند',
                'en_name' => 'Sahand',
                'latitude' => '37.9421284',
                'longitude' => '46.1131704',
            ],
            [
                'id' => 8,
                'province_id' => 1,

                'name' => 'اهر',
                'en_name' => 'Ahar',
                'latitude' => '38.4801231',
                'longitude' => '47.0367187',
            ],
            [
                'id' => 9,
                'province_id' => 1,

                'name' => 'هوراند',
                'en_name' => 'Hurand',
                'latitude' => '38.859167',
                'longitude' => '47.368611',
            ],
            [
                'id' => 10,
                'province_id' => 1,

                'name' => 'بستان آباد',
                'en_name' => 'Bostan Abad',
                'latitude' => '37.839493',
                'longitude' => '46.8096327',
            ],
            [
                'id' => 11,
                'province_id' => 1,

                'name' => 'تیکمه داش',
                'en_name' => 'Tekmeh Dash',
                'latitude' => '37.7353554',
                'longitude' => '46.9308898',
            ],
            [
                'id' => 12,
                'province_id' => 1,

                'name' => 'بناب',
                'en_name' => 'Bonab',
                'latitude' => '37.3436672',
                'longitude' => '46.0264272',
            ],
            [
                'id' => 13,
                'province_id' => 1,

                'name' => 'باسمنج',
                'en_name' => 'Basmenj',
                'latitude' => '38.0013316',
                'longitude' => '46.4462469',
            ],
            [
                'id' => 14,
                'province_id' => 1,

                'name' => 'تبریز',
                'en_name' => 'Tabriz',
                'latitude' => '38.0805555',
                'longitude' => '46.1536413',
            ],
            [
                'id' => 15,
                'province_id' => 1,

                'name' => 'خسروشاه',
                'en_name' => 'Khosrowshah',
                'latitude' => '37.9633046',
                'longitude' => '46.0150331',
            ],
            [
                'id' => 16,
                'province_id' => 1,

                'name' => 'سردرود',
                'en_name' => 'Sardroud',
                'latitude' => '38.0312385',
                'longitude' => '46.1297363',
            ],
            [
                'id' => 17,
                'province_id' => 1,

                'name' => 'جلفا',
                'en_name' => 'Jolfa',
                'latitude' => '38.8161685',
                'longitude' => '45.6333948',
            ],
            [
                'id' => 18,
                'province_id' => 1,

                'name' => 'سیه رود',
                'en_name' => 'Siahrood',
                'latitude' => '38.8687745',
                'longitude' => '45.9966552',
            ],
            [
                'id' => 19,
                'province_id' => 1,

                'name' => 'هادیشهر',
                'en_name' => 'Hadishahr',
                'latitude' => '38.828331',
                'longitude' => '45.6217998',
            ],
            [
                'id' => 20,
                'province_id' => 1,

                'name' => 'قره آغاج',
                'en_name' => 'Qareh Aghaj',
                'latitude' => '37.1285619',
                'longitude' => '46.9647825',
            ],
            [
                'id' => 21,
                'province_id' => 1,

                'name' => 'خمارلو',
                'en_name' => 'Khomarlu',
                'latitude' => '39.1545566',
                'longitude' => '47.0248317',
            ],
            [
                'id' => 22,
                'province_id' => 1,

                'name' => 'دوزدوزان',
                'en_name' => 'Duzduzan',
                'latitude' => '37.9487574',
                'longitude' => '47.1140957',
            ],
            [
                'id' => 23,
                'province_id' => 1,

                'name' => 'سراب',
                'en_name' => 'Sarab',
                'latitude' => '37.939977',
                'longitude' => '47.5154373',
            ],
            [
                'id' => 24,
                'province_id' => 1,

                'name' => 'شربیان',
                'en_name' => 'Sharabian',
                'latitude' => '37.8819242',
                'longitude' => '47.0954919',
            ],
            [
                'id' => 25,
                'province_id' => 1,

                'name' => 'مهربان',
                'en_name' => 'Mehraban',
                'latitude' => '38.0814817',
                'longitude' => '47.1282577',
            ],
            [
                'id' => 26,
                'province_id' => 1,

                'name' => 'تسوج',
                'en_name' => 'Tasuj',
                'latitude' => '38.3161504',
                'longitude' => '45.3365419',
            ],
            [
                'id' => 27,
                'province_id' => 1,

                'name' => 'خامنه',
                'en_name' => 'Khamaneh',
                'latitude' => '38.1852356',
                'longitude' => '45.6130884',
            ],
            [
                'id' => 28,
                'province_id' => 1,

                'name' => 'سیس',
                'en_name' => 'Sis',
                'latitude' => '38.1968587',
                'longitude' => '45.8107566',
            ],
            [
                'id' => 29,
                'province_id' => 1,

                'name' => 'شبستر',
                'en_name' => 'Shabestar',
                'latitude' => '38.1827399',
                'longitude' => '45.6819246',
            ],
            [
                'id' => 30,
                'province_id' => 1,

                'name' => 'شرفخانه',
                'en_name' => 'Sharafkhaneh',
                'latitude' => '38.1786571',
                'longitude' => '45.4678629',
            ],
            [
                'id' => 31,
                'province_id' => 1,

                'name' => 'شندآباد',
                'en_name' => 'Shendabad',
                'latitude' => '38.1456101',
                'longitude' => '45.6190539',
            ],
            [
                'id' => 32,
                'province_id' => 1,

                'name' => 'صوفیان',
                'en_name' => 'Soufian',
                'latitude' => '38.2783136',
                'longitude' => '45.9770966',
            ],
            [
                'id' => 33,
                'province_id' => 1,

                'name' => 'کوزه کنان',
                'en_name' => 'Koozehkonan',
                'latitude' => '38.1932024',
                'longitude' => '45.5432863',
            ],
            [
                'id' => 34,
                'province_id' => 1,

                'name' => 'وایقان',
                'en_name' => 'Vaighan',
                'latitude' => '38.1284459',
                'longitude' => '45.704906',
            ],
            [
                'id' => 35,
                'province_id' => 1,

                'name' => 'جوان قلعه',
                'en_name' => 'Javan Qala',
                'latitude' => '37.4971417',
                'longitude' => '45.9718608',
            ],
            [
                'id' => 36,
                'province_id' => 1,

                'name' => 'عجب شیر',
                'en_name' => 'Ajabshir',
                'latitude' => '37.4825847',
                'longitude' => '45.8735846',
            ],
            [
                'id' => 37,
                'province_id' => 1,

                'name' => 'آبش احمد',
                'en_name' => 'Abeshahmad',
                'latitude' => '39.0497674',
                'longitude' => '47.3075579',
            ],
            [
                'id' => 38,
                'province_id' => 1,

                'name' => 'کلیبر',
                'en_name' => 'Kaleybar',
                'latitude' => '38.8667258',
                'longitude' => '47.0245312',
            ],
            [
                'id' => 39,
                'province_id' => 1,

                'name' => 'خداجو',
                'en_name' => 'Kharajoo',
                'latitude' => '37.3097814',
                'longitude' => '46.5217136',
            ],
            [
                'id' => 40,
                'province_id' => 1,

                'name' => 'مراغه',
                'en_name' => 'Maragheh',
                'latitude' => '37.3808819',
                'longitude' => '46.1906857',
            ],
            [
                'id' => 41,
                'province_id' => 1,

                'name' => 'بناب مرند',
                'en_name' => 'Benab e Marand',
                'latitude' => '38.4281011',
                'longitude' => '45.9022522',
            ],
            [
                'id' => 42,
                'province_id' => 1,

                'name' => 'زنوز',
                'en_name' => 'Zonouz',
                'latitude' => '38.5894951',
                'longitude' => '45.8261419',
            ],
            [
                'id' => 43,
                'province_id' => 1,

                'name' => 'کشکسرای',
                'en_name' => 'Koshksaray',
                'latitude' => '38.4596201',
                'longitude' => '45.5569553',
            ],
            [
                'id' => 44,
                'province_id' => 1,

                'name' => 'مرند',
                'en_name' => 'Marand',
                'latitude' => '38.4238783',
                'longitude' => '45.7330793',
            ],
            [
                'id' => 45,
                'province_id' => 1,

                'name' => 'یامچی',
                'en_name' => 'Yamchi',
                'latitude' => '38.5244774',
                'longitude' => '45.6341648',
            ],
            [
                'id' => 46,
                'province_id' => 1,

                'name' => 'لیلان',
                'en_name' => 'Leilan',
                'latitude' => '37.0116509',
                'longitude' => '46.1952352',
            ],
            [
                'id' => 47,
                'province_id' => 1,

                'name' => 'مبارک شهر',
                'en_name' => 'Mobarak Abad',
                'latitude' => '37.180304',
                'longitude' => '46.0507178',
            ],
            [
                'id' => 48,
                'province_id' => 1,

                'name' => 'ملکان',
                'en_name' => 'Malekan',
                'latitude' => '37.1464475',
                'longitude' => '46.0862515',
            ],
            [
                'id' => 49,
                'province_id' => 1,

                'name' => 'آقکند',
                'en_name' => 'Aqkend',
                'latitude' => '37.2577699',
                'longitude' => '48.0614304',
            ],
            [
                'id' => 50,
                'province_id' => 1,

                'name' => 'اچاچی',
                'en_name' => 'Achachi',
                'latitude' => '37.3954338',
                'longitude' => '47.7903987',
            ],
            [
                'id' => 51,
                'province_id' => 1,

                'name' => 'ترک',
                'en_name' => 'Tark',
                'latitude' => '37.6173671',
                'longitude' => '47.7667307',
            ],
            [
                'id' => 52,
                'province_id' => 1,

                'name' => 'ترکمانچای',
                'en_name' => 'Turkman Chay',
                'latitude' => '37.5817898',
                'longitude' => '47.3702143',
            ],
            [
                'id' => 53,
                'province_id' => 1,

                'name' => 'میانه',
                'en_name' => 'Mianeh',
                'latitude' => '37.4272862',
                'longitude' => '47.6911778',
            ],
            [
                'id' => 54,
                'province_id' => 1,

                'name' => 'خاروانا',
                'en_name' => 'Kharvana',
                'latitude' => '38.6856095',
                'longitude' => '46.159873',
            ],
            [
                'id' => 55,
                'province_id' => 1,

                'name' => 'ورزقان',
                'en_name' => 'Varzeqān',
                'latitude' => '38.5813659',
                'longitude' => '46.170008',
            ],
            [
                'id' => 56,
                'province_id' => 1,

                'name' => 'بخشایش',
                'en_name' => 'Bakhshāyesh',
                'latitude' => '38.1311381',
                'longitude' => '46.9380891',
            ],
            [
                'id' => 57,
                'province_id' => 1,

                'name' => 'خواجه',
                'en_name' => 'Khaje',
                'latitude' => '38.1527567',
                'longitude' => '46.5823746',
            ],
            [
                'id' => 58,
                'province_id' => 1,

                'name' => 'زرنق',
                'en_name' => 'Zarnaq',
                'latitude' => '38.0924087',
                'longitude' => '47.0768023',
            ],
            [
                'id' => 59,
                'province_id' => 1,

                'name' => 'کلوانق',
                'en_name' => 'Kelvanaq',
                'latitude' => '38.1024979',
                'longitude' => '46.9848346',
            ],
            [
                'id' => 60,
                'province_id' => 1,

                'name' => 'هریس',
                'en_name' => 'Heris',
                'latitude' => '38.2495209',
                'longitude' => '47.1078729',
            ],
            [
                'id' => 61,
                'province_id' => 1,

                'name' => 'نظر کهریزی',
                'en_name' => 'Nazarkahrizi',
                'latitude' => '37.3473706',
                'longitude' => '46.7596042',
            ],
            [
                'id' => 62,
                'province_id' => 1,

                'name' => 'هشترود',
                'en_name' => 'Hashtrood',
                'latitude' => '37.4775029',
                'longitude' => '47.0369873',
            ],
            [
                'id' => 63,
                'province_id' => 2,

                'name' => 'ارومیه',
                'en_name' => 'Urmia',
                'latitude' => '37.5520103',
                'longitude' => '44.9866298',
            ],
            [
                'id' => 64,
                'province_id' => 2,

                'name' => 'سرو',
                'en_name' => 'Serow',
                'latitude' => '37.727500',
                'longitude' => '44.642778',
            ],
            [
                'id' => 65,
                'province_id' => 2,

                'name' => 'سیلوانه',
                'en_name' => 'Silvana',
                'latitude' => '37.4222616',
                'longitude' => '44.8499679',
            ],
            [
                'id' => 66,
                'province_id' => 2,

                'name' => 'قوشچی',
                'en_name' => 'Qushchi',
                'latitude' => '37.9896341',
                'longitude' => '45.0270581',
            ],
            [
                'id' => 67,
                'province_id' => 2,

                'name' => 'نوشین',
                'en_name' => 'Noshin',
                'latitude' => '37.7320977',
                'longitude' => '45.0382803',
            ],
            [
                'id' => 68,
                'province_id' => 2,

                'name' => 'اشنویه',
                'en_name' => 'Oshnavieh',
                'latitude' => '37.035787',
                'longitude' => '45.0818394',
            ],
            [
                'id' => 69,
                'province_id' => 2,

                'name' => 'نالوس',
                'en_name' => 'Nalous',
                'latitude' => '36.9838115',
                'longitude' => '45.1396036',
            ],
            [
                'id' => 70,
                'province_id' => 2,

                'name' => 'بوکان',
                'en_name' => 'Bukan',
                'latitude' => '36.5216028',
                'longitude' => '46.1303018',
            ],
            [
                'id' => 71,
                'province_id' => 2,

                'name' => 'سیمینه',
                'en_name' => 'Simmineh',
                'latitude' => '36.729722',
                'longitude' => '46.151111',
            ],
            [
                'id' => 72,
                'province_id' => 2,

                'name' => 'پلدشت',
                'en_name' => 'Poldasht',
                'latitude' => '39.3484175',
                'longitude' => '45.0495885',
            ],
            [
                'id' => 73,
                'province_id' => 2,

                'name' => 'نازک علیا',
                'en_name' => 'Nazok-e Olya',
                'latitude' => '39.0102301',
                'longitude' => '45.050919',
            ],
            [
                'id' => 74,
                'province_id' => 2,

                'name' => 'پیرانشهر',
                'en_name' => 'Piranshahr',
                'latitude' => '36.6964421',
                'longitude' => '45.1110428',
            ],
            [
                'id' => 75,
                'province_id' => 2,

                'name' => 'گردکشانه',
                'en_name' => 'Gerd Kashaneh',
                'latitude' => '36.8113629',
                'longitude' => '45.247643',
            ],
            [
                'id' => 76,
                'province_id' => 2,

                'name' => 'تکاب',
                'en_name' => 'Takab',
                'latitude' => '36.4008096',
                'longitude' => '47.0787972',
            ],
            [
                'id' => 77,
                'province_id' => 2,

                'name' => 'آواجیق',
                'en_name' => 'Avajiq',
                'latitude' => '39.313889',
                'longitude' => '44.164722',
            ],
            [
                'id' => 78,
                'province_id' => 2,

                'name' => 'سیه چشمه',
                'en_name' => 'Siah Cheshmeh',
                'latitude' => '39.064678',
                'longitude' => '44.3694447',
            ],
            [
                'id' => 79,
                'province_id' => 2,

                'name' => 'قره ضیاءالدین',
                'en_name' => 'Qarahziyaeddin',
                'latitude' => '38.8901783',
                'longitude' => '45.0081108',
            ],
            [
                'id' => 80,
                'province_id' => 2,

                'name' => 'ایواوغلی',
                'en_name' => 'Evogli',
                'latitude' => '38.7113992',
                'longitude' => '45.1979041',
            ],
            [
                'id' => 81,
                'province_id' => 2,

                'name' => 'خوی',
                'en_name' => 'Khoy',
                'latitude' => '38.5484923',
                'longitude' => '44.9166149',
            ],
            [
                'id' => 82,
                'province_id' => 2,

                'name' => 'دیزج دیز',
                'en_name' => 'Dizaj Diz',
                'latitude' => '38.4612821',
                'longitude' => '45.0072525',
            ],
            [
                'id' => 83,
                'province_id' => 2,

                'name' => 'زرآباد',
                'en_name' => 'Zurabad',
                'latitude' => '38.8022005',
                'longitude' => '44.5770691',
            ],
            [
                'id' => 84,
                'province_id' => 2,

                'name' => 'فیرورق',
                'en_name' => 'Firuraq',
                'latitude' => '38.5806101',
                'longitude' => '44.8403548',
            ],
            [
                'id' => 85,
                'province_id' => 2,

                'name' => 'قطور',
                'en_name' => 'Qotur',
                'latitude' => '38.4653804',
                'longitude' => '44.3881129',
            ],
            [
                'id' => 86,
                'province_id' => 2,

                'name' => 'ربط',
                'en_name' => 'Rabat',
                'latitude' => '36.208333',
                'longitude' => '45.550000',
            ],
            [
                'id' => 87,
                'province_id' => 2,

                'name' => 'سردشت',
                'en_name' => 'Sardasht',
                'latitude' => '36.160795',
                'longitude' => '45.4580782',
            ],
            [
                'id' => 88,
                'province_id' => 2,

                'name' => 'میرآباد',
                'en_name' => 'Mirabad',
                'latitude' => '36.4059131',
                'longitude' => '45.3620982',
            ],
            [
                'id' => 89,
                'province_id' => 2,

                'name' => 'تازه شهر',
                'en_name' => 'Taze Shar',
                'latitude' => '38.1766875',
                'longitude' => '44.6837782',
            ],
            [
                'id' => 90,
                'province_id' => 2,

                'name' => 'سلماس',
                'en_name' => 'Salmas',
                'latitude' => '38.201589',
                'longitude' => '44.7317356',
            ],
            [
                'id' => 91,
                'province_id' => 2,

                'name' => 'شاهین دژ',
                'en_name' => 'Shahin Dej',
                'latitude' => '36.6775538',
                'longitude' => '46.5505312',
            ],
            [
                'id' => 92,
                'province_id' => 2,

                'name' => 'کشاورز',
                'en_name' => 'Keshavarz',
                'latitude' => '36.8348605',
                'longitude' => '46.3500952',
            ],
            [
                'id' => 93,
                'province_id' => 2,

                'name' => 'محمودآباد',
                'en_name' => 'Mahmoodabad',
                'latitude' => '36.7141379',
                'longitude' => '46.4916487',
            ],
            [
                'id' => 94,
                'province_id' => 2,

                'name' => 'شوط',
                'en_name' => 'Showt',
                'latitude' => '39.2209468',
                'longitude' => '44.7491597',
            ],
            [
                'id' => 95,
                'province_id' => 2,

                'name' => 'مرگنلر',
                'en_name' => 'Marganlar',
                'latitude' => '39.1431389',
                'longitude' => '44.9298762',
            ],
            [
                'id' => 96,
                'province_id' => 2,

                'name' => 'بازرگان',
                'en_name' => 'Bazargan',
                'latitude' => '39.3909326',
                'longitude' => '44.3732159',
            ],
            [
                'id' => 97,
                'province_id' => 2,

                'name' => 'ماکو',
                'en_name' => 'Maku',
                'latitude' => '39.2878546',
                'longitude' => '44.46433',
            ],
            [
                'id' => 98,
                'province_id' => 2,

                'name' => 'خلیفان',
                'en_name' => 'Khalifan',
                'latitude' => '36.506816',
                'longitude' => '45.7909084',
            ],
            [
                'id' => 99,
                'province_id' => 2,

                'name' => 'مهاباد',
                'en_name' => 'Mahabad',
                'latitude' => '36.7660413',
                'longitude' => '45.6948437',
            ],
            [
                'id' => 100,
                'province_id' => 2,

                'name' => 'باروق',
                'en_name' => 'Baruq',
                'latitude' => '36.9530288',
                'longitude' => '46.3141322',
            ],
            [
                'id' => 101,
                'province_id' => 2,

                'name' => 'چهاربرج',
                'en_name' => 'Charburj',
                'latitude' => '37.1218792',
                'longitude' => '45.958986',
            ],
            [
                'id' => 102,
                'province_id' => 2,

                'name' => 'میاندوآب',
                'en_name' => 'Miandoab',
                'latitude' => '36.9662047',
                'longitude' => '46.0710806',
            ],
            [
                'id' => 103,
                'province_id' => 2,

                'name' => 'محمدیار',
                'en_name' => 'Mohammadyar',
                'latitude' => '36.983511',
                'longitude' => '45.5103493',
            ],
            [
                'id' => 104,
                'province_id' => 2,

                'name' => 'نقده',
                'en_name' => 'Naqadeh',
                'latitude' => '36.9576384',
                'longitude' => '45.3706598',
            ],
            [
                'id' => 105,
                'province_id' => 3,

                'name' => 'اردبیل',
                'en_name' => 'Ardabil',
                'latitude' => '38.2668309',
                'longitude' => '48.2709933',
            ],
            [
                'id' => 106,
                'province_id' => 3,

                'name' => 'هیر',
                'en_name' => 'Hir',
                'latitude' => '38.0795304',
                'longitude' => '48.4894036',
            ],
            [
                'id' => 107,
                'province_id' => 3,

                'name' => 'بیله سوار',
                'en_name' => 'Bileh Savar',
                'latitude' => '39.3805502',
                'longitude' => '48.325741',
            ],
            [
                'id' => 108,
                'province_id' => 3,

                'name' => 'جعفرآباد',
                'en_name' => 'Jafarabad',
                'latitude' => '39.4221316',
                'longitude' => '48.0788893',
            ],
            [
                'id' => 109,
                'province_id' => 3,

                'name' => 'اسلام اباد',
                'en_name' => 'Eslāmābād',
                'latitude' => '38.1311048',
                'longitude' => '47.939186',
            ],
            [
                'id' => 110,
                'province_id' => 3,

                'name' => 'اصلاندوز',
                'en_name' => 'Aslan Duz',
                'latitude' => '39.4429868',
                'longitude' => '47.4004269',
            ],
            [
                'id' => 111,
                'province_id' => 3,

                'name' => 'پارس آباد',
                'en_name' => 'Parsabad',
                'latitude' => '39.6280219',
                'longitude' => '47.8665727',
            ],
            [
                'id' => 112,
                'province_id' => 3,

                'name' => 'تازه کند',
                'en_name' => 'Tazakand',
                'latitude' => '39.1045042',
                'longitude' => '44.8990201',
            ],
            [
                'id' => 113,
                'province_id' => 3,

                'name' => 'خلخال',
                'en_name' => 'Khalkhal',
                'latitude' => '37.622101',
                'longitude' => '48.50142',
            ],
            [
                'id' => 114,
                'province_id' => 3,

                'name' => 'کلور',
                'en_name' => 'Kolor',
                'latitude' => '37.3884859',
                'longitude' => '48.7166833',
            ],
            [
                'id' => 115,
                'province_id' => 3,

                'name' => 'هشتجین',
                'en_name' => 'Hashjin',
                'latitude' => '37.3698087',
                'longitude' => '48.3133328',
            ],
            [
                'id' => 116,
                'province_id' => 3,

                'name' => 'سرعین',
                'en_name' => 'Sarein',
                'latitude' => '38.1464347',
                'longitude' => '48.0571602',
            ],
            [
                'id' => 117,
                'province_id' => 3,

                'name' => 'گیوی',
                'en_name' => 'Kivi',
                'latitude' => '37.6931231',
                'longitude' => '48.320757',
            ],
            [
                'id' => 118,
                'province_id' => 3,

                'name' => 'تازه کند اونگوت',
                'en_name' => 'Tazakand',
                'latitude' => '39.0437438',
                'longitude' => '47.7344691',
            ],
            [
                'id' => 119,
                'province_id' => 3,

                'name' => 'گرمی',
                'en_name' => 'Germi',
                'latitude' => '38.9988011',
                'longitude' => '47.6342799',
            ],
            [
                'id' => 120,
                'province_id' => 3,

                'name' => 'رضی',
                'en_name' => 'Razi',
                'latitude' => '38.624866',
                'longitude' => '48.0828667',
            ],
            [
                'id' => 121,
                'province_id' => 3,

                'name' => 'فخرآباد',
                'en_name' => 'Fakhrabad',
                'latitude' => '38.5226014',
                'longitude' => '47.8533983',
            ],
            [
                'id' => 122,
                'province_id' => 3,

                'name' => 'قصابه',
                'en_name' => 'Qasabeh',
                'latitude' => '38.387813',
                'longitude' => '47.5382923',
            ],
            [
                'id' => 123,
                'province_id' => 3,

                'name' => 'لاهرود',
                'en_name' => 'Lahroud',
                'latitude' => '38.5080193',
                'longitude' => '47.8221237',
            ],
            [
                'id' => 124,
                'province_id' => 3,

                'name' => 'مرادلو',
                'en_name' => 'Moradlu',
                'latitude' => '38.748',
                'longitude' => '47.7401662',
            ],
            [
                'id' => 125,
                'province_id' => 3,

                'name' => 'مشگین شهر',
                'en_name' => 'Meshgin Shahr',
                'latitude' => '38.3863287',
                'longitude' => '47.6383489',
            ],
            [
                'id' => 126,
                'province_id' => 3,

                'name' => 'آبی بیگلو',
                'en_name' => 'Abibeiglou',
                'latitude' => '38.28362',
                'longitude' => '48.5448289',
            ],
            [
                'id' => 127,
                'province_id' => 3,

                'name' => 'عنبران',
                'en_name' => 'Anbaran',
                'latitude' => '38.4884344',
                'longitude' => '48.4176776',
            ],
            [
                'id' => 128,
                'province_id' => 3,

                'name' => 'نمین',
                'en_name' => 'Namin',
                'latitude' => '38.4235015',
                'longitude' => '48.4628391',
            ],
            [
                'id' => 129,
                'province_id' => 3,

                'name' => 'کوراییم',
                'en_name' => 'Kuraim',
                'latitude' => '37.955000',
                'longitude' => '48.235556',
            ],
            [
                'id' => 130,
                'province_id' => 3,

                'name' => 'نیر',
                'en_name' => 'Nir',
                'latitude' => '38.0333876',
                'longitude' => '47.9977225',
            ],
            [
                'id' => 131,
                'province_id' => 4,

                'name' => 'آران وبیدگل',
                'en_name' => 'Aran va Bidgol',
                'latitude' => '34.0592683',
                'longitude' => '51.4604758',
            ],
            [
                'id' => 132,
                'province_id' => 4,

                'name' => 'ابوزیدآباد',
                'en_name' => 'Abouzeidabad',
                'latitude' => '33.9016576',
                'longitude' => '51.7433737',
            ],
            [
                'id' => 133,
                'province_id' => 4,

                'name' => 'سفیدشهر',
                'en_name' => 'Sefid Shahr',
                'latitude' => '34.1240612',
                'longitude' => '51.3470507',
            ],
            [
                'id' => 134,
                'province_id' => 4,

                'name' => 'نوش آباد',
                'en_name' => 'Nushabad',
                'latitude' => '34.0795706',
                'longitude' => '51.4278602',
            ],
            [
                'id' => 135,
                'province_id' => 4,

                'name' => 'اردستان',
                'en_name' => 'Ardestan',
                'latitude' => '33.3806456',
                'longitude' => '52.3430723',
            ],
            [
                'id' => 136,
                'province_id' => 4,

                'name' => 'زواره',
                'en_name' => 'Zavareh',
                'latitude' => '33.4441168',
                'longitude' => '52.4654243',
            ],
            [
                'id' => 137,
                'province_id' => 4,

                'name' => 'مهاباد',
                'en_name' => 'Mahabad',
                'latitude' => '33.5289096',
                'longitude' => '52.2133613',
            ],
            [
                'id' => 138,
                'province_id' => 4,

                'name' => 'اژیه',
                'en_name' => 'Ezhieh',
                'latitude' => '32.442367',
                'longitude' => '52.3718261',
            ],
            [
                'id' => 139,
                'province_id' => 4,

                'name' => 'اصفهان',
                'en_name' => 'Isfahan',
                'latitude' => '32.6622111',
                'longitude' => '51.5469406',
            ],
            [
                'id' => 140,
                'province_id' => 4,

                'name' => 'بهارستان',
                'en_name' => 'Baharestan',
                'latitude' => '32.48391',
                'longitude' => '51.7339319',
            ],
            [
                'id' => 141,
                'province_id' => 4,

                'name' => 'تودشک',
                'en_name' => 'Toodeshk',
                'latitude' => '32.7208919',
                'longitude' => '52.6562261',
            ],
            [
                'id' => 142,
                'province_id' => 4,

                'name' => 'حسن اباد',
                'en_name' => 'Hassan Abad',
                'latitude' => '32.1392797',
                'longitude' => '52.621293',
            ],
            [
                'id' => 143,
                'province_id' => 4,

                'name' => 'زیار',
                'en_name' => 'Ziar',
                'latitude' => '32.5112446',
                'longitude' => '51.9268047',
            ],
            [
                'id' => 144,
                'province_id' => 4,

                'name' => 'سجزی',
                'en_name' => 'Sejzi',
                'latitude' => '32.6986664',
                'longitude' => '52.0667404',
            ],
            [
                'id' => 145,
                'province_id' => 4,

                'name' => 'قهجاورستان',
                'en_name' => 'Qahjavarestan',
                'latitude' => '32.70272036',
                'longitude' => '51.8280244',
            ],
            [
                'id' => 146,
                'province_id' => 4,

                'name' => 'کوهپایه',
                'en_name' => 'Kuhpayeh',
                'latitude' => '32.7028747',
                'longitude' => '52.4222082',
            ],
            [
                'id' => 147,
                'province_id' => 4,

                'name' => 'محمدآباد',
                'en_name' => 'Mohammad Abad',
                'latitude' => '32.3174267',
                'longitude' => '52.0917295',
            ],
            [
                'id' => 148,
                'province_id' => 4,

                'name' => 'نصرآباد',
                'en_name' => 'Nasr Abad',
                'latitude' => '32.2801661',
                'longitude' => '52.0529437',
            ],
            [
                'id' => 149,
                'province_id' => 4,

                'name' => 'نیک آباد',
                'en_name' => 'Nik Abad',
                'latitude' => '32.3038007',
                'longitude' => '52.1897363',
            ],
            [
                'id' => 150,
                'province_id' => 4,

                'name' => 'ورزنه',
                'en_name' => 'Varzaneh',
                'latitude' => '32.4176745',
                'longitude' => '52.6381787',
            ],
            [
                'id' => 151,
                'province_id' => 4,

                'name' => 'هرند',
                'en_name' => 'Harand',
                'latitude' => '32.574865',
                'longitude' => '52.3993773',
            ],
            [
                'id' => 152,
                'province_id' => 4,

                'name' => 'حبیب آباد',
                'en_name' => 'Habibabad',
                'latitude' => '32.8312424',
                'longitude' => '51.7659903',
            ],
            [
                'id' => 153,
                'province_id' => 4,

                'name' => 'خورزوق',
                'en_name' => 'Khorzugh',
                'latitude' => '32.780038',
                'longitude' => '51.6254424',
            ],
            [
                'id' => 154,
                'province_id' => 4,

                'name' => 'دستگرد',
                'en_name' => 'Dastgerd',
                'latitude' => '32.8022271',
                'longitude' => '51.657114',
            ],
            [
                'id' => 155,
                'province_id' => 4,

                'name' => 'دولت آباد',
                'en_name' => 'Dolatabad',
                'latitude' => '32.8082647',
                'longitude' => '51.6797517',
            ],
            [
                'id' => 156,
                'province_id' => 4,

                'name' => 'سین',
                'en_name' => 'Sin',
                'latitude' => '32.8502804',
                'longitude' => '51.6476189',
            ],
            [
                'id' => 157,
                'province_id' => 4,

                'name' => 'شاپورآباد',
                'en_name' => 'Shapur Abad',
                'latitude' => '32.8433764',
                'longitude' => '51.7391897',
            ],
            [
                'id' => 158,
                'province_id' => 4,

                'name' => 'کمشچه',
                'en_name' => 'Komshecheh',
                'latitude' => '32.9066492',
                'longitude' => '51.8017817',
            ],
            [
                'id' => 159,
                'province_id' => 4,

                'name' => 'افوس',
                'en_name' => 'Afus',
                'latitude' => '33.0249555',
                'longitude' => '50.088129',
            ],
            [
                'id' => 160,
                'province_id' => 4,

                'name' => 'بویین و میاندشت',
                'en_name' => 'Buin va Miandasht',
                'latitude' => '33.0744949',
                'longitude' => '50.1323102',
            ],
            [
                'id' => 161,
                'province_id' => 4,

                'name' => 'تیران',
                'en_name' => 'Tiran',
                'latitude' => '32.7038376',
                'longitude' => '51.1361859',
            ],
            [
                'id' => 162,
                'province_id' => 4,

                'name' => 'رضوانشهر',
                'en_name' => 'Rezvanshahr',
                'latitude' => '32.6658105',
                'longitude' => '51.0235971',
            ],
            [
                'id' => 163,
                'province_id' => 4,

                'name' => 'عسگران',
                'en_name' => 'Askaran',
                'latitude' => '32.8662328',
                'longitude' => '50.8471942',
            ],
            [
                'id' => 164,
                'province_id' => 4,

                'name' => 'چادگان',
                'en_name' => 'Chadegan',
                'latitude' => '32.7807973',
                'longitude' => '50.5471921',
            ],
            [
                'id' => 165,
                'province_id' => 4,

                'name' => 'رزوه',
                'en_name' => 'Rezveh',
                'latitude' => '32.8368771',
                'longitude' => '50.5652189',
            ],
            [
                'id' => 166,
                'province_id' => 4,

                'name' => 'اصغرآباد',
                'en_name' => 'Asghar Abad',
                'latitude' => '32.6526091',
                'longitude' => '51.471194',
            ],
            [
                'id' => 167,
                'province_id' => 4,

                'name' => 'خمینی شهر',
                'en_name' => 'Khomeyni Shahr',
                'latitude' => '32.6832934',
                'longitude' => '51.4863962',
            ],
            [
                'id' => 168,
                'province_id' => 4,

                'name' => 'درچه',
                'en_name' => 'Dorcheh',
                'latitude' => '32.6150096',
                'longitude' => '51.5346145',
            ],
            [
                'id' => 169,
                'province_id' => 4,

                'name' => 'کوشک',
                'en_name' => 'Kooshk',
                'latitude' => '32.6386692',
                'longitude' => '51.4909028',
            ],
            [
                'id' => 170,
                'province_id' => 4,

                'name' => 'خوانسار',
                'en_name' => 'Khansar',
                'latitude' => '33.2674819',
                'longitude' => '50.2487159',
            ],
            [
                'id' => 171,
                'province_id' => 4,

                'name' => 'جندق',
                'en_name' => 'Jandaq',
                'latitude' => '34.0426131',
                'longitude' => '54.4051123',
            ],
            [
                'id' => 172,
                'province_id' => 4,

                'name' => 'خور',
                'en_name' => 'Khur',
                'latitude' => '33.7763092',
                'longitude' => '55.0747846',
            ],
            [
                'id' => 173,
                'province_id' => 4,

                'name' => 'فرخی',
                'en_name' => 'Farrokhi',
                'latitude' => '33.8419575',
                'longitude' => '54.9437856',
            ],
            [
                'id' => 174,
                'province_id' => 4,

                'name' => 'دهاقان',
                'en_name' => 'Dehaghan',
                'latitude' => '31.937249',
                'longitude' => '51.6452264',
            ],
            [
                'id' => 175,
                'province_id' => 4,

                'name' => 'گلشن',
                'en_name' => 'Golshan',
                'latitude' => '31.9265144',
                'longitude' => '51.7227954',
            ],
            [
                'id' => 176,
                'province_id' => 4,

                'name' => 'حنا',
                'en_name' => 'Hanna',
                'latitude' => '31.1974485',
                'longitude' => '51.713966',
            ],
            [
                'id' => 177,
                'province_id' => 4,

                'name' => 'سمیرم',
                'en_name' => 'Semirom',
                'latitude' => '31.3979233',
                'longitude' => '51.5444177',
            ],
            [
                'id' => 178,
                'province_id' => 4,

                'name' => 'کمه',
                'en_name' => 'Komeh',
                'latitude' => '31.0632087',
                'longitude' => '51.5845656',
            ],
            [
                'id' => 179,
                'province_id' => 4,

                'name' => 'ونک',
                'en_name' => 'Vanak',
                'latitude' => '31.5275575',
                'longitude' => '51.3214762',
            ],
            [
                'id' => 180,
                'province_id' => 4,

                'name' => 'شاهین شهر',
                'en_name' => 'Shahin Shahr',
                'latitude' => '32.8781132',
                'longitude' => '51.4830251',
            ],
            [
                'id' => 181,
                'province_id' => 4,

                'name' => 'گرگاب',
                'en_name' => 'Gorgab',
                'latitude' => '32.8662504',
                'longitude' => '51.5887927',
            ],
            [
                'id' => 182,
                'province_id' => 4,

                'name' => 'گزبرخوار',
                'en_name' => 'Gazborkhar',
                'latitude' => '32.802222',
                'longitude' => '51.621111',
            ],
            [
                'id' => 183,
                'province_id' => 4,

                'name' => 'لای بید',
                'en_name' => 'Laybid',
                'latitude' => '33.4568206',
                'longitude' => '50.6866693',
            ],
            [
                'id' => 184,
                'province_id' => 4,

                'name' => 'میمه',
                'en_name' => 'Meymeh',
                'latitude' => '33.4450491',
                'longitude' => '51.1634588',
            ],
            [
                'id' => 185,
                'province_id' => 4,

                'name' => 'وزوان',
                'en_name' => 'Vazvan',
                'latitude' => '33.4179911',
                'longitude' => '51.173973',
            ],
            [
                'id' => 186,
                'province_id' => 4,

                'name' => 'شهرضا',
                'en_name' => 'Shahreza',
                'latitude' => '31.9996877',
                'longitude' => '51.8287748',
            ],
            [
                'id' => 187,
                'province_id' => 4,

                'name' => 'منظریه',
                'en_name' => 'Manzariyeh',
                'latitude' => '31.9463813',
                'longitude' => '51.8713045',
            ],
            [
                'id' => 188,
                'province_id' => 4,

                'name' => 'داران',
                'en_name' => 'Daran',
                'latitude' => '32.9869573',
                'longitude' => '50.3916379',
            ],
            [
                'id' => 189,
                'province_id' => 4,

                'name' => 'دامنه',
                'en_name' => 'Damaneh',
                'latitude' => '33.0175874',
                'longitude' => '50.4790449',
            ],
            [
                'id' => 190,
                'province_id' => 4,

                'name' => 'برف انبار',
                'en_name' => 'Barf Anbar',
                'latitude' => '32.9952365',
                'longitude' => '50.1757621',
            ],
            [
                'id' => 191,
                'province_id' => 4,

                'name' => 'فریدونشهر',
                'en_name' => 'Fereydun Shahr',
                'latitude' => '32.937186',
                'longitude' => '50.1202939',
            ],
            [
                'id' => 192,
                'province_id' => 4,

                'name' => 'ابریشم',
                'en_name' => 'Abrisham',
                'latitude' => '32.5732304',
                'longitude' => '51.5543745',
            ],
            [
                'id' => 193,
                'province_id' => 4,

                'name' => 'ایمانشهر',
                'en_name' => 'Imanshahr',
                'latitude' => '32.4839242',
                'longitude' => '51.4349304',
            ],
            [
                'id' => 194,
                'province_id' => 4,

                'name' => 'بهاران شهر',
                'en_name' => 'Baharan Shahr',
                'latitude' => '32.6509743',
                'longitude' => '51.7207093',
            ],
            [
                'id' => 195,
                'province_id' => 4,

                'name' => 'پیربکران',
                'en_name' => 'Pir Bakran',
                'latitude' => '32.4674776',
                'longitude' => '51.5390538',
            ],
            [
                'id' => 196,
                'province_id' => 4,

                'name' => 'زازران',
                'en_name' => 'Zazeran',
                'latitude' => '32.595996',
                'longitude' => '51.4839934',
            ],
            [
                'id' => 197,
                'province_id' => 4,

                'name' => 'فلاورجان',
                'en_name' => 'Falavarjan',
                'latitude' => '32.5557814',
                'longitude' => '51.4896153',
            ],
            [
                'id' => 198,
                'province_id' => 4,

                'name' => 'قهدریجان',
                'en_name' => 'Ghahderijan',
                'latitude' => '32.5688954',
                'longitude' => '51.4095348',
            ],
            [
                'id' => 199,
                'province_id' => 4,

                'name' => 'کلیشاد و سودرجان',
                'en_name' => 'Kelishad and Soderjaan',
                'latitude' => '32.5518585',
                'longitude' => '51.5215873',
            ],
            [
                'id' => 200,
                'province_id' => 4,

                'name' => 'برزک',
                'en_name' => 'Barzok',
                'latitude' => '33.7769941',
                'longitude' => '51.1974042',
            ],
            [
                'id' => 201,
                'province_id' => 4,

                'name' => 'جوشقان قالی',
                'en_name' => 'Josheqaneqali',
                'latitude' => '33.5560138',
                'longitude' => '51.1353468',
            ],
            [
                'id' => 202,
                'province_id' => 4,

                'name' => 'قمصر',
                'en_name' => 'Ghamsar',
                'latitude' => '33.7406642',
                'longitude' => '51.4100073',
            ],
            [
                'id' => 203,
                'province_id' => 4,

                'name' => 'کاشان',
                'en_name' => 'Kashan',
                'latitude' => '33.981549',
                'longitude' => '51.3427139',
            ],
            [
                'id' => 204,
                'province_id' => 4,

                'name' => 'جوشقان وكامو',
                'en_name' => 'Jowsheqan va Kamu',
                'latitude' => '33.600000',
                'longitude' => '51.233333',
            ],
            [
                'id' => 205,
                'province_id' => 4,

                'name' => 'مشکات',
                'en_name' => 'Mashkat',
                'latitude' => '34.183852',
                'longitude' => '51.2570994',
            ],
            [
                'id' => 206,
                'province_id' => 4,

                'name' => 'نیاسر',
                'en_name' => 'Niasar',
                'latitude' => '33.977457',
                'longitude' => '51.1412285',
            ],
            [
                'id' => 207,
                'province_id' => 4,

                'name' => 'گلپایگان',
                'en_name' => 'Golpayegan',
                'latitude' => '33.4572497',
                'longitude' => '50.2339016',
            ],
            [
                'id' => 208,
                'province_id' => 4,

                'name' => 'گلشهر',
                'en_name' => 'Golshahr',
                'latitude' => '33.505957',
                'longitude' => '50.4527807',
            ],
            [
                'id' => 209,
                'province_id' => 4,

                'name' => 'گوگد',
                'en_name' => 'Googad',
                'latitude' => '33.4763767',
                'longitude' => '50.344237',
            ],
            [
                'id' => 210,
                'province_id' => 4,

                'name' => 'باغ بهادران',
                'en_name' => 'Baghbahadoran',
                'latitude' => '32.3787285',
                'longitude' => '51.1819124',
            ],
            [
                'id' => 211,
                'province_id' => 4,

                'name' => 'باغشاد',
                'en_name' => 'Baghshad',
                'latitude' => '32.382261',
                'longitude' => '51.2294413',
            ],
            [
                'id' => 212,
                'province_id' => 4,

                'name' => 'چرمهین',
                'en_name' => 'Chermahin',
                'latitude' => '32.3243343',
                'longitude' => '51.143245',
            ],
            [
                'id' => 213,
                'province_id' => 4,

                'name' => 'چمگردان',
                'en_name' => 'Chamgordan',
                'latitude' => '32.3929167',
                'longitude' => '51.3308286',
            ],
            [
                'id' => 214,
                'province_id' => 4,

                'name' => 'زاینده رود',
                'en_name' => 'Zayandehrod',
                'latitude' => '32.3825772',
                'longitude' => '51.25747',
            ],
            [
                'id' => 215,
                'province_id' => 4,

                'name' => 'زرین شهر',
                'en_name' => 'Zarinshahr',
                'latitude' => '32.4117636',
                'longitude' => '51.3631862',
            ],
            [
                'id' => 216,
                'province_id' => 4,

                'name' => 'سده لنجان',
                'en_name' => 'Sedeh Lenjan',
                'latitude' => '32.3744779',
                'longitude' => '51.309124',
            ],
            [
                'id' => 217,
                'province_id' => 4,

                'name' => 'فولادشهر',
                'en_name' => 'Fooladshahr',
                'latitude' => '32.5254951',
                'longitude' => '51.2963009',
            ],
            [
                'id' => 218,
                'province_id' => 4,

                'name' => 'ورنامخواست',
                'en_name' => 'Varnamkhast',
                'latitude' => '32.3552212',
                'longitude' => '51.3720596',
            ],
            [
                'id' => 219,
                'province_id' => 4,

                'name' => 'دیزیچه',
                'en_name' => 'Diziche',
                'latitude' => '32.4043349',
                'longitude' => '51.4847655',
            ],
            [
                'id' => 220,
                'province_id' => 4,

                'name' => 'زیباشهر',
                'en_name' => 'Zibashahr',
                'latitude' => '32.3868081',
                'longitude' => '51.5448259',
            ],
            [
                'id' => 221,
                'province_id' => 4,

                'name' => 'طالخونچه',
                'en_name' => 'Talkhooncheh',
                'latitude' => '32.2499931',
                'longitude' => '51.5188403',
            ],
            [
                'id' => 222,
                'province_id' => 4,

                'name' => 'کرکوند',
                'en_name' => 'Karkevand',
                'latitude' => '32.3422788',
                'longitude' => '51.4375161',
            ],
            [
                'id' => 223,
                'province_id' => 4,

                'name' => 'مبارکه',
                'en_name' => 'Mobarakeh',
                'latitude' => '32.3495215',
                'longitude' => '51.4788216',
            ],
            [
                'id' => 224,
                'province_id' => 4,

                'name' => 'مجلسی',
                'en_name' => 'Majlesi',
                'latitude' => '32.1953678',
                'longitude' => '51.483693',
            ],
            [
                'id' => 225,
                'province_id' => 4,

                'name' => 'انارک',
                'en_name' => 'Anarak',
                'latitude' => '33.3070206',
                'longitude' => '53.687675',
            ],
            [
                'id' => 226,
                'province_id' => 4,

                'name' => 'بافران',
                'en_name' => 'Bafrān',
                'latitude' => '32.8393832',
                'longitude' => '53.1366205',
            ],
            [
                'id' => 227,
                'province_id' => 4,

                'name' => 'نایین',
                'en_name' => 'Naein',
                'latitude' => '32.8614894',
                'longitude' => '53.074436',
            ],
            [
                'id' => 228,
                'province_id' => 4,

                'name' => 'جوزدان',
                'en_name' => 'Jowzdan',
                'latitude' => '32.5560172',
                'longitude' => '51.356964',
            ],
            [
                'id' => 229,
                'province_id' => 4,

                'name' => 'دهق',
                'en_name' => 'Dehagh',
                'latitude' => '33.1072833',
                'longitude' => '50.9389684',
            ],
            [
                'id' => 230,
                'province_id' => 4,

                'name' => 'علویجه',
                'en_name' => 'Alavijeh',
                'latitude' => '33.0516901',
                'longitude' => '51.0599254',
            ],
            [
                'id' => 231,
                'province_id' => 4,

                'name' => 'کهریزسنگ',
                'en_name' => 'Kahrizsang',
                'latitude' => '32.6325252',
                'longitude' => '51.4680719',
            ],
            [
                'id' => 232,
                'province_id' => 4,

                'name' => 'گلدشت',
                'en_name' => 'Goldasht',
                'latitude' => '32.6217327',
                'longitude' => '51.4273773',
            ],
            [
                'id' => 233,
                'province_id' => 4,

                'name' => 'نجف آباد',
                'en_name' => 'Najafabad',
                'latitude' => '32.6441659',
                'longitude' => '51.3149065',
            ],
            [
                'id' => 234,
                'province_id' => 4,

                'name' => 'بادرود',
                'en_name' => 'Badroud',
                'latitude' => '33.6893967',
                'longitude' => '51.9978082',
            ],
            [
                'id' => 235,
                'province_id' => 4,

                'name' => 'خالدآباد',
                'en_name' => 'Khaled Abad',
                'latitude' => '33.7007161',
                'longitude' => '51.9828843',
            ],
            [
                'id' => 236,
                'province_id' => 4,

                'name' => 'طرق رود',
                'en_name' => 'Tarq Rud',
                'latitude' => '33.3468269',
                'longitude' => '51.7911439',
            ],
            [
                'id' => 237,
                'province_id' => 4,

                'name' => 'نطنز',
                'en_name' => 'Natanz',
                'latitude' => '33.5092644',
                'longitude' => '51.8939208',
            ],
            [
                'id' => 238,
                'province_id' => 5,

                'name' => 'اشتهارد',
                'en_name' => 'Eshtehard',
                'latitude' => '35.7212279',
                'longitude' => '50.3482495',
            ],
            [
                'id' => 239,
                'province_id' => 5,

                'name' => 'چهارباغ',
                'en_name' => 'Charbagh',
                'latitude' => '35.8406028',
                'longitude' => '50.839448',
            ],
            [
                'id' => 240,
                'province_id' => 5,

                'name' => 'شهرجدیدهشتگرد',
                'en_name' => 'Hashtgerd New City',
                'latitude' => '35.9832727',
                'longitude' => '50.6852096',
            ],
            [
                'id' => 241,
                'province_id' => 5,

                'name' => 'کوهسار',
                'en_name' => 'Koohsar',
                'latitude' => '35.9624264',
                'longitude' => '50.7757828',
            ],
            [
                'id' => 242,
                'province_id' => 5,

                'name' => 'گلسار',
                'en_name' => 'Golsar',
                'latitude' => '35.907778',
                'longitude' => '50.782500',
            ],
            [
                'id' => 243,
                'province_id' => 5,

                'name' => 'هشتگرد',
                'en_name' => 'Hashtgerd',
                'latitude' => '35.961944',
                'longitude' => '50.68',
            ],
            [
                'id' => 244,
                'province_id' => 5,

                'name' => 'طالقان',
                'en_name' => 'Taleqan',
                'latitude' => '36.2142469',
                'longitude' => '50.5065164',
            ],
            [
                'id' => 245,
                'province_id' => 5,

                'name' => 'فردیس',
                'en_name' => 'Fardis',
                'latitude' => '35.724722',
                'longitude' => '50.988333',
            ],
            [
                'id' => 246,
                'province_id' => 5,

                'name' => 'مشکین دشت',
                'en_name' => 'Fardis',
                'latitude' => '35.724722',
                'longitude' => '50.988333',
            ],
            [
                'id' => 247,
                'province_id' => 5,

                'name' => 'آسارا',
                'en_name' => 'Asara',
                'latitude' => '36.0391312',
                'longitude' => '51.1908709',
            ],
            [
                'id' => 248,
                'province_id' => 5,

                'name' => 'کرج',
                'en_name' => 'Karaj',
                'latitude' => '35.8109689',
                'longitude' => '50.877297',
            ],
            [
                'id' => 249,
                'province_id' => 5,

                'name' => 'کمال شهر',
                'en_name' => 'Kamalshahr',
                'latitude' => '35.8823936',
                'longitude' => '50.8434385',
            ],
            [
                'id' => 250,
                'province_id' => 5,

                'name' => 'گرمدره',
                'en_name' => 'Garmdareh',
                'latitude' => '35.7537176',
                'longitude' => '51.0470722',
            ],
            [
                'id' => 251,
                'province_id' => 5,

                'name' => 'ماهدشت',
                'en_name' => 'Mahdasht',
                'latitude' => '35.720408',
                'longitude' => '50.7663625',
            ],
            [
                'id' => 252,
                'province_id' => 5,

                'name' => 'محمدشهر',
                'en_name' => 'Mohammad Shahr',
                'latitude' => '35.7446897',
                'longitude' => '50.8722777',
            ],
            [
                'id' => 253,
                'province_id' => 5,

                'name' => 'تنکمان',
                'en_name' => 'Tankaman',
                'latitude' => '35.8915441',
                'longitude' => '50.6059134',
            ],
            [
                'id' => 254,
                'province_id' => 5,

                'name' => 'نظرآباد',
                'en_name' => 'Nazarabad',
                'latitude' => '35.9676779',
                'longitude' => '50.5694241',
            ],
            [
                'id' => 255,
                'province_id' => 6,

                'name' => 'آبدانان',
                'en_name' => 'Abdanan',
                'latitude' => '32.9935445',
                'longitude' => '47.4037312',
            ],
            [
                'id' => 256,
                'province_id' => 6,

                'name' => 'سراب باغ',
                'en_name' => 'Sarabbagh',
                'latitude' => '32.8985604',
                'longitude' => '47.5703287',
            ],
            [
                'id' => 257,
                'province_id' => 6,

                'name' => 'مورموری',
                'en_name' => 'Murmuri ',
                'latitude' => '32.7254681',
                'longitude' => '47.6674461',
            ],
            [
                'id' => 258,
                'province_id' => 6,

                'name' => 'ایلام',
                'en_name' => 'Ilam',
                'latitude' => '33.6369193',
                'longitude' => '46.396498',
            ],
            [
                'id' => 259,
                'province_id' => 6,

                'name' => 'چوار',
                'en_name' => 'Chovar',
                'latitude' => '33.6952265',
                'longitude' => '46.2929963',
            ],
            [
                'id' => 260,
                'province_id' => 6,

                'name' => 'ایوان',
                'en_name' => 'Eyvan',
                'latitude' => '33.8282489',
                'longitude' => '46.290314',
            ],
            [
                'id' => 261,
                'province_id' => 6,

                'name' => 'زرنه',
                'en_name' => 'Zarneh',
                'latitude' => '33.9286369',
                'longitude' => '46.1787556',
            ],
            [
                'id' => 262,
                'province_id' => 6,

                'name' => 'بدره',
                'en_name' => 'Bedreh',
                'latitude' => '33.3066261',
                'longitude' => '47.0296812',
            ],
            [
                'id' => 263,
                'province_id' => 6,

                'name' => 'آسمان آباد',
                'en_name' => 'Aseman Abad',
                'latitude' => '33.8518245',
                'longitude' => '46.4440006',
            ],
            [
                'id' => 264,
                'province_id' => 6,

                'name' => 'بلاوه',
                'en_name' => 'Balavah Tareh',
                'latitude' => '33.6669007',
                'longitude' => '46.802435',
            ],
            [
                'id' => 265,
                'province_id' => 6,

                'name' => 'توحید',
                'en_name' => 'Tohid',
                'latitude' => '33.7255',
                'longitude' => '47.0685',
            ],
            [
                'id' => 266,
                'province_id' => 6,

                'name' => 'سرابله',
                'en_name' => 'Sarableh',
                'latitude' => '33.7657773',
                'longitude' => '46.5464358',
            ],
            [
                'id' => 267,
                'province_id' => 6,

                'name' => 'شباب',
                'en_name' => 'Shabab',
                'latitude' => '33.748786',
                'longitude' => '46.6322851',
            ],
            [
                'id' => 268,
                'province_id' => 6,

                'name' => 'دره شهر',
                'en_name' => 'Darreh Shahr',
                'latitude' => '33.1432967',
                'longitude' => '47.3680686',
            ],
            [
                'id' => 269,
                'province_id' => 6,

                'name' => 'ماژین',
                'en_name' => 'Mazhin',
                'latitude' => '32.9529715',
                'longitude' => '47.7809572',
            ],
            [
                'id' => 270,
                'province_id' => 6,

                'name' => 'پهله',
                'en_name' => 'Pahleh',
                'latitude' => '33.0105976',
                'longitude' => '46.8792736',
            ],
            [
                'id' => 271,
                'province_id' => 6,

                'name' => 'دهلران',
                'en_name' => 'Dehloran',
                'latitude' => '32.6910709',
                'longitude' => '47.2526263',
            ],
            [
                'id' => 272,
                'province_id' => 6,

                'name' => 'موسیان',
                'en_name' => 'Mousiyan',
                'latitude' => '32.5186816',
                'longitude' => '47.3681008',
            ],
            [
                'id' => 273,
                'province_id' => 6,

                'name' => 'میمه',
                'en_name' => 'Maymeh',
                'latitude' => '33.2278825',
                'longitude' => '46.9129192',
            ],
            [
                'id' => 274,
                'province_id' => 6,

                'name' => 'لومار',
                'en_name' => 'Loumar',
                'latitude' => '33.5678776',
                'longitude' => '46.8051374',
            ],
            [
                'id' => 275,
                'province_id' => 6,

                'name' => 'ارکواز',
                'en_name' => 'Arkavaz',
                'latitude' => '33.3854405',
                'longitude' => '46.5757868',
            ],
            [
                'id' => 276,
                'province_id' => 6,

                'name' => 'دلگشا',
                'en_name' => 'Delgosha',
                'latitude' => '33.4063312',
                'longitude' => '46.589756',
            ],
            [
                'id' => 277,
                'province_id' => 6,

                'name' => 'مهر',
                'en_name' => 'Mehr',
                'latitude' => '33.436944',
                'longitude' => '46.461111',
            ],
            [
                'id' => 278,
                'province_id' => 6,

                'name' => 'صالح آباد',
                'en_name' => 'Saleh Abad',
                'latitude' => '33.4715794',
                'longitude' => '46.1818457',
            ],
            [
                'id' => 279,
                'province_id' => 6,

                'name' => 'مهران',
                'en_name' => 'Mehran',
                'latitude' => '33.1216733',
                'longitude' => '46.156268',
            ],
            [
                'id' => 280,
                'province_id' => 7,

                'name' => 'بوشهر',
                'en_name' => 'Bandar Bushehr',
                'latitude' => '28.9109022',
                'longitude' => '50.8300213',
            ],
            [
                'id' => 281,
                'province_id' => 7,

                'name' => 'چغادک',
                'en_name' => 'Choghadak',
                'latitude' => '28.9800495',
                'longitude' => '51.0075768',
            ],
            [
                'id' => 282,
                'province_id' => 7,

                'name' => 'خارک',
                'en_name' => 'Kharg',
                'latitude' => '29.240592',
                'longitude' => '50.2742281',
            ],
            [
                'id' => 283,
                'province_id' => 7,

                'name' => 'عالی شهر',
                'en_name' => 'Alishahr',
                'latitude' => '28.9307929',
                'longitude' => '51.0560846',
            ],
            [
                'id' => 284,
                'province_id' => 7,

                'name' => 'آباد',
                'en_name' => 'Abad',
                'latitude' => '29.0299414',
                'longitude' => '51.2343548',
            ],
            [
                'id' => 285,
                'province_id' => 7,

                'name' => 'اهرم',
                'en_name' => 'Ahram',
                'latitude' => '28.8814835',
                'longitude' => '51.2567351',
            ],
            [
                'id' => 286,
                'province_id' => 7,

                'name' => 'دلوار',
                'en_name' => 'Delvar',
                'latitude' => '28.752796',
                'longitude' => '51.0519216',
            ],
            [
                'id' => 287,
                'province_id' => 7,

                'name' => 'انارستان',
                'en_name' => 'Anarestan',
                'latitude' => '28.0324211',
                'longitude' => '52.0589518',
            ],
            [
                'id' => 288,
                'province_id' => 7,

                'name' => 'جم',
                'en_name' => 'Jam',
                'latitude' => '27.8157256',
                'longitude' => '52.3099845',
            ],
            [
                'id' => 289,
                'province_id' => 7,

                'name' => 'ریز',
                'en_name' => 'Riz',
                'latitude' => '28.0515676',
                'longitude' => '52.0643592',
            ],
            [
                'id' => 290,
                'province_id' => 7,

                'name' => 'آب پخش',
                'en_name' => 'Ab Pakhsh',
                'latitude' => '29.3678855',
                'longitude' => '51.0514067',
            ],
            [
                'id' => 291,
                'province_id' => 7,

                'name' => 'برازجان',
                'en_name' => 'Borazjan',
                'latitude' => '29.2686851',
                'longitude' => '51.1801094',
            ],
            [
                'id' => 292,
                'province_id' => 7,

                'name' => 'بوشکان',
                'en_name' => 'Boshkan',
                'latitude' => '28.8316659',
                'longitude' => '51.6911458',
            ],
            [
                'id' => 293,
                'province_id' => 7,

                'name' => 'تنگ ارم',
                'en_name' => 'Tang Eram',
                'latitude' => '29.1533226',
                'longitude' => '51.5183258',
            ],
            [
                'id' => 294,
                'province_id' => 7,

                'name' => 'دالکی',
                'en_name' => 'Dalaki',
                'latitude' => '29.4302345',
                'longitude' => '51.2827956',
            ],
            [
                'id' => 295,
                'province_id' => 7,

                'name' => 'سعد آباد',
                'en_name' => 'Sadabad',
                'latitude' => '29.3858015',
                'longitude' => '51.1117458',
            ],
            [
                'id' => 296,
                'province_id' => 7,

                'name' => 'شبانکاره',
                'en_name' => 'Shaban Kareh',
                'latitude' => '29.4708158',
                'longitude' => '50.9754895',
            ],
            [
                'id' => 297,
                'province_id' => 7,

                'name' => 'کلمه',
                'en_name' => 'Kalameh',
                'latitude' => '28.9404761',
                'longitude' => '51.4517747',
            ],
            [
                'id' => 298,
                'province_id' => 7,

                'name' => 'وحدتیه',
                'en_name' => 'Vahdatiyeh',
                'latitude' => '29.4864514',
                'longitude' => '51.2183044',
            ],
            [
                'id' => 299,
                'province_id' => 7,

                'name' => 'بادوله',
                'en_name' => 'Baduleh',
                'latitude' => '28.3972136',
                'longitude' => '51.4933276',
            ],
            [
                'id' => 300,
                'province_id' => 7,

                'name' => 'خورموج',
                'en_name' => 'Khormoj',
                'latitude' => '28.6484069',
                'longitude' => '51.3509552',
            ],
            [
                'id' => 301,
                'province_id' => 7,

                'name' => 'شنبه',
                'en_name' => 'Shonbeh',
                'latitude' => '28.3959397',
                'longitude' => '51.7543388',
            ],
            [
                'id' => 302,
                'province_id' => 7,

                'name' => 'کاکی',
                'en_name' => 'Kaki',
                'latitude' => '28.3416275',
                'longitude' => '51.5062664',
            ],
            [
                'id' => 303,
                'province_id' => 7,

                'name' => 'آبدان',
                'en_name' => 'Konar Torshan',
                'latitude' => '28.0780152',
                'longitude' => '51.7425425',
            ],
            [
                'id' => 304,
                'province_id' => 7,

                'name' => 'بردخون',
                'en_name' => 'Bord Khun',
                'latitude' => '28.0642175',
                'longitude' => '51.4734279',
            ],
            [
                'id' => 305,
                'province_id' => 7,

                'name' => 'بردستان',
                'en_name' => 'Bardestan',
                'latitude' => '27.870064',
                'longitude' => '51.9412563',
            ],
            [
                'id' => 306,
                'province_id' => 7,

                'name' => 'بندردیر',
                'en_name' => 'Dayyer',
                'latitude' => '27.8428687',
                'longitude' => '51.9183272',
            ],
            [
                'id' => 307,
                'province_id' => 7,

                'name' => 'دوراهک',
                'en_name' => 'Dorahak',
                'latitude' => '27.9485962',
                'longitude' => '51.9529294',
            ],
            [
                'id' => 308,
                'province_id' => 7,

                'name' => 'امام حسن',
                'en_name' => 'Imam Hassan',
                'latitude' => '29.8425',
                'longitude' => '50.263056',
            ],
            [
                'id' => 309,
                'province_id' => 7,

                'name' => 'بندردیلم',
                'en_name' => 'Bandar Deylam',
                'latitude' => '30.0609711',
                'longitude' => '50.1461718',
            ],
            [
                'id' => 310,
                'province_id' => 7,

                'name' => 'عسلویه',
                'en_name' => 'Asaluyeh',
                'latitude' => '27.476064',
                'longitude' => '52.6038909',
            ],
            [
                'id' => 311,
                'province_id' => 7,

                'name' => 'نخل تقی',
                'en_name' => 'Nakhl Taghi',
                'latitude' => '27.5003525',
                'longitude' => '52.5763438',
            ],
            [
                'id' => 312,
                'province_id' => 7,

                'name' => 'بندرکنگان',
                'en_name' => 'Bandar-e Kangan',
                'latitude' => '27.8328872',
                'longitude' => '52.0370751',
            ],
            [
                'id' => 313,
                'province_id' => 7,

                'name' => 'بنک',
                'en_name' => 'Banak',
                'latitude' => '27.8625981',
                'longitude' => '52.0010374',
            ],
            [
                'id' => 314,
                'province_id' => 7,

                'name' => 'سیراف',
                'en_name' => 'BandarSiraf',
                'latitude' => '27.664428',
                'longitude' => '52.3255203',
            ],
            [
                'id' => 315,
                'province_id' => 7,

                'name' => 'بندرریگ',
                'en_name' => 'Bandar Rig',
                'latitude' => '29.4841739',
                'longitude' => '50.6186914',
            ],
            [
                'id' => 316,
                'province_id' => 7,

                'name' => 'بندرگناوه',
                'en_name' => 'Bandar Ganaveh',
                'latitude' => '29.5838591',
                'longitude' => '50.4762977',
            ],
            [
                'id' => 317,
                'province_id' => 8,

                'name' => 'احمد آباد مستوفي',
                'en_name' => 'Ahmadabad-E Mostowfi',
                'latitude' => '35.6351851',
                'longitude' => '51.203692',
            ],
            [
                'id' => 318,
                'province_id' => 8,

                'name' => 'اسلامشهر',
                'en_name' => 'Eslamshahr',
                'latitude' => '35.5826021',
                'longitude' => '51.1218216',
            ],
            [
                'id' => 319,
                'province_id' => 8,

                'name' => 'چهاردانگه',
                'en_name' => 'Chahar Dangeh',
                'latitude' => '35.596159 ',
                'longitude' => '51.315565',
            ],
            [
                'id' => 320,
                'province_id' => 8,

                'name' => 'صالحيه',
                'en_name' => 'salehie',
                'latitude' => '35.5999212',
                'longitude' => '51.2827227',
            ],
            [
                'id' => 321,
                'province_id' => 8,

                'name' => 'گلستان',
                'en_name' => 'Golestan',
                'latitude' => '35.5207449',
                'longitude' => '51.170175',
            ],
            [
                'id' => 322,
                'province_id' => 8,

                'name' => 'نسيم شهر',
                'en_name' => 'Nasimshahr',
                'latitude' => '35.5638588',
                'longitude' => '51.1396836',
            ],
            [
                'id' => 323,
                'province_id' => 8,

                'name' => 'پاکدشت',
                'en_name' => 'Pakdasht',
                'latitude' => '35.4449805',
                'longitude' => '51.6195967',
            ],
            [
                'id' => 324,
                'province_id' => 8,

                'name' => 'شريف آباد',
                'en_name' => 'Sharifabad',
                'latitude' => '35.4273131',
                'longitude' => '51.768608',
            ],
            [
                'id' => 325,
                'province_id' => 8,

                'name' => 'فرون اباد',
                'en_name' => 'Ferunabad',
                'latitude' => '35.5145631',
                'longitude' => '51.6100732',
            ],
            [
                'id' => 326,
                'province_id' => 8,

                'name' => 'بومهن',
                'en_name' => 'Bumehen',
                'latitude' => '35.733646',
                'longitude' => '51.868124',
            ],
            [
                'id' => 327,
                'province_id' => 8,

                'name' => 'پرديس',
                'en_name' => 'Pardis',
                'latitude' => '35.741701',
                'longitude' => '51.780801',
            ],
            [
                'id' => 328,
                'province_id' => 8,

                'name' => 'پيشوا',
                'en_name' => 'Pishva',
                'latitude' => '35.307785',
                'longitude' => '51.730872',
            ],
            [
                'id' => 329,
                'province_id' => 8,

                'name' => 'تهران',
                'en_name' => 'Tehran',
                'latitude' => '35.689198 ',
                'longitude' => '51.388974',
            ],
            [
                'id' => 330,
                'province_id' => 8,

                'name' => 'آبسرد',
                'en_name' => 'Absard',
                'latitude' => '35.6293144',
                'longitude' => '52.1340745',
            ],
            [
                'id' => 331,
                'province_id' => 8,

                'name' => 'آبعلي',
                'en_name' => 'Abali',
                'latitude' => '35.767596',
                'longitude' => '51.9412993',
            ],
            [
                'id' => 332,
                'province_id' => 8,

                'name' => 'دماوند',
                'en_name' => 'Damavand',
                'latitude' => '35.7086615',
                'longitude' => '52.0100624',
            ],
            [
                'id' => 333,
                'province_id' => 8,

                'name' => 'رودهن',
                'en_name' => 'Rudehen',
                'latitude' => '35.7338129',
                'longitude' => '51.8981265',
            ],
            [
                'id' => 334,
                'province_id' => 8,

                'name' => 'کيلان',
                'en_name' => 'Kilan',
                'latitude' => '35.5526704',
                'longitude' => '52.1162218',
            ],
            [
                'id' => 335,
                'province_id' => 8,

                'name' => 'پرند',
                'en_name' => 'Parand',
                'latitude' => '35.4902611',
                'longitude' => '50.9181541',
            ],
            [
                'id' => 336,
                'province_id' => 8,

                'name' => 'رباطکريم',
                'en_name' => 'Robat Karim',
                'latitude' => '35.4752344',
                'longitude' => '51.0473293',
            ],
            [
                'id' => 337,
                'province_id' => 8,

                'name' => 'نصيرشهر',
                'en_name' => 'Nasirshahr',
                'latitude' => '35.4903116',
                'longitude' => '51.1323023',
            ],
            [
                'id' => 338,
                'province_id' => 8,

                'name' => 'باقرشهر',
                'en_name' => 'Baghershahr',
                'latitude' => '35.5335618',
                'longitude' => '51.3954691',
            ],
            [
                'id' => 339,
                'province_id' => 8,

                'name' => 'حسن آباد',
                'en_name' => 'Hasanabad',
                'latitude' => '35.3695228',
                'longitude' => '51.2215231',
            ],  [
                'id' => 340,
                'province_id' => 8,

                'name' => 'شهرري',
                'en_name' => 'Shahr-e-Rey',
                'latitude' => '35.5725813',
                'longitude' => '51.4233648',
            ],
            [
                'id' => 341,
                'province_id' => 8,

                'name' => 'کهريزک',
                'en_name' => 'Kahrizak',
                'latitude' => '35.5168394',
                'longitude' => '51.3507842',
            ],
            [
                'id' => 342,
                'province_id' => 8,

                'name' => 'تجريش',
                'en_name' => 'Tajrish',
                'latitude' => '35.8046493',
                'longitude' => '51.4313206',
            ],
            [
                'id' => 343,
                'province_id' => 8,

                'name' => 'شمشک',
                'en_name' => 'Shemshak',
                'latitude' => '36.0112867',
                'longitude' => '51.486547',
            ],
            [
                'id' => 344,
                'province_id' => 8,

                'name' => 'فشم',
                'en_name' => 'Fasham',
                'latitude' => '35.9317215',
                'longitude' => '51.511309',
            ],
            [
                'id' => 345,
                'province_id' => 8,

                'name' => 'لواسان',
                'en_name' => 'Lavasan',
                'latitude' => '35.8232502',
                'longitude' => '51.60526',
            ],
            [
                'id' => 346,
                'province_id' => 8,

                'name' => 'انديشه',
                'en_name' => 'Andisheh',
                'latitude' => '35.7468945',
                'longitude' => '51.2690735',
            ],
            [
                'id' => 347,
                'province_id' => 8,

                'name' => 'باغستان',
                'en_name' => 'Baghestan',
                'latitude' => '35.6424709',
                'longitude' => '51.0802008',
            ],
            [
                'id' => 348,
                'province_id' => 8,

                'name' => 'شاهدشهر',
                'en_name' => 'Shahedshahr',
                'latitude' => '35.5726924',
                'longitude' => '51.0788298',
            ],
            [
                'id' => 349,
                'province_id' => 8,

                'name' => 'شهريار',
                'en_name' => 'Shahriar',
                'latitude' => '35.6591813',
                'longitude' => '51.0068091',
            ],
            [
                'id' => 350,
                'province_id' => 8,

                'name' => 'صباشهر',
                'en_name' => 'Sabashahr',
                'latitude' => '35.5832376',
                'longitude' => '51.0814684',
            ],
            [
                'id' => 351,
                'province_id' => 8,

                'name' => 'فردوسيه',
                'en_name' => 'Ferdosiye',
                'latitude' => '35.5972932',
                'longitude' => '51.0240263',
            ],
            [
                'id' => 352,
                'province_id' => 8,

                'name' => 'وحيديه',
                'en_name' => 'Vahidieh',
                'latitude' => '35.6048346',
                'longitude' => '51.0162591',
            ],
            [
                'id' => 353,
                'province_id' => 8,

                'name' => 'ارجمند',
                'en_name' => 'Arjmand',
                'latitude' => '35.8140017',
                'longitude' => '52.5035333',
            ],
            [
                'id' => 354,
                'province_id' => 8,

                'name' => 'فيروزکوه',
                'en_name' => 'Firuzkuh',
                'latitude' => '35.7570281',
                'longitude' => '52.7556218',
            ],
            [
                'id' => 355,
                'province_id' => 8,

                'name' => 'قدس',
                'en_name' => 'Qods',
                'latitude' => '35.7106874',
                'longitude' => '51.0791081',
            ],
            [
                'id' => 356,
                'province_id' => 8,

                'name' => 'قرچک',
                'en_name' => 'Qarchak',
                'latitude' => '35.437052',
                'longitude' => '51.5580653',
            ],
            [
                'id' => 357,
                'province_id' => 8,

                'name' => 'صفادشت',
                'en_name' => 'Safadasht',
                'latitude' => '35.684489',
                'longitude' => '50.824658',
            ],
            [
                'id' => 358,
                'province_id' => 8,

                'name' => 'ملارد',
                'en_name' => 'Malard',
                'latitude' => '35.6794086',
                'longitude' => '50.9456843',
            ],
            [
                'id' => 359,
                'province_id' => 8,

                'name' => 'جوادآباد',
                'en_name' => 'Javadabad',
                'latitude' => '35.2102001',
                'longitude' => '51.6727752',
            ],
            [
                'id' => 360,
                'province_id' => 8,

                'name' => 'ورامين',
                'en_name' => 'Varamin',
                'latitude' => '35.3448727',
                'longitude' => '51.6078465',
            ],
            [
                'id' => 361,
                'province_id' => 9,

                'name' => 'اردل',
                'en_name' => 'Ardal',
                'latitude' => '32.0050106',
                'longitude' => '50.6147855',
            ],
            [
                'id' => 362,
                'province_id' => 9,

                'name' => 'دشتک',
                'en_name' => 'Dashtak',
                'latitude' => '32.1626072',
                'longitude' => '50.4499268',
            ],
            [
                'id' => 363,
                'province_id' => 9,

                'name' => 'سرخون',
                'en_name' => 'SarKhun',
                'latitude' => '31.745777',
                'longitude' => '50.5409289',
            ],
            [
                'id' => 364,
                'province_id' => 9,

                'name' => 'کاج',
                'en_name' => 'Kaj',
                'latitude' => '32.0586818',
                'longitude' => '50.5781794',
            ],
            [
                'id' => 365,
                'province_id' => 9,

                'name' => 'بروجن',
                'en_name' => 'Boroujen',
                'latitude' => '31.9726868',
                'longitude' => '51.271562',
            ],
            [
                'id' => 366,
                'province_id' => 9,

                'name' => 'بلداجی',
                'en_name' => 'Boldaji',
                'latitude' => '31.9367756',
                'longitude' => '51.0445833',
            ],
            [
                'id' => 367,
                'province_id' => 9,

                'name' => 'سفیددشت',
                'en_name' => 'Sefiddasht',
                'latitude' => '32.1322302',
                'longitude' => '51.1742305',
            ],
            [
                'id' => 368,
                'province_id' => 9,

                'name' => 'فرادبنه',
                'en_name' => 'Faradonbeh',
                'latitude' => '32.0096737',
                'longitude' => '51.1997221',
            ],
            [
                'id' => 369,
                'province_id' => 9,

                'name' => 'گندمان',
                'en_name' => 'Gandoman',
                'latitude' => '31.8634868',
                'longitude' => '51.1371087',
            ],
            [
                'id' => 370,
                'province_id' => 9,

                'name' => 'نقنه',
                'en_name' => 'Naghneh',
                'latitude' => '31.9339529',
                'longitude' => '51.3219023',
            ],
            [
                'id' => 371,
                'province_id' => 9,

                'name' => 'بن',
                'en_name' => 'Ben',
                'latitude' => '32.5425',
                'longitude' => '50.744444',
            ],
            [
                'id' => 372,
                'province_id' => 9,

                'name' => 'وردنجان',
                'en_name' => 'Vardanjan ',
                'latitude' => '32.4790374',
                'longitude' => '50.7500552',
            ],
            [
                'id' => 373,
                'province_id' => 9,

                'name' => 'سامان',
                'en_name' => 'Saman',
                'latitude' => '32.4486234',
                'longitude' => '50.9025978',
            ],
            [
                'id' => 374,
                'province_id' => 9,

                'name' => 'سودجان',
                'en_name' => 'Sudejan',
                'latitude' => '32.5214321',
                'longitude' => '50.3962397',
            ],
            [
                'id' => 375,
                'province_id' => 9,

                'name' => 'سورشجان',
                'en_name' => 'Sureshjan',
                'latitude' => '32.317094',
                'longitude' => '50.6711769',
            ],
            [
                'id' => 376,
                'province_id' => 9,

                'name' => 'شهرکرد',
                'en_name' => 'Shahrekord',
                'latitude' => '32.3413062',
                'longitude' => '50.8282466',
            ],
            [
                'id' => 377,
                'province_id' => 9,

                'name' => 'طاقانک',
                'en_name' => 'Taqanak',
                'latitude' => '32.223333',
                'longitude' => '50.838611',
            ],
            [
                'id' => 378,
                'province_id' => 9,

                'name' => 'فرخ شهر',
                'en_name' => 'Farrokhshahr',
                'latitude' => '32.2707605',
                'longitude' => '50.9370797',
            ],
            [
                'id' => 379,
                'province_id' => 9,

                'name' => 'کیان',
                'en_name' => 'ShahrKian',
                'latitude' => '32.2844652',
                'longitude' => '50.8831786',
            ],
            [
                'id' => 380,
                'province_id' => 9,

                'name' => 'نافچ',
                'en_name' => 'Nafch',
                'latitude' => '32.4231154',
                'longitude' => '50.7798814',
            ],
            [
                'id' => 381,
                'province_id' => 9,

                'name' => 'هارونی',
                'en_name' => 'Haarooni',
                'latitude' => '32.392917',
                'longitude' => '50.5665279',
            ],
            [
                'id' => 382,
                'province_id' => 9,

                'name' => 'هفشجان',
                'en_name' => 'Hafshejan',
                'latitude' => '32.225556',
                'longitude' => '50.793889',
            ],
            [
                'id' => 383,
                'province_id' => 9,

                'name' => 'باباحیدر',
                'en_name' => 'Babaheydar',
                'latitude' => '32.330585',
                'longitude' => '50.4596042',
            ],
            [
                'id' => 384,
                'province_id' => 9,

                'name' => 'پردنجان',
                'en_name' => 'Pordanjan',
                'latitude' => '32.2540389',
                'longitude' => '50.5907964',
            ],
            [
                'id' => 385,
                'province_id' => 9,

                'name' => 'جونقان',
                'en_name' => 'Junqan',
                'latitude' => '32.1529787',
                'longitude' => '50.6778503',
            ],
            [
                'id' => 386,
                'province_id' => 9,

                'name' => 'چلیچه',
                'en_name' => 'Choliche',
                'latitude' => '32.2319694',
                'longitude' => '50.6206642',
            ],
            [
                'id' => 387,
                'province_id' => 9,

                'name' => 'فارسان',
                'en_name' => 'Farsan',
                'latitude' => '32.25665',
                'longitude' => '50.5522154',
            ],
            [
                'id' => 388,
                'province_id' => 9,

                'name' => 'گوجان',
                'en_name' => 'Gujan',
                'latitude' => '32.2456188',
                'longitude' => '50.5404568',
            ],
            [
                'id' => 389,
                'province_id' => 9,

                'name' => 'بازفت',
                'en_name' => 'Bazoft',
                'latitude' => '32.2',
                'longitude' => '50.05',
            ],
            [
                'id' => 390,
                'province_id' => 9,

                'name' => 'چلگرد',
                'en_name' => 'Chelgerd',
                'latitude' => '32.4626196',
                'longitude' => '50.123462',
            ],
            [
                'id' => 391,
                'province_id' => 9,

                'name' => 'صمصامی',
                'en_name' => 'Samsami',
                'latitude' => '32.1681112',
                'longitude' => '50.2709054',
            ],
            [
                'id' => 392,
                'province_id' => 9,

                'name' => 'دستنا',
                'en_name' => 'Dastena',
                'latitude' => '32.0588178',
                'longitude' => '50.7610094',
            ],
            [
                'id' => 393,
                'province_id' => 9,

                'name' => 'شلمزار',
                'en_name' => 'Shalamzar ',
                'latitude' => '32.0472056',
                'longitude' => '50.8089995',
            ],
            [
                'id' => 394,
                'province_id' => 9,

                'name' => 'گهرو',
                'en_name' => 'Gahru',
                'latitude' => '32.0080202',
                'longitude' => '50.8771919',
            ],
            [
                'id' => 395,
                'province_id' => 9,

                'name' => 'ناغان',
                'en_name' => 'Naghan',
                'latitude' => '31.9345763',
                'longitude' => '50.7204263',
            ],
            [
                'id' => 396,
                'province_id' => 9,

                'name' => 'آلونی',
                'en_name' => 'Aluni',
                'latitude' => '31.5542191',
                'longitude' => '51.0497224',
            ],
            [
                'id' => 397,
                'province_id' => 9,

                'name' => 'سردشت',
                'en_name' => 'Kal Geh-ye Sardasht',
                'latitude' => '31.395833',
                'longitude' => '50.835833',
            ],
            [
                'id' => 398,
                'province_id' => 9,

                'name' => 'لردگان',
                'en_name' => 'Lordegan',
                'latitude' => '31.5186211',
                'longitude' => '50.7837068',
            ],
            [
                'id' => 399,
                'province_id' => 9,

                'name' => 'مال خلیفه',
                'en_name' => 'Mal-e Khalifeh',
                'latitude' => '31.29168',
                'longitude' => '51.2568212',
            ],
            [
                'id' => 400,
                'province_id' => 9,

                'name' => 'منج',
                'en_name' => 'Menj',
                'latitude' => '31.4846738',
                'longitude' => '50.8730827',
            ],
            [
                'id' => 401,
                'province_id' => 10,

                'name' => 'ارسک',
                'en_name' => 'Eresk',
                'latitude' => '33.7028487',
                'longitude' => '57.3625158',
            ],
            [
                'id' => 402,
                'province_id' => 10,

                'name' => 'بشرویه',
                'en_name' => 'Boshrouyeh',
                'latitude' => '33.8637127',
                'longitude' => '57.4053239',
            ],
            [
                'id' => 403,
                'province_id' => 10,

                'name' => 'بیرجند',
                'en_name' => 'Birjand',
                'latitude' => '32.8706749',
                'longitude' => '59.2069095',
            ],
            [
                'id' => 404,
                'province_id' => 10,

                'name' => 'خوسف',
                'en_name' => 'Khusf',
                'latitude' => '32.7847297',
                'longitude' => '58.8803672',
            ],
            [
                'id' => 405,
                'province_id' => 10,

                'name' => 'محمدشهر',
                'en_name' => 'Mohammad Shahr',
                'latitude' => '35.7447593',
                'longitude' => '50.8722777',
            ],
            [
                'id' => 406,
                'province_id' => 10,

                'name' => 'اسدیه',
                'en_name' => 'Asadieh',
                'latitude' => '32.9138907',
                'longitude' => '60.0149845',
            ],
            [
                'id' => 407,
                'province_id' => 10,

                'name' => 'طبس مسینا',
                'en_name' => 'Tabas Masina',
                'latitude' => '32.8077099',
                'longitude' => '60.2150344',
            ],
            [
                'id' => 408,
                'province_id' => 10,

                'name' => 'قهستان',
                'en_name' => 'Ghohestan',
                'latitude' => '33.151832',
                'longitude' => '59.6968745',
            ],
            [
                'id' => 409,
                'province_id' => 10,

                'name' => 'گزیک',
                'en_name' => 'Gazik',
                'latitude' => '32.9999182',
                'longitude' => '60.2117842',
            ],
            [
                'id' => 410,
                'province_id' => 10,

                'name' => 'حاجی آباد',
                'en_name' => 'Hajiabad',
                'latitude' => '33.6032707',
                'longitude' => '59.9903727',
            ],
            [
                'id' => 411,
                'province_id' => 10,

                'name' => 'زهان',
                'en_name' => 'Zohaan',
                'latitude' => '33.4233197',
                'longitude' => '59.8072744',
            ],
            [
                'id' => 412,
                'province_id' => 10,

                'name' => 'آیسک',
                'en_name' => 'Ayask',
                'latitude' => '33.8866669',
                'longitude' => '58.3690309',
            ],
            [
                'id' => 413,
                'province_id' => 10,

                'name' => 'سرایان',
                'en_name' => 'Sarayan',
                'latitude' => '33.392782',
                'longitude' => '57.7613251',
            ],
            [
                'id' => 414,
                'province_id' => 10,

                'name' => 'سه قلعه',
                'en_name' => 'Seh Qaleh',
                'latitude' => '33.6605271',
                'longitude' => '58.3983062',
            ],
            [
                'id' => 415,
                'province_id' => 10,

                'name' => 'سربیشه',
                'en_name' => 'Sarbishe',
                'latitude' => '32.4908181',
                'longitude' => '59.4876362',
            ],
            [
                'id' => 416,
                'province_id' => 10,

                'name' => 'مود',
                'en_name' => 'Mud',
                'latitude' => '32.7089063',
                'longitude' => '59.5168012',
            ],
            [
                'id' => 417,
                'province_id' => 10,

                'name' => 'دیهوک',
                'en_name' => 'Deyhuk',
                'latitude' => '33.2929958',
                'longitude' => '57.5043725',
            ],
            [
                'id' => 418,
                'province_id' => 10,

                'name' => 'طبس',
                'en_name' => 'Tabas',
                'latitude' => '33.6096045',
                'longitude' => '56.9106383',
            ],
            [
                'id' => 419,
                'province_id' => 10,

                'name' => 'عشق آباد',
                'en_name' => 'Eshqabad',
                'latitude' => '34.366944',
                'longitude' => '56.931111',
            ],
            [
                'id' => 420,
                'province_id' => 10,

                'name' => 'اسلامیه',
                'en_name' => 'Eslamiyeh',
                'latitude' => '34.045556',
                'longitude' => '58.220278',
            ],
            [
                'id' => 421,
                'province_id' => 10,

                'name' => 'فردوس',
                'en_name' => 'Ferdows',
                'latitude' => '34.0194028',
                'longitude' => '58.1541107',
            ],
            [
                'id' => 422,
                'province_id' => 10,

                'name' => 'آرین شهر',
                'en_name' => 'Arian Shahr',
                'latitude' => '33.3314692',
                'longitude' => '59.2293441',
            ],
            [
                'id' => 423,
                'province_id' => 10,

                'name' => 'اسفدن',
                'en_name' => 'Esfedan',
                'latitude' => '33.6461168',
                'longitude' => '59.7709894',
            ],
            [
                'id' => 424,
                'province_id' => 10,

                'name' => 'خضری دشت بیاض',
                'en_name' => 'Khezri Dashtebayaz',
                'latitude' => '34.0211',
                'longitude' => '58.8077974',
            ],
            [
                'id' => 425,
                'province_id' => 10,

                'name' => 'قاین',
                'en_name' => 'Ghayen',
                'latitude' => '33.7248254',
                'longitude' => '59.1432231',
            ],
            [
                'id' => 426,
                'province_id' => 10,

                'name' => 'نیمبلوک',
                'en_name' => 'Nimbolook',
                'latitude' => '33.9116942',
                'longitude' => '58.923626',
            ],
            [
                'id' => 427,
                'province_id' => 10,

                'name' => 'شوسف',
                'en_name' => 'Shusf',
                'latitude' => '31.8055726',
                'longitude' => '59.9981617',
            ],
            [
                'id' => 428,
                'province_id' => 10,

                'name' => 'نهبندان',
                'en_name' => 'Nehbandan',
                'latitude' => '31.4657887',
                'longitude' => '59.1610484',
            ],
            [
                'id' => 429,
                'province_id' => 11,

                'name' => 'باخرز',
                'en_name' => 'Bakharz',
                'latitude' => '34.9934575',
                'longitude' => '60.3058433',
            ],
            [
                'id' => 430,
                'province_id' => 11,

                'name' => 'بجستان',
                'en_name' => 'Bajestan',
                'latitude' => '34.5235913',
                'longitude' => '58.1394761',
            ],
            [
                'id' => 431,
                'province_id' => 11,

                'name' => 'یونسی',
                'en_name' => 'Yunesi',
                'latitude' => '34.805278',
                'longitude' => '58.437500',
            ],
            [
                'id' => 432,
                'province_id' => 11,

                'name' => 'انابد',
                'en_name' => 'Anabad',
                'latitude' => '35.2501746',
                'longitude' => '57.800982',
            ],
            [
                'id' => 433,
                'province_id' => 11,

                'name' => 'بردسکن',
                'en_name' => 'Bardaskan',
                'latitude' => '35.2600531',
                'longitude' => '57.9570436',
            ],
            [
                'id' => 434,
                'province_id' => 11,

                'name' => 'شهراباد',
                'en_name' => 'Shahrabad',
                'latitude' => '32.5738411',
                'longitude' => '50.992706',
            ],
            [
                'id' => 435,
                'province_id' => 11,

                'name' => 'شاندیز',
                'en_name' => 'Shandiz',
                'latitude' => '36.3950569',
                'longitude' => '59.2906486',
            ],
            [
                'id' => 436,
                'province_id' => 11,

                'name' => 'طرقبه',
                'en_name' => 'Torghabeh',
                'latitude' => '36.3147425',
                'longitude' => '59.3676709',
            ],
            [
                'id' => 437,
                'province_id' => 11,

                'name' => 'تایباد',
                'en_name' => 'Taybad',
                'latitude' => '34.7443593',
                'longitude' => '60.7544803',
            ],
            [
                'id' => 438,
                'province_id' => 11,

                'name' => 'کاریز',
                'en_name' => 'Kariz',
                'latitude' => '34.8150162',
                'longitude' => '60.8063648',
            ],
            [
                'id' => 439,
                'province_id' => 11,

                'name' => 'مشهدریزه',
                'en_name' => 'Mashhad Rizeh',
                'latitude' => '34.7956727',
                'longitude' => '60.4977178',
            ],
            [
                'id' => 440,
                'province_id' => 11,

                'name' => 'احمداباد صولت',
                'en_name' => 'Ahmad-abad-e-Solat',
                'latitude' => '35.1151078',
                'longitude' => '60.6845283',
            ],
            [
                'id' => 441,
                'province_id' => 11,

                'name' => 'تربت جام',
                'en_name' => 'Torbat-e-Jam',
                'latitude' => '35.2357736',
                'longitude' => '60.5966801',
            ],
            [
                'id' => 442,
                'province_id' => 11,

                'name' => 'صالح آباد',
                'en_name' => 'Saleh Abad',
                'latitude' => '35.6905628',
                'longitude' => '61.0832119',
            ],
            [
                'id' => 443,
                'province_id' => 11,

                'name' => 'نصرآباد',
                'en_name' => 'Nasrabad',
                'latitude' => '35.417925',
                'longitude' => '60.3056717',
            ],
            [
                'id' => 444,
                'province_id' => 11,

                'name' => 'نیل شهر',
                'en_name' => 'Nil Shahr',
                'latitude' => '35.1252579',
                'longitude' => '60.7657636',
            ],
            [
                'id' => 445,
                'province_id' => 11,

                'name' => 'بایگ',
                'en_name' => 'Bayg',
                'latitude' => '35.3748607',
                'longitude' => '59.0306138',
            ],
            [
                'id' => 446,
                'province_id' => 11,

                'name' => 'تربت حیدریه',
                'en_name' => 'Torbat Heydariyeh',
                'latitude' => '35.2641711',
                'longitude' => '59.1826623',
            ],
            [
                'id' => 447,
                'province_id' => 11,

                'name' => 'رباط سنگ',
                'en_name' => 'Robat-e-Sang',
                'latitude' => '35.5484459',
                'longitude' => '59.186697',
            ],
            [
                'id' => 448,
                'province_id' => 11,

                'name' => 'کدکن',
                'en_name' => 'Kadkan',
                'latitude' => '35.5873956',
                'longitude' => '58.8746595',
            ],
            [
                'id' => 449,
                'province_id' => 11,

                'name' => 'جغتای',
                'en_name' => 'Joghatay',
                'latitude' => '36.6406666',
                'longitude' => '57.0607136',
            ],
            [
                'id' => 450,
                'province_id' => 11,

                'name' => 'نقاب',
                'en_name' => 'Neghab',
                'latitude' => '36.7029164',
                'longitude' => '57.3931573',
            ],
            [
                'id' => 451,
                'province_id' => 11,

                'name' => 'چناران',
                'en_name' => 'Chenaran',
                'latitude' => '36.6412689',
                'longitude' => '59.1034359',
            ],
            [
                'id' => 452,
                'province_id' => 11,

                'name' => 'گلبهار',
                'en_name' => 'Golbahar',
                'latitude' => '36.5636551',
                'longitude' => '59.1391462',
            ],
            [
                'id' => 453,
                'province_id' => 11,

                'name' => 'گلمکان',
                'en_name' => 'Golmakan',
                'latitude' => '36.4825278',
                'longitude' => '59.1548109',
            ],
            [
                'id' => 454,
                'province_id' => 11,

                'name' => 'خلیل آباد',
                'en_name' => 'Khalil Abad',
                'latitude' => '35.253661',
                'longitude' => '58.2791662',
            ],
            [
                'id' => 455,
                'province_id' => 11,

                'name' => 'کندر',
                'en_name' => 'Kondor',
                'latitude' => '35.2120174',
                'longitude' => '58.142438',
            ],
            [
                'id' => 456,
                'province_id' => 11,

                'name' => 'خواف',
                'en_name' => 'Khaf',
                'latitude' => '34.5698972',
                'longitude' => '60.0988191',
            ],
            [
                'id' => 457,
                'province_id' => 11,

                'name' => 'سلامی',
                'en_name' => 'Salami',
                'latitude' => '34.7457199',
                'longitude' => '59.9691295',
            ],
            [
                'id' => 458,
                'province_id' => 11,

                'name' => 'سنگان',
                'en_name' => 'Sangan',
                'latitude' => '34.4005526',
                'longitude' => '60.2538299',
            ],
            [
                'id' => 459,
                'province_id' => 11,

                'name' => 'قاسم آباد',
                'en_name' => 'Qasemabad',
                'latitude' => '35.9101775',
                'longitude' => '58.5759474',
            ],
            [
                'id' => 460,
                'province_id' => 11,

                'name' => 'نشتیفان',
                'en_name' => 'Nashtifan',
                'latitude' => '34.4347326',
                'longitude' => '60.1597807',
            ],
            [
                'id' => 461,
                'province_id' => 11,

                'name' => 'سلطان آباد',
                'en_name' => 'Soltanabad',
                'latitude' => '36.1478469',
                'longitude' => '58.8614202',
            ],
            [
                'id' => 462,
                'province_id' => 11,

                'name' => 'داورزن',
                'en_name' => 'Davarzan',
                'latitude' => '36.3534638',
                'longitude' => '56.8716931',
            ],
            [
                'id' => 463,
                'province_id' => 11,

                'name' => 'چاپشلو',
                'en_name' => 'Chapeshlu',
                'latitude' => '37.3509012',
                'longitude' => '59.069538',
            ],
            [
                'id' => 464,
                'province_id' => 11,

                'name' => 'درگز',
                'en_name' => 'Dargaz',
                'latitude' => '37.44652',
                'longitude' => '59.0902365',
            ],
            [
                'id' => 465,
                'province_id' => 11,

                'name' => 'لطف آباد',
                'en_name' => 'Lotfabad',
                'latitude' => '36.1768725',
                'longitude' => '58.7250351',
            ],
            [
                'id' => 466,
                'province_id' => 11,

                'name' => 'نوخندان',
                'en_name' => 'Nokhandan',
                'latitude' => '37.5183884',
                'longitude' => '58.9801883',
            ],
            [
                'id' => 467,
                'province_id' => 11,

                'name' => 'جنگل',
                'en_name' => 'Jangal',
                'latitude' => '34.7074678',
                'longitude' => '59.2063862',
            ],
            [
                'id' => 468,
                'province_id' => 11,

                'name' => 'رشتخوار',
                'en_name' => 'Rashtkhar',
                'latitude' => '34.9746294',
                'longitude' => '59.6144771',
            ],
            [
                'id' => 469,
                'province_id' => 11,

                'name' => 'دولت آباد',
                'en_name' => 'Dowlat Abad',
                'latitude' => '35.2840396',
                'longitude' => '59.5131111',
            ],
            [
                'id' => 470,
                'province_id' => 11,

                'name' => 'روداب',
                'en_name' => 'Rudab',
                'latitude' => '36.0236779',
                'longitude' => '57.3044729',
            ],
            [
                'id' => 471,
                'province_id' => 11,

                'name' => 'سبزوار',
                'en_name' => 'Sabzevar',
                'latitude' => '36.2396803',
                'longitude' => '57.5738502',
            ],
            [
                'id' => 472,
                'province_id' => 11,

                'name' => 'ششتمد',
                'en_name' => 'Sheshtamad',
                'latitude' => '35.9604289',
                'longitude' => '57.7502773',
            ],
            [
                'id' => 473,
                'province_id' => 11,

                'name' => 'سرخس',
                'en_name' => 'Sarakhs',
                'latitude' => '36.5396707',
                'longitude' => '61.1398171',
            ],
            [
                'id' => 474,
                'province_id' => 11,

                'name' => 'مزدآوند',
                'en_name' => 'Mazdavand',
                'latitude' => '36.1564492',
                'longitude' => '60.5264175',
            ],
            [
                'id' => 475,
                'province_id' => 11,

                'name' => 'سفیدسنگ',
                'en_name' => 'Sefid Sang',
                'latitude' => '35.6621857',
                'longitude' => '60.0859937',
            ],
            [
                'id' => 476,
                'province_id' => 11,

                'name' => 'فرهادگرد',
                'en_name' => 'Farhadgerd',
                'latitude' => '35.7644818',
                'longitude' => '59.7241688',
            ],
            [
                'id' => 477,
                'province_id' => 11,

                'name' => 'فریمان',
                'en_name' => 'Fariman',
                'latitude' => '35.6995609',
                'longitude' => '59.831115',
            ],
            [
                'id' => 478,
                'province_id' => 11,

                'name' => 'قلندرآباد',
                'en_name' => 'Qalandarabad',
                'latitude' => '35.6005376',
                'longitude' => '59.9362562',
            ],
            [
                'id' => 479,
                'province_id' => 11,

                'name' => 'فیروزه',
                'en_name' => 'Firouzeh',
                'latitude' => '36.2828876',
                'longitude' => '58.5676859',
            ],
            [
                'id' => 480,
                'province_id' => 11,

                'name' => 'همت آباد',
                'en_name' => 'Hemmatabad',
                'latitude' => '36.2979042',
                'longitude' => '58.4577392',
            ],
            [
                'id' => 481,
                'province_id' => 11,

                'name' => 'باجگیران',
                'en_name' => 'Bajgiran',
                'latitude' => '37.6213443',
                'longitude' => '58.4160769',
            ],
            [
                'id' => 482,
                'province_id' => 11,

                'name' => 'قوچان',
                'en_name' => 'Quchan',
                'latitude' => '37.1097006',
                'longitude' => '58.4287169',
            ],
            [
                'id' => 483,
                'province_id' => 11,

                'name' => 'ریوش',
                'en_name' => 'Rivash',
                'latitude' => '35.4789304',
                'longitude' => '58.4378241',
            ],
            [
                'id' => 484,
                'province_id' => 11,

                'name' => 'کاشمر',
                'en_name' => 'Kashmar',
                'latitude' => '35.2540163',
                'longitude' => '58.4286398',
            ],
            [
                'id' => 485,
                'province_id' => 11,

                'name' => 'شهرزو',
                'en_name' => 'Shahrezu',
                'latitude' => '36.7490715',
                'longitude' => '59.9274159',
            ],
            [
                'id' => 486,
                'province_id' => 11,

                'name' => 'کلات',
                'en_name' => 'Kalat',
                'latitude' => '36.9970675',
                'longitude' => '59.733846',
            ],
            [
                'id' => 487,
                'province_id' => 11,

                'name' => 'بیدخت',
                'en_name' => 'Beydokht',
                'latitude' => '34.3477914',
                'longitude' => '58.7476621',
            ],
            [
                'id' => 488,
                'province_id' => 11,

                'name' => 'کاخک',
                'en_name' => 'Kakhk',
                'latitude' => '34.1445751',
                'longitude' => '58.6360716',
            ],
            [
                'id' => 489,
                'province_id' => 11,

                'name' => 'گناباد',
                'en_name' => 'Gonabad',
                'latitude' => '34.3509863',
                'longitude' => '58.6631292',
            ],
            [
                'id' => 490,
                'province_id' => 11,

                'name' => 'رضویه',
                'en_name' => 'Razaviye',
                'latitude' => '36.2093245',
                'longitude' => '59.7610331',
            ],
            [
                'id' => 491,
                'province_id' => 11,

                'name' => 'مشهد',
                'en_name' => 'Mashhad',
                'latitude' => '36.297817',
                'longitude' => '59.4393733',
            ],
            [
                'id' => 492,
                'province_id' => 11,

                'name' => 'ثامن',
                'en_name' => 'Samen',
                'latitude' => '36.4260042',
                'longitude' => '59.3820171',
            ],
            [
                'id' => 493,
                'province_id' => 11,

                'name' => 'ملک آباد',
                'en_name' => 'Molkabad',
                'latitude' => '35.9937696',
                'longitude' => '59.5646093',
            ],
            [
                'id' => 494,
                'province_id' => 11,

                'name' => 'شادمهر',
                'en_name' => 'Shadmehr',
                'latitude' => '35.1724487',
                'longitude' => '59.0339184',
            ],
            [
                'id' => 495,
                'province_id' => 11,

                'name' => 'فیض آباد',
                'en_name' => 'Feyz Abad',
                'latitude' => '35.0182208',
                'longitude' => '58.7629293',
            ],
            [
                'id' => 496,
                'province_id' => 11,

                'name' => 'بار',
                'en_name' => 'Bar',
                'latitude' => '36.4912922',
                'longitude' => '58.7095314',
            ],
            [
                'id' => 497,
                'province_id' => 11,

                'name' => 'چکنه',
                'en_name' => 'Chakaneh',
                'latitude' => '36.8136645',
                'longitude' => '58.4972621',
            ],
            [
                'id' => 498,
                'province_id' => 11,

                'name' => 'خرو',
                'en_name' => 'Kharv',
                'latitude' => '36.1520043',
                'longitude' => '58.9840862',
            ],
            [
                'id' => 499,
                'province_id' => 11,

                'name' => 'درود',
                'en_name' => 'Darrod',
                'latitude' => '36.1378911',
                'longitude' => '59.1055441',
            ],
            [
                'id' => 500,
                'province_id' => 11,

                'name' => 'عشق آباد',
                'en_name' => 'Eshqabad',
                'latitude' => '36.0438068',
                'longitude' => '58.6744165',
            ],
            [
                'id' => 501,
                'province_id' => 11,

                'name' => 'قدمگاه',
                'en_name' => 'Ghadamgah',
                'latitude' => '36.1117541',
                'longitude' => '59.047973',
            ],
            [
                'id' => 502,
                'province_id' => 11,

                'name' => 'نیشابور',
                'en_name' => 'Neyshabur',
                'latitude' => '36.2316328',
                'longitude' => '58.7216538',
            ],
            [
                'id' => 503,
                'province_id' => 12,

                'name' => 'اسفراین',
                'en_name' => 'Esfarayen',
                'latitude' => '37.0633842',
                'longitude' => '57.4730009',
            ],
            [
                'id' => 504,
                'province_id' => 12,

                'name' => 'صفی آباد',
                'en_name' => 'Safiabad',
                'latitude' => '36.6945233',
                'longitude' => '57.9214667',
            ],
            [
                'id' => 505,
                'province_id' => 12,

                'name' => 'بجنورد',
                'en_name' => 'Bojnurd',
                'latitude' => '37.4842089',
                'longitude' => '57.2554617',
            ],
            [
                'id' => 506,
                'province_id' => 12,

                'name' => 'چناران شهر',
                'en_name' => 'Chenaran Shahr',
                'latitude' => '37.4648028',
                'longitude' => '57.4379102',
            ],
            [
                'id' => 507,
                'province_id' => 12,

                'name' => 'حصارگرمخان',
                'en_name' => 'Hesar-e Garmkhan',
                'latitude' => '37.519444',
                'longitude' => '57.4825',
            ],
            [
                'id' => 508,
                'province_id' => 12,

                'name' => 'جاجرم',
                'en_name' => 'Jajarm',
                'latitude' => '36.9616101',
                'longitude' => '56.3304443',
            ],
            [
                'id' => 509,
                'province_id' => 12,

                'name' => 'سنخواست',
                'en_name' => 'Sankhast',
                'latitude' => '37.1022708',
                'longitude' => '56.8503856',
            ],
            [
                'id' => 510,
                'province_id' => 12,

                'name' => 'شوقان',
                'en_name' => 'Shoqan',
                'latitude' => '37.3416042',
                'longitude' => '56.8782807',
            ],
            [
                'id' => 511,
                'province_id' => 12,

                'name' => 'راز',
                'en_name' => 'Raz',
                'latitude' => '37.933889',
                'longitude' => '57.1125',
            ],
            [
                'id' => 512,
                'province_id' => 12,

                'name' => 'زیارت',
                'en_name' => 'Ziarat',
                'latitude' => '36.7160836',
                'longitude' => '58.5455417',
            ],
            [
                'id' => 513,
                'province_id' => 12,

                'name' => 'شیروان',
                'en_name' => 'Shirvan',
                'latitude' => '37.4090473',
                'longitude' => '57.8974752',
            ],
            [
                'id' => 514,
                'province_id' => 12,

                'name' => 'قوشخانه',
                'en_name' => 'Qushkhaneh',
                'latitude' => '37.7466097',
                'longitude' => '57.706064',
            ],
            [
                'id' => 515,
                'province_id' => 12,

                'name' => 'لوجلی',
                'en_name' => 'Lujali',
                'latitude' => '37.608056',
                'longitude' => '57.8575',
            ],
            [
                'id' => 516,
                'province_id' => 12,

                'name' => 'تیتکانلو',
                'en_name' => 'Titkanlu',
                'latitude' => '37.2288976',
                'longitude' => '58.2970097',
            ],
            [
                'id' => 517,
                'province_id' => 12,

                'name' => 'فاروج',
                'en_name' => 'Farooj',
                'latitude' => '37.1874397',
                'longitude' => '57.5359414',
            ],
            [
                'id' => 518,
                'province_id' => 12,

                'name' => 'ایور',
                'en_name' => 'Ivar',
                'latitude' => '36.9699174',
                'longitude' => '56.2547208',
            ],
            [
                'id' => 519,
                'province_id' => 12,

                'name' => 'درق',
                'en_name' => 'Daraq',
                'latitude' => '36.9703287',
                'longitude' => '56.2002396',
            ],
            [
                'id' => 520,
                'province_id' => 12,

                'name' => 'گرمه',
                'en_name' => 'Garmeh',
                'latitude' => '36.9881128',
                'longitude' => '56.2639641',
            ],
            [
                'id' => 521,
                'province_id' => 12,

                'name' => 'آشخانه',
                'en_name' => 'Ashkhaneh',
                'latitude' => '37.5591708',
                'longitude' => '56.906948',
            ],
            [
                'id' => 522,
                'province_id' => 12,

                'name' => 'آوا',
                'en_name' => 'Ava',
                'latitude' => '37.477222',
                'longitude' => '56.741111',
            ],
            [
                'id' => 523,
                'province_id' => 12,

                'name' => 'پیش قلعه',
                'en_name' => 'Pish Ghaleh',
                'latitude' => '37.6500693',
                'longitude' => '56.9885731',
            ],
            [
                'id' => 524,
                'province_id' => 12,

                'name' => 'قاضی',
                'en_name' => 'Qazi',
                'latitude' => '37.8475445',
                'longitude' => '57.3118436',
            ],
            [
                'id' => 525,
                'province_id' => 13,

                'name' => 'آبادان',
                'en_name' => 'Abadan',
                'latitude' => '30.3275841',
                'longitude' => '48.253311',
            ],
            [
                'id' => 526,
                'province_id' => 13,

                'name' => 'اروندکنار',
                'en_name' => 'Arvand Kenar',
                'latitude' => '30.0588616',
                'longitude' => '48.4311031',
            ],
            [
                'id' => 527,
                'province_id' => 13,

                'name' => 'چویبده',
                'en_name' => 'Chavibdeh',
                'latitude' => '30.203611',
                'longitude' => '48.553889',
            ],
            [
                'id' => 528,
                'province_id' => 13,

                'name' => 'آغاجاری',
                'en_name' => 'Aghajari',
                'latitude' => '30.6984772',
                'longitude' => '49.7949737',
            ],
            [
                'id' => 529,
                'province_id' => 13,

                'name' => 'امیدیه',
                'en_name' => 'Omidiyeh',
                'latitude' => '30.757686',
                'longitude' => '49.670069',
            ],
            [
                'id' => 530,
                'province_id' => 13,

                'name' => 'جایزان',
                'en_name' => 'Jayezan',
                'latitude' => '30.8742846',
                'longitude' => '49.836205',
            ],
            [
                'id' => 531,
                'province_id' => 13,

                'name' => 'آبژدان',
                'en_name' => 'Abezhdan',
                'latitude' => '32.15',
                'longitude' => '49.4',
            ],
            [
                'id' => 532,
                'province_id' => 13,

                'name' => 'قلعه خواجه',
                'en_name' => 'Qaleh-ye Khvajeh',
                'latitude' => '32.2052479',
                'longitude' => '49.4497632',
            ],
            [
                'id' => 533,
                'province_id' => 13,

                'name' => 'آزادی',
                'en_name' => 'Azadi',
                'latitude' => '32.4036245',
                'longitude' => '48.2479191',
            ],
            [
                'id' => 534,
                'province_id' => 13,

                'name' => 'اندیمشک',
                'en_name' => 'Andimeshk',
                'latitude' => '32.4617947',
                'longitude' => '48.3103302',
            ],
            [
                'id' => 535,
                'province_id' => 13,

                'name' => 'بیدروبه',
                'en_name' => 'Bidrubeh-ye',
                'latitude' => '32.7609513',
                'longitude' => '48.2294655',
            ],
            [
                'id' => 536,
                'province_id' => 13,

                'name' => 'چم گلک',
                'en_name' => 'Chamgolak',
                'latitude' => '32.4447213',
                'longitude' => '48.4359097',
            ],
            [
                'id' => 537,
                'province_id' => 13,

                'name' => 'حسینیه',
                'en_name' => 'Hoseyniye',
                'latitude' => '32.6766791',
                'longitude' => '48.2369434',
            ],
            [
                'id' => 538,
                'province_id' => 13,

                'name' => 'الهایی',
                'en_name' => 'Elhayi',
                'latitude' => '31.653889',
                'longitude' => '48.594444',
            ],
            [
                'id' => 539,
                'province_id' => 13,

                'name' => 'اهواز',
                'en_name' => 'Ahvaz',
                'latitude' => '31.3750692',
                'longitude' => '48.5305067',
            ],
            [
                'id' => 540,
                'province_id' => 13,

                'name' => 'ایذه',
                'en_name' => 'Izeh',
                'latitude' => '31.825097',
                'longitude' => '49.8492621',
            ],
            [
                'id' => 541,
                'province_id' => 13,

                'name' => 'دهدز',
                'en_name' => 'Dehdez',
                'latitude' => '31.701988',
                'longitude' => '50.2812479',
            ],
            [
                'id' => 542,
                'province_id' => 13,

                'name' => 'باغ ملک',
                'en_name' => 'Baghmalek',
                'latitude' => '31.5262731',
                'longitude' => '49.8638961',
            ],
            [
                'id' => 543,
                'province_id' => 13,

                'name' => 'صیدون',
                'en_name' => 'Seydun',
                'latitude' => '31.3652897',
                'longitude' => '50.0706195',
            ],
            [
                'id' => 544,
                'province_id' => 13,

                'name' => 'قلعه تل',
                'en_name' => 'Ghale Tol',
                'latitude' => '31.6275785',
                'longitude' => '49.8601621',
            ],
            [
                'id' => 545,
                'province_id' => 13,

                'name' => 'میداود',
                'en_name' => 'Midavod',
                'latitude' => '31.391488',
                'longitude' => '49.839691',
            ],
            [
                'id' => 546,
                'province_id' => 13,

                'name' => 'شیبان',
                'en_name' => 'Sheyban',
                'latitude' => '31.4081625',
                'longitude' => '48.7869787',
            ],
            [
                'id' => 547,
                'province_id' => 13,

                'name' => 'ملاثانی',
                'en_name' => 'Mollasani',
                'latitude' => '31.5859364',
                'longitude' => '48.8700627',
            ],
            [
                'id' => 548,
                'province_id' => 13,

                'name' => 'ویس',
                'en_name' => 'Veys',
                'latitude' => '31.4877108',
                'longitude' => '48.8696765',
            ],
            [
                'id' => 549,
                'province_id' => 13,

                'name' => 'بندرامام خمینی',
                'en_name' => 'Bandar Imam Khomeini',
                'latitude' => '30.4789763',
                'longitude' => '49.0047618',
            ],
            [
                'id' => 550,
                'province_id' => 13,

                'name' => 'بندرماهشهر',
                'en_name' => 'Bandar Mahshahr',
                'latitude' => '30.5630315',
                'longitude' => '49.1435941',
            ],
            [
                'id' => 551,
                'province_id' => 13,

                'name' => 'چمران',
                'en_name' => 'Chamran Town',
                'latitude' => '30.7061882',
                'longitude' => '49.152993',
            ],
            [
                'id' => 552,
                'province_id' => 13,

                'name' => 'بهبهان',
                'en_name' => 'Behbahan',
                'latitude' => '30.5934731',
                'longitude' => '50.2071541',
            ],
            [
                'id' => 553,
                'province_id' => 13,

                'name' => 'تشان',
                'en_name' => 'Tashan',
                'latitude' => '30.829167',
                'longitude' => '50.198333',
            ],
            [
                'id' => 554,
                'province_id' => 13,

                'name' => 'سردشت',
                'en_name' => 'Sar Dasht',
                'latitude' => '30.3276192',
                'longitude' => '50.2091074',
            ],
            [
                'id' => 555,
                'province_id' => 13,

                'name' => 'منصوریه',
                'en_name' => 'Mansuriyeh',
                'latitude' => '30.628274',
                'longitude' => '50.2985',
            ],
            [
                'id' => 556,
                'province_id' => 13,

                'name' => 'حمیدیه',
                'en_name' => 'Hamidiyeh',
                'latitude' => '31.4747593',
                'longitude' => '48.4149454',
            ],
            [
                'id' => 557,
                'province_id' => 13,

                'name' => 'خرمشهر',
                'en_name' => 'Khorramshahr',
                'latitude' => '30.4114455',
                'longitude' => '48.1187414',
            ],
            [
                'id' => 558,
                'province_id' => 13,

                'name' => 'مقاومت',
                'en_name' => 'Moqavemat',
                'latitude' => '30.445833',
                'longitude' => '48.170833',
            ],
            [
                'id' => 559,
                'province_id' => 13,

                'name' => 'مینوشهر',
                'en_name' => 'Minushahr',
                'latitude' => '30.3443613',
                'longitude' => '48.1848941',
            ],
            [
                'id' => 560,
                'province_id' => 13,

                'name' => 'چغامیش',
                'en_name' => 'Choghamish',
                'latitude' => '32.209167',
                'longitude' => '48.546111',
            ],
            [
                'id' => 561,
                'province_id' => 13,

                'name' => 'حمزه',
                'en_name' => 'Hanzeh',
                'latitude' => '32.3931888',
                'longitude' => '48.5737109',
            ],
            [
                'id' => 562,
                'province_id' => 13,

                'name' => 'دزفول',
                'en_name' => 'Dezful',
                'latitude' => '32.4023287',
                'longitude' => '48.3177811',
            ],
            [
                'id' => 563,
                'province_id' => 13,

                'name' => 'سالند',
                'en_name' => 'Sāland',
                'latitude' => '32.4990119',
                'longitude' => '48.8256025',
            ],
            [
                'id' => 564,
                'province_id' => 13,

                'name' => 'سیاه منصور',
                'en_name' => 'SiahMansur',
                'latitude' => '32.3322534',
                'longitude' => '48.4895325',
            ],
            [
                'id' => 565,
                'province_id' => 13,

                'name' => 'شمس آباد',
                'en_name' => 'Shamsabad',
                'latitude' => '32.2961657',
                'longitude' => '48.4236789',
            ],
            [
                'id' => 566,
                'province_id' => 13,

                'name' => 'شهر امام',
                'en_name' => 'Imam',
                'latitude' => '32.2277768',
                'longitude' => '48.4162116',
            ],
            [
                'id' => 567,
                'province_id' => 13,

                'name' => 'صفی آباد',
                'en_name' => 'Safiabad',
                'latitude' => '32.2600266',
                'longitude' => '48.4073066',
            ],
            [
                'id' => 568,
                'province_id' => 13,

                'name' => 'میانرود',
                'en_name' => 'Mianrood',
                'latitude' => '32.1531332',
                'longitude' => '48.431189',
            ],
            [
                'id' => 569,
                'province_id' => 13,

                'name' => 'ابوحمیظه',
                'en_name' => 'Abou Homeyzeh',
                'latitude' => '31.5280953',
                'longitude' => '48.2153571',
            ],
            [
                'id' => 570,
                'province_id' => 13,

                'name' => 'بستان',
                'en_name' => 'Bostan',
                'latitude' => '31.7157723',
                'longitude' => '47.9768028',
            ],
            [
                'id' => 571,
                'province_id' => 13,

                'name' => 'سوسنگرد',
                'en_name' => 'Susangerd',
                'latitude' => '31.5553861',
                'longitude' => '48.1684396',
            ],
            [
                'id' => 572,
                'province_id' => 13,

                'name' => 'کوت سیدنعیم',
                'en_name' => 'Kut-e Seyyed Naim',
                'latitude' => '31.461389',
                'longitude' => '48.378333',
            ],
            [
                'id' => 573,
                'province_id' => 13,

                'name' => 'رامشیر',
                'en_name' => 'Ramshir',
                'latitude' => '30.8917266',
                'longitude' => '49.3916128',
            ],
            [
                'id' => 574,
                'province_id' => 13,

                'name' => 'مشراگه',
                'en_name' => 'Moshrageh',
                'latitude' => '31.0105615',
                'longitude' => '49.4302207',
            ],
            [
                'id' => 575,
                'province_id' => 13,

                'name' => 'رامهرمز',
                'en_name' => 'Ramhormoz',
                'latitude' => '31.2752411',
                'longitude' => '49.5737451',
            ],
            [
                'id' => 576,
                'province_id' => 13,

                'name' => 'خنافره',
                'en_name' => 'Khorusi-ye Jonubi',
                'latitude' => '30.616667',
                'longitude' => '48.616667',
            ],
            [
                'id' => 577,
                'province_id' => 13,

                'name' => 'دارخوین',
                'en_name' => 'Darkhovin',
                'latitude' => '30.7437138',
                'longitude' => '48.4185074',
            ],
            [
                'id' => 578,
                'province_id' => 13,

                'name' => 'شادگان',
                'en_name' => 'Shadegan',
                'latitude' => '30.6519024',
                'longitude' => '48.6369894',
            ],
            [
                'id' => 579,
                'province_id' => 13,

                'name' => 'الوان',
                'en_name' => 'Alvan',
                'latitude' => '32.111389',
                'longitude' => '48.46',
            ],
            [
                'id' => 580,
                'province_id' => 13,

                'name' => 'حر',
                'en_name' => 'Horr',
                'latitude' => '32.144722',
                'longitude' => '48.3925',
            ],
            [
                'id' => 581,
                'province_id' => 13,

                'name' => 'شاوور',
                'en_name' => 'Hosseinabad ',
                'latitude' => '32.0584704',
                'longitude' => '48.2946311',
            ],
            [
                'id' => 582,
                'province_id' => 13,

                'name' => 'شوش',
                'en_name' => 'Shooshtar',
                'latitude' => '32.0410272',
                'longitude' => '48.7997669',
            ],
            [
                'id' => 583,
                'province_id' => 13,

                'name' => 'فتح المبین',
                'en_name' => 'FatholMobin',
                'latitude' => '32.423889',
                'longitude' => '47.81',
            ],
            [
                'id' => 584,
                'province_id' => 13,

                'name' => 'سرداران',
                'en_name' => 'Sardarabad',
                'latitude' => '32.021389',
                'longitude' => '48.792778',
            ],
            [
                'id' => 585,
                'province_id' => 13,

                'name' => 'شرافت',
                'en_name' => 'Sherafat',
                'latitude' => '32.0877553',
                'longitude' => '48.7585687',
            ],
            [
                'id' => 586,
                'province_id' => 13,

                'name' => 'شوشتر',
                'en_name' => 'Shooshtar',
                'latitude' => '32.0410272',
                'longitude' => '48.7997669',
            ],
            [
                'id' => 587,
                'province_id' => 13,

                'name' => 'گوریه',
                'en_name' => 'Guriyeh',
                'latitude' => '31.856944',
                'longitude' => '48.756667',
            ],
            [
                'id' => 588,
                'province_id' => 13,

                'name' => 'کوت عبداله',
                'en_name' => 'Kut Abdollah',
                'latitude' => '31.2352586',
                'longitude' => '48.642826',
            ],
            [
                'id' => 589,
                'province_id' => 13,

                'name' => 'ترکالکی',
                'en_name' => 'Torkalaki',
                'latitude' => '32.2412896',
                'longitude' => '48.8388204',
            ],
            [
                'id' => 590,
                'province_id' => 13,

                'name' => 'جنت مکان',
                'en_name' => 'Jannat Makan',
                'latitude' => '32.1852373',
                'longitude' => '48.8045739',
            ],
            [
                'id' => 591,
                'province_id' => 13,

                'name' => 'سماله',
                'en_name' => 'Semaleh',
                'latitude' => '32.1975668',
                'longitude' => '48.8520384',
            ],
            [
                'id' => 592,
                'province_id' => 13,

                'name' => 'صالح شهر',
                'en_name' => 'Salehshahr',
                'latitude' => '32.2142711',
                'longitude' => '48.6624168',
            ],
            [
                'id' => 593,
                'province_id' => 13,

                'name' => 'گتوند',
                'en_name' => 'Gotvand',
                'latitude' => '32.2452052',
                'longitude' => '48.7651342',
            ],
            [
                'id' => 594,
                'province_id' => 13,

                'name' => 'لالی',
                'en_name' => 'Lali',
                'latitude' => '32.3293158',
                'longitude' => '49.0875577',
            ],
            [
                'id' => 595,
                'province_id' => 13,

                'name' => 'گلگیر',
                'en_name' => 'Golgir',
                'latitude' => '31.9647',
                'longitude' => '49.2856',
            ],
            [
                'id' => 596,
                'province_id' => 13,

                'name' => 'مسجدسلیمان',
                'en_name' => 'Masjed Soleyman',
                'latitude' => '31.9515749',
                'longitude' => '49.2194258',
            ],
            [
                'id' => 597,
                'province_id' => 13,

                'name' => 'هفتگل',
                'en_name' => 'Haftkel',
                'latitude' => '31.4549485',
                'longitude' => '49.5087288',
            ],
            [
                'id' => 598,
                'province_id' => 13,

                'name' => 'زهره',
                'en_name' => 'Zahreh',
                'latitude' => '30.469167',
                'longitude' => '49.684444',
            ],
            [
                'id' => 599,
                'province_id' => 13,

                'name' => 'هندیجان',
                'en_name' => 'Hendijan',
                'latitude' => '30.2344854',
                'longitude' => '49.6924065',
            ],
            [
                'id' => 600,
                'province_id' => 13,

                'name' => 'رفیع',
                'en_name' => 'Rofayyeh',
                'latitude' => '31.5977272',
                'longitude' => '47.8853274',
            ],
            [
                'id' => 601,
                'province_id' => 13,

                'name' => 'هویزه',
                'en_name' => 'Hoveyzeh',
                'latitude' => '31.4654733',
                'longitude' => '48.0614304',
            ],
            [
                'id' => 602,
                'province_id' => 14,

                'name' => 'ابهر',
                'en_name' => 'Abhar',
                'latitude' => '36.1512257',
                'longitude' => '49.1992444',
            ],
            [
                'id' => 603,
                'province_id' => 14,

                'name' => 'صایین قلعه',
                'en_name' => 'Sain Qaleh',
                'latitude' => '36.3029508',
                'longitude' => '49.063847',
            ],
            [
                'id' => 604,
                'province_id' => 14,

                'name' => 'هیدج',
                'en_name' => 'Hidaj',
                'latitude' => '36.2551306',
                'longitude' => '49.1213214',
            ],
            [
                'id' => 605,
                'province_id' => 14,

                'name' => 'حلب',
                'en_name' => 'Halab',
                'latitude' => '36.2955069',
                'longitude' => '48.0591774',
            ],
            [
                'id' => 606,
                'province_id' => 14,

                'name' => 'زرین آباد',
                'en_name' => 'Zarrin Abad',
                'latitude' => '36.4235242',
                'longitude' => '48.247088',
            ],
            [
                'id' => 607,
                'province_id' => 14,

                'name' => 'زرین رود',
                'en_name' => 'Zarrin Rood',
                'latitude' => '35.7585619',
                'longitude' => '48.4715294',
            ],
            [
                'id' => 608,
                'province_id' => 14,

                'name' => 'سجاس',
                'en_name' => 'Sojas',
                'latitude' => '36.2394095',
                'longitude' => '48.5454511',
            ],
            [
                'id' => 609,
                'province_id' => 14,

                'name' => 'سهرورد',
                'en_name' => 'Sohrevard',
                'latitude' => '36.0730532',
                'longitude' => '48.4316826',
            ],
            [
                'id' => 610,
                'province_id' => 14,

                'name' => 'قیدار',
                'en_name' => 'Qeydar',
                'latitude' => '36.1222714',
                'longitude' => '48.5754489',
            ],
            [
                'id' => 611,
                'province_id' => 14,

                'name' => 'کرسف',
                'en_name' => 'Karasf',
                'latitude' => '36.0448826',
                'longitude' => '48.4991884',
            ],
            [
                'id' => 612,
                'province_id' => 14,

                'name' => 'گرماب',
                'en_name' => 'Garmaab',
                'latitude' => '35.8489691',
                'longitude' => '48.1900478',
            ],
            [
                'id' => 613,
                'province_id' => 14,

                'name' => 'نوربهار',
                'en_name' => 'Nurbahar',
                'latitude' => '35.937778',
                'longitude' => '48.794722',
            ],
            [
                'id' => 614,
                'province_id' => 14,

                'name' => 'خرمدره',
                'en_name' => 'Khorramdarreh',
                'latitude' => '36.2119644',
                'longitude' => '49.164676',
            ],
            [
                'id' => 615,
                'province_id' => 14,

                'name' => 'ارمغانخانه',
                'en_name' => 'Armaqankhaneh',
                'latitude' => '36.9775632',
                'longitude' => '48.3633184',
            ],
            [
                'id' => 616,
                'province_id' => 14,

                'name' => 'زنجان',
                'en_name' => 'Zanjan',
                'latitude' => '36.6811377',
                'longitude' => '48.423183',
            ],
            [
                'id' => 617,
                'province_id' => 14,

                'name' => 'نیک پی',
                'en_name' => 'Nik Pey',
                'latitude' => '36.8495173',
                'longitude' => '48.1733215',
            ],
            [
                'id' => 618,
                'province_id' => 14,

                'name' => 'سلطانیه',
                'en_name' => 'Soltanieh',
                'latitude' => '36.4348691',
                'longitude' => '48.7841463',
            ],
            [
                'id' => 619,
                'province_id' => 14,

                'name' => 'آب بر',
                'en_name' => 'Abbar',
                'latitude' => '36.9295867',
                'longitude' => '48.9325492',
            ],
            [
                'id' => 620,
                'province_id' => 14,

                'name' => 'چورزق',
                'en_name' => 'Chavarzagh',
                'latitude' => '36.9980055',
                'longitude' => '48.7723806',
            ],
            [
                'id' => 621,
                'province_id' => 14,

                'name' => 'دندی',
                'en_name' => 'Dandi',
                'latitude' => '36.5493942',
                'longitude' => '47.5937174',
            ],
            [
                'id' => 622,
                'province_id' => 14,

                'name' => 'ماه نشان',
                'en_name' => 'Mahneshan',
                'latitude' => '36.7426321',
                'longitude' => '47.6629185',
            ],
            [
                'id' => 623,
                'province_id' => 15,

                'name' => 'آرادان',
                'en_name' => 'Aradan',
                'latitude' => '35.2481488',
                'longitude' => '52.4864042',
            ],
            [
                'id' => 624,
                'province_id' => 15,

                'name' => 'کهن آباد',
                'en_name' => 'Kohanabad',
                'latitude' => '35.2213342',
                'longitude' => '52.510717',
            ],
            [
                'id' => 625,
                'province_id' => 15,

                'name' => 'امیریه',
                'en_name' => 'Amiriyeh',
                'latitude' => '36.0287295',
                'longitude' => '54.1354182',
            ],
            [
                'id' => 626,
                'province_id' => 15,

                'name' => 'دامغان',
                'en_name' => 'Damghan',
                'latitude' => '36.1645183',
                'longitude' => '54.3245171',
            ],
            [
                'id' => 627,
                'province_id' => 15,

                'name' => 'دیباج',
                'en_name' => 'Dibaj',
                'latitude' => '36.4294828',
                'longitude' => '54.2192996',
            ],
            [
                'id' => 628,
                'province_id' => 15,

                'name' => 'کلاته',
                'en_name' => 'Kalāteh',
                'latitude' => '36.3555379',
                'longitude' => '54.1363334',
            ],
            [
                'id' => 629,
                'province_id' => 15,

                'name' => 'سرخه',
                'en_name' => 'Sorkheh',
                'latitude' => '35.4680054',
                'longitude' => '53.2098112',
            ],
            [
                'id' => 630,
                'province_id' => 15,

                'name' => 'سمنان',
                'en_name' => 'Semnan',
                'latitude' => '35.5777395',
                'longitude' => '53.3490938',
            ],
            [
                'id' => 631,
                'province_id' => 15,

                'name' => 'بسطام',
                'en_name' => 'Bastam',
                'latitude' => '36.4843908',
                'longitude' => '54.9907135',
            ],
            [
                'id' => 632,
                'province_id' => 15,

                'name' => 'بیارجمند',
                'en_name' => 'Biyārjomand',
                'latitude' => '36.0817586',
                'longitude' => '55.7999897',
            ],
            [
                'id' => 633,
                'province_id' => 15,

                'name' => 'رودیان',
                'en_name' => 'Rodian',
                'latitude' => '36.3504474',
                'longitude' => '55.0012835',
            ],
            [
                'id' => 634,
                'province_id' => 15,

                'name' => 'شاهرود',
                'en_name' => 'Shahroud',
                'latitude' => '36.4057075',
                'longitude' => '54.9388482',
            ],
            [
                'id' => 635,
                'province_id' => 15,

                'name' => 'کلاته خیج',
                'en_name' => 'kalāte Khij',
                'latitude' => '36.672428',
                'longitude' => '55.2909064',
            ],
            [
                'id' => 636,
                'province_id' => 15,

                'name' => 'مجن',
                'en_name' => 'Mojen',
                'latitude' => '36.4792235',
                'longitude' => '54.6392584',
            ],
            [
                'id' => 637,
                'province_id' => 15,

                'name' => 'ایوانکی',
                'en_name' => 'Eyvanekey',
                'latitude' => '35.3444567',
                'longitude' => '52.0607547',
            ],
            [
                'id' => 638,
                'province_id' => 15,

                'name' => 'گرمسار',
                'en_name' => 'Garmsar',
                'latitude' => '35.2028784',
                'longitude' => '52.3048556',
            ],
            [
                'id' => 639,
                'province_id' => 15,

                'name' => 'درجزین',
                'en_name' => 'Darjazin',
                'latitude' => '35.6284753',
                'longitude' => '53.3081954',
            ],
            [
                'id' => 640,
                'province_id' => 15,

                'name' => 'شهمیرزاد',
                'en_name' => 'Shahmirzad',
                'latitude' => '35.7701041',
                'longitude' => '53.3180235',
            ],
            [
                'id' => 641,
                'province_id' => 15,

                'name' => 'مهدی شهر',
                'en_name' => 'Mahdi Shahr',
                'latitude' => '35.7073452',
                'longitude' => '53.2507944',
            ],
            [
                'id' => 642,
                'province_id' => 15,

                'name' => 'میامی',
                'en_name' => 'Mayamey',
                'latitude' => '36.4120092',
                'longitude' => '55.6413316',
            ],
            [
                'id' => 643,
                'province_id' => 16,

                'name' => 'ایرانشهر',
                'en_name' => 'Iranshahr',
                'latitude' => '27.2169584',
                'longitude' => '60.637793',
            ],
            [
                'id' => 644,
                'province_id' => 16,

                'name' => 'بزمان',
                'en_name' => 'Bazmān',
                'latitude' => '27.8555056',
                'longitude' => '60.1671409',
            ],
            [
                'id' => 645,
                'province_id' => 16,

                'name' => 'بمپور',
                'en_name' => 'Bampour',
                'latitude' => '27.195192',
                'longitude' => '60.4472064',
            ],
            [
                'id' => 646,
                'province_id' => 16,

                'name' => 'محمدان',
                'en_name' => 'Mohamadan',
                'latitude' => '27.2021449',
                'longitude' => '60.5499887',
            ],
            [
                'id' => 647,
                'province_id' => 16,

                'name' => 'چابهار',
                'en_name' => 'Chabahar',
                'latitude' => '25.3108314',
                'longitude' => '60.6101769',
            ],
            [
                'id' => 648,
                'province_id' => 16,

                'name' => 'نگور',
                'en_name' => 'Negour',
                'latitude' => '25.389744',
                'longitude' => '61.1329507',
            ],
            [
                'id' => 649,
                'province_id' => 16,

                'name' => 'خاش',
                'en_name' => 'Khash',
                'latitude' => '28.2227255',
                'longitude' => '61.1548491',
            ],
            [
                'id' => 650,
                'province_id' => 16,

                'name' => 'نوک آباد',
                'en_name' => 'Noukābād',
                'latitude' => '28.5406848',
                'longitude' => '60.7533216',
            ],
            [
                'id' => 651,
                'province_id' => 16,

                'name' => 'گلمورتی',
                'en_name' => 'Golmorti',
                'latitude' => '27.4814328',
                'longitude' => '59.4381808',
            ],
            [
                'id' => 652,
                'province_id' => 16,

                'name' => 'بنجار',
                'en_name' => 'Bonjār',
                'latitude' => '31.0391086',
                'longitude' => '61.5576516',
            ],
            [
                'id' => 653,
                'province_id' => 16,

                'name' => 'زابل',
                'en_name' => 'Zabol',
                'latitude' => '31.0401221',
                'longitude' => '61.4283131',
            ],
            [
                'id' => 654,
                'province_id' => 16,

                'name' => 'زاهدان',
                'en_name' => 'Zahedan',
                'latitude' => '29.4830814',
                'longitude' => '60.8049716',
            ],
            [
                'id' => 655,
                'province_id' => 16,

                'name' => 'نصرت آباد',
                'en_name' => 'Nosrat Abad',
                'latitude' => '29.8534839',
                'longitude' => '59.9576281',
            ],
            [
                'id' => 656,
                'province_id' => 16,

                'name' => 'زهک',
                'en_name' => 'Zahak',
                'latitude' => '30.8913586',
                'longitude' => '61.6654442',
            ],
            [
                'id' => 657,
                'province_id' => 16,

                'name' => 'جالق',
                'en_name' => 'Jālq',
                'latitude' => '27.5966172',
                'longitude' => '62.6827524',
            ],
            [
                'id' => 658,
                'province_id' => 16,

                'name' => 'سراوان',
                'en_name' => 'Saravan',
                'latitude' => '27.3505322',
                'longitude' => '62.2838156',
            ],
            [
                'id' => 659,
                'province_id' => 16,

                'name' => 'سیرکان',
                'en_name' => 'Sirkān',
                'latitude' => '26.8283976',
                'longitude' => '62.6301383',
            ],
            [
                'id' => 660,
                'province_id' => 16,

                'name' => 'گشت',
                'en_name' => 'Gosht',
                'latitude' => '27.7843378',
                'longitude' => '61.9270562',
            ],
            [
                'id' => 661,
                'province_id' => 16,

                'name' => 'محمدی',
                'en_name' => 'Mohammadi',
                'latitude' => '27.331963',
                'longitude' => '62.387832',
            ],
            [
                'id' => 662,
                'province_id' => 16,

                'name' => 'پیشین',
                'en_name' => 'Pishin',
                'latitude' => '26.0830874',
                'longitude' => '61.685614',
            ],
            [
                'id' => 663,
                'province_id' => 16,

                'name' => 'راسک',
                'en_name' => 'Rāsk',
                'latitude' => '26.2415941',
                'longitude' => '61.3848852',
            ],

            [
                'id' => 664,
                'province_id' => 16,

                'name' => 'سرباز',
                'en_name' => 'Sarbaz',
                'latitude' => '26.6323445',
                'longitude' => '61.2495518',
            ],
            [
                'id' => 665,
                'province_id' => 16,

                'name' => 'سوران',
                'en_name' => 'Suran',
                'latitude' => '27.2875842',
                'longitude' => '61.9804428',
            ],
            [
                'id' => 666,
                'province_id' => 16,

                'name' => 'هیدوچ',
                'en_name' => 'Hidouj',
                'latitude' => '27.0041544',
                'longitude' => '62.1066569',
            ],
            [
                'id' => 667,
                'province_id' => 16,

                'name' => 'فنوج',
                'en_name' => 'Fanouj',
                'latitude' => '26.5733652',
                'longitude' => '59.6299265',
            ],
            [
                'id' => 668,
                'province_id' => 16,

                'name' => 'قصرقند',
                'en_name' => 'Qasr-e-qand',
                'latitude' => '26.2271138',
                'longitude' => '60.7146114',
            ],
            [
                'id' => 669,
                'province_id' => 16,

                'name' => 'زرآباد',
                'en_name' => 'Zarābād',
                'latitude' => '25.5825006',
                'longitude' => '59.3778527',
            ],
            [
                'id' => 670,
                'province_id' => 16,

                'name' => 'کنارک',
                'en_name' => 'Konarak',
                'latitude' => '25.7342671',
                'longitude' => '59.3100369',
            ],
            [
                'id' => 671,
                'province_id' => 16,

                'name' => 'مهرستان',
                'en_name' => 'Zaboli',
                'latitude' => '27.1338898',
                'longitude' => '61.6546295',
            ],
            [
                'id' => 672,
                'province_id' => 16,

                'name' => 'میرجاوه',
                'en_name' => 'Mirjaveh',
                'latitude' => '29.018066',
                'longitude' => '61.4321623',
            ],
            [
                'id' => 673,
                'province_id' => 16,

                'name' => 'اسپکه',
                'en_name' => 'Espakeh',
                'latitude' => '26.8372242',
                'longitude' => '60.1641369',
            ],
            [
                'id' => 674,
                'province_id' => 16,

                'name' => 'بنت',
                'en_name' => 'Bent',
                'latitude' => '26.2888326',
                'longitude' => '59.5062445',
            ],
            [
                'id' => 675,
                'province_id' => 16,

                'name' => 'نیک شهر',
                'en_name' => 'Nikshahr',
                'latitude' => '26.2321331',
                'longitude' => '60.2177486',
            ],
            [
                'id' => 676,
                'province_id' => 16,

                'name' => 'ادیمی',
                'en_name' => 'Adimi',
                'latitude' => '31.1149709',
                'longitude' => '61.3925885',
            ],
            [
                'id' => 677,
                'province_id' => 16,

                'name' => 'شهرک علی اکبر',
                'en_name' => 'Hamoon',
                'latitude' => '30.9403472',
                'longitude' => '61.319654',
            ],
            [
                'id' => 678,
                'province_id' => 16,

                'name' => 'محمدآباد',
                'en_name' => 'Mohammadābād',
                'latitude' => '30.8825396',
                'longitude' => '61.4572405',
            ],
            [
                'id' => 679,
                'province_id' => 16,

                'name' => 'دوست محمد',
                'en_name' => 'Dust Mohammad',
                'latitude' => '31.1466185',
                'longitude' => '61.7738269',
            ],
            [
                'id' => 680,
                'province_id' => 17,

                'name' => 'آباده',
                'en_name' => 'Abadeh',
                'latitude' => '31.1611741',
                'longitude' => '52.6127952',
            ],
            [
                'id' => 681,
                'province_id' => 17,

                'name' => 'ایزدخواست',
                'en_name' => 'IzadKhast',
                'latitude' => '31.5163607',
                'longitude' => '52.1160937',
            ],
            [
                'id' => 682,
                'province_id' => 17,

                'name' => 'بهمن',
                'en_name' => 'Bahman',
                'latitude' => '31.1934563',
                'longitude' => '52.4758958',
            ],
            [
                'id' => 683,
                'province_id' => 17,

                'name' => 'سورمق',
                'en_name' => 'Surmaq',
                'latitude' => '31.0324898',
                'longitude' => '52.8304839',
            ],
            [
                'id' => 684,
                'province_id' => 17,

                'name' => 'صغاد',
                'en_name' => 'Soghad',
                'latitude' => '31.1910677',
                'longitude' => '52.5003146',
            ],
            [
                'id' => 685,
                'province_id' => 17,

                'name' => 'ارسنجان',
                'en_name' => 'Arsenjan',
                'latitude' => '29.9189282',
                'longitude' => '53.2829187',
            ],
            [
                'id' => 686,
                'province_id' => 17,

                'name' => 'استهبان',
                'en_name' => 'Estahban',
                'latitude' => '29.1282784',
                'longitude' => '54.00042',
            ],
            [
                'id' => 687,
                'province_id' => 17,

                'name' => 'ایج',
                'en_name' => 'Eij',
                'latitude' => '29.0224884',
                'longitude' => '54.2373758',
            ],
            [
                'id' => 688,
                'province_id' => 17,

                'name' => 'رونیز',
                'en_name' => 'RonizOlya',
                'latitude' => '29.1913381',
                'longitude' => '53.7648368',
            ],
            [
                'id' => 689,
                'province_id' => 17,

                'name' => 'اقلید',
                'en_name' => 'Eqlid',
                'latitude' => '30.9013993',
                'longitude' => '52.6527923',
            ],
            [
                'id' => 690,
                'province_id' => 17,

                'name' => 'حسن اباد',
                'en_name' => 'HasanAbad',
                'latitude' => '30.5201617',
                'longitude' => '52.4516057',
            ],
            [
                'id' => 691,
                'province_id' => 17,

                'name' => 'دژکرد',
                'en_name' => 'Dezhkord',
                'latitude' => '30.7228195',
                'longitude' => '51.9514704',
            ],
            [
                'id' => 692,
                'province_id' => 17,

                'name' => 'سده',
                'en_name' => 'Sedeh',
                'latitude' => '30.7029114',
                'longitude' => '52.1596305',
            ],
            [
                'id' => 693,
                'province_id' => 17,

                'name' => 'بوانات',
                'en_name' => 'Bavanat',
                'latitude' => '30.4864577',
                'longitude' => '53.5872101',
            ],
            [
                'id' => 694,
                'province_id' => 17,

                'name' => 'حسامی',
                'en_name' => 'Hesami',
                'latitude' => '29.9697501',
                'longitude' => '53.8668251',
            ],
            [
                'id' => 695,
                'province_id' => 17,

                'name' => 'کره ای',
                'en_name' => 'Korei',
                'latitude' => '30.0303672',
                'longitude' => '53.7088322',
            ],
            [
                'id' => 696,
                'province_id' => 17,

                'name' => 'مزایجان',
                'en_name' => 'Mazayejan',
                'latitude' => '28.0561602',
                'longitude' => '54.6502555',
            ],
            [
                'id' => 697,
                'province_id' => 17,

                'name' => 'سعادت شهر',
                'en_name' => 'SaadatShahr',
                'latitude' => '30.0824627',
                'longitude' => '53.1275653',
            ],
            [
                'id' => 698,
                'province_id' => 17,

                'name' => 'مادرسلیمان',
                'en_name' => 'Pasargad',
                'latitude' => '30.1913847',
                'longitude' => '53.1720793',
            ],
            [
                'id' => 699,
                'province_id' => 17,

                'name' => 'باب انار',
                'en_name' => 'BabAnar',
                'latitude' => '28.964167',
                'longitude' => '53.216389',
            ],
            [
                'id' => 700,
                'province_id' => 17,

                'name' => 'جهرم',
                'en_name' => 'Jahrom',
                'latitude' => '28.5305825',
                'longitude' => '53.5185217',
            ],
            [
                'id' => 701,
                'province_id' => 17,

                'name' => 'خاوران',
                'en_name' => 'Khavaran',
                'latitude' => '28.9368429',
                'longitude' => '53.3120155',
            ],
            [
                'id' => 702,
                'province_id' => 17,

                'name' => 'دوزه',
                'en_name' => 'Douzeh',
                'latitude' => '28.7013162',
                'longitude' => '52.9547667',
            ],
            [
                'id' => 703,
                'province_id' => 17,

                'name' => 'قطب آباد',
                'en_name' => 'QotbAbad',
                'latitude' => '28.6484872',
                'longitude' => '53.6114409',
            ],
            [
                'id' => 704,
                'province_id' => 17,

                'name' => 'خرامه',
                'en_name' => 'Kharameh',
                'latitude' => '29.5003857',
                'longitude' => '53.3010721',
            ],
            [
                'id' => 705,
                'province_id' => 17,

                'name' => 'سلطان شهر',
                'en_name' => 'SoltanShahr',
                'latitude' => '29.6296146',
                'longitude' => '53.232944',
            ],
            [
                'id' => 706,
                'province_id' => 17,

                'name' => 'صفاشهر',
                'en_name' => 'Safashahr',
                'latitude' => '30.6143172',
                'longitude' => '53.178334',
            ],
            [
                'id' => 707,
                'province_id' => 17,

                'name' => 'قادراباد',
                'en_name' => 'Qaderabad',
                'latitude' => '30.2783401',
                'longitude' => '53.2575667',
            ],
            [
                'id' => 708,
                'province_id' => 17,

                'name' => 'خنج',
                'en_name' => 'Khonj',
                'latitude' => '27.887637',
                'longitude' => '53.4115789',
            ],
            [
                'id' => 709,
                'province_id' => 17,

                'name' => 'جنت شهر',
                'en_name' => 'JannatShahr',
                'latitude' => '28.6539834',
                'longitude' => '54.670425',
            ],
            [
                'id' => 710,
                'province_id' => 17,

                'name' => 'داراب',
                'en_name' => 'Darab',
                'latitude' => '28.7516241',
                'longitude' => '54.5091814',
            ],
            [
                'id' => 711,
                'province_id' => 17,

                'name' => 'دوبرجی',
                'en_name' => 'DoBorji',
                'latitude' => '28.306667',
                'longitude' => '55.192778',
            ],
            [
                'id' => 712,
                'province_id' => 17,

                'name' => 'فدامی',
                'en_name' => 'Fadami ',
                'latitude' => '28.2140923',
                'longitude' => '55.117378',
            ],
            [
                'id' => 713,
                'province_id' => 17,

                'name' => 'کوپن',
                'en_name' => 'Kopen',
                'latitude' => '30.3350089',
                'longitude' => '51.278547',
            ],
            [
                'id' => 714,
                'province_id' => 17,

                'name' => 'مصیری',
                'en_name' => 'Masiri',
                'latitude' => '30.2409456',
                'longitude' => '51.5206679',
            ],
            [
                'id' => 715,
                'province_id' => 17,

                'name' => 'حاجی آباد',
                'en_name' => 'HajiAbad',
                'latitude' => '29.655407',
                'longitude' => '52.3115087',
            ],
            [
                'id' => 716,
                'province_id' => 17,

                'name' => 'دبیران',
                'en_name' => 'Dabiran',
                'latitude' => '28.4075283',
                'longitude' => '54.1688322',
            ],
            [
                'id' => 717,
                'province_id' => 17,

                'name' => 'شهرپیر',
                'en_name' => 'PirCity',
                'latitude' => '28.3145424',
                'longitude' => '54.3141315',
            ],
            [
                'id' => 718,
                'province_id' => 17,

                'name' => 'اردکان',
                'en_name' => 'Sepidan',
                'latitude' => '30.2033333',
                'longitude' => '51.8967989',
            ],
            [
                'id' => 719,
                'province_id' => 17,

                'name' => 'بیضا',
                'en_name' => 'Beyza',
                'latitude' => '29.9719812',
                'longitude' => '52.3968886',
            ],
            [
                'id' => 720,
                'province_id' => 17,

                'name' => 'هماشهر',
                'en_name' => 'Hamashahr',
                'latitude' => '30.111667',
                'longitude' => '52.082778',
            ],
            [
                'id' => 721,
                'province_id' => 17,

                'name' => 'سروستان',
                'en_name' => 'سروستان',
                'latitude' => '29.2702253',
                'longitude' => '53.2073019',
            ],
            [
                'id' => 722,
                'province_id' => 17,

                'name' => 'کوهنجان',
                'en_name' => 'Kouhenjan',
                'latitude' => '29.2315677',
                'longitude' => '52.9532003',
            ],
            [
                'id' => 723,
                'province_id' => 17,

                'name' => 'خانه زنیان',
                'en_name' => 'KhaneZenian',
                'latitude' => '29.6700476',
                'longitude' => '52.1433362',
            ],
            [
                'id' => 724,
                'province_id' => 17,

                'name' => 'داریان',
                'en_name' => 'Dariun',
                'latitude' => '29.5625573',
                'longitude' => '52.9188251',
            ],
            [
                'id' => 725,
                'province_id' => 17,

                'name' => 'زرقان',
                'en_name' => 'Zarghan',
                'latitude' => '29.7630767',
                'longitude' => '52.6747435',
            ],
            [
                'id' => 726,
                'province_id' => 17,

                'name' => 'شهرصدرا',
                'en_name' => 'Sadra',
                'latitude' => '29.8047578',
                'longitude' => '52.4582571',
            ],
            [
                'id' => 727,
                'province_id' => 17,

                'name' => 'شیراز',
                'en_name' => 'Shiraz',
                'latitude' => '29.6655016',
                'longitude' => '52.3929304',
            ],
            [
                'id' => 728,
                'province_id' => 17,

                'name' => 'لپویی',
                'en_name' => 'Lapouyee',
                'latitude' => '29.7996499',
                'longitude' => '52.6423645',
            ],
            [
                'id' => 729,
                'province_id' => 17,

                'name' => 'دهرم',
                'en_name' => 'Dehram',
                'latitude' => '28.4912487',
                'longitude' => '52.2997713',
            ],
            [
                'id' => 730,
                'province_id' => 17,

                'name' => 'فراشبند',
                'en_name' => 'Farashband',
                'latitude' => '28.8505289',
                'longitude' => '52.0610326',
            ],
            [
                'id' => 731,
                'province_id' => 17,

                'name' => 'نوجین',
                'en_name' => 'Nowjein',
                'latitude' => '29.1184847',
                'longitude' => '51.9823259',
            ],
            [
                'id' => 732,
                'province_id' => 17,

                'name' => 'زاهدشهر',
                'en_name' => 'Zahedshahr',
                'latitude' => '28.7518065',
                'longitude' => '53.7828913',
            ],
            [
                'id' => 733,
                'province_id' => 17,

                'name' => 'ششده',
                'en_name' => 'Sheshdeh',
                'latitude' => '28.9125053',
                'longitude' => '53.992271',
            ],
            [
                'id' => 734,
                'province_id' => 17,

                'name' => 'فسا',
                'en_name' => 'Fasa',
                'latitude' => '28.9487355',
                'longitude' => '53.5992043',
            ],
            [
                'id' => 735,
                'province_id' => 17,

                'name' => 'قره بلاغ',
                'en_name' => 'Ghare Bolagh',
                'latitude' => '28.9281',
                'longitude' => '54.0509',
            ],
            [
                'id' => 736,
                'province_id' => 17,

                'name' => 'میانشهر',
                'en_name' => 'Miyanshahr',
                'latitude' => '28.7101797',
                'longitude' => '53.8515472',
            ],
            [
                'id' => 737,
                'province_id' => 17,

                'name' => 'نوبندگان',
                'en_name' => 'No Bandegan',
                'latitude' => '28.8559123',
                'longitude' => '53.8149618',
            ],
            [
                'id' => 738,
                'province_id' => 17,

                'name' => 'فیروزآباد',
                'en_name' => 'Firuzabad',
                'latitude' => '28.8448148',
                'longitude' => '52.5284503',
            ],
            [
                'id' => 739,
                'province_id' => 17,

                'name' => 'میمند',
                'en_name' => 'Meymand',
                'latitude' => '28.8677687',
                'longitude' => '52.7359413',
            ],
            [
                'id' => 740,
                'province_id' => 17,

                'name' => 'افزر',
                'en_name' => 'Efzar',
                'latitude' => '28.3463697',
                'longitude' => '52.9610967',
            ],
            [
                'id' => 741,
                'province_id' => 17,

                'name' => 'امام شهر',
                'en_name' => 'Emam Shahr',
                'latitude' => '28.4468266',
                'longitude' => '53.1462765',
            ],
            [
                'id' => 742,
                'province_id' => 17,

                'name' => 'قیر',
                'en_name' => 'Ghirokarzin',
                'latitude' => '28.3363809',
                'longitude' => '52.668416',
            ],
            [
                'id' => 743,
                'province_id' => 17,

                'name' => 'کارزین (فتح آباد)',
                'en_name' => 'Karzin',
                'latitude' => '28.4332441',
                'longitude' => '53.1239041',
            ],
            [
                'id' => 744,
                'province_id' => 17,

                'name' => 'مبارک آباددیز',
                'en_name' => 'Mobarakabad',
                'latitude' => '28.359722',
                'longitude' => '53.328333',
            ],
            [
                'id' => 745,
                'province_id' => 17,

                'name' => 'بالاده',
                'en_name' => 'Baladeh ',
                'latitude' => '29.283029',
                'longitude' => '51.927824',
            ],
            [
                'id' => 746,
                'province_id' => 17,

                'name' => 'خشت',
                'en_name' => 'Khesht',
                'latitude' => '27.2334727',
                'longitude' => '53.4306765',
            ],
            [
                'id' => 747,
                'province_id' => 17,

                'name' => 'قایمیه',
                'en_name' => 'Qaemyeh',
                'latitude' => '29.8509192',
                'longitude' => '51.5732357',
            ],
            [
                'id' => 748,
                'province_id' => 17,

                'name' => 'کازرون',
                'en_name' => 'City Kazeroon',
                'latitude' => '29.6271233',
                'longitude' => '51.6496276',
            ],
            [
                'id' => 749,
                'province_id' => 17,

                'name' => 'کنارتخته',
                'en_name' => 'Konartakhteh',
                'latitude' => '29.5251062',
                'longitude' => '51.373422',
            ],
            [
                'id' => 750,
                'province_id' => 17,

                'name' => 'نودان',
                'en_name' => 'Nowdan',
                'latitude' => '29.8011954',
                'longitude' => '51.684215',
            ],
            [
                'id' => 751,
                'province_id' => 17,

                'name' => 'کوار',
                'en_name' => 'Kavar',
                'latitude' => '29.2118216',
                'longitude' => '52.6502602',
            ],
            [
                'id' => 752,
                'province_id' => 17,

                'name' => 'گراش',
                'en_name' => 'Gerash',
                'latitude' => '27.6749806',
                'longitude' => '54.0758631',
            ],
            [
                'id' => 753,
                'province_id' => 17,

                'name' => 'اوز',
                'en_name' => 'Evaz',
                'latitude' => '27.7629571',
                'longitude' => '53.9794344',
            ],
            [
                'id' => 754,
                'province_id' => 17,

                'name' => 'بنارویه',
                'en_name' => 'Banaruyeh',
                'latitude' => '28.0865367',
                'longitude' => '54.0397494',
            ],
            [
                'id' => 755,
                'province_id' => 17,

                'name' => 'بیرم',
                'en_name' => 'Beyram',
                'latitude' => '27.4317364',
                'longitude' => '53.5058642',
            ],
            [
                'id' => 756,
                'province_id' => 17,

                'name' => 'جویم',
                'en_name' => 'Juyom',
                'latitude' => '28.2589141',
                'longitude' => '53.9601658',
            ],
            [
                'id' => 757,
                'province_id' => 17,

                'name' => 'خور',
                'en_name' => 'Khour',
                'latitude' => '27.6419168',
                'longitude' => '54.3375023',
            ],
            [
                'id' => 758,
                'province_id' => 17,

                'name' => 'عمادده',
                'en_name' => 'Emad Deh',
                'latitude' => '27.4462097',
                'longitude' => '53.8521266',
            ],
            [
                'id' => 759,
                'province_id' => 17,

                'name' => 'لار',
                'en_name' => 'Lar',
                'latitude' => '27.6687303',
                'longitude' => '54.2468452',
            ],
            [
                'id' => 760,
                'province_id' => 17,

                'name' => 'لطیفی',
                'en_name' => 'Latifi',
                'latitude' => '27.6902409',
                'longitude' => '54.3771304',
            ],
            [
                'id' => 761,
                'province_id' => 17,

                'name' => 'اشکنان',
                'en_name' => 'Ashkanan',
                'latitude' => '27.2352444',
                'longitude' => '53.5866736',
            ],
            [
                'id' => 762,
                'province_id' => 17,

                'name' => 'اهل',
                'en_name' => 'Ahel',
                'latitude' => '27.2112046',
                'longitude' => '53.6572051',
            ],
            [
                'id' => 763,
                'province_id' => 17,

                'name' => 'علامرودشت',
                'en_name' => 'Alamarvdasht',
                'latitude' => '27.6251777',
                'longitude' => '52.9911375',
            ],
            [
                'id' => 764,
                'province_id' => 17,

                'name' => 'لامرد',
                'en_name' => 'Lamerd',
                'latitude' => '27.3413805',
                'longitude' => '53.1543224',
            ],
            [
                'id' => 765,
                'province_id' => 17,

                'name' => 'خانیمن',
                'en_name' => 'Khaniman',
                'latitude' => '30.349167',
                'longitude' => '52.241667',
            ],
            [
                'id' => 766,
                'province_id' => 17,

                'name' => 'رامجرد',
                'en_name' => 'Koushkak',
                'latitude' => '30.0737362',
                'longitude' => '52.5882054',
            ],
            [
                'id' => 767,
                'province_id' => 17,

                'name' => 'سیدان',
                'en_name' => 'Seyedan',
                'latitude' => '30.0042449',
                'longitude' => '53.0012226',
            ],
            [
                'id' => 768,
                'province_id' => 17,

                'name' => 'کامفیروز',
                'en_name' => 'Kamfiruz',
                'latitude' => '30.3230997',
                'longitude' => '52.1839857',
            ],
            [
                'id' => 769,
                'province_id' => 17,

                'name' => 'مرودشت',
                'en_name' => 'Marvdasht',
                'latitude' => '29.890278',
                'longitude' => '52.7829546',
            ],
            [
                'id' => 770,
                'province_id' => 17,

                'name' => 'بابامنیر',
                'en_name' => 'Baba Monir',
                'latitude' => '30.0715914',
                'longitude' => '51.2002909',
            ],
            [
                'id' => 771,
                'province_id' => 17,

                'name' => 'خومه زار',
                'en_name' => 'Khoome Zar',
                'latitude' => '30.0092429',
                'longitude' => '51.5666055',
            ],
            [
                'id' => 772,
                'province_id' => 17,

                'name' => 'نورآباد',
                'en_name' => 'Nourabad',
                'latitude' => '30.1134931',
                'longitude' => '51.503691',
            ],
            [
                'id' => 773,
                'province_id' => 17,

                'name' => 'اسیر',
                'en_name' => 'Asir',
                'latitude' => '27.7248101',
                'longitude' => '52.6611185',
            ],
            [
                'id' => 774,
                'province_id' => 17,

                'name' => 'خوزی',
                'en_name' => 'Khoozi',
                'latitude' => '27.4461052',
                'longitude' => '52.9607534',
            ],
            [
                'id' => 775,
                'province_id' => 17,

                'name' => 'گله دار',
                'en_name' => 'Galehdar',
                'latitude' => '27.6574458',
                'longitude' => '52.6298326',
            ],
            [
                'id' => 776,
                'province_id' => 17,

                'name' => 'مهر',
                'en_name' => 'Mohr',
                'latitude' => '27.5516544',
                'longitude' => '52.8721762',
            ],
            [
                'id' => 777,
                'province_id' => 17,

                'name' => 'وراوی',
                'en_name' => 'Varavi',
                'latitude' => '27.4652885',
                'longitude' => '53.0441165',
            ],
            [
                'id' => 778,
                'province_id' => 17,

                'name' => 'آباده طشک',
                'en_name' => 'Abadeh Tashk',
                'latitude' => '29.8072088',
                'longitude' => '53.7200545',
            ],
            [
                'id' => 779,
                'province_id' => 17,

                'name' => 'قطرویه',
                'en_name' => 'Qatruyeh',
                'latitude' => '29.1458457',
                'longitude' => '54.6993613',
            ],
            [
                'id' => 780,
                'province_id' => 17,

                'name' => 'مشکان',
                'en_name' => 'Meshkan',
                'latitude' => '29.4740303',
                'longitude' => '54.3286584',
            ],
            [
                'id' => 781,
                'province_id' => 17,

                'name' => 'نی ریز',
                'en_name' => 'Neyriz',
                'latitude' => '29.1904105',
                'longitude' => '54.2861502',
            ],
            [
                'id' => 782,
                'province_id' => 18,

                'name' => 'آبیک',
                'en_name' => 'Abyek',
                'latitude' => '36.0471165',
                'longitude' => '50.5181835',
            ],
            [
                'id' => 783,
                'province_id' => 18,

                'name' => 'خاکعلی',
                'en_name' => 'Khakali',
                'latitude' => '36.1299889',
                'longitude' => '50.1670825',
            ],
            [
                'id' => 784,
                'province_id' => 18,

                'name' => 'آبگرم',
                'en_name' => 'Abgarm',
                'latitude' => '35.7568728',
                'longitude' => '49.2773509',
            ],
            [
                'id' => 785,
                'province_id' => 18,

                'name' => 'آوج',
                'en_name' => 'Avaj',
                'latitude' => '35.5777183',
                'longitude' => '49.2120016',
            ],
            [
                'id' => 786,
                'province_id' => 18,

                'name' => 'الوند',
                'en_name' => 'Alvand',
                'latitude' => '36.1877295',
                'longitude' => '50.0408898',
            ],
            [
                'id' => 787,
                'province_id' => 18,

                'name' => 'بیدستان',
                'en_name' => 'Bidestan',
                'latitude' => '36.2308422',
                'longitude' => '50.112183',
            ],
            [
                'id' => 788,
                'province_id' => 18,

                'name' => 'شریفیه',
                'en_name' => 'Sharif Abad',
                'latitude' => '36.2149943',
                'longitude' => '50.1427388',
            ],
            [
                'id' => 789,
                'province_id' => 18,

                'name' => 'محمدیه',
                'en_name' => 'Mohammadiyeh ',
                'latitude' => '36.2225503',
                'longitude' => '50.1757406',
            ],
            [
                'id' => 790,
                'province_id' => 18,

                'name' => 'ارداق',
                'en_name' => 'Ardagh',
                'latitude' => '36.0514488',
                'longitude' => '49.8149943',
            ],
            [
                'id' => 791,
                'province_id' => 18,

                'name' => 'بویین زهرا',
                'en_name' => 'Buin Zahra',
                'latitude' => '35.7654991',
                'longitude' => '50.0423167',
            ],
            [
                'id' => 792,
                'province_id' => 18,

                'name' => 'دانسفهان',
                'en_name' => 'Danesfahan',
                'latitude' => '35.8157228',
                'longitude' => '49.724416',
            ],
            [
                'id' => 793,
                'province_id' => 18,

                'name' => 'سگزآباد',
                'en_name' => 'Sagz Abad',
                'latitude' => '35.7661254',
                'longitude' => '49.9188279',
            ],
            [
                'id' => 794,
                'province_id' => 18,

                'name' => 'شال',
                'en_name' => 'Shal',
                'latitude' => '35.8953665',
                'longitude' => '49.7510289',
            ],
            [
                'id' => 795,
                'province_id' => 18,

                'name' => 'اسفرورین',
                'en_name' => 'Esfarvarin',
                'latitude' => '35.9368405',
                'longitude' => '49.7401714',
            ],
            [
                'id' => 796,
                'province_id' => 18,

                'name' => 'تاکستان',
                'en_name' => 'Takestan',
                'latitude' => '36.0707689',
                'longitude' => '49.6609063',
            ],
            [
                'id' => 797,
                'province_id' => 18,

                'name' => 'خرمدشت',
                'en_name' => 'Khorramdasht',
                'latitude' => '35.9280232',
                'longitude' => '49.5033646',
            ],
            [
                'id' => 798,
                'province_id' => 18,

                'name' => 'ضیاڈآباد',
                'en_name' => 'Ziaabad',
                'latitude' => '35.993333',
                'longitude' => '49.447778',
            ],
            [
                'id' => 799,
                'province_id' => 18,

                'name' => 'نرجه',
                'en_name' => 'Narjeh',
                'latitude' => '35.9959407',
                'longitude' => '49.6105455',
            ],
            [
                'id' => 800,
                'province_id' => 18,

                'name' => 'اقبالیه',
                'en_name' => 'Eqbaliyeh',
                'latitude' => '36.2281747',
                'longitude' => '49.9067364',
            ],
            [
                'id' => 801,
                'province_id' => 18,

                'name' => 'رازمیان',
                'en_name' => 'Razmian',
                'latitude' => '36.5420269',
                'longitude' => '50.1983892',
            ],
            [
                'id' => 802,
                'province_id' => 18,

                'name' => 'سیردان',
                'en_name' => 'Sirdan',
                'latitude' => '36.6473235',
                'longitude' => '49.1887735',
            ],
            [
                'id' => 803,
                'province_id' => 18,

                'name' => 'قزوین',
                'en_name' => 'Qazvin',
                'latitude' => '36.2811997',
                'longitude' => '49.9466456',
            ],
            [
                'id' => 804,
                'province_id' => 18,

                'name' => 'کوهین',
                'en_name' => 'Kouhin',
                'latitude' => '36.3722383',
                'longitude' => '49.6494161',
            ],
            [
                'id' => 805,
                'province_id' => 18,

                'name' => 'محمودآبادنمونه',
                'en_name' => 'Mahmood Abad nemooneh',
                'latitude' => '36.2923071',
                'longitude' => '49.8897931',
            ],
            [
                'id' => 806,
                'province_id' => 18,

                'name' => 'معلم کلایه',
                'en_name' => 'Moallem Kelayeh',
                'latitude' => '36.448096',
                'longitude' => '50.467801',
            ],
            [
                'id' => 807,
                'province_id' => 19,

                'name' => 'جعفریه',
                'en_name' => 'Jafarie',
                'latitude' => '34.7745074',
                'longitude' => '50.5065106',
            ],
            [
                'id' => 808,
                'province_id' => 19,

                'name' => 'دستجرد',
                'en_name' => 'Dastjerd',
                'latitude' => '34.5538073',
                'longitude' => '50.2390622',
            ],
            [
                'id' => 809,
                'province_id' => 19,

                'name' => 'سلفچگان',
                'en_name' => 'Salafchegan',
                'latitude' => '34.476606',
                'longitude' => '50.4550123',
            ],
            [
                'id' => 810,
                'province_id' => 19,

                'name' => 'قم',
                'en_name' => 'Qom',
                'latitude' => '34.6887845',
                'longitude' => '50.7119792',
            ],
            [
                'id' => 811,
                'province_id' => 19,

                'name' => 'قنوات',
                'en_name' => 'Qanavat',
                'latitude' => '34.6123358',
                'longitude' => '51.0136627',
            ],
            [
                'id' => 812,
                'province_id' => 19,

                'name' => 'کهک',
                'en_name' => 'Kahak',
                'latitude' => '34.3919658',
                'longitude' => '50.8546399',
            ],
            [
                'id' => 813,
                'province_id' => 20,

                'name' => 'آرمرده',
                'en_name' => 'Armardeh',
                'latitude' => '35.9322461',
                'longitude' => '45.7913804',
            ],
            [
                'id' => 814,
                'province_id' => 20,

                'name' => 'بانه',
                'en_name' => 'Baneh',
                'latitude' => '35.9945143',
                'longitude' => '45.8703015',
            ],
            [
                'id' => 815,
                'province_id' => 20,

                'name' => 'بویین سفلی',
                'en_name' => 'Boeen-e-Sofla',
                'latitude' => '35.938214',
                'longitude' => '45.9323787',
            ],
            [
                'id' => 816,
                'province_id' => 20,

                'name' => 'کانی سور',
                'en_name' => 'Kani Sur',
                'latitude' => '36.2148132',
                'longitude' => '46.8119073',
            ],
            [
                'id' => 817,
                'province_id' => 20,

                'name' => 'بابارشانی',
                'en_name' => 'Babarashani',
                'latitude' => '35.6781715',
                'longitude' => '47.7938533',
            ],
            [
                'id' => 818,
                'province_id' => 20,

                'name' => 'بیجار',
                'en_name' => 'Bijar',
                'latitude' => '35.8727737',
                'longitude' => '47.5806282',
            ],
            [
                'id' => 819,
                'province_id' => 20,

                'name' => 'پیرتاج',
                'en_name' => 'Pir Taj',
                'latitude' => '35.7762981',
                'longitude' => '48.1116752',
            ],
            [
                'id' => 820,
                'province_id' => 20,

                'name' => 'توپ آغاج',
                'en_name' => 'Tup Aghaj',
                'latitude' => '36.0482963',
                'longitude' => '47.8175416',
            ],
            [
                'id' => 821,
                'province_id' => 20,

                'name' => 'یاسوکند',
                'en_name' => 'Hasanabad Yasukand',
                'latitude' => '36.2838361',
                'longitude' => '47.7375081',
            ],
            [
                'id' => 822,
                'province_id' => 20,

                'name' => 'بلبان آباد',
                'en_name' => 'Bolbanabad ',
                'latitude' => '35.1386482',
                'longitude' => '47.3080861',
            ],
            [
                'id' => 823,
                'province_id' => 20,

                'name' => 'دهگلان',
                'en_name' => 'Dehgolan',
                'latitude' => '35.2798004',
                'longitude' => '47.4111664',
            ],
            [
                'id' => 824,
                'province_id' => 20,

                'name' => 'دیواندره',
                'en_name' => 'Divandarreh',
                'latitude' => '35.9159013',
                'longitude' => '47.0080946',
            ],
            [
                'id' => 825,
                'province_id' => 20,

                'name' => 'زرینه',
                'en_name' => 'Zarrineh ',
                'latitude' => '36.0605308',
                'longitude' => '46.9118356',
            ],
            [
                'id' => 826,
                'province_id' => 20,

                'name' => 'اورامان تخت',
                'en_name' => 'Uraman Takht',
                'latitude' => '35.2528212',
                'longitude' => '46.2591577',
            ],
            [
                'id' => 827,
                'province_id' => 20,

                'name' => 'سروآباد',
                'en_name' => 'Sarvabad',
                'latitude' => '35.3095563',
                'longitude' => '46.3575411',
            ],
            [
                'id' => 828,
                'province_id' => 20,

                'name' => 'سقز',
                'en_name' => 'Saqqez',
                'latitude' => '36.2411826',
                'longitude' => '46.2429565',
            ],
            [
                'id' => 829,
                'province_id' => 20,

                'name' => 'صاحب',
                'en_name' => 'Saheb',
                'latitude' => '36.2029011',
                'longitude' => '46.4532851',
            ],
            [
                'id' => 830,
                'province_id' => 20,

                'name' => 'سنندج',
                'en_name' => 'Sanandaj',
                'latitude' => '35.2899686',
                'longitude' => '46.939342',
            ],
            [
                'id' => 831,
                'province_id' => 20,

                'name' => 'شویشه',
                'en_name' => 'Shuyesheh',
                'latitude' => '35.356996',
                'longitude' => '46.6732263',
            ],
            [
                'id' => 832,
                'province_id' => 20,

                'name' => 'دزج',
                'en_name' => 'Dezej',
                'latitude' => '35.0646732',
                'longitude' => '47.9590989',
            ],
            [
                'id' => 833,
                'province_id' => 20,

                'name' => 'دلبران',
                'en_name' => 'Delbaran',
                'latitude' => '35.2372082',
                'longitude' => '47.9753832',
            ],
            [
                'id' => 834,
                'province_id' => 20,

                'name' => 'سریش آباد',
                'en_name' => 'Serish Abad',
                'latitude' => '35.2496313',
                'longitude' => '47.7696704',
            ],
            [
                'id' => 835,
                'province_id' => 20,

                'name' => 'قروه',
                'en_name' => 'Qorveh',
                'latitude' => '35.1658754',
                'longitude' => '47.7900766',
            ],
            [
                'id' => 836,
                'province_id' => 20,

                'name' => 'کامیاران',
                'en_name' => 'Kamyaran',
                'latitude' => '34.7966655',
                'longitude' => '46.9229077',
            ],
            [
                'id' => 837,
                'province_id' => 20,

                'name' => 'موچش',
                'en_name' => 'Muchesh',
                'latitude' => '35.0582268',
                'longitude' => '47.1461105',
            ],
            [
                'id' => 838,
                'province_id' => 20,

                'name' => 'برده رشه',
                'en_name' => 'Bardeh Rasheh',
                'latitude' => '35.5932421',
                'longitude' => '46.0839732',
            ],
            [
                'id' => 839,
                'province_id' => 20,

                'name' => 'چناره',
                'en_name' => 'Chnare',
                'latitude' => '35.6324478',
                'longitude' => '46.3042832',
            ],
            [
                'id' => 840,
                'province_id' => 20,

                'name' => 'کانی دینار',
                'en_name' => 'Kani Dinar',
                'latitude' => '35.4632302',
                'longitude' => '46.2074984',
            ],
            [
                'id' => 841,
                'province_id' => 20,

                'name' => 'مریوان',
                'en_name' => 'Marivan',
                'latitude' => '35.5168281',
                'longitude' => '46.1609028',
            ],
            [
                'id' => 842,
                'province_id' => 21,

                'name' => 'ارزوییه',
                'en_name' => 'Orzueeyeh',
                'latitude' => '28.4583908',
                'longitude' => '56.3532177',
            ],
            [
                'id' => 843,
                'province_id' => 21,

                'name' => 'امین شهر',
                'en_name' => 'Aminshahr ',
                'latitude' => '30.8422136',
                'longitude' => '55.3320513',
            ],
            [
                'id' => 844,
                'province_id' => 21,

                'name' => 'انار',
                'en_name' => 'Anar ',
                'latitude' => '30.8656849',
                'longitude' => '55.2572822',
            ],
            [
                'id' => 845,
                'province_id' => 21,

                'name' => 'بافت',
                'en_name' => 'Baft',
                'latitude' => '29.2308726',
                'longitude' => '56.5792054',
            ],
            [
                'id' => 846,
                'province_id' => 21,

                'name' => 'بزنجان',
                'en_name' => 'Bezanjan',
                'latitude' => '29.2476133',
                'longitude' => '56.6889811',
            ],
            [
                'id' => 847,
                'province_id' => 21,

                'name' => 'بردسیر',
                'en_name' => 'Bardsir',
                'latitude' => '29.9259938',
                'longitude' => '56.5349144',
            ],
            [
                'id' => 848,
                'province_id' => 21,

                'name' => 'دشتکار',
                'en_name' => 'Dashtkar',
                'latitude' => '29.9069001',
                'longitude' => '56.6578542',
            ],
            [
                'id' => 849,
                'province_id' => 21,

                'name' => 'گلزار',
                'en_name' => 'Golzar',
                'latitude' => '29.7054412',
                'longitude' => '57.0246003',
            ],
            [
                'id' => 850,
                'province_id' => 21,

                'name' => 'لاله زار',
                'en_name' => 'Laleh zaar',
                'latitude' => '29.5205162',
                'longitude' => '56.8075345',
            ],
            [
                'id' => 851,
                'province_id' => 21,

                'name' => 'نگار',
                'en_name' => 'Negar',
                'latitude' => '29.8570212',
                'longitude' => '56.7939841',
            ],
            [
                'id' => 852,
                'province_id' => 21,

                'name' => 'بروات',
                'en_name' => 'Baravat',
                'latitude' => '29.0615618',
                'longitude' => '58.3850377',
            ],
            [
                'id' => 853,
                'province_id' => 21,

                'name' => 'بم',
                'en_name' => 'Bam',
                'latitude' => '29.1023289',
                'longitude' => '58.3113521',
            ],
            [
                'id' => 854,
                'province_id' => 21,

                'name' => 'بلوک',
                'en_name' => 'Boluk',
                'latitude' => '28.2306041',
                'longitude' => '57.5046515',
            ],
            [
                'id' => 855,
                'province_id' => 21,

                'name' => 'جبالبارز',
                'en_name' => 'Jebalbarez',
                'latitude' => '28.9070367',
                'longitude' => '57.882328',
            ],
            [
                'id' => 856,
                'province_id' => 21,

                'name' => 'جیرفت',
                'en_name' => 'Jiroft',
                'latitude' => '28.6919493',
                'longitude' => '57.6469134',
            ],
            [
                'id' => 857,
                'province_id' => 21,

                'name' => 'درب بهشت',
                'en_name' => 'Darb-e Behesht',
                'latitude' => '29.2346193',
                'longitude' => '57.3300076',
            ],
            [
                'id' => 858,
                'province_id' => 21,

                'name' => 'رابر',
                'en_name' => 'Rābor',
                'latitude' => '29.2908138',
                'longitude' => '56.899781',
            ],
            [
                'id' => 859,
                'province_id' => 21,

                'name' => 'هنزا',
                'en_name' => 'Hanza',
                'latitude' => '29.2984561',
                'longitude' => '57.1797703',
            ],
            [
                'id' => 860,
                'province_id' => 21,

                'name' => 'راور',
                'en_name' => 'Ravar',
                'latitude' => '31.2692164',
                'longitude' => '56.7697042',
            ],
            [
                'id' => 861,
                'province_id' => 21,

                'name' => 'هجدک',
                'en_name' => 'Hojedk',
                'latitude' => '30.7580818',
                'longitude' => '56.9874786',
            ],
            [
                'id' => 862,
                'province_id' => 21,

                'name' => 'بهرمان',
                'en_name' => 'Bahreman',
                'latitude' => '30.9003641',
                'longitude' => '55.7168626',
            ],
            [
                'id' => 863,
                'province_id' => 21,

                'name' => 'رفسنجان',
                'en_name' => 'Rafsanjan',
                'latitude' => '30.3671961',
                'longitude' => '55.9213258',
            ],
            [
                'id' => 864,
                'province_id' => 21,

                'name' => 'صفاییه',
                'en_name' => 'Safaiyeh',
                'latitude' => '30.8280813',
                'longitude' => '55.8030148',
            ],
            [
                'id' => 865,
                'province_id' => 21,

                'name' => 'کشکوییه',
                'en_name' => 'Koshkuiyeh',
                'latitude' => '30.5290457',
                'longitude' => '55.6322737',
            ],
            [
                'id' => 866,
                'province_id' => 21,

                'name' => 'مس سرچشمه',
                'en_name' => 'Shahrak Mes Sarcheshmeh',
                'latitude' => '30.0002468',
                'longitude' => '55.7783173',
            ],
            [
                'id' => 867,
                'province_id' => 21,

                'name' => 'رودبار',
                'en_name' => 'Rudbar',
                'latitude' => '27.575113',
                'longitude' => '58.935332',
            ],
            [
                'id' => 868,
                'province_id' => 21,

                'name' => 'زهکلوت',
                'en_name' => 'Zeh-e Kalut',
                'latitude' => '27.7925',
                'longitude' => '58.586944',
            ],
            [
                'id' => 869,
                'province_id' => 21,

                'name' => 'گنبکی',
                'en_name' => 'Gonbaki',
                'latitude' => '28.7147508',
                'longitude' => '58.8432883',
            ],
            [
                'id' => 870,
                'province_id' => 21,

                'name' => 'محمدآباد',
                'en_name' => 'Mohammadabad',
                'latitude' => '28.6283959',
                'longitude' => '59.1188693',
            ],
            [
                'id' => 871,
                'province_id' => 21,

                'name' => 'خانوک',
                'en_name' => 'Khanook',
                'latitude' => '30.7155863',
                'longitude' => '56.7533324',
            ],
            [
                'id' => 872,
                'province_id' => 21,

                'name' => 'ریحان',
                'en_name' => 'Reyhan',
                'latitude' => '30.7348538',
                'longitude' => '56.6873926',
            ],
            [
                'id' => 873,
                'province_id' => 21,

                'name' => 'زرند',
                'en_name' => 'Zarand',
                'latitude' => '30.8135763',
                'longitude' => '56.5456002',
            ],
            [
                'id' => 874,
                'province_id' => 21,

                'name' => 'یزدان شهر',
                'en_name' => 'Yazdan Shahr',
                'latitude' => '30.8683324',
                'longitude' => '56.3334268',
            ],
            [
                'id' => 875,
                'province_id' => 21,

                'name' => 'بلورد',
                'en_name' => 'Balvard',
                'latitude' => '29.4231882',
                'longitude' => '56.0364532',
            ],
            [
                'id' => 876,
                'province_id' => 21,

                'name' => 'پاریز',
                'en_name' => 'Pariz',
                'latitude' => '29.8788094',
                'longitude' => '55.7269373',
            ],
            [
                'id' => 877,
                'province_id' => 21,

                'name' => 'خواجو شهر',
                'en_name' => 'Khajoo Shahr',
                'latitude' => '29.2724737',
                'longitude' => '55.8266402',
            ],
            [
                'id' => 878,
                'province_id' => 21,

                'name' => 'زیدآباد',
                'en_name' => 'Zeydabad',
                'latitude' => '29.6009233',
                'longitude' => '55.5268334',
            ],
            [
                'id' => 879,
                'province_id' => 21,

                'name' => 'سیرجان',
                'en_name' => 'Sirjan',
                'latitude' => '29.4854265',
                'longitude' => '55.5933768',
            ],
            [
                'id' => 880,
                'province_id' => 21,

                'name' => 'نجف شهر',
                'en_name' => 'Najaf Shahr',
                'latitude' => '29.397391',
                'longitude' => '55.7018206',
            ],
            [
                'id' => 881,
                'province_id' => 21,

                'name' => 'هماشهر',
                'en_name' => 'Homashahr',
                'latitude' => '29.6444971',
                'longitude' => '55.8026505',
            ],
            [
                'id' => 882,
                'province_id' => 21,

                'name' => 'جوزم',
                'en_name' => 'Jowzam',
                'latitude' => '30.5130258',
                'longitude' => '55.0225997',
            ],
            [
                'id' => 883,
                'province_id' => 21,

                'name' => 'خاتون اباد',
                'en_name' => 'KhatonAbad',
                'latitude' => '30.0094751',
                'longitude' => '55.4127002',
            ],
            [
                'id' => 884,
                'province_id' => 21,

                'name' => 'خورسند',
                'en_name' => 'Khursand',
                'latitude' => '30.1548491',
                'longitude' => '55.0778103',
            ],
            [
                'id' => 885,
                'province_id' => 21,

                'name' => 'دهج',
                'en_name' => 'Dehaj',
                'latitude' => '30.6937236',
                'longitude' => '54.8638772',
            ],
            [
                'id' => 886,
                'province_id' => 21,

                'name' => 'شهربابک',
                'en_name' => 'Shahrbabak',
                'latitude' => '30.1197677',
                'longitude' => '55.0923151',
            ],
            [
                'id' => 887,
                'province_id' => 21,

                'name' => 'دوساری',
                'en_name' => 'Dow Sari',
                'latitude' => '28.425',
                'longitude' => '57.9425',
            ],
            [
                'id' => 888,
                'province_id' => 21,

                'name' => 'عنبرآباد',
                'en_name' => 'Anbarabad',
                'latitude' => '28.4778558',
                'longitude' => '57.8243492',
            ],
            [
                'id' => 889,
                'province_id' => 21,

                'name' => 'مردهک',
                'en_name' => 'Mardehak',
                'latitude' => '28.3536391',
                'longitude' => '58.149991',
            ],
            [
                'id' => 890,
                'province_id' => 21,

                'name' => 'فاریاب',
                'en_name' => 'Faryab',
                'latitude' => '28.0909555',
                'longitude' => '57.2091577',
            ],
            [
                'id' => 891,
                'province_id' => 21,

                'name' => 'فهرج',
                'en_name' => 'Fahraj',
                'latitude' => '28.9458556',
                'longitude' => '58.8759898',
            ],
            [
                'id' => 892,
                'province_id' => 21,

                'name' => 'قلعه گنج',
                'en_name' => 'Ghalehganj',
                'latitude' => '27.5244069',
                'longitude' => '57.8530168',
            ],
            [
                'id' => 893,
                'province_id' => 21,

                'name' => 'اختیارآباد',
                'en_name' => 'Ekhteyarabad',
                'latitude' => '30.3272101',
                'longitude' => '56.9030855',
            ],
            [
                'id' => 894,
                'province_id' => 21,

                'name' => 'اندوهجرد',
                'en_name' => 'Andouhjerd',
                'latitude' => '30.2328544',
                'longitude' => '57.7355145',
            ],
            [
                'id' => 895,
                'province_id' => 21,

                'name' => 'باغین',
                'en_name' => 'Bagheyn',
                'latitude' => '30.1854766',
                'longitude' => '56.8039941',
            ],
            [
                'id' => 896,
                'province_id' => 21,

                'name' => 'جوپار',
                'en_name' => 'Joupar',
                'latitude' => '30.0560544',
                'longitude' => '57.0980928',
            ],
            [
                'id' => 897,
                'province_id' => 21,

                'name' => 'چترود',
                'en_name' => 'Chatroud',
                'latitude' => '30.6021246',
                'longitude' => '56.9042873',
            ],
            [
                'id' => 898,
                'province_id' => 21,

                'name' => 'راین',
                'en_name' => 'Rayen',
                'latitude' => '29.5926739',
                'longitude' => '57.4271677',
            ],
            [
                'id' => 899,
                'province_id' => 21,

                'name' => 'زنگی آباد',
                'en_name' => 'Zangiabad',
                'latitude' => '30.4046722',
                'longitude' => '56.8977855',
            ],
            [
                'id' => 900,
                'province_id' => 21,

                'name' => 'شهداد',
                'en_name' => 'Shahdad',
                'latitude' => '30.4219557',
                'longitude' => '57.690625',
            ],
            [
                'id' => 901,
                'province_id' => 21,

                'name' => 'کاظم آباد',
                'en_name' => 'Kazem Abad',
                'latitude' => '30.5669163',
                'longitude' => '56.8368673',
            ],
            [
                'id' => 902,
                'province_id' => 21,

                'name' => 'کرمان',
                'en_name' => 'Kerman',
                'latitude' => '30.2730323',
                'longitude' => '56.9962096',
            ],
            [
                'id' => 903,
                'province_id' => 21,

                'name' => 'گلباف',
                'en_name' => 'Golbāf',
                'latitude' => '29.8849282',
                'longitude' => '57.714486',
            ],
            [
                'id' => 904,
                'province_id' => 21,

                'name' => 'ماهان',
                'en_name' => 'Mahan',
                'latitude' => '30.0641442',
                'longitude' => '57.2560209',
            ],
            [
                'id' => 905,
                'province_id' => 21,

                'name' => 'محی آباد',
                'en_name' => 'MohyAbad',
                'latitude' => '30.0840413',
                'longitude' => '57.1525741',
            ],
            [
                'id' => 906,
                'province_id' => 21,

                'name' => 'کوهبنان',
                'en_name' => 'Kuhbanan ',
                'latitude' => '31.409816',
                'longitude' => '56.282159',
            ],
            [
                'id' => 907,
                'province_id' => 21,

                'name' => 'کیانشهر',
                'en_name' => 'Kian Shahr',
                'latitude' => '31.134444',
                'longitude' => '56.398056',
            ],
            [
                'id' => 908,
                'province_id' => 21,

                'name' => 'کهنوج',
                'en_name' => 'Kahnooj',
                'latitude' => '27.9793488',
                'longitude' => '57.6659248',
            ],
            [
                'id' => 909,
                'province_id' => 21,

                'name' => 'منوجان',
                'en_name' => 'Manoojan',
                'latitude' => '27.3682492',
                'longitude' => '57.2028964',
            ],
            [
                'id' => 910,
                'province_id' => 21,

                'name' => 'نودژ',
                'en_name' => 'Nodej',
                'latitude' => '27.5319403',
                'longitude' => '57.4442051',
            ],
            [
                'id' => 911,
                'province_id' => 21,

                'name' => 'نرماشیر',
                'en_name' => 'Narmashir',
                'latitude' => '28.9531038',
                'longitude' => '58.6899197',
            ],
            [
                'id' => 912,
                'province_id' => 21,

                'name' => 'نظام شهر',
                'en_name' => 'Nezamshahr',
                'latitude' => '28.916111',
                'longitude' => '58.550278',
            ],
            [
                'id' => 913,
                'province_id' => 22,

                'name' => 'اسلام آبادغرب',
                'en_name' => 'Eslamabad-e-Gharb',
                'latitude' => '34.1100924',
                'longitude' => '46.4957279',
            ],
            [
                'id' => 914,
                'province_id' => 22,

                'name' => 'حمیل',
                'en_name' => 'Hamil',
                'latitude' => '33.9373247',
                'longitude' => '46.7657732',
            ],
            [
                'id' => 915,
                'province_id' => 22,

                'name' => 'بانوره',
                'en_name' => 'Banevreh',
                'latitude' => '34.9691788',
                'longitude' => '46.3502883',
            ],
            [
                'id' => 916,
                'province_id' => 22,

                'name' => 'باینگان',
                'en_name' => 'Bayangan',
                'latitude' => '34.9808804',
                'longitude' => '46.2678587',
            ],
            [
                'id' => 917,
                'province_id' => 22,

                'name' => 'پاوه',
                'en_name' => 'Paveh',
                'latitude' => '35.0454192',
                'longitude' => '46.343765',
            ],
            [
                'id' => 918,
                'province_id' => 22,

                'name' => 'نودشه',
                'en_name' => 'Nowdeshah',
                'latitude' => '35.1820513',
                'longitude' => '46.2496412',
            ],
            [
                'id' => 919,
                'province_id' => 22,

                'name' => 'نوسود',
                'en_name' => 'Nowsud',
                'latitude' => '35.161354',
                'longitude' => '46.2001169',
            ],
            [
                'id' => 920,
                'province_id' => 22,

                'name' => 'ازگله',
                'en_name' => 'Ezgeleh',
                'latitude' => '34.833144',
                'longitude' => '45.8325363',
            ],
            [
                'id' => 921,
                'province_id' => 22,

                'name' => 'تازه آباد',
                'en_name' => 'azeh Abad',
                'latitude' => '34.4969898',
                'longitude' => '47.040174',
            ],
            [
                'id' => 922,
                'province_id' => 22,

                'name' => 'جوانرود',
                'en_name' => 'Javanrud',
                'latitude' => '34.8056264',
                'longitude' => '46.4782188',
            ],
            [
                'id' => 923,
                'province_id' => 22,

                'name' => 'ریجاب',
                'en_name' => 'Rijab',
                'latitude' => '34.4803029',
                'longitude' => '46.0014356',
            ],
            [
                'id' => 924,
                'province_id' => 22,

                'name' => 'کرند',
                'en_name' => 'Kerend-e Gharb',
                'latitude' => '34.278016',
                'longitude' => '46.2267029',
            ],
            [
                'id' => 925,
                'province_id' => 22,

                'name' => 'گهواره',
                'en_name' => 'Gahvareh',
                'latitude' => '34.3441622',
                'longitude' => '46.4110136',
            ],
            [
                'id' => 926,
                'province_id' => 22,

                'name' => 'روانسر',
                'en_name' => 'Ravansar',
                'latitude' => '34.7090539',
                'longitude' => '46.6403688',
            ],
            [
                'id' => 927,
                'province_id' => 22,

                'name' => 'شاهو',
                'en_name' => 'Mansur-e Aqai',
                'latitude' => '34.936519',
                'longitude' => '46.4520835',
            ],
            [
                'id' => 928,
                'province_id' => 22,

                'name' => 'سرپل ذهاب',
                'en_name' => 'Sarpol Zahab',
                'latitude' => '34.4592223',
                'longitude' => '45.8457755',
            ],
            [
                'id' => 929,
                'province_id' => 22,

                'name' => 'سطر',
                'en_name' => 'Satar',
                'latitude' => '34.8115128',
                'longitude' => '47.4601221',
            ],
            [
                'id' => 930,
                'province_id' => 22,

                'name' => 'سنقر',
                'en_name' => 'Sonqor',
                'latitude' => '34.7744618',
                'longitude' => '47.5662512',
            ],
            [
                'id' => 931,
                'province_id' => 22,

                'name' => 'صحنه',
                'en_name' => 'Sahneh',
                'latitude' => '34.4793187',
                'longitude' => '47.6680361',
            ],
            [
                'id' => 932,
                'province_id' => 22,

                'name' => 'میان راهان',
                'en_name' => 'Miyan Rahan',
                'latitude' => '34.5837575',
                'longitude' => '47.4415398',
            ],
            [
                'id' => 933,
                'province_id' => 22,

                'name' => 'سومار',
                'en_name' => 'Soomar',
                'latitude' => '33.8812465',
                'longitude' => '45.6319069',
            ],
            [
                'id' => 934,
                'province_id' => 22,

                'name' => 'قصرشیرین',
                'en_name' => 'Qasr-e Shirin',
                'latitude' => '34.5167207',
                'longitude' => '45.5709027',
            ],
            [
                'id' => 935,
                'province_id' => 22,

                'name' => 'رباط',
                'en_name' => 'Robat',
                'latitude' => '34.2654623',
                'longitude' => '46.7986677',
            ],
            [
                'id' => 936,
                'province_id' => 22,

                'name' => 'کرمانشاه',
                'en_name' => 'Kermanshah',
                'latitude' => '34.3372497',
                'longitude' => '47.0258332',
            ],
            [
                'id' => 937,
                'province_id' => 22,

                'name' => 'کوزران',
                'en_name' => 'Kuzaran',
                'latitude' => '34.4966536',
                'longitude' => '46.5967513',
            ],
            [
                'id' => 938,
                'province_id' => 22,

                'name' => 'هلشی',
                'en_name' => 'Halashi',
                'latitude' => '34.1098592',
                'longitude' => '47.0871127',
            ],
            [
                'id' => 939,
                'province_id' => 22,

                'name' => 'کنگاور',
                'en_name' => 'Kangavar',
                'latitude' => '34.5017084',
                'longitude' => '47.9441426',
            ],
            [
                'id' => 940,
                'province_id' => 22,

                'name' => 'گودین',
                'en_name' => 'Gowdin',
                'latitude' => '34.5078825',
                'longitude' => '48.0748415',
            ],
            [
                'id' => 941,
                'province_id' => 22,

                'name' => 'سرمست',
                'en_name' => 'Srmast',
                'latitude' => '34.5053719',
                'longitude' => '47.8398478',
            ],
            [
                'id' => 942,
                'province_id' => 22,

                'name' => 'گیلانغرب',
                'en_name' => 'Gilan Gharb',
                'latitude' => '34.1398952',
                'longitude' => '45.9149337',
            ],
            [
                'id' => 943,
                'province_id' => 22,

                'name' => 'بیستون',
                'en_name' => 'Bisotun',
                'latitude' => '34.3970564',
                'longitude' => '47.4375915',
            ],
            [
                'id' => 944,
                'province_id' => 22,

                'name' => 'هرسین',
                'en_name' => 'Harsin',
                'latitude' => '34.2708338',
                'longitude' => '47.5695426',
            ],
            [
                'id' => 945,
                'province_id' => 23,

                'name' => 'باشت',
                'en_name' => 'Basht',
                'latitude' => '30.362081',
                'longitude' => '51.1512708',
            ],
            [
                'id' => 946,
                'province_id' => 23,

                'name' => 'چیتاب',
                'en_name' => 'Chitab',
                'latitude' => '30.795',
                'longitude' => '51.325556',
            ],
            [
                'id' => 947,
                'province_id' => 23,

                'name' => 'گراب سفلی',
                'en_name' => 'Garab-e Sofla',
                'latitude' => '30.947222',
                'longitude' => '50.887778',
            ],
            [
                'id' => 948,
                'province_id' => 23,

                'name' => 'مادوان',
                'en_name' => 'Madavan',
                'latitude' => '30.7184472',
                'longitude' => '51.5361356',
            ],
            [
                'id' => 949,
                'province_id' => 23,

                'name' => 'مارگون',
                'en_name' => 'Margoon',
                'latitude' => '30.9931439',
                'longitude' => '51.0690129',
            ],
            [
                'id' => 950,
                'province_id' => 23,

                'name' => 'یاسوج',
                'en_name' => 'Yasuj',
                'latitude' => '30.6866956',
                'longitude' => '51.4964332',
            ],
            [
                'id' => 951,
                'province_id' => 23,

                'name' => 'لیکک',
                'en_name' => 'Likak',
                'latitude' => '30.895',
                'longitude' => '50.093056',
            ],
            [
                'id' => 952,
                'province_id' => 23,

                'name' => 'چرام',
                'en_name' => 'Choram',
                'latitude' => '30.7537464',
                'longitude' => '50.7329534',
            ],
            [
                'id' => 953,
                'province_id' => 23,

                'name' => 'سرفاریاب',
                'en_name' => 'sarfariyab',
                'latitude' => '30.807204',
                'longitude' => '50.8465035',
            ],
            [
                'id' => 954,
                'province_id' => 23,

                'name' => 'پاتاوه',
                'en_name' => 'Pataveh',
                'latitude' => '30.9566982',
                'longitude' => '51.264782',
            ],
            [
                'id' => 955,
                'province_id' => 23,

                'name' => 'سی سخت',
                'en_name' => 'Sisakht',
                'latitude' => '30.8563113',
                'longitude' => '51.4376663',
            ],
            [
                'id' => 956,
                'province_id' => 23,

                'name' => 'دهدشت',
                'en_name' => 'Dehdasht',
                'latitude' => '30.7888143',
                'longitude' => '50.5474917',
            ],
            [
                'id' => 957,
                'province_id' => 23,

                'name' => 'دیشموک',
                'en_name' => 'Dishmok',
                'latitude' => '31.2992068',
                'longitude' => '50.3926455',
            ],
            [
                'id' => 958,
                'province_id' => 23,

                'name' => 'سوق',
                'en_name' => 'Suq',
                'latitude' => '30.8590205',
                'longitude' => '50.4510855',
            ],
            [
                'id' => 959,
                'province_id' => 23,

                'name' => 'قلعه رییسی',
                'en_name' => 'Qaleh Raisi',
                'latitude' => '31.190000',
                'longitude' => '50.441944',
            ],
            [
                'id' => 960,
                'province_id' => 23,

                'name' => 'دوگنبدان',
                'en_name' => 'Dogonbadan',
                'latitude' => '30.3541273',
                'longitude' => '50.7578654',
            ],
            [
                'id' => 961,
                'province_id' => 23,

                'name' => 'لنده',
                'en_name' => 'Lendeh',
                'latitude' => '30.977818',
                'longitude' => '50.4032455',
            ],
            [
                'id' => 962,
                'province_id' => 24,

                'name' => 'آزادشهر',
                'en_name' => 'Azadshahr',
                'latitude' => '37.087737',
                'longitude' => '55.1554439',
            ],
            [
                'id' => 963,
                'province_id' => 24,

                'name' => 'نگین شهر',
                'en_name' => 'Neginshahr',
                'latitude' => '37.1393647',
                'longitude' => '55.1575899',
            ],
            [
                'id' => 964,
                'province_id' => 24,

                'name' => 'نوده خاندوز',
                'en_name' => 'Nowdeh Khanduz',
                'latitude' => '37.0744988',
                'longitude' => '55.2530873',
            ],
            [
                'id' => 965,
                'province_id' => 24,

                'name' => 'آق قلا',
                'en_name' => 'Aq Qala',
                'latitude' => '37.0120417',
                'longitude' => '54.4406031',
            ],
            [
                'id' => 966,
                'province_id' => 24,

                'name' => 'انبارالوم',
                'en_name' => 'Anbar Olum',
                'latitude' => '37.1330009',
                'longitude' => '54.6123075',
            ],
            [
                'id' => 967,
                'province_id' => 24,

                'name' => 'بندرگز',
                'en_name' => 'Bandar-e Gaz',
                'latitude' => '36.774167',
                'longitude' => '53.948056',
            ],
            [
                'id' => 968,
                'province_id' => 24,

                'name' => 'نوکنده',
                'en_name' => 'Nowkandeh',
                'latitude' => '36.7405184',
                'longitude' => '53.8839907',
            ],
            [
                'id' => 969,
                'province_id' => 24,

                'name' => 'بندرتركمن',
                'en_name' => 'Bandar Torkaman',
                'latitude' => '36.9050765',
                'longitude' => '54.0352673',
            ],
            [
                'id' => 970,
                'province_id' => 24,

                'name' => 'تاتار علیا',
                'en_name' => 'Tatar Olia',
                'latitude' => '37.1110075',
                'longitude' => '55.0427056',
            ],
            [
                'id' => 971,
                'province_id' => 24,

                'name' => 'خان ببین',
                'en_name' => 'Khānbebin',
                'latitude' => '37.0094741',
                'longitude' => '54.9796414',
            ],
            [
                'id' => 972,
                'province_id' => 24,

                'name' => 'دلند',
                'en_name' => 'Daland',
                'latitude' => '37.0346586',
                'longitude' => '55.0371266',
            ],
            [
                'id' => 973,
                'province_id' => 24,

                'name' => 'رامیان',
                'en_name' => 'Ramian',
                'latitude' => '37.0179365',
                'longitude' => '55.1247595',
            ],
            [
                'id' => 974,
                'province_id' => 24,

                'name' => 'سنگدوین',
                'en_name' => 'Sangdevin',
                'latitude' => '36.997934',
                'longitude' => '54.8526335',
            ],
            [
                'id' => 975,
                'province_id' => 24,

                'name' => 'علي آباد كتول',
                'en_name' => 'Aliabad-e-Katul',
                'latitude' => '36.9101639',
                'longitude' => '54.8390721',
            ],
            [
                'id' => 976,
                'province_id' => 24,

                'name' => 'فاضل آباد',
                'en_name' => 'Fazelabad',
                'latitude' => '36.8941021',
                'longitude' => '54.7309684',
            ],
            [
                'id' => 977,
                'province_id' => 24,

                'name' => 'مزرعه',
                'en_name' => 'Mazraeh',
                'latitude' => '36.9538611',
                'longitude' => '54.854715',
            ],
            [
                'id' => 978,
                'province_id' => 24,

                'name' => 'کردکوی',
                'en_name' => 'Kordkuy',
                'latitude' => '36.7907186',
                'longitude' => '54.0889549',
            ],
            [
                'id' => 979,
                'province_id' => 24,

                'name' => 'فراغی',
                'en_name' => 'Faraqi',
                'latitude' => '37.2603586',
                'longitude' => '55.1663549',
            ],
            [
                'id' => 980,
                'province_id' => 24,

                'name' => 'کلاله',
                'en_name' => 'Kalaleh',
                'latitude' => '37.3781846',
                'longitude' => '55.4803864',
            ],
            [
                'id' => 981,
                'province_id' => 24,

                'name' => 'گالیکش',
                'en_name' => 'Galikesh',
                'latitude' => '37.2714888',
                'longitude' => '55.4124211',
            ],
            [
                'id' => 982,
                'province_id' => 24,

                'name' => 'جلین',
                'en_name' => 'Jelin',
                'latitude' => '36.8512769',
                'longitude' => '54.527936',
            ],
            [
                'id' => 983,
                'province_id' => 24,

                'name' => 'سرخنکلاته',
                'en_name' => 'Sarkhon Kalateh',
                'latitude' => '36.891389',
                'longitude' => '54.569167',
            ],
            [
                'id' => 984,
                'province_id' => 24,

                'name' => 'گرگان',
                'en_name' => 'Gorgan',
                'latitude' => '36.8504193',
                'longitude' => '54.368023',
            ],
            [
                'id' => 985,
                'province_id' => 24,

                'name' => 'سیمین شهر',
                'en_name' => 'Siminshahr',
                'latitude' => '37.0127616',
                'longitude' => '54.2158125',
            ],
            [
                'id' => 986,
                'province_id' => 24,

                'name' => 'گمیش تپه',
                'en_name' => 'Gomish Tepe',
                'latitude' => '37.071667',
                'longitude' => '54.076667',
            ],
            [
                'id' => 987,
                'province_id' => 24,

                'name' => 'اینچه برون',
                'en_name' => 'Incheboron',
                'latitude' => '37.454224',
                'longitude' => '54.7154116',
            ],
            [
                'id' => 988,
                'province_id' => 24,

                'name' => 'گنبدکاووس',
                'en_name' => 'Gonbad Kavus',
                'latitude' => '37.2438514',
                'longitude' => '55.124457',
            ],
            [
                'id' => 989,
                'province_id' => 24,

                'name' => 'مراوه',
                'en_name' => 'Maraveh',
                'latitude' => '37.904167',
                'longitude' => '55.955833',
            ],
            [
                'id' => 990,
                'province_id' => 24,

                'name' => 'مینودشت',
                'en_name' => 'Minudasht',
                'latitude' => '37.227131',
                'longitude' => '55.3549145',
            ],
            [
                'id' => 991,
                'province_id' => 25,

                'name' => 'آستارا',
                'en_name' => 'Astara',
                'latitude' => '38.4237879',
                'longitude' => '48.8178772',
            ],
            [
                'id' => 992,
                'province_id' => 25,

                'name' => 'لوندویل',
                'en_name' => 'Lavandvil',
                'latitude' => '38.3077164',
                'longitude' => '48.8460729',
            ],
            [
                'id' => 993,
                'province_id' => 25,

                'name' => 'آستانه اشرفیه',
                'en_name' => 'Astaneh-ye Ashrafiyeh',
                'latitude' => '37.2650703',
                'longitude' => '49.9196036',
            ],
            [
                'id' => 994,
                'province_id' => 25,

                'name' => 'کیاشهر',
                'en_name' => 'Kiashahr',
                'latitude' => '37.4168279',
                'longitude' => '49.9292559',
            ],
            [
                'id' => 995,
                'province_id' => 25,

                'name' => 'املش',
                'en_name' => 'Amlash',
                'latitude' => '37.092468',
                'longitude' => '50.1731441',
            ],
            [
                'id' => 996,
                'province_id' => 25,

                'name' => 'رانکوه',
                'en_name' => 'Ranekouh',
                'latitude' => '37.0522969',
                'longitude' => '50.2179048',
            ],
            [
                'id' => 997,
                'province_id' => 25,

                'name' => 'بندرانزلی',
                'en_name' => 'Bandar Anzali',
                'latitude' => '37.4744427',
                'longitude' => '49.4149369',
            ],
            [
                'id' => 998,
                'province_id' => 25,

                'name' => 'خشکبیجار',
                'en_name' => 'Khoshkebijar',
                'latitude' => '37.374793',
                'longitude' => '49.739227',
            ],
            [
                'id' => 999,
                'province_id' => 25,

                'name' => 'خمام',
                'en_name' => 'Khomam',
                'latitude' => '37.3874949',
                'longitude' => '49.6394919',
            ],
            [
                'id' => 1000,
                'province_id' => 25,

                'name' => 'رشت',
                'en_name' => 'Rasht',
                'latitude' => '37.2442326',
                'longitude' => '49.5163226',
            ],
            [
                'id' => 1001,
                'province_id' => 25,

                'name' => 'سنگر',
                'en_name' => 'Sangar',
                'latitude' => '37.1796561',
                'longitude' => '49.6853278',
            ],
            [
                'id' => 1002,
                'province_id' => 25,

                'name' => 'کوچصفهان',
                'en_name' => 'Kuchesfahan',
                'latitude' => '37.2783804',
                'longitude' => '49.7685995',
            ],
            [
                'id' => 1003,
                'province_id' => 25,

                'name' => 'لشت نشاء',
                'en_name' => 'Lasht-e Nesha',
                'latitude' => '37.3601866',
                'longitude' => '49.8450886',
            ],
            [
                'id' => 1004,
                'province_id' => 25,

                'name' => 'لولمان',
                'en_name' => 'Louleman',
                'latitude' => '37.2574792',
                'longitude' => '49.8074305',
            ],
            [
                'id' => 1005,
                'province_id' => 25,

                'name' => 'پره سر',
                'en_name' => 'Paresar',
                'latitude' => '37.6017296',
                'longitude' => '49.0639121',
            ],
            [
                'id' => 1006,
                'province_id' => 25,

                'name' => 'رضوانشهر',
                'en_name' => 'Rezvanshahr',
                'latitude' => '37.5620528',
                'longitude' => '49.1260738',
            ],
            [
                'id' => 1007,
                'province_id' => 25,

                'name' => 'بره سر',
                'en_name' => 'Barehsar',
                'latitude' => '36.775991',
                'longitude' => '49.7457504',
            ],
            [
                'id' => 1008,
                'province_id' => 25,

                'name' => 'توتکابن',
                'en_name' => 'Tutkabon',
                'latitude' => '36.8909044',
                'longitude' => '49.5214748',
            ],
            [
                'id' => 1009,
                'province_id' => 25,

                'name' => 'جیرنده',
                'en_name' => 'Jirindih',
                'latitude' => '36.7005444',
                'longitude' => '49.7801685',
            ],
            [
                'id' => 1010,
                'province_id' => 25,

                'name' => 'رستم آباد',
                'en_name' => 'Rostamabad',
                'latitude' => '36.8994899',
                'longitude' => '49.4736241',
            ],
            [
                'id' => 1011,
                'province_id' => 25,

                'name' => 'رودبار',
                'en_name' => 'Rudbar',
                'latitude' => '36.8136716',
                'longitude' => '49.3891233',
            ],
            [
                'id' => 1012,
                'province_id' => 25,

                'name' => 'لوشان',
                'en_name' => 'Lowshan',
                'latitude' => '36.6321694',
                'longitude' => '49.4977264',
            ],
            [
                'id' => 1013,
                'province_id' => 25,

                'name' => 'منجیل',
                'en_name' => 'Manjil',
                'latitude' => '36.7370844',
                'longitude' => '49.3912749',
            ],
            [
                'id' => 1014,
                'province_id' => 25,

                'name' => 'چابکسر',
                'en_name' => 'Chaboksar',
                'latitude' => '36.9750583',
                'longitude' => '50.5466493',
            ],
            [
                'id' => 1015,
                'province_id' => 25,

                'name' => 'رحیم آباد',
                'en_name' => 'Rahimabad',
                'latitude' => '37.0287422',
                'longitude' => '50.3257194',
            ],
            [
                'id' => 1016,
                'province_id' => 25,

                'name' => 'رودسر',
                'en_name' => 'Rudsar',
                'latitude' => '37.1385881',
                'longitude' => '50.2668852',
            ],
            [
                'id' => 1017,
                'province_id' => 25,

                'name' => 'کلاچای',
                'en_name' => 'Kelachay',
                'latitude' => '37.0770733',
                'longitude' => '50.3803073',
            ],
            [
                'id' => 1018,
                'province_id' => 25,

                'name' => 'واجارگاه',
                'en_name' => 'Vajargah',
                'latitude' => '37.040833',
                'longitude' => '50.408611',
            ],
            [
                'id' => 1019,
                'province_id' => 25,

                'name' => 'دیلمان',
                'en_name' => 'Deylaman',
                'latitude' => '36.8860901',
                'longitude' => '49.9002993',
            ],
            [
                'id' => 1020,
                'province_id' => 25,

                'name' => 'سیاهکل',
                'en_name' => 'Siahkal',
                'latitude' => '37.1514141',
                'longitude' => '49.8418159',
            ],
            [
                'id' => 1021,
                'province_id' => 25,

                'name' => 'احمدسرگوراب',
                'en_name' => 'Ahmadsargurab',
                'latitude' => '37.128056',
                'longitude' => '49.366667',
            ],
            [
                'id' => 1022,
                'province_id' => 25,

                'name' => 'شفت',
                'en_name' => 'Shaft',
                'latitude' => '37.0648311',
                'longitude' => '49.1777137',
            ],
            [
                'id' => 1023,
                'province_id' => 25,

                'name' => 'صومعه سرا',
                'en_name' => 'Someh Sara',
                'latitude' => '37.3024589',
                'longitude' => '49.3028682',
            ],
            [
                'id' => 1024,
                'province_id' => 25,

                'name' => 'گوراب زرمیخ',
                'en_name' => 'Gurab Zarmikh',
                'latitude' => '37.2982928',
                'longitude' => '49.2050598',
            ],
            [
                'id' => 1025,
                'province_id' => 25,

                'name' => 'مرجقل',
                'en_name' => 'Marjaghal',
                'latitude' => '37.275556',
                'longitude' => '49.362778',
            ],
            [
                'id' => 1026,
                'province_id' => 25,

                'name' => 'اسالم',
                'en_name' => 'Asalem',
                'latitude' => '37.7200398',
                'longitude' => '48.9265817',
            ],
            [
                'id' => 1027,
                'province_id' => 25,

                'name' => 'چوبر',
                'en_name' => 'Choobar',
                'latitude' => '38.1835169',
                'longitude' => '48.8702779',
            ],
            [
                'id' => 1028,
                'province_id' => 25,

                'name' => 'حویق',
                'en_name' => 'Haviq',
                'latitude' => '38.1475',
                'longitude' => '48.892222',
            ],
            [
                'id' => 1029,
                'province_id' => 25,

                'name' => 'لیسار',
                'en_name' => 'Lisar',
                'latitude' => '37.9580697',
                'longitude' => '48.889675',
            ],
            [
                'id' => 1030,
                'province_id' => 25,

                'name' => 'هشتپر (تالش)',
                'en_name' => 'Talesh',
                'latitude' => '37.8088513',
                'longitude' => '48.8695473',
            ],
            [
                'id' => 1031,
                'province_id' => 25,

                'name' => 'فومن',
                'en_name' => 'Fuman',
                'latitude' => '37.2293706',
                'longitude' => '49.2935414',
            ],
            [
                'id' => 1032,
                'province_id' => 25,

                'name' => 'ماسوله',
                'en_name' => 'Masuleh',
                'latitude' => '37.1569968',
                'longitude' => '48.9758919',
            ],
            [
                'id' => 1033,
                'province_id' => 25,

                'name' => 'ماکلوان',
                'en_name' => 'Maklavan',
                'latitude' => '37.195556',
                'longitude' => '49.198611',
            ],
            [
                'id' => 1034,
                'province_id' => 25,

                'name' => 'رودبنه',
                'en_name' => 'Rod Baneh',
                'latitude' => '37.2555152',
                'longitude' => '50.0003243',
            ],
            [
                'id' => 1035,
                'province_id' => 25,

                'name' => 'لاهیجان',
                'en_name' => 'Lahijan',
                'latitude' => '37.2087543',
                'longitude' => '49.9799416',
            ],
            [
                'id' => 1036,
                'province_id' => 25,

                'name' => 'اطاقور',
                'en_name' => 'Otaghvar',
                'latitude' => '37.1088944',
                'longitude' => '50.1127196',
            ],
            [
                'id' => 1037,
                'province_id' => 25,

                'name' => 'چاف و چمخاله',
                'en_name' => 'Chaf and Chamkhaleh',
                'latitude' => '37.229444',
                'longitude' => '50.253889',
            ],
            [
                'id' => 1038,
                'province_id' => 25,

                'name' => 'شلمان',
                'en_name' => 'Shalman',
                'latitude' => '37.1591699',
                'longitude' => '50.2069295',
            ],
            [
                'id' => 1039,
                'province_id' => 25,

                'name' => 'کومله',
                'en_name' => 'Kumeleh',
                'latitude' => '37.152778',
                'longitude' => '50.176944',
            ],
            [
                'id' => 1040,
                'province_id' => 25,

                'name' => 'لنگرود',
                'en_name' => 'Langarud',
                'latitude' => '37.1910028',
                'longitude' => '50.1370952',
            ],
            [
                'id' => 1041,
                'province_id' => 25,

                'name' => 'بازار جمعه',
                'en_name' => 'Bazar Jomeh',
                'latitude' => '37.2794566',
                'longitude' => '49.3743604',
            ],
            [
                'id' => 1042,
                'province_id' => 25,

                'name' => 'ماسال',
                'en_name' => 'Masal',
                'latitude' => '37.3798171',
                'longitude' => '49.1147348',
            ],
            [
                'id' => 1043,
                'province_id' => 26,

                'name' => 'ازنا',
                'en_name' => 'Azna',
                'latitude' => '33.4530632',
                'longitude' => '49.4143575',
            ],
            [
                'id' => 1044,
                'province_id' => 26,

                'name' => 'مومن آباد',
                'en_name' => 'Momen Abad',
                'latitude' => '33.5852335',
                'longitude' => '49.5016907',
            ],
            [
                'id' => 1045,
                'province_id' => 26,

                'name' => 'الیگودرز',
                'en_name' => 'Aligudarz',
                'latitude' => '33.3954593',
                'longitude' => '49.6827636',
            ],
            [
                'id' => 1046,
                'province_id' => 26,

                'name' => 'شول آباد',
                'en_name' => 'Shool Abad',
                'latitude' => '33.1848116',
                'longitude' => '49.185555',
            ],
            [
                'id' => 1047,
                'province_id' => 26,

                'name' => 'اشترینان',
                'en_name' => 'Oshtorinan',
                'latitude' => '34.0154227',
                'longitude' => '48.6342858',
            ],
            [
                'id' => 1048,
                'province_id' => 26,

                'name' => 'بروجرد',
                'en_name' => 'Borujerd',
                'latitude' => '33.8879445',
                'longitude' => '48.6836791',
            ],
            [
                'id' => 1049,
                'province_id' => 26,

                'name' => 'پلدختر',
                'en_name' => 'Pol Dokhtar',
                'latitude' => '33.1461726',
                'longitude' => '47.7014994',
            ],
            [
                'id' => 1050,
                'province_id' => 26,

                'name' => 'معمولان',
                'en_name' => 'Mamulan',
                'latitude' => '33.3794758',
                'longitude' => '47.9517603',
            ],
            [
                'id' => 1051,
                'province_id' => 26,

                'name' => 'بیران شهر',
                'en_name' => 'Bayranshahr',
                'latitude' => '33.647778',
                'longitude' => '48.558889',
            ],
            [
                'id' => 1052,
                'province_id' => 26,

                'name' => 'خرم آباد',
                'en_name' => 'Khorramabad',
                'latitude' => '33.4910974',
                'longitude' => '48.2890295',
            ],
            [
                'id' => 1053,
                'province_id' => 26,

                'name' => 'زاغه',
                'en_name' => 'Zagheh',
                'latitude' => '33.498889',
                'longitude' => '48.708611',
            ],
            [
                'id' => 1054,
                'province_id' => 26,

                'name' => 'سپیددشت',
                'en_name' => 'Sepid Dasht',
                'latitude' => '33.2190312',
                'longitude' => '48.8815319',
            ],
            [
                'id' => 1055,
                'province_id' => 26,

                'name' => 'نورآباد',
                'en_name' => 'Nurabad',
                'latitude' => '34.0665521',
                'longitude' => '47.9351299',
            ],
            [
                'id' => 1056,
                'province_id' => 26,

                'name' => 'هفت چشمه',
                'en_name' => 'Haft Cheshmeh',
                'latitude' => '34.2072771',
                'longitude' => '47.761023',
            ],
            [
                'id' => 1057,
                'province_id' => 26,

                'name' => 'چالانچولان',
                'en_name' => 'Chalan Chulan',
                'latitude' => '33.6651745',
                'longitude' => '48.8995456',
            ],
            [
                'id' => 1058,
                'province_id' => 26,

                'name' => 'دورود',
                'en_name' => 'Dorud',
                'latitude' => '33.4921526',
                'longitude' => '49.0252012',
            ],
            [
                'id' => 1059,
                'province_id' => 26,

                'name' => 'سراب دوره',
                'en_name' => 'Sarab-e Dowreh',
                'latitude' => '33.563889',
                'longitude' => '48.022222',
            ],
            [
                'id' => 1060,
                'province_id' => 26,

                'name' => 'ویسیان',
                'en_name' => 'Veysian',
                'latitude' => '33.490833',
                'longitude' => '48.049167',
            ],
            [
                'id' => 1061,
                'province_id' => 26,

                'name' => 'چقابل',
                'en_name' => 'Chaqabol',
                'latitude' => '33.280833',
                'longitude' => '47.508889',
            ],
            [
                'id' => 1062,
                'province_id' => 26,

                'name' => 'الشتر',
                'en_name' => 'Aleshtar',
                'latitude' => '33.8668497',
                'longitude' => '48.243799',
            ],
            [
                'id' => 1063,
                'province_id' => 26,

                'name' => 'فیروزآباد',
                'en_name' => 'Firouz Abad',
                'latitude' => '33.8985961',
                'longitude' => '48.0989599',
            ],
            [
                'id' => 1064,
                'province_id' => 26,

                'name' => 'درب گنبد',
                'en_name' => 'Darb Gonbad',
                'latitude' => '33.6892903',
                'longitude' => '47.1461964',
            ],
            [
                'id' => 1065,
                'province_id' => 26,

                'name' => 'کوهدشت',
                'en_name' => 'Kuhdasht',
                'latitude' => '33.5313399',
                'longitude' => '47.5927733',
            ],
            [
                'id' => 1066,
                'province_id' => 26,

                'name' => 'کوهنانی',
                'en_name' => 'Kunani',
                'latitude' => '33.4029624',
                'longitude' => '47.3163556',
            ],
            [
                'id' => 1067,
                'province_id' => 26,

                'name' => 'گراب',
                'en_name' => 'Garab',
                'latitude' => '33.4851827',
                'longitude' => '48.4879768',
            ],
            [
                'id' => 1068,
                'province_id' => 27,

                'name' => 'آمل',
                'en_name' => 'Amol',
                'latitude' => '36.4660775',
                'longitude' => '52.323503',
            ],
            [
                'id' => 1069,
                'province_id' => 27,

                'name' => 'امامزاده عبدالله',
                'en_name' => 'Emamzade Abdollah',
                'latitude' => '36.4088625',
                'longitude' => '52.3006725',
            ],
            [
                'id' => 1070,
                'province_id' => 27,

                'name' => 'دابودشت',
                'en_name' => 'Dabudasht',
                'latitude' => '36.484444',
                'longitude' => '52.451667',
            ],
            [
                'id' => 1071,
                'province_id' => 27,

                'name' => 'رینه',
                'en_name' => 'Rineh',
                'latitude' => '35.8814957',
                'longitude' => '52.1600661',
            ],
            [
                'id' => 1072,
                'province_id' => 27,

                'name' => 'گزنک',
                'en_name' => 'Gazanak',
                'latitude' => '35.903148',
                'longitude' => '52.2180947',
            ],
            [
                'id' => 1073,
                'province_id' => 27,

                'name' => 'امیرکلا',
                'en_name' => 'Amir Kala',
                'latitude' => '36.598663',
                'longitude' => '52.6563119',
            ],
            [
                'id' => 1074,
                'province_id' => 27,

                'name' => 'بابل',
                'en_name' => 'Babol',
                'latitude' => '36.5384499',
                'longitude' => '52.6415536',
            ],
            [
                'id' => 1075,
                'province_id' => 27,

                'name' => 'خوش رودپی',
                'en_name' => 'Khoshroud Pey',
                'latitude' => '36.3720049',
                'longitude' => '52.5574993',
            ],
            [
                'id' => 1076,
                'province_id' => 27,

                'name' => 'زرگرمحله',
                'en_name' => 'Zargarmahalleh',
                'latitude' => '36.521389',
                'longitude' => '52.575556',
            ],
            [
                'id' => 1077,
                'province_id' => 27,

                'name' => 'گتاب',
                'en_name' => 'Gatab',
                'latitude' => '36.4298971',
                'longitude' => '52.6478576',
            ],
            [
                'id' => 1078,
                'province_id' => 27,

                'name' => 'گلوگاه',
                'en_name' => 'Galugah',
                'latitude' => '36.7279359',
                'longitude' => '53.8021926',
            ],
            [
                'id' => 1079,
                'province_id' => 27,

                'name' => 'مرزیکلا',
                'en_name' => 'Marzikola',
                'latitude' => '36.3600227',
                'longitude' => '52.7300406',
            ],
            [
                'id' => 1080,
                'province_id' => 27,

                'name' => 'بابلسر',
                'en_name' => 'Babolsar',
                'latitude' => '36.6978051',
                'longitude' => '52.6279693',
            ],
            [
                'id' => 1081,
                'province_id' => 27,

                'name' => 'بهنمیر',
                'en_name' => 'Bahnamir',
                'latitude' => '36.6719444',
                'longitude' => '52.7432583',
            ],
            [
                'id' => 1082,
                'province_id' => 27,

                'name' => 'کله بست',
                'en_name' => 'Kalleh Bast',
                'latitude' => '36.6419927',
                'longitude' => '52.6104675',
            ],
            [
                'id' => 1083,
                'province_id' => 27,

                'name' => 'بهشهر',
                'en_name' => 'Behshahr',
                'latitude' => '36.6910923',
                'longitude' => '53.4998125',
            ],
            [
                'id' => 1084,
                'province_id' => 27,

                'name' => 'خلیل شهر',
                'en_name' => 'Khalil Shahr',
                'latitude' => '36.6989184',
                'longitude' => '53.6232374',
            ],
            [
                'id' => 1085,
                'province_id' => 27,

                'name' => 'رستمکلا',
                'en_name' => 'Rostam kola',
                'latitude' => '36.6800976',
                'longitude' => '53.3981893',
            ],
            [
                'id' => 1086,
                'province_id' => 27,

                'name' => 'تنکابن',
                'en_name' => 'Tonekabon',
                'latitude' => '36.8160923',
                'longitude' => '50.8420867',
            ],
            [
                'id' => 1087,
                'province_id' => 27,

                'name' => 'خرم آباد',
                'en_name' => 'Khorramabad',
                'latitude' => '36.7818258',
                'longitude' => '50.8604549',
            ],
            [
                'id' => 1088,
                'province_id' => 27,

                'name' => 'شیرود',
                'en_name' => 'Shirud',
                'latitude' => '36.850888',
                'longitude' => '50.8032394',
            ],
            [
                'id' => 1089,
                'province_id' => 27,

                'name' => 'نشتارود',
                'en_name' => 'Nashtarud',
                'latitude' => '36.7478158',
                'longitude' => '51.0104119',
            ],
            [
                'id' => 1090,
                'province_id' => 27,

                'name' => 'جویبار',
                'en_name' => 'Juybar',
                'latitude' => '36.6427999',
                'longitude' => '52.8831624',
            ],
            [
                'id' => 1091,
                'province_id' => 27,

                'name' => 'کوهی خیل',
                'en_name' => 'Kuhi Khil',
                'latitude' => '36.6887766',
                'longitude' => '52.8984619',
            ],
            [
                'id' => 1092,
                'province_id' => 27,

                'name' => 'چالوس',
                'en_name' => 'Chalus',
                'latitude' => '36.656162',
                'longitude' => '51.3875837',
            ],
            [
                'id' => 1093,
                'province_id' => 27,

                'name' => 'مرزن آباد',
                'en_name' => 'Marzanabad',
                'latitude' => '36.4528379',
                'longitude' => '51.2850702',
            ],
            [
                'id' => 1094,
                'province_id' => 27,

                'name' => 'هچیرود',
                'en_name' => 'Hachiroud',
                'latitude' => '36.6822913',
                'longitude' => '51.3406505',
            ],
            [
                'id' => 1095,
                'province_id' => 27,

                'name' => 'رامسر',
                'en_name' => 'Ramsar',
                'latitude' => '36.9291406',
                'longitude' => '50.6019754',
            ],
            [
                'id' => 1096,
                'province_id' => 27,

                'name' => 'کتالم و سادات شهر',
                'en_name' => 'Ketalem and Sadat Shahr',
                'latitude' => '36.8765618',
                'longitude' => '50.7073973',
            ],
            [
                'id' => 1097,
                'province_id' => 27,

                'name' => 'پایین هولار',
                'en_name' => 'Paein Hoular',
                'latitude' => '36.4289262',
                'longitude' => '53.1310815',
            ],
            [
                'id' => 1098,
                'province_id' => 27,

                'name' => 'ساری',
                'en_name' => 'Sari',
                'latitude' => '36.5559826',
                'longitude' => '53.0374294',
            ],
            [
                'id' => 1099,
                'province_id' => 27,

                'name' => 'فریم',
                'en_name' => 'Farim',
                'latitude' => '36.623611',
                'longitude' => '52.541944',
            ],
            [
                'id' => 1100,
                'province_id' => 27,

                'name' => 'کیاسر',
                'en_name' => 'Kiasar',
                'latitude' => '36.2401662',
                'longitude' => '53.5325006',
            ],
            [
                'id' => 1101,
                'province_id' => 27,

                'name' => 'آلاشت',
                'en_name' => 'Alasht',
                'latitude' => '36.0655004',
                'longitude' => '52.8325009',
            ],
            [
                'id' => 1102,
                'province_id' => 27,

                'name' => 'پل سفید',
                'en_name' => 'Pol Sefid',
                'latitude' => '36.1153204',
                'longitude' => '53.0114037',
            ],
            [
                'id' => 1103,
                'province_id' => 27,

                'name' => 'زیرآب',
                'en_name' => 'Zirab',
                'latitude' => '36.1805586',
                'longitude' => '52.9535865',
            ],
            [
                'id' => 1104,
                'province_id' => 27,

                'name' => 'شیرگاه',
                'en_name' => 'Shirgah',
                'latitude' => '36.2974985',
                'longitude' => '52.8656994',
            ],
            [
                'id' => 1105,
                'province_id' => 27,

                'name' => 'کیاکلا',
                'en_name' => 'Kia Kola',
                'latitude' => '36.5833786',
                'longitude' => '52.7989625',
            ],
            [
                'id' => 1106,
                'province_id' => 27,

                'name' => 'سلمان شهر',
                'en_name' => 'Salman Shahr',
                'latitude' => '36.7006475',
                'longitude' => '51.1907529',
            ],
            [
                'id' => 1107,
                'province_id' => 27,

                'name' => 'عباس اباد',
                'en_name' => 'Abbasabad',
                'latitude' => '36.7245821',
                'longitude' => '51.0966395',
            ],
            [
                'id' => 1108,
                'province_id' => 27,

                'name' => 'کلارآباد',
                'en_name' => 'Kelarabad',
                'latitude' => '36.6874145',
                'longitude' => '51.2306071',
            ],
            [
                'id' => 1109,
                'province_id' => 27,

                'name' => 'فریدونکنار',
                'en_name' => 'Fereydunkenar',
                'latitude' => '36.6862789',
                'longitude' => '52.5073526',
            ],
            [
                'id' => 1110,
                'province_id' => 27,

                'name' => 'ارطه',
                'en_name' => 'Arateh',
                'latitude' => '36.4948606',
                'longitude' => '52.9262064',
            ],
            [
                'id' => 1111,
                'province_id' => 27,

                'name' => 'قایم شهر',
                'en_name' => 'Qaemshahr',
                'latitude' => '36.4620281',
                'longitude' => '52.8310413',
            ],
            [
                'id' => 1112,
                'province_id' => 27,

                'name' => 'کلاردشت',
                'en_name' => 'Kelardasht',
                'latitude' => '36.4931401',
                'longitude' => '51.1189766',
            ],
            [
                'id' => 1113,
                'province_id' => 27,

                'name' => 'گلوگاه',
                'en_name' => 'Galugah',
                'latitude' => '36.7279359',
                'longitude' => '53.8021926',
            ],
            [
                'id' => 1114,
                'province_id' => 27,

                'name' => 'سرخرود',
                'en_name' => 'Sorkh Roud',
                'latitude' => '36.6691581',
                'longitude' => '52.4425288',
            ],
            [
                'id' => 1115,
                'province_id' => 27,

                'name' => 'محمودآباد',
                'en_name' => 'Mahmudabad',
                'latitude' => '36.6281013',
                'longitude' => '52.2399606',
            ],
            [
                'id' => 1116,
                'province_id' => 27,

                'name' => 'سورک',
                'en_name' => 'Surak',
                'latitude' => '36.5968721',
                'longitude' => '53.2016803',
            ],
            [
                'id' => 1117,
                'province_id' => 27,

                'name' => 'نکا',
                'en_name' => 'Neka',
                'latitude' => '36.6477928',
                'longitude' => '53.2705591',
            ],
            [
                'id' => 1118,
                'province_id' => 27,

                'name' => 'ایزدشهر',
                'en_name' => 'Izadshahr',
                'latitude' => '36.5944494',
                'longitude' => '52.1198802',
            ],
            [
                'id' => 1119,
                'province_id' => 27,

                'name' => 'بلده',
                'en_name' => 'Baladeh',
                'latitude' => '36.1989228',
                'longitude' => '51.7976563',
            ],
            [
                'id' => 1120,
                'province_id' => 27,

                'name' => 'چمستان',
                'en_name' => 'Chamestan',
                'latitude' => '36.4786063',
                'longitude' => '52.1089764',
            ],
            [
                'id' => 1121,
                'province_id' => 27,

                'name' => 'رویان',
                'en_name' => 'Royan',
                'latitude' => '36.5673561',
                'longitude' => '51.9539625',
            ],
            [
                'id' => 1122,
                'province_id' => 27,

                'name' => 'نور',
                'en_name' => 'Nur',
                'latitude' => '36.5742476',
                'longitude' => '52.0117126',
            ],
            [
                'id' => 1123,
                'province_id' => 27,

                'name' => 'پول',
                'en_name' => 'Pul',
                'latitude' => '36.3980031',
                'longitude' => '51.5793513',
            ],
            [
                'id' => 1124,
                'province_id' => 27,

                'name' => 'کجور',
                'en_name' => 'Kojur',
                'latitude' => '36.3822637',
                'longitude' => '51.7239828',
            ],
            [
                'id' => 1125,
                'province_id' => 27,

                'name' => 'نوشهر',
                'en_name' => 'Nowshahr',
                'latitude' => '36.6503106',
                'longitude' => '51.4693374',
            ],
            [
                'id' => 1126,
                'province_id' => 28,

                'name' => 'آشتیان',
                'en_name' => 'Ashtian',
                'latitude' => '34.5234393',
                'longitude' => '49.9895094',
            ],
            [
                'id' => 1127,
                'province_id' => 28,

                'name' => 'اراک',
                'en_name' => 'Arak',
                'latitude' => '34.0732755',
                'longitude' => '49.6503687',
            ],
            [
                'id' => 1128,
                'province_id' => 28,

                'name' => 'داود آباد',
                'en_name' => 'Davoud Abad',
                'latitude' => '34.2952133',
                'longitude' => '49.8466444',
            ],
            [
                'id' => 1129,
                'province_id' => 28,

                'name' => 'ساروق',
                'en_name' => 'Saroogh',
                'latitude' => '34.4118836',
                'longitude' => '49.4946956',
            ],
            [
                'id' => 1130,
                'province_id' => 28,

                'name' => 'کارچان',
                'en_name' => 'Karchan',
                'latitude' => '34.0994117',
                'longitude' => '49.9286019',
            ],
            [
                'id' => 1131,
                'province_id' => 28,

                'name' => 'تفرش',
                'en_name' => 'Tafresh',
                'latitude' => '34.6959712',
                'longitude' => '50.0029955',
            ],
            [
                'id' => 1132,
                'province_id' => 28,

                'name' => 'خمین',
                'en_name' => 'Khomein',
                'latitude' => '33.6371091',
                'longitude' => '50.0342697',
            ],
            [
                'id' => 1133,
                'province_id' => 28,

                'name' => 'قورچی باشی',
                'en_name' => 'Ghurchi Bashi',
                'latitude' => '33.6753987',
                'longitude' => '49.8753977',
            ],
            [
                'id' => 1134,
                'province_id' => 28,

                'name' => 'جاورسیان',
                'en_name' => 'Javarseyan',
                'latitude' => '34.2555487',
                'longitude' => '49.3182278',
            ],
            [
                'id' => 1135,
                'province_id' => 28,

                'name' => 'خنداب',
                'en_name' => 'Khondab',
                'latitude' => '34.3945312',
                'longitude' => '49.1723798',
            ],
            [
                'id' => 1136,
                'province_id' => 28,

                'name' => 'دلیجان',
                'en_name' => 'Delijan',
                'latitude' => '33.9918684',
                'longitude' => '50.668044',
            ],
            [
                'id' => 1137,
                'province_id' => 28,

                'name' => 'نراق',
                'en_name' => 'Naragh',
                'latitude' => '34.0103896',
                'longitude' => '50.8314871',
            ],
            [
                'id' => 1138,
                'province_id' => 28,

                'name' => 'پرندک',
                'en_name' => 'Parandak',
                'latitude' => '35.3685266',
                'longitude' => '50.677228',
            ],
            [
                'id' => 1139,
                'province_id' => 28,

                'name' => 'خشکرود',
                'en_name' => 'Khoshkrud',
                'latitude' => '35.395262',
                'longitude' => '50.328927',
            ],
            [
                'id' => 1140,
                'province_id' => 28,

                'name' => 'رازقان',
                'en_name' => 'Razeqan',
                'latitude' => '35.3307678',
                'longitude' => '49.9511755',
            ],
            [
                'id' => 1141,
                'province_id' => 28,

                'name' => 'زاویه',
                'en_name' => 'Zavieh',
                'latitude' => '35.3772559',
                'longitude' => '50.550885',
            ],
            [
                'id' => 1142,
                'province_id' => 28,

                'name' => 'مامونیه',
                'en_name' => 'Mamuniyeh',
                'latitude' => '35.3040559',
                'longitude' => '50.4803967',
            ],
            [
                'id' => 1143,
                'province_id' => 28,

                'name' => 'آوه',
                'en_name' => 'Aveh',
                'latitude' => '34.8037213',
                'longitude' => '50.4072045',
            ],
            [
                'id' => 1144,
                'province_id' => 28,

                'name' => 'ساوه',
                'en_name' => 'Saveh',
                'latitude' => '35.0324431',
                'longitude' => '50.3315873',
            ],
            [
                'id' => 1145,
                'province_id' => 28,

                'name' => 'غرق آباد',
                'en_name' => 'Gharqabad',
                'latitude' => '35.1082178',
                'longitude' => '49.8218393',
            ],
            [
                'id' => 1146,
                'province_id' => 28,

                'name' => 'نوبران',
                'en_name' => 'Nowbaran',
                'latitude' => '35.1311747',
                'longitude' => '49.7007001',
            ],
            [
                'id' => 1147,
                'province_id' => 28,

                'name' => 'آستانه',
                'en_name' => 'Astaneh',
                'latitude' => '33.890833',
                'longitude' => '49.357778',
            ],
            [
                'id' => 1148,
                'province_id' => 28,

                'name' => 'توره',
                'en_name' => 'Tureh',
                'latitude' => '34.0444097',
                'longitude' => '49.2837667',
            ],
            [
                'id' => 1149,
                'province_id' => 28,

                'name' => 'شازند',
                'en_name' => 'Shazand',
                'latitude' => '33.9352559',
                'longitude' => '49.3882225',
            ],
            [
                'id' => 1150,
                'province_id' => 28,

                'name' => 'شهباز',
                'en_name' => 'Shahbaz',
                'latitude' => '33.9354129',
                'longitude' => '49.3356919',
            ],
            [
                'id' => 1151,
                'province_id' => 28,

                'name' => 'مهاجران',
                'en_name' => 'Mohajeran',
                'latitude' => '34.0493146',
                'longitude' => '49.4174479',
            ],
            [
                'id' => 1152,
                'province_id' => 28,

                'name' => 'هندودر',
                'en_name' => 'Hendoudar',
                'latitude' => '33.7809931',
                'longitude' => '49.226625',
            ],
            [
                'id' => 1153,
                'province_id' => 28,

                'name' => 'خنجین',
                'en_name' => 'Khenejin',
                'latitude' => '34.7585192',
                'longitude' => '49.5223761',
            ],
            [
                'id' => 1154,
                'province_id' => 28,

                'name' => 'فرمهین',
                'en_name' => 'Farmahin',
                'latitude' => '34.5056686',
                'longitude' => '49.6697042',
            ],
            [
                'id' => 1155,
                'province_id' => 28,

                'name' => 'کمیجان',
                'en_name' => 'Komijan',
                'latitude' => '34.7130741',
                'longitude' => '49.3050956',
            ],
            [
                'id' => 1156,
                'province_id' => 28,

                'name' => 'میلاجرد',
                'en_name' => 'Milajerd',
                'latitude' => '34.6216597',
                'longitude' => '49.200468',
            ],
            [
                'id' => 1157,
                'province_id' => 28,

                'name' => 'محلات',
                'en_name' => 'Mahalat',
                'latitude' => '33.9049314',
                'longitude' => '50.4410647',
            ],
            [
                'id' => 1158,
                'province_id' => 28,

                'name' => 'نیمور',
                'en_name' => 'Nimvar',
                'latitude' => '33.8864747',
                'longitude' => '50.5631053',
            ],
            [
                'id' => 1159,
                'province_id' => 29,

                'name' => 'ابوموسی',
                'en_name' => 'Abumusa ',
                'latitude' => '27.198056',
                'longitude' => '54.368611',
            ],
            [
                'id' => 1160,
                'province_id' => 29,

                'name' => 'بستک',
                'en_name' => 'Bastak',
                'latitude' => '27.1963171',
                'longitude' => '54.3425415',
            ],
            [
                'id' => 1161,
                'province_id' => 29,

                'name' => 'جناح',
                'en_name' => 'Janah',
                'latitude' => '27.0275508',
                'longitude' => '54.2712805',
            ],
            [
                'id' => 1162,
                'province_id' => 29,

                'name' => 'سردشت',
                'en_name' => 'Sardasht Bashagard',
                'latitude' => '26.458719',
                'longitude' => '57.884259',
            ],
            [
                'id' => 1163,
                'province_id' => 29,

                'name' => 'گوهران',
                'en_name' => 'Gouharan',
                'latitude' => '26.5961536',
                'longitude' => '57.8870701',
            ],
            [
                'id' => 1164,
                'province_id' => 29,

                'name' => 'بندرعباس',
                'en_name' => 'Bandar Abbas',
                'latitude' => '27.1898642',
                'longitude' => '56.0978118',
            ],
            [
                'id' => 1165,
                'province_id' => 29,

                'name' => 'تازیان پایین',
                'en_name' => 'Tazian',
                'latitude' => '27.29016',
                'longitude' => '56.152103',
            ],
            [
                'id' => 1166,
                'province_id' => 29,

                'name' => 'تخت',
                'en_name' => 'Takht',
                'latitude' => '27.5035693',
                'longitude' => '56.6273116',
            ],
            [
                'id' => 1167,
                'province_id' => 29,

                'name' => 'فین',
                'en_name' => 'Fin',
                'latitude' => '27.6328579',
                'longitude' => '55.8818721',
            ],
            [
                'id' => 1168,
                'province_id' => 29,

                'name' => 'قلعه قاضی',
                'en_name' => 'Qaleh Qazi',
                'latitude' => '27.444722',
                'longitude' => '56.547778',
            ],
            [
                'id' => 1169,
                'province_id' => 29,

                'name' => 'بندرلنگه',
                'en_name' => 'Bandar Lengeh',
                'latitude' => '26.5640614',
                'longitude' => '54.8558193',
            ],
            [
                'id' => 1170,
                'province_id' => 29,

                'name' => 'چارک',
                'en_name' => 'Bandar Charak',
                'latitude' => '26.730556',
                'longitude' => '54.274722',
            ],
            [
                'id' => 1171,
                'province_id' => 29,

                'name' => 'کنگ',
                'en_name' => 'Bandar Kong',
                'latitude' => '26.6028565',
                'longitude' => '54.9298058',
            ],
            [
                'id' => 1172,
                'province_id' => 29,

                'name' => 'کیش',
                'en_name' => 'Kish',
                'latitude' => '26.5344638',
                'longitude' => '53.9388418',
            ],
            [
                'id' => 1173,
                'province_id' => 29,

                'name' => 'لمزان',
                'en_name' => 'Lemazan',
                'latitude' => '27.0536913',
                'longitude' => '54.8364108',
            ],
            [
                'id' => 1174,
                'province_id' => 29,

                'name' => 'پارسیان',
                'en_name' => 'Parsian',
                'latitude' => '27.2167175',
                'longitude' => '53.0218647',
            ],
            [
                'id' => 1175,
                'province_id' => 29,

                'name' => 'دشتی',
                'en_name' => 'Dashti',
                'latitude' => '27.1791887',
                'longitude' => '52.99824',
            ],
            [
                'id' => 1176,
                'province_id' => 29,

                'name' => 'کوشکنار',
                'en_name' => 'Koshkonar',
                'latitude' => '27.2501272',
                'longitude' => '52.8571558',
            ],
            [
                'id' => 1177,
                'province_id' => 29,

                'name' => 'بندرجاسک',
                'en_name' => 'Bandar-e-Jask',
                'latitude' => '25.6538514',
                'longitude' => '57.769956',
            ],
            [
                'id' => 1178,
                'province_id' => 29,

                'name' => 'حاجی اباد',
                'en_name' => 'Haji Abad',
                'latitude' => '28.3135214',
                'longitude' => '55.8962057',
            ],
            [
                'id' => 1179,
                'province_id' => 29,

                'name' => 'سرگز',
                'en_name' => 'Sargaz',
                'latitude' => '28.42563',
                'longitude' => '55.70177',
            ],
            [
                'id' => 1180,
                'province_id' => 29,

                'name' => 'فارغان',
                'en_name' => 'Fareghan',
                'latitude' => '28.0078521',
                'longitude' => '56.2445926',
            ],
            [
                'id' => 1181,
                'province_id' => 29,

                'name' => 'خمیر',
                'en_name' => 'Bandar Khamir',
                'latitude' => '26.9518527',
                'longitude' => '55.5726884',
            ],
            [
                'id' => 1182,
                'province_id' => 29,

                'name' => 'رویدر',
                'en_name' => 'Ruydar',
                'latitude' => '27.460031',
                'longitude' => '55.4082582',
            ],
            [
                'id' => 1183,
                'province_id' => 29,

                'name' => 'بیکاء',
                'en_name' => 'Bikah',
                'latitude' => '27.3540436',
                'longitude' => '57.1699332',
            ],
            [
                'id' => 1184,
                'province_id' => 29,

                'name' => 'دهبارز',
                'en_name' => 'Dehbārez',
                'latitude' => '27.4484105',
                'longitude' => '57.1667569',
            ],
            [
                'id' => 1185,
                'province_id' => 29,

                'name' => 'زیارتعلی',
                'en_name' => 'Ziyārat Ali',
                'latitude' => '27.7355773',
                'longitude' => '57.2107242',
            ],
            [
                'id' => 1186,
                'province_id' => 29,

                'name' => 'سیریک',
                'en_name' => 'Sirik',
                'latitude' => '26.5273161',
                'longitude' => '57.0900247',
            ],
            [
                'id' => 1187,
                'province_id' => 29,

                'name' => 'کوهستک',
                'en_name' => 'Kouhestak',
                'latitude' => '26.8042685',
                'longitude' => '57.0188713',
            ],
            [
                'id' => 1188,
                'province_id' => 29,

                'name' => 'گروک',
                'en_name' => 'Gerouk',
                'latitude' => '26.5885649',
                'longitude' => '57.0851755',
            ],
            [
                'id' => 1189,
                'province_id' => 29,

                'name' => 'درگهان',
                'en_name' => 'Dargahan',
                'latitude' => '26.9583369',
                'longitude' => '56.0431693',
            ],
            [
                'id' => 1190,
                'province_id' => 29,

                'name' => 'سوزا',
                'en_name' => 'Suzā',
                'latitude' => '26.7772403',
                'longitude' => '56.0437916',
            ],
            [
                'id' => 1191,
                'province_id' => 29,

                'name' => 'قشم',
                'en_name' => 'Qeshm',
                'latitude' => '26.958177',
                'longitude' => '56.1888022',
            ],
            [
                'id' => 1192,
                'province_id' => 29,

                'name' => 'هرمز',
                'en_name' => 'Hormuz',
                'latitude' => '27.095',
                'longitude' => '56.452778',
            ],
            [
                'id' => 1193,
                'province_id' => 29,

                'name' => 'تیرور',
                'en_name' => 'Tirour',
                'latitude' => '27.3379388',
                'longitude' => '56.9531035',
            ],
            [
                'id' => 1194,
                'province_id' => 29,

                'name' => 'سندرک',
                'en_name' => 'Senderk',
                'latitude' => '26.8381629',
                'longitude' => '57.4178873',
            ],
            [
                'id' => 1195,
                'province_id' => 29,

                'name' => 'میناب',
                'en_name' => 'Minab',
                'latitude' => '27.1383266',
                'longitude' => '57.0105861',
            ],
            [
                'id' => 1196,
                'province_id' => 29,

                'name' => 'هشتبندی',
                'en_name' => 'Hasht Bandi',
                'latitude' => '27.1458624',
                'longitude' => '57.4332651',
            ],
            [
                'id' => 1197,
                'province_id' => 30,

                'name' => 'آجین',
                'en_name' => 'Ajin',
                'latitude' => '34.7325128',
                'longitude' => '47.9186725',
            ],
            [
                'id' => 1198,
                'province_id' => 30,

                'name' => 'اسدآباد',
                'en_name' => 'Asadabad',
                'latitude' => '34.7812016',
                'longitude' => '48.1020925',
            ],
            [
                'id' => 1199,
                'province_id' => 30,

                'name' => 'بهار',
                'en_name' => 'Bahar',
                'latitude' => '34.8938866',
                'longitude' => '48.4032292',
            ],
            [
                'id' => 1200,
                'province_id' => 30,

                'name' => 'صالح آباد',
                'en_name' => 'Salehabad',
                'latitude' => '34.9230963',
                'longitude' => '48.3345866',
            ],
            [
                'id' => 1201,
                'province_id' => 30,

                'name' => 'لالجین',
                'en_name' => 'Lalejin',
                'latitude' => '34.9747239',
                'longitude' => '48.4643625',
            ],
            [
                'id' => 1202,
                'province_id' => 30,

                'name' => 'مهاجران',
                'en_name' => 'Mohajeran',
                'latitude' => '35.0765621',
                'longitude' => '48.607142',
            ],
            [
                'id' => 1203,
                'province_id' => 30,

                'name' => 'تویسرکان',
                'en_name' => 'Tuyserkan',
                'latitude' => '34.5481572',
                'longitude' => '48.4323851',
            ],
            [
                'id' => 1204,
                'province_id' => 30,

                'name' => 'سرکان',
                'en_name' => 'Serkan',
                'latitude' => '34.6007012',
                'longitude' => '48.4386294',
            ],
            [
                'id' => 1205,
                'province_id' => 30,

                'name' => 'فرسفج',
                'en_name' => 'Farasfaj',
                'latitude' => '34.4862633',
                'longitude' => '48.2814789',
            ],
            [
                'id' => 1206,
                'province_id' => 30,

                'name' => 'دمق',
                'en_name' => 'Damaq',
                'latitude' => '35.4419398',
                'longitude' => '48.8138008',
            ],
            [
                'id' => 1207,
                'province_id' => 30,

                'name' => 'رزن',
                'en_name' => 'Razan',
                'latitude' => '35.3879115',
                'longitude' => '49.0176485',
            ],
            [
                'id' => 1208,
                'province_id' => 30,

                'name' => 'قروه درجزین',
                'en_name' => 'Qorveh-e Darjazin',
                'latitude' => '35.3126474',
                'longitude' => '49.0899181',
            ],
            [
                'id' => 1209,
                'province_id' => 30,

                'name' => 'فامنین',
                'en_name' => 'Famenin',
                'latitude' => '35.1130084',
                'longitude' => '48.9569448',
            ],
            [
                'id' => 1210,
                'province_id' => 30,

                'name' => 'شیرین سو',
                'en_name' => 'Shirin Su',
                'latitude' => '35.492708',
                'longitude' => '48.4419608',
            ],
            [
                'id' => 1211,
                'province_id' => 30,

                'name' => 'کبودرآهنگ',
                'en_name' => 'Kabudrahang',
                'latitude' => '35.2093946',
                'longitude' => '48.7067913',
            ],
            [
                'id' => 1212,
                'province_id' => 30,

                'name' => 'گل تپه',
                'en_name' => 'Gol Tappeh',
                'latitude' => '35.2208355',
                'longitude' => '48.19597',
            ],
            [
                'id' => 1213,
                'province_id' => 30,

                'name' => 'ازندریان',
                'en_name' => 'Azandarian',
                'latitude' => '34.5093125',
                'longitude' => '48.6790143',
            ],
            [
                'id' => 1214,
                'province_id' => 30,

                'name' => 'جوکار',
                'en_name' => 'Jowkar',
                'latitude' => '34.4303452',
                'longitude' => '48.6779844',
            ],
            [
                'id' => 1215,
                'province_id' => 30,

                'name' => 'زنگنه',
                'en_name' => 'Zangeneh',
                'latitude' => '34.1542717',
                'longitude' => '49.0036905',
            ],
            [
                'id' => 1216,
                'province_id' => 30,

                'name' => 'سامن',
                'en_name' => 'Samen',
                'latitude' => '34.209761',
                'longitude' => '48.6950112',
            ],
            [
                'id' => 1217,
                'province_id' => 30,

                'name' => 'ملایر',
                'en_name' => 'Malayer',
                'latitude' => '34.3014251',
                'longitude' => '48.7882227',
            ],
            [
                'id' => 1218,
                'province_id' => 30,

                'name' => 'برزول',
                'en_name' => 'Barzul',
                'latitude' => '34.2131771',
                'longitude' => '48.2581651',
            ],
            [
                'id' => 1219,
                'province_id' => 30,

                'name' => 'فیروزان',
                'en_name' => 'Firuzan',
                'latitude' => '34.3615224',
                'longitude' => '48.107543',
            ],
            [
                'id' => 1220,
                'province_id' => 30,

                'name' => 'گیان',
                'en_name' => 'Giyan',
                'latitude' => '34.1756654',
                'longitude' => '48.2345937',
            ],
            [
                'id' => 1221,
                'province_id' => 30,

                'name' => 'نهاوند',
                'en_name' => 'Nahavand',
                'latitude' => '34.1948268',
                'longitude' => '48.3392423',
            ],
            [
                'id' => 1222,
                'province_id' => 30,

                'name' => 'جورقان',
                'en_name' => 'Juraqan',
                'latitude' => '34.8851383',
                'longitude' => '48.543831',
            ],
            [
                'id' => 1223,
                'province_id' => 30,

                'name' => 'قهاوند',
                'en_name' => 'Qahavand',
                'latitude' => '34.8597349',
                'longitude' => '48.9906011',
            ],
            [
                'id' => 1224,
                'province_id' => 30,

                'name' => 'مریانج',
                'en_name' => 'Maryanaj',
                'latitude' => '34.8314883',
                'longitude' => '48.454256',
            ],
            [
                'id' => 1225,
                'province_id' => 30,

                'name' => 'همدان',
                'en_name' => 'Hamedan',
                'latitude' => '34.8123087',
                'longitude' => '48.4400271',
            ],
            [
                'id' => 1226,
                'province_id' => 31,

                'name' => 'ابرکوه',
                'en_name' => 'Abarkooh',
                'latitude' => '31.126281',
                'longitude' => '53.2215924',
            ],
            [
                'id' => 1227,
                'province_id' => 31,

                'name' => 'مهردشت',
                'en_name' => 'Mehrdasht',
                'latitude' => '31.022778',
                'longitude' => '53.356389',
            ],
            [
                'id' => 1228,
                'province_id' => 31,

                'name' => 'احمدآباد',
                'en_name' => 'Ahmadabad',
                'latitude' => '32.356667',
                'longitude' => '53.991944',
            ],
            [
                'id' => 1229,
                'province_id' => 31,

                'name' => 'اردکان',
                'en_name' => 'Ardakan',
                'latitude' => '32.3104169',
                'longitude' => '53.9989613',
            ],
            [
                'id' => 1230,
                'province_id' => 31,

                'name' => 'عقدا',
                'en_name' => 'Aqda',
                'latitude' => '32.443199',
                'longitude' => '53.6254261',
            ],
            [
                'id' => 1231,
                'province_id' => 31,

                'name' => 'اشکذر',
                'en_name' => 'Ashkezar',
                'latitude' => '32.0007402',
                'longitude' => '54.1923592',
            ],
            [
                'id' => 1232,
                'province_id' => 31,

                'name' => 'خضرآباد',
                'en_name' => 'Khezrabad',
                'latitude' => '31.8704959',
                'longitude' => '53.9464223',
            ],
            [
                'id' => 1233,
                'province_id' => 31,

                'name' => 'بافق',
                'en_name' => 'Bafgh',
                'latitude' => '31.6125183',
                'longitude' => '55.3802341',
            ],
            [
                'id' => 1234,
                'province_id' => 31,

                'name' => 'بهاباد',
                'en_name' => 'Bahabad',
                'latitude' => '31.8702288',
                'longitude' => '56.0046098',
            ],
            [
                'id' => 1235,
                'province_id' => 31,

                'name' => 'تفت',
                'en_name' => 'Taft',
                'latitude' => '31.7574581',
                'longitude' => '54.1720695',
            ],
            [
                'id' => 1236,
                'province_id' => 31,

                'name' => 'نیر',
                'en_name' => 'Nir',
                'latitude' => '31.4822578',
                'longitude' => '54.1207552',
            ],
            [
                'id' => 1237,
                'province_id' => 31,

                'name' => 'مروست',
                'en_name' => 'Marvast',
                'latitude' => '30.4785615',
                'longitude' => '54.2022943',
            ],
            [
                'id' => 1238,
                'province_id' => 31,

                'name' => 'هرات',
                'en_name' => 'Harat',
                'latitude' => '30.05011',
                'longitude' => '54.3510817',
            ],
            [
                'id' => 1239,
                'province_id' => 31,

                'name' => 'مهریز',
                'en_name' => 'Mehriz',
                'latitude' => '31.5797754',
                'longitude' => '54.4066942',
            ],
            [
                'id' => 1240,
                'province_id' => 31,

                'name' => 'بفروییه',
                'en_name' => 'Bafruiyeh',
                'latitude' => '32.2699212',
                'longitude' => '53.9882948',
            ],
            [
                'id' => 1241,
                'province_id' => 31,

                'name' => 'میبد',
                'en_name' => 'Meybod',
                'latitude' => '32.208427',
                'longitude' => '53.9747118',
            ],
            [
                'id' => 1242,
                'province_id' => 31,

                'name' => 'ندوشن',
                'en_name' => 'Nodoushan',
                'latitude' => '32.0301314',
                'longitude' => '53.5318278',
            ],
            [
                'id' => 1243,
                'province_id' => 31,

                'name' => 'حمیدیا',
                'en_name' => 'Hamidia',
                'latitude' => '31.8281614',
                'longitude' => '54.378848',
            ],
            [
                'id' => 1244,
                'province_id' => 31,

                'name' => 'زارچ',
                'en_name' => 'Zarach',
                'latitude' => '31.9861535',
                'longitude' => '54.2249105',
            ],
            [
                'id' => 1245,
                'province_id' => 31,

                'name' => 'شاهدیه',
                'en_name' => 'Shahedieh',
                'latitude' => '31.945398',
                'longitude' => '54.2460245',
            ],
            [
                'id' => 1246,
                'province_id' => 31,

                'name' => 'یزد',
                'en_name' => 'Yazd',
                'latitude' => '31.8795392',
                'longitude' => '54.2667269',
            ],
        ];

        collect($cities)->each(function ($city) {
            if (! DB::table('cities')->where('id', $city['id'])->exists()) {
                DB::table('cities')->insert($city);
            }
        });
    }
}
