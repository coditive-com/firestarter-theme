<?php

namespace App\Core;

class Setup
{
    /**
     * @filter upload_mimes
     */
    public function setUploadTypes(array $mimes): array
    {
        if (! isset($mimes['svg'])) {
            $mimes['svg'] = 'image/svg+xml';
        }

        return $mimes;
    }

    /**
     * @action login_enqueue_scripts
     */
    public function setLoginLogo()
    {

        if (! empty($logo = get_field('site', 'options')['logo'])) {
            ?>
                <style type="text/css">
                    #login h1 a, .login h1 a {
                        background: url('<?php echo wp_get_attachment_image_url($logo, 'full'); ?>') no-repeat center center / 75%;
                        width: 100%;
                        height: 100px;
                        margin-top: 100px;
                    }
                </style>
            <?php
        }
    }
}
