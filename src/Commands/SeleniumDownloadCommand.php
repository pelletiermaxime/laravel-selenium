<?php

namespace Pelletiermaxime\LaravelSelenium\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Pelletiermaxime\LaravelSelenium\Lib\ChromeDriverDownloader;
use Pelletiermaxime\LaravelSelenium\Lib\SeleniumDownloader;

class SeleniumDownloadCommand extends Command
{
    protected $signature = 'selenium:download';

    protected $description = 'Download the latest Selenium Server, Chrome Driver and Gecko Driver';

    /**
     * Execute the console command.
     */
    public function handle(SeleniumDownloader $seleniumDownloader, ChromeDriverDownloader $chromeDriverDownloader)
    {
        $this->seleniumDownloader     = $seleniumDownloader;
        $this->chromeDriverDownloader = $chromeDriverDownloader;

        $this->handleSelenium();
        // $this->handleChromeDriver();
    }

    private function handleSelenium()
    {
        $versions = $this->seleniumDownloader->getAvailableVersions();
        $lastVersionKey = $versions->flip()->last();

        $version = $this->choice(
            'Selenium version to download ? Defaults to latest.',
            $versions->toArray(),
            $lastVersionKey
        );

        $downloadURL = $this->seleniumDownloader->getDownloadURL($version);

        $seleniumDestination = $this->seleniumDownloader->saveFile($downloadURL);

        $this->info("Downloading $downloadURL and saving to $seleniumDestination");
    }

    private function handleChromeDriver()
    {
        $versions = $this->chromeDriverDownloader->getAvailableVersions();
        $lastVersionKey = $versions->flip()->last();

        $version = $this->choice(
            'Chromedriver version to download ? Defaults to latest.',
            $versions->toArray(),
            $lastVersionKey
        );

        echo $version;
    }
}
