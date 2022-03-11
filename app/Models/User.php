<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    const PROFILES = [
        0=>'App\Models\Ferrador',
        1=>'App\Models\Veterinario',
        2=>'App\Models\Treinador',
    ];

    protected $appends = ['is_perfil_completo'];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image_url',
        'profile_id',
        'profile_type',
        'data_nascimento',
        'cidade_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['profile','cidade'];

    public function profile()
    {
        return $this->morphTo();
    }

    public function getIsFerradorAttribute()
    {
        return $this->profile_type == 'App\Models\Ferrador';
    }

    public function getIsVeterinarioAttribute()
    {
        return $this->profile_type == 'App\Models\Veterinario';
    }

    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::class);
    }

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

    public function getProfileImageUrlAttribute($value)
    {
        return ($value) ?'/storage/'.$value: '/assets/img/users/1.jpg';
    }

    public function getProfileLabelAttribute(){
        if($this->is_admin){
            return 'Administrador';
        }
        if($this->profile_type === 'App\Models\Ferrador'){
            return 'Ferrador';
        }
        if($this->profile_type === 'App\Models\Veterinario'){
            return 'Veterinário';
        }
        return 'Não definido';
    }

    public function getIsPerfilCompletoAttribute(){
        $is_perfil_completo = true;
        if(!$this->data_nascimento || !$this->profile_type || !$this->profile_id || !$this->cidade_id){
            $is_perfil_completo = false;
        }
        return $is_perfil_completo;
    }


}
