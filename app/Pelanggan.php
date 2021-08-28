<?php
namespace App;

// use App\Notifications\PelangganResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use Notifiable;

    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new PelangganResetPasswordNotification($token));
    // }

    public function verifyPelanggan()
    {
        return $this->hasOne('App\VerifyPelanggan');
    }

    public function keranjang(){
        return $this->hasMany('App\Models\Keranjang'); 
    }   

    public function alamat(){
        return $this->hasMany('App\Models\Alamatpelanggan'); 
    } 

    public function pesanan(){
        return $this->hasMany('App\Models\Pesanan');
    }  
}


