<?php

namespace SMSkin\IdentityServiceNova3Tool\Resources;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use SMSkin\IdentityService\Modules\User\Requests\User\ExistUserRequest;
use SMSkin\IdentityService\Modules\User\UserModule;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \SMSkin\IdentityService\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'identity_uuid';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'identity_uuid',
    ];

    public function __construct($resource)
    {
        self::$model = config('identity-service.classes.models.user');
        parent::__construct($resource);
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
            Text::make('Identity UUID', 'identity_uuid')
                ->showOnCreating(false)
                ->showOnUpdating(false)
                ->readonly()
                ->sortable(),
            Text::make('Name', 'name'),
            HasMany::make('Email credentials', 'emailCredentials', UserEmailCredential::class),
            HasMany::make('Phone credentials', 'phoneCredentials', UserPhoneCredential::class),
            HasMany::make('OAuth credentials', 'oauthCredentials', UserOAuthCredential::class),
            BelongsToMany::make('Scope groups', 'scopeGroups', ScopeGroup::class),
            BelongsToMany::make('Scopes', 'scopes', Scope::class)
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

    /** @noinspection PhpUnusedParameterInspection */
    public static function afterCreate(NovaRequest $request, \App\Models\User $user)
    {
        app(UserModule::class)->executeAfterNovaCreated(
            (new ExistUserRequest)->setUser($user)
        );
    }
}
