<?php

namespace SMSkin\IdentityServiceNova3Tool\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;

class UserEmailCredential extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \SMSkin\IdentityService\Models\UserEmailCredential::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'email';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'email',
    ];

    public static function label(): string
    {
        return 'Email credential';
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
            Text::make('E-mail', 'email')
                ->sortable()
                ->rules([
                    'required',
                    'email',
                ])
                ->creationRules('unique:user_email_credentials,email')
                ->updateRules('unique:user_email_credentials,email,{{resourceId}}'),
            Password::make('Password', 'password')
                ->showOnIndex(false)
                ->showOnDetail(false)
                ->rules([
                    'required'
                ])
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
