<?php
namespace ScnSocialAuth\View\Helper;

use Zend\View\Helper\AbstractHelper;

class SocialSignInButton extends AbstractHelper
{
    public function __invoke($provider, $redirect = false)
    {
        $redirectArg = $redirect ? '?redirect=' . $redirect : '';
        switch ($provider) {
            case 'twitter':
                $link = '<i class="fa fa-twitter"></i>';
                $class = "twitter";
                break;
            case 'linkedIn':
                $link = '<i class="fa fa-linkedin"></i>';
                $class = "linkedin";
                break;
            case 'facebook':
                $link = '<i class="fa fa-facebook"></i>';
                $class = "facebook";
                break;
            case 'google':
                $link = '<i class="fa fa-google-plus"></i>';
                $class = "google-plus";
                break;
            case 'vkontakte':
                $link = '<i class="fa fa-vk"></i>';
                $class = "vk";
                break;
            default:
                $link = ucfirst($provider);
                $class = "default";
                break;
        }
        echo
            '<button data-toggle="tooltip" data-placement="bottom" title="' . ucfirst($provider) . '" class="btn btn-' . $class . '" onclick="document.location.href=\''
            . $this->view->url('scn-social-auth-user/login/provider', array('provider' => $provider))
            . $redirectArg . '\'">' . $link . '</button>';
    }
}
