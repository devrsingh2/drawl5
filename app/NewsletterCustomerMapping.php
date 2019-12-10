<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterCustomerMapping extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsletter_customers_mapping';
    protected $fillable = ['newsletter_id','email','user_id'];

}
