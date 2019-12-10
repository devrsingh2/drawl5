<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsletter_subscriptions';
    protected $fillable = ['email','user_id','status'];
}
