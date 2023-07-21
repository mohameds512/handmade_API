<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\System\Profile;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasLocalePreference
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles , LogsActivity , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guard_name = 'api';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static $states = ['القاهرة', 'الجيزة', 'الإسكندرية', 'الإسماعيليّة', 'أسوان', 'أسيوط', 'الأقصر', 'البحر الأحمر', 'بني سويف', 'البحيرة', 'بورسعيد', 'جنوب سيناء', 'الدقهلية', 'دمياط', 'سوهاج', 'السويس', 'الشرقيّة', 'شمال سيناء', 'الغربيّة', 'قنا', 'كفر الشيخ', 'مرسى مطروح', 'المنوفيّة', 'المنيا', 'الوادي الجديد'];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::created(function ($user) {
            $user->profile()->create([
                'bio' => 'new member',
            ]);
        });
    }
    public static function adminLogin($email)
    {
        $user = self::whereEmail($email)->first();
        if ($user) {
            Auth::login($user);
            return true;
        }
        return false;
    }
    public static function emailServerLogin($email , $password)
    {
        $user = self::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return error(401,'wrong email or password');
        }
        return $user ;
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This User has been {$eventName}")
            ->logOnly(['name', 'phone', 'active', 'email', 'password'])
            ->logOnlyDirty()
            ->useLogName('system');;
        // Chain fluent methods for configuration options
    }

    public function getCreatedAtForHumansAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('phone', 'like', '%'.$search.'%')
                ->orWhereHas('roles', fn($q) => $q->where('name','like', '%'.$search.'%'))
                ->orWhereHas('profile', fn($q) => $q->where('bio','like', '%'.$search.'%'))
                ->orWhereHas('profile', fn($q) => $q->where('address','like', '%'.$search.'%'));
               // ->orWhereHas('profile', fn($q) => $q->where('gender','like', '%'.$search.'%'));
    }

    public static function createPassword($data)
    {

        $user = self::locate($data->email, $data->mobile);

        if (!$user->password) {

            $user->password = bcrypt("Ems@2022");
            $user->save();
        }
    }

    public function preferredLocale()
    {
        // TODO: Implement preferredLocale() method.
        return $this->locale;
    }


    public function data($details = System::DATA_BRIEF)
    {

        $data = (object)[];
        $data->id = $this->id;
        $data->name = $this->name;
        $data->email = $this->email;
        $data->phone = $this->phone;
        $data->removed = $this->removed;
        $data->type = [
            "name"=> "Other",
            "name_local"=> "اخرى",
            "type"=> 200
        ];

        return $data;
    }

    const ERROR_NONE = 0;
    const ERROR_ITEM_ALREADY_EXISTS = 1001;
    const ERROR_INVALID_INPUT = 1002;
    const ERROR_OPERATION_NOT_ALLOWED = 1003;
    const ERROR_INSUFFICIENT_PRIVILEGES = 1004;
    const ERROR_ITEM_NOT_EMPTY = 1005;
    const ERROR_INVALID_REQUEST = 1006;
    const ERROR_ITEM_NOT_FOUND = 1007;
    const ERROR_OPERATION_FAILED = 1008;
    const ERROR_SEND_EMAIL_FAILED = 1009;
    const ERROR_FIELD_VALIDATION = 1010;

    const ERROR_INVALID_USER = 1100;
    const ERROR_EMAIL_ALREADY_EXISTS = 1101;
    const ERROR_MOBILE_ALREADY_EXISTS = 1102;
    const ERROR_MISSING_EMAIL_MOBILE = 1103;
    const ERROR_WRONG_OLD_PASSWORD = 1104;
    const ERROR_FORMAT_NOT_SUPPORTED = 1105;
    const ERROR_RESOURCE_EXPIRED = 1106;

}
