<?php

namespace App\Media;

use WebPConvert\WebPConvert;

class WEBP
{
    private bool $convertImages = false;

    private array $allowedMimes = [
        'image/jpeg',
        'image/png'
    ];

    /**
     * @action init
     */
    public function action(): void
    {
        $this->convertImages = ! empty($option = firestarter()->settings()->get('site_webp_images')) ? $option : false;
    }

    private function convert(string $filePath): void
    {
        if (! empty($filePath) && $this->shouldGenerate($filePath)) {
            try {
                WebPConvert::convert($filePath, $this->getWebpPath($filePath), []);
            } catch (\Throwable $th) {
                error_log($th);
            }
        }
    }

    /**
     * @filter wp_handle_upload 10
     */
    public function handleUpload(array $fileArray): array
    {
        $this->convert($fileArray['file']);

        return $fileArray;
    }

    /**
     * @filter image_make_intermediate_size 10
     */
    public function handleResizing(string $fileName): string
    {
        $this->convert($fileName);

        return $fileName;
    }

    /**
     * @filter wp_delete_file 10
     */
    public function handleDeleting(string $filePath): string
    {
        if ($this->shouldRemove($filePath)) {
            unlink($this->getWebpPath($filePath));
        }

        return $filePath;
    }

    private function getWebpPath(string $filePath): string
    {
        $pathInfo = pathinfo($filePath);

        if ($pathInfo) {
            return str_replace("{$pathInfo['filename']}.{$pathInfo['extension']}", "{$pathInfo['filename']}.webp", $filePath);
        }

        return '';
    }

    private function shouldGenerate(string $filePath): bool
    {
        return $this->isActive() && $this->isAllowedMimeType($filePath) && file_exists($filePath);
    }

    private function shouldRemove(string $filePath): bool
    {
        if ($this->isActive() && $this->isAllowedMimeType($filePath)) {
            $webpPath = $this->getWebpPath($filePath);

            return ! empty($webpPath) && file_exists($webpPath);
        }

        return false;
    }

    private function isAllowedMimeType(string $filePath): bool
    {
        return in_array(mime_content_type($filePath), $this->allowedMimes);
    }

    private function isActive(): bool
    {
        return true === $this->convertImages;
    }
}
