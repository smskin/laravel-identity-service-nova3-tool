<?php

namespace SMSkin\IdentityServiceNova3Tool\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use SMSkin\IdentityService\Modules\Core\Rules\PhoneRule;

class UserPhoneCredential extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \SMSkin\IdentityService\Models\UserPhoneCredential::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'phone';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'phone',
    ];

    public static function label(): string
    {
        return 'Phone credential';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('User', 'user'),
            Text::make('Phone')
                ->sortable()
                ->rules([
                    'required',
                    new PhoneRule()
                ])
                ->creationRules('unique:user_phone_credentials,phone')
                ->updateRules('unique:user_phone_credentials,phone,{{resourceId}}'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request): array
    {
        return [];
    }
}
