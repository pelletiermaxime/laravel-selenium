<?php

namespace Pelletiermaxime\LaravelSelenium\Lib;

use Illuminate\Support\Collection;

class SeleniumDownloader
{
    protected $mirrorURL = 'http://selenium-release.storage.googleapis.com';

    public function getAvailableVersions() : Collection
    {
        $seleniumReleases = simplexml_load_file($this->mirrorURL);

        $versions = collect();

        foreach ($seleniumReleases as $release) {
            $fileName = $release->Key;
            if (preg_match('/.*selenium-server-standalone-(.*).jar/', $fileName, $matches)) {
                $versions[] = $matches[1];
            }
        }

        $versions = $versions->unique();

        return $versions;
    }

    public function getDownloadURL(string $version) : String
    {
        $versionSplitted = explode('-', $version);

        $versionWithoutSuffix = $versionSplitted[0];

        $shortVersion = substr($versionWithoutSuffix, 0, strrpos($versionWithoutSuffix, '.'));

        if (isset($versionSplitted[1])) {
            $shortVersion .= '-' . $versionSplitted[1];
        }

        $downloadURL = "{$this->mirrorURL}/$shortVersion/selenium-server-standalone-$version.jar";

        return $downloadURL;
    }

    public function saveFile(string $downloadURL) : String
    {
        $seleniumDestination = storage_path() . '/app/' . 'selenium-server-standalone.jar';

        copy($downloadURL, $seleniumDestination);

        return $seleniumDestination;
    }
}
