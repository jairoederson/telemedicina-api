<?php
namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentTaggable\Taggable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//class User extends EloquentUser  {
class User extends Authenticatable {

    use HasApiTokens, Notifiable;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        protected $fillable = [
            "email",
            "password",
            "fingerprint",
            "permissions",
            "last_login",
            "name",
            "last_name",
            "gender",
            "state",
            "address",
            "address_extra_info",
            "postal",
            "ubigeo_id",
            "type_document_id",
            "user_sinch",
            "password_sinch",
            "numdoc",
            "img",
            "tel",
            "birth_date",
            "country",
            "estado",
            "token_mobile",
            "platform",
            "provider",
            "provider_id"
        ];
	protected $table = 'users';

	/**
	 * The attributes to be fillable from the model.
	 *
	 * A dirty hack to allow fields to be fillable by calling empty fillable array
	 *
	 * @var array
	 */
    use Taggable;

	//protected $fillable = [];
	protected $guarded = ['id'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $appends = ['full_name', 'role_user'];
    public function getFullNameAttribute()
    {
        return str_limit($this->first_name . ' ' . $this->last_name, 30);
    }

    public function getRoleUserAttribute()
    {
        $role = RoleUser::where('user_id', $this->id)->first();
        return $role->role_id;
    }

    public function country() {
        return $this->belongsTo( Country::class );
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function paciente(){
        return $this->hasOne(Patient::class, 'users_id');
       // return $this->hasOne(Patient::class)->withDefault();
    }

    public function doctor(){
        return $this->hasOne(Doctor::class, 'users_id');
    }
}
