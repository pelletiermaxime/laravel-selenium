<?php

namespace Pelletiermaxime\LaravelSelenium\Lib;

use Illuminate\Support\Collection;

class ChromeDriverDownloader
{
    private $mirrorURL = 'http://chromedriver.storage.googleapis.com';

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
        return "{$this->mirrorURL}/$version/chromedriver_linux64.zip";
    }

    public function saveFile(string $downloadURL)
    {
        $chromeDestinationZip = storage_path() . '/app/' . 'chromedriver_linux64.zip';
        $chromeDestinationDir = storage_path() . '/app';
        $chromeDestinationFile = $chromeDestinationDir . '/chromedriver';

        copy($downloadURL, $chromeDestinationZip);

        $this->extractZipFile($chromeDestinationZip, $chromeDestinationDir, $chromeDestinationFile);

        return $chromeDestinationFile;
    }

    private function extractZipFile($chromeDestinationZip, $chromeDestinationDir, $chromeDestinationFile)
    {
        $zip = new \ZipArchive;
        if ($zip->open($chromeDestinationZip) === true) {
            if (file_exists($chromeDestinationFile)) {
                unlink($chromeDestinationFile);
            }
            $zip->extractTo($chromeDestinationDir);
            $zip->close();
            chmod($chromeDestinationFile, 0755);
            unlink($chromeDestinationZip);
        }
    }
}
