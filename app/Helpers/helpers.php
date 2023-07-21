<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

use App\Models\System;
use App\Models\User;

if (!function_exists('eoa')) {
    function eoa($value, $key = null)
    {

        if ($value instanceof Collection) $obj = (object)$value->toArray();
        else if (is_object($value) && method_exists($value, 'getAttributes'))
            $obj = (object)$value->getAttributes();
        else if (is_array($value)) $obj = (object)$value;
        else if (is_object($value)) $obj = $value;
        else if ($value === true) {
            echo "true";
            return;
        } else if ($value === false) {
            echo "false";
            return;
        } else if ($value === null) {
            echo "null";
            return;
        } else if ($key && is_string($value)) {
            echo "\"$value\"";
            return;
        } else if (!$key && is_string($value)) {
            echo $value;
            return;
        } else if (is_numeric($value)) {
            echo $value;
            return;
        } else {
            echo "\'$value\'";
            return;
        }

        echo "<ul>";
        foreach ($obj as $key => $value) {
            echo "<li>$key: ";
            eoa($value, $key);
            echo "</li>";
        }
        echo "</ul>";
    }
}

// if (!function_exists('resolve_offerings')) {
//     function resolve_offerings()
//     {

//         $courses = \App\Models\Programs\Course::get();
//         $term = \App\Models\Study\Term::current(\App\Models\Study\Term::TYPE_FALL);
//         $program_ids = \App\Models\Programs\Program::pluck('id')->toArray();
//         $instructor_ids = \App\Models\Users\Instructor::pluck('id')->toArray();
//         $student_ids = \App\Models\Users\Student::pluck('id')->toArray();

//         foreach ($courses as $course) {

//             $offering = new \App\Models\Study\Offering();
//             $offering->course_id = $course->id;
//             $offering->term_id = $term->id;
//             $offering->max_total = rand(100, 500);
//             $offering->save();
//             $offering->programs()->sync(array_random($program_ids, rand(5, 9)));
//             $rand_instructors = array_random($instructor_ids, rand(5, 9));
//             $instructors = [];
//             foreach ($rand_instructors as $instructor) {
//                 $instructors[$instructor] = ['role' => rand(1, 5)];
//             }
//             $offering->instructors()->sync($instructors);

//             $rand_students = array_random($student_ids, rand(10, 300));
//             $students = [];
//             foreach ($rand_students as $student) {
//                 $students[$student] = ['total' => rand(50, 300), 'gpa' => rand(1, 4)];

//                 $registration = new \App\Models\Study\Registration();
//                 $registration->offering_id = $offering->id;
//                 $registration->total = rand(50, 300);
//                 $registration->gpa = rand(1, 4);
//                 $registration->save();
//             }
// //            $offering->registrations()->sync($students);

//             $rand_students = array_random($student_ids, rand(10, 300));
//             $students = [];
//             foreach ($rand_students as $student) {
//                 $students[$student] = ['total' => rand(100, 400), 'max' => rand(100, 400), 'grade' => rand(1, 4)];
//             }
//             $offering->students()->sync($students);
//         }

//     }
// }

if (!function_exists('array_random')) {

    function array_random($array, $amount = 1)
    {
        $keys = array_rand($array, $amount);

        if ($amount == 1) {
            return $array[$keys];
        }

        $results = [];
        foreach ($keys as $key) {
            $results[] = $array[$key];
        }

        return $results;
    }
}

if (!function_exists('dt')) {
    function dt($time = null)
    {

        $now = round(microtime(true) * 1000);

        if ($time) {

            $duration = $now - $time;
            d("$duration ms");
        }

        return $now;
    }
}

if (!function_exists('d')) {
    function d($in, $color = "gray")
    {

        if ($in === "\n" || $in === '\n') {
            echo "<br/>";
            return;
        }
        if ($in === "=" || $in === '=') {
            echo "================================<br/>";
            return;
        }

        dbg($in, "d");
        echo "<div style='background-color:$color; color:white;padding:5px;margin:2px;'>";
        eoa($in);
        echo "</div>";
    }
}

if (!function_exists('em')) {
    function em($in)
    {
        dbg($in, "em");
        echo "<div style='background-color:red; color:white;padding:5px;margin:2px;'>";
        print_r($in);
        echo "</div>";
    }
}

if (!function_exists('sm')) {
    function sm($in)
    {
        dbg($in, "sm");
        echo "<div style='background-color:green; color:white;padding:5px;margin:2px;'>";
        print_r($in);
        echo "</div>";
    }
}

if (!function_exists('wm')) {
    function wm($in)
    {
        dbg($in, "wm");
        echo "<div style='background-color:orange; color:black;padding:5px;margin:2px;'>";
        print_r($in);
        echo "</div>";
    }
}

if (!function_exists('isEn')) {
    function isEn()
    {
        $locale = app()->getLocale();
        if (empty($locale) || $locale == "en")
            return true;
        return false;
    }
}

if (!function_exists('dbg')) {
    function dbg($value, $title = "DEBUG")
    {
        \Log::info("$title:", [$value]);
    }
}

if (!function_exists('randnums')) {
    function randnums($n)
    {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}

if (!function_exists('numValue')) {
    function numValue($value)
    {
        if (empty($value)) return 0;
        return $value;
    }
}

if (!function_exists('factoryID')) {
    function factoryID($model)
    {

        static $incrementalID = [];

        if (!array_key_exists($model, $incrementalID)) {
            $incrementalID[$model] = $model::max('id');
        }

        $id = $incrementalID[$model] + 1;
        $incrementalID[$model] = $id;

        return $id;
    }
}

if (!function_exists('encryptData')) {
    function encryptData($text, $password)
    {
        $cipher = openssl_encrypt($text, "AES-256-ECB", hash('sha256', $password, true), OPENSSL_RAW_DATA);
        return strtr(base64_encode($cipher), '+/=', '._-');
    }
}

if (!function_exists('lang')) {
    function lang($name = null)
    {
        if (!app()->getLocale()) {
            return "en_" . $name;
        } else {
            return app()->getLocale() . "_" . $name;
        }

    }
}

if (!function_exists('decryptData')) {
    function decryptData($input, $password)
    {
        $cipher = base64_decode(strtr($input, '._-', '+/='));
        return openssl_decrypt($cipher, "AES-256-ECB", hash('sha256', $password, true), OPENSSL_RAW_DATA);
    }
}

if (!function_exists('curl')) {
    function curl($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    // Set Here Your Requesred Headers
                    'Content-Type: application/json',
                ),
            ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if (!empty($err)) return false;
        curl_close($curl);
        return json_decode($response);
    }
}

if (!function_exists('getFTS')) {
    function getFTS($searchText)
    {

        if (filter_var($searchText, FILTER_VALIDATE_EMAIL)) {
            return $searchText;
        }

        $searchText = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($searchText));
        $searchText = preg_replace('/[^\p{L}0-9\s]+/u', ' ', $searchText);
        $patterns = array("/(ا|أ|إ|آ)/", "/(ه|ة)/", "/(ـ)/", "/(ى)/");
        $replacements = array("ا", "ه", "", "ي");
        $searchText = preg_replace($patterns, $replacements, $searchText);

        return $searchText;
    }
}

if (!function_exists('findFiles')) {
    function findFiles($folder, $findFileName)
    {

        $allFilesPaths = Storage::disk('local')->files($folder);
        $filesPaths = [];
        foreach ($allFilesPaths as $filePath) {
            $fileName = pathinfo($filePath, PATHINFO_FILENAME);
            if ($fileName == $findFileName) {
                $filesPaths[] = $filePath;
            }
        }

        return $filesPaths;
    }
}

if (!function_exists('findFirstFile')) {
    function findFirstFile($folder, $findFileName)
    {

        $filesPaths = findFiles($folder, $findFileName);

        if (count($filesPaths) > 0) {
            return $filesPaths[0];
        }

        return false;
    }
}

if (!function_exists('saveRequestFile')) {
    function saveRequestFile($file, $name, $folder)
    {

        $title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->putFileAs($folder, $file, "$name.$extension");

        return "$title.$extension";
    }
}

if (!function_exists('responseFile')) {
    function responseFile($filePath, $fileName)
    {

        $file = Storage::disk('local')->get($filePath);
        $mimeType = Storage::disk('local')->mimeType($filePath);

        $seconds_to_cache = 3600;
        $ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";

        return response($file, 200, [
            'Content-Type' => $mimeType,
            'Expires' => "$ts",
            'Pragma' => 'cache',
            'Cache-Control' => "max-age=$seconds_to_cache",
            'Content-Disposition' => "inline; filename='$fileName'",
        ]);

        return false;
    }
}

if (!function_exists('socialCheck')) {
    function socialCheck($name, $token)
    {

        $plain = decryptData($token, env('WEBSITE_SHARED_KEY'), false);

        //For testing module
        if ($plain == $name) {
            return true;
        }

        return true;

        if ($name == "google") {
            $response = Http::get('https://www.googleapis.com/oauth2/v3/tokeninfo', [
                "access_token" => $token
            ]);
            $response = $response->json();
            if (empty($response) || isset($response['error_description']))
                return false;
            return true;
        } else if ($name == "facebook") {
            $response = Http::get("https://graph.facebook.com/me", [
                "access_token" => $token
            ]);
            $response = $response->json();
            if (empty($response) || isset($response['error']))
                return false;
            return true;
        } else if ($name == "linkedin") {
            $response = Http::get("https://api.linkedin.com/v2/me", [
                "oauth2_access_token" => $token
            ]);
            $response = $response->json();
            if (empty($response) || isset($response['serviceErrorCode']))
                return false;
            return true;
        }


        return false;
    }
}

if (!function_exists('short_name')) {
    function short_name($data)
    {
        return $data->transform(function ($faculty) {
            $name = '';
            foreach (explode(' ', $faculty->name) as $word) {
                if (strlen($word) > 0) {
                    $name = "$name$word[0]";
                }
            }
            $faculty->name = $name;
            return $faculty;
        });
    }
}

if (!function_exists('autoSetup')) {
    function autoSetup($force = false)
    {

        if (!$force && Role::count() > 0) return true;

        Artisan::call('cache:clear');

        $permissionsNames = [
            'admin_system',
            'access_logs', 'admin_logs',
            'access_users', 'show_users', 'edit_users', 'admin_users',
            'access_roles', 'show_roles', 'edit_roles', 'admin_roles',
            'access_archive', 'show_archive', 'edit_archive', 'admin_archive',
            'access_programs', 'show_programs', 'edit_programs', 'admin_programs',
            'access_student', 'show_student', 'edit_student', 'admin_student',
            'access_quality', 'show_quality', 'edit_quality', 'admin_quality',
            'access_study', 'show_study', 'edit_study', 'admin_study',
            'access_research', 'show_research', 'edit_research', 'admin_research',
            'access_examination', 'show_examination', 'edit_examination', 'admin_examination',
            'access_control', 'show_control', 'edit_control', 'admin_control',
            'access_financial', 'show_financial', 'edit_financial', 'admin_financial',
            'access_staff', 'show_staff', 'edit_staff', 'admin_staff',
            'access_employee', 'show_employee', 'edit_employee', 'admin_employee',
            'access_request', 'show_request', 'edit_request', 'admin_request',
            'access_certificate', 'show_certificate', 'edit_certificate', 'admin_certificate',
            'access_applicant', 'show_applicant', 'edit_applicant', 'admin_applicant', 'feedback_applicant', 'accept_applicant', 'approve_applicant', 'reject_applicant',
        ];

        foreach ($permissionsNames as $permissionName) {

            if (!Permission::where('name', $permissionName)->exists()) {
                Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }

        $role = Role::where('name', 'admin')->first();
        if (!$role) $role = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $role->syncPermissions(Permission::pluck('name')->toArray());

        $role = Role::where('name', 'operator')->first();
        if (!$role) $role = Role::create(['name' => 'operator', 'guard_name' => 'web']);
        $role->syncPermissions(Permission::where('name', 'not like', 'admin_%')->pluck('name')->toArray());

        $role = Role::where('name', 'user')->first();
        if (!$role) $role = Role::create(['name' => 'user', 'guard_name' => 'web']);
        $role->syncPermissions([]);

        $users = [
            ['code' => '1', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'mramadan', 'name' => 'mramadan', 'name_local' => 'mramadan', 'email' => 'mramadan@elnadycompany.com', 'password' => bcrypt('mramadan@2022')],
            ['code' => '2', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'm.fathy', 'name' => 'm.fathy', 'name_local' => 'm.fathy', 'email' => 'm.fathy@elnadycompany.com', 'password' => bcrypt('m.fathy@2022')],
            ['code' => '3', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'mariam.ashraf', 'name' => 'mariam.ashraf', 'name_local' => 'mariam.ashraf', 'email' => 'mariam.ashraf@elnadycompany.com', 'password' => bcrypt('mariam.ashraf@2022')],
            ['code' => '4', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'Sara', 'name' => 'Sara', 'name_local' => 'Sara', 'email' => 'Sara@elnadycompany.com', 'password' => bcrypt('Sara@2022')],
            ['code' => '5', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'rania', 'name' => 'rania', 'name_local' => 'rania', 'email' => 'rania@elnadycompany.com', 'password' => bcrypt('rania@2022')],
            ['code' => '6', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'tamer', 'name' => 'tamer', 'name_local' => 'tamer', 'email' => 'tamer@elnadycompany.com', 'password' => bcrypt('tamer@2022')],
            ['code' => '7', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'a.yehia', 'name' => 'a.yehia', 'name_local' => 'a.yehia', 'email' => 'a.yehia@elnadycompany.com', 'password' => bcrypt('a.yehia@2022')],
            ['code' => '8', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'Admin', 'name' => 'Admin', 'name_local' => 'Admin', 'email' => 'sherif@elnadycompany.com', 'password' => bcrypt('sherif@2022')],
            ['code' => '9', 'type' => User::TYPE_EMPLOYEE, 'first_name' => 'Nada', 'name' => 'Nada', 'name_local' => 'Nada', 'email' => 'Nada@elnadycompany.com', 'password' => bcrypt('Nada@2022')],
        ];

        foreach ($users as $user){
            $user = User::create($user);
            $user->syncRoles(['admin']);
        }

        $user = User::where('code', 'admin')->first();
        if (!$user) {
            $user = User::create([
                'code' => 'admin',
                'type' => User::TYPE_EMPLOYEE,
                'first_name' => 'Admin',
                'middle_name' => '',
                'last_name' => '',
                'name' => 'Admin',
                'name_local' => 'Admin',
                'email' => 'admin@EMS.com',
                'mobile' => null,
                'password' => bcrypt('admin@2022'),
                'nationality_code' => 'EG',
                'birthdate' => '1970-01-01'
            ]);
        }
        $user->syncRoles(['admin']);

        $user = User::where('code', 'operator')->first();
        if (!$user) {
            $user = User::create([
                'code' => 'operator',
                'type' => User::TYPE_EMPLOYEE,
                'first_name' => 'Operator',
                'middle_name' => '',
                'last_name' => '',
                'name' => 'Operator',
                'name_local' => 'Operator',
                'email' => 'operator@EMS.com',
                'mobile' => null,
                'password' => bcrypt('operator@2022'),
                'nationality_code' => 'EG',
                'birthdate' => '1970-01-01'
            ]);
        }
        $user->syncRoles(['operator']);

        $user = User::where('code', 'user')->first();
        if (!$user) {
            $user = User::create([
                'code' => 'user',
                'type' => User::TYPE_EMPLOYEE,
                'first_name' => 'User',
                'middle_name' => '',
                'last_name' => '',
                'name' => 'User',
                'name_local' => 'User',
                'email' => 'user@EMS.com',
                'mobile' => null,
                'password' => bcrypt('user@2020'),
                'nationality_code' => 'EG',
                'birthdate' => '1970-01-01'
            ]);
        }
        $user->syncRoles(['user']);

        Artisan::call('cache:clear');

        dd("autoSetup done");

        return true;
    }
}

if (!function_exists('jsonAPIData')) {
    function jsonAPIData($type, $id, $attributes)
    {
        return ['type' => $type, 'id' => $id, 'attributes' => $attributes];
    }
}

if (!function_exists('error')) {
    function error($code, $title = null, $attribute = null)
    {

        if ( empty($title) && empty($attribute)) {

            return response()->json(['errors' => []], $code);
        }

        $error = (object)[];
        $error->code = $code;
        if ($attribute) $error->source = (object)["pointer" => "/data/attributes/$attribute"];
        if ($title) $error->title = $title;

        return response()->json(['errors' => [$error]], System::HTTP_SEE_OTHER);
    }
}

if (!function_exists('errors')) {
    function errors($errors)
    {

        return response()->json(['errors' => $errors], System::HTTP_SEE_OTHER);
    }
}

if (!function_exists('appendValidationError')) {
    function appendValidationError($errors, $title, $attribute = null)
    {

        $error = (object)[];
        $error->code = System::ERROR_FIELD_VALIDATION;
        if ($attribute) $error->source = (object)["pointer" => "/data/attributes/$attribute"];
        if ($title) $error->title = $title;

        $errors[] = $error;

        return $errors;
    }
}

if (!function_exists('vrrors')) {
    function vrrors($validator)
    {

        $errors = [];
        $validators = $validator->messages()->get('*');
        foreach ($validators as $attribute => $messages) {
            foreach ($messages as $message) {
                $error = (object)[];
                $error->code = System::ERROR_FIELD_VALIDATION;
                $error->source = (object)["pointer" => "/data/attributes/$attribute"];
                $error->title = $message;
                $errors[] = $error;
            }
        }

        return response()->json(['errors' => $errors], System::HTTP_SEE_OTHER);
    }
}

if (!function_exists('validatorErrors')) {
    function validatorErrors($validator)
    {

        $errors = [];
        $validators = $validator->messages()->get('*');
        foreach ($validators as $attribute => $messages) {
            foreach ($messages as $message) {
                $error = (object)[];
                $error->code = System::ERROR_FIELD_VALIDATION;
                $error->source = (object)["pointer" => "/data/attributes/$attribute"];
                $error->title = $message;
                $errors[] = $error;
            }
        }

        return $errors;
    }
}

if (!function_exists('success')) {
    function success($data = null, $meta = null, $message = null)
    {
        if ($data && $meta) return response()->json(['data' => $data, 'meta' => $meta]);
        $reponse = ['message' => $message, 'status' => 'success', "data" => $data];
        return response()->json($reponse);
    }
}

if (!function_exists('can')) {
    function can($permission, $user = null)
    {
        $user = ($user) ? $user : auth()->user();
        if (!$user) return false;

        return $user->hasPermissionTo($permission, 'api');
    }
}

if (!function_exists('canUserAccess')) {
    function canUserAccess($permission, $user = null,$faculty_id=null,$program_id=null,$department_id=null)
    {
        //get user
        $user = ($user) ? $user : auth()->user();
        if (!$user) return false;

        //check if this user is admin_system or not
        //if(can('admin_system',$user)) return true;

        //check permissions direct if faculty not passed
        if(!$faculty_id){
            if(can($permission,$user)) return true;

            //check if he has permissions in his user access or not
            if(array_search($permission,$user->getUserAccessAllPermissions())) return true;

        }else{
            //check user access
            if($allAccess = $user->getGlobalUserAccess('academicAccess')){
                foreach ($allAccess as $userAccess){
                    errorLogArray('permission log ',$faculty_id,$permission,'userAccess',$userAccess->faculty_id,$userAccess->permissions);
                    if($userAccess->faculty_id == $faculty_id && str_contains($userAccess->permissions,$permission)){
                        if($program_id == null || $userAccess->program_id == null ||  ($userAccess->program_id == $program_id)){
                            return true;
                        }
                    }
                }
            }else{
                if(can($permission,$user)) return true;
            }
        }

        return false;
    }
}

if (!function_exists('canAll')) {
    function canAll($permissions, $user = null)
    {
        $user = ($user) ? $user : auth()->user();
        if (empty($user)) return false;
        $permissions = collect($permissions)->flatten();
        foreach ($permissions as $permission) {
            if (!$user->hasPermissionTo($permission, 'web')) {
                return false;
            }
        }
        return true;
    }
}

if (!function_exists('canAny')) {
    function canAny($permissions, $user = null)
    {
        $user = ($user) ? $user : auth()->user();
        if (empty($user)) return false;
        $permissions = collect($permissions)->flatten();
        foreach ($permissions as $permission) {
            if ($user->checkPermissionTo($permission, 'web')) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('userTime')) {
    function userTime($time, $timezone)
    {
        if (is_string($time)) {
            $time = new Carbon($time);
        }

        if ($timezone) $time->addMinutes(-$timezone);
        return $time;
    }
}

if (!function_exists('cleanPath')) {
    function cleanPath($path)
    {
        $path = str_replace("\\", "/", $path);
        $path = trim($path, "/");
        while (strrpos($path, "//") !== false) {
            $path = str_replace("//", "/", $path);
        }
        return $path;
    }
}

if (!function_exists('decodeSemiJson')) {
    function decodeSemiJson($text)
    {
        $obj = (object)[];
        $lines = explode("\n", $text);
        foreach ($lines as $line) {
            $parts = explode(":", $line, 2);
            $key = trim($parts[0]);
            $value = (count($parts) == 2) ? trim($parts[1]) : null;
            if (!empty($key)) $obj->{$key} = $value;
        }
        return $obj;
    }
}

if (!function_exists('sendSMS')) {
    function sendSMS($to, $body)
    {

        $from = env('SMS_APP');
        $userID = env('SMS_UID');
        $password = env('SMS_PWD');

        $curl = curl_init();
        $message = array('messages' => array(array('body' => $body,
            'to' => '{{' . $to . '}}',
            'from' => $from
        )));

        $token = base64_encode("$userID:$password");

        curl_setopt_array($curl,
            array(
                CURLOPT_URL => 'https://rest.clicksend.com/v3/sms/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($message),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    "Authorization: Basic $token"
                ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        if (!empty($err))
            return false;
        curl_close($curl);

        return json_decode($response);
    }
}

if (!function_exists('englishDigits')) {
    function englishDigits($searchText)
    {
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($arabic, $english, $searchText);
    }
}

if (!function_exists('array_get')) {
    function array_get($array, $parameter, $default = null)
    {

        if (array_key_exists($parameter, $array))
            return $array[$parameter];

        return $default;
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {

        if (!$date) return null;
        if ($date == "today") return Carbon::now()->toDateString();
        if ($date instanceof Carbon) return $date->toDateString();
        if (is_string($date)) return Carbon::parse($date)->toDateString();

        return null;
    }
}

if (!function_exists('formatDateTime')) {
    function formatDateTime($dateTime)
    {

        if (!$dateTime) return null;
        if ($dateTime == "now") return Carbon::now()->toIso8601String();
        if ($dateTime instanceof Carbon) return $dateTime->toIso8601String();
        if (is_string($dateTime)) return Carbon::parse($dateTime)->toIso8601String();

        return null;
    }
}

if (!function_exists('checkExecuteTime')) {
    /*
        checkExecuteTime(function () use($request){
            //code check
        });
     */
    function checkExecuteTime($callbackFunctionCheck,$testTimes=100)
    {
        //place this before any script you want to calculate time
        $time_start = microtime(true);

        //sample script
        for($i=0; $i<$testTimes; $i++){
            //do anything
            $callbackFunctionCheck();
        }

        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        error_log('Total Execution Time: '.($execution_time*1000).' Milliseconds');

        return null;
    }
}

if (!function_exists('errorLogArray')) {
    function errorLogArray($message,...$args)
    {
        error_log($message."#  ".json_encode($args));
    }
}

if (!function_exists('dataCollection')) {
    function dataCollection($records)
    {
        $response = array();
        foreach ($records as $record) {
            $response [] = $record->data();
        }

        return $response;
    }
}