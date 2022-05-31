# Laravel Nova v3 Tool for manage Identity service
This is Nova Tool for manage Identity service (https://github.com/smskin/laravel-idenity-service)

## Installation
1. `composer require smskin/identity-service-nova3-tool`
2. Delete default User resource (app/Nova/User.php)
3. Add `SMSkin\IdentityServiceNova3Tool\IdentityServiceNova3Tool` to `App\Providers\NovaServiceProvider.php`

Example of NovaServiceProvider
```php
...
public function tools()
{
    return [
        new IdentityServiceNova3Tool
    ];
}
...
```

## Customization
You can extend default Nova Resource and pass it to Tool
```php
...
public function tools()
{
    return [
        (new IdentityServiceNova3Tool)
            ->setScopeGroupResource(ScopeGroup::class)
            ->setScopeResource(Scope::class)
            ->setUserEmailCredentialResource(UserEmailCredential::class)
            ->setUserPhoneCredentialResource(UserPhoneCredential::class)
            ->setUserOAuthCredentialResource(UserOAuthCredential::class)
            ->setUserResource(User::class)
    ];
}
...
```