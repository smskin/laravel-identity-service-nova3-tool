<?php

namespace SMSkin\IdentityServiceNova3Tool;

use Illuminate\View\View;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use SMSkin\IdentityServiceNova3Tool\Resources\Scope;
use SMSkin\IdentityServiceNova3Tool\Resources\ScopeGroup;
use SMSkin\IdentityServiceNova3Tool\Resources\User;
use SMSkin\IdentityServiceNova3Tool\Resources\UserEmailCredential;
use SMSkin\IdentityServiceNova3Tool\Resources\UserOAuthCredential;
use SMSkin\IdentityServiceNova3Tool\Resources\UserPhoneCredential;

class IdentityServiceNova3Tool extends Tool
{
    public string $scopeResource = Scope::class;
    public string $scopeGroupResource = ScopeGroup::class;
    public string $userResource = User::class;
    public string $userEmailCredentialResource = UserEmailCredential::class;
    public string $userOAuthCredentialResource = UserOAuthCredential::class;
    public string $userPhoneCredentialResource = UserPhoneCredential::class;

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
//        Nova::script('identity-service-nova3-tool', __DIR__ . '/../dist/js/tool.js');
//        Nova::style('identity-service-nova3-tool', __DIR__ . '/../dist/css/tool.css');

        Nova::resources([
            $this->scopeResource,
            $this->scopeGroupResource,
            $this->userResource,
            $this->userEmailCredentialResource,
            $this->userOAuthCredentialResource,
            $this->userPhoneCredentialResource
        ]);
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return View|null
     */
    public function renderNavigation(): ?View
    {
        return null;
    }

    /**
     * @param string $scopeResource
     * @return IdentityServiceNova3Tool
     */
    public function setScopeResource(string $scopeResource): IdentityServiceNova3Tool
    {
        $this->scopeResource = $scopeResource;
        return $this;
    }

    /**
     * @param string $scopeGroupResource
     * @return IdentityServiceNova3Tool
     */
    public function setScopeGroupResource(string $scopeGroupResource): IdentityServiceNova3Tool
    {
        $this->scopeGroupResource = $scopeGroupResource;
        return $this;
    }

    /**
     * @param string $userResource
     * @return IdentityServiceNova3Tool
     */
    public function setUserResource(string $userResource): IdentityServiceNova3Tool
    {
        $this->userResource = $userResource;
        return $this;
    }

    /**
     * @param string $userEmailCredentialResource
     * @return IdentityServiceNova3Tool
     */
    public function setUserEmailCredentialResource(string $userEmailCredentialResource): IdentityServiceNova3Tool
    {
        $this->userEmailCredentialResource = $userEmailCredentialResource;
        return $this;
    }

    /**
     * @param string $userOAuthCredentialResource
     * @return IdentityServiceNova3Tool
     */
    public function setUserOAuthCredentialResource(string $userOAuthCredentialResource): IdentityServiceNova3Tool
    {
        $this->userOAuthCredentialResource = $userOAuthCredentialResource;
        return $this;
    }

    /**
     * @param string $userPhoneCredentialResource
     * @return IdentityServiceNova3Tool
     */
    public function setUserPhoneCredentialResource(string $userPhoneCredentialResource): IdentityServiceNova3Tool
    {
        $this->userPhoneCredentialResource = $userPhoneCredentialResource;
        return $this;
    }
}
