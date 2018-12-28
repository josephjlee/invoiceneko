<?php

namespace App\Otter;

use Poowf\Otter\Http\Resources\OtterResource;

class CompanySetting extends OtterResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\CompanySetting';

    /**
     * Get the fields and types used by the resource
     *
     * @return array
     */
    public function fields()
    {
        return [
            'invoice_prefix' => 'text',
            'quote_prefix' => 'text',
            'receipt_prefix' => 'text',
            'invoice_conditions' => 'text',
            'quote_conditions' => 'text',
            'tax' => 'text'
        ];
    }

    /**
     * Fields to be hidden in the resource collection
     *
     * @return array
     */
    public function hidden()
    {
        return [
        ];
    }
}