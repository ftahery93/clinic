<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = 'laravel/laravel';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'anhskohbo/no-captcha' => '3.0.4@fd08c84bd0e05f4a048a9bba800ab64ada9fadfc',
  'asm89/stack-cors' => '1.2.0@c163e2b614550aedcf71165db2473d936abbced6',
  'barryvdh/laravel-cors' => 'v0.11.3@c95ac944f2f20a17949aae6645692dfd3b402bca',
  'darkaonline/l5-swagger' => '5.8.1@3feea73615016405ac46b807b1eac44a188c2e7e',
  'dnoegel/php-xdg-base-dir' => '0.1@265b8593498b997dc2d31e75b89f053b5cc9621a',
  'doctrine/annotations' => 'v1.6.1@53120e0eb10355388d6ccbe462f1fea34ddadb24',
  'doctrine/inflector' => 'v1.3.0@5527a48b7313d15261292c149e55e26eae771b0a',
  'doctrine/lexer' => '1.0.2@1febd6c3ef84253d7c815bed85fc622ad207a9f8',
  'dragonmantank/cron-expression' => 'v2.3.0@72b6fbf76adb3cf5bc0db68559b33d41219aba27',
  'egulias/email-validator' => '2.1.9@128cc721d771ec2c46ce59698f4ca42b73f71b25',
  'erusev/parsedown' => '1.7.3@6d893938171a817f4e9bc9e86f2da1e370b7bcd7',
  'fideloper/proxy' => '4.1.0@177c79a2d1f9970f89ee2fb4c12b429af38b6dfb',
  'guzzlehttp/guzzle' => '6.3.3@407b0cb880ace85c9b63c5f9551db498cb2d50ba',
  'guzzlehttp/promises' => 'v1.3.1@a59da6cf61d80060647ff4d3eb2c03a2bc694646',
  'guzzlehttp/psr7' => '1.6.1@239400de7a173fe9901b9ac7c06497751f00727a',
  'jakub-onderka/php-console-color' => 'v0.2@d5deaecff52a0d61ccb613bb3804088da0307191',
  'jakub-onderka/php-console-highlighter' => 'v0.4@9f7a229a69d52506914b4bc61bfdb199d90c5547',
  'laravel/framework' => 'v5.8.28@341fb54bea9693cada2a5b8d398621a57f82862d',
  'laravel/tinker' => 'v1.0.8@cafbf598a90acde68985660e79b2b03c5609a405',
  'laravelcollective/html' => 'v5.8.0@0e360143d3476fe4141d267a260c140569fa207b',
  'lcobucci/jwt' => '3.3.2@56f10808089e38623345e28af2f2d5e4eb579455',
  'league/flysystem' => '1.0.53@08e12b7628f035600634a5e76d95b5eb66cea674',
  'monolog/monolog' => '1.24.0@bfc9ebb28f97e7a24c45bdc3f0ff482e47bb0266',
  'nesbot/carbon' => '2.21.0@da6410b77f74eecd98d24ffb6dfecefccf3ca17f',
  'nexmo/client' => '2.0.0@664082abac14f6ab9ceec9abaf2e00aeb7c17333',
  'nexmo/client-core' => '2.1.0@ef7e8a0715c93c5ddc7915e8a29f29331798bb52',
  'nikic/php-parser' => 'v4.2.2@1bd73cc04c3843ad8d6b0bfc0956026a151fc420',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'opis/closure' => '3.3.1@92927e26d7fc3f271efe1f55bdbb073fbb2f0722',
  'paragonie/random_compat' => 'v9.99.99@84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
  'pda/pheanstalk' => 'v4.0.0@328708b2cb843c214579a9ac3d1730c074038d6a',
  'php-http/guzzle6-adapter' => 'v2.0.1@6074a4b1f4d5c21061b70bab3b8ad484282fe31f',
  'php-http/httplug' => '2.1.0@72d2b129a48f0490d55b7f89be0d6aa0597ffb06',
  'php-http/promise' => 'v1.0.0@dc494cdc9d7160b9a09bd5573272195242ce7980',
  'phpoption/phpoption' => '1.5.0@94e644f7d2051a5f0fcf77d81605f152eecff0ed',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/http-client' => '1.0.1@2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
  'psr/http-factory' => '1.0.1@12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'psr/log' => '1.1.0@6c001f1daafa3a3ac1d8ff69ee4db8e799a654dd',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'psy/psysh' => 'v0.9.9@9aaf29575bb8293206bb0420c1e1c87ff2ffa94e',
  'ralouphie/getallheaders' => '3.0.3@120b605dfeb996808c31b6477290a714d356e822',
  'ramsey/uuid' => '3.8.0@d09ea80159c1929d75b3f9c60504d613aeb4a1e3',
  'swagger-api/swagger-ui' => 'v3.23.1@60397d6f43a7f866f761e3ff39a26b58e91082e0',
  'swiftmailer/swiftmailer' => 'v6.2.1@5397cd05b0a0f7937c47b0adcb4c60e5ab936b6a',
  'symfony/console' => 'v4.3.2@b592b26a24265a35172d8a2094d8b10f22b7cc39',
  'symfony/css-selector' => 'v4.3.2@105c98bb0c5d8635bea056135304bd8edcc42b4d',
  'symfony/debug' => 'v4.3.2@d8f4fb38152e0eb6a433705e5f661d25b32c5fcd',
  'symfony/event-dispatcher' => 'v4.3.2@d257021c1ab28d48d24a16de79dfab445ce93398',
  'symfony/event-dispatcher-contracts' => 'v1.1.5@c61766f4440ca687de1084a5c00b08e167a2575c',
  'symfony/finder' => 'v4.3.2@33c21f7d5d3dc8a140c282854a7e13aeb5d0f91a',
  'symfony/http-foundation' => 'v4.3.2@e1b507fcfa4e87d192281774b5ecd4265370180d',
  'symfony/http-kernel' => 'v4.3.2@4150f71e27ed37a74700561b77e3dbd754cbb44d',
  'symfony/mime' => 'v4.3.2@ec2c5565de60e03f33d4296a655e3273f0ad1f8b',
  'symfony/polyfill-ctype' => 'v1.11.0@82ebae02209c21113908c229e9883c419720738a',
  'symfony/polyfill-iconv' => 'v1.11.0@f037ea22acfaee983e271dd9c3b8bb4150bd8ad7',
  'symfony/polyfill-intl-idn' => 'v1.11.0@c766e95bec706cdd89903b1eda8afab7d7a6b7af',
  'symfony/polyfill-mbstring' => 'v1.11.0@fe5e94c604826c35a32fa832f35bd036b6799609',
  'symfony/polyfill-php72' => 'v1.11.0@ab50dcf166d5f577978419edd37aa2bb8eabce0c',
  'symfony/polyfill-php73' => 'v1.11.0@d1fb4abcc0c47be136208ad9d68bf59f1ee17abd',
  'symfony/process' => 'v4.3.2@856d35814cf287480465bb7a6c413bb7f5f5e69c',
  'symfony/routing' => 'v4.3.2@2ef809021d72071c611b218c47a3bf3b17b7325e',
  'symfony/service-contracts' => 'v1.1.5@f391a00de78ec7ec8cf5cdcdae59ec7b883edb8d',
  'symfony/translation' => 'v4.3.2@934ab1d18545149e012aa898cf02e9f23790f7a0',
  'symfony/translation-contracts' => 'v1.1.5@cb4b18ad7b92a26e83b65dde940fab78339e6f3c',
  'symfony/var-dumper' => 'v4.3.2@45d6ef73671995aca565a1aa3d9a432a3ea63f91',
  'symfony/yaml' => 'v4.3.2@c60ecf5ba842324433b46f58dc7afc4487dbab99',
  'tijsverkoyen/css-to-inline-styles' => '2.2.1@0ed4a2ea4e0902dac0489e6436ebcd5bbcae9757',
  'vlucas/phpdotenv' => 'v3.4.0@5084b23845c24dbff8ac6c204290c341e4776c92',
  'zendframework/zend-diactoros' => '2.2.1@de5847b068362a88684a55b0dbb40d85986cfa52',
  'zircote/swagger-php' => '2.0.14@f2a00f26796e5cd08fd812275ba2db3d1e807663',
  'doctrine/instantiator' => '1.2.0@a2c590166b2133a4633738648b6b064edae0814a',
  'filp/whoops' => '2.4.1@6fb502c23885701a991b0bba974b1a8eb6673577',
  'fzaninotto/faker' => 'v1.8.0@f72816b43e74063c8b10357394b6bba8cb1c10de',
  'hamcrest/hamcrest-php' => 'v2.0.0@776503d3a8e85d4f9a1148614f95b7a608b046ad',
  'mockery/mockery' => '1.2.2@0eb0b48c3f07b3b89f5169ce005b7d05b18cf1d2',
  'myclabs/deep-copy' => '1.9.1@e6828efaba2c9b79f4499dae1d66ef8bfa7b2b72',
  'phar-io/manifest' => '1.0.3@7761fcacf03b4d4f16e7ccb606d4879ca431fcf4',
  'phar-io/version' => '2.0.1@45a2ec53a73c70ce41d55cedef9063630abaf1b6',
  'phpdocumentor/reflection-common' => '1.0.1@21bdeb5f65d7ebf9f43b1b25d404f87deab5bfb6',
  'phpdocumentor/reflection-docblock' => '4.3.1@bdd9f737ebc2a01c06ea7ff4308ec6697db9b53c',
  'phpdocumentor/type-resolver' => '0.4.0@9c977708995954784726e25d0cd1dddf4e65b0f7',
  'phpspec/prophecy' => '1.8.1@1927e75f4ed19131ec9bcc3b002e07fb1173ee76',
  'phpunit/php-code-coverage' => '6.1.4@807e6013b00af69b6c5d9ceb4282d0393dbb9d8d',
  'phpunit/php-file-iterator' => '2.0.2@050bedf145a257b1ff02746c31894800e5122946',
  'phpunit/php-text-template' => '1.2.1@31f8b717e51d9a2afca6c9f046f5d69fc27c8686',
  'phpunit/php-timer' => '2.1.2@1038454804406b0b5f5f520358e78c1c2f71501e',
  'phpunit/php-token-stream' => '3.0.2@c4a66b97f040e3e20b3aa2a243230a1c3a9f7c8c',
  'phpunit/phpunit' => '7.5.14@2834789aeb9ac182ad69bfdf9ae91856a59945ff',
  'sebastian/code-unit-reverse-lookup' => '1.0.1@4419fcdb5eabb9caa61a27c7a1db532a6b55dd18',
  'sebastian/comparator' => '3.0.2@5de4fc177adf9bce8df98d8d141a7559d7ccf6da',
  'sebastian/diff' => '3.0.2@720fcc7e9b5cf384ea68d9d930d480907a0c1a29',
  'sebastian/environment' => '4.2.2@f2a2c8e1c97c11ace607a7a667d73d47c19fe404',
  'sebastian/exporter' => '3.1.0@234199f4528de6d12aaa58b612e98f7d36adb937',
  'sebastian/global-state' => '2.0.0@e8ba02eed7bbbb9e59e43dedd3dddeff4a56b0c4',
  'sebastian/object-enumerator' => '3.0.3@7cfd9e65d11ffb5af41198476395774d4c8a84c5',
  'sebastian/object-reflector' => '1.1.1@773f97c67f28de00d397be301821b06708fca0be',
  'sebastian/recursion-context' => '3.0.0@5b0cd723502bac3b006cbf3dbf7a1e3fcefe4fa8',
  'sebastian/resource-operations' => '2.0.1@4d7a795d35b889bf80a0cc04e08d77cedfa917a9',
  'sebastian/version' => '2.0.1@99732be0ddb3361e16ad77b68ba41efc8e979019',
  'symfony/thanks' => 'v1.1.0@9474a631b52737c623b6aeba22f00bbc003251da',
  'theseer/tokenizer' => '1.1.3@11336f6f84e16a720dae9d8e6ed5019efa85a0f9',
  'webmozart/assert' => '1.4.0@83e253c8e0be5b0257b881e1827274667c5c17a9',
  'laravel/laravel' => 'dev-master@7e722fc48ce6684a94b5db1dab3a0409a3f3149e',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
