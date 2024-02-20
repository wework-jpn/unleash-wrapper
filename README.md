# Unleash Wrapper for Laravel

This Laravel package provides an easy-to-use integration with [Unleash](https://www.getunleash.io/), enabling feature flag management directly within your Laravel applications. Leverage the power of feature toggles to deliver new functionality more safely and with better control.

## Features

- Simple Laravel integration with Unleash
- Environment-specific feature flag management
- Custom context support for advanced feature toggling

## Requirements

- PHP >= 8.1
- Laravel >= 10.10

## Installation

### Step 1: Composer

You can install the package via composer:

```bash
composer require wework/unleash-wrapper:dev-main
```

### Step 2: Publish Configuration

Publish the package configuration file to your Laravel project:

```bash
php artisan vendor:publish --tag="unleash-config"
```

### Step 3: Environment Configuration

Add the necessary environment variables to your `.env` file:

```bash
UNLEASH_URL=https://your-unleash-server.com
UNLEASH_PROJECT_NAME=yourProjectName
UNLEASH_INSTANCE_ID=yourInstanceId
UNLEASH_API_KEY=yourSecretApiKey
```

### Usage

```bash
use Wework\UnleashWrapper\Facades\Unleash;

if (Unleash::isEnabled('your-feature-flag')) {
    #The feature is enabled
} else {
    #The feature is not enabled
}
```

### Advanced Usage

Refer to the [Unleash documentation](https://github.com/Unleash/unleash-client-php) for more advanced features like dynamic context fields, strategy constraints, and more.

### License
The Unleash Wrapper for Laravel is open-sourced software licensed under the MIT license.

### Support
If you encounter any problems or have any suggestions, please open an issue on our [GitHub repository](https://github.com/wework-jpn/unleash-wrapper).




