<?php

namespace Database\Seeders;


use App\Models\Accounting\Currency;
use App\Models\Hr\Department;
use App\Models\Hr\JopTitle;
use App\Models\Inventory\Inventory;
use App\Models\Sales\Client;
use App\Models\System\Country;
use App\Models\System\State;
use App\Models\System\Status;
use App\Models\System\Tax;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class ConstantsSeeder extends Seeder
{
    /**
     * @var string[]
     */
    private $permissions ;

    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $this->permissions = [
            'hr',
            'crm',
            'purchases',
            'inventory',
            'production',
            'sales',
            'banking',
            'reports',
            'setting',
            'access_users',
            'access_roles'
        ];
        foreach ($this->permissions as $permission) {
            Permission::create(['guard_name' => 'api', 'name' => $permission]);
        }

        $role1 = Role::create(['guard_name' => 'api', 'name' => 'Feedback']);
        $role1->givePermissionTo('access_users');
        $role1->givePermissionTo('access_roles');


        $role2 = Role::create(['guard_name' => 'api', 'name' => 'admin']);
        $role2->givePermissionTo('hr');
        $role2->givePermissionTo('crm');
        $role2->givePermissionTo('purchases');
        $role2->givePermissionTo('inventory');
        $role2->givePermissionTo('sales');
        $role2->givePermissionTo('setting');

        $role3 = Role::create(['guard_name' => 'api', 'name' => 'accountant']);
        $role3->givePermissionTo('purchases');
        $role3->givePermissionTo('sales');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $password = Hash::make('feedback');

        $user = \App\Models\User::factory()->create([
            'name' => 'feedback',
            'email' => 'feedback@core.com',
            'active' =>true,
            'password' => $password,
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@core.com',
            'password' => $password,
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'accountant',
            'email' => 'accountant@core.com',
            'password' => $password,
        ]);
        $user->assignRole($role3);

        $clientStatuses = ['Lead', 'Contacted', 'Sample Requested', 'Sample Submitted', 'Order', 'Manufacturing', 'Rejected', 'Done', 'InActive'];
        $orderStatuses = ['pending', 'Manufacturing', 'done'];
        $paidStatuses = ['unpaid', 'partial', 'paid'];
        $jopStatuses = [ "full-time", "part-time", "partial", "casual", "temporary agency"];
        $invoiceStatuses = ['published', 'draft', 'pending'];

        foreach ($clientStatuses as $status) {
            Status::factory()->create([
                'name' => $status,
                'type' => 'client'
            ]);
        }
        foreach ($orderStatuses as $statu) {
            Status::factory()->create([
                'name' => $statu,
                'type' => 'order'
            ]);
        }
        foreach ($paidStatuses as $stat) {
            Status::factory()->create([
                'name' => $stat,
                'type' => 'paid'
            ]);
        }
        foreach ($jopStatuses as $sta) {
            Status::factory()->create([
                'name' => $sta,
                'type' => 'jop'
            ]);
        }

     foreach ($invoiceStatuses as $st) {
         Status::factory()->create([
             'name' => $st,
             'type' => 'invoice'
         ]);
     }

        $jopTitles = [
            "Project manager" ,
            "Sales manager",
            "Actuary",
            "Business teacher",
            "Business reporter",
            "Admissions representative",
            "Office manager",
            "Office clerk",
            "Assistant buyer",
            "Business development manager",
            "Call center agent",
            "Cashier",
            "Customer service manager",
            "Help desk assistant",
            "Front desk coordinator",
            "Human resources manager",
            "IT manager",
            "Chief of operations",
            "Manager",
            "Executive",
            "Director",
            "Supervisor",
            "Principal",
            "President",
            "Vice President",
            "Account manager",
           "Retail salesperson",
            "Store manager"
        ];
        foreach ($jopTitles as $jop){
            JopTitle::factory()->create([
                'name' => $jop,
            ]);
        }

        $departments = [
            "General Management"=> 'This department develops and executes overall business strategies. It is responsible for the entire organization.' ,
            "Marketing" => 'The workforce in this department is responsible in identifying customer needs and creating tourism products to satisfy them',
            "Operations" => 'The Operations Department combines two or more tourism components',
            "Finance" => 'The Finance Department is responsible for acquiring and utilizing money for financing the activities of the tourism business.',
            "Sales" => 'This department is solely responsible for selling the relevant tourism products to the consumers',
            "Human Resource" => 'This department is responsible for recruiting skilled, and experienced manpower according to the positions at vacancies of different departments.',
            "Purchase"=>'this department ensures the enterprise has appropriate and timely supply of all the required goods and services',
        ];
        foreach ($departments as $name => $description){
            Department::factory()->create([
                'name' => $name,
                'description' => $description,
            ]);
        }



        Inventory::factory()->create([
            'name' => 'main',
            'type' => 'materials',
            'location' => 'factory',
            'manager_id' => 1
        ]);

        Client::factory()->create([
            'name' => 'Client1',
            'phone' => '01098281638',
            'code' => 'cls1',
            'status_id' => 1,
        ]);

        Client::factory()->create([
            'name' => 'Client2',
            'phone' => '01100068386',
            'code' => 'cls2',
            'status_id' => 1,
        ]);


        Tax::factory()->create([
            'name' => 'VAT',
            'rate' => '14',
            'active' => true
        ]);

        $settings = [
            'company' => 'Core',
            'email' => '',
            'phone' => '',
            'address' => '',
            'city' => '',
            'state' => 'Giza',
            'country' => 'Egypt',
            'currency' => 'EGP',
            'due_to_days' => '14',
            'auto_send' => 0,
            'working_days' => 24,
            'working_hours' => 8,
            'avg_salary' => 2000,
            'element_last_price' => 0,
            'product_last_price' => 0,
        ];
//        foreach ($settings as $key => $val) {
//            Setting::factory()->create([
//                'name' => $key,
//                'value' => $val,
//            ]);
//        }
        $categories = [
            'assets' => null,
            'liabilities' => null,
            'owner equity' => null,
            'revenue' => null,
            'expenses' => null,
            'fixed assets' => 1,
            'current assets' => 1,
            'intangible assets' => 1,
            'long term loans' => 2,
            'short term loans' => 2,
            'long term liabilities' => 2 ,
            'current owners' => 3,
            'prepaid revenue' => 4,
            'accrued expenses' => 5,
            'admin expenses' => 5,
            'general expenses' => 5,
        ];
        foreach ($categories as $key => $val) {
            Category::factory()->create([
                'name' => $key,
                'slug' =>  Str::slug($key) ,
                'type' => 'account',
                'parent_id' => $val,
            ]);
        }

        $currencies = [
            'USD' => 'US Dollar',
            'EUR' => 'Euro',
            'JPY' => 'Japanese Yen',
            'GBP' => 'British Pound',
            'AUD' => 'Australian Dollar',
            'CAD' => 'Canadian Dollar',
            'CHF' => 'Swiss Franc',
            'CNY' => 'Chinese Yuan',
            'HKD' => 'Hong Kong Dollar',
            'NZD' => 'New Zealand Dollar',
            'SEK' => 'Swedish Krona',
            'KRW' => 'South Korean Won',
            'SGD' => 'Singapore Dollar',
            'NOK' => 'Norwegian Krone',
            'MXN' => 'Mexican Peso',
            'INR' => 'Indian Rupee',
            'RUB' => 'Russian Ruble',
            'ZAR' => 'South African Rand',
            'TRY' => 'Turkish Lira',
            'BRL' => 'Brazilian Real',
            'AED' => 'United Arab Emirates Dirham',
            'BHD' => 'Bahraini Dinar',
            'EGP' => 'Egyptian Pound',
            'ILS' => 'Israeli New Shekel',
            'IQD' => 'Iraqi Dinar',
            'IRR' => 'Iranian Rial',
            'JOD' => 'Jordanian Dinar',
            'KWD' => 'Kuwaiti Dinar',
            'LBP' => 'Lebanese Pound',
            'LYD' => 'Libyan Dinar',
            'MAD' => 'Moroccan Dirham',
            'OMR' => 'Omani Rial',
            'QAR' => 'Qatari Riyal',
            'SAR' => 'Saudi Riyal',
            'SYP' => 'Syrian Pound',
            'TND' => 'Tunisian Dinar',
            'YER' => 'Yemeni Rial',
        ];

        foreach ($currencies as $key => $val) {
            Currency::factory()->create([
                'code' => $key,
                'name' => $val,
            ]);
        }

        $countries = array(
            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BR" => "Brazil",
            "BN" => "Brunei",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "CV" => "Cabo Verde",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CD" => "Congo, Democratic Republic of the",
            "CG" => "Congo, Republic of the",
            "CR" => "Costa Rica",
            "CI" => "Cote d'Ivoire",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "SZ" => "Eswatini",
            "ET" => "Ethiopia",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GR" => "Greece",
            "GD" => "Grenada",
            "GT" => "Guatemala",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HN" => "Honduras",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "XK" => "Kosovo",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Laos",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "MX" => "Mexico",
            "FM" => "Micronesia",
            "MD" => "Moldova",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar (Burma)",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "KP" => "North Korea",
            "MK" => "North Macedonia",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestine",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PL" => "Poland",
            "PT" => "Portugal",
            "QA" => "Qatar",
            "RO" => "Romania",
            "RU" => "Russia",
            "RW" => "Rwanda",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "KR" => "South Korea",
            "SS" => "South Sudan",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syria",
            "TW" => "Taiwan",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States of America",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VA" => "Vatican City (Holy See)",
            "VE" => "Venezuela",
            "VN" => "Vietnam",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe"
        );
        foreach ($countries as $key => $val) {
            Country::factory()->create([
                'iso' => $key,
                'name' => $val ,
            ]);
        }
        $states = [
            'Alexandria' => 'الإسكندرية',
            'Aswan' => 'أسوان',
            'Asyut' => 'أسيوط',
            'Beheira' => 'البحيرة',
            'Beni Suef' => 'بني سويف',
            'Cairo' => 'القاهرة',
            'Dakahlia' => 'الدقهلية',
            'Damietta' => 'دمياط',
            'Faiyum' => 'الفيوم',
            'Gharbia' => 'الغربية',
            'Giza' => 'الجيزة',
            'Ismailia' => 'الإسماعيلية',
            'Kafr El Sheikh' => 'كفر الشيخ',
            'Luxor' => 'الأقصر',
            'Matrouh' => 'مطروح',
            'Minya' => 'المنيا',
            'Monufia' => 'المنوفية',
            'New Valley' => 'الوادي الجديد',
            'North Sinai' => 'شمال سيناء',
            'Port Said' => 'بورسعيد',
            'Qalyubia' => 'القليوبية',
            'Qena' => 'قنا',
            'Red Sea' => 'البحر الأحمر',
            'Sharqia' => 'الشرقية',
            'Sohag' => 'سوهاج',
            'South Sinai' => 'جنوب سيناء',
            'Suez' => 'السويس',
        ];
        $egypt = Country::where('name','Egypt')->value('id');
        foreach ($states as $key => $val) {
            State::factory()->create([
                'name' => $key,
                'name_ar' => $val ,
                'country_id' => $egypt
            ]);
        }
    }
}
