# github-php-api

Provides functionality for communication with the github using php.

A possible usage of this is the implementation a github api based self-update functionality (for private repositories)

# Installation

```bash
php composer.phar require davahome/github-php-api
```


# Usage

```php
use DavaHome\GithubApi\AssetFileDownloader;

$assetFileDownloader = new AssetFileDownloader('davahome', 'github-api', '<TOKEN>');

// Display some release information (optional)
$releaseInformation = $assetFileDownloader->getReleaseInformation();
$date = new \DateTime($releaseInformation['published_at']);
echo 'Version: ', $releaseInformation['tag_name'], PHP_EOL;
echo 'Published: ', $date->format('Y-m-d H:i:s'), PHP_EOL;

// Download the asset
$fileContent = $assetFileDownloader->downloadAsset('file.phar');
file_put_contents('file.phar', $fileContent);
```
