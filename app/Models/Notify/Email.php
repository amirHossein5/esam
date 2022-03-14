<?php

namespace App\Models\Notify;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'public_mail';

    protected $fillable = ['subject', 'body', 'status', 'send_at'];

    public function files(): HasMany
    {
        return $this->hasMany(EmailFile::class, 'public_mail_id');
    }
}
