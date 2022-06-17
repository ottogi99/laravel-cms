<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'region',
        'nonghyup_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // 단위 농협과 사용자 간의 연관관계 정의 (1:N)
    public function nonghyup()
    {
        return $this->belongsTo(Nonghyup::class);
    }

    public static function userRoleList()
    {
        return [
            'admin' => '관리자',
            'manager' => '시군관리자',
            'staff' => '단위농협',
            'user' => '일반',
        ];
    }

    public static function userRegionList()
    {
        return [
            "Cheonan" => "천안시",
            "Gongju" => "공주시",
            "Boryeong" => "보령시",
            "Asan" => "아산시",
            "Seosan" => "서산시",
            "Nonsan" => "논산시",
            "Dangjin" => "당진시",
            "Geumsan" => "금산군",
            "Buyeo" => "부여군",
            "Seocheon" => "서천군",
            "Cheongyang" => "청양군",
            "Hongseong" => "홍성군",
            "Yesan" => "예산군",
            "Taean" => "태안군",
        ];
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', ''.$search.'%')
                ->orWhere('name', 'like', ''.$search.'%')
                ->orWhere('email', 'like', ''.$search.'%');
    }
}
