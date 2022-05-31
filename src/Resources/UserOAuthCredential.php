<?php

namespace SMSkin\IdentityServiceNova3Tool\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use SMSkin\IdentityService\Modules\OAuth\Enums\DriverEnum;

class UserOAuthCredential extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \SMSkin\IdentityService\Models\UserOAuthCredential::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'remote_id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'driver', 'remote_id'
    ];

    public static function label(): string
    {
        return 'OAuth credential';
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
            Select::make('driver')->options(
                array_combine(
                    array_column(DriverEnum::cases(), 'value'),
                    array_column(DriverEnum::cases(), 'name')
                )
            ),
            Text::make('Remote ID', 'remote_id')
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
