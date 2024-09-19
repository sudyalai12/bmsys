<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = "countries";
    protected $guarded = [];
    protected $hidden = [];
    protected $with = [];

    public static $countries = [
        [
            "id" => 1,
            "name" => "Afghanistan",
            "numeric_code" => "004",
            "phone_code" => "93",
            "currency" => "AFN",
            "currency_name" => "Afghan afghani",
            "currency_symbol" => "؋"
        ],
        [
            "id" => 2,
            "name" => "Aland Islands",
            "numeric_code" => "248",
            "phone_code" => "358",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 3,
            "name" => "Albania",
            "numeric_code" => "008",
            "phone_code" => "355",
            "currency" => "ALL",
            "currency_name" => "Albanian lek",
            "currency_symbol" => "Lek"
        ],
        [
            "id" => 4,
            "name" => "Algeria",
            "numeric_code" => "012",
            "phone_code" => "213",
            "currency" => "DZD",
            "currency_name" => "Algerian dinar",
            "currency_symbol" => "دج"
        ],
        [
            "id" => 5,
            "name" => "American Samoa",
            "numeric_code" => "016",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "US Dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 6,
            "name" => "Andorra",
            "numeric_code" => "020",
            "phone_code" => "376",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 7,
            "name" => "Angola",
            "numeric_code" => "024",
            "phone_code" => "244",
            "currency" => "AOA",
            "currency_name" => "Angolan kwanza",
            "currency_symbol" => "Kz"
        ],
        [
            "id" => 8,
            "name" => "Anguilla",
            "numeric_code" => "660",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "East Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 9,
            "name" => "Antarctica",
            "numeric_code" => "010",
            "phone_code" => "672",
            "currency" => "AAD",
            "currency_name" => "Antarctican dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 10,
            "name" => "Antigua and Barbuda",
            "numeric_code" => "028",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "Eastern Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 11,
            "name" => "Argentina",
            "numeric_code" => "032",
            "phone_code" => "54",
            "currency" => "ARS",
            "currency_name" => "Argentine peso",
            "currency_symbol" => "$"
        ],
        [
            "id" => 12,
            "name" => "Armenia",
            "numeric_code" => "051",
            "phone_code" => "374",
            "currency" => "AMD",
            "currency_name" => "Armenian dram",
            "currency_symbol" => "֏"
        ],
        [
            "id" => 13,
            "name" => "Aruba",
            "numeric_code" => "533",
            "phone_code" => "297",
            "currency" => "AWG",
            "currency_name" => "Aruban florin",
            "currency_symbol" => "ƒ"
        ],
        [
            "id" => 14,
            "name" => "Australia",
            "numeric_code" => "036",
            "phone_code" => "61",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 15,
            "name" => "Austria",
            "numeric_code" => "040",
            "phone_code" => "43",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 16,
            "name" => "Azerbaijan",
            "numeric_code" => "031",
            "phone_code" => "994",
            "currency" => "AZN",
            "currency_name" => "Azerbaijani manat",
            "currency_symbol" => "m"
        ],
        [
            "id" => 18,
            "name" => "Bahrain",
            "numeric_code" => "048",
            "phone_code" => "973",
            "currency" => "BHD",
            "currency_name" => "Bahraini dinar",
            "currency_symbol" => ".د.ب"
        ],
        [
            "id" => 19,
            "name" => "Bangladesh",
            "numeric_code" => "050",
            "phone_code" => "880",
            "currency" => "BDT",
            "currency_name" => "Bangladeshi taka",
            "currency_symbol" => "৳"
        ],
        [
            "id" => 20,
            "name" => "Barbados",
            "numeric_code" => "052",
            "phone_code" => "1",
            "currency" => "BBD",
            "currency_name" => "Barbadian dollar",
            "currency_symbol" => "Bds$"
        ],
        [
            "id" => 21,
            "name" => "Belarus",
            "numeric_code" => "112",
            "phone_code" => "375",
            "currency" => "BYN",
            "currency_name" => "Belarusian ruble",
            "currency_symbol" => "Br"
        ],
        [
            "id" => 22,
            "name" => "Belgium",
            "numeric_code" => "056",
            "phone_code" => "32",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 23,
            "name" => "Belize",
            "numeric_code" => "084",
            "phone_code" => "501",
            "currency" => "BZD",
            "currency_name" => "Belize dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 24,
            "name" => "Benin",
            "numeric_code" => "204",
            "phone_code" => "229",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 25,
            "name" => "Bermuda",
            "numeric_code" => "060",
            "phone_code" => "1",
            "currency" => "BMD",
            "currency_name" => "Bermudian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 26,
            "name" => "Bhutan",
            "numeric_code" => "064",
            "phone_code" => "975",
            "currency" => "BTN",
            "currency_name" => "Bhutanese ngultrum",
            "currency_symbol" => "Nu."
        ],
        [
            "id" => 27,
            "name" => "Bolivia",
            "numeric_code" => "068",
            "phone_code" => "591",
            "currency" => "BOB",
            "currency_name" => "Bolivian boliviano",
            "currency_symbol" => "Bs."
        ],
        [
            "id" => 155,
            "name" => "Bonaire, Sint Eustatius and Saba",
            "numeric_code" => "535",
            "phone_code" => "599",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 28,
            "name" => "Bosnia and Herzegovina",
            "numeric_code" => "070",
            "phone_code" => "387",
            "currency" => "BAM",
            "currency_name" => "Bosnia and Herzegovina convertible mark",
            "currency_symbol" => "KM"
        ],
        [
            "id" => 29,
            "name" => "Botswana",
            "numeric_code" => "072",
            "phone_code" => "267",
            "currency" => "BWP",
            "currency_name" => "Botswana pula",
            "currency_symbol" => "P"
        ],
        [
            "id" => 30,
            "name" => "Bouvet Island",
            "numeric_code" => "074",
            "phone_code" => "0055",
            "currency" => "NOK",
            "currency_name" => "Norwegian Krone",
            "currency_symbol" => "kr"
        ],
        [
            "id" => 31,
            "name" => "Brazil",
            "numeric_code" => "076",
            "phone_code" => "55",
            "currency" => "BRL",
            "currency_name" => "Brazilian real",
            "currency_symbol" => "R$"
        ],
        [
            "id" => 32,
            "name" => "British Indian Ocean Territory",
            "numeric_code" => "086",
            "phone_code" => "246",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 33,
            "name" => "Brunei",
            "numeric_code" => "096",
            "phone_code" => "673",
            "currency" => "BND",
            "currency_name" => "Brunei dollar",
            "currency_symbol" => "B$"
        ],
        [
            "id" => 34,
            "name" => "Bulgaria",
            "numeric_code" => "100",
            "phone_code" => "359",
            "currency" => "BGN",
            "currency_name" => "Bulgarian lev",
            "currency_symbol" => "Лв."
        ],
        [
            "id" => 35,
            "name" => "Burkina Faso",
            "numeric_code" => "854",
            "phone_code" => "226",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 36,
            "name" => "Burundi",
            "numeric_code" => "108",
            "phone_code" => "257",
            "currency" => "BIF",
            "currency_name" => "Burundian franc",
            "currency_symbol" => "FBu"
        ],
        [
            "id" => 37,
            "name" => "Cambodia",
            "numeric_code" => "116",
            "phone_code" => "855",
            "currency" => "KHR",
            "currency_name" => "Cambodian riel",
            "currency_symbol" => "KHR"
        ],
        [
            "id" => 38,
            "name" => "Cameroon",
            "numeric_code" => "120",
            "phone_code" => "237",
            "currency" => "XAF",
            "currency_name" => "Central African CFA franc",
            "currency_symbol" => "FCFA"
        ],
        [
            "id" => 39,
            "name" => "Canada",
            "numeric_code" => "124",
            "phone_code" => "1",
            "currency" => "CAD",
            "currency_name" => "Canadian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 40,
            "name" => "Cape Verde",
            "numeric_code" => "132",
            "phone_code" => "238",
            "currency" => "CVE",
            "currency_name" => "Cape Verdean escudo",
            "currency_symbol" => "$"
        ],
        [
            "id" => 41,
            "name" => "Cayman Islands",
            "numeric_code" => "136",
            "phone_code" => "1",
            "currency" => "KYD",
            "currency_name" => "Cayman Islands dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 42,
            "name" => "Central African Republic",
            "numeric_code" => "140",
            "phone_code" => "236",
            "currency" => "XAF",
            "currency_name" => "Central African CFA franc",
            "currency_symbol" => "FCFA"
        ],
        [
            "id" => 43,
            "name" => "Chad",
            "numeric_code" => "148",
            "phone_code" => "235",
            "currency" => "XAF",
            "currency_name" => "Central African CFA franc",
            "currency_symbol" => "FCFA"
        ],
        [
            "id" => 44,
            "name" => "Chile",
            "numeric_code" => "152",
            "phone_code" => "56",
            "currency" => "CLP",
            "currency_name" => "Chilean peso",
            "currency_symbol" => "$"
        ],
        [
            "id" => 45,
            "name" => "China",
            "numeric_code" => "156",
            "phone_code" => "86",
            "currency" => "CNY",
            "currency_name" => "Chinese yuan",
            "currency_symbol" => "¥"
        ],
        [
            "id" => 46,
            "name" => "Christmas Island",
            "numeric_code" => "162",
            "phone_code" => "61",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 47,
            "name" => "Cocos (Keeling) Islands",
            "numeric_code" => "166",
            "phone_code" => "61",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 48,
            "name" => "Colombia",
            "numeric_code" => "170",
            "phone_code" => "57",
            "currency" => "COP",
            "currency_name" => "Colombian peso",
            "currency_symbol" => "$"
        ],
        [
            "id" => 49,
            "name" => "Comoros",
            "numeric_code" => "174",
            "phone_code" => "269",
            "currency" => "KMF",
            "currency_name" => "Comorian franc",
            "currency_symbol" => "CF"
        ],
        [
            "id" => 50,
            "name" => "Congo",
            "numeric_code" => "178",
            "phone_code" => "242",
            "currency" => "XAF",
            "currency_name" => "Central African CFA franc",
            "currency_symbol" => "FC"
        ],
        [
            "id" => 52,
            "name" => "Cook Islands",
            "numeric_code" => "184",
            "phone_code" => "682",
            "currency" => "NZD",
            "currency_name" => "Cook Islands dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 53,
            "name" => "Costa Rica",
            "numeric_code" => "188",
            "phone_code" => "506",
            "currency" => "CRC",
            "currency_name" => "Costa Rican colón",
            "currency_symbol" => "₡"
        ],
        [
            "id" => 54,
            "name" => "Cote D'Ivoire (Ivory Coast)",
            "numeric_code" => "384",
            "phone_code" => "225",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 55,
            "name" => "Croatia",
            "numeric_code" => "191",
            "phone_code" => "385",
            "currency" => "HRK",
            "currency_name" => "Croatian kuna",
            "currency_symbol" => "kn"
        ],
        [
            "id" => 56,
            "name" => "Cuba",
            "numeric_code" => "192",
            "phone_code" => "53",
            "currency" => "CUP",
            "currency_name" => "Cuban peso",
            "currency_symbol" => "$"
        ],
        [
            "id" => 249,
            "name" => "Curaçao",
            "numeric_code" => "531",
            "phone_code" => "599",
            "currency" => "ANG",
            "currency_name" => "Netherlands Antillean guilder",
            "currency_symbol" => "ƒ"
        ],
        [
            "id" => 57,
            "name" => "Cyprus",
            "numeric_code" => "196",
            "phone_code" => "357",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 58,
            "name" => "Czech Republic",
            "numeric_code" => "203",
            "phone_code" => "420",
            "currency" => "CZK",
            "currency_name" => "Czech koruna",
            "currency_symbol" => "Kč"
        ],
        [
            "id" => 51,
            "name" => "Democratic Republic of the Congo",
            "numeric_code" => "180",
            "phone_code" => "243",
            "currency" => "CDF",
            "currency_name" => "Congolese Franc",
            "currency_symbol" => "FC"
        ],
        [
            "id" => 59,
            "name" => "Denmark",
            "numeric_code" => "208",
            "phone_code" => "45",
            "currency" => "DKK",
            "currency_name" => "Danish krone",
            "currency_symbol" => "Kr."
        ],
        [
            "id" => 60,
            "name" => "Djibouti",
            "numeric_code" => "262",
            "phone_code" => "253",
            "currency" => "DJF",
            "currency_name" => "Djiboutian franc",
            "currency_symbol" => "Fdj"
        ],
        [
            "id" => 61,
            "name" => "Dominica",
            "numeric_code" => "212",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "Eastern Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 62,
            "name" => "Dominican Republic",
            "numeric_code" => "214",
            "phone_code" => "1",
            "currency" => "DOP",
            "currency_name" => "Dominican peso",
            "currency_symbol" => "$"
        ],
        [
            "id" => 64,
            "name" => "Ecuador",
            "numeric_code" => "218",
            "phone_code" => "593",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 65,
            "name" => "Egypt",
            "numeric_code" => "818",
            "phone_code" => "20",
            "currency" => "EGP",
            "currency_name" => "Egyptian pound",
            "currency_symbol" => "ج.م"
        ],
        [
            "id" => 66,
            "name" => "El Salvador",
            "numeric_code" => "222",
            "phone_code" => "503",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 67,
            "name" => "Equatorial Guinea",
            "numeric_code" => "226",
            "phone_code" => "240",
            "currency" => "XAF",
            "currency_name" => "Central African CFA franc",
            "currency_symbol" => "FCFA"
        ],
        [
            "id" => 68,
            "name" => "Eritrea",
            "numeric_code" => "232",
            "phone_code" => "291",
            "currency" => "ERN",
            "currency_name" => "Eritrean nakfa",
            "currency_symbol" => "Nfk"
        ],
        [
            "id" => 69,
            "name" => "Estonia",
            "numeric_code" => "233",
            "phone_code" => "372",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 212,
            "name" => "Eswatini",
            "numeric_code" => "748",
            "phone_code" => "268",
            "currency" => "SZL",
            "currency_name" => "Lilangeni",
            "currency_symbol" => "E"
        ],
        [
            "id" => 70,
            "name" => "Ethiopia",
            "numeric_code" => "231",
            "phone_code" => "251",
            "currency" => "ETB",
            "currency_name" => "Ethiopian birr",
            "currency_symbol" => "Nkf"
        ],
        [
            "id" => 71,
            "name" => "Falkland Islands",
            "numeric_code" => "238",
            "phone_code" => "500",
            "currency" => "FKP",
            "currency_name" => "Falkland Islands pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 72,
            "name" => "Faroe Islands",
            "numeric_code" => "234",
            "phone_code" => "298",
            "currency" => "DKK",
            "currency_name" => "Danish krone",
            "currency_symbol" => "Kr."
        ],
        [
            "id" => 73,
            "name" => "Fiji Islands",
            "numeric_code" => "242",
            "phone_code" => "679",
            "currency" => "FJD",
            "currency_name" => "Fijian dollar",
            "currency_symbol" => "FJ$"
        ],
        [
            "id" => 74,
            "name" => "Finland",
            "numeric_code" => "246",
            "phone_code" => "358",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 75,
            "name" => "France",
            "numeric_code" => "250",
            "phone_code" => "33",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 76,
            "name" => "French Guiana",
            "numeric_code" => "254",
            "phone_code" => "594",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 77,
            "name" => "French Polynesia",
            "numeric_code" => "258",
            "phone_code" => "689",
            "currency" => "XPF",
            "currency_name" => "CFP franc",
            "currency_symbol" => "₣"
        ],
        [
            "id" => 78,
            "name" => "French Southern Territories",
            "numeric_code" => "260",
            "phone_code" => "262",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 79,
            "name" => "Gabon",
            "numeric_code" => "266",
            "phone_code" => "241",
            "currency" => "XAF",
            "currency_name" => "Central African CFA franc",
            "currency_symbol" => "FCFA"
        ],
        [
            "id" => 81,
            "name" => "Georgia",
            "numeric_code" => "268",
            "phone_code" => "995",
            "currency" => "GEL",
            "currency_name" => "Georgian lari",
            "currency_symbol" => "ლ"
        ],
        [
            "id" => 82,
            "name" => "Germany",
            "numeric_code" => "276",
            "phone_code" => "49",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 83,
            "name" => "Ghana",
            "numeric_code" => "288",
            "phone_code" => "233",
            "currency" => "GHS",
            "currency_name" => "Ghanaian cedi",
            "currency_symbol" => "GH₵"
        ],
        [
            "id" => 84,
            "name" => "Gibraltar",
            "numeric_code" => "292",
            "phone_code" => "350",
            "currency" => "GIP",
            "currency_name" => "Gibraltar pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 85,
            "name" => "Greece",
            "numeric_code" => "300",
            "phone_code" => "30",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 86,
            "name" => "Greenland",
            "numeric_code" => "304",
            "phone_code" => "299",
            "currency" => "DKK",
            "currency_name" => "Danish krone",
            "currency_symbol" => "Kr."
        ],
        [
            "id" => 87,
            "name" => "Grenada",
            "numeric_code" => "308",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "Eastern Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 88,
            "name" => "Guadeloupe",
            "numeric_code" => "312",
            "phone_code" => "590",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 89,
            "name" => "Guam",
            "numeric_code" => "316",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "US Dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 90,
            "name" => "Guatemala",
            "numeric_code" => "320",
            "phone_code" => "502",
            "currency" => "GTQ",
            "currency_name" => "Guatemalan quetzal",
            "currency_symbol" => "Q"
        ],
        [
            "id" => 91,
            "name" => "Guernsey and Alderney",
            "numeric_code" => "831",
            "phone_code" => "44",
            "currency" => "GBP",
            "currency_name" => "British pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 92,
            "name" => "Guinea",
            "numeric_code" => "324",
            "phone_code" => "224",
            "currency" => "GNF",
            "currency_name" => "Guinean franc",
            "currency_symbol" => "FG"
        ],
        [
            "id" => 93,
            "name" => "Guinea-Bissau",
            "numeric_code" => "624",
            "phone_code" => "245",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 94,
            "name" => "Guyana",
            "numeric_code" => "328",
            "phone_code" => "592",
            "currency" => "GYD",
            "currency_name" => "Guyanese dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 95,
            "name" => "Haiti",
            "numeric_code" => "332",
            "phone_code" => "509",
            "currency" => "HTG",
            "currency_name" => "Haitian gourde",
            "currency_symbol" => "G"
        ],
        [
            "id" => 96,
            "name" => "Heard Island and McDonald Islands",
            "numeric_code" => "334",
            "phone_code" => "672",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 97,
            "name" => "Honduras",
            "numeric_code" => "340",
            "phone_code" => "504",
            "currency" => "HNL",
            "currency_name" => "Honduran lempira",
            "currency_symbol" => "L"
        ],
        [
            "id" => 98,
            "name" => "Hong Kong S.A.R.",
            "numeric_code" => "344",
            "phone_code" => "852",
            "currency" => "HKD",
            "currency_name" => "Hong Kong dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 99,
            "name" => "Hungary",
            "numeric_code" => "348",
            "phone_code" => "36",
            "currency" => "HUF",
            "currency_name" => "Hungarian forint",
            "currency_symbol" => "Ft"
        ],
        [
            "id" => 100,
            "name" => "Iceland",
            "numeric_code" => "352",
            "phone_code" => "354",
            "currency" => "ISK",
            "currency_name" => "Icelandic króna",
            "currency_symbol" => "kr"
        ],
        [
            "id" => 101,
            "name" => "India",
            "numeric_code" => "356",
            "phone_code" => "91",
            "currency" => "INR",
            "currency_name" => "Indian rupee",
            "currency_symbol" => "₹"
        ],
        [
            "id" => 102,
            "name" => "Indonesia",
            "numeric_code" => "360",
            "phone_code" => "62",
            "currency" => "IDR",
            "currency_name" => "Indonesian rupiah",
            "currency_symbol" => "Rp"
        ],
        [
            "id" => 103,
            "name" => "Iran",
            "numeric_code" => "364",
            "phone_code" => "98",
            "currency" => "IRR",
            "currency_name" => "Iranian rial",
            "currency_symbol" => "﷼"
        ],
        [
            "id" => 104,
            "name" => "Iraq",
            "numeric_code" => "368",
            "phone_code" => "964",
            "currency" => "IQD",
            "currency_name" => "Iraqi dinar",
            "currency_symbol" => "د.ع"
        ],
        [
            "id" => 105,
            "name" => "Ireland",
            "numeric_code" => "372",
            "phone_code" => "353",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 106,
            "name" => "Israel",
            "numeric_code" => "376",
            "phone_code" => "972",
            "currency" => "ILS",
            "currency_name" => "Israeli new shekel",
            "currency_symbol" => "₪"
        ],
        [
            "id" => 107,
            "name" => "Italy",
            "numeric_code" => "380",
            "phone_code" => "39",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 108,
            "name" => "Jamaica",
            "numeric_code" => "388",
            "phone_code" => "1",
            "currency" => "JMD",
            "currency_name" => "Jamaican dollar",
            "currency_symbol" => "J$"
        ],
        [
            "id" => 109,
            "name" => "Japan",
            "numeric_code" => "392",
            "phone_code" => "81",
            "currency" => "JPY",
            "currency_name" => "Japanese yen",
            "currency_symbol" => "¥"
        ],
        [
            "id" => 110,
            "name" => "Jersey",
            "numeric_code" => "832",
            "phone_code" => "44",
            "currency" => "GBP",
            "currency_name" => "British pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 111,
            "name" => "Jordan",
            "numeric_code" => "400",
            "phone_code" => "962",
            "currency" => "JOD",
            "currency_name" => "Jordanian dinar",
            "currency_symbol" => "ا.د"
        ],
        [
            "id" => 112,
            "name" => "Kazakhstan",
            "numeric_code" => "398",
            "phone_code" => "7",
            "currency" => "KZT",
            "currency_name" => "Kazakhstani tenge",
            "currency_symbol" => "лв"
        ],
        [
            "id" => 113,
            "name" => "Kenya",
            "numeric_code" => "404",
            "phone_code" => "254",
            "currency" => "KES",
            "currency_name" => "Kenyan shilling",
            "currency_symbol" => "KSh"
        ],
        [
            "id" => 114,
            "name" => "Kiribati",
            "numeric_code" => "296",
            "phone_code" => "686",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 248,
            "name" => "Kosovo",
            "numeric_code" => "926",
            "phone_code" => "383",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 117,
            "name" => "Kuwait",
            "numeric_code" => "414",
            "phone_code" => "965",
            "currency" => "KWD",
            "currency_name" => "Kuwaiti dinar",
            "currency_symbol" => "ك.د"
        ],
        [
            "id" => 118,
            "name" => "Kyrgyzstan",
            "numeric_code" => "417",
            "phone_code" => "996",
            "currency" => "KGS",
            "currency_name" => "Kyrgyzstani som",
            "currency_symbol" => "лв"
        ],
        [
            "id" => 119,
            "name" => "Laos",
            "numeric_code" => "418",
            "phone_code" => "856",
            "currency" => "LAK",
            "currency_name" => "Lao kip",
            "currency_symbol" => "₭"
        ],
        [
            "id" => 120,
            "name" => "Latvia",
            "numeric_code" => "428",
            "phone_code" => "371",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 121,
            "name" => "Lebanon",
            "numeric_code" => "422",
            "phone_code" => "961",
            "currency" => "LBP",
            "currency_name" => "Lebanese pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 122,
            "name" => "Lesotho",
            "numeric_code" => "426",
            "phone_code" => "266",
            "currency" => "LSL",
            "currency_name" => "Lesotho loti",
            "currency_symbol" => "L"
        ],
        [
            "id" => 123,
            "name" => "Liberia",
            "numeric_code" => "430",
            "phone_code" => "231",
            "currency" => "LRD",
            "currency_name" => "Liberian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 124,
            "name" => "Libya",
            "numeric_code" => "434",
            "phone_code" => "218",
            "currency" => "LYD",
            "currency_name" => "Libyan dinar",
            "currency_symbol" => "د.ل"
        ],
        [
            "id" => 125,
            "name" => "Liechtenstein",
            "numeric_code" => "438",
            "phone_code" => "423",
            "currency" => "CHF",
            "currency_name" => "Swiss franc",
            "currency_symbol" => "CHf"
        ],
        [
            "id" => 126,
            "name" => "Lithuania",
            "numeric_code" => "440",
            "phone_code" => "370",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 127,
            "name" => "Luxembourg",
            "numeric_code" => "442",
            "phone_code" => "352",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 128,
            "name" => "Macau S.A.R.",
            "numeric_code" => "446",
            "phone_code" => "853",
            "currency" => "MOP",
            "currency_name" => "Macanese pataca",
            "currency_symbol" => "$"
        ],
        [
            "id" => 130,
            "name" => "Madagascar",
            "numeric_code" => "450",
            "phone_code" => "261",
            "currency" => "MGA",
            "currency_name" => "Malagasy ariary",
            "currency_symbol" => "Ar"
        ],
        [
            "id" => 131,
            "name" => "Malawi",
            "numeric_code" => "454",
            "phone_code" => "265",
            "currency" => "MWK",
            "currency_name" => "Malawian kwacha",
            "currency_symbol" => "MK"
        ],
        [
            "id" => 132,
            "name" => "Malaysia",
            "numeric_code" => "458",
            "phone_code" => "60",
            "currency" => "MYR",
            "currency_name" => "Malaysian ringgit",
            "currency_symbol" => "RM"
        ],
        [
            "id" => 133,
            "name" => "Maldives",
            "numeric_code" => "462",
            "phone_code" => "960",
            "currency" => "MVR",
            "currency_name" => "Maldivian rufiyaa",
            "currency_symbol" => "Rf"
        ],
        [
            "id" => 134,
            "name" => "Mali",
            "numeric_code" => "466",
            "phone_code" => "223",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 135,
            "name" => "Malta",
            "numeric_code" => "470",
            "phone_code" => "356",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 136,
            "name" => "Man (Isle of)",
            "numeric_code" => "833",
            "phone_code" => "44",
            "currency" => "GBP",
            "currency_name" => "British pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 137,
            "name" => "Marshall Islands",
            "numeric_code" => "584",
            "phone_code" => "692",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 138,
            "name" => "Martinique",
            "numeric_code" => "474",
            "phone_code" => "596",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 139,
            "name" => "Mauritania",
            "numeric_code" => "478",
            "phone_code" => "222",
            "currency" => "MRO",
            "currency_name" => "Mauritanian ouguiya",
            "currency_symbol" => "MRU"
        ],
        [
            "id" => 140,
            "name" => "Mauritius",
            "numeric_code" => "480",
            "phone_code" => "230",
            "currency" => "MUR",
            "currency_name" => "Mauritian rupee",
            "currency_symbol" => "₨"
        ],
        [
            "id" => 141,
            "name" => "Mayotte",
            "numeric_code" => "175",
            "phone_code" => "262",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 142,
            "name" => "Mexico",
            "numeric_code" => "484",
            "phone_code" => "52",
            "currency" => "MXN",
            "currency_name" => "Mexican peso",
            "currency_symbol" => "$"
        ],
        [
            "id" => 143,
            "name" => "Micronesia",
            "numeric_code" => "583",
            "phone_code" => "691",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 144,
            "name" => "Moldova",
            "numeric_code" => "498",
            "phone_code" => "373",
            "currency" => "MDL",
            "currency_name" => "Moldovan leu",
            "currency_symbol" => "L"
        ],
        [
            "id" => 145,
            "name" => "Monaco",
            "numeric_code" => "492",
            "phone_code" => "377",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 146,
            "name" => "Mongolia",
            "numeric_code" => "496",
            "phone_code" => "976",
            "currency" => "MNT",
            "currency_name" => "Mongolian tögrög",
            "currency_symbol" => "₮"
        ],
        [
            "id" => 147,
            "name" => "Montenegro",
            "numeric_code" => "499",
            "phone_code" => "382",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 148,
            "name" => "Montserrat",
            "numeric_code" => "500",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "Eastern Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 149,
            "name" => "Morocco",
            "numeric_code" => "504",
            "phone_code" => "212",
            "currency" => "MAD",
            "currency_name" => "Moroccan dirham",
            "currency_symbol" => "DH"
        ],
        [
            "id" => 150,
            "name" => "Mozambique",
            "numeric_code" => "508",
            "phone_code" => "258",
            "currency" => "MZN",
            "currency_name" => "Mozambican metical",
            "currency_symbol" => "MT"
        ],
        [
            "id" => 151,
            "name" => "Myanmar",
            "numeric_code" => "104",
            "phone_code" => "95",
            "currency" => "MMK",
            "currency_name" => "Burmese kyat",
            "currency_symbol" => "K"
        ],
        [
            "id" => 152,
            "name" => "Namibia",
            "numeric_code" => "516",
            "phone_code" => "264",
            "currency" => "NAD",
            "currency_name" => "Namibian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 153,
            "name" => "Nauru",
            "numeric_code" => "520",
            "phone_code" => "674",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 154,
            "name" => "Nepal",
            "numeric_code" => "524",
            "phone_code" => "977",
            "currency" => "NPR",
            "currency_name" => "Nepalese rupee",
            "currency_symbol" => "₨"
        ],
        [
            "id" => 156,
            "name" => "Netherlands",
            "numeric_code" => "528",
            "phone_code" => "31",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 157,
            "name" => "New Caledonia",
            "numeric_code" => "540",
            "phone_code" => "687",
            "currency" => "XPF",
            "currency_name" => "CFP franc",
            "currency_symbol" => "₣"
        ],
        [
            "id" => 158,
            "name" => "New Zealand",
            "numeric_code" => "554",
            "phone_code" => "64",
            "currency" => "NZD",
            "currency_name" => "New Zealand dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 159,
            "name" => "Nicaragua",
            "numeric_code" => "558",
            "phone_code" => "505",
            "currency" => "NIO",
            "currency_name" => "Nicaraguan córdoba",
            "currency_symbol" => "C$"
        ],
        [
            "id" => 160,
            "name" => "Niger",
            "numeric_code" => "562",
            "phone_code" => "227",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 161,
            "name" => "Nigeria",
            "numeric_code" => "566",
            "phone_code" => "234",
            "currency" => "NGN",
            "currency_name" => "Nigerian naira",
            "currency_symbol" => "₦"
        ],
        [
            "id" => 162,
            "name" => "Niue",
            "numeric_code" => "570",
            "phone_code" => "683",
            "currency" => "NZD",
            "currency_name" => "New Zealand dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 163,
            "name" => "Norfolk Island",
            "numeric_code" => "574",
            "phone_code" => "672",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 115,
            "name" => "North Korea",
            "numeric_code" => "408",
            "phone_code" => "850",
            "currency" => "KPW",
            "currency_name" => "North Korean Won",
            "currency_symbol" => "₩"
        ],
        [
            "id" => 129,
            "name" => "North Macedonia",
            "numeric_code" => "807",
            "phone_code" => "389",
            "currency" => "MKD",
            "currency_name" => "Denar",
            "currency_symbol" => "ден"
        ],
        [
            "id" => 164,
            "name" => "Northern Mariana Islands",
            "numeric_code" => "580",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 165,
            "name" => "Norway",
            "numeric_code" => "578",
            "phone_code" => "47",
            "currency" => "NOK",
            "currency_name" => "Norwegian krone",
            "currency_symbol" => "kr"
        ],
        [
            "id" => 166,
            "name" => "Oman",
            "numeric_code" => "512",
            "phone_code" => "968",
            "currency" => "OMR",
            "currency_name" => "Omani rial",
            "currency_symbol" => ".ع.ر"
        ],
        [
            "id" => 167,
            "name" => "Pakistan",
            "numeric_code" => "586",
            "phone_code" => "92",
            "currency" => "PKR",
            "currency_name" => "Pakistani rupee",
            "currency_symbol" => "₨"
        ],
        [
            "id" => 168,
            "name" => "Palau",
            "numeric_code" => "585",
            "phone_code" => "680",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 169,
            "name" => "Palestinian Territory Occupied",
            "numeric_code" => "275",
            "phone_code" => "970",
            "currency" => "ILS",
            "currency_name" => "Israeli new shekel",
            "currency_symbol" => "₪"
        ],
        [
            "id" => 170,
            "name" => "Panama",
            "numeric_code" => "591",
            "phone_code" => "507",
            "currency" => "PAB",
            "currency_name" => "Panamanian balboa",
            "currency_symbol" => "B/."
        ],
        [
            "id" => 171,
            "name" => "Papua New Guinea",
            "numeric_code" => "598",
            "phone_code" => "675",
            "currency" => "PGK",
            "currency_name" => "Papua New Guinean kina",
            "currency_symbol" => "K"
        ],
        [
            "id" => 172,
            "name" => "Paraguay",
            "numeric_code" => "600",
            "phone_code" => "595",
            "currency" => "PYG",
            "currency_name" => "Paraguayan guarani",
            "currency_symbol" => "₲"
        ],
        [
            "id" => 173,
            "name" => "Peru",
            "numeric_code" => "604",
            "phone_code" => "51",
            "currency" => "PEN",
            "currency_name" => "Peruvian sol",
            "currency_symbol" => "S/."
        ],
        [
            "id" => 174,
            "name" => "Philippines",
            "numeric_code" => "608",
            "phone_code" => "63",
            "currency" => "PHP",
            "currency_name" => "Philippine peso",
            "currency_symbol" => "₱"
        ],
        [
            "id" => 175,
            "name" => "Pitcairn Island",
            "numeric_code" => "612",
            "phone_code" => "870",
            "currency" => "NZD",
            "currency_name" => "New Zealand dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 176,
            "name" => "Poland",
            "numeric_code" => "616",
            "phone_code" => "48",
            "currency" => "PLN",
            "currency_name" => "Polish złoty",
            "currency_symbol" => "zł"
        ],
        [
            "id" => 177,
            "name" => "Portugal",
            "numeric_code" => "620",
            "phone_code" => "351",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 178,
            "name" => "Puerto Rico",
            "numeric_code" => "630",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 179,
            "name" => "Qatar",
            "numeric_code" => "634",
            "phone_code" => "974",
            "currency" => "QAR",
            "currency_name" => "Qatari riyal",
            "currency_symbol" => "ق.ر"
        ],
        [
            "id" => 180,
            "name" => "Reunion",
            "numeric_code" => "638",
            "phone_code" => "262",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 181,
            "name" => "Romania",
            "numeric_code" => "642",
            "phone_code" => "40",
            "currency" => "RON",
            "currency_name" => "Romanian leu",
            "currency_symbol" => "lei"
        ],
        [
            "id" => 182,
            "name" => "Russia",
            "numeric_code" => "643",
            "phone_code" => "7",
            "currency" => "RUB",
            "currency_name" => "Russian ruble",
            "currency_symbol" => "₽"
        ],
        [
            "id" => 183,
            "name" => "Rwanda",
            "numeric_code" => "646",
            "phone_code" => "250",
            "currency" => "RWF",
            "currency_name" => "Rwandan franc",
            "currency_symbol" => "FRw"
        ],
        [
            "id" => 184,
            "name" => "Saint Helena",
            "numeric_code" => "654",
            "phone_code" => "290",
            "currency" => "SHP",
            "currency_name" => "Saint Helena pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 185,
            "name" => "Saint Kitts and Nevis",
            "numeric_code" => "659",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "Eastern Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 186,
            "name" => "Saint Lucia",
            "numeric_code" => "662",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "Eastern Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 187,
            "name" => "Saint Pierre and Miquelon",
            "numeric_code" => "666",
            "phone_code" => "508",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 188,
            "name" => "Saint Vincent and the Grenadines",
            "numeric_code" => "670",
            "phone_code" => "1",
            "currency" => "XCD",
            "currency_name" => "Eastern Caribbean dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 189,
            "name" => "Saint-Barthelemy",
            "numeric_code" => "652",
            "phone_code" => "590",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 190,
            "name" => "Saint-Martin (French part)",
            "numeric_code" => "663",
            "phone_code" => "590",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 191,
            "name" => "Samoa",
            "numeric_code" => "882",
            "phone_code" => "685",
            "currency" => "WST",
            "currency_name" => "Samoan tālā",
            "currency_symbol" => "SAT"
        ],
        [
            "id" => 192,
            "name" => "San Marino",
            "numeric_code" => "674",
            "phone_code" => "378",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 193,
            "name" => "Sao Tome and Principe",
            "numeric_code" => "678",
            "phone_code" => "239",
            "currency" => "STD",
            "currency_name" => "Dobra",
            "currency_symbol" => "Db"
        ],
        [
            "id" => 194,
            "name" => "Saudi Arabia",
            "numeric_code" => "682",
            "phone_code" => "966",
            "currency" => "SAR",
            "currency_name" => "Saudi riyal",
            "currency_symbol" => "﷼"
        ],
        [
            "id" => 195,
            "name" => "Senegal",
            "numeric_code" => "686",
            "phone_code" => "221",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 196,
            "name" => "Serbia",
            "numeric_code" => "688",
            "phone_code" => "381",
            "currency" => "RSD",
            "currency_name" => "Serbian dinar",
            "currency_symbol" => "din"
        ],
        [
            "id" => 197,
            "name" => "Seychelles",
            "numeric_code" => "690",
            "phone_code" => "248",
            "currency" => "SCR",
            "currency_name" => "Seychellois rupee",
            "currency_symbol" => "SRe"
        ],
        [
            "id" => 198,
            "name" => "Sierra Leone",
            "numeric_code" => "694",
            "phone_code" => "232",
            "currency" => "SLL",
            "currency_name" => "Sierra Leonean leone",
            "currency_symbol" => "Le"
        ],
        [
            "id" => 199,
            "name" => "Singapore",
            "numeric_code" => "702",
            "phone_code" => "65",
            "currency" => "SGD",
            "currency_name" => "Singapore dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 250,
            "name" => "Sint Maarten (Dutch part)",
            "numeric_code" => "534",
            "phone_code" => "1721",
            "currency" => "ANG",
            "currency_name" => "Netherlands Antillean guilder",
            "currency_symbol" => "ƒ"
        ],
        [
            "id" => 200,
            "name" => "Slovakia",
            "numeric_code" => "703",
            "phone_code" => "421",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 201,
            "name" => "Slovenia",
            "numeric_code" => "705",
            "phone_code" => "386",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 202,
            "name" => "Solomon Islands",
            "numeric_code" => "090",
            "phone_code" => "677",
            "currency" => "SBD",
            "currency_name" => "Solomon Islands dollar",
            "currency_symbol" => "Si$"
        ],
        [
            "id" => 203,
            "name" => "Somalia",
            "numeric_code" => "706",
            "phone_code" => "252",
            "currency" => "SOS",
            "currency_name" => "Somali shilling",
            "currency_symbol" => "Sh.so."
        ],
        [
            "id" => 204,
            "name" => "South Africa",
            "numeric_code" => "710",
            "phone_code" => "27",
            "currency" => "ZAR",
            "currency_name" => "South African rand",
            "currency_symbol" => "R"
        ],
        [
            "id" => 205,
            "name" => "South Georgia",
            "numeric_code" => "239",
            "phone_code" => "500",
            "currency" => "GBP",
            "currency_name" => "British pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 116,
            "name" => "South Korea",
            "numeric_code" => "410",
            "phone_code" => "82",
            "currency" => "KRW",
            "currency_name" => "Won",
            "currency_symbol" => "₩"
        ],
        [
            "id" => 206,
            "name" => "South Sudan",
            "numeric_code" => "728",
            "phone_code" => "211",
            "currency" => "SSP",
            "currency_name" => "South Sudanese pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 207,
            "name" => "Spain",
            "numeric_code" => "724",
            "phone_code" => "34",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 208,
            "name" => "Sri Lanka",
            "numeric_code" => "144",
            "phone_code" => "94",
            "currency" => "LKR",
            "currency_name" => "Sri Lankan rupee",
            "currency_symbol" => "Rs"
        ],
        [
            "id" => 209,
            "name" => "Sudan",
            "numeric_code" => "729",
            "phone_code" => "249",
            "currency" => "SDG",
            "currency_name" => "Sudanese pound",
            "currency_symbol" => ".س.ج"
        ],
        [
            "id" => 210,
            "name" => "Suriname",
            "numeric_code" => "740",
            "phone_code" => "597",
            "currency" => "SRD",
            "currency_name" => "Surinamese dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 211,
            "name" => "Svalbard and Jan Mayen Islands",
            "numeric_code" => "744",
            "phone_code" => "47",
            "currency" => "NOK",
            "currency_name" => "Norwegian Krone",
            "currency_symbol" => "kr"
        ],
        [
            "id" => 213,
            "name" => "Sweden",
            "numeric_code" => "752",
            "phone_code" => "46",
            "currency" => "SEK",
            "currency_name" => "Swedish krona",
            "currency_symbol" => "kr"
        ],
        [
            "id" => 214,
            "name" => "Switzerland",
            "numeric_code" => "756",
            "phone_code" => "41",
            "currency" => "CHF",
            "currency_name" => "Swiss franc",
            "currency_symbol" => "CHf"
        ],
        [
            "id" => 215,
            "name" => "Syria",
            "numeric_code" => "760",
            "phone_code" => "963",
            "currency" => "SYP",
            "currency_name" => "Syrian pound",
            "currency_symbol" => "LS"
        ],
        [
            "id" => 216,
            "name" => "Taiwan",
            "numeric_code" => "158",
            "phone_code" => "886",
            "currency" => "TWD",
            "currency_name" => "New Taiwan dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 217,
            "name" => "Tajikistan",
            "numeric_code" => "762",
            "phone_code" => "992",
            "currency" => "TJS",
            "currency_name" => "Tajikistani somoni",
            "currency_symbol" => "SM"
        ],
        [
            "id" => 218,
            "name" => "Tanzania",
            "numeric_code" => "834",
            "phone_code" => "255",
            "currency" => "TZS",
            "currency_name" => "Tanzanian shilling",
            "currency_symbol" => "TSh"
        ],
        [
            "id" => 219,
            "name" => "Thailand",
            "numeric_code" => "764",
            "phone_code" => "66",
            "currency" => "THB",
            "currency_name" => "Thai baht",
            "currency_symbol" => "฿"
        ],
        [
            "id" => 17,
            "name" => "The Bahamas",
            "numeric_code" => "044",
            "phone_code" => "1",
            "currency" => "BSD",
            "currency_name" => "Bahamian dollar",
            "currency_symbol" => "B$"
        ],
        [
            "id" => 80,
            "name" => "The Gambia ",
            "numeric_code" => "270",
            "phone_code" => "220",
            "currency" => "GMD",
            "currency_name" => "Gambian dalasi",
            "currency_symbol" => "D"
        ],
        [
            "id" => 63,
            "name" => "Timor-Leste",
            "numeric_code" => "626",
            "phone_code" => "670",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 220,
            "name" => "Togo",
            "numeric_code" => "768",
            "phone_code" => "228",
            "currency" => "XOF",
            "currency_name" => "West African CFA franc",
            "currency_symbol" => "CFA"
        ],
        [
            "id" => 221,
            "name" => "Tokelau",
            "numeric_code" => "772",
            "phone_code" => "690",
            "currency" => "NZD",
            "currency_name" => "New Zealand dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 222,
            "name" => "Tonga",
            "numeric_code" => "776",
            "phone_code" => "676",
            "currency" => "TOP",
            "currency_name" => "Tongan paʻanga",
            "currency_symbol" => "$"
        ],
        [
            "id" => 223,
            "name" => "Trinidad and Tobago",
            "numeric_code" => "780",
            "phone_code" => "1",
            "currency" => "TTD",
            "currency_name" => "Trinidad and Tobago dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 224,
            "name" => "Tunisia",
            "numeric_code" => "788",
            "phone_code" => "216",
            "currency" => "TND",
            "currency_name" => "Tunisian dinar",
            "currency_symbol" => "ت.د"
        ],
        [
            "id" => 225,
            "name" => "Turkey",
            "numeric_code" => "792",
            "phone_code" => "90",
            "currency" => "TRY",
            "currency_name" => "Turkish lira",
            "currency_symbol" => "₺"
        ],
        [
            "id" => 226,
            "name" => "Turkmenistan",
            "numeric_code" => "795",
            "phone_code" => "993",
            "currency" => "TMT",
            "currency_name" => "Turkmenistan manat",
            "currency_symbol" => "T"
        ],
        [
            "id" => 227,
            "name" => "Turks and Caicos Islands",
            "numeric_code" => "796",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 228,
            "name" => "Tuvalu",
            "numeric_code" => "798",
            "phone_code" => "688",
            "currency" => "AUD",
            "currency_name" => "Australian dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 229,
            "name" => "Uganda",
            "numeric_code" => "800",
            "phone_code" => "256",
            "currency" => "UGX",
            "currency_name" => "Ugandan shilling",
            "currency_symbol" => "USh"
        ],
        [
            "id" => 230,
            "name" => "Ukraine",
            "numeric_code" => "804",
            "phone_code" => "380",
            "currency" => "UAH",
            "currency_name" => "Ukrainian hryvnia",
            "currency_symbol" => "₴"
        ],
        [
            "id" => 231,
            "name" => "United Arab Emirates",
            "numeric_code" => "784",
            "phone_code" => "971",
            "currency" => "AED",
            "currency_name" => "United Arab Emirates dirham",
            "currency_symbol" => "إ.د"
        ],
        [
            "id" => 232,
            "name" => "United Kingdom",
            "numeric_code" => "826",
            "phone_code" => "44",
            "currency" => "GBP",
            "currency_name" => "British pound",
            "currency_symbol" => "£"
        ],
        [
            "id" => 233,
            "name" => "United States",
            "numeric_code" => "840",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 234,
            "name" => "United States Minor Outlying Islands",
            "numeric_code" => "581",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 235,
            "name" => "Uruguay",
            "numeric_code" => "858",
            "phone_code" => "598",
            "currency" => "UYU",
            "currency_name" => "Uruguayan peso",
            "currency_symbol" => "$"
        ],
        [
            "id" => 236,
            "name" => "Uzbekistan",
            "numeric_code" => "860",
            "phone_code" => "998",
            "currency" => "UZS",
            "currency_name" => "Uzbekistani soʻm",
            "currency_symbol" => "лв"
        ],
        [
            "id" => 237,
            "name" => "Vanuatu",
            "numeric_code" => "548",
            "phone_code" => "678",
            "currency" => "VUV",
            "currency_name" => "Vanuatu vatu",
            "currency_symbol" => "VT"
        ],
        [
            "id" => 238,
            "name" => "Vatican City State (Holy See)",
            "numeric_code" => "336",
            "phone_code" => "379",
            "currency" => "EUR",
            "currency_name" => "Euro",
            "currency_symbol" => "€"
        ],
        [
            "id" => 239,
            "name" => "Venezuela",
            "numeric_code" => "862",
            "phone_code" => "58",
            "currency" => "VES",
            "currency_name" => "Bolívar",
            "currency_symbol" => "Bs"
        ],
        [
            "id" => 240,
            "name" => "Vietnam",
            "numeric_code" => "704",
            "phone_code" => "84",
            "currency" => "VND",
            "currency_name" => "Vietnamese đồng",
            "currency_symbol" => "₫"
        ],
        [
            "id" => 241,
            "name" => "Virgin Islands (British)",
            "numeric_code" => "092",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 242,
            "name" => "Virgin Islands (US)",
            "numeric_code" => "850",
            "phone_code" => "1",
            "currency" => "USD",
            "currency_name" => "United States dollar",
            "currency_symbol" => "$"
        ],
        [
            "id" => 243,
            "name" => "Wallis and Futuna Islands",
            "numeric_code" => "876",
            "phone_code" => "681",
            "currency" => "XPF",
            "currency_name" => "CFP franc",
            "currency_symbol" => "₣"
        ],
        [
            "id" => 244,
            "name" => "Western Sahara",
            "numeric_code" => "732",
            "phone_code" => "212",
            "currency" => "MAD",
            "currency_name" => "Moroccan Dirham",
            "currency_symbol" => "MAD"
        ],
        [
            "id" => 245,
            "name" => "Yemen",
            "numeric_code" => "887",
            "phone_code" => "967",
            "currency" => "YER",
            "currency_name" => "Yemeni rial",
            "currency_symbol" => "﷼"
        ],
        [
            "id" => 246,
            "name" => "Zambia",
            "numeric_code" => "894",
            "phone_code" => "260",
            "currency" => "ZMW",
            "currency_name" => "Zambian kwacha",
            "currency_symbol" => "ZK"
        ],
        [
            "id" => 247,
            "name" => "Zimbabwe",
            "numeric_code" => "716",
            "phone_code" => "263",
            "currency" => "ZWL",
            "currency_name" => "Zimbabwe Dollar",
            "currency_symbol" => "$"
        ]
    ];
}
