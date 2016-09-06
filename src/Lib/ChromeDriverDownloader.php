<?php

namespace Pelletiermaxime\LaravelSelenium\Lib;

use Illuminate\Support\Collection;

class ChromeDriverDownloader
{
    public function getAvailableVersions() : Collection
    {
        $chromeReleases = simplexml_load_file('http://chromedriver.storage.googleapis.com/?delimiter=/&prefix=');

        foreach ($chromeReleases->CommonPrefixes as $release) {
            $versions[] = substr(((array)$release->Prefix)[0], 0, -1);
        }

        natsort($versions);

        $versions = collect($versions);
        $versions->pop();

        return $versions;
    }

    public function getDownloadURL(string $version) : String
    {
    }

    public function saveFile(string $downloadURL)
    {
    }
}
