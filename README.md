# PHP Nova Poshta API Client

[![PHP Version](https://img.shields.io/badge/php-^8.3-blue.svg)](https://www.php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Composer Package](https://img.shields.io/badge/composer-grisaia%2Fnova--poshta-orange.svg)](https://packagist.org/packages/grisaia/nova-poshta)

A modern PHP library for interacting with the Ukrainian delivery service Nova Poshta via their API 2.0. This package provides a clean, type-safe interface for all Nova Poshta services including settlements, warehouses, counterparties, documents, and additional services.

## 🚀 Features

- **Full API 2.0 Coverage**: Complete implementation of Nova Poshta API 2.0
- **Type Safety**: Built with PHP 8.3+ features including strict types and readonly classes
- **Service-Oriented Architecture**: Clean separation of concerns with dedicated service classes
- **Exception Handling**: Comprehensive error handling with specific exception types
- **PSR-4 Compatible**: Follows PSR-4 autoloading standards
- **Logging Support**: PSR-3 compatible logging interface
- **Modern PHP**: Leverages enums, readonly properties, and other modern PHP features

## 📋 Requirements

- PHP 8.3 or higher
- cURL extension
- JSON extension

## 📦 Installation

Install via Composer:

```bash
composer require grisaia/nova-poshta
```

## 🔧 Configuration

### Basic Setup

```php
<?php

use Grisaia\NovaPoshta\NovaPoshtaAPI;
use Grisaia\NovaPoshta\Services\SettlementService;

// Initialize the API client with your API key
$api = new NovaPoshtaAPI('your-api-key-here');

// Optional: Set custom timeout (default is 4 seconds)
$api->setTimeoutInSeconds(10);

// Optional: Add PSR-3 compatible logger
$api->setLogger($yourLogger);

// Get a service instance
$settlementService = $api->getService(SettlementService::class);
```

## 🛠️ Usage Examples

### Settlement Operations

```php
use Grisaia\NovaPoshta\Services\SettlementService;
use Grisaia\NovaPoshta\MethodProperties\Address\SettlementSearchProperties;

$settlementService = $api->getService(SettlementService::class);

// Get settlements list with pagination
$settlements = $settlementService->getSettlementList(
    page: 1,
    limit: 20,
    regionRef: 'some-region-ref', // optional
    areaRef: 'some-area-ref',     // optional
    hasWarehouse: true            // optional
);

// Search for settlements
$searchProps = new SettlementSearchProperties();
$searchProps->setCityName('Київ');
$searchProps->setLimit(10);

$searchResults = $settlementService->searchSettlements($searchProps);

// Search settlement streets
$streets = $settlementService->searchSettlementStreets(
    streetName: 'Хрещатик',
    settlementRef: 'settlement-ref',
    limit: 10,
    page: 1
);
```

### Warehouse Operations

```php
use Grisaia\NovaPoshta\Services\WarehouseService;
use Grisaia\NovaPoshta\MethodProperties\Address\WarehouseListProperties;

$warehouseService = $api->getService(WarehouseService::class);

// Get warehouses with filters
$warehouseProps = new WarehouseListProperties();
$warehouseProps->setCityName('Київ');
$warehouseProps->setPage(1);
$warehouseProps->setLimit(50);
$warehouseProps->setHasPostFinance(true);
$warehouseProps->satHasBicycleParking(false);

$warehouses = $warehouseService->getWarehouseList($warehouseProps);

// Get warehouse types
$warehouseTypes = $warehouseService->getWarehouseTypeList();
```

### Counterparty Management

```php
use Grisaia\NovaPoshta\Services\CounterpartyService;
use Grisaia\NovaPoshta\MethodProperties\Counterparty\CounterpartySaveProperties;
use Grisaia\NovaPoshta\MethodProperties\Counterparty\CounterpartyListProperties;
use Grisaia\NovaPoshta\DataAdapters\Enums\CounterpartyPersonType;
use Grisaia\NovaPoshta\DataAdapters\Enums\CounterpartyType;

$counterpartyService = $api->getService(CounterpartyService::class);

// Create a new counterparty
$saveProps = new CounterpartySaveProperties();
$saveProps->setFirstName('Іван');
$saveProps->setLastName('Петренко');
$saveProps->setPhone('0501234567');
$saveProps->setCounterpartyType(CounterpartyType::PrivatePerson);

$result = $counterpartyService->saveCounterparty($saveProps);

// Get counterparties list
$listProps = new CounterpartyListProperties(CounterpartyPersonType::Sender);
$listProps->setPage(1);
$listProps->setLimit(20);
$listProps->findByString('Петренко');

$counterparties = $counterpartyService->getCounterpartyList($listProps);

// Get contact persons for a counterparty
$contacts = $counterpartyService->getCounterpartyContactPerson('counterparty-ref', 1);
```

### Document Operations

```php
use Grisaia\NovaPoshta\Services\DocumentService;

$documentService = $api->getService(DocumentService::class);

// Get document information
try {
    $document = $documentService->getDocument('20450123456789');
    echo "Document status: " . $document->getStateName();
} catch (DocumentNotFoundException $e) {
    echo "Document not found";
}

// Track multiple documents
$trackingNumbers = ['20450123456789', '20450987654321'];
$trackingResults = $documentService->getDocumentTrackingStatus($trackingNumbers);

foreach ($trackingResults->getTrackingItems() as $tracking) {
    echo "Number: " . $tracking->getNumber() . " - Status: " . $tracking->getStatus() . "\n";
}
```

### Document Files

```php
use Grisaia\NovaPoshta\Services\DocumentFileService;
use Grisaia\NovaPoshta\DataAdapters\Enums\DocumentPrintType;

$fileService = $api->getService(DocumentFileService::class);

// Save document labels to file
try {
    $fileService->saveDocumentsFile(
        destination: '/path/to/labels.pdf',
        documents: ['20450123456789', '20450987654321'],
        type: DocumentPrintType::Sticker,
        timeout: 10
    );
    echo "Labels saved successfully";
} catch (FileSaveException $e) {
    echo "Failed to save file: " . $e->getMessage();
}
```

### Additional Services

```php
use Grisaia\NovaPoshta\Services\AdditionalService;
use Grisaia\NovaPoshta\MethodProperties\AdditionalService\Save\OrderRedirectingProperties;

$additionalService = $api->getService(AdditionalService::class);

// Request package redirection
$redirectProps = new OrderRedirectingProperties();
$redirectProps->setDocumentNumber('20450123456789');
$redirectProps->setRecipientPhone('0501234567');
$redirectProps->setRecipientContactName('Нове Ім\'я');
$redirectProps->setNoteAddressRecipient('Нова адреса');

$result = $additionalService->requestAdditionalService($redirectProps);
```

### City Operations

```php
use Grisaia\NovaPoshta\Services\CityService;
use Grisaia\NovaPoshta\MethodProperties\Address\CityListProperties;

$cityService = $api->getService(CityService::class);

// Get cities list
$cityProps = new CityListProperties();
$cityProps->setPage(1);
$cityProps->setLimit(50);
$cityProps->findByString('Київ');

$cities = $cityService->getCityList($cityProps);

// Convert settlement to city (Nova Poshta specific requirement)
try {
    $city = $cityService->getCityBySettlement('settlement-ref');
} catch (CityBySettlementException $e) {
    echo "Settlement not found or cannot be converted to city";
}
```

## 🏗️ Available Services

| Service | Description |
|---------|-------------|
| `SettlementService` | Manage settlements, areas, regions, and street search |
| `WarehouseService` | Handle warehouse listings and types |
| `CounterpartyService` | Manage counterparties and contact persons |
| `DocumentService` | Document operations and tracking |
| `DocumentFileService` | Generate and save document files (labels, invoices) |
| `CityService` | City management and settlement conversion |
| `AdditionalService` | Additional services (redirections, changes, returns) |
| `ScanSheetService` | Scan sheet operations |

## 🔧 Advanced Configuration

### Custom Logging

```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('nova-poshta');
$logger->pushHandler(new StreamHandler('path/to/logfile.log', Logger::INFO));

$api = new NovaPoshtaAPI('your-api-key');
$api->setLogger($logger);
```

### Error Handling

The library provides specific exception types for different error scenarios:

```php
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\Exception\QueryFailed\CurlException;
use Grisaia\NovaPoshta\Exception\DocumentNotFoundException;
use Grisaia\NovaPoshta\Exception\BadValueException;

try {
    $result = $settlementService->getSettlementList(1, 10);
} catch (CurlException $e) {
    // Handle network errors
    echo "Network error: " . $e->getMessage();
} catch (QueryFailedException $e) {
    // Handle API errors
    echo "API error: " . $e->getMessage();
} catch (BadValueException $e) {
    // Handle data validation errors
    echo "Data error: " . $e->getMessage();
}
```

## 🧪 Development

### Running Tests

```bash
# Run all tests
composer test

# Run individual test suites
composer phpunit
composer phpstan
composer phpmd

# Fix code style
composer fix
```

### Code Quality Tools

This package uses several tools to maintain code quality:

- **PHPStan**: Static analysis (level max)
- **PHPMD**: Mess detection
- **PHPUnit**: Unit testing

## 🏗️ Architecture

The package follows a clean architecture pattern:

```
src/
├── NovaPoshtaAPI.php           # Main entry point
├── Services/                   # Service layer
├── DataAdapters/              # Data transformation layer
│   ├── Entities/              # Entity classes
│   ├── Enums/                 # Enumeration classes
│   └── Result/                # Result wrapper classes
├── MethodProperties/          # Request parameter classes
├── Exception/                 # Exception hierarchy
└── Normalizer/               # Data normalization utilities
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request. Make sure to:

1. Follow the existing code style
2. Add tests for new functionality
3. Update documentation as needed
4. Run the test suite before submitting

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🔗 Links

- [Packagist Package](https://packagist.org/packages/grisaia/nova-poshta)
- [Issues & Support](https://github.com/RevoTale/php-nova-poshta/issues)

## 📞 Support

If you encounter any issues or have questions, please:

1. Check the [API documentation](https://developers.novaposhta.ua/)
2. Review existing [issues](https://github.com/your-username/php-nova-poshta/issues)
3. Create a new issue with detailed information

